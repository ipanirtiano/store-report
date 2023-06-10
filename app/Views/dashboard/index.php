<?= $this->extend('layout/template') ?>
<?php date_default_timezone_set('Asia/Jakarta'); ?>
<?php $this->section('content') ?>
<?php if (session('level') == 'admin') : ?>
    <div id="layoutSidenav_content">
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>

            <?php $tanggal = date('d-m-Y'); ?>
            <?php $date_encode = base64_encode($tanggal); ?>
            <div class="row">
                <div class="col-xl-3 col-md-3">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body" style="text-align:center"><i class="fa fa-book mb-2" aria-hidden="true" style="width: 80px; height: 80px"></i><br>Pemasukan Bulan Ini</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="<?= base_url(); ?>/admin/pemasukan/<?= $date_encode; ?>">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body" style="text-align:center"><i class="fa fa-list mb-2" aria-hidden="true" style="width: 80px; height: 80px"></i><br>Pengeluaran Bulan Ini <br></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="<?= base_url(); ?>/admin/pengeluaran-list/<?= $date_encode; ?>">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body" style="text-align:center"><i class="fa fa-industry mb-2" aria-hidden="true" style="width: 80px; height: 80px"></i><br>Profit Bulan Ini</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="<?= base_url(); ?>/admin/profit/<?= $date_encode; ?>">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-xl-3 col-md-3">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body" style="text-align:center"><i class="fa fa-times-circle mb-2" aria-hidden="true" style="width: 80px; height: 80px"></i><br>Cancel </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div> -->
            </div>

            <div class="row">
                <div class="col-md-3 mb-2">
                    <div class="card">
                        <div class="card-header">
                            Grafik Pemasukan
                        </div>
                        <div class="panel panel-default">
                            <br>
                            <div class="panel-body"><?= $this->include('dashboard/barchart'); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            Grafik Pemasukan
                        </div>
                        <div class="panel panel-default">
                            <br>
                            <div class="panel-body"><?= $this->include('dashboard/linechart'); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>


<!-- jika level user adalah manager -->
<?php if (session('level') == 'manager') : ?>
    <div id="layoutSidenav_content">
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>

            <?php $tanggal = date('d-m-Y'); ?>
            <?php $date_encode = base64_encode($tanggal); ?>
            <div class="row">
                <div class="col-xl-3 col-md-3">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body" style="text-align:center"><i class="fa fa-book mb-2" aria-hidden="true" style="width: 80px; height: 80px"></i><br>Pemasukan Hari Bulan Ini</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="<?= base_url(); ?>/view/pemasukan/<?= $date_encode; ?>">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body" style="text-align:center"><i class="fa fa-list mb-2" aria-hidden="true" style="width: 80px; height: 80px"></i><br>Pengeluaran Bulan Ini <br></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="<?= base_url(); ?>/view/pengeluaran-list/<?= $date_encode; ?>">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body" style="text-align:center"><i class="fa fa-industry mb-2" aria-hidden="true" style="width: 80px; height: 80px"></i><br>Profit Bulan Ini</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="<?= base_url(); ?>/view/profit/<?= $date_encode; ?>">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-xl-3 col-md-3">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body" style="text-align:center"><i class="fa fa-times-circle mb-2" aria-hidden="true" style="width: 80px; height: 80px"></i><br>Cancel </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div> -->
            </div>

            <div class="row">
                <div class="col-md-3 mb-2">
                    <div class="card">
                        <div class="card-header">
                            Grafik Pemasukan
                        </div>
                        <div class="panel panel-default">
                            <br>
                            <div class="panel-body"><?= $this->include('dashboard/barchart'); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            Grafik Pemasukan
                        </div>
                        <div class="panel panel-default">
                            <br>
                            <div class="panel-body"><?= $this->include('dashboard/linechart'); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>


</div>
</div>
<?php $this->endSection() ?>