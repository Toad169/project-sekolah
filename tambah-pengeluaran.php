<?php
//include('dbconnected.php');
include('koneksi.php');

$tgl_pengeluaran = $_GET['tgl_pengeluaran'];
$jumlah = $_GET['jumlah'];
$keterangan = isset($_GET['keterangan']) ? $_GET['keterangan'] : '';

//query update
$query = mysqli_query($koneksi,"INSERT INTO `pengeluaran` (`tgl_pengeluaran`, `jumlah`, `keterangan`) VALUES ('$tgl_pengeluaran', '$jumlah', '$keterangan')");

if ($query) {
 # credirect ke page index
 header("location:transaksi.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>