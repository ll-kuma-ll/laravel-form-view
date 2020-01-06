<?php
/*
 |-----------------------
 |    Mock for Helper
 |-----------------------
 */

if (!function_exists('old')) {
    function old(string $field, $default) {
        return $default;
    }
}

if (!function_exists('collect')) {
    function collect($arr = []) {
        return new \Illuminate\Support\Collection($arr);
    }
}