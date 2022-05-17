<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class AdminController extends BaseController
{
    public function index()
    {
        //
    }

    public function login()
    {
        $session = session();
        $adminModel = new AdminModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $adminModel->where('email', $email)
            ->findAll();
        if ($data) {
            $pass = $data[0]["password"];
            $authenticatePassword = password_verify($password, $pass);
            if ($authenticatePassword) {
                $session->set($data[0]);
                $session->set('isLoggedIn', TRUE);
                return redirect()->route('admin.news.all');
            } else {
                $session->setFlashdata('message', 'Password is incorrect.');
                return redirect()->route('admin.news.all');
            }
        } else {
            $session->setFlashdata('message', 'Email is incorrect');
            return redirect()->route('admin.news.all');
        }
    }
}
