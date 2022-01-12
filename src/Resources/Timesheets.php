<?php

namespace Dcblogdev\Xero\Resources;

use Dcblogdev\Xero\Facades\XeroPayroll;

class Timesheets extends XeroPayroll
{
    public function get(int $page = 1, string $where = null)
    {
        $params = http_build_query([
            'page' => $page,
            'where' => $where
        ]);

        $result = XeroPayroll::get('timesheets?'.$params);

        return $result['body']['Timesheets'];
    }

    public function find(string $timesheetId)
    {
        $result = XeroPayroll::get('timesheets/'.$timesheetId);

        return $result['body']['Timesheets'][0];
    }

    public function update(string $timesheetId, array $data)
    {
        $result = XeroPayroll::post('timesheets/'.$timesheetId, $data);

        return $result['body']['Timesheets'][0];
    }

    public function store(array $data) 
    {
        $result = XeroPayroll::post('timesheets', $data);

        return $result['body']['Timesheets'][0];
    }
}