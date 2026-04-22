<?php

require 'koneksi.php';

$idKas = isset($_POST['id_kas']) ? (int) $_POST['id_kas'] : 0;
$id_karyawan = isset($_POST['id_karyawan']) ? intval($_POST['id_karyawan']) : 0;
$bulan = isset($_POST['bulan']) ? $_POST['bulan'] : '';

if ($idKas <= 0 || $id_karyawan <= 0 || empty($bulan)) {
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

if ($idKas > 0) {
    $stmt = mysqli_prepare(
        $koneksi,
        'UPDATE pembayaran_kas
         SET nama = ?,
             minggu_1 = ?,
             minggu_2 = ?,
             minggu_3 = ?,
             minggu_4 = ?,
             bulan = ?,
             dibayar = ?,
             total = ?,
             kekurangan = ?
         WHERE id_kas = ?'
    );

    if ($stmt) {
        mysqli_stmt_bind_param(
            $stmt,
            'isiiiisiiii',
            $id_karyawan,
            $nama,
            $minggu1,
            $minggu2,
            $minggu3,
            $minggu4,
            $bulan,
            $dibayar,
            $total,
            $kekurangan,
            $idKas
        );
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}

header('Location: pembayaran.php');

exit;
