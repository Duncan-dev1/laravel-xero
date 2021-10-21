<?php

namespace Dcblogdev\Xero\Resources;

use Dcblogdev\Xero\Facades\Xero;

class PayrollCalendars extends Xero
{
    public function get(int $page = 1, string $where = null)
    {
        $params = http_build_query([
            'page' => $page,
            'where' => $where
        ]);

        $result = Xero::get('payrollcalendars?'.$params);

        return $result['body']['PayrollCalendars'];
    }

    public function find(string $payrollcalendarId)
    {
        $result = Xero::get('payrollcalendars/'.$payrollcalendarId);

        return $result['body']['PayrollCalendars'][0];
    }

    public function update(string $payrollcalendarId, array $data)
    {
        $result = Xero::post('payrollcalendars/'.$payrollcalendarId, $data);

        return $result['body']['PayrollCalendars'][0];
    }

    public function store(array $data) 
    {
        $result = Xero::post('payrollcalendars', $data);

        return $result['body']['PayrollCalendars'][0];
    }
}