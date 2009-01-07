#pragma once
#include "DeviceNexa.h"
#include <string>

class DeviceWaveman : public DeviceNexa
{
public:
	DeviceWaveman(const std::string &strHouse, const std::string &strCode);
	virtual int turnOff(void);
	virtual int methods(int methodsSupported);
};