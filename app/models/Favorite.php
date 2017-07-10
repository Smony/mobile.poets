<?php
namespace app\models;

use vendor\core\base\Model;
use R;

class Favorite extends Model {
    public $table = 'favorite';
    public $pk = 'id';

    public function getCount($id)
    {
        $query = R::count($this->table, 'userid = '. $id .'');
        return $query;
    }
}