<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();
        $data = [
            'title' => 'Dashboard',
            'fullname' => $session->get('fullname'),
            'isLogin' => $session->get('isLogin'),
            'profile' => $session->get('profile')
        ];

        return view('User/dashboard', $data);
    }
}
