<?php
require_once APPPATH.'vendor/twilio/Twilio.php';


class Twilio {
    public static function send_download_link($to) {
        // Instantiate a new Twilio Rest Client
        $twilio = new Services_Twilio(Kohana::config("twilio.AccountSid"), Kohana::config("twilio.AuthToken"));

        $twilio->account->sms_messages->create(Kohana::config("twilio.number"), $to, Kohana::config("twilio.message"));
    }
}