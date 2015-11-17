 <!doctype html>
<html>
  <head>
    <title></title>
    <meta content="">
	<style rel="stylesheet" type="text/css">
	.main {
  	margin: 15px;
  	padding: 7px 7px 7px 11px;
  	width: 120px;
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
	});
  	$("#btn2").click(function(){
	    $.get('codesend_web.php', 'code=1052692', null, "xml")
	    $('#status').text('Command sent'); 
	});
	$("#btn3").click(function(){
	    $.get('codesend_web.php', 'code=5586965', null, "xml")
	    $('#status').text('Command sent'); 
	});
	$("#btn4").click(function(){
	    $.get('codesend_web.php', 'code=5586964', null, "xml")
	    $('#status').text('Command sent'); 
	});
	$("#btn5").click(function(){
	    $.get('codesend_web.php', 'code=16405', null, "xml")
	    $('#status').text('Command sent'); 
	});
	$("#btn6").click(function(){
	    $.get('codesend_web.php', 'code=16404', null, "xml")
	    $('#status').text('Command sent'); 
	});
	$("#btn7").click(function(){
	    $.get('codesend_web.php', 'code=1381719', null, "xml")
	    $('#status').text('Command sent'); 
	});
	$("#btn8").click(function(){
	    $.get('codesend_web.php', 'code=1381716', null, "xml")
	    $('#status').text('Command sent'); 
	});
	$("#btn9").click(function(){
	    $.get('codesend_web.php', 'code=1394007', null, "xml")
	    $('#status').text('Command sent'); 
	});
	$("#btn10").click(function(){
	    $.get('codesend_web.php', 'code=1394004', null, "xml")
	    $('#status').text('Command sent'); 
	});
	$("#btn11").click(function(){
	    $.get('codesend_web.php', 'code=1048597', null, "xml")
	    $('#status').text('Command sent'); 
	});
	$("#btn12").click(function(){
	    $.get('codesend_web.php', 'code=1048596', null, "xml")
	    $('#status').text('Command sent'); 
	});
    }); 
    </script>

<div id="status"></div>
<br>
<button id="btn1" class="main">Vrum on</button>
<button id="btn2" class="main">Vrum off</button>
<br>
<button id="btn3" class="main">Porch on</button>
<button id="btn4" class="main">Porch off</button>
<br>
<button id="btn5" class="main">Vrum spot on</button>
<button id="btn6" class="main">Vrum Spot off</button>
<br>
<button id="btn7" class="main">Månlampa on</button>
<button id="btn8" class="main">Månlampa off</button>
<br>
<button id="btn9" class="main">Garden on</button>
<button id="btn10" class="main">Garden off</button>
<br>
<button id="btn11" class="main">Vrum fönster on</button>
<button id="btn12" class="main">Vrum fönsteroff</button>
<br>


</body>
</html>
