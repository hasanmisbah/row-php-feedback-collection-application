<?php

namespace Hasanmisbah\FeedbackApplication\Core\Auth;

use Hasanmisbah\FeedbackApplication\Core\Support\ForwardCalls;

class Auth
{
    use ForwardCalls;

    public function forwardTo()
    {
        return new AuthenticationManager();
    }
}
