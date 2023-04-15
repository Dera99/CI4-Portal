<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    protected $helpers = ['form'];
    public function index()
    {
        $session = \Config\Services::session();
        $data = [
            'title' => 'Dashboard',
            'fullname' => $session->get('fullname'),
            'isLogin' => $session->get('isLogin'),
            'profile' => $session->get('profile'),
            'email' => $session->get('email'),
            'message' => $session->get('message')
        ];

        return view('User/dashboard', $data);
    }
    public function store()
    {
        $session = \Config\Services::session();
        $newsModel =  new \App\Models\News();
        $author = $this->request->getVar('email');
        $title = $this->request->getVar('title');
        $description = $this->request->getVar('description');
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'picture' =>  'mime_in[picture,image/jpg,image/jpeg,image/png,image/webp]|ext_in[picture,jpg,jpeg,png,webp]'
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }
        $picture = $this->request->getFile('picture');
        if ($picture && $picture->isValid()) {
            $pictureName = $picture->getRandomName();
            $picture->move(ROOTPATH . 'public/uploads/posts/', $pictureName);
        } else {
            $pictureName = '';
        }
        $data = [
            'author' => $author,
            'title' => $title,
            'description' => $description,
            'images' => $pictureName
        ];
        $createPost = $newsModel->insert($data);
        if ($createPost) {
            $session->setFlashdata('message', 'Berhasil Posting');
            return redirect()->back();
        } else {
            $session->setFlashdata('message', 'Gagal Posting');
            return redirect()->back();
        }
    }
}
