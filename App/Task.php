<?php

namespace App;

use App;

class Task
{
    public function save($data) {

        $res = App::$db->execute("insert into tasks(`userName`, `email`, `text`) values('{$data['userName']}', '{$data['email']}', '{$data['text']}');");

        return $res;
    }

    public function get($id = null, $page = 1, $sort=null, $sortType=null) {

        if ($sort==null) {
            $order = ($_COOKIE['sort']) ? "order by `{$_COOKIE['sort']}` {$_COOKIE['sortType']}" : '';
        } else {
            $order = "order by `{$sort}` {$sortType}";
        }

        $offset = 'limit '.(($page-1)*3).', 3';
            $res = App::$db->execute("select * from tasks {$order} {$offset};");
            return $res;
    }

    public function getCount() {
        $res = App::$db->execute("select count(*) from tasks;");
        return $res;
    }

    public function edit($data) {
        App::$db->execute("update tasks set `edited`=1 where `id`={$data['id']} AND `text`<>'{$data['text']}'");
        return App::$db->execute("update tasks set `text`='{$data['text']}' where `id`={$data['id']}");
    }

    public function complete($data) {
        return App::$db->execute("update tasks set `completed`=1 where `id`={$data['id']}");
    }

}