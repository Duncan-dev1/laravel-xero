<?php

namespace Dcblogdev\Xero\Resources;

use Dcblogdev\Xero\Facades\Xero;

class Timesheets extends Xero
{
    public function get(int $page = 1, string $where = null)
    {
        $params = http_build_query([
            'page' => $page,
            'where' => $where
        ]);

        $result = Xero::get('timesheets?'.$params);

        return $result['body']['Timesheets'];
    }

    public function find(string $timesheetId)
    {
        $result = Xero::get('timesheets/'.$timesheetId);

        return $result['body']['Timesheets'][0];
    }

    public function update(string $timesheetId, array $data)
    {
        $result = Xero::post('timesheets/'.$timesheetId, $data);

        return $result['body']['Timesheets'][0];
    }

    public function store(array $data) 
    {
        $result = Xero::post('timesheets', $data);

        return $result['body']['Timesheets'][0];
    }
}