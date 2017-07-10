<?php
namespace app\models;

use vendor\core\base\Model;
use R;

class Poem extends Model {
    public $table = 'users_poems';
    public $pk = 'id';

    public function getCount($id)
    {
        $query = R::count($this->table, 'parent_id = '.$id.'');
        return $query;
    }


}