<?php

require 'koneksi.php';

$nama = isset($_GET['nama']) ? $_GET['nama'] : '';
$bulan = isset($_GET['bulan']) ? $_GET['bulan'] : '';

$perMinggu = 2000;

$minggu1 = isset($_GET['minggu_1']) ? $perMinggu : 0;
$minggu2 = isset($_GET['minggu_2']) ? $perMinggu : 0;
$minggu3 = isset($_GET['minggu_3']) ? $perMinggu : 0;
$minggu4 = isset($_GET['minggu_4']) ? $perMinggu : 0;

$dibayar = $minggu1 + $minggu2 + $minggu3 + $minggu4;
$total = 8000;
$kekurangan = $total - $dibayar;

$stmt = mysqli_prepare(
    $koneksi,
    'INSERT INTO pembayaran_kas (nama, minggu_1, minggu_2, minggu_3, minggu_4, bulan, dibayar, total, kekurangan)
     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)'
);

if ($stmt) {
    mysqli_stmt_bind_param(
        $stmt,
        'siiiisiii',
        $nama,
        $minggu1,
        $minggu2,
        $minggu3,
        $minggu4,
        $bulan,
        $dibayar,
        $total,
        $kekurangan
    );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

header('Location: pembayaran.php');

exit;
