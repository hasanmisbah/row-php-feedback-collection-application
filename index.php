<?php

require_once __DIR__ . '/vendor/autoload.php';

call_user_func(function ($bootstrap) {
    return $bootstrap(__DIR__);
}, require(__DIR__ . '/boot/application.php'));
