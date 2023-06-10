<?php

header("Content-type: application/vnc-ms-excel");
header("Content-Disposition: attachment; filename=$tittle.xls");
header("Pragma: no-chace");
header("Expire: 0");

?>
<center>
    <h2>Data Profit Tahun <?= date('Y') ?></h2>
</center>

<table border="1" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Bulan</th>
            <th>Pemasukan</th>
            <th>Pengeluaran</th>
            <th>Profit / Loss</th>
        </tr>
    </thead>

    <?php

    $jan_pemasukan = 0;
    $jan_pengeluaran = 0;

    $feb_pemasukan = 0;
    $feb_pengeluaran = 0;

    $mar_pemasukan = 0;
    $mar_pengeluaran = 0;

    $apr_pemasukan = 0;
    $apr_pengeluaran = 0;

    $mei_pemasukan = 0;
    $mei_pengeluaran = 0;

    $jun_pemasukan = 0;
    $jun_pengeluaran = 0;

    $jul_pemasukan = 0;
    $jul_pengeluaran = 0;

    $aug_pemasukan = 0;
    $aug_pengeluaran = 0;

    $sep_pemasukan = 0;
    $sep_pengeluaran = 0;

    $okt_pemasukan = 0;
    $okt_pengeluaran = 0;

    $nov_pemasukan = 0;
    $nov_pengeluaran = 0;

    $des_pemasukan = 0;
    $des_pengeluaran = 0;

    ?>

    <tbody>
        <?php foreach ($pemasukan as $data_pemasukan) : ?>
            <?php
            if ($data_pemasukan['bulan'] == 'Januari') {
                $jan_pemasukan += $data_pemasukan['income'];
            }
            if ($data_pemasukan['bulan'] == 'Februari') {
                $feb_pemasukan += $data_pemasukan['income'];
            }
            if ($data_pemasukan['bulan'] == 'Maret') {
                $mar_pemasukan += $data_pemasukan['income'];
            }
            if ($data_pemasukan['bulan'] == 'April') {
                $apr_pemasukan += $data_pemasukan['income'];
            }
            if ($data_pemasukan['bulan'] == 'Mei') {
                $mei_pemasukan += $data_pemasukan['income'];
            }
            if ($data_pemasukan['bulan'] == 'Juni') {
                $jun_pemasukan += $data_pemasukan['income'];
            }
            if ($data_pemasukan['bulan'] == 'Juli') {
                $jul_pemasukan += $data_pemasukan['income'];
            }
            if ($data_pemasukan['bulan'] == 'Agustus') {
                $aug_pemasukan += $data_pemasukan['income'];
            }
            if ($data_pemasukan['bulan'] == 'September') {
                $sep_pemasukan += $data_pemasukan['income'];
            }
            if ($data_pemasukan['bulan'] == 'Oktober') {
                $okt_pemasukan += $data_pemasukan['income'];
            }
            if ($data_pemasukan['bulan'] == 'November') {
                $nov_pemasukan += $data_pemasukan['income'];
            }
            if ($data_pemasukan['bulan'] == 'Desember') {
                $des_pemasukan += $data_pemasukan['income'];
            }
            ?>
        <?php endforeach; ?>
        <?php foreach ($pengeluaran as $data_pengeluaran) : ?>
            <?php
            if ($data_pengeluaran['bulan'] == 'Januari') {
                $jan_pengeluaran += $data_pengeluaran['jumlah'];
            }
            if ($data_pengeluaran['bulan'] == 'Februari') {
                $feb_pengeluaran += $data_pengeluaran['jumlah'];
            }
            if ($data_pengeluaran['bulan'] == 'Maret') {
                $mar_pengeluaran += $data_pengeluaran['jumlah'];
            }
            if ($data_pengeluaran['bulan'] == 'April') {
                $apr_pengeluaran += $data_pengeluaran['jumlah'];
            }
            if ($data_pengeluaran['bulan'] == 'Mei') {
                $mei_pengeluaran += $data_pengeluaran['jumlah'];
            }
            if ($data_pengeluaran['bulan'] == 'Juni') {
                $jun_pengeluaran += $data_pengeluaran['jumlah'];
            }
            if ($data_pengeluaran['bulan'] == 'Juli') {
                $jul_pengeluaran += $data_pengeluaran['jumlah'];
            }
            if ($data_pengeluaran['bulan'] == 'Agustus') {
                $aug_pengeluaran += $data_pengeluaran['jumlah'];
            }
            if ($data_pengeluaran['bulan'] == 'September') {
                $sep_pengeluaran += $data_pengeluaran['jumlah'];
            }
            if ($data_pengeluaran['bulan'] == 'Oktober') {
                $okt_pengeluaran += $data_pengeluaran['jumlah'];
            }
            if ($data_pengeluaran['bulan'] == 'November') {
                $nov_pengeluaran += $data_pengeluaran['jumlah'];
            }
            if ($data_pengeluaran['bulan'] == 'Desember') {
                $des_pengeluaran += $data_pengeluaran['jumlah'];
            }
            ?>
        <?php endforeach; ?>

        <tr class="bg-light">
            <?php $jan_profit = $jan_pemasukan - $jan_pengeluaran; ?>
            <td><?= 'Januari' ?></td>
            <td><?= 'Rp. ' . number_format($jan_pemasukan, 2, ',', '.')  ?></td>
            <td><?= 'Rp. ' . number_format($jan_pengeluaran, 2, ',', '.')  ?></td>
            <td><?= 'Rp. ' . number_format($jan_profit, 2, ',', '.')  ?></td>
        </tr>
        <tr>
            <?php $feb_profit = $feb_pemasukan - $feb_pengeluaran; ?>
            <td><?= 'Februari' ?></td>
            <td><?= 'Rp. ' . number_format($feb_pemasukan, 2, ',', '.')  ?></td>
            <td><?= 'Rp. ' . number_format($feb_pengeluaran, 2, ',', '.')  ?></td>
            <td><?= 'Rp. ' . number_format($feb_profit, 2, ',', '.')  ?></td>
        </tr>
        <tr class="bg-light">
            <?php $mar_profit = $mar_pemasukan - $mar_pengeluaran; ?>
            <td><?= 'Maret' ?></td>
            <td><?= 'Rp. ' . number_format($mar_pemasukan, 2, ',', '.')  ?></td>
            <td><?= 'Rp. ' . number_format($mar_pengeluaran, 2, ',', '.')  ?></td>
            <td><?= 'Rp. ' . number_format($mar_profit, 2, ',', '.')  ?></td>
        </tr>
        <tr>
            <?php $apr_profit = $apr_pemasukan - $apr_pengeluaran; ?>
            <td><?= 'April' ?></td>
            <td><?= 'Rp. ' . number_format($apr_pemasukan, 2, ',', '.')  ?></td>
            <td><?= 'Rp. ' . number_format($apr_pengeluaran, 2, ',', '.')  ?></td>
            <td><?= 'Rp. ' . number_format($apr_profit, 2, ',', '.')  ?></td>
        </tr>
        <tr class="bg-light">
            <?php $mei_profit = $mei_pemasukan - $mei_pengeluaran; ?>
            <td><?= 'Mei' ?></td>
            <td><?= 'Rp. ' . number_format($mei_pemasukan, 2, ',', '.')  ?></td>
            <td><?= 'Rp. ' . number_format($mei_pengeluaran, 2, ',', '.')  ?></td>
            <td><?= 'Rp. ' . number_format($mei_profit, 2, ',', '.')  ?></td>
        </tr>
        <tr>
            <?php $jun_profit = $jun_pemasukan - $jun_pengeluaran; ?>
            <td><?= 'Juni' ?></td>
            <td><?= 'Rp. ' . number_format($jun_pemasukan, 2, ',', '.')  ?></td>
            <td><?= 'Rp. ' . number_format($jun_pengeluaran, 2, ',', '.')  ?></td>
            <td><?= 'Rp. ' . number_format($jun_profit, 2, ',', '.')  ?></td>
        </tr>
        <tr class="bg-light">
            <?php $jul_profit = $jul_pemasukan - $jul_pengeluaran; ?>
            <td><?= 'Juli' ?></td>
            <td><?= 'Rp. ' . number_format($jul_pemasukan, 2, ',', '.')  ?></td>
            <td><?= 'Rp. ' . number_format($jul_pengeluaran, 2, ',', '.')  ?></td>
            <td><?= 'Rp. ' . number_format($jul_profit, 2, ',', '.')  ?></td>
        </tr>
        <tr>
            <?php $aug_profit = $aug_pemasukan - $aug_pengeluaran; ?>
            <td><?= 'Agustus' ?></td>
            <td><?= 'Rp. ' . number_format($aug_pemasukan, 2, ',', '.')  ?></td>
            <td><?= 'Rp. ' . number_format($aug_pengeluaran, 2, ',', '.')  ?></td>
            <td><?= 'Rp. ' . number_format($aug_profit, 2, ',', '.')  ?></td>
        </tr>
        <tr class="bg-light">
            <?php $sep_profit = $sep_pemasukan - $sep_pengeluaran; ?>
            <td><?= 'September' ?></td>
            <td><?= 'Rp. ' . number_format($sep_pemasukan, 2, ',', '.')  ?></td>
            <td><?= 'Rp. ' . number_format($sep_pengeluaran, 2, ',', '.')  ?></td>
            <td><?= 'Rp. ' . number_format($sep_profit, 2, ',', '.')  ?></td>
        </tr>
        <tr>
            <?php $okt_profit = $okt_pemasukan - $okt_pengeluaran; ?>
            <td><?= 'Oktober' ?></td>
            <td><?= 'Rp. ' . number_format($okt_pemasukan, 2, ',', '.')  ?></td>
            <td><?= 'Rp. ' . number_format($okt_pengeluaran, 2, ',', '.')  ?></td>
            <td><?= 'Rp. ' . number_format($okt_profit, 2, ',', '.')  ?></td>
        </tr>
        <tr class="bg-light">
            <?php $nov_profit = $nov_pemasukan - $nov_pengeluaran; ?>
            <td><?= 'November' ?></td>
            <td><?= 'Rp. ' . number_format($nov_pemasukan, 2, ',', '.')  ?></td>
            <td><?= 'Rp. ' . number_format($nov_pengeluaran, 2, ',', '.')  ?></td>
            <td><?= 'Rp. ' . number_format($nov_profit, 2, ',', '.')  ?></td>
        </tr>
        <tr>
            <?php $des_profit = $des_pemasukan - $des_pengeluaran; ?>
            <td><?= 'Desember' ?></td>
            <td><?= 'Rp. ' . number_format($des_pemasukan, 2, ',', '.')  ?></td>
            <td><?= 'Rp. ' . number_format($des_pengeluaran, 2, ',', '.')  ?></td>
            <td><?= 'Rp. ' . number_format($des_profit, 2, ',', '.')  ?></td>
        </tr>



    </tbody>
    <tfoot>
        <tr>
            <td><b>Grand Total :</b> </td>
            <?php
            $tot_pemasukan = $jan_pemasukan + $feb_pemasukan + $mar_pemasukan + $apr_pemasukan + $mei_pemasukan + $jun_pemasukan + $jul_pemasukan + $aug_pemasukan + $sep_pemasukan + $okt_pemasukan + $nov_pemasukan + $des_pemasukan;

            $tot_pengeluaran = $jan_pengeluaran + $feb_pengeluaran + $mar_pengeluaran + $apr_pengeluaran + $mei_pengeluaran + $jun_pengeluaran + $jul_pengeluaran + $aug_pengeluaran + $sep_pengeluaran + $okt_pengeluaran + $nov_pengeluaran + $des_pengeluaran;

            $tot_profit = $jan_profit + $feb_profit + $mar_profit + $apr_profit + $mei_profit + $jun_profit + $jul_profit + $aug_profit + $sep_profit + $okt_profit + $nov_profit + $des_profit;

            ?>
            <td><b><?= 'Rp. ' . number_format($tot_pemasukan, 2, ',', '.')  ?></b></td>
            <td><b><?= 'Rp. ' . number_format($tot_pengeluaran, 2, ',', '.')  ?></b></td>
            <td><b><?= 'Rp. ' . number_format($tot_profit, 2, ',', '.')  ?></b></td>
        </tr>
    </tfoot>
</table>