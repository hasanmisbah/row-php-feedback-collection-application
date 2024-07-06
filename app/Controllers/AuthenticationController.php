<?php

namespace Hasanmisbah\FeedbackApplication\Controllers;

use Hasanmisbah\FeedbackApplication\Models\User;

class AuthenticationController
{
    public function register()
    {
        $this->redirectIfAuthenticated();
        return view('auth.register');
    }

    public function login()
    {
        $this->redirectIfAuthenticated();
        return view('auth.login');
    }

    public function authenticate()
    {
        $email = request()->input('email');
        $password = request()->input('password');
        $user = (new User())->find('email', $email);

        if($user && password_verify($password, $user['password'])) {
            $_SESSION['icff_user'] = $user;
            header('Location: /');
        }else {
            throw new \Exception('Invalid email or password');
        }

    }

    public function store()
    {
        $this->redirectIfAuthenticated();

        $attrs = [
            'name'             => request()->input('name'),
            'email'            => request()->input('email'),
            'password'         => request()->input('password'),
            'confirm_password' => request()->input('confirm_password'),
        ];

        if($attrs['password'] !== $attrs['confirm_password']) {
            throw new \Exception('Password and Confirm Password does not match');
        }else {
            unset($attrs['confirm_password']);
        }

        (new User())->create($attrs);
        header('Location: /login');
    }

    public function redirectIfAuthenticated()
    {
        if(isAuthenticated()) {
            header('Location: /');
        }
    }
}
