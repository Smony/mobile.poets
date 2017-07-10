<?php


namespace app\controllers;

use app\models\User;

class FavoriteController extends AppController
{

    public $layout = 'mobile';

    public function indexAction()
    {
        $users = new User();
        if(isset($_SESSION['id_user']))
        {
            $userId = $_SESSION['id_user'];
            $poet = $users->load($userId);
            unset($_SESSION['error_us_pass']);
            unset($_SESSION['error_us_name']);
        }
        else
        {
            $user = NULL;
        }

        $this->set(compact('poet'));
    }
}