<?php

namespace Undefined\Krayin\Twilio\Models;

use Illuminate\Database\Eloquent\Model;
use Undefined\Krayin\Twilio\Contracts\SmsContract;

class SMS extends Model implements SmsContract {
     /**
     * The table associated with the model.
     * @var string $table
     */
    protected $table = 'twilio_sms';

    /**
     * The attributes that are mass assignable.
     * @var array $fillable
     */
    protected $fillable = [
        'sid',
        'to',
        'body',
        'status',
    ];

    /**
     * Attributes which are not fillable using fill() method.
     * @var array $guarded
     */
    protected $guarded = ['id'];
}