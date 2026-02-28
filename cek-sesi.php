	<!-- cek apakah sudah login -->
	<?php
    session_start();

	require 'koneksi.php';
	if ('login' != $_SESSION['status']) {
	    header('location:login.php?pesan=belum_login');
	}
	?>