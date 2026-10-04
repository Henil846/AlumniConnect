<?php
namespace App\Core;

class CurrencyHelper {
    public static function formatINR($amount) {
        $amount = (string) $amount;
        $amount = str_replace(',', '', $amount);
        
        $parts = explode('.', $amount);
        $number = $parts[0];
        $decimals = isset($parts[1]) ? '.' . substr($parts[1], 0, 2) : '.00';
        
        // Ensure 2 decimal places if present, else .00
        if (strlen($decimals) === 2) $decimals .= '0';

        $lastThree = substr($number, -3);
        $restUnits = substr($number, 0, -3);
        
        if ($restUnits != '') {
            $lastThree = ',' . $lastThree;
            // Add comma every two digits
            $restUnits = preg_replace("/\B(?=(\d{2})+(?!\d))/", ",", $restUnits);
        }
        
        return '₹' . $restUnits . $lastThree . $decimals;
    }
}
