<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    protected $UserModel;

    public function __construct()
    {
        $this->UserModel = new UserModel();
    }

    public function register()
    {
        $session = \Config\Services::session();
        $data = [
            'title' => 'Register Account',
            'message' => $session->getFlashdata('message')
        ];

        return view('User/register', $data);
    }
    public function login()
    {
        $session = \Config\Services::session();
        $data = [
            'title' => 'Login-DAG News',
            'message' => $session->getFlashdata('message')
        ];
        return view('User/login', $data);
    }
    public function save()
    {
        $session = \Config\Services::session();
        $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        $data = [
            'email' => $this->request->getVar('email'),
            'fullname' => $this->request->getVar('fullname'),
            'password' => $password
        ];
        $addUser = $this->UserModel->insert($data);

        if ($addUser) {
            $session->setFlashdata('message', 'Registrasi Berhasil');
            return redirect()->to('/user/login');
        } else {
            $session->setFlashdata('message', 'Registrasi Gagal');
            return redirect()->back();
        }
    }
    public function requestOTP()
    {
        $data = [
            'title' => 'Reset Password'
        ];

        return view('User/request_password', $data);
    }
    public function resetPassword()
    {
        $data = [
            'title' => 'Reset Password'
        ];

        return view('User/reset_password', $data);
    }
    public function loginAuth()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $model = new UserModel();
        $user = $model->where('email', $email)->first();

        if (!empty($user['email'])) {
            if (password_verify($password, $user['password'])) {
                //direct ke dashboard
                return redirect()->to('/dashboard');
            } else {
                return redirect()->back();
            }
        }
    }
    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard'
        ];

        return view('/dashboard/index', $data);
    }
}
