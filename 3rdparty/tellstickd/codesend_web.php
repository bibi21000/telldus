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
echo "<command><result>$codesend_cmd</result>";
echo "</command>";

//Get values
$code = $_GET['code'];
$codelen = strlen($code);
if ($codelen==0) {
        // Code not found
        echo "<command><result>Error, no code given.</result></command>";
        exit;
}

//Check values
if ($code == "null") {
        $output = "No code!";
        echo "<command><result>$output</result>";
        echo "</command>";
        exit;
}

//rfcmd DEVICE PROTOCOL [PROTOCOL_ARGUMENTS]
$command = "rfcmd /dev/$port $proto $house $channel $onoffnum";

//Run command, result in $output
$output=shell_exec($command." 2>&1"); 
$output="Command sent";

//Return result
echo "<?xml version=\"1.0\" ?>";
echo "<command><result>$output. ($command)</result>";
echo "</command>";
?>
