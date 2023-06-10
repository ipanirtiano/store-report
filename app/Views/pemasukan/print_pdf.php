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
    <h3><b>Data Pemasukan </b></h3>



    <table class="table-data" cellpadding="2">
        <thead>
            <tr style="background-color:#c9c7c1; font-weight:bold;">
                <th>Bulan</th>
                <th>Store</th>
                <th>Design</th>
                <th>Workshop</th>
                <th>Total</th>
            </tr>
        </thead>

        <?php
        $i = 0;
        $jtotal_store = 0;
        $jtotal_design = 0;
        $jtotal_workshop = 0;

        $ftotal_store = 0;
        $ftotal_design = 0;
        $ftotal_workshop = 0;

        $mtotal_store = 0;
        $mtotal_design = 0;
        $mtotal_workshop = 0;

        $atotal_store = 0;
        $atotal_design = 0;
        $atotal_workshop = 0;

        $meitotal_store = 0;
        $meitotal_design = 0;
        $meitotal_workshop = 0;

        $juntotal_store = 0;
        $juntotal_design = 0;
        $juntotal_workshop = 0;

        $jultotal_store = 0;
        $jultotal_design = 0;
        $jultotal_workshop = 0;

        $agtotal_store = 0;
        $agtotal_design = 0;
        $agtotal_workshop = 0;

        $septotal_store = 0;
        $septotal_design = 0;
        $septotal_workshop = 0;

        $okttotal_store = 0;
        $okttotal_design = 0;
        $okttotal_workshop = 0;

        $novtotal_store = 0;
        $novtotal_design = 0;
        $novtotal_workshop = 0;

        $destotal_store = 0;
        $destotal_design = 0;
        $destotal_workshop = 0;



        ?>

        <tbody>
            <?php
            foreach ($jan as $data) :
                $dept = $data['dept'];
                if ($data['bulan'] == 'Januari') {
                    if ($dept == 'store') {
                        $jtotal_store += $data['income'];
                    }
                    if ($dept == 'design') {
                        $jtotal_design += $data['income'];
                    }
                    if ($dept == 'workshop') {
                        $jtotal_workshop += $data['income'];
                    }
                }
                if ($data['bulan'] == 'Februari') {
                    if ($dept == 'store') {
                        $ftotal_store += $data['income'];
                    }
                    if ($dept == 'design') {
                        $ftotal_design += $data['income'];
                    }
                    if ($dept == 'workshop') {
                        $ftotal_workshop += $data['income'];
                    }
                }
                if ($data['bulan'] == 'Maret') {
                    if ($dept == 'store') {
                        $mtotal_store += $data['income'];
                    }
                    if ($dept == 'design') {
                        $mtotal_design += $data['income'];
                    }
                    if ($dept == 'workshop') {
                        $mtotal_workshop += $data['income'];
                    }
                }
                if ($data['bulan'] == 'April') {
                    if ($dept == 'store') {
                        $atotal_store += $data['income'];
                    }
                    if ($dept == 'design') {
                        $atotal_design += $data['income'];
                    }
                    if ($dept == 'workshop') {
                        $atotal_workshop += $data['income'];
                    }
                }
                if ($data['bulan'] == 'Mei') {
                    if ($dept == 'store') {
                        $meitotal_store += $data['income'];
                    }
                    if ($dept == 'design') {
                        $meitotal_design += $data['income'];
                    }
                    if ($dept == 'workshop') {
                        $meitotal_workshop += $data['income'];
                    }
                }
                if ($data['bulan'] == 'Juni') {
                    if ($dept == 'store') {
                        $juntotal_store += $data['income'];
                    }
                    if ($dept == 'design') {
                        $juntotal_design += $data['income'];
                    }
                    if ($dept == 'workshop') {
                        $juntotal_workshop += $data['income'];
                    }
                }
                if ($data['bulan'] == 'Juli') {
                    if ($dept == 'store') {
                        $jultotal_store += $data['income'];
                    }
                    if ($dept == 'design') {
                        $jultotal_design += $data['income'];
                    }
                    if ($dept == 'workshop') {
                        $jultotal_workshop += $data['income'];
                    }
                }
                if ($data['bulan'] == 'Agustus') {
                    if ($dept == 'store') {
                        $agtotal_store += $data['income'];
                    }
                    if ($dept == 'design') {
                        $agtotal_design += $data['income'];
                    }
                    if ($dept == 'workshop') {
                        $agtotal_workshop += $data['income'];
                    }
                }
                if ($data['bulan'] == 'September') {
                    if ($dept == 'store') {
                        $septotal_store += $data['income'];
                    }
                    if ($dept == 'design') {
                        $septotal_design += $data['income'];
                    }
                    if ($dept == 'workshop') {
                        $septotal_workshop += $data['income'];
                    }
                }
                if ($data['bulan'] == 'Oktober') {
                    if ($dept == 'store') {
                        $okttotal_store += $data['income'];
                    }
                    if ($dept == 'design') {
                        $okttotal_design += $data['income'];
                    }
                    if ($dept == 'workshop') {
                        $okttotal_workshop += $data['income'];
                    }
                }
                if ($data['bulan'] == 'November') {
                    if ($dept == 'store') {
                        $novtotal_store += $data['income'];
                    }
                    if ($dept == 'design') {
                        $novtotal_design += $data['income'];
                    }
                    if ($dept == 'workshop') {
                        $novtotal_workshop += $data['income'];
                    }
                }
                if ($data['bulan'] == 'Desember') {
                    if ($dept == 'store') {
                        $destotal_store += $data['income'];
                    }
                    if ($dept == 'design') {
                        $destotal_design += $data['income'];
                    }
                    if ($dept == 'workshop') {
                        $destotal_workshop += $data['income'];
                    }
                }

                $grand_total_store = $jtotal_store + $ftotal_store +  $mtotal_store +  $atotal_store +  $meitotal_store +   $juntotal_store +  $jultotal_store +  $agtotal_store +  $septotal_store + $okttotal_store + $novtotal_store +   $destotal_store;

                $grand_total_design = $jtotal_design + $ftotal_design +  $mtotal_design +  $atotal_design +  $meitotal_design +   $juntotal_design +  $jultotal_design +  $agtotal_design +  $septotal_design + $okttotal_design + $novtotal_design +   $destotal_design;

                $grand_total_workshop = $jtotal_workshop + $ftotal_workshop +  $mtotal_workshop +  $atotal_workshop +  $meitotal_workshop +   $juntotal_workshop +  $jultotal_workshop +  $agtotal_workshop +  $septotal_workshop + $okttotal_workshop + $novtotal_workshop +   $destotal_workshop;
            ?>
            <?php endforeach; ?>

            <tr class=" bg-light">
                <?php $jan_total = $jtotal_store + $jtotal_design + $jtotal_workshop; ?>
                <td><?= 'Januari' ?></td>
                <td><?= 'Rp. ' . number_format($jtotal_store, 2, ',', '.')  ?></td>
                <td><?= 'Rp. ' . number_format($jtotal_design, 2, ',', '.')  ?></td>
                <td><?= 'Rp. ' . number_format($jtotal_workshop, 2, ',', '.')  ?></td>
                <td> <b><?= 'Rp. ' . number_format($jan_total, 2, ',', '.')  ?></b></td>
            </tr>
            <tr>
                <?php $feb_total = $ftotal_store + $ftotal_design + $ftotal_workshop; ?>
                <td><?= 'Februari' ?></td>
                <td><?= 'Rp. ' . number_format($ftotal_store, 2, ',', '.')  ?></td>
                <td><?= 'Rp. ' . number_format($ftotal_design, 2, ',', '.')  ?></td>
                <td><?= 'Rp. ' . number_format($ftotal_workshop, 2, ',', '.')  ?></td>
                <td> <b><?= 'Rp. ' . number_format($feb_total, 2, ',', '.')  ?></b></td>
            </tr>
            <tr class="bg-light">
                <?php $mar_total = $mtotal_store + $mtotal_design + $mtotal_workshop; ?>
                <td><?= 'Maret' ?></td>
                <td><?= 'Rp. ' . number_format($mtotal_store, 2, ',', '.')  ?></td>
                <td><?= 'Rp. ' . number_format($mtotal_design, 2, ',', '.')  ?></td>
                <td><?= 'Rp. ' . number_format($mtotal_workshop, 2, ',', '.')  ?></td>
                <td> <b><?= 'Rp. ' . number_format($mar_total, 2, ',', '.')  ?></b></td>
            </tr>
            <tr>
                <?php $apr_total = $atotal_store + $atotal_design + $atotal_workshop; ?>
                <td><?= 'April' ?></td>
                <td><?= 'Rp. ' . number_format($atotal_store, 2, ',', '.')  ?></td>
                <td><?= 'Rp. ' . number_format($atotal_design, 2, ',', '.')  ?></td>
                <td><?= 'Rp. ' . number_format($atotal_workshop, 2, ',', '.')  ?></td>
                <td> <b><?= 'Rp. ' . number_format($apr_total, 2, ',', '.')  ?></b></td>
            </tr>
            <tr class="bg-light">
                <?php $mei_total = $meitotal_store + $meitotal_design + $meitotal_workshop; ?>
                <td><?= 'Mei' ?></td>
                <td><?= 'Rp. ' . number_format($meitotal_store, 2, ',', '.')  ?></td>
                <td><?= 'Rp. ' . number_format($meitotal_design, 2, ',', '.')  ?></td>
                <td><?= 'Rp. ' . number_format($meitotal_workshop, 2, ',', '.')  ?></td>
                <td> <b><?= 'Rp. ' . number_format($mei_total, 2, ',', '.')  ?></b></td>
            </tr>
            <tr>
                <?php $jun_total = $juntotal_store + $juntotal_design + $juntotal_workshop; ?>
                <td><?= 'Juni' ?></td>
                <td><?= 'Rp. ' . number_format($juntotal_store, 2, ',', '.')  ?></td>
                <td><?= 'Rp. ' . number_format($juntotal_design, 2, ',', '.')  ?></td>
                <td><?= 'Rp. ' . number_format($juntotal_workshop, 2, ',', '.')  ?></td>
                <td> <b><?= 'Rp. ' . number_format($jun_total, 2, ',', '.')  ?></b></td>
            </tr>
            <tr class="bg-light">
                <?php $jul_total = $jultotal_store + $jultotal_design + $jultotal_workshop; ?>
                <td><?= 'Juli' ?></td>
                <td><?= 'Rp. ' . number_format($jultotal_store, 2, ',', '.')  ?></td>
                <td><?= 'Rp. ' . number_format($jultotal_design, 2, ',', '.')  ?></td>
                <td><?= 'Rp. ' . number_format($jultotal_workshop, 2, ',', '.')  ?></td>
                <td> <b><?= 'Rp. ' . number_format($jul_total, 2, ',', '.')  ?></b></td>
            </tr>
            <tr>
                <?php $aug_total = $agtotal_store + $agtotal_design + $agtotal_workshop; ?>
                <td><?= 'Agustus' ?></td>
                <td><?= 'Rp. ' . number_format($agtotal_store, 2, ',', '.')  ?></td>
                <td><?= 'Rp. ' . number_format($agtotal_design, 2, ',', '.')  ?></td>
                <td><?= 'Rp. ' . number_format($agtotal_workshop, 2, ',', '.')  ?></td>
                <td> <b><?= 'Rp. ' . number_format($aug_total, 2, ',', '.')  ?></b></td>
            </tr>
            <tr class="bg-light">
                <?php $sep_total = $septotal_store + $septotal_design + $septotal_workshop; ?>
                <td><?= 'September' ?></td>
                <td><?= 'Rp. ' . number_format($septotal_store, 2, ',', '.')  ?></td>
                <td><?= 'Rp. ' . number_format($septotal_design, 2, ',', '.')  ?></td>
                <td><?= 'Rp. ' . number_format($septotal_workshop, 2, ',', '.')  ?></td>
                <td> <b><?= 'Rp. ' . number_format($sep_total, 2, ',', '.')  ?></b></td>
            </tr>
            <tr>
                <?php $okt_total = $okttotal_store + $okttotal_design + $okttotal_workshop; ?>
                <td><?= 'Oktober' ?></td>
                <td><?= 'Rp. ' . number_format($okttotal_store, 2, ',', '.')  ?></td>
                <td><?= 'Rp. ' . number_format($okttotal_design, 2, ',', '.')  ?></td>
                <td><?= 'Rp. ' . number_format($okttotal_workshop, 2, ',', '.')  ?></td>
                <td> <b><?= 'Rp. ' . number_format($okt_total, 2, ',', '.')  ?></b></td>
            </tr>
            <tr class="bg-light">
                <?php $nov_total = $novtotal_store + $novtotal_design + $novtotal_workshop; ?>
                <td><?= 'November' ?></td>
                <td><?= 'Rp. ' . number_format($novtotal_store, 2, ',', '.')  ?></td>
                <td><?= 'Rp. ' . number_format($novtotal_design, 2, ',', '.')  ?></td>
                <td><?= 'Rp. ' . number_format($novtotal_workshop, 2, ',', '.')  ?></td>
                <td> <b><?= 'Rp. ' . number_format($nov_total, 2, ',', '.')  ?></b></td>
            </tr>
            <tr>
                <?php $des_total = $destotal_store + $destotal_design + $destotal_workshop; ?>
                <td><?= 'Desember' ?></td>
                <td><?= 'Rp. ' . number_format($destotal_store, 2, ',', '.')  ?></td>
                <td><?= 'Rp. ' . number_format($destotal_design, 2, ',', '.')  ?></td>
                <td><?= 'Rp. ' . number_format($destotal_workshop, 2, ',', '.')  ?></td>
                <td> <b><?= 'Rp. ' . number_format($des_total, 2, ',', '.')  ?></b></td>
            </tr>


        </tbody>
        <tfoot>
            <tr>
                <?php $gran_total = $jan_total + $feb_total + $mar_total + $apr_total + $mei_total + $jun_total + $jul_total + $aug_total + $sep_total + $okt_total + $nov_total + $des_total ?>
                <td><b>Grand Total :</b> </td>
                <td><b><?= 'Rp. ' . number_format($grand_total_store, 2, ',', '.')  ?></b></td>
                <td><b><?= 'Rp. ' . number_format($grand_total_design, 2, ',', '.')  ?></b></td>
                <td><b><?= 'Rp. ' . number_format($grand_total_workshop, 2, ',', '.')  ?></b></td>
                <td><b><?= 'Rp. ' . number_format($gran_total, 2, ',', '.')  ?></b></td>
            </tr>
        </tfoot>
    </table>
    <div class="div"></div>

    <br>
    <br>
</body>

</html>