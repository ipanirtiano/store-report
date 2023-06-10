<?= $this->extend('layout/template') ?>
<?php date_default_timezone_set('Asia/Jakarta'); ?>
<?php $this->section('content') ?>
<div id="layoutSidenav_content">
    <div class="container-fluid">


        <div class="row">
            <div class="col">
                <h1 class="mt-4">Update Data Pengeluaran</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Pengeluaran</li>
                    <li class="breadcrumb-item active">Update</li>
                </ol>
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-user mr-2" aria-hidden="true"></i> Update Data Pengeluaran
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <form action="<?= base_url(); ?>/pengeluaran/proses_update/<?= $data_transaksi['kode_transaksi']; ?>" method="post">
                                    <?= csrf_field() ?>

                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label">Kode Transaksi</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control form-control-sm <?= ($validation->hasError('kode_transaksi') ? 'is-invalid' : ''); ?>" id="colFormLabelSm" name="kode_transaksi" value="<?= $data_transaksi['kode_transaksi']; ?>" readonly>
                                            <div class="invalid-feedback" style="font-size: small">
                                                <?= $validation->getError('kode_transaksi'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label">Tanggal Transaksi</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control form-control <?= ($validation->hasError('tanggal_transaski') ? 'is-invalid' : ''); ?>" id="colFormLabelSm" name="tanggal_transaksi" value="<?= $data_transaksi['tanggal']; ?>" readonly>
                                            <div class="invalid-feedback" style="font-size: small">
                                                <?= $validation->getError('tanggal_transaski'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label">Keterangan Biaya</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control <?= ($validation->hasError('ket_biaya') ? 'is-invalid' : ''); ?>" id="colFormLabelSm" name="ket_biaya" value="<?= $data_transaksi['ket_biaya']; ?>" placeholder="Keterangan Biaya" onkeyup="this.value = this.value.toUpperCase();">
                                            <div class="invalid-feedback" style="font-size: small">
                                                <?= $validation->getError('ket_biaya'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label">Jumlah Biaya</label>
                                        <div class="col-md-9">
                                            <input type="number" class="form-control form-control <?= ($validation->hasError('jumlah_biaya') ? 'is-invalid' : ''); ?>" id="colFormLabelSm" name="jumlah_biaya" value="<?= $data_transaksi['jumlah']; ?>" placeholder="Jumlah Biaya">
                                            <div class="invalid-feedback" style="font-size: small">
                                                <?= $validation->getError('jumlah_biaya'); ?>
                                            </div>
                                        </div>
                                    </div>



                                    <?php $tanggal = date('d-m-Y'); ?>
                                    <?php $date_encode = base64_encode($tanggal); ?>
                                    <button type="submit" class="btn btn-sm btn-info">Update</button>
                                    <a href="<?= base_url(); ?>/admin/pengeluaran/<?= $date_encode; ?>" class="btn btn-sm btn-danger">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection() ?>