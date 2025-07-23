<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function login()
    {
        if ($this->request->getMethod() === 'POST') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            // Simple auth - in production, use proper password hashing
            if ($username === 'admin' && $password === 'admin123') {
                session()->set([
                    'admin_logged_in' => true,
                    'admin_username' => $username
                ]);
                return redirect()->to('/admin');
            } else {
                session()->setFlashdata('error', 'Username atau password salah!');
            }
        }

        $data = [
            'title' => 'Login Admin - ShoesStore'
        ];

        return view('admin/login', $data);
    }

    public function logout()
    {
        session()->remove(['admin_logged_in', 'admin_username']);
        return redirect()->to('/admin/login');
    }
}