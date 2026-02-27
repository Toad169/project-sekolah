<?php
require 'cek-sesi.php';
require 'koneksi.php';

$bulanOptions = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
$selectedBulan = isset($_GET['bulan']) ? $_GET['bulan'] : 'Juli';
if (!in_array($selectedBulan, $bulanOptions, true)) {
    $selectedBulan = 'Juli';
}
$safeBulan = mysqli_real_escape_string($koneksi, $selectedBulan);

$filename = 'Pembayaran_Kas_' . $selectedBulan . '.xls';
header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
header('Content-Disposition: attachment; filename="' . $filename . '"');

$query = mysqli_query($koneksi, "SELECT * FROM pembayaran_kas WHERE bulan = '$safeBulan' ORDER BY nama");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<h3>Daftar Pembayaran Kas - Bulan <?= htmlspecialchars($selectedBulan, ENT_QUOTES, 'UTF-8'); ?></h3>
<table border="1" cellpadding="5">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Bulan</th>
        <th>Minggu 1</th>
        <th>Minggu 2</th>
        <th>Minggu 3</th>
        <th>Minggu 4</th>
        <th>Dibayar</th>
        <th>Kekurangan</th>
        <th>Total</th>
    </tr>
<?php
$no = 1;
while ($row = mysqli_fetch_assoc($query)) {
    echo '<tr>';
    echo '<td>' . $no++ . '</td>';
    echo '<td>' . htmlspecialchars($row['nama'], ENT_QUOTES, 'UTF-8') . '</td>';
    echo '<td>' . htmlspecialchars($row['bulan'], ENT_QUOTES, 'UTF-8') . '</td>';
    echo '<td>' . number_format($row['minggu_1'], 0, ',', '.') . '</td>';
    echo '<td>' . number_format($row['minggu_2'], 0, ',', '.') . '</td>';
    echo '<td>' . number_format($row['minggu_3'], 0, ',', '.') . '</td>';
    echo '<td>' . number_format($row['minggu_4'], 0, ',', '.') . '</td>';
    echo '<td>' . number_format($row['dibayar'], 0, ',', '.') . '</td>';
    echo '<td>' . number_format($row['kekurangan'], 0, ',', '.') . '</td>';
    echo '<td>' . number_format($row['total'], 0, ',', '.') . '</td>';
    echo '</tr>';
}
?>
</table>
</body>
</html>
