<?php

use Undefined\Krayin\Twilio\Helpers\Dashboard;

return [
    [
        "selected"      => true,
        "card_id"       => "sms",
        "sort"          => 1,
        "card_type"     => "column-grid-2",
        "data_class"    => "column-grid-2",
        "view_url"      => "admin.twilio.sms.index",
        "label"         => 'twilio::package.sms.name',
        'class_name' => Dashboard::class,
        'method_name' => 'getSMS'
    ]
];