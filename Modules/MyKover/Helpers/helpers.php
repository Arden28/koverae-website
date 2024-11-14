<?php

if (!function_exists('maskCreditCard')) {
    function maskCreditCard($cardNumber)
    {
        // Get the last 4 characters of the card number
        $lastFour = substr($cardNumber, -4);

        // Mask the rest of the card number with 'X' and add a hyphen before the last four characters
        $masked = str_repeat('X', strlen($cardNumber) - 4) . '-' . $lastFour;

        return $masked;
    }
}
