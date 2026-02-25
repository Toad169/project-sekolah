<?php
require 'cek-sesi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Transaksi - Pemasukan & Pengeluaran</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

<?php
require 'koneksi.php';
require 'sidebar.php';

// Data pengeluaran 7 hari terakhir untuk chart
$sekarang = mysqli_query($koneksi, "SELECT jumlah FROM pengeluaran WHERE tgl_pengeluaran = CURDATE()");
$sekarang = mysqli_fetch_array($sekarang);

$satuhari = mysqli_query($koneksi, "SELECT jumlah FROM pengeluaran WHERE tgl_pengeluaran = CURDATE() - INTERVAL 1 DAY");
$satuhari = mysqli_fetch_array($satuhari);

$duahari = mysqli_query($koneksi, "SELECT jumlah FROM pengeluaran WHERE tgl_pengeluaran = CURDATE() - INTERVAL 2 DAY");
$duahari = mysqli_fetch_array($duahari);

$tigahari = mysqli_query($koneksi, "SELECT jumlah FROM pengeluaran WHERE tgl_pengeluaran = CURDATE() - INTERVAL 3 DAY");
$tigahari = mysqli_fetch_array($tigahari);

$empathari = mysqli_query($koneksi, "SELECT jumlah FROM pengeluaran WHERE tgl_pengeluaran = CURDATE() - INTERVAL 4 DAY");
$empathari = mysqli_fetch_array($empathari);

$limahari = mysqli_query($koneksi, "SELECT jumlah FROM pengeluaran WHERE tgl_pengeluaran = CURDATE() - INTERVAL 5 DAY");
$limahari = mysqli_fetch_array($limahari);

$enamhari = mysqli_query($koneksi, "SELECT jumlah FROM pengeluaran WHERE tgl_pengeluaran = CURDATE() - INTERVAL 6 DAY");
$enamhari = mysqli_fetch_array($enamhari);

$tujuhhari = mysqli_query($koneksi, "SELECT jumlah FROM pengeluaran WHERE tgl_pengeluaran = CURDATE() - INTERVAL 7 DAY");
$tujuhhari = mysqli_fetch_array($tujuhhari);
?>

  <!-- Main Content -->
  <div id="content">

<?php require 'navbar.php'; ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
      </div>

      <!-- Tabs for Pendapatan & Pengeluaran -->
      <ul class="nav nav-tabs mb-4" id="transaksiTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pendapatan-tab" data-toggle="tab" href="#tab-pendapatan" role="tab" aria-controls="tab-pendapatan" aria-selected="true">
            <i class="fas fa-arrow-up"></i> Pemasukan
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pengeluaran-tab" data-toggle="tab" href="#tab-pengeluaran" role="tab" aria-controls="tab-pengeluaran" aria-selected="false">
            <i class="fas fa-arrow-down"></i> Pengeluaran
          </a>
        </li>
      </ul>

      <div class="tab-content" id="transaksiTabContent">
        <!-- Pendapatan Tab -->
        <div class="tab-pane fade show active" id="tab-pendapatan" role="tabpanel" aria-labelledby="pendapatan-tab">
          <!-- Content Row -->
          <div class="row">

            <!-- Sumber Pendapatan -->
            <!-- <div class="col-lg-12 mb-4">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Sumber Pendapatan</h6>
                </div>
                <div class="card-body">
<?php
$namasumber1 = mysqli_query($koneksi, "SELECT * FROM `sumber` WHERE id_sumber = 1");
$sumbern1 = mysqli_fetch_assoc($namasumber1);

$namasumber2 = mysqli_query($koneksi, "SELECT * FROM `sumber` WHERE id_sumber = 2");
$sumbern2 = mysqli_fetch_assoc($namasumber2);

$namasumber3 = mysqli_query($koneksi, "SELECT * FROM `sumber` WHERE id_sumber = 3");
$sumbern3 = mysqli_fetch_assoc($namasumber3);

$namasumber4 = mysqli_query($koneksi, "SELECT * FROM `sumber` WHERE id_sumber = 4");
$sumbern4 = mysqli_fetch_assoc($namasumber4);

$namasumber5 = mysqli_query($koneksi, "SELECT * FROM `sumber` WHERE id_sumber = 5");
$sumbern5 = mysqli_fetch_assoc($namasumber5);

$arrayhasil1 = [];
$hasil1 = mysqli_query($koneksi, "SELECT * FROM pemasukan WHERE id_sumber = 1");
while ($jumlah1 = mysqli_fetch_array($hasil1)) {
  $arrayhasil1[] = $jumlah1['jumlah'];
}
$jumlahhasil1 = array_sum($arrayhasil1);

$arrayhasil2 = [];
$hasil2 = mysqli_query($koneksi, "SELECT * FROM pemasukan WHERE id_sumber = 2");
while ($jumlah2 = mysqli_fetch_array($hasil2)) {
  $arrayhasil2[] = $jumlah2['jumlah'];
}
$jumlahhasil2 = array_sum($arrayhasil2);

$arrayhasil3 = [];
$hasil3 = mysqli_query($koneksi, "SELECT * FROM pemasukan WHERE id_sumber = 3");
while ($jumlah3 = mysqli_fetch_array($hasil3)) {
  $arrayhasil3[] = $jumlah3['jumlah'];
}
$jumlahhasil3 = array_sum($arrayhasil3);

$arrayhasil4 = [];
$hasil4 = mysqli_query($koneksi, "SELECT * FROM pemasukan WHERE id_sumber = 4");
while ($jumlah4 = mysqli_fetch_array($hasil4)) {
  $arrayhasil4[] = $jumlah4['jumlah'];
}
$jumlahhasil4 = array_sum($arrayhasil4);

$arrayhasil5 = [];
$hasil5 = mysqli_query($koneksi, "SELECT * FROM pemasukan WHERE id_sumber = 5");
while ($jumlah5 = mysqli_fetch_array($hasil5)) {
  $arrayhasil5[] = $jumlah5['jumlah'];
}
$jumlahhasil5 = array_sum($arrayhasil5);

$sumber1 = mysqli_query($koneksi, "SELECT id_sumber FROM pemasukan WHERE id_sumber = '1'");
$sumber1text = mysqli_num_rows($sumber1);
$sumber1 = $sumber1text * 10;

$sumber2 = mysqli_query($koneksi, "SELECT id_sumber FROM pemasukan WHERE id_sumber = '2'");
$sumber2text = mysqli_num_rows($sumber2);
$sumber2 = $sumber2text * 10;

$sumber3 = mysqli_query($koneksi, "SELECT id_sumber FROM pemasukan WHERE id_sumber = '3'");
$sumber3text = mysqli_num_rows($sumber3);
$sumber3 = $sumber3text * 10;

$sumber4 = mysqli_query($koneksi, "SELECT id_sumber FROM pemasukan WHERE id_sumber = '4'");
$sumber4text = mysqli_num_rows($sumber4);
$sumber4 = $sumber4text * 10;

$sumber5 = mysqli_query($koneksi, "SELECT id_sumber FROM pemasukan WHERE id_sumber = '5'");
$sumber5text = mysqli_num_rows($sumber5);
$sumber5 = $sumber5text * 10;

echo '
  <h4 class="small font-weight-bold">' . $sumbern1['nama'] . '<span class="float-right">Rp. ' . number_format($jumlahhasil1, 2, ',', '.') . '</span></h4>
  <div class="progress mb-4">
    <div class="progress-bar bg-danger" role="progressbar" style="width:' . $sumber1 . '%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">' . $sumber1text . ' Kali</div>
  </div>
  <h4 class="small font-weight-bold">' . $sumbern2['nama'] . '<span class="float-right">Rp. ' . number_format($jumlahhasil2, 2, ',', '.') . '</span></h4>
  <div class="progress mb-4">
    <div class="progress-bar bg-warning" role="progressbar" style="width:' . $sumber2 . '%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">' . $sumber2text . ' Kali</div>
  </div>
  <h4 class="small font-weight-bold">' . $sumbern3['nama'] . '<span class="float-right">Rp. ' . number_format($jumlahhasil3, 2, ',', '.') . '</span></h4>
  <div class="progress mb-4">
    <div class="progress-bar bg-info" role="progressbar" style="width:' . $sumber3 . '%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">' . $sumber3text . ' Kali</div>
  </div>
  <h4 class="small font-weight-bold">' . $sumbern4['nama'] . '<span class="float-right">Rp. ' . number_format($jumlahhasil4, 2, ',', '.') . '</span></h4>
  <div class="progress mb-4">
    <div class="progress-bar bg-primary" role="progressbar" style="width:' . $sumber4 . '%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">' . $sumber4text . ' Kali</div>
  </div>
  <h4 class="small font-weight-bold">' . $sumbern5['nama'] . '<span class="float-right">Rp. ' . number_format($jumlahhasil5, 2, ',', '.') . '</span></h4>
  <div class="progress mb-4">
    <div class="progress-bar bg-success" role="progressbar" style="width:' . $sumber5 . '%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">' . $sumber5text . ' Kali</div>
  </div>';
?>
                </div>
              </div>
            </div> -->

            <!-- Catatan Pendapatan -->
            <!-- <div class="col-lg-6">
              <div class="card shadow mb-4">
                <a href="#collapsePendapatanCatatan1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapsePendapatanCatatan1">
                  <h6 class="m-0 font-weight-bold text-primary">Catatan 1</h6>
                </a>
                <div class="collapse show" id="collapsePendapatanCatatan1">
                  <div class="card-body">
<?php
$catatan1 = mysqli_query($koneksi, "SELECT catatan FROM catatan WHERE id_catatan = 1");
$catatan1 = mysqli_fetch_array($catatan1);
echo $catatan1['catatan'];
?>
                  </div>
                </div>
              </div>
              <div class="card shadow mb-4">
                <a href="#collapsePendapatanCatatan2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapsePendapatanCatatan2">
                  <h6 class="m-0 font-weight-bold text-primary">Catatan 2</h6>
                </a>
                <div class="collapse show" id="collapsePendapatanCatatan2">
                  <div class="card-body">
<?php
$catatan2 = mysqli_query($koneksi, "SELECT * FROM catatan WHERE id_catatan = 2");
$catatan2 = mysqli_fetch_array($catatan2);
echo $catatan2['catatan'];
?>
                  </div>
                </div>
              </div>
            </div> -->

            <!-- Tabel Pemasukan -->
            <div class="col-xl-8 col-lg-12">
              <button type="button" class="btn btn-success" style="margin:5px" data-toggle="modal" data-target="#myModalTambahPemasukan">
                <i class="fa fa-plus"> Pemasukan</i>
              </button><br>

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Transaksi Masuk</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>ID Pemasukan</th>
                          <th>Tanggal</th>
                          <th>Jumlah</th>
                          <th>Sumber</th>
                          <th>Edit</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>ID Pemasukan</th>
                          <th>Tanggal</th>
                          <th>Jumlah</th>
                          <th>Sumber</th>
                          <th>Edit</th>
                        </tr>
                      </tfoot>
                      <tbody>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM pemasukan");
while ($data = mysqli_fetch_assoc($query)) {
?>
                        <tr>
                          <td><?= $data['id_pemasukan'] ?></td>
                          <td><?= $data['tgl_pemasukan'] ?></td>
                          <td>Rp. <?= number_format($data['jumlah'], 2, ',', '.'); ?></td>
                          <td><?= $data['id_sumber'] ?></td>
                          <td>
                            <a href="#" type="button" class="fa fa-edit btn btn-primary btn-md" data-toggle="modal" data-target="#modalPemasukan<?= $data['id_pemasukan']; ?>"></a>
                          </td>
                        </tr>

                        <!-- Modal Edit Pemasukan-->
                        <div class="modal fade" id="modalPemasukan<?= $data['id_pemasukan']; ?>" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Ubah Data Pemasukan</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                <form role="form" action="proses-edit-pemasukan.php" method="get">
<?php
  $id = $data['id_pemasukan'];
  $query_edit = mysqli_query($koneksi, "SELECT * FROM pemasukan WHERE id_pemasukan='$id'");
  while ($row = mysqli_fetch_array($query_edit)) {
?>
                                  <input type="hidden" name="id_pemasukan" value="<?php echo $row['id_pemasukan']; ?>">

                                  <div class="form-group">
                                    <label>Id</label>
                                    <input type="text" name="id_pemasukan" class="form-control" value="<?php echo $row['id_pemasukan']; ?>" disabled>
                                  </div>

                                  <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="date" name="tgl_pemasukan" class="form-control" value="<?php echo $row['tgl_pemasukan']; ?>">
                                  </div>

                                  <div class="form-group">
                                    <label>Jumlah</label>
                                    <input type="text" name="jumlah" class="form-control" value="<?php echo $row['jumlah']; ?>">
                                  </div>

                                  <div class="form-group">
                                    <label>Sumber</label>
                                    <select class="form-control" name="id_sumber">
<?php
    $queri = mysqli_query($koneksi, "SELECT * FROM sumber");
    while ($querynama = mysqli_fetch_array($queri)) {
      echo '<option value="' . $querynama['id_sumber'] . '">' . $querynama['id_sumber'] . '. ' . $querynama["nama"] . '</option>';
    }
?>
                                    </select>
                                  </div>

                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Ubah</button>
                                    <a href="hapus-pemasukan.php?id_pemasukan=<?= $row['id_pemasukan']; ?>" Onclick="confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-danger">Hapus</a>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                                  </div>
<?php
  }
?>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
<?php
}
?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <!-- Modal Tambah Pemasukan -->
          <div id="myModalTambahPemasukan" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Tambah Pendapatan</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="tambah-pendapatan.php" method="get">
                  <div class="modal-body">
                    Tanggal :
                    <input type="date" class="form-control" name="tgl_pemasukan">
                    Jumlah :
                    <input type="number" class="form-control" name="jumlah">
                    Sumber :
                    <select class="form-control" name="sumber">
                      <option value="1">1. Buat Web Pemerintah</option>
                      <option value="2">2. Desain Poster Lomba</option>
                      <option value="3">3. Instalasi Software</option>
                      <option value="4">4. Instalasi OS</option>
                      <option value="5">5. Buat Video Animasi</option>
                    </select>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Tambah</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>

        <!-- Pengeluaran Tab -->
        <div class="tab-pane fade" id="tab-pengeluaran" role="tabpanel" aria-labelledby="pengeluaran-tab">
          <!-- Content Row -->
          <div class="row">

            <!-- Sumber Pengeluaran -->
            <!-- <div class="col-lg-6 mb-4">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Sumber Pengeluaran</h6>
                </div>
                <div class="card-body">
<?php
$namasumber1 = mysqli_query($koneksi, "SELECT * FROM `sumber` WHERE id_sumber = 6");
$sumbern1 = mysqli_fetch_assoc($namasumber1);

$namasumber2 = mysqli_query($koneksi, "SELECT * FROM `sumber` WHERE id_sumber = 7");
$sumbern2 = mysqli_fetch_assoc($namasumber2);

$namasumber3 = mysqli_query($koneksi, "SELECT * FROM `sumber` WHERE id_sumber = 8");
$sumbern3 = mysqli_fetch_assoc($namasumber3);

$namasumber4 = mysqli_query($koneksi, "SELECT * FROM `sumber` WHERE id_sumber = 9");
$sumbern4 = mysqli_fetch_assoc($namasumber4);

$namasumber5 = mysqli_query($koneksi, "SELECT * FROM `sumber` WHERE id_sumber = 10");
$sumbern5 = mysqli_fetch_assoc($namasumber5);

$arrayhasil1 = [];
$hasil1 = mysqli_query($koneksi, "SELECT * FROM pengeluaran WHERE id_sumber = 6");
while ($jumlah1 = mysqli_fetch_array($hasil1)) {
  $arrayhasil1[] = $jumlah1['jumlah'];
}
$jumlahhasil1 = array_sum($arrayhasil1);

$arrayhasil2 = [];
$hasil2 = mysqli_query($koneksi, "SELECT * FROM pengeluaran WHERE id_sumber = 7");
while ($jumlah2 = mysqli_fetch_array($hasil2)) {
  $arrayhasil2[] = $jumlah2['jumlah'];
}
$jumlahhasil2 = array_sum($arrayhasil2);

$arrayhasil3 = [];
$hasil3 = mysqli_query($koneksi, "SELECT * FROM pengeluaran WHERE id_sumber = 8");
while ($jumlah3 = mysqli_fetch_array($hasil3)) {
  $arrayhasil3[] = $jumlah3['jumlah'];
}
$jumlahhasil3 = array_sum($arrayhasil3);

$arrayhasil4 = [];
$hasil4 = mysqli_query($koneksi, "SELECT * FROM pengeluaran WHERE id_sumber = 9");
while ($jumlah4 = mysqli_fetch_array($hasil4)) {
  $arrayhasil4[] = $jumlah4['jumlah'];
}
$jumlahhasil4 = array_sum($arrayhasil4);

$arrayhasil5 = [];
$hasil5 = mysqli_query($koneksi, "SELECT * FROM pengeluaran WHERE id_sumber = 10");
while ($jumlah5 = mysqli_fetch_array($hasil5)) {
  $arrayhasil5[] = $jumlah5['jumlah'];
}
$jumlahhasil5 = array_sum($arrayhasil5);

$sumber1 = mysqli_query($koneksi, "SELECT id_sumber FROM pengeluaran WHERE id_sumber = '6'");
$sumber1text = mysqli_num_rows($sumber1);
$sumber1 = $sumber1text * 10;

$sumber2 = mysqli_query($koneksi, "SELECT id_sumber FROM pengeluaran WHERE id_sumber = '7'");
$sumber2text = mysqli_num_rows($sumber2);
$sumber2 = $sumber2text * 10;

$sumber3 = mysqli_query($koneksi, "SELECT id_sumber FROM pengeluaran WHERE id_sumber = '8'");
$sumber3text = mysqli_num_rows($sumber3);
$sumber3 = $sumber3text * 10;

$sumber4 = mysqli_query($koneksi, "SELECT id_sumber FROM pengeluaran WHERE id_sumber = '9'");
$sumber4text = mysqli_num_rows($sumber4);
$sumber4 = $sumber4text * 10;

$sumber5 = mysqli_query($koneksi, "SELECT id_sumber FROM pengeluaran WHERE id_sumber = '10'");
$sumber5text = mysqli_num_rows($sumber5);
$sumber5 = $sumber5text * 10;

echo '
  <h4 class="small font-weight-bold">' . $sumbern1['nama'] . '<span class="float-right">Rp. ' . number_format($jumlahhasil1, 2, ',', '.') . '</span></h4>
  <div class="progress mb-4">
    <div class="progress-bar bg-danger" role="progressbar" style="width:' . $sumber1 . '%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">' . $sumber1text . ' Kali</div>
  </div>
  <h4 class="small font-weight-bold">' . $sumbern2['nama'] . '<span class="float-right">Rp. ' . number_format($jumlahhasil2, 2, ',', '.') . '</span></h4>
  <div class="progress mb-4">
    <div class="progress-bar bg-warning" role="progressbar" style="width:' . $sumber2 . '%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">' . $sumber2text . ' Kali</div>
  </div>
  <h4 class="small font-weight-bold">' . $sumbern3['nama'] . '<span class="float-right">Rp. ' . number_format($jumlahhasil3, 2, ',', '.') . '</span></h4>
  <div class="progress mb-4">
    <div class="progress-bar bg-info" role="progressbar" style="width:' . $sumber3 . '%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">' . $sumber3text . ' Kali</div>
  </div>
  <h4 class="small font-weight-bold">' . $sumbern4['nama'] . '<span class="float-right">Rp. ' . number_format($jumlahhasil4, 2, ',', '.') . '</span></h4>
  <div class="progress mb-4">
    <div class="progress-bar bg-primary" role="progressbar" style="width:' . $sumber4 . '%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">' . $sumber4text . ' Kali</div>
  </div>
  <h4 class="small font-weight-bold">' . $sumbern5['nama'] . '<span class="float-right">Rp. ' . number_format($jumlahhasil5, 2, ',', '.') . '</span></h4>
  <div class="progress mb-4">
    <div class="progress-bar bg-success" role="progressbar" style="width:' . $sumber5 . '%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">' . $sumber5text . ' Kali</div>
  </div>';
?>
                </div>
              </div>
            </div> -->

            <!-- Catatan Pengeluaran -->
            <!-- <div class="col-lg-6">
              <div class="card shadow mb-4">
                <a href="#collapsePengeluaranCatatan1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapsePengeluaranCatatan1">
                  <h6 class="m-0 font-weight-bold text-primary">Catatan 1</h6>
                </a>
                <div class="collapse show" id="collapsePengeluaranCatatan1">
                  <div class="card-body">
<?php
$catatan = mysqli_query($koneksi, "SELECT catatan FROM catatan WHERE id_catatan = 3");
$catatan = mysqli_fetch_array($catatan);
echo $catatan['catatan'];
?>
                  </div>
                </div>
              </div>
              <div class="card shadow mb-4">
                <a href="#collapsePengeluaranCatatan2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapsePengeluaranCatatan2">
                  <h6 class="m-0 font-weight-bold text-primary">Catatan 2</h6>
                </a>
                <div class="collapse show" id="collapsePengeluaranCatatan2">
                  <div class="card-body">
<?php
$catatan = mysqli_query($koneksi, "SELECT catatan FROM catatan WHERE id_catatan = 4");
$catatan = mysqli_fetch_array($catatan);
echo $catatan['catatan'];
?>
                  </div>
                </div>
              </div>
            </div> -->

          </div>

          <!-- Area Chart Pengeluaran -->
          <div class="row">
            <div class="col-xl-8 col-lg-12">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Pengeluaran 7 Hari Terakhir</h6>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Tabel Pengeluaran -->
          <button type="button" class="btn btn-success" style="margin:5px" data-toggle="modal" data-target="#myModalTambahPengeluaran">
            <i class="fa fa-plus"> Keluaran</i>
          </button><br>

          <div class="row">
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Transaksi Keluar</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>ID Pengeluaran</th>
                          <th>Tanggal</th>
                          <th>Jumlah</th>
                          <th>Sumber</th>
                          <th>Edit</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>ID Pengeluaran</th>
                          <th>Tanggal</th>
                          <th>Jumlah</th>
                          <th>Sumber</th>
                          <th>Edit</th>
                        </tr>
                      </tfoot>
                      <tbody>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM pengeluaran");
while ($data = mysqli_fetch_assoc($query)) {
?>
                        <tr>
                          <td><?= $data['id_pengeluaran'] ?></td>
                          <td><?= $data['tgl_pengeluaran'] ?></td>
                          <td>Rp. <?= number_format($data['jumlah'], 2, ',', '.'); ?></td>
                          <td><?= $data['id_sumber'] ?></td>
                          <td>
                            <a href="#" type="button" class="fa fa-edit btn btn-primary btn-md" data-toggle="modal" data-target="#modalPengeluaran<?= $data['id_pengeluaran']; ?>"></a>
                          </td>
                        </tr>

                        <!-- Modal Edit Pengeluaran-->
                        <div class="modal fade" id="modalPengeluaran<?= $data['id_pengeluaran']; ?>" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Ubah Data Pengeluaran</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                <form role="form" action="proses-edit-pengeluaran.php" method="get">
<?php
  $id = $data['id_pengeluaran'];
  $query_edit = mysqli_query($koneksi, "SELECT * FROM pengeluaran WHERE id_pengeluaran='$id'");
  while ($row = mysqli_fetch_array($query_edit)) {
?>
                                  <input type="hidden" name="id_pengeluaran" value="<?php echo $row['id_pengeluaran']; ?>">

                                  <div class="form-group">
                                    <label>Id</label>
                                    <input type="text" name="id_pengeluaran" class="form-control" value="<?php echo $row['id_pengeluaran']; ?>" disabled>
                                  </div>

                                  <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="date" name="tgl_pengeluaran" class="form-control" value="<?php echo $row['tgl_pengeluaran']; ?>">
                                  </div>

                                  <div class="form-group">
                                    <label>Jumlah</label>
                                    <input type="text" name="jumlah" class="form-control" value="<?php echo $row['jumlah']; ?>">
                                  </div>

                                  <div class="form-group">
                                    <label>Sumber</label>
                                    <select class="form-control" name="id_sumber">
<?php
    $queri = mysqli_query($koneksi, "SELECT * FROM sumber");
    while ($querynama = mysqli_fetch_array($queri)) {
      echo '<option value="' . $querynama['id_sumber'] . '">' . $querynama['id_sumber'] . '. ' . $querynama["nama"] . '</option>';
    }
?>
                                    </select>
                                  </div>

                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Ubah</button>
                                    <a href="hapus-pengeluaran.php?id_pengeluaran=<?= $row['id_pengeluaran']; ?>" Onclick="confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-danger">Hapus</a>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                                  </div>
<?php
  }
?>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
<?php
}
?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Modal Tambah Pengeluaran -->
          <div id="myModalTambahPengeluaran" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Tambah Pengeluaran</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="tambah-pengeluaran.php" method="get">
                  <div class="modal-body">
                    Tanggal :
                    <input type="date" class="form-control" name="tgl_pengeluaran">
                    Jumlah :
                    <input type="number" class="form-control" name="jumlah">
                    Sumber :
                    <select class="form-control" name="sumber">
                      <option value="6">6. Domain</option>
                      <option value="7">7. Hosting</option>
                      <option value="8">8. Listrik</option>
                      <option value="9">9. Air</option>
                      <option value="10">10. Wifi</option>
                    </select>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Tambah</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>

      </div>

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

<?php require 'footer.php'?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

<?php require 'logout-modal.php'; ?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

  <script type="text/javascript">
  // Set new default font family and font color to mimic Bootstrap's default styling
  Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#858796';

  function number_format(number, decimals, dec_point, thousands_sep) {
    number = (number + '').replace(',', '').replace(' ', '');
    var n = !isFinite(+number) ? 0 : +number,
      prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
      sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
      dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
      s = '',
      toFixedFix = function(n, prec) {
        var k = Math.pow(10, prec);
        return '' + Math.round(n * k) / k;
      };
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
      s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
      s[1] = s[1] || '';
      s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
  }

  // Area Chart Pengeluaran 7 hari
  var ctx = document.getElementById("myAreaChart");
  if (ctx) {
    var myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ["7 hari lalu", "6 hari lalu", "5 hari lalu", "4 hari lalu", "3 hari lalu", "2 hari lalu", "1 hari lalu"],
        datasets: [{
          label: "Pendapatan",
          lineTension: 0.3,
          backgroundColor: "rgba(78, 115, 223, 0.05)",
          borderColor: "rgba(78, 115, 223, 1)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(78, 115, 223, 1)",
          pointBorderColor: "rgba(78, 115, 223, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
          pointHoverBorderColor: "rgba(78, 115, 223, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: [<?php echo $tujuhhari['0']?>, <?php echo $enamhari['0'] ?>, <?php echo $limahari['0'] ?>, <?php echo $empathari['0'] ?>, <?php echo $tigahari['0'] ?>, <?php echo $duahari['0'] ?>, <?php echo $satuhari['0'] ?>],
        }],
      },
      options: {
        maintainAspectRatio: false,
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
          }
        },
        scales: {
          xAxes: [{
            time: {
              unit: 'date'
            },
            gridLines: {
              display: false,
              drawBorder: false
            },
            ticks: {
              maxTicksLimit: 7
            }
          }],
          yAxes: [{
            ticks: {
              maxTicksLimit: 5,
              padding: 10,
              callback: function(value, index, values) {
                return 'Rp.' + number_format(value);
              }
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2]
            }
          }],
        },
        legend: {
          display: false
        },
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          titleMarginBottom: 10,
          titleFontColor: '#6e707e',
          titleFontSize: 14,
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          intersect: false,
          mode: 'index',
          caretPadding: 10,
          callbacks: {
            label: function(tooltipItem, chart) {
              var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
              return datasetLabel + ': Rp.' + number_format(tooltipItem.yLabel);
            }
          }
        }
      }
    });
  }
  </script>

</body>

</html>

