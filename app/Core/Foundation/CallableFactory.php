<?php

namespace Hasanmisbah\FeedbackApplication\Core\Foundation;

class CallableFactory
{
    public static function call($container, $callable, $arguments = [])
    {
        if($callable instanceof \Closure) {
            return call_user_func_array($callable, $arguments);
        }

        if(is_callable($callable)) {
            return call_user_func_array($callable, $arguments);
        }

        if($container->get($callable) && is_callable($container->get($callable))) {
            return call_user_func_array($container->get($callable), $arguments);
        }

        if(class_exists($callable)) {
            return $container->make($callable, $arguments);
        }

        throw new \Exception("$callable is not a valid callable");
    }
}
