<?php

namespace App\Controllers;

class LoginController extends BaseController
{
    public function login()
    {
        $data = [
            'title' => 'DAG News'
        ];
        return view('pages/home', $data);
    }
    public function reset()
    {
        $data = [
            'title' => 'DAG News'
        ];
        return view('pages/reset_password', $data);
    }
}
