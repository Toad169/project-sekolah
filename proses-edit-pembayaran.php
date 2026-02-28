<?php

require 'koneksi.php';

$idKas = isset($_GET['id_kas']) ? (int) $_GET['id_kas'] : 0;
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
            'siiiisiiii',
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
