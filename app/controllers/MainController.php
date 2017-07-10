<?php

namespace app\controllers;

use vendor\core\base\View;
use app\models\User;
use R;

class MainController extends AppController
{
	public $layout = 'mobile';
	
    public function indexAction()
    {
        $users = new User();
        if(isset($_SESSION['id_user']))
        {
            $userId = $_SESSION['id_user'];
            $user = $users->load($userId);
            unset($_SESSION['error_us_pass']);
            unset($_SESSION['error_us_name']);
        }
        else
        {
            $user = NULL;
        }

        View::setMeta('Вірші, поезія. Клуб поезії','key', 'des');
        $this->set(compact('user'));
    }
	
	public function singinAction()
    {
        $model = new User();
        $data = $_POST;
        if(isset($_SESSION['id_user']))
        {
            header("Location: /");
            die();
        }
        else
        {
            if(isset($data['do_singin']))
            {
                $errors = '';
                $user = $model->findOne('email', array($data['email']));
                if($user)
                {
                    if($data['password'] == $user->password)
                    {
                        $_SESSION['id_user'] = $user->id;
                        $_SESSION['nick_user'] = $user->nick;
                        header("Location: /#!/author/index");
                        die();
                    }
                    else
                    {
                        $_SESSION['error_us_pass'] = 'Введите правельный пароль';
                        header("Location: /");
                        die();
                    }
                }
                else
                {
                    $_SESSION['error_us_name'] = 'Пользователь не найден';
                    header("Location: /");
                    die();
                }
            }
        }
//        $this->set(compact('errors'));
        $this->loadView('index', compact('errors'));
    }

    public function singupAction()
    {
        $model = new User();
        $data = $_POST;
        if(isset($_SESSION['id_user']))
        {
            header("Location: /");
            die();
        }
        else {
            if (isset($data['do_singup'])) {
                $errors = '';
                if (R::count($model->table, 'email = ?', array($data['email'])) > 0) {
                    $errors = 'Користувач з таким email\'ом вже є';
                }

                if (empty($errors))
                {
                    $new_name = getImageUpload();
                    $add_user = R::dispense($model->table);

                    $add_user->nick = formatStr($data['nick']);
                    $add_user->email = formatStr($data['email']);
//                $add_user->password = password_hash($data['password'], PASSWORD_DEFAULT);
                    $add_user->password = htmlspecialchars($data['password']);
                    $add_user->realname = htmlspecialchars($data['realname']);
                    $add_user->phone = htmlspecialchars($data['phone']);
                    $add_user->city = htmlspecialchars($data['city']);
                    $add_user->birthdate = $data['b_date'];
                    $add_user->public = htmlspecialchars($data['public']);
                    $add_user->aboutme = htmlspecialchars($data['aboutme']);
                    $add_user->userip = $_SERVER['REMOTE_ADDR'];
                    if (isset($data['send_club'])) {
                        $add_user->send_club = 1;
                    }
                    if (isset($data['send_news'])) {
                        $add_user->send_news = 1;
                    }
                    if (isset($data['send_comments'])) {
                        $add_user->send_comments = 1;
                    }
                    if (isset($data['send_email'])) {
                        $add_user->send_email = 1;
                    }
                    $add_user->sez = $data['sez'];
                    $add_user->datareg = date('Ymd');
                    $add_user->photo = '/upload/photos/' . $new_name;
                    $add_user->ischat = 1;

                    R::store($add_user);
                    header("Location: /");
                    die();
                }
            }
        }
        $this->set(compact('errors', 'data'));
    }

    public function logoutAction()
    {
        $this->layout = false;
        unset($_SESSION['id_user']);
        unset($_SESSION['nick_user']);
        unset($_SESSION['error_us_pass']);
        unset($_SESSION['error_us_name']);
        header("Location: /");
        die();
    }
	

}