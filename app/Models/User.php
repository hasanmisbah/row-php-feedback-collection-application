<?php

namespace Hasanmisbah\FeedbackApplication\Models;

use Hasanmisbah\FeedbackApplication\Core\Model\Model;

class User extends Model
{
    protected $table = 'users';

    protected $fields = ['name', 'email', 'password', 'user_id', 'created_at', 'updated_at'];

    public function create($attrs)
    {
        $attrs = $this->filterFields($attrs);
        $passwordHash = password_hash($attrs['password'], PASSWORD_DEFAULT);

        $attribute = array_merge($attrs, [
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'user_id'    => generateUniqueString(),
        ]);

        $attribute['password'] = $passwordHash;
        static::db()->create($attribute);
        return $attribute;
    }

}
