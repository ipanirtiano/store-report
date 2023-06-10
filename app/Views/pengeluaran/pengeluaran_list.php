<?= $this->extend('layout/template') ?>

<?php $this->section('content') ?>
<div id="layoutSidenav_content">
    <div class="container-fluid">
        <h1 class="mt-4">Data Pengeluaran</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data Pengeluaran</li>
        </ol>
        <div class="row">
            <?php $tanggal = date('d-m-Y'); ?>
            <?php $date_encode = base64_encode($tanggal); ?>
            <div class="col">

                <?php if (session('level') == 'admin') : ?>
                    <a href="<?= base_url(); ?>/admin/pengeluaran-excel/<?= $date_encode; ?>" class="btn btn-sm btn-info mb-2"><i class="fa fa-file-excel mr-2" aria-hidden="true"></i>Download Excel</a>
                    <a href="<?= base_url(); ?>/admin/print-pengeluaran/<?= $date_encode; ?>" class="btn btn-sm btn-dark mb-2"><i class="fa fa-file mr-2" aria-hidden="true"></i>Download PDF</a>
                <?php endif; ?>
                <?php if (session('level') == 'manager') : ?>
                    <a href="<?= base_url(); ?>/view/pengeluaran-excel/<?= $date_encode; ?>" class="btn btn-sm btn-info mb-2"><i class="fa fa-file-excel mr-2" aria-hidden="true"></i>Download Excel</a>
                    <a href="<?= base_url(); ?>/view/print-pengeluaran/<?= $date_encode; ?>" class="btn btn-sm btn-dark mb-2"><i class="fa fa-file mr-2" aria-hidden="true"></i>Download PDF</a>
                <?php endif; ?>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Data Pengeluaran
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
                                    <?php $tanggal = date('d-m-Y'); ?>
                                    <?php $date_encode = base64_encode($tanggal); ?>
                                    <?php if (session('level') == 'admin') : ?>
                                        <form action="<?= base_url(); ?>/admin/pengeluaran-list/<?= $date_encode; ?>" method="post">
                                        <?php endif; ?>
                                        <?php if (session('level') == 'manager') : ?>
                                            <form action="<?= base_url(); ?>/view/pengeluaran-list/<?= $date_encode; ?>" method="post">
                                            <?php endif; ?>
                                            <div class="form-group row">
                                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Tanggal </label>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control datepicker form-control-sm <?= ($validation->hasError('tanggal') ? 'is-invalid' : ''); ?>" id="colFormLabelSm" name="tanggal" value="<?= ($tanggal_list != NULL ? $tanggal_list : date('d-m-Y')); ?>" autocomplete="off">
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
                                        <th>Keterangan Biaya</th>
                                        <th>Jumlah Biaya</th>
                                    </tr>
                                </thead>
                                <?php
                                $i = 0;
                                $total = 0;
                                ?>

                                <tbody>
                                    <?php foreach ($store as $data) : ?>
                                        <tr>
                                            <?php $i++; ?>
                                            <td class="text-nowrap"><?= $i; ?></td>
                                            <td class="text-nowrap"><?= $data['kode_transaksi']; ?></td>
                                            <td class="text-nowrap"><?= $data['tanggal'] ?></td>
                                            <td class="text-nowrap"><?= $data['ket_biaya']; ?></td>
                                            <td class="text-nowrap"><?= 'Rp. ' . number_format($data['jumlah'], 2, ',', '.') ?></td>
                                        </tr>
                                        <?php
                                        $total += $data['jumlah'];
                                        ?>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3"></th>
                                        <th>Total :</th>
                                        <th class="text-nowrap"><?= 'Rp. ' . number_format($total, 2, ',', '.')  ?></ <th>
                                        </th>
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
                    <h5 class="modal-title" id="staticBackdropLabel"><i class="fa fa-user mr-2" aria-hidden="true"></i>Tambah Data Pengeluaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url(); ?>/pengeluaran/proses_input" method="post">
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
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label">Keterangan Biaya</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control form-control <?= ($validation->hasError('ket_biaya') ? 'is-invalid' : ''); ?>" id="colFormLabelSm" name="ket_biaya" value="<?= old('ket_biaya'); ?>" placeholder="Keterangan Biaya" onkeyup="this.value = this.value.toUpperCase();">
                                <div class="invalid-feedback" style="font-size: small">
                                    <?= $validation->getError('ket_biaya'); ?>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label">Jumlah Biaya</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control form-control <?= ($validation->hasError('jumlah_biaya') ? 'is-invalid' : ''); ?>" id="colFormLabelSm" name="jumlah_biaya" value="<?= old('jumlah_biaya'); ?>" placeholder="Jumlah Biaya">
                                <div class="invalid-feedback" style="font-size: small">
                                    <?= $validation->getError('jumlah_biaya'); ?>
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