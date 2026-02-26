<?php
//include('dbconnected.php');
include('koneksi.php');

$tgl_pemasukan = $_GET['tgl_pemasukan'];
$jumlah = $_GET['jumlah'];
$keterangan = isset($_GET['keterangan']) ? $_GET['keterangan'] : '';

//query update
$query = mysqli_query($koneksi,"INSERT INTO `pemasukan` (`tgl_pemasukan`, `jumlah`, `keterangan`) VALUES ('$tgl_pemasukan', '$jumlah', '$keterangan')");

if ($query) {
 # credirect ke page index
 header("location:transaksi.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>