<?php
// Run this script once (CLI: php migrate-db.php) to update admin.pass column length.
require 'koneksi.php';

$sql = "ALTER TABLE `admin` MODIFY `pass` varchar(255) NOT NULL";
if (mysqli_query($koneksi, $sql)) {
    echo "SUCCESS: admin.pass column modified to varchar(255).\n";
} else {
    echo "ERROR: ".mysqli_error($koneksi)."\n";
}

// helpful: list admin rows
$res = mysqli_query($koneksi, "SELECT id_admin, nama, email, LENGTH(pass) AS len, pass FROM admin");
if ($res) {
    echo "\nCurrent admin rows:\n";
    while ($r = mysqli_fetch_assoc($res)) {
        printf("id=%d, email=%s, len=%d\n", $r['id_admin'], $r['email'], $r['len']);
    }
}
?>