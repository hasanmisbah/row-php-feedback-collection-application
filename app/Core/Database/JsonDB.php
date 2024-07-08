<?php

namespace Hasanmisbah\FeedbackApplication\Core\Database;

class JsonDB implements \Hasanmisbah\FeedbackApplication\Core\Contracts\JSONDB
{
    protected $dbPath;

    protected $application;

    protected $db = [];

    protected $key = null;

    protected $table;

    protected $where = [];

    public function __construct($application, $dbPath)
    {
        $this->application = $application;
        $this->dbPath = $dbPath;
        $this->init();

    }

    private function init()
    {
        // check if directory exist or not if not create directory first
        if(!file_exists(dirname($this->dbPath))) {
            mkdir(dirname($this->dbPath), 0777, true);
        }

        // check if file exist or not if not create file first
        if(!file_exists($this->dbPath)) {
            file_put_contents($this->dbPath, json_encode([]));
        }

        $this->db = json_decode(file_get_contents($this->dbPath), true);

    }

    public function where($key, $value)
    {
        $this->where[$key] = $value;
        return $this;
    }

    public function get()
    {
        $items = $this->all();
        $filteredItems = [];

        foreach ($items as $item) {
            $match = true;

            foreach ($this->where as $key => $value) {
                if($item[$key] !== $value) {
                    $match = false;
                }
            }

            if($match) {
                $filteredItems[] = $item;
            }
        }

        return $filteredItems;
    }

    public function all()
    {
        return $this->db[$this->key] ?? null;
    }


    public function create($data)
    {
        $this->db[$this->key][] = $data;
        $this->save();
    }

    private function save()
    {
        file_put_contents($this->dbPath, json_encode($this->db));
        $this->init();
    }

    public function __destruct()
    {
        $this->save();
    }

    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }
}
