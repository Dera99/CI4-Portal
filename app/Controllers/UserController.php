<?php

namespace App\Controllers;

use App\Models\UserModel;


class UserController extends BaseController
{
    protected $UserModel;
    protected $helpers;
    public function __construct()
    {
        $this->UserModel = new UserModel();
    }

    public function register()
    {
        session();
        $session = \Config\Services::session();
        $data = [
            'title' => 'Register Account',
            'message' => $session->getFlashdata('message'),
            'validation' => $session->getFlashdata('validation'),
            'fullname' => $session->get('fullname'),
            'isLogin' => $session->get('isLogin'),
            'profile' => $session->get('profile')
        ];
        return view('User/register', $data);
    }
    public function login()
    {
        $session = \Config\Services::session();
        $data = [
            'title' => 'Login-DAG News',
            'message' => $session->getFlashdata('message'),
            'fullname' => $session->get('fullname'),
            'isLogin' => $session->get('isLogin'),
            'profile' => $session->get('profile')
        ];
        return view('User/login', $data);
    }
    public function store()
    {
        //validasi input
        session();
        $session = \Config\Services::session();
        if (!$this->validate([
            'fullname' => 'required',
            'email' => 'required|valid_email|is_unique[user.email]',
            'password' => 'required|min_length[8]',
            'profile' =>  'max_dims[profile,500,500]|uploaded[profile]|mime_in[profile,image/jpg,image/jpeg,image/png,image/webp]|ext_in[profile,jpg,jpeg,png,webp]|max_size[profile,1024]'
        ])) {
            $validation = \Config\Services::validation();
            $session->setFlashdata('validation', $validation->listErrors());
            return redirect()->to('user/register');
        }


        $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        $profile = $this->request->getFile('profile');
        $profileName = $profile->getRandomName();
        $profile->move(ROOTPATH . 'public/uploads/profiles/', $profileName);

        $data = [
            'email' => $this->request->getVar('email'),
            'fullname' => $this->request->getVar('fullname'),
            'password' => $password,
            'profile' => $profileName
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
        $session = \Config\Services::session();
        $userModel =  new \App\Models\UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $user = $userModel->where('email', $email)->first();
        $fullname = $user['fullname'];
        $profile = $user['profile'];
        if (!empty($user['email'])) {
            if (password_verify($password, $user['password'])) {
                $session->set('isLogin', true);
                $session->set('fullname', $fullname);
                $session->set('profile', $profile);
                return redirect()->to('/user/dashboard');
            } else {
                return redirect()->back();
            }
        }
    }
    public function logout()
    {
        $session = \Config\Services::session();
        $session->destroy();
        return redirect()->to('user/login');
    }
}
