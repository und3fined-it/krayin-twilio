<?php

namespace Undefined\Krayin\Twilio\Providers;

use Webkul\Core\Providers\BaseModuleServiceProvider;
use Undefined\Krayin\Twilio\Models\Sms;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        SMS::class
    ];
}