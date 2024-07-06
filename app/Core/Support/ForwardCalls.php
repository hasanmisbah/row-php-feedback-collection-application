<?php

namespace Hasanmisbah\FeedbackApplication\Core\Support;

trait ForwardCalls
{
    public function forwardTo()
    {
        throw new \Exception('Method not implemented');
    }
    protected function forwardCallTo($object, $method, $parameters)
    {
        return $object->{$method}(...$parameters);
    }

    public function __call($method, $parameters)
    {
        return $this->forwardCallTo($this->forwardTo(), $method, $parameters);
    }

    public static function __callStatic($method, $parameters)
    {
        return (new static)->forwardCallTo((new static)->forwardTo(), $method, $parameters);
    }

    public function __get($name)
    {
        return $this->forwardTo()->{$name};
    }

    public function __set($name, $value)
    {
        $this->forwardTo()->{$name} = $value;
    }

    public function __isset($name)
    {
        return isset($this->forwardTo()->{$name});
    }

    public function __unset($name)
    {
        unset($this->forwardTo()->{$name});
    }
}
