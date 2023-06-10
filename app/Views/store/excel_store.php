<?php

header("Content-type: application/vnc-ms-excel");
header("Content-Disposition: attachment; filename=$tittle.xls");
header("Pragma: no-chace");
header("Expire: 0");

?>
<center>
    <h2>Data Penjualan Store bulan <?= $bulan . ' ' . date('Y') ?></h2>
</center>
<table border="1" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Transaksi</th>
            <th>Tanggal</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Harga Modal</th>
            <th>Harga Jual</th>
            <th>Keuntungan</th>
        </tr>
    </thead>
    <?php
    $i = 0;
    $total_modal = 0;
    $total_jual = 0;
    $keuntungan = 0;
    ?>

    <tbody>
        <?php $tahun = ''; ?>
        <?php foreach ($store as $data) : ?>
            <!-- get tahun -->
            <?php
            $cut_tahun = $data['tanggal'];
            $tahun = substr($cut_tahun, 6, 4);

            ?>

            <tr style="text-align: left">
                <?php $i++; ?>
                <td class="text-nowrap"><?= $i; ?></td>
                <td class="text-nowrap"><?= $data['kode_transaksi']; ?></td>
                <td class="text-nowrap"><?= $data['tanggal'] ?></td>
                <td class="text-nowrap"><?= $data['nama_barang']; ?></td>
                <td class="text-nowrap"><?= $data['kategori']; ?></td>
                <td class="text-nowrap"><?= 'Rp. ' . number_format($data['harga_modal'], 2, ',', '.') ?></td>
                <td class="text-nowrap"><?= 'Rp. ' . number_format($data['harga_jual'], 2, ',', '.')  ?></td>
                <td class="text-nowrap"><?= 'Rp. ' . number_format($data['keuntungan'], 2, ',', '.')  ?></td>

            </tr>
            <?php
            $total_modal += $data['harga_modal'];
            $total_jual += $data['harga_jual'];
            $keuntungan += $data['keuntungan'];
            ?>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" style="text-align: center"><b> Total Penjualan Store <?= $bulan . ' ' . $tahun ?></b></td>
            <td class="text-nowrap"><b><?= 'Rp. ' . number_format($total_modal, 2, ',', '.')  ?></b> </td>
            <td class="text-nowrap"><b> <?= 'Rp. ' . number_format($total_jual, 2, '.', '.')  ?></b></td>
            <td class="text-nowrap"><b><?= 'Rp. ' . number_format($keuntungan, 2, ',', '.'); ?></b> </td>
        </tr>
    </tfoot>
</table>