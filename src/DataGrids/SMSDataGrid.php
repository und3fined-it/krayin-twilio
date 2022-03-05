<?php

namespace Undefined\Krayin\Twilio\DataGrids;

use Illuminate\Support\Facades\DB;
use Webkul\UI\DataGrid\DataGrid;

class SMSDataGrid extends DataGrid
{
    /**
     * Prepare query builder.
     *
     * @return void
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('twilio_sms')
            ->orderByDesc("id")
            ->select();

        $this->setQueryBuilder($queryBuilder);
    }

    /**
     * Add columns.
     *
     * @return void
     */
    public function addColumns()
    {
        $this->addColumn([
            'index'    => 'sid',
            'label'    => trans('twilio::package.sms.sid'),
            'type'     => 'string'
        ]);

        $this->addColumn([
            'index'    => 'to',
            'label'    => trans('twilio::package.sms.sent-to'),
            'type'     => 'string'
        ]);

        $this->addColumn([
            'index'    => 'body',
            'label'    => trans('twilio::package.sms.body'),
            'type'     => 'string'
        ]);

        $this->addColumn([
            'index'    => 'status',
            'label'    => trans('twilio::package.sms.status'),
            'type'     => 'string'
        ]);

        $this->addColumn([
            'index'      => 'created_at',
            'label'      => trans('twilio::package.sms.created_at'),
            'type'       => 'date_range',
            'searchable' => false,
            'sortable'   => true,
            'closure'    => function ($row) {
                return core()->formatDate($row->created_at);
            },
        ]);
    }

    /**
     * Prepare actions.
     *
     * @return void
     */
    public function prepareActions()
    {
        
    }

    /**
     * Prepare mass actions.
     *
     * @return void
     */
    public function prepareMassActions()
    {
        
    }
}
