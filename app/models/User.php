<?php
namespace app\models;

use vendor\core\base\Model;
use R;

class User extends Model {
	public $table = 'users';
	public $pk = 'id';

	public function load($id)
	{
		$query = R::load($this->table, $id);
		return $query;
	}

	public function findOne($sql, $params = [])
	{
		$query = R::findOne($this->table, ''.$sql.' = ?', $params);
		return $query;
	}

	public function getCountParam($sql, $params = [])
	{
		$query = R::count($this->table, ''.$sql.' = ?', $params);
		return $query;
	}
}