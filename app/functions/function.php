<?php

if (!function_exists('view')) {
    function view($view, $data = [])
    {
        $instance = \Hasanmisbah\FeedbackApplication\App::instance('view');
        $view = str_replace('.', DIRECTORY_SEPARATOR, $view);
        extract($data);
        return $instance()->render($view, $data);
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

if(!function_exists('generateUniqueString')) {
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
        if (isAuthenticated()) {
            return $_SESSION['icff_user'];
        }

        return null;

    }
}

if(!function_exists('isAuthenticated')) {
    function isAuthenticated()
    {
        return !empty($_SESSION['icff_user']);
    }
}
