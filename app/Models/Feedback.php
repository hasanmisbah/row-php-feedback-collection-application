<?php

namespace Hasanmisbah\FeedbackApplication\Models;
use Hasanmisbah\FeedbackApplication\Core\Model\Model;

class Feedback extends Model
{
    protected $table = 'feedbacks';

    protected $fields = ['user_id', 'feedback', 'created_at', 'updated_at'];

    public function create($attrs)
    {
        $attrs = $this->filterFields($attrs);

        $attribute = array_merge($attrs, [
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        static::db()->create($attribute);
        return $attribute;
    }

    public function allItemsByUser($userId)
    {
        return $this->allByKey('user_id', $userId);
    }
}
