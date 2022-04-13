<?php

return [
    [
        'key' => 'twilio',
        'name' => "twilio::package.app.name",
        'route' => 'admin.twilio.sms.index',
        'sort' => 1,
        'icon-class' => 'twilio-icon',
    ],
    [
        'key' => 'twilio.sms',
        'name' => "twilio::package.sms.name",
        'route' => 'admin.twilio.sms.index',
        'sort' => 1,
        'icon-class' => 'twilio-icon',
    ],
    [
        'key' => 'twilio.sms.create',
        'name' => "twilio::package.sms.compose",
        'route' => 'admin.twilio.sms.create',
        'sort' => 1,
        'icon-class' => 'twilio-icon',
    ],
    [
        'key' => 'twilio.sms.index',
        'name' => "twilio::package.sms.outbox",
        'route' => 'admin.twilio.sms.index',
        'sort' => 2,
        'icon-class' => 'twilio-icon',
    ]
];