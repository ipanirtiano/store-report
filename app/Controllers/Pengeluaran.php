<?php

namespace App\Controllers;

use App\Models\DesignModel;
use App\Models\StoreModel;
use App\Models\PemasukanModel;
use App\Models\PengeluaranModel;

class Pengeluaran extends BaseController
{

    public function __construct()
    {
        $this->storeModel = new StoreModel();
        $this->designModel = new DesignModel();
        $this->pemasukanModel = new PemasukanModel();
        $this->pengeluaranModel = new PengeluaranModel();
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
        $kode_transaksi = 'TR-' . $generetKode1 . $generetKode2;


        // enkripsi tanggal
        $tanggal = base64_decode($tgl);

        //get tanggal list booking
        $tanggal_form = $this->request->getVar('tanggal');
        // cek tanggal pencarian
        if ($tanggal_form) {
            $data_store = $this->pengeluaranModel->where('tanggal', $tanggal_form)->findAll();
        } else {
            $data_store =  $this->pengeluaranModel->where('bulan', $bulan)->findAll();
        }

        $data = [
            'tittle' => 'Data Pengeluaran',
            'validation' => \Config\Services::validation(),
            'kode_transaksi' => $kode_transaksi,
            'tanggal' => $tanggal,
            'store' => $data_store,
            'tanggal_list' => $tanggal_form
        ];
        return view('pengeluaran/index', $data);
    }


    public function bulan_ini($tgl)
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
        $kode_transaksi = 'TR-' . $generetKode1 . $generetKode2;


        // enkripsi tanggal
        $tanggal = base64_decode($tgl);

        //get tanggal list booking
        $tanggal_form = $this->request->getVar('tanggal');
        // cek tanggal pencarian
        if ($tanggal_form) {
            $data_store = $this->pengeluaranModel->where('tanggal', $tanggal_form)->findAll();
        } else {
            $data_store =  $this->pengeluaranModel->where('bulan', $bulan)->findAll();
        }

        $data = [
            'tittle' => 'Data Pengeluaran',
            'validation' => \Config\Services::validation(),
            'kode_transaksi' => $kode_transaksi,
            'tanggal' => $tanggal,
            'store' => $data_store,
            'tanggal_list' => $tanggal_form
        ];
        return view('pengeluaran/pengeluaran_list', $data);
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
        $kode_transaksi = 'TR-' . $generetKode1 . $generetKode2;


        // enkripsi tanggal
        $tanggal = base64_decode($tgl);

        //get tanggal list booking
        $tanggal_form = $this->request->getVar('tanggal');
        // cek tanggal pencarian
        if ($tanggal_form) {
            $data_store = $this->pengeluaranModel->where('tanggal', $tanggal_form)->findAll();
        } else {
            $data_store =  $this->pengeluaranModel->where('bulan', $bulan)->findAll();
        }

        $data = [
            'tittle' => 'Data Pengeluaran',
            'validation' => \Config\Services::validation(),
            'kode_transaksi' => $kode_transaksi,
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'store' => $data_store,
            'tanggal_list' => $tanggal_form
        ];
        return view('pengeluaran/excel_pengeluaran', $data);
    }

    public function proses_input()
    {
        $tanggal = date('d-m-Y');
        $date_encode = base64_encode($tanggal);

        // validasi form cabang
        if (!$this->validate([
            'kode_transaksi' => [
                'rules' => 'required|is_unique[design.kode_transaksi]',
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
            'ket_biaya' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keterangan Biaya Harus Di Lengkapi!'
                ]
            ],
            'jumlah_biaya' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah Biaya Harus Di Lengkapi!'
                ]
            ],
        ])) {
            return redirect()->to(base_url('/admin/pengeluaran/' . $date_encode))->withInput();
        } else {

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
            $this->pengeluaranModel->save([
                'kode_transaksi' => $this->request->getVar('kode_transaksi'),
                'tanggal' => $this->request->getVar('tanggal_transaksi'),
                'bulan' => $bulan,
                'ket_biaya' => $this->request->getVar('ket_biaya'),
                'jumlah' => $this->request->getVar('jumlah_biaya'),
            ]);


            session()->setFlashdata('pesan', 'Data Pengeluaran Berhasil di Tambah!');
            return redirect()->to(base_url('/admin/pengeluaran/' . $date_encode))->withInput();
        }
    }



    public function edit_pengeluaran($kode_transaksi)
    {
        // get data transaksi by kode
        $data_transaksi = $this->pengeluaranModel->where('kode_transaksi', $kode_transaksi)->first();

        $data = [
            'tittle' => 'Edit Design',
            'data_transaksi' => $data_transaksi,
            'validation' => \Config\Services::validation()
        ];

        return view('pengeluaran/update', $data);
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
            'ket_biaya' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keterangan Biaya Harus Di Lengkapi!'
                ]
            ],
            'jumlah_biaya' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah Biaya Harus Di Lengkapi!'
                ]
            ],
        ])) {
            return redirect()->to(base_url('/admin/edit-pengeluaran/' . $kode_transaksi))->withInput();
        } else {
            // update data
            // get id data transaksi
            $data_transaksi = $this->pengeluaranModel->where('kode_transaksi', $kode_transaksi)->first();
            $id = $data_transaksi['id'];
            $data_pengeluaran = $this->pengeluaranModel->where('kode_transaksi', $kode_transaksi)->first();
            $id_income = $data_pengeluaran['id'];

            // update data
            $this->pengeluaranModel->save([
                'id' => $id,
                'kode_transaksi' => $this->request->getVar('kode_transaksi'),
                'tanggal' => $this->request->getVar('tanggal_transaksi'),
                'ket_biaya' => $this->request->getVar('ket_biaya'),
                'jumlah' => $this->request->getVar('jumlah_biaya'),
            ]);



            session()->setFlashdata('pesan', 'Data Pengeluaran Berhasil di Edit!');
            return redirect()->to(base_url('/admin/pengeluaran/' . $date_encode))->withInput();
        }
    }


    public function hapus_pengeluaran($kode_transaksi)
    {
        $tanggal = date('d-m-Y');
        $date_encode = base64_encode($tanggal);
        // get id 
        $data_pengeluaran = $this->pengeluaranModel->where('kode_transaksi', $kode_transaksi)->first();
        $id_pengeluaran = $data_pengeluaran['id'];

        // delete data
        $this->pengeluaranModel->delete($id_pengeluaran);

        session()->setFlashdata('pesan', 'Data Pengeluaran Berhasil di Hapus!');
        return redirect()->to(base_url('/admin/pengeluaran/' . $date_encode))->withInput();
    }
}
