<?php

namespace Controllers;

use App\Task;

class Home extends \App\Controller
{

    public function index ()
    {
        $page = ((int) $_GET['page'])?:1;
        $sortType = 'asc';

        if (in_array($_GET['sort'], ['userName', 'email', 'text'])) {
            $sort = $_GET['sort'];
            if ($_COOKIE['sort']==$_GET['sort']) {
                $sortType=$_COOKIE['sortType']=='asc'?'desc':'asc';
                setcookie('sortType',$sortType);
            } else {
                setcookie('sort', $_GET['sort']);
                setcookie('sortType', 'asc');
            }
        } else {
            $sort = null;
        }

        $tasks = (new Task())->get(null, $page, $sort, $sortType);

        $pagesCount = (((int)((new Task())->getCount()[0][0])-1)/3)+1;

        return $this->render('Home', ['tasks' => $tasks, 'pagesCount' => $pagesCount]);
    }

}