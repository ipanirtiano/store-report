<?php

namespace App\Controllers;

use App\Models\BookingModel;
use App\Models\CancelBookingModel;
use App\Models\GuestModel;
use App\Models\RuanganModel;
use App\Models\StoreModel;

class Dashboard extends BaseController
{

    public function __construct()
    {
        $this->storeModel = new StoreModel();
    }

    public function index()
    {
        // tanggal 
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('d-m-Y');

        // data diecast
        // $diecast = $this->storeModel->getNumDiecast();
        // $actionFigure = $this->storeModel->getNumActionFigure();
        // $modelKit = $this->storeModel->getNumModelKit();

        $data = [
            'tittle' => 'Dashboard | Home'
        ];
        return view('Dashboard/index', $data);
    }
}
