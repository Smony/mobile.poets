<?php
namespace app\models;

use vendor\core\base\Model;
use R;

class GuestBook extends Model {
    public $table = 'guestbook';
    public $pk = 'id';

    public function getCount($id)
    {
        $query = R::count($this->table, 'parent_id = ' . $id . '');
        return $query;
    }
}