//
// C++ Implementation: controller
//
// Description: 
//
//
// Author: Micke Prag <micke.prag@telldus.se>, (C) 2009
//
// Copyright: See COPYING file that comes with this distribution
//
//
#include "TellStickDuo.h"
#include "Manager.h"
#include <stdlib.h>

#if defined(_WINDOWS) && defined(LIBFTD2XX)
typedef HANDLE EVENT_HANDLE;
#elif defined(LIBFTDI)
	#include <unistd.h>
	typedef struct _EVENT_HANDLE {
		pthread_cond_t eCondVar;
		pthread_mutex_t eMutex;
	} EVENT_HANDLE;
	typedef int DWORD;
#endif

using namespace TelldusCore;

namespace TelldusCore {
	class Thread {
		public:
			void start();
			bool wait();
			
		protected:
			virtual void run() = 0;
		
		private:
			static void* exec( void *ptr );
#ifndef _WINDOWS
			pthread_t thread;
#endif
	};
	
	class PrivateTellStickDuoListener: public Thread {
		public:
			PrivateTellStickDuoListener( TellStickDuo *parent );
			~PrivateTellStickDuoListener();
			void stop();
		protected:
			void run();
		private:
			void processData( const std::string &data );
		
			TellStickDuo *parent;
			EVENT_HANDLE eh;
			bool running;
			QMutex mutex;
			std::string message;
	};
	
	class TellStickDuoPrivate {
		public:
			PrivateTellStickDuoListener *listener;
	};
}

TellStickDuo::TellStickDuo(const TellStickDescriptor &td)
	: TellStick(td)
{
	d = new TellStickDuoPrivate;
	
	this->setBaud(9600);
	
	d->listener = new PrivateTellStickDuoListener(this);
	d->listener->start();
}


TellStickDuo::~TellStickDuo() {
	if (d->listener) {
		d->listener->stop();
		delete d->listener;
	}
}

bool TellStickDuo::connected() const {
	return true;
}

void Thread::start() {
#ifndef _WINDOWS
	pthread_create(&thread, NULL, &Thread::exec, this );
#endif
}

bool Thread::wait() {
#ifndef _WINDOWS
	pthread_join(thread, 0);
#endif
	return true;
}

void *Thread::exec( void *ptr ) {
	Thread *t = reinterpret_cast<Thread *>(ptr);
	if (t) {
		t->run();
	}
	return 0;
}

PrivateTellStickDuoListener::PrivateTellStickDuoListener( TellStickDuo *p )
	: Thread(),
	parent(p),
	running(false)
{
}

PrivateTellStickDuoListener::~PrivateTellStickDuoListener() {
	if (running) {
		stop();
	}
}

void PrivateTellStickDuoListener::stop() {
	if (running) {
		{
			QMutexLocker locker(&mutex);
			running = false;
		}
		//Unlock the wait-condition
#ifndef _WINDOWS
		pthread_cond_broadcast(&eh.eCondVar);
#endif
	}
	this->wait();
}

void PrivateTellStickDuoListener::run() {
#ifdef LIBFTD2XX
	DWORD dwBytesInQueue = 0;
	DWORD dwBytesRead = 0;
	char *buf = 0;
#else
	int dwBytesRead = 0;
	unsigned char buf[100];// = 0;
	TellStickHandle h = parent->handle();
#endif
	
#ifndef _WINDOWS
	pthread_mutex_init(&eh.eMutex, NULL);
	pthread_cond_init(&eh.eCondVar, NULL);
#endif

	{
		QMutexLocker locker(&mutex);
		running = true;
	}

	while(running) {
#ifdef LIBFTD2XX
#ifndef _WINDOWS
		FT_SetEventNotification(parent->handle(), FT_EVENT_RXCHAR, (PVOID)&eh);
		pthread_mutex_lock(&eh.eMutex);
		pthread_cond_wait(&eh.eCondVar, &eh.eMutex);
		pthread_mutex_unlock(&eh.eMutex);
#endif

		FT_GetQueueStatus(parent->handle(), &dwBytesInQueue);
		if (dwBytesInQueue < 1) {
			continue;
		}
		
		buf = (char*)malloc(sizeof(buf) * (dwBytesInQueue+1));
		memset(buf, 0, dwBytesInQueue+1);
		FT_Read(parent->handle(), buf, dwBytesInQueue, &dwBytesRead);
		processData( buf );
		free(buf);
#else
		usleep(1000);
		dwBytesRead = ftdi_read_data(&h, buf, 100);
		if (dwBytesRead < 1) {
			continue;
		}
		processData( reinterpret_cast<char *>(&buf) );
#endif
	}
}

void PrivateTellStickDuoListener::processData( const std::string &data ) {
	for (uint i = 0; i < data.length(); ++i) {
		if (data[i] == 13) { // Skip \r
			continue;
		} else if (data[i] == 10) { // \n found
			if (message.substr(0,2).compare("+V") == 0) {
				//parent->fwVersion = atoi(message.substr(2).c_str());
				printf("Firmware version: %s\n", message.substr(2).c_str());
			} else if (message.substr(0,2).compare("+R") == 0) {
				Manager *manager = Manager::getInstance();
				manager->parseMessage(message.substr(2));
			}
			message.clear();
		} else { // Append the character
			message.append( 1, data[i] );
		}
	}
}
