<?php

namespace Dcblogdev\Xero\Resources;

use Dcblogdev\Xero\Facades\Xero;

class Payitems extends Xero
{
    public function get(int $page = 1, string $where = null)
    {
        $params = http_build_query([
            'page' => $page,
            'where' => $where
        ]);

        $result = Xero::get('payitems?'.$params);

        return $result['body']['PayItems'];
    }

    public function find(string $payItemId)
    {
        $result = Xero::get('payitems/'.$payItemId);

        return $result['body']['PayItems'][0];
    }

    public function update(string $payItemId, array $data)
    {
        $result = Xero::post('payitems/'.$payItemId, $data);

        return $result['body']['PayItems'][0];
    }

    public function store(array $data) 
    {
        $result = Xero::post('payitems', $data);

        return end($result['body']['PayItems']['EarningsRates']);
    }
}