<?php

if (! function_exists('moneyFormat')) {
    function moneyFormat($amount, $locale = 'en_US')
    {
        // Create a NumberFormatter instance
        $formatter = new \NumberFormatter($locale, \NumberFormatter::CURRENCY);
        
        // Format the money
        $formattedAmount = $formatter->formatCurrency($amount, 'USD'); // Currency code (USD for US Dollar)
        
        return $formattedAmount; // Output: $1,234.56
    }
}

