<?php

namespace Hasanmisbah\FeedbackApplication\Core\Auth;

class AuthenticationManager
{
    protected $authKey = 'feedback_application';
    public function __construct($authKey = 'feedback_application')
    {
        $this->authKey = $authKey;
    }
    public function login($user)
    {
        try {
            $_SESSION[$this->authKey] = $user;
            return true;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function check()
    {
        return isset($_SESSION[$this->authKey]) && !empty($_SESSION[$this->authKey]);
    }

    public function user()
    {
        if($this->check()) {
            return $_SESSION[$this->authKey];
        }

        return null;
    }

    public function logout()
    {
        unset($_SESSION[$this->authKey]);
    }

    public function setAuthKey($key)
    {
        $this->authKey = $key;
    }
}
