<?php

// modify this file then remove these two lines
echo "MAKE SURE YOU HAVE MODIFIED config.php";
exit;

$config = array(
  "pusher" => array(
    "key" => "",
    "secret" => "",
    "app_id" => ""
  )
);

define("ACCOUNT_SID",     "");
define("AUTH_TOKEN",      "");
define("TWILIO_NUMBER",   "");
define("MY_PHONE_NUMBER", "");
define("MY_USERNAME",     "");



function get_code_for_user($user = "") {
  return "WJEKC";
}
function get_phone_number_for_user($user = "") {
  return MY_PHONE_NUMBER;
}