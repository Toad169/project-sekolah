<?php
// Re-hash plaintext admin passwords. Run once.
require 'koneksi.php';

$report = [];
$res = mysqli_query($koneksi, "SELECT id_admin, email, pass, LENGTH(pass) AS len FROM admin");
while ($r = mysqli_fetch_assoc($res)) {
    $id = $r['id_admin'];
    $pass = $r['pass'];
    $len = (int)$r['len'];

    // consider bcrypt/argon hashes start with $ and lengths >= 60
    if (strlen($pass) === 0) {
        $report[] = "id=$id email={$r['email']} empty\n";
        continue;
    }
    if (strpos($pass, '$') === 0) {
        if ($len >= 60) {
            $report[] = "id=$id email={$r['email']} already_hashed len=$len";
            continue;
        } else {
            // starts with $ but too short -> corrupted/truncated
            $report[] = "id=$id email={$r['email']} corrupted_truncated len=$len";
            continue;
        }
    }

    // likely plaintext -> hash
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    $stmt = mysqli_prepare($koneksi, "UPDATE admin SET pass = ? WHERE id_admin = ?");
    mysqli_stmt_bind_param($stmt, 'si', $hash, $id);
    $ok = mysqli_stmt_execute($stmt);
    $report[] = "id=$id email={$r['email']} hashed: " . ($ok ? 'ok' : 'fail');
}

header('Content-Type: text/plain');
echo implode("\n", $report);
?>