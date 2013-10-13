<?php
require_once("config.php");


// fetch data about the user
$to = get_phone_number_for_user($_POST['username']);
$code = get_code_for_user($_POST['username']);

// create the message to send to the user
$message = "Your code is: '$code'";

// include the twilio helper library and setup
require_once("twilio/Twilio.php");
$twilio = new Services_Twilio(ACCOUNT_SID, AUTH_TOKEN);

// use a twilio number to be the "from" number
$from = TWILIO_NUMBER;

// send the sms
$twilio->account->sms_messages->create( $from, $to, $message );

echo '{"success":true}';