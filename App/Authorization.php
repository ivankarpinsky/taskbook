<?php

namespace App;

use App;

class Authorization
{
    public function login($user) {
        $res = App::$db->execute("select * from users where `login`='{$user['login']}' and `password`='{$user['password']}'");

        return $res;
    }

}