<?php

namespace Dcblogdev\Xero\Resources;

use Dcblogdev\Xero\Facades\Xero;

class Employees extends Xero
{
    public function get(int $page = 1, string $where = null)
    {
        $params = http_build_query([
            'page' => $page,
            'where' => $where
        ]);

        $result = Xero::get('employees?'.$params);

        return $result['body']['Employees'];
    }

    public function find(string $employeeId)
    {
        $result = Xero::get('employees/'.$employeeId);

        return $result['body']['Employees'][0];
    }

    public function update(string $employeeId, array $data)
    {
        $result = Xero::post('employees/'.$employeeId, $data);

        return $result['body']['Employees'][0];
    }

    public function store(array $data) 
    {
        $result = Xero::post('employees', $data);

        return $result['body']['Employees'][0];
    }
}