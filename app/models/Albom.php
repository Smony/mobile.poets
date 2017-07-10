<?php
namespace app\models;

use vendor\core\base\Model;
use R;

class Albom extends Model {
    public $table = 'photoalbum';
    public $pk = 'id';

    public function getCount($id)
    {
        $query = R::count($this->table, 'user_id = ' . $id . '');
        return $query;
    }
}