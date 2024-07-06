<?php

namespace Hasanmisbah\FeedbackApplication\Core\Response;

use Hasanmisbah\FeedbackApplication\Core\Support\ForwardCalls;

class Response
{
    use ForwardCalls;

    public function forwardTo()
    {
        return new ResponseManager();
    }
}
