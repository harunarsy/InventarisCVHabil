<?php
$koneksi    = mysqli_connect("localhost", "root", "", "db_inventaris");
$stok  = mysqli_query($koneksi, "SELECT total_barang FROM tbl_stok");
$nama_barang       = mysqli_query($koneksi, "SELECT nama_barang FROM tbl_stok");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Chartjs, PHP dan MySQL Demo Grafik Lingkaran (Doughnut)</title>
    <script src="Chart.js"></script>
    <style type="text/css">
            .container {
                width: 40%;
                margin: 15px auto;
            }
    </style>
  </head>
  <body>

    <div class="container">
        <canvas id="doughnut" width="100" height="100"></canvas>
    </div>

  </body>
</html>

<script  type="text/javascript">
  var ctx = document.getElementById("doughnut").getContext("2d");
  var data = {
            labels: [<?php while ($p = mysqli_fetch_array($nama_barang)) { echo '"' . $p['nama_barang'] . '",';}?>],
            datasets: [
            {
              label: "Stok Barang",
              data: [<?php while ($p = mysqli_fetch_array($stok)) { echo '"' . $p['stok'] . '",';}?>],
              backgroundColor: [
                '#29B0D0',
                '#2A516E',
                '#F07124',
                '#CBE0E3',
                '#979193'
              ]
            }
            ]
            };

  var myDoughnutChart = new Chart(ctx, {
                  type: 'doughnut',
                  data: data,
                  options: {
                    responsive: true
                }
              });

</script>