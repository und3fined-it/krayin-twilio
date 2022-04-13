<?php

Route::group([
        'prefix'        => 'admin/twilio/sms',
        'middleware'    => ['web', 'user']
    ], function () {

        Route::get('/outbox', 'Undefined\Krayin\Twilio\Http\Controllers\SMSController@index')->name('admin.twilio.sms.index');
        Route::get('/compose', 'Undefined\Krayin\Twilio\Http\Controllers\SMSController@create')->name('admin.twilio.sms.create');
        Route::post('/compose', 'Undefined\Krayin\Twilio\Http\Controllers\SMSController@store')->name('admin.twilio.sms.store');
});

Route::group([
    'prefix'        => 'admin/twilio/sms',
    'middleware'    => ['api']
], function () {
    Route::post('/statusCallback', 'Undefined\Krayin\Twilio\Http\Controllers\SMSController@statusCallback')->name('admin.twilio.sms.statusCallback');
});