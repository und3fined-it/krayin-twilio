<?php

namespace Undefined\Krayin\Twilio\Helpers;

use Undefined\Krayin\Twilio\Repositories\SMSRepository;

class Dashboard
{
    private $smsRepository;

    public function __construct(SMSRepository $smsRepository)
    {
        $this->smsRepository = $smsRepository;
    }
    
    /**
     * Collect SMS data.
     *
     * @param  string  $startDateFilter
     * @param  string  $endDateFilter
     * @param  array  $totalWeeks
     * @return array
     */
    public function getSMS($startDateFilter, $endDateFilter)
    {
        $smsCollection = $this->smsRepository
            ->whereBetween('created_at', [$startDateFilter, $endDateFilter])
            ->get();

        $cardData = [
            "data" => [
                [
                    'label' => __("twilio::package.sms.total"),
                    'count' => count($smsCollection)
                ], [
                    'label' => __("twilio::package.sms.outbox"),
                    'count' => count($smsCollection)
                ],
            ]
        ];

        return $cardData;
    }
}
