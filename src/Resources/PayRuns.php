<?php

namespace Dcblogdev\Xero\Resources;

use Dcblogdev\Xero\Facades\Xero;

class PayRuns extends Xero
{
    public function get(int $page = 1, string $where = null)
    {
        $params = http_build_query([
            'page' => $page,
            'where' => $where
        ]);

        $result = Xero::get('payruns?'.$params);

        return $result['body']['PayRuns'];
    }

    public function find(string $payRunId)
    {
        $result = Xero::get('payruns/'.$payRunId);

        return $result['body']['PayRuns'][0];
    }

    public function update(string $payRunId, array $data)
    {
        $result = Xero::post('payruns/'.$payRunId, $data);

        return $result['body']['PayRuns'][0];
    }

    public function store(array $data) 
    {
        $result = Xero::post('payruns', $data);

        return $result['body']['PayRuns'][0];
    }
}