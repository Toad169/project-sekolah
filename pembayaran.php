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

  <!-- Tailwind CSS, HTMX, AlpineJS -->
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <script src="https://cdn.jsdelivr.net/npm/htmx.org@2.0.8/dist/htmx.min.js"></script>
  <script src="//unpkg.com/alpinejs" defer></script>

  <style media="print">
    body * { visibility: hidden; }
    #card-pembayaran-kas, #card-pembayaran-kas * { visibility: visible; }
    #card-pembayaran-kas {
      position: absolute; left: 0; top: 0; width: 100%;
    }
    .card-header .btn, .card-header .form-inline { display: none !important; }
    .table .no-print, th.no-print, td.no-print { display: none !important; }
  </style>

</head>

<body id="page-top">

<?php
require 'koneksi.php';

require 'sidebar.php';

// Opsi bulan (tahun ajaran Juli-Juni)
$bulanOptions = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
$selectedBulan = isset($_GET['bulan']) ? $_GET['bulan'] : 'Januari';

// Opsi tahun untuk filter tampilan (saat ini belum disimpan di tabel)
$currentYear = (int) date('Y');
$selectedTahun = isset($_GET['tahun']) ? (int) $_GET['tahun'] : $currentYear;

// Filter data berdasarkan bulan yang dipilih
$safeBulan = mysqli_real_escape_string($koneksi, $selectedBulan);
$queryKas = mysqli_query($koneksi, "SELECT * FROM pembayaran_kas WHERE bulan = '{$safeBulan}' ORDER BY nama");
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
      <div class="card shadow mb-4" id="card-pembayaran-kas">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Daftar Pembayaran Kas</h6>
          <div class="d-flex align-items-center flex-wrap">
            <a href="export-pembayaran.php?bulan=<?php echo urlencode($selectedBulan); ?>" class="btn btn-success btn-sm mr-2" title="Simpan sebagai Excel">
              <i class="fas fa-file-excel"></i> Export as Excel
            </a>
            <!-- <button type="button" class="btn btn-info btn-sm mr-2" onclick="cetakPembayaran()" title="Cetak">
              <i class="fas fa-print"></i> Print
            </button> -->
            <form class="form-inline mb-0" method="get">
              <div class="form-group mr-2">
                <label for="filter-bulan" class="mr-2 mb-0">Bulan</label>
                <select id="filter-bulan" name="bulan" class="form-control form-control-sm" onchange="this.form.submit()">
<?php
foreach ($bulanOptions as $b) {
    $selected = ($selectedBulan === $b) ? 'selected' : '';
    echo '<option value="'.$b.'" '.$selected.'>'.$b.'</option>';
}
?>
                </select>
              </div>
            </form>
          </div>
          <!-- <div class="form-group">
              <label for="filter-tahun" class="mr-2 mb-0">Tahun</label>
              <select id="filter-tahun" name="tahun" class="form-control form-control-sm" onchange="this.form.submit()">
<?php
for ($y = $currentYear - 1; $y <= $currentYear + 1; ++$y) {
    $selected = ($selectedTahun === $y) ? 'selected' : '';
    echo '<option value="'.$y.'" '.$selected.'>'.$y.'/'.($y + 1).'</option>';
}
?>
              </select>
            </div> -->
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Bulan</th>
                  <th>1</th>
                  <th>2</th>
                  <th>3</th>
                  <th>4</th>
                  <th>Dibayar</th>
                  <th>Kekurangan</th>
                  <th>Total</th>
                  <th class="no-print">Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Bulan</th>
                  <th>1</th>
                  <th>2</th>
                  <th>3</th>
                  <th>4</th>
                  <th>Dibayar</th>
                  <th>Kekurangan</th>
                  <th>Total</th>
                  <th class="no-print">Aksi</th>
                </tr>
              </tfoot>
              <tbody>
<?php
$no = 1;
while ($row = mysqli_fetch_assoc($queryKas)) {
    ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo htmlspecialchars($row['nama'], ENT_QUOTES, 'UTF-8'); ?></td>
                  <td><?php echo htmlspecialchars($row['bulan'], ENT_QUOTES, 'UTF-8'); ?></td>
                  <td><?php echo number_format($row['minggu_1'], 0, ',', '.'); ?></td>
                  <td><?php echo number_format($row['minggu_2'], 0, ',', '.'); ?></td>
                  <td><?php echo number_format($row['minggu_3'], 0, ',', '.'); ?></td>
                  <td><?php echo number_format($row['minggu_4'], 0, ',', '.'); ?></td>
                  <td><?php echo number_format($row['dibayar'], 0, ',', '.'); ?></td>
                  <td><?php echo number_format($row['kekurangan'], 0, ',', '.'); ?></td>
                  <td><?php echo number_format($row['total'], 0, ',', '.'); ?></td>
                  <td class="no-print">
                    <a href="#" type="button" class="fa fa-edit btn btn-primary btn-md" data-toggle="modal" data-target="#modalEditKas<?php echo $row['id_kas']; ?>"></a>
                  </td>
                </tr>

                <!-- Modal Edit Pembayaran Kas -->
                <div class="modal fade" id="modalEditKas<?php echo $row['id_kas']; ?>" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Ubah Pembayaran Kas</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                        <form role="form" action="proses-edit-pembayaran.php" method="get">
                          <input type="hidden" name="id_kas" value="<?php echo $row['id_kas']; ?>">

                          <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="<?php echo htmlspecialchars($row['nama'], ENT_QUOTES, 'UTF-8'); ?>">
                          </div>

                          <div class="form-group">
                            <label>Bulan</label>
                            <select class="form-control" name="bulan">
<?php
foreach ($bulanOptions as $b) {
    $selected = ($row['bulan'] === $b) ? 'selected' : '';
    echo '<option value="'.$b.'" '.$selected.'>'.$b.'</option>';
}
    ?>
                            </select>
                          </div>

                          <div class="form-group">
                            <label>Minggu yang dibayar</label><br>
<?php
    $perMinggu = 2000;
    $check1 = $row['minggu_1'] >= $perMinggu ? 'checked' : '';
    $check2 = $row['minggu_2'] >= $perMinggu ? 'checked' : '';
    $check3 = $row['minggu_3'] >= $perMinggu ? 'checked' : '';
    $check4 = $row['minggu_4'] >= $perMinggu ? 'checked' : '';
    ?>
                            <label class="mr-2"><input type="checkbox" name="minggu_1" value="1" <?php echo $check1; ?>> Minggu 1</label>
                            <label class="mr-2"><input type="checkbox" name="minggu_2" value="1" <?php echo $check2; ?>> Minggu 2</label>
                            <label class="mr-2"><input type="checkbox" name="minggu_3" value="1" <?php echo $check3; ?>> Minggu 3</label>
                            <label class="mr-2"><input type="checkbox" name="minggu_4" value="1" <?php echo $check4; ?>> Minggu 4</label>
                            <small class="form-text text-muted mt-2">Setiap minggu bernilai Rp. 2.000, total kas bulanan Rp. 8.000.</small>
                          </div>

                          <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="hapus-pembayaran.php?id_kas=<?php echo $row['id_kas']; ?>" Onclick="confirm('Anda yakin ingin menghapus?')" class="btn btn-danger">Hapus</a>
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
                    <option value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
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
                  <small class="form-text text-muted mt-2">Setiap minggu bernilai Rp. 2.000, total kas bulanan Rp. 8.000.</small>
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
  <script>
    function cetakPembayaran() {
      window.print();
    }
  </script>

</body>

</html>

