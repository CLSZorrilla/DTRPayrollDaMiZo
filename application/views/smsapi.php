<?php

include "smsGateway.php";
function sendMsg($cNo, $msg){

	$smsGateway = new SmsGateway('CLSZorrilla@gmail.com', 'christian28');

	$deviceID = 37202;
	$number = $cNo;
	$message = $msg;

	$result = $smsGateway->sendMessageToNumber($number, $message, $deviceID);
}
?>