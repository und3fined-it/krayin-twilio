<?php

return [
    [
        'key' => 'twilio',
        'name' => 'twilio::app.name',
        'sort' => 1,
    ],
    [
        'key' => 'twilio.general',
        'name' => 'twilio::app.general_settings',
        'sort' => 1,
        'fields' => [
            [
                'name' => 'api_account_sid',
                'title' => 'twilio::app.api_account_sid',
                'type' => 'password',
            ],
            [
                'name' => 'api_auth_token',
                'title' => 'twilio::app.api_auth_token',
                'type' => 'password',
            ]
        ],
    ],
];
