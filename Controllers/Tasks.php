<?php

namespace Controllers;

use App\Task;

class Tasks extends \App\Controller
{

    public function save()
    {
        $task = new Task();
        $res = $task->save($this->htmlEntitiesArray($_POST));

        $tasks = $task->get(null, 1);
        $pagesCount = (((int)((new Task())->getCount()[0][0])-1)/3)+1;

        return $this->render('Home', ['tasks' => $tasks, 'pagesCount' => $pagesCount, 'success' => true]);
    }

    public function edit() {
        $user = unserialize($_COOKIE['user'])[0];
        if (!$user OR $user['role']!='admin') return false;
        if ((new Task)->edit($this->htmlEntitiesArray($_POST))) {
            return true;
        }
        return false;
    }

    public function complete() {
        $user = unserialize($_COOKIE['user'])[0];
        if (!$user OR $user['role']!='admin') return false;

        if ((new Task)->complete($this->htmlEntitiesArray($_POST))) {
            return true;
        }
        return false;
    }

    private function htmlEntitiesArray($arr) {
        foreach ($arr as &$item) {
            $item = htmlentities($item);
        }

        return $arr;
    }

}