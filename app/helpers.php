<?php

if (!function_exists('format_currency')) {
    function format_currency(?float $number = 0) {
        if ($number === null) {
            $number = 0;
        }
        return 'Rp' . number_format($number, 2, ',', '.');
    }
}