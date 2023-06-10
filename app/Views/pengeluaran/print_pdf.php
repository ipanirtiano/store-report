<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .container {
            position: relative;
            width: 100%;
            height: 100%;
            padding: 10px;
        }

        .table-data {
            position: absolute;
            top: 180px;
            width: 100%;
            border-collapse: collapse;
        }

        .table-data th,
        td {
            border: 1px solid black;
            padding: 3px;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th width="780px">
                <div style="font-size: 18px;"><b>CV. Akusara Palagra </b>
                    <div style="font-size: 10px;">Sistem Pengelolaan Data Keuangan</div>
                    <hr>
                </div>

            </th>
        </tr>

    </table>
    <h3><b>Data Pengeluaran </b></h3>



    <table class="table-data" cellpadding="2">
        <thead>
            <tr style="background-color:#c9c7c1; font-weight:bold;">
                <th width="25px">No</th>
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
                    <td width="25px"><?= $i; ?></td>
                    <td><?= $data['kode_transaksi']; ?></td>
                    <td><?= $data['tanggal'] ?></td>
                    <td><?= $data['ket_biaya']; ?></td>
                    <td><?= 'Rp. ' . number_format($data['jumlah'], 2, ',', '.') ?></td>
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
    <div class="div"></div>

    <br>
    <br>
</body>

</html>