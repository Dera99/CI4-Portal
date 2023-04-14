<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\UserRecovery;


class UserController extends BaseController
{
    protected $UserModel;
    protected $UserRecovery;
    protected $helpers = ['form'];
    private $email;

    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->UserRecovery = new UserRecovery();
    }

    public function register()
    {
        $session = \Config\Services::session();
        $data = [
            'title' => 'Register Account',
            'message' => $session->getFlashdata('message'),
            'isLogin' => $session->get('isLogin'),
        ];
        return view('User/register', $data);
    }
    public function login()
    {
        $session = \Config\Services::session();
        $data = [
            'title' => 'Login-DAG News',
            'message' => $session->getFlashdata('message'),
            'isLogin' => $session->get('isLogin'),
        ];
        return view('User/login', $data);
    }
    public function store()
    {
        //validasi input
        $session = \Config\Services::session();
        if (!$this->validate([
            'fullname' => 'required',
            'email' => 'required|valid_email|is_unique[user.email]',
            'password' => 'required|min_length[8]',
        ])) {
            return redirect()->back()->withInput();
        }

        $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        $profile = $this->request->getFile('profile');
        if ($profile && $profile->isValid()) {
            $profileName = $profile->getFilename();
            $profile->move(ROOTPATH . 'public/uploads/profiles/', $profileName);
        } else {
            $profileName = '';
        }

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
    public function recovery()
    {
        $session = \Config\Services::session();
        $userRecovery =  new \App\Models\UserRecovery();
        $data = [
            'title' => 'Recovery Password',
            'isLogin' => $session->get('isLogin'),
            'message' => $session->getFlashdata('message'),
            'token' => $session->getFlashdata('token'),
            'email' => $session->getFlashdata('email'),
        ];
        return view('User/recovery', $data);
    }
    public function requestToken()
    {
        $session = \Config\Services::session();
        $userModel =  new \App\Models\UserModel();
        $userRecovery =  new \App\Models\UserRecovery();
        $token = rand(1000000, 9999999);
        $email = $this->request->getVar('email');

        $rules = [
            'email' => 'required|valid_email',
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }
        $user = [
            'email' => $email,
            'token' => $token
        ];

        $userCheck = $userModel->where('email', $email)->first();
        $session->setFlashdata('token', $token);
        if (!empty($userCheck['email'])) {
            $getToken = $userRecovery->insert($user);
            if ($getToken) {
                $session->setFlashdata('message', 'Token Berhasil Dikirimkan, Silahakan Check Database !');
                $session->setFlashdata('email', $email);
                return redirect()->back()->withInput();
            } else {
                $session->setFlashdata('message', 'Token Tidak Tersedia !');
                return redirect()->back()->withInput();
            }
        }
    }
    public function validateToken()
    {
        $session = \Config\Services::session();
        $userRecovery =  new \App\Models\UserRecovery();
        $token = $this->request->getVar('token');
        $tokenCheck = $userRecovery->where('token', $token)->first();
        $email = $this->request->getVar('email');
        $rules = [
            'token' => 'required'
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }
        if (!empty($tokenCheck['token'])) {
            $userRecovery->where('token', $token)->delete();
            return redirect()->to('/user/recovery/reset/' . $email . '/' . $token);
        }
        return redirect()->back()->withInput();
    }
    public function recoveryPassword($email, $token)
    {
        $session = \Config\Services::session();
        $data = [
            'title' => 'Reset Password',
            'isLogin' => $session->get('isLogin'),
            'message' => $session->getFlashdata('message'),
            'token' => $token,
            'email' => $email
        ];
        return view('user/reset_password', $data);
    }
    public function resetPassword()
    {
        $session = \Config\Services::session();
        $userModel =  new \App\Models\UserModel();
        $userRecovery =  new \App\Models\UserRecovery();
        $email = $this->request->getVar('email');
        $token = $this->request->getVar('token');
        $password = $this->request->getVar('password');
        $password2 = $this->request->getVar('password2');
        $rules = [
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[8]'
            ],
            'password2' => [
                'label' => 'Confirm Password',
                'rules' => 'required|matches[password]'
            ]
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }
        $userId = $userModel->where('email', $email)->first();
        if (!empty($userId['id'])) {
            $passwordHash = password_hash($password2, PASSWORD_DEFAULT);
            $data = [
                'password' => $passwordHash
            ];
            $update = $userModel->update($userId['id'], $data);
            if ($update) {

                $session->setFlashdata('message', 'Update Password Berhasil !');
                return redirect()->to('user/login')->withInput();
            } else {
                $session->setFlashdata('message', 'Update Password Gagal !');
                return redirect()->back()->withInput();
            }
        }
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
