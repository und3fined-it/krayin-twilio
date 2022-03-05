<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// SMS
Breadcrumbs::for('sms', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push(trans('SMS'), route('admin.sms.index', ['route' => 'inbox']));
});

// SMS > Compose a SMS
Breadcrumbs::for('sms.compose', function (BreadcrumbTrail $trail) {
    $trail->parent('sms');
    $trail->push(__('twilio::package.sms.compose-a-sms'), route('admin.sms.create'));
});