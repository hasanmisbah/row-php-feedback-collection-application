<?php

namespace Hasanmisbah\FeedbackApplication\Core\Request;

class Request
{
    protected $request = null;
    protected $inputs = [];

    protected $server = null;

    public function __construct()
    {
        $this->request = $_REQUEST;
        $this->server = $_SERVER;
        $this->inputs = array_merge($_GET, $_POST);
    }

    public function all()
    {
        return $this->inputs;
    }

    public function get($key, $default = null)
    {
        return $this->inputs[$key] ?? $default;
    }

    public function has($key)
    {
        return isset($this->inputs[$key]);
    }

    public function only($keys)
    {
        $data = [];
        foreach ($keys as $key) {
            $data[$key] = $this->inputs[$key] ?? null;
        }
        return $data;
    }

    public function except($keys)
    {
        $data = [];
        foreach ($this->inputs as $key => $value) {
            if (!in_array($key, $keys)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }

    public function input($key, $default = null)
    {
        return $this->get($key, $default);
    }

    public function __get($name)
    {
        return $this->get($name);
    }

    public function __call($name, $arguments = [])
    {
        return $this->get($name);
    }

    public static function capture()
    {
        return new static();
    }

    public function server($name)
    {
        return $this->server[$name] ?? null;
    }
}
