<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        // If already logged in, redirect to dashboard
        if (session()->has('user_id')) {
            return redirect()->to(base_url('admin/dashboard'));
        }

        return view('auth/login', [
            'title' => 'Login Admin'
        ]);
    }

    public function loginProcess()
    {
        $session = session();
        $userModel = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if (empty($username) || empty($password)) {
            return redirect()->back()->withInput()->with('error', 'Username dan password wajib diisi.');
        }

        $user = $userModel->where('username', $username)->first();

        if ($user) {
            // Verify password
            if (password_verify($password, $user['password'])) {
                // Set session
                $session->set([
                    'user_id'   => $user['id'],
                    'user_name' => $user['name'],
                    'username'  => $user['username'],
                    'is_logged' => true
                ]);

                return redirect()->to(base_url('admin/dashboard'))->with('success', 'Selamat datang kembali, ' . $user['name'] . '!');
            }
        }

        return redirect()->back()->withInput()->with('error', 'Username atau password salah.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'))->with('success', 'Anda telah berhasil logout.');
    }
}
