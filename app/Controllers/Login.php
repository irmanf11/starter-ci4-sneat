<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenggunaModel;
use CodeIgniter\HTTP\ResponseInterface;

class Login extends BaseController
{
    public function index()
    {
        if (session()->has('logged_in')) {
            return redirect('home');
        }

        return view('login');
    }

    public function cek()
    {
        if ($this->request->is('post')) {
            $user = new PenggunaModel();

            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $result = $user->where('username', $username)
                ->where('aktif', 1)
                ->first();

            if (empty($result)) {
                session()->setFlashdata('pesan', '<div class="alert alert-danger text-center" role="alert">User tidak terdaftar atau nonaktif</div>');
                return redirect()->back()->withInput();
            }

            if (password_verify($password, $result['password'])) {
                $session_data = array(
                    'id' => $result['id'],
                    'nama_lengkap' => $result['nama_lengkap'],
                    'username' => $result['username'],
                    'level' => $result['level'],
                    'logged_in' => TRUE
                );

                session()->set($session_data);

                return redirect()->to('home');
            }

            session()->setFlashdata('pesan', '<div class="alert alert-danger text-center" role="alert">Username atau Password salah</div>');
            return redirect()->back()->withInput();
        }

        return redirect('login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect('login');
    }
}
