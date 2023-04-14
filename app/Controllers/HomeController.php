<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();
        $data = [
            'title' => 'DAG News',
            'fullname' => $session->get('fullname'),
            'isLogin' => $session->get('isLogin'),
            'profile' => $session->get('profile')
        ];
        return view('pages/home', $data);
    }
    public function login()
    {
        $data = [
            'title' => 'Login-DAG News'
        ];
        return view('pages/login', $data);
    }
    public function register()
    {
        $data = [
            'title' => 'Register-DAG News'
        ];
        return view('pages/register', $data);
    }
    public function about()
    {
        $data = [
            'title' => 'About'
        ];
        return view('pages/about', $data);
    }
}
