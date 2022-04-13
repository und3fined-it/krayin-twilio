<?php

return [
    [
        'key' => 'twilio',
        'name' => 'twilio::package.app.name',
        'sort' => 1,
    ],
    [
        'key' => 'twilio.general',
        'name' => 'twilio::package.config.general_settings',
        'sort' => 1,
        'fields' => [
            [
                'name' => 'api_account_sid',
                'title' => 'twilio::package.config.api_account_sid',
                'type' => 'password',
            ],
            [
                'name' => 'api_auth_token',
                'title' => 'twilio::package.config.api_auth_token',
                'type' => 'password',
            ]
        ],
    ],
];
