<?php
// session cookie params
$secure = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on';
session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'secure' => $secure,
    'httponly' => true,
    'samesite' => 'Lax'
]);
session_start();

require 'koneksi.php';

// get input
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$pass = isset($_POST['pass']) ? $_POST['pass'] : '';

if (empty($email) || empty($pass)) {
    header('Location: login.php?pesan=empty');
    exit;
}

// prepared statement to fetch user
$stmt = mysqli_prepare($koneksi, "SELECT id_admin, nama, pass FROM admin WHERE email = ?");
mysqli_stmt_bind_param($stmt, 's', $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($result && $row = mysqli_fetch_assoc($result)) {
    $stored = $row['pass'];
    $ok = false;

    // verify password. support legacy plaintext: if password_verify fails but stored equals plain,
    // accept and rehash to secure storage
    if (password_verify($pass, $stored)) {
        $ok = true;
    } elseif (hash_equals($stored, $pass)) {
        // legacy plaintext password: rehash and update
        $ok = true;
        $newhash = password_hash($pass, PASSWORD_DEFAULT);
        $upd = mysqli_prepare($koneksi, "UPDATE admin SET pass = ? WHERE id_admin = ?");
        mysqli_stmt_bind_param($upd, 'si', $newhash, $row['id_admin']);
        mysqli_stmt_execute($upd);
    }

    if ($ok) {
        // prevent session fixation
        session_regenerate_id(true);

        $_SESSION['id'] = $row['id_admin'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['status'] = 'login';
        $_SESSION['last_activity'] = time();

        header('Location: index.php');
        exit;
    }
}

header('Location: login.php?pesan=gagal');
exit;
