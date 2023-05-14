<?php

namespace Dcblogdev\Xero\Resources;

use Dcblogdev\Xero\Facades\XeroPayroll;

class Payitems extends XeroPayroll
{
    public function get(int $page = 1, string $where = null)
    {
        $params = http_build_query([
            'page' => $page,
            'where' => $where
        ]);

        $result = XeroPayroll::get('payitems?'.$params);

        return $result['body']['PayItems'];
    }

    public function find(string $payItemId)
    {
        $result = XeroPayroll::get('payitems/'.$payItemId);

        return $result['body']['PayItems'][0];
    }

    public function update(string $payItemId, array $data)
    {
        $result = XeroPayroll::post('payitems/'.$payItemId, $data);

        return $result['body']['PayItems'][0];
    }

    public function store(array $data) 
    {
        $result = XeroPayroll::post('payitems', $data);

        return $result['body']['PayItems'];
    }
}