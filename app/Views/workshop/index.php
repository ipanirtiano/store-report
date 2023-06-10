<?= $this->extend('layout/template') ?>

<?php $this->section('content') ?>
<div id="layoutSidenav_content">
    <div class="container-fluid">
        <h1 class="mt-4">Workshop</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Penjualan</li>
            <li class="breadcrumb-item active">Workshop </li>
        </ol>
        <div class="row">
            <?php $tanggal = date('d-m-Y'); ?>
            <?php $date_encode = base64_encode($tanggal); ?>
            <div class="col">
                <?php if (session('level') == 'admin') : ?>
                    <button type="button" class="btn btn-sm mt-1 btn-dark mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa fa-plus mr-2" aria-hidden="true"></i>Tambah Data</button>
                    <a href="<?= base_url(); ?>/admin/workshop-excel/<?= $date_encode; ?>" class="btn btn-sm btn-info"><i class="fa fa-file-excel mr-2" aria-hidden="true"></i>Download Excel</a>
                <?php endif; ?>
                <?php if (session('level') == 'manager') : ?>
                    <a href="<?= base_url(); ?>/view/workshop-excel/<?= $date_encode; ?>" class="btn btn-sm mb-2 btn-info"><i class="fa fa-file-excel mr-2" aria-hidden="true"></i>Download Excel</a>
                <?php endif; ?>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Data Penjualan Workshop
                    </div>
                    <div class="card-body">
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('pesan'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <?php if (session('level') == 'admin') : ?>
                                        <form action="<?= base_url(); ?>/admin/workshop/<?= $date_encode; ?>" method="post">
                                        <?php endif; ?>
                                        <?php if (session('level') == 'manager') : ?>
                                            <form action="<?= base_url(); ?>/view/workshop/<?= $date_encode; ?>" method="post">
                                            <?php endif; ?>
                                            <div class="form-group row">
                                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Tanggal </label>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control datepicker form-control-sm <?= ($validation->hasError('tanggal') ? 'is-invalid' : ''); ?>" id="colFormLabelSm" name="tanggal" value="<?= ($tanggal_list != NULL ? $tanggal_list : date('d-m-Y')) ?>" autocomplete="off">
                                                    <div class="invalid-feedback" style="font-size: small">
                                                        <?= $validation->getError('tanggal'); ?>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-search" aria-hidden="true"></i></button>
                                                </div>
                                            </div>
                                            </form>
                                </div>
                            </div>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Transaksi</th>
                                        <th>Tanggal</th>
                                        <th>Nama Project</th>
                                        <th>Harga Modal</th>
                                        <th>Harga Jual</th>
                                        <th>Keuntungan</th>
                                        <?php if (session('level') == 'admin') : ?>
                                            <th>Action</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <?php $i = 0;
                                $total_modal = 0;
                                $total_jual = 0;
                                $keuntungan = 0; ?>
                                <tbody>
                                    <?php foreach ($store as $data) : ?>
                                        <tr>
                                            <?php $i++; ?>
                                            <td class="text-nowrap"><?= $i; ?></td>
                                            <td class="text-nowrap"><?= $data['kode_transaksi']; ?></td>
                                            <td class="text-nowrap"><?= $data['tanggal'] ?></td>
                                            <td class="text-nowrap"><?= $data['nama_project']; ?></td>
                                            <td class="text-nowrap"><?= 'Rp. ' . number_format($data['harga_modal'], 2, ',', '.') ?></td>
                                            <td class="text-nowrap"><?= 'Rp. ' . number_format($data['harga_jual'], 2, ',', '.')  ?></td>
                                            <td class="text-nowrap"><?= 'Rp. ' . number_format($data['keuntungan'], 2, ',', '.')  ?></td>
                                            <?php if (session('level') == 'admin') : ?>
                                                <td class="text-nowrap">
                                                    <a href="<?= base_url(); ?>/admin/edit-workshop/<?= $data['kode_transaksi']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                                    <a href="<?= base_url(); ?>/admin/hapus-workshop/<?= $data['kode_transaksi']; ?>" class="btn btn-sm btn-danger tombol-hapus">Hapus</a>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                        <?php $total_modal += $data['harga_modal'];
                                        $total_jual += $data['harga_jual'];
                                        $keuntungan += $data['keuntungan']; ?>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4" style="text-align: center">Grand Total :</th>
                                        <th class="text-nowrap"><?= 'Rp. ' . number_format($total_modal, 2, ',', '.')  ?></th>
                                        <th class="text-nowrap"><?= 'Rp. ' . number_format($total_jual, 2, '.', '.')  ?></th>
                                        <th class="text-nowrap"><?= 'Rp. ' . number_format($keuntungan, 2, ',', '.'); ?></th>
                                        <?php if (session('level') == 'admin') : ?>
                                            <th></th>
                                        <?php endif; ?>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered 	modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="staticBackdropLabel"><i class="fa fa-user mr-2" aria-hidden="true"></i>Tambah Data Penjualan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url(); ?>/workshop/proses_input" method="post">
                        <?= csrf_field() ?>
                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label">Kode Transaksi</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control form-control-sm <?= ($validation->hasError('kode_transaksi') ? 'is-invalid' : ''); ?>" id="colFormLabelSm" name="kode_transaksi" value="<?= $kode_transaksi; ?>" readonly>
                                <div class="invalid-feedback" style="font-size: small">
                                    <?= $validation->getError('kode_transaksi'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label">Tanggal Transaksi</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control form-control <?= ($validation->hasError('tanggal_transaski') ? 'is-invalid' : ''); ?>" id="colFormLabelSm" name="tanggal_transaksi" value="<?= $tanggal; ?>" readonly>
                                <div class="invalid-feedback" style="font-size: small">
                                    <?= $validation->getError('tanggal_transaski'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label">Nama Project</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control form-control <?= ($validation->hasError('nama_barang') ? 'is-invalid' : ''); ?>" id="colFormLabelSm" name="nama_barang" value="<?= old('nama_barang'); ?>" placeholder="Nama Project" onkeyup="this.value = this.value.toUpperCase();">
                                <div class=" invalid-feedback" style="font-size: small">
                                    <?= $validation->getError('nama_barang'); ?>
                                </div>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label">Harga Modal</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control form-control <?= ($validation->hasError('harga_modal') ? 'is-invalid' : ''); ?>" id="colFormLabelSm" name="harga_modal" value="<?= old('harga_modal'); ?>" placeholder="Harga Modal">
                                <div class="invalid-feedback" style="font-size: small">
                                    <?= $validation->getError('harga_modal'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label">Harga Jual</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control form-control <?= ($validation->hasError('harga_jual') ? 'is-invalid' : ''); ?>" id="colFormLabelSm" name="harga_jual" value="<?= old('harga_jual'); ?>" placeholder="Harga Jual">
                                <div class="invalid-feedback" style="font-size: small">
                                    <?= $validation->getError('harga_jual'); ?>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Input</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>
</div>
<?php $this->endSection() ?>