<?php

if (!function_exists('view')) {
    function view($view, $data = [])
    {
        return \Hasanmisbah\FeedbackApplication\Core\Response\Response::view($view, $data);
    }
}

if (!function_exists('asset')) {
    function asset($path)
    {
        echo '/app/assets/' . $path;
    }
}

if (!function_exists('request')) {
    function request()
    {
        $instance = \Hasanmisbah\FeedbackApplication\App::instance('request');
        return $instance();
    }
}

if (!function_exists('generateUniqueString')) {
    function generateUniqueString($length = 32)
    {
        // Ensure the length is at least 1 and a reasonable maximum (like 128).
        if ($length < 1 || $length > 128) {
            throw new InvalidArgumentException('Length must be between 1 and 128');
        }

        // Generate a unique string with uniqid and random_bytes.
        $uniqueString = uniqid(bin2hex(random_bytes($length / 2)), true);

        // Replace non-alphanumeric characters to ensure the string is valid.
        $uniqueString = preg_replace('/[^a-zA-Z0-9]/', '', $uniqueString);

        // Ensure the string is the requested length.
        return substr($uniqueString, 0, $length);
    }
}

if (!function_exists('authenticatedUser')) {
    function authenticatedUser()
    {
        return \Hasanmisbah\FeedbackApplication\Core\Auth\Auth::user();
    }
}

if (!function_exists('isAuthenticated')) {
    function isAuthenticated()
    {
        return \Hasanmisbah\FeedbackApplication\Core\Auth\Auth::check();
    }
}
