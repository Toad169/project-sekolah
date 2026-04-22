<?php

// include('dbconnected.php');
include 'koneksi.php';

// use POST for updates
$id = isset($_POST['id_admin']) ? intval($_POST['id_admin']) : 0;
$nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$pass = isset($_POST['pass']) ? $_POST['pass'] : '';

if ($id <= 0 || empty($nama) || empty($email)) {
    header('Location: profile.php?pesan=missing');
    exit;
}

// fetch current password
$stmt = mysqli_prepare($koneksi, "SELECT pass FROM admin WHERE id_admin = ?");
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$current = '';
if ($res && $row = mysqli_fetch_assoc($res)) {
    $current = $row['pass'];
}

if (empty($pass)) {
    // keep current
    $newpass = $current;
} else {
    // if user submitted a new password, hash it
    $newpass = password_hash($pass, PASSWORD_DEFAULT);
}

// update using prepared statement
$upd = mysqli_prepare($koneksi, "UPDATE admin SET nama = ?, email = ?, pass = ? WHERE id_admin = ?");
mysqli_stmt_bind_param($upd, 'sssi', $nama, $email, $newpass, $id);
$ok = mysqli_stmt_execute($upd);

if ($ok) {
    header('Location: profile.php');
    exit;
} else {
    echo 'ERROR, data gagal diupdate'.mysqli_error($koneksi);
    exit;
}

// mysql_close($host);
