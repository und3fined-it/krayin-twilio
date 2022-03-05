<?php

namespace Undefined\Krayin\Twilio\Services;

use Twilio\Rest\Client;

class TwilioService {

    private $account_sid;
    private $auth_token;

    private $client;

    public function __construct()
    {
        $krayinCore = core();

        $this->account_sid = $krayinCore->getConfigData(
            "twilio.general.api_account_sid"
        );
        $this->auth_token = $krayinCore->getConfigData(
            "twilio.general.api_auth_token"
        );

        if ($this->account_sid == null || $this->auth_token == null) {
            throw new \Exception("Missing data.");
        }

        $this->client = new Client($this->account_sid, $this->auth_token);
    }

    public function sendSMS($to, $body, $statusCallback = "") {
        return $this->client->messages
            ->create($to,
                [
                    "body" => $body,
                    "messagingServiceSid" => "MG98ea9d5a025a5dc09d9812b751bd64c4",
                    "statusCallback" => $statusCallback
                ]
            );
    }
}