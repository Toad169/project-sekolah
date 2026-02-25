<?php
require 'koneksi.php';

$idKas = isset($_GET['id_kas']) ? (int) $_GET['id_kas'] : 0;

if ($idKas > 0) {
    mysqli_query($koneksi, "DELETE FROM pembayaran_kas WHERE id_kas = '$idKas'");
}

header('Location: pembayaran.php');
exit;

