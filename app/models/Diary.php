<?php
namespace app\models;

use vendor\core\base\Model;
use R;

class Diary extends Model {
    public $table = 'dnevniki';
    public $pk = 'id';

    public function getCount($id)
    {
        $query = R::count($this->table, 'parent_id = ' . $id . '');
            return $query;
    }
}