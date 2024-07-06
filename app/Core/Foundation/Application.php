<?php

namespace Hasanmisbah\FeedbackApplication\Core\Foundation;

class Application
{
    protected $basePath = null;

    protected static $instance = null;

    protected $bindings = [];

    public function __construct($dir)
    {
        $this->basePath = $dir;
    }

    /**
     * Create a new Application instance
     * @return Application
     * */
    public static function create($dir)
    {
        if (is_null(static::$instance)) {
            static::$instance = new static($dir);
        }

        return static::$instance;
    }

    public function make($class, $arguments = [])
    {
        if($class instanceof \Closure) {
            return call_user_func_array($class, $arguments);
        }

        return new $class($this);
    }

    public function bind($abstract, $concrete)
    {
        $this->bindings[$abstract] = $concrete;
        return $this;
    }

    public function get($name)
    {
        $bindings =  $this->bindings[$name];
        return $bindings;
    }

    public function set($name, $value)
    {
        $this->bindings[$name] = $value;
        return $this;
    }

    public function __get($name)
    {
        return $this->get($name);
    }

    public function __set($name, $value)
    {
        return $this->set($name, $value);
    }

    public function __call($name, $arguments = [])
    {
        return $this->call($name, $arguments);
    }

    public function call($name, $arguments = [])
    {
        return CallableFactory::call($this, $name, $arguments);
    }

    public function getBasePath()
    {
        return $this->basePath;
    }


}
