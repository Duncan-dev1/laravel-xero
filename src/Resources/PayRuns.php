<?php

namespace Dcblogdev\Xero\Resources;

use Dcblogdev\Xero\Facades\XeroPayroll;

class PayRuns extends XeroPayroll
{
    public function get(int $page = 1, string $where = null)
    {
        $params = http_build_query([
            'page' => $page,
            'where' => $where
        ]);

        $result = XeroPayroll::get('payruns?'.$params);

        return $result['body']['PayRuns'];
    }

    public function find(string $payRunId)
    {
        $result = XeroPayroll::get('payruns/'.$payRunId);

        return $result['body']['PayRuns'][0];
    }

    public function update(string $payRunId, array $data)
    {
        $result = XeroPayroll::post('payruns/'.$payRunId, $data);

        return $result['body']['PayRuns'][0];
    }

    public function store(array $data) 
    {
        $result = XeroPayroll::post('payruns', $data);

        return $result['body']['PayRuns'][0];
    }
}