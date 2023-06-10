<?php
// koneksi database manual
$conn = mysqli_connect('localhost', 'root', '', 'store_report');
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


// query manual
$query_pemasukan = mysqli_query($conn, "SELECT * FROM pemasukan ");


foreach ($query_pemasukan as $data) {
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
}


?>


<div class="container">
    <canvas id="linechart" width="200" height="200"></canvas>
</div>


<script type="text/javascript">
    var ctx = document.getElementById("linechart").getContext("2d");
    var data = {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
                label: "Store",
                fill: false,
                lineTension: 0.1,
                backgroundColor: "#29B0D0",
                borderColor: "#29B0D0",
                pointHoverBackgroundColor: "#29B0D0",
                pointHoverBorderColor: "#29B0D0",
                data: [
                    <?php echo '
                       "' . $jtotal_store . '", 
                       "' . $ftotal_store . '",
                       "' . $mtotal_store . '",
                       "' . $atotal_store . '",
                       "' . $meitotal_store . '",
                       "' . $jtotal_store . '",
                       "' . $jultotal_store . '",
                       "' . $agtotal_store . '",
                       "' . $septotal_store . '",
                       "' . $okttotal_store . '",
                       "' . $novtotal_store . '",
                       "' . $destotal_store . '",
                       '; ?>


                ]
            },
            {
                label: "Design",
                fill: false,
                lineTension: 0.1,
                backgroundColor: "#2A516E",
                borderColor: "#2A516E",
                pointHoverBackgroundColor: "#2A516E",
                pointHoverBorderColor: "#2A516E",
                data: [
                    <?php echo '
                       "' . $jtotal_design . '", 
                       "' . $ftotal_design . '",
                       "' . $mtotal_design . '",
                       "' . $atotal_design . '",
                       "' . $meitotal_design . '",
                       "' . $jtotal_design . '",
                       "' . $jultotal_design . '",
                       "' . $agtotal_design . '",
                       "' . $septotal_design . '",
                       "' . $okttotal_design . '",
                       "' . $novtotal_design . '",
                       "' . $destotal_design . '",
                       '; ?>
                ]
            },
            {
                label: "Workshop",
                fill: false,
                lineTension: 0.1,
                backgroundColor: "#F07124",
                borderColor: "#F07124",
                pointHoverBackgroundColor: "#F07124",
                pointHoverBorderColor: "#F07124",
                data: [
                    <?php echo '
                       "' . $jtotal_workshop . '", 
                       "' . $ftotal_workshop . '",
                       "' . $mtotal_workshop . '",
                       "' . $atotal_workshop . '",
                       "' . $meitotal_workshop . '",
                       "' . $jtotal_workshop . '",
                       "' . $jultotal_workshop . '",
                       "' . $agtotal_workshop . '",
                       "' . $septotal_workshop . '",
                       "' . $okttotal_workshop . '",
                       "' . $novtotal_workshop . '",
                       "' . $destotal_workshop . '",
                       '; ?>
                ]
            },

        ]
    };

    var myBarChart = new Chart(ctx, {
        type: 'line',
        data: data,
        options: {
            legend: {
                display: true
            },
            barValueSpacing: 20,
            scales: {
                yAxes: [{
                    ticks: {
                        min: 0,
                    }
                }],
                xAxes: [{
                    gridLines: {
                        color: "rgba(0, 0, 0, 0)",
                    }
                }]
            }
        }
    });
</script>