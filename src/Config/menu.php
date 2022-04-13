<?php

return [
    [
        'key' => 'twilio',
        'name' => "twilio::package.app.name",
        'route' => 'admin.twilio.sms.index',
        'sort' => 1,
        'icon-class' => 'twilio-icon'
    ],
    [
        'key' => 'twilio.sms',
        'name' => "twilio::package.sms.name",
        'route' => 'admin.twilio.sms.index',
        'sort' => 1,
        'icon-class' => 'twilio-icon',
    ],
    [
        'key' => 'twilio.sms.compose',
        'name' => "twilio::package.sms.name",
        'route' => 'admin.twilio.sms.create',
        'sort' => 1,
        'icon-class' => 'twilio-icon',
    ]
];