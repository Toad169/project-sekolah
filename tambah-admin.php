<?php

// include('dbconnected.php');
include 'koneksi.php';

$nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$pass = isset($_POST['pass']) ? $_POST['pass'] : '';

if (empty($nama) || empty($email) || empty($pass)) {
    header('Location: profile.php?pesan=missing');
    exit;
}

$hash = password_hash($pass, PASSWORD_DEFAULT);

// query insert with prepared statement
$stmt = mysqli_prepare($koneksi, "INSERT INTO `admin` (`nama`, `email`, `pass`) VALUES (?, ?, ?)");
mysqli_stmt_bind_param($stmt, 'sss', $nama, $email, $hash);
$query = mysqli_stmt_execute($stmt);


if ($query) {
    // credirect ke page index
    header('location:profile.php');
} else {
    echo 'ERROR, data gagal diupdate'.mysqli_error($koneksi);
}

// mysql_close($host);
