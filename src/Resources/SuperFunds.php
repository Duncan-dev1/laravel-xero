<?php

namespace Dcblogdev\Xero\Resources;

use Dcblogdev\Xero\Facades\XeroPayroll;

class SuperFunds extends XeroPayroll
{
    public function get(int $page = 1, string $where = null)
    {
        $params = http_build_query([
            'page' => $page,
            'where' => $where
        ]);

        $result = XeroPayroll::get('superfunds?'.$params);

        return $result['body']['SuperFunds'];
    }

    public function find(string $superFundId)
    {
        $result = XeroPayroll::get('superfunds/'.$superFundId);

        return $result['body']['SuperFunds'][0];
    }

    public function update(string $superFundId, array $data)
    {
        $result = XeroPayroll::post('superfunds/'.$superFundId, $data);

        return $result['body']['SuperFunds'][0];
    }

    public function store(array $data) 
    {
        $result = XeroPayroll::post('superfunds', $data);

        return $result['body']['SuperFunds'][0];
    }
}