<?php

namespace Undefined\Krayin\Twilio\Repositories;

use Webkul\Core\Eloquent\Repository;

class SMSRepository extends Repository {
    /**
     * Specify Model class name.
     * @return mixed
     */
    function model() {
        return 'Undefined\Krayin\Twilio\Models\SMS';
    }
}