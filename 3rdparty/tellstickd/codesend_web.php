<?php
header('Content-Type: text/xml');
echo "<?xml version=\"1.0\" ?>";

/*
Used to send commands via codesend (from 433Utils) from the web.
Use a Url like <IP address?code=nnnnn
Code taken from cscodes.conf
*/
// Find codesend executable
$command = "whereis codesend";
//Run command, result in $output
$output=shell_exec($command." 2>&1");
// Something like "codesend: /usr/local/bin/codesend"
// Split
$pieces = explode(" ", $output);
$codesend_cmd=$pieces[1];
$cmdlen = strlen($codesend_cmd);

if ($cmdlen==0) {
        // Codesend not found
        echo "<command><result>Error, install codesend from 433Utils.</result></command>";
        exit;
}

//Print result
//echo "<command><result>$codesend_cmd</result>";
//echo "</command>";

//Get values
$code = $_GET['code'];
$codelen = strlen($code);
if ($codelen==0) {
        // Code not found
        echo "<command><result>Error, no code given.</result></command>";
        exit;
}

$command = "'$codesend_cmd $code'";
//$command = "rfcmd /dev/$port $proto $house $channel $onoffnum";
$command = "$codesend_cmd $code";

//Run command, result in $output
//$output = shell_exec('$codesend_cmd '.$code);
// $page = shell_exec('/tmp/my_script.php "{$my_url}" "{$my_refer}"');
//$output=shell_exec($command." 2>&1");
$output=shell_exec("$command 2>&1"); 
//$output="Command sent";

//Return result
echo "<command><result>$output. ($command)</result>";
echo "</command>";
?>
