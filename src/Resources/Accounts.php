<?php

namespace Dcblogdev\Xero\Resources;

use Dcblogdev\Xero\Facades\Xero;

class Accounts extends Xero
{
    public function get(int $page = 1, string $where = null)
    {
        $params = http_build_query([
            'page' => $page,
            'where' => $where
        ]);

        $result = Xero::get('accounts?'.$params);

        return $result['body']['Accounts'];
    }

    public function find(string $accountId)
    {
        $result = Xero::get('accounts/'.$accountId);

        return $result['body']['Accounts'][0];
    }

    public function update(string $accountId, array $data)
    {
        $result = Xero::post('accounts/'.$accountId, $data);

        return $result['body']['Accounts'][0];
    }

    public function store(array $data) 
    {
        $result = Xero::post('accounts', $data);

        return $result['body']['Accounts'][0];
    }

    public function createAccount(array $data)
    {
        $result = Xero::put('accounts', $data);

        return $result['body']['Accounts'][0];
    }
}