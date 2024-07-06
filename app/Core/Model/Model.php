<?php

namespace Hasanmisbah\FeedbackApplication\Core\Model;

abstract class Model
{
    protected $table;

    protected $fields = [];

    static $db;


    public static function setDB($db)
    {
        static::$db = $db;
    }

    public static function db()
    {
        $model = new static;
        static::$db->setKey($model->getTable());
        return static::$db;
    }

    public function find($key, $value)
    {
        $items = static::db()->all();

        foreach ($items as $item) {
            if($item[$key] === $value) {
                return $item;
            }
        }

        return null;
    }

    public function filterFields($attrs)
    {
        return array_filter($attrs, function ($key) {
            return in_array($key, $this->fields);
        }, ARRAY_FILTER_USE_KEY);
    }

    public function getTable()
    {
        return $this->table;
    }

    public function allByKey($key, $value)
    {
        $items = static::db()->all();
        $filteredItems = [];

        foreach ($items as $item) {
            if($item[$key] === $value) {
                $filteredItems[] = $item;
            }
        }

        return $filteredItems;
    }
}
