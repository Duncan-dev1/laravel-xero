<?php

namespace Dcblogdev\Xero\Resources;

use Dcblogdev\Xero\Facades\XeroPayroll;

class Payslips extends XeroPayroll
{
    public function get(int $page = 1, string $where = null)
    {
        $params = http_build_query([
            'page' => $page,
            'where' => $where
        ]);

        $result = XeroPayroll::get('payslips?'.$params);

        return $result['body']['Payslips'];
    }

    public function find(string $payslipId)
    {
        $result = XeroPayroll::get('payslips/'.$payslipId);

        return $result['body']['Payslips'][0];
    }

    public function update(string $payslipId, array $data)
    {
        $result = XeroPayroll::post('payslips/'.$payslipId, $data);

        return $result['body']['Payslips'][0];
    }

    public function store(array $data) 
    {
        $result = XeroPayroll::post('payslips', $data);

        return $result['body']['Payslips'][0];
    }
}