<?php

header("Content-type: application/vnc-ms-excel");
header("Content-Disposition: attachment; filename=$tittle.xls");
header("Pragma: no-chace");
header("Expire: 0");

?>
<center>
    <h2>Data Pengeluaran bulan <?= $bulan . ' ' . date('Y') ?></h2>
</center>

<table border="1" id="dataTable" width="100%" cellspacing="0">
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
        <?php $tahun = ''; ?>
        <?php foreach ($store as $data) : ?>
            <!-- get tahun -->
            <?php
            $cut_tahun = $data['tanggal'];
            $tahun = substr($cut_tahun, 6, 4); ?>
            <tr style="text-align: left">
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
            <td colspan="4" style="text-align: center"><b>Total Pengeluaran Bulan <?= $bulan . ' ' . $tahun ?></b> </td>
            <td class="text-nowrap"><b><?= 'Rp. ' . number_format($total, 2, ',', '.')  ?></b></td>
        </tr>
    </tfoot>
</table>