<?php
include 'Config/Class_Stok.php';
include 'Config/config.php';
?>
<html>
<head>
  <title>Stock Barang</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
			<h2>Stock Bahan</h2>
			<h4>(Inventory)</h4>
				<div class="data-tables datatable-dark">
					
					<table width="100%" class="table table-striped table-bordered table-hover" cellpadding="0" cellspacing="0" id="mauexport">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang Masuk</th>
                            <th>Jumlah Barang Keluar</th>
                            <th>Total Barang</th>
                            <th>Total Barang Saat Ini Tersedia</th>
                        </tr>
                    </thead>
                    <tbody>
    <!-- <?php 
    //  $no = 1;
    
    // if (is_array($st->tampil_data()) && count($st->tampil_data()) > 0) {
        
    // foreach ($st->tampil_data() as $row) {

     ?> -->

<?php
$selectstock = mysqli_query($conn, "select * from tbl_barang a inner join tbl_stok c on a.kode_barang=c.kode_barang
 ORDER BY a.nama_barang ASC" );
$no = 1;
while($row=mysqli_fetch_array($selectstock)){
  $kode_barang = $row['kode_barang'];
  $nama_barang = $row['nama_barang'];
  $jml_barangmasuk = $row['jml_barangmasuk'];
  $jml_barangkeluar = $row['jml_barangkeluar'];
  $total_barang = $row['total_barang'];
  $jumlah_brg = $row['jumlah_brg'];
?>
                    <tr>
                       <td><?=$no++?></td>
                        <td><?php echo $kode_barang;?></td>
                        <td><?php echo $nama_barang;?></td>
                        <td><?php echo $jml_barangmasuk;?></td>
                        <td><?php echo $jml_barangkeluar;?></td>
                        <td><?php echo $total_barang;?></td>
                        <td><?php echo $jumlah_brg;?></td>
                      </tr>
       <?php
     };
     ?>
                    </tbody>
                </table>
					
				</div>
</div>
	
<script>
$(document).ready(function() {
    $('#mauexport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy','csv','excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>