<?php

namespace Hasanmisbah\FeedbackApplication\Core\Contracts;

Interface JSONDB
{
    public function all();
    public function create($data);
}
