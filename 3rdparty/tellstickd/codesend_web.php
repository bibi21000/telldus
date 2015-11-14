<!--
Used to send commands via codesend (from 433Utils) from the web.
Use a Url like <IP address?code=nnnnn
Code taken from cscodes.conf

-->

<?php
header('Content-Type: text/xml');

// Find codesend executable
$command = "whereis codesend";
//Run command, result in $output
$output=shell_exec($command." 2>&1"); 
//Print result
echo "<?xml version=\"1.0\" ?>";
echo "<command><result>$output. ($command)</result>";
echo "</command>";
exit;

//Get values
$code = $_GET['code'];

//Check values
if ($code == "null") {
        $output = "No code!";
        echo "<?xml version=\"1.0\" ?>";
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
