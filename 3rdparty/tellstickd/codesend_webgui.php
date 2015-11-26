 <!doctype html>
<html>
  <head>
    <title>Codesend webgui</title>
    <meta content="">
    <meta name=viewport content='width=700'>

	<style rel="stylesheet" type="text/css">
	.main {
  	margin: 15px;
  	padding: 7px 7px 7px 11px;
  	width: 120px;
	}
		@media screen and (max-width: 900px) {
			html {
	  			background-color: #82a43a; 
			}
			.main {
			  	width: 300px;
				height: 100px;
				font-size: 24px;
				color: D6D0CE;
			}
		}

		#left {
		float:left;
		width:50%;
		background:#2BF042;
		}
		#right {
		float:right;
		width:50%;
		background:#E64915;
		}
		#status {
		font-size:24px;
		}

        </style>

  </head>
  <body>
     
    <script src="jquery.js"></script>
    <script>
 
    $( document ).ready(function() {
	$("#btn1").click(function(){
	    $.get('codesend_web.php', 'code=1052693', null, "xml")
	    $('#status').text('Command sent'); 
		 setTimeout(function(){
		        $('#status').fadeOut(500);
		    }, 3000);
	});
  	$("#btn2").click(function(){
	    $.get('codesend_web.php', 'code=1052692', null, "xml")
	    $('#status').text('Command sent'); 
	    setTimeout(function(){
		        $('#status').fadeOut(500);
		    }, 3000);
	});
	$("#btn3").click(function(){
	    $.get('codesend_web.php', 'code=5586965', null, "xml")
	    $('#status').text('Command sent');
	    setTimeout(function(){
		        $('#status').fadeOut(500);
		    }, 3000); 
	});
	$("#btn4").click(function(){
	    $.get('codesend_web.php', 'code=5586964', null, "xml")
	    $('#status').text('Command sent'); 
	    setTimeout(function(){
		        $('#status').fadeOut(500);
		    }, 3000);
	});
	$("#btn5").click(function(){
	    $.get('codesend_web.php', 'code=16405', null, "xml")
	    $('#status').text('Command sent'); 
	    setTimeout(function(){
		        $('#status').fadeOut(500);
		    }, 3000);
	});
	$("#btn6").click(function(){
	    $.get('codesend_web.php', 'code=16404', null, "xml")
	    $('#status').text('Command sent'); 
	    setTimeout(function(){
		        $('#status').fadeOut(500);
		    }, 3000);
	});
	$("#btn7").click(function(){
	    $.get('codesend_web.php', 'code=1381719', null, "xml")
	    $('#status').text('Command sent'); 
	    setTimeout(function(){
		        $('#status').fadeOut(500);
		    }, 3000);
	});
	$("#btn8").click(function(){
	    $.get('codesend_web.php', 'code=1381716', null, "xml")
	    $('#status').text('Command sent'); 
	    setTimeout(function(){
		        $('#status').fadeOut(500);
		    }, 3000);
	});
	$("#btn9").click(function(){
	    $.get('codesend_web.php', 'code=1394007', null, "xml")
	    $('#status').text('Command sent'); 
	    setTimeout(function(){
		        $('#status').fadeOut(500);
		    }, 3000);
	});
	$("#btn10").click(function(){
	    $.get('codesend_web.php', 'code=1394004', null, "xml")
	    $('#status').text('Command sent'); 
	    setTimeout(function(){
		        $('#status').fadeOut(500);
		    }, 3000);
	});
	$("#btn11").click(function(){
	    $.get('codesend_web.php', 'code=1048597', null, "xml")
	    $('#status').text('Command sent'); 
	    setTimeout(function(){
		        $('#status').fadeOut(500);
		    }, 3000);
	});
	$("#btn12").click(function(){
	    $.get('codesend_web.php', 'code=1048596', null, "xml")
	    $('#status').text('Command sent'); 
	    setTimeout(function(){
		        $('#status').fadeOut(500);
		    }, 3000);
	});
	$("#btn13").click(function(){
	    $.get('codesend_web.php', 'code=1064981', null, "xml")
	    $('#status').text('Command sent'); 
	    setTimeout(function(){
		        $('#status').fadeOut(500);
		    }, 3000);
	});
	$("#btn14").click(function(){
	    $.get('codesend_web.php', 'code=1064980', null, "xml")
	    $('#status').text('Command sent'); 
	    setTimeout(function(){
		        $('#status').fadeOut(500);
		    }, 3000);
	});
	$("#btn15").click(function(){
	    $.get('codesend_web.php', 'code=4198421', null, "xml")
	    $('#status').text('Command sent'); 
	    setTimeout(function(){
		        $('#status').fadeOut(500);
		    }, 3000);
	});
	$("#btn16").click(function(){
	    $.get('codesend_web.php', 'code=4198420', null, "xml")
	    $('#status').text('Command sent'); 
	    setTimeout(function(){
		        $('#status').fadeOut(500);
		    }, 3000);
	});
    }); 
    </script>

<div id="status"></div>
<div id="wrap">
	<div id="left">
		<button id="btn1" class="main">Vrum on</button>
		<button id="btn3" class="main">Porch on</button>
		<button id="btn5" class="main">Vrum spot on</button>
		<button id="btn7" class="main">Månlampa on</button>
		<button id="btn9" class="main">Garden on</button>
		<button id="btn11" class="main">Vrum fönster on</button>
		<button id="btn13" class="main">Hallen on</button>
		<button id="btn15" class="main">Kitchen on</button>
	</div>
	<div id="right">
		<button id="btn2" class="main">Vrum off</button>
		<button id="btn4" class="main">Porch off</button>
		<button id="btn6" class="main">Vrum Spot off</button>
		<button id="btn8" class="main">Månlampa off</button>
		<button id="btn10" class="main">Garden off</button>
		<button id="btn12" class="main">Vrum fönster off</button>
		<button id="btn14" class="main">Hallen off</button>
		<button id="btn16" class="main">Kitchen off</button>	
	</div>
</div>
</body>
</html>
