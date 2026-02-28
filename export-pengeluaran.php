    <?php
    header('Content-type: application/vnd-ms-excel');
header('Content-Disposition: attachment; filename=Data_Pengeluaran.xls');
?>
	<h3>Data Pengeluaran</h3>    
	<table border="1" cellpadding="5"> 
	<tr>    
	<th>No</th>
    <th>Tgl Pengeluaran</th>
    <th>Jumlah</th>    
	<th>Keterangan</th> 
	</tr>  
	<?php
// Load file koneksi.php
include 'koneksi.php';
// Buat query untuk menampilkan semua data pengeluaran
$query = mysqli_query($koneksi, 'SELECT * FROM pengeluaran ORDER BY tgl_pengeluaran DESC, id_pengeluaran DESC');
$no = 1;
while ($data = mysqli_fetch_array($query)) {
    // Ambil semua data dari hasil eksekusi $sql
    echo '<tr>';
    echo '<td>'.$no++.'</td>';
    echo '<td>'.$data['tgl_pengeluaran'].'</td>';
    echo '<td>'.$data['jumlah'].'</td>';
    echo '<td>'.$data['keterangan'].'</td>';
    echo '</tr>';
}  ?></table>