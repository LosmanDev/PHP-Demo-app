<?php

namespace Core;

class Validator
{
    // Validates if a string has a length within the specified range.
    public static function string($value, $min = 1, $max = INF)
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    // Validates if a string is a valid email address.
    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
