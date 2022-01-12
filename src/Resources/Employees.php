<?php

namespace Dcblogdev\Xero\Resources;

use Dcblogdev\Xero\Facades\XeroPayroll;

class Employees extends XeroPayroll
{
    public function get(int $page = 1, string $where = null)
    {
        $params = http_build_query([
            'page' => $page,
            'where' => $where
        ]);

        $result = XeroPayroll::get('employees?'.$params);

        return $result['body']['Employees'];
    }

    public function find(string $employeeId)
    {
        $result = XeroPayroll::get('employees/'.$employeeId);

        return $result['body']['Employees'][0];
    }

    public function update(string $employeeId, array $data)
    {
        $result = XeroPayroll::post('employees/'.$employeeId, $data);

        return $result['body']['Employees'][0];
    }

    public function store(array $data) 
    {
        $result = XeroPayroll::post('employees', $data);

        return $result['body']['Employees'][0];
    }
}