<?php

namespace Hasanmisbah\FeedbackApplication\Controllers;

use Hasanmisbah\FeedbackApplication\Models\Feedback;
use Hasanmisbah\FeedbackApplication\Models\User;

class FeedbackController
{
    public function show($userId)
    {
        $user = (new User())->find('user_id', $userId);

        if(!$user){
            header('Location: /login');
        }

        return view('feedback', ['user' => $user]);
    }

    public function store($userId)
    {
        $attrs = [
            'user_id' => $userId,
            'feedback' => request()->input('feedback'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $feedback = (new Feedback())->create($attrs);
        return view('feedback-success', ['feedback' => $feedback]);
    }
}
