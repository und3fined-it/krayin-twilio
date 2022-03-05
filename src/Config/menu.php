<?php

return [
    [
        'key' => 'sms',
        'name' => "SMS",
        'route' => 'admin.sms.index',
        'sort' => 1,
        'icon-class' => 'temp-icon',
    ],
    [
        'key' => 'sms.create',
        'name' => "Compose",
        'route' => 'admin.sms.create',
        'sort' => 2,
        'icon-class' => 'temp-icon',
    ],
    [
        'key' => 'sms.index',
        'name' => "Outbox",
        'route' => 'admin.sms.index',
        'sort' => 2,
        'icon-class' => 'temp-icon',
    ]
];