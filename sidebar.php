<?php
$currentPage = basename($_SERVER['PHP_SELF'] ?? '');
function navActive(string $page, string $current): string
{
    return $page === $current ? ' active' : '';
}
?>
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <img src="img/sekolah/paskibra.png" alt="Logo" width="80%" height="80%">
        </div>
        <div class="sidebar-brand-text mx-4">Kas Paskibra</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item<?= navActive('index.php', $currentPage) ?>">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Transaksi
      </div>

      <!-- Nav Item - Pembayaran Kas -->
      <li class="nav-item<?= navActive('pembayaran.php', $currentPage) ?>">
        <a class="nav-link" href="pembayaran.php">
          <i class="fas fa-fw fa-list-alt"></i>
          <span>Pembayaran Kas</span></a>
      </li>

      <!-- Nav Item - Transaksi (Pendapatan & Pengeluaran) -->
      <li class="nav-item<?= navActive('transaksi.php', $currentPage) ?>">
        <a class="nav-link collapsed" href="transaksi.php">
          <i class="fas fa-fw fa-exchange-alt"></i>
          <span>Pemasukan &amp; Pengeluaran</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Anggota
      </div>

      <!-- Nav Item - Anggota -->
      <li class="nav-item<?= navActive('karyawan.php', $currentPage) ?>">
        <a class="nav-link collapsed" href="karyawan.php">
          <i class="fas fa-fw fa-users"></i>
          <span>Anggota</span>
        </a>
      </li>
	  
	        <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Tagihan
      </div>

      <!-- Nav Item - Laporan -->
      <li class="nav-item<?= navActive('laporan.php', $currentPage) ?>">
        <a class="nav-link" href="laporan.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Laporan</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
