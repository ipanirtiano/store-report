<?php

namespace App\Controllers;

use App\Models\DesignModel;
use App\Models\PemasukanModel;
use App\Models\StoreModel;
use App\Models\WorkshopModel;

class Pemasukan extends BaseController
{

    public function __construct()
    {
        $this->storeModel = new StoreModel();
        $this->designModel = new DesignModel();
        $this->workshopModel = new WorkshopModel();
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
        $kode_transaksi = 'TR-' . $generetKode1 . $generetKode2;

        // enkripsi tanggal
        $tanggal = base64_decode($tgl);


        $jan =  $this->pemasukanModel->findAll();

        $data = [
            'tittle' => 'Data Income',
            'validation' => \Config\Services::validation(),
            'kode_transaksi' => $kode_transaksi,
            'jan' => $jan,
            'tanggal' => $tanggal,
        ];
        return view('pemasukan/index', $data);
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


        $jan =  $this->pemasukanModel->findAll();

        $data = [
            'tittle' => 'Data Income',
            'validation' => \Config\Services::validation(),
            'kode_transaksi' => $kode_transaksi,
            'jan' => $jan,
            'tanggal' => $tanggal,
        ];
        return view('pemasukan/excel_pemasukan', $data);
    }
}
