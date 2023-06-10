<?php

namespace App\Controllers;

use TCPDF;

use CodeIgniter\Config\Config;
use App\Models\BookingModel;
use App\Models\PemasukanModel;
use App\Models\PengeluaranModel;
use CodeIgniter\HTTP\Request;

class PrintOut extends BaseController
{
    public function __construct()
    {
        $this->pemasukanModel = new PemasukanModel();
        $this->pengeluaranModel = new PengeluaranModel();
    }

    public function pemasukan($tgl)
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
        // return view('pemasukan/print_pdf', $data);

        // die;

        $html = view('pemasukan/print_pdf', $data);


        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPageOrientation('L');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->addPage();

        $pdf->writeHTML($html, true, false, true, false, '');

        $this->response->setContentType('application/pdf');

        $pdf->Output('Data Pemasukan.pdf', 'I');
    }



    public function pengeluaran($tgl)
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

        $html = view('pengeluaran/print_pdf', $data);


        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPageOrientation('L');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->addPage();

        $pdf->writeHTML($html, true, false, true, false, '');

        $this->response->setContentType('application/pdf');

        $pdf->Output('Data Pengeluaran.pdf', 'I');
    }

    public function profit($tgl)
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


        $pemasukan =  $this->pemasukanModel->findAll();
        $pengeluaran = $this->pengeluaranModel->findAll();

        $data = [
            'tittle' => 'Data Profit',
            'validation' => \Config\Services::validation(),
            'kode_transaksi' => $kode_transaksi,
            'pemasukan' => $pemasukan,
            'pengeluaran' => $pengeluaran,
            'tanggal' => $tanggal,
        ];

        $html = view('profit/print_pdf', $data);


        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPageOrientation('L');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->addPage();

        $pdf->writeHTML($html, true, false, true, false, '');

        $this->response->setContentType('application/pdf');

        $pdf->Output('Data Profit.pdf', 'I');
    }
}
