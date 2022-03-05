<?php

Route::group([
        'prefix'        => 'admin/sms',
        'middleware'    => ['web', 'user']
    ], function () {

        Route::get('', 'Undefined\Krayin\Twilio\Http\Controllers\SMSController@index')->name('admin.sms.index');
        Route::get('/compose', 'Undefined\Krayin\Twilio\Http\Controllers\SMSController@create')->name('admin.sms.create');
        Route::post('/compose', 'Undefined\Krayin\Twilio\Http\Controllers\SMSController@store')->name('admin.sms.store');
});

Route::group([
    'prefix'        => 'admin/sms',
    'middleware'    => ['api']
], function () {
    Route::post('/statusCallback', 'Undefined\Krayin\Twilio\Http\Controllers\SMSController@statusCallback')->name('admin.sms.statusCallback');
});