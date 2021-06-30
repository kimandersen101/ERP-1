<?php


namespace App\Helpers;


class UserHelper
{
    static public function clean_number($number)
    {
        return !empty($number) ? trim(preg_replace('/[^0-9+]+/', '', $number)) : '';
    }

    static public function format_ssn($ssn)
    {
        if (!empty($ssn)) {
            $ssn = self::clean_number($ssn);
            $ssn = substr($ssn, -10);
            return substr($ssn, 0, 3) . "-" . substr($ssn, 3, 2) . "-" . substr($ssn, 5);
        } else
            return $ssn;
    }
    static public function formatPhone($phone)
    {
        return '(' . substr($phone, 0, 3) . ") " . substr($phone, 3, 3) . "-" . substr($phone, 6);
    }

}
