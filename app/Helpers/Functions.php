<?php

use Illuminate\Support\Str;


if (!function_exists('formatDatetime')) {

    /**
     * Format datetime
     *
     * @param int $timestamp Time timestamp parameter is an integer Unix timerstamp
     */

    function formatDatetime($timestamp)
    {
        // Get configuration from db

        return date('m/d/Y h:i:s A', strtotime($timestamp));
    }
}

if (!function_exists('pluralized')) {

    function pluralized($word, $size)
    {
        return ($size > 1) ? sprintf('%ss', $word) : $word;
    }
}

if (!function_exists('maskEmail')) {
    function maskEmail($email)
    {
        $parts = explode('@', $email);
        $username = $parts[0];
        $domain = $parts[1];

        $usernameLength = strlen($username);
        $maskedUsername = substr($username, 0, 2) . str_repeat('*', $usernameLength - 4) . substr($username, -2);

        return $maskedUsername . '@' . $domain;
    }
}

if (!function_exists('convertToSnakeCase')) {

    function convertToSnakeCase($string)
    {
        // Replace spaces with underscores
        $string = str_replace(' ', '_', $string);

        // Convert to lowercase
        $string = strtolower($string);

        return $string;
    }
}
