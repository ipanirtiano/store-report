<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\GuestModel;
use App\Models\UserModel;
use CodeIgniter\Config\Config;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->authModel = new AuthModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        if (session()->has('nama')) {
            return redirect()->to(base_url('/dashboard'));
        }

        $data = [
            'tittle' => 'Login',
            'validation' => \Config\Services::validation()
        ];

        return view('Auth/index', $data);
    }

    public function proses_login()
    {
        // select data dari table users
        $data_user = $this->authModel->findAll();
        // get data inputan dari form login
        $data_form = $this->request->getVar();

        // validasi form login
        if (!$this->validate([
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Username Tidak Boleh Kosong!',
                    'valid_email' => 'Username Harus Berupa Email!'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password Tidak Boleh Kosong!'
                ]
            ],
        ])) {
            return redirect()->to(base_url('/'))->withInput();
        } else {
            // cek apakah username terdaftar di dalam database?
            $user = $this->authModel->where('username', $data_form['email'])->first();
            // jika username terdaftar
            if ($user) {
                // cek apakah password sesuai dengan akun yang sudah terdaftar
                if (password_verify($data_form['password'], $user['password'])) {
                    // get level yang sedang login
                    $level = $user['level'];

                    // cek apakah yang login adalah admin?
                    $data = $this->userModel->where('kode_user', $user['id_users'])->first();

                    // jika yang login adalah admin
                    if ($level ==  'admin') {
                        // siapkan session
                        $data_session = [
                            'login' => true,
                            'nama' => $data['nama_lengkap'],
                            'kode_guest' => $data['kode_user'],
                            'email' => $data['email'],
                            'phone' => $data['phone'],
                            'level' => $level
                        ];

                        session()->set($data_session);
                        return redirect()->to(base_url('/dashboard'));
                    }
                    if ($level == 'manager') {
                        // siapkan session
                        $data_session = [
                            'login' => true,
                            'nama' => $data['nama_lengkap'],
                            'kode_guest' => $data['kode_user'],
                            'email' => $data['email'],
                            'phone' => $data['phone'],
                            'level' => $level
                        ];

                        session()->set($data_session);
                        return redirect()->to(base_url('/dashboard'));
                    }
                } else {
                    session()->setFlashdata('pesan', 'Password yang anda masukan salah!');
                    return redirect()->to(base_url('/'));
                }
            } else {
                session()->setFlashdata('pesan', 'Username Tidak Terdaftar!');
                return redirect()->to(base_url('/'));
            }
        }
    }

    public function logout()
    {
        $data_session = ['login', 'nama', 'level'];
        session()->remove($data_session);
        return redirect()->to(base_url('/'));
    }

    //--------------------------------------------------------------------

}
