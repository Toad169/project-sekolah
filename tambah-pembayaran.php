<?php

require 'koneksi.php';

// Use POST (changed from GET)
$id_karyawan = isset($_POST['id_karyawan']) ? intval($_POST['id_karyawan']) : 0;
$bulan = isset($_POST['bulan']) ? $_POST['bulan'] : '';

if ($id_karyawan <= 0 || empty($bulan)) {
    header('Location: pembayaran.php?pesan=error');
    exit;
}

// Fetch karyawan nama
$stmt = mysqli_prepare($koneksi, "SELECT nama FROM karyawan WHERE id_karyawan = ?");
mysqli_stmt_bind_param($stmt, 'i', $id_karyawan);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$karyawan = mysqli_fetch_assoc($res);
$nama = $karyawan ? $karyawan['nama'] : '';

$perMinggu = 2000;

$minggu1 = isset($_POST['minggu_1']) ? $perMinggu : 0;
$minggu2 = isset($_POST['minggu_2']) ? $perMinggu : 0;
$minggu3 = isset($_POST['minggu_3']) ? $perMinggu : 0;
$minggu4 = isset($_POST['minggu_4']) ? $perMinggu : 0;

$dibayar = $minggu1 + $minggu2 + $minggu3 + $minggu4;
$total = 8000;
$kekurangan = $total - $dibayar;

// Updated query with id_karyawan
$stmt = mysqli_prepare(
    $koneksi,
    'INSERT INTO pembayaran_kas (id_karyawan, nama, minggu_1, minggu_2, minggu_3, minggu_4, bulan, dibayar, total, kekurangan)
     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'
);

if ($stmt) {
    mysqli_stmt_bind_param(
        $stmt,
        'isiiiisiii',
        $id_karyawan,
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
