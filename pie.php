<?php
$koneksi    = mysqli_connect("localhost", "root", "", "db_inventaris");
$total_barang  = mysqli_query($koneksi, "SELECT total_barang FROM tbl_stok");
$nama_barang       = mysqli_query($koneksi, "SELECT nama_barang FROM tbl_stok");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Chartjs, PHP dan MySQL Demo Grafik Lingkaran</title>
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
        <canvas id="piechart" width="100" height="100"></canvas>
    </div>

  </body>
</html>

<script  type="text/javascript">
  var ctx = document.getElementById("piechart").getContext("2d");
  var data = {
            labels: [<?php while ($p = mysqli_fetch_array($nama_barang)) { echo '"' . $p['nama_barang'] . '",';}?>],
            datasets: [
            {
              label: "Penjualan Barang",
              data: [<?php while ($p = mysqli_fetch_array($total_barang)) { echo '"' . $p['total_barang'] . '",';}?>],
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

  var myPieChart = new Chart(ctx, {
                  type: 'pie',
                  data: data,
                  options: {
                    responsive: true
                }
              });

</script>