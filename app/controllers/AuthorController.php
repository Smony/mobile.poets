<?php

namespace app\controllers;

use app\models\Albom;
use app\models\Banlist;
use app\models\Diary;
use app\models\Favorite;
use app\models\GuestBook;
use app\models\Poem;
use app\models\User;
use app\models\Comment;

class AuthorController extends AppController
{
    public $layout = 'mobile';

    public function indexAction()
    {
        $users = new User();
        $poets = new Poem();
        $comments = new Comment();
        $diarys = new Diary();
        $alboms = new Albom();
        $favorites = new Favorite();
        $banlists = new Banlist();
        $guestbooks = new GuestBook();
        $whatlist = 'black';

        if(isset($_SESSION['id_user']))
        {
            $userId = $_SESSION['id_user'];

            $poet = $users->load($userId);
            $count_poems = $poets->getCount($userId);
            $count_comments = $comments->getCount($userId);
            $count_diarys = $diarys->getCount($userId);
            $count_alboms = $alboms->getCount($userId);
            $count_favorite = $favorites->getCount($userId);
            $count_guestbook = $guestbooks->getCount($userId);

            unset($_SESSION['error_us_pass']);
            unset($_SESSION['error_us_name']);
        }
        else
        {
            $user = NULL;
        }
        $this->set(compact(
            'poet',
            'count_poems',
            'count_comments',
            'count_diarys',
            'count_alboms',
            'count_favorite',
//            'count_banlist'
            'count_guestbook'
        ));
    }
}