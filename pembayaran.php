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

  <title>Pembayaran Kas</title>

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

$queryKas = mysqli_query($koneksi, "SELECT * FROM pembayaran_kas ORDER BY bulan, nama");
?>

  <!-- Main Content -->
  <div id="content">

<?php require 'navbar.php'; ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pembayaran Kas</h1>
      </div>

      <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#modalTambahKas">
        <i class="fa fa-plus"></i> Tambah Pembayaran
      </button>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Daftar Pembayaran Kas</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Bulan</th>
                  <th>Minggu 1</th>
                  <th>Minggu 2</th>
                  <th>Minggu 3</th>
                  <th>Minggu 4</th>
                  <th>Dibayar</th>
                  <th>Total</th>
                  <th>Kekurangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Bulan</th>
                  <th>Minggu 1</th>
                  <th>Minggu 2</th>
                  <th>Minggu 3</th>
                  <th>Minggu 4</th>
                  <th>Dibayar</th>
                  <th>Total</th>
                  <th>Kekurangan</th>
                  <th>Aksi</th>
                </tr>
              </tfoot>
              <tbody>
<?php
$no = 1;
while ($row = mysqli_fetch_assoc($queryKas)) {
?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= htmlspecialchars($row['nama'], ENT_QUOTES, 'UTF-8'); ?></td>
                  <td><?= htmlspecialchars($row['bulan'], ENT_QUOTES, 'UTF-8'); ?></td>
                  <td><?= number_format($row['minggu_1'], 0, ',', '.'); ?></td>
                  <td><?= number_format($row['minggu_2'], 0, ',', '.'); ?></td>
                  <td><?= number_format($row['minggu_3'], 0, ',', '.'); ?></td>
                  <td><?= number_format($row['minggu_4'], 0, ',', '.'); ?></td>
                  <td><?= number_format($row['dibayar'], 0, ',', '.'); ?></td>
                  <td><?= number_format($row['total'], 0, ',', '.'); ?></td>
                  <td><?= number_format($row['kekurangan'], 0, ',', '.'); ?></td>
                  <td>
                    <a href="#" type="button" class="fa fa-edit btn btn-primary btn-md" data-toggle="modal" data-target="#modalEditKas<?= $row['id_kas']; ?>"></a>
                  </td>
                </tr>

                <!-- Modal Edit Pembayaran Kas -->
                <div class="modal fade" id="modalEditKas<?= $row['id_kas']; ?>" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Ubah Pembayaran Kas</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                        <form role="form" action="proses-edit-pembayaran.php" method="get">
                          <input type="hidden" name="id_kas" value="<?= $row['id_kas']; ?>">

                          <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($row['nama'], ENT_QUOTES, 'UTF-8'); ?>">
                          </div>

                          <div class="form-group">
                            <label>Bulan</label>
                            <select class="form-control" name="bulan">
<?php
$bulanOptions = ['Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
foreach ($bulanOptions as $b) {
  $selected = ($row['bulan'] === $b) ? 'selected' : '';
  echo '<option value="' . $b . '" ' . $selected . '>' . $b . '</option>';
}
?>
                            </select>
                          </div>

                          <div class="form-group">
                            <label>Minggu yang dibayar</label><br>
<?php
$perMinggu = 10000;
$check1 = $row['minggu_1'] > 0 ? 'checked' : '';
$check2 = $row['minggu_2'] > 0 ? 'checked' : '';
$check3 = $row['minggu_3'] > 0 ? 'checked' : '';
$check4 = $row['minggu_4'] > 0 ? 'checked' : '';
?>
                            <label class="mr-2"><input type="checkbox" name="minggu_1" value="1" <?= $check1; ?>> Minggu 1</label>
                            <label class="mr-2"><input type="checkbox" name="minggu_2" value="1" <?= $check2; ?>> Minggu 2</label>
                            <label class="mr-2"><input type="checkbox" name="minggu_3" value="1" <?= $check3; ?>> Minggu 3</label>
                            <label class="mr-2"><input type="checkbox" name="minggu_4" value="1" <?= $check4; ?>> Minggu 4</label>
                            <small class="form-text text-muted mt-2">Setiap minggu bernilai Rp. 2.000, total kas bulanan Rp. 40.000.</small>
                          </div>

                          <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="hapus-pembayaran.php?id_kas=<?= $row['id_kas']; ?>" Onclick="confirm('Anda yakin ingin menghapus?')" class="btn btn-danger">Hapus</a>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                          </div>
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

      <!-- Modal Tambah Pembayaran Kas -->
      <div id="modalTambahKas" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Pembayaran Kas</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form action="tambah-pembayaran.php" method="get">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" name="nama" required>
                </div>
                <div class="form-group">
                  <label>Bulan</label>
                  <select class="form-control" name="bulan" required>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktober">Oktober</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Minggu yang dibayar</label><br>
                  <label class="mr-2"><input type="checkbox" name="minggu_1" value="1"> Minggu 1</label>
                  <label class="mr-2"><input type="checkbox" name="minggu_2" value="1"> Minggu 2</label>
                  <label class="mr-2"><input type="checkbox" name="minggu_3" value="1"> Minggu 3</label>
                  <label class="mr-2"><input type="checkbox" name="minggu_4" value="1"> Minggu 4</label>
                  <small class="form-text text-muted mt-2">Setiap minggu bernilai Rp. 2.000, total kas bulanan Rp. 40.000.</small>
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
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

<?php require 'footer.php'; ?>

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
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>

