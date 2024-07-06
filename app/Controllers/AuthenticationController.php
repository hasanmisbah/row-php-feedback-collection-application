<?php

namespace Hasanmisbah\FeedbackApplication\Controllers;

use Hasanmisbah\FeedbackApplication\Core\Auth\Auth;
use Hasanmisbah\FeedbackApplication\Core\Response\Response;
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
        return Response::view('auth.login');
    }

    public function authenticate()
    {
        $email = request()->input('email');
        $password = request()->input('password');
        $user = (new User())->find('email', $email);

        if($user && password_verify($password, $user['password'])) {
            Auth::login($user);
            Response::redirect('/dashboard');
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
        if(Auth::check()) {
            Response::redirect('/dashboard');
        }
    }
}
