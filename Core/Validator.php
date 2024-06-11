<?php

namespace Core;

class Validator
{
    /**
     * Validates if a string has a length within the specified range.
     *
     * @param string $value The string to be validated.
     * @param int $min The minimum length allowed (default: 1).
     * @param int $max The maximum length allowed (default: INF).
     * @return bool True if the string length is within the specified range, false otherwise.
     */
    public static function string($value, $min = 1, $max = INF)
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    /**
     * Validates if a string is a valid email address.
     *
     * @param string $value The string to be validated.
     * @return bool True if the string is a valid email address, false otherwise.
     */
    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
