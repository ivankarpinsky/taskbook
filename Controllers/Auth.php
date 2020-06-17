<?php

namespace Controllers;

use App\Authorization;

class Auth extends \App\Controller
{

    public function index()
    {
        return $this->render('Auth');
    }

    public function login()
    {
        $user = (new Authorization())->login($this->htmlEntitiesArray($_POST));
        if (!$user) {
            return $this->render('Auth',['error'=>true]);
        } else {
            setcookie('user',serialize($user), time()+60*60*24*30, '/');
            header('Location: /', true, 301);
        }
    }

    public function logout() {
        unset($_COOKIE['user']);
        setcookie('user', null, -1, '/');
        header('Location: /', true, 301);
    }


    private function htmlEntitiesArray($arr) {
        foreach ($arr as &$item) {
            $item = htmlentities($item);
        }

        return $arr;
    }
}