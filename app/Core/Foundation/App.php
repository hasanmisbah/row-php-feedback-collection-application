<?php

namespace Hasanmisbah\FeedbackApplication\Core\Foundation;

class App
{
    static $instance = null;

    public static function setInstance($instance)
    {
        static::$instance = $instance;
    }

    public static function getInstance()
    {
        return static::$instance;
    }

    public static function instance($name)
    {
        return static::$instance->get($name);
    }
}
