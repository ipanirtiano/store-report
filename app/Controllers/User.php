<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\UserModel;

class User extends BaseController
{

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->authModel = new AuthModel();
    }

    public function index()
    {
        //generet kode users random 3 digit pertama
        $angka_kode1 = range(0, 9);
        shuffle($angka_kode1);
        $ambilKode1 = array_rand($angka_kode1, 3);
        $generetKode1 = implode('', $ambilKode1);
        // generate users dept random 3 digit kedua
        $angka_kode2 = range(0, 9);
        shuffle($angka_kode2);
        $ambilKode2 = array_rand($angka_kode2, 3);
        $generetKode2 = implode('', $ambilKode2);
        // kode users yang sudah di random
        $kode_users = 'USR-' . $generetKode1 . $generetKode2;

        // get data guest model
        $guest = $this->userModel->findAll();

        $data = [
            'tittle' => 'Data User',
            'kode_users' => $kode_users,
            'guest' => $guest,
            'validation' => \Config\Services::validation(),
        ];
        return view('user/index', $data);
    }

    public function proses_input()
    {
        // validasi form input users
        if (!$this->validate([
            'kode_user' => [
                'rules' => 'required|is_unique[users.kode_user]',
                'errors' => [
                    'required' => 'Field nama tidak boleh kosong!',
                    'is-unique' => 'Kode guest sudah terdaftar!'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field nama tidak boleh kosong!'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Field nama tidak boleh kosong!',
                    'valid_email' => 'Email tidak valid!'
                ]
            ],
            'phone' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field phone tidak boleh kosong!'
                ]
            ],
            'departemen' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan pilih departemen!'
                ]
            ],
        ])) {
            return redirect()->to(base_url('/admin/regis-user'))->withInput();
        } else {
            // insert data form users kedalam table guest
            $this->userModel->save([
                'kode_user' => $this->request->getVar('kode_user'),
                'nama_lengkap' => $this->request->getVar('nama'),
                'email' => $this->request->getVar('email'),
                'phone' => $this->request->getVar('phone'),
                'departemen' => $this->request->getVar('departemen'),
            ]);

            // generate password
            $password = "password123";
            // hashing paswword sebelum insert database
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            // insert kedalam table users
            $this->authModel->save([
                'id_users' => $this->request->getVar('kode_user'),
                'username' => $this->request->getVar('email'),
                'password' => $password_hash,
                'level' => $this->request->getVar('level')
            ]);


            session()->setFlashdata('pesan', 'Data Users Berhasil di Tambah!');
            return redirect()->to(base_url('/admin/regis-user'))->withInput();
        }
    }


    public function update_user($kode_users)
    {

        // decript kode user
        $kodeUser = base64_decode($kode_users);

        // get data user kedalam table guest
        $data_user = $this->userModel->where('kode_user', $kodeUser)->first();
        // get level user
        $level = $this->authModel->where('id_users', $kodeUser)->first();

        $data = [
            'tittle' => 'Update Data User',
            'data_user' => $data_user,
            'validation' => \Config\Services::validation(),
            'level' => $level
        ];

        return view('user/update', $data);
    }

    public function proses_update($kode_user)
    {
        // decript kode user
        $kodeUser = base64_decode($kode_user);

        // validasi form update
        if (!$this->validate([
            'kode_user' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode User Harus Di Lengkapi!',
                    'is_unique' => 'Kode User Sudah Terdaftar!'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama User Harus Di Lengkapi!'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Nama User Harus Di Lengkapi!',
                    'valid_email' => 'Email yang anda masukan tidak valid!'
                ]
            ],
            'phone' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Phone User Harus Di Lengkapi!'
                ]
            ],
            'departemen' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan Pilih Departemen!'
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level User Harus Di Lengkapi!'
                ]
            ],
        ])) {
            return redirect()->to(base_url('/admin/update-user/' . $kode_user))->withInput();
        } else {
            // get id guest
            $id = $this->userModel->where('kode_user', $kodeUser)->first();
            // get id user
            $id_user = $this->authModel->where('id_users', $kodeUser)->first();

            // update table guest
            $this->userModel->save([
                'id' => $id['id'],
                'kode_user' => $this->request->getVar('kode_user'),
                'nama_lengkap' => $this->request->getVar('nama'),
                'email' => $this->request->getVar('email'),
                'phone' => $this->request->getVar('phone'),
                'departemen' => $this->request->getVar('departemen')
            ]);

            // get level
            $level = $this->request->getVar('level');

            // hashing paswword sebelum insert database
            $password = "password123";
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            // update table user
            $this->authModel->save([
                'id' => $id_user['id'],
                'username' => $this->request->getVar('email'),
                'password' => $password_hash,
                'level' => $level
            ]);

            session()->setFlashdata('pesan', 'Data User Berhasil di Update!');
            return redirect()->to(base_url('/admin/regis-user'))->withInput();
        }
    }

    public function delete_user($kode_user)
    {
        // decript kode user
        $kodeUser = base64_decode($kode_user);

        // get data guest by kode user
        $data_guest = $this->userModel->where('kode_user', $kodeUser)->first();
        // get data user auth by kode user
        $data_user = $this->authModel->where('id_users', $kodeUser)->first();

        // get id guest
        $id_guest = $data_guest['id'];
        // delete data guest
        $this->userModel->delete($id_guest);

        // get id user
        $id_user = $data_user['id'];
        // delete data user
        $this->authModel->delete($id_user);

        // session flash data
        session()->setFlashdata('pesan', 'Data User Berhasil di Hapus!');
        return redirect()->to(base_url('/admin/regis-user'))->withInput();
    }
}
