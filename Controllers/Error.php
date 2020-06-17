<?php

namespace Controllers;

class Error extends \App\Controller
{

    public function index()
    {
        http_response_code(400);
        return $this->render('Error', ['error'=>400]);
    }

    public function error404()
    {
        http_response_code(404);
        return $this->render('Error', ['error'=>404]);
    }

    public function error500()
    {
        http_response_code(500);
        return $this->render('Error', ['error'=>500]);
    }

}