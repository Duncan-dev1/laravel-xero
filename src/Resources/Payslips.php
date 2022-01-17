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

        $result = XeroPayroll::get('payslip?'.$params);

        return $result['body']['Payslip'];
    }

    public function find(string $payslipId)
    {
        $result = XeroPayroll::get('payslip/'.$payslipId);

        return $result['body']['Payslip'][0];
    }

    public function update(string $payslipId, array $data)
    {
        $result = XeroPayroll::post('payslip/'.$payslipId, $data);

        return $result['body']['Payslip'][0];
    }

    public function store(array $data) 
    {
        $result = XeroPayroll::post('payslip', $data);

        return $result['body']['Payslip'][0];
    }
}