<?php

namespace Hasanmisbah\FeedbackApplication\Controllers;

use Hasanmisbah\FeedbackApplication\Models\Feedback;

class DashboardController
{
    public function index()
    {
        $this->redirectIfNotAuthenticated();
        $user = authenticatedUser();
        $serverUrl = $_SERVER['SERVER_NAME'];
        $serverPort = $_SERVER['SERVER_PORT'];
        $userUrl = "http://$serverUrl:$serverPort/feedback/{$user['user_id']}";
        $feedbacks = (new Feedback())->allItemsByUser($user['user_id']);

        $attrs = [
            'user' => $user,
            'feedbacks' => $feedbacks,
            'user_url' => $userUrl,
        ];

        return view('dashboard', $attrs);
    }

    private function redirectIfNotAuthenticated()
    {
        if(!isAuthenticated()) {
            header('Location: /login');
        }
    }
}
