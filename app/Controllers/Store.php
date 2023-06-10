<?php

namespace App\Controllers;

use App\Models\PemasukanModel;
use App\Models\StoreModel;

class Store extends BaseController
{

    public function __construct()
    {
        $this->storeModel = new StoreModel();
        $this->pemasukanModel = new PemasukanModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index($tgl)
    {
        // bulan
        $get_bulan = date('m');
        // set bulan
        $bulan = '';
        // cek angka bulan
        if ($get_bulan == '01') {
            $bulan = 'Januari';
        }
        if ($get_bulan == '02') {
            $bulan = 'Februari';
        }
        if ($get_bulan == '03') {
            $bulan = 'Maret';
        }
        if ($get_bulan == '04') {
            $bulan = 'April';
        }
        if ($get_bulan == '05') {
            $bulan = 'Mei';
        }
        if ($get_bulan == '06') {
            $bulan = 'Juni';
        }
        if ($get_bulan == '07') {
            $bulan = 'Juli';
        }
        if ($get_bulan == '08') {
            $bulan = 'Agustus';
        }
        if ($get_bulan == '09') {
            $bulan = 'September';
        }
        if ($get_bulan == '10') {
            $bulan = 'Oktober';
        }
        if ($get_bulan == '11') {
            $bulan = 'November';
        }
        if ($get_bulan == '12') {
            $bulan = 'Desember';
        }

        //generet kode transaksi random 3 digit pertama
        $angka_kode1 = range(0, 9);
        shuffle($angka_kode1);
        $ambilKode1 = array_rand($angka_kode1, 3);
        $generetKode1 = implode('', $ambilKode1);
        // generate kode transaksi random 3 digit kedua
        $angka_kode2 = range(0, 9);
        shuffle($angka_kode2);
        $ambilKode2 = array_rand($angka_kode2, 3);
        $generetKode2 = implode('', $ambilKode2);
        // kode transaksi yang sudah di random
        $kode_transaksi = 'STR-' . $generetKode1 . $generetKode2;


        // enkripsi tanggal
        $tanggal = base64_decode($tgl);

        //get tanggal list booking
        $tanggal_form = $this->request->getVar('tanggal');
        // cek tanggal pencarian
        if ($tanggal_form) {
            $data_store = $this->storeModel->where('tanggal', $tanggal_form)->findAll();
        } else {
            $data_store =  $this->storeModel->where('bulan', $bulan)->findAll();
        }

        $data = [
            'tittle' => 'Data Store',
            'validation' => \Config\Services::validation(),
            'kode_transaksi' => $kode_transaksi,
            'tanggal' => $tanggal,
            'store' => $data_store,
            'tanggal_list' => $tanggal_form
        ];
        return view('store/index', $data);
    }


    public function d_excel($tgl)
    {
        // bulan
        $get_bulan = date('m');
        // set bulan
        $bulan = '';
        // cek angka bulan
        if ($get_bulan == '01') {
            $bulan = 'Januari';
        }
        if ($get_bulan == '02') {
            $bulan = 'Februari';
        }
        if ($get_bulan == '03') {
            $bulan = 'Maret';
        }
        if ($get_bulan == '04') {
            $bulan = 'April';
        }
        if ($get_bulan == '05') {
            $bulan = 'Mei';
        }
        if ($get_bulan == '06') {
            $bulan = 'Juni';
        }
        if ($get_bulan == '07') {
            $bulan = 'Juli';
        }
        if ($get_bulan == '08') {
            $bulan = 'Agustus';
        }
        if ($get_bulan == '09') {
            $bulan = 'September';
        }
        if ($get_bulan == '10') {
            $bulan = 'Oktober';
        }
        if ($get_bulan == '11') {
            $bulan = 'November';
        }
        if ($get_bulan == '12') {
            $bulan = 'Desember';
        }

        //generet kode transaksi random 3 digit pertama
        $angka_kode1 = range(0, 9);
        shuffle($angka_kode1);
        $ambilKode1 = array_rand($angka_kode1, 3);
        $generetKode1 = implode('', $ambilKode1);
        // generate kode transaksi random 3 digit kedua
        $angka_kode2 = range(0, 9);
        shuffle($angka_kode2);
        $ambilKode2 = array_rand($angka_kode2, 3);
        $generetKode2 = implode('', $ambilKode2);
        // kode transaksi yang sudah di random
        $kode_transaksi = 'STR-' . $generetKode1 . $generetKode2;


        // enkripsi tanggal
        $tanggal = base64_decode($tgl);

        //get tanggal list booking
        $tanggal_form = $this->request->getVar('tanggal');
        // cek tanggal pencarian
        if ($tanggal_form) {
            $data_store = $this->storeModel->where('tanggal', $tanggal_form)->findAll();
        } else {
            $data_store =  $this->storeModel->where('bulan', $bulan)->findAll();
        }

        $data = [
            'tittle' => 'Store',
            'validation' => \Config\Services::validation(),
            'kode_transaksi' => $kode_transaksi,
            'tanggal' => $tanggal,
            'store' => $data_store,
            'bulan' => $bulan,
            'tanggal_list' => $tanggal_form
        ];
        return view('store/excel_store', $data);
    }

    public function proses_input()
    {
        $tanggal = date('d-m-Y');
        $date_encode = base64_encode($tanggal);

        // validasi form cabang
        if (!$this->validate([
            'kode_transaksi' => [
                'rules' => 'required|is_unique[store.kode_transaksi]',
                'errors' => [
                    'required' => 'Kode Transaksi Harus Di Lengkapi!',
                    'is_unique' => 'Kode Transaksi Sudah Terdaftar!'
                ]
            ],
            'tanggal_transaksi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Transaksi Harus Di Lengkapi!'
                ]
            ],
            'nama_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Barang Harus Di Lengkapi!'
                ]
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori Barang Harus Di Lengkapi!'
                ]
            ],
            'harga_modal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga Modal Harus Di Lengkapi!'
                ]
            ],
            'harga_jual' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga Jual Harus Di Lengkapi!'
                ]
            ],
        ])) {
            return redirect()->to(base_url('/admin/store/' . $date_encode))->withInput();
        } else {
            // get harga modal
            $harga_modal = $this->request->getVar('harga_modal');
            $harga_jual = $this->request->getVar('harga_jual');
            $keuntungan = $harga_jual - $harga_modal;

            // get tanggal transaksi
            $tanggal_transaksi = $this->request->getVar('tanggal_transaksi');
            // cut tanggal transaksi
            $get_bulan = substr($tanggal_transaksi, 3, 2);
            // conversi get bulan angka ke bulan huruf
            $bulan = '';
            // cek angka bulan
            if ($get_bulan == '01') {
                $bulan = 'Januari';
            }
            if ($get_bulan == '02') {
                $bulan = 'Februari';
            }
            if ($get_bulan == '03') {
                $bulan = 'Maret';
            }
            if ($get_bulan == '04') {
                $bulan = 'April';
            }
            if ($get_bulan == '05') {
                $bulan = 'Mei';
            }
            if ($get_bulan == '06') {
                $bulan = 'Juni';
            }
            if ($get_bulan == '07') {
                $bulan = 'Juli';
            }
            if ($get_bulan == '08') {
                $bulan = 'Agustus';
            }
            if ($get_bulan == '09') {
                $bulan = 'September';
            }
            if ($get_bulan == '10') {
                $bulan = 'Oktober';
            }
            if ($get_bulan == '11') {
                $bulan = 'November';
            }
            if ($get_bulan == '12') {
                $bulan = 'Desember';
            }

            // insert data penjualan store kedalam table store
            $this->storeModel->save([
                'kode_transaksi' => $this->request->getVar('kode_transaksi'),
                'nama_barang' => $this->request->getVar('nama_barang'),
                'kategori' => $this->request->getVar('kategori'),
                'tanggal' => $this->request->getVar('tanggal_transaksi'),
                'bulan' => $bulan,
                'harga_modal' => $harga_modal,
                'harga_jual' => $harga_jual,
                'keuntungan' => $keuntungan,
            ]);

            // insert data penjualan kedalam table pemasukan
            $this->pemasukanModel->save([
                'kode_transaksi' => $this->request->getVar('kode_transaksi'),
                'tanggal' => $this->request->getVar('tanggal_transaksi'),
                'bulan' => $bulan,
                'dept' => 'store',
                'income' => $keuntungan
            ]);


            session()->setFlashdata('pesan', 'Data Penjualan Berhasil di Tambah!');
            return redirect()->to(base_url('/admin/store/' . $date_encode))->withInput();
        }
    }

    public function edit_store($kode_transaksi)
    {
        // get data transaksi by kode
        $data_transaksi = $this->storeModel->where('kode_transaksi', $kode_transaksi)->first();

        $data = [
            'tittle' => 'Edit Store',
            'data_transaksi' => $data_transaksi,
            'validation' => \Config\Services::validation()
        ];

        return view('store/update', $data);
    }

    public function proses_update($kode_transaksi)
    {
        $tanggal = date('d-m-Y');
        $date_encode = base64_encode($tanggal);
        // validasi form cabang
        if (!$this->validate([
            'kode_transaksi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode Transaksi Harus Di Lengkapi!'
                ]
            ],
            'tanggal_transaksi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Transaksi Harus Di Lengkapi!'
                ]
            ],
            'nama_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Barang Harus Di Lengkapi!'
                ]
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori Barang Harus Di Lengkapi!'
                ]
            ],
            'harga_modal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga Modal Harus Di Lengkapi!'
                ]
            ],
            'harga_jual' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga Jual Harus Di Lengkapi!'
                ]
            ],
        ])) {
            return redirect()->to(base_url('/admin/edit-store/' . $kode_transaksi))->withInput();
        } else {
            // update data
            // get id data transaksi
            $data_transaksi = $this->storeModel->where('kode_transaksi', $kode_transaksi)->first();
            $id = $data_transaksi['id'];
            $data_income = $this->pemasukanModel->where('kode_transaksi', $kode_transaksi)->first();
            $id_income = $data_income['id'];


            // get harga modal
            $harga_modal = $this->request->getVar('harga_modal');
            $harga_jual = $this->request->getVar('harga_jual');
            $keuntungan = $harga_jual - $harga_modal;

            // update data
            $this->storeModel->save([
                'id' => $id,
                'kode_transaksi' => $this->request->getVar('kode_transaksi'),
                'nama_barang' => $this->request->getVar('nama_barang'),
                'kategori' => $this->request->getVar('kategori'),
                'tanggal' => $this->request->getVar('tanggal_transaksi'),
                'harga_modal' => $harga_modal,
                'harga_jual' => $harga_jual,
                'keuntungan' => $keuntungan,
            ]);

            // update data income
            $this->pemasukanModel->save([
                'id' => $id_income,
                'kode_transaksi' => $this->request->getVar('kode_transaksi'),
                'tanggal' => $this->request->getVar('tanggal_transaksi'),
                'dept' => 'store',
                'income' => $keuntungan
            ]);

            session()->setFlashdata('pesan', 'Data Penjualan Berhasil di Edit!');
            return redirect()->to(base_url('/admin/store/' . $date_encode))->withInput();
        }
    }


    public function hapus_store($kode_transaksi)
    {
        $tanggal = date('d-m-Y');
        $date_encode = base64_encode($tanggal);
        // get id 
        $data_transaksi = $this->storeModel->where('kode_transaksi', $kode_transaksi)->first();
        $id = $data_transaksi['id'];
        $data_income = $this->pemasukanModel->where('kode_transaksi', $kode_transaksi)->first();
        $id_income = $data_income['id'];

        // delete data
        $this->storeModel->delete($id);
        $this->pemasukanModel->delete($id_income);


        session()->setFlashdata('pesan', 'Data Penjualan Berhasil di Hapus!');
        return redirect()->to(base_url('/admin/store/' . $date_encode))->withInput();
    }
}
