<?php
session_start();
include "koneksi.php";

if(!isset($_SESSION['admin'])){
    header("location:login.php");
    exit;
}

$data = mysqli_query($conn, "SELECT * FROM pengaduan");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard Staf</title>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg shadow-sm px-4">
    <div class="container-fluid">
        <span class="navbar-brand fw-bold">📢 SAPA-MAS | Dashboard Staf</span>
        <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
    </div>
</nav>

<div class="container mt-4">
<?php
$total = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pengaduan"));
$proses = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pengaduan WHERE status='diproses'"));
$selesai = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pengaduan WHERE status='selesai'"));
?>

<div class="row mb-4">
  <div class="col-md-4">
    <div class="card bg-primary text-white shadow">
      <div class="card-body">
        <h8>📊Total Laporan</h8>
        <h3><?= $total ?></h3>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card bg-warning text-dark shadow">
      <div class="card-body">
        <h8>🔄Diproses</h8>
        <h3><?= $proses ?></h3>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card bg-success text-white shadow">
      <div class="card-body">
        <h8>✅Selesai</h8>
        <h3><?= $selesai ?></h3>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background-color: #fff9db;
}

/* Navbar */
.navbar {
    background-color: #ffe066;
}

/* Card */
.card {
    border-radius: 15px;
}

/* Badge status */
.badge-menunggu {
    background-color: #fff3bf;
    color: #8d6b00;
}

.badge-proses {
    background-color: #ffd43b;
    color: #5c4500;
}

.badge-selesai {
    background-color: #51cf66;
}

/* Tombol */
.btn-kuning {
    background-color: #ffd43b;
    border: none;
}

.btn-kuning:hover {
    background-color: #fab005;
}

/* Tabel */
.table thead {
    background-color: #ffe066;
}
</style>
</head>

<body>

<!-- CONTENT -->
<div class="container mt-4">

    <div class="card shadow p-4">
        <h5 class="mb-3">📋 Data Laporan Masyarakat</h5>

        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
						<th>No</th>
                        <th>ID Laporan</th>
                        <th>Nama</th>
						<th>No HP</th>
                        <th>Laporan</th>
                        <th>Bukti</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                <?php $no=1; mysqli_data_seek($data,0); while($d = mysqli_fetch_array($data)){ ?>
                <tr>
					<td><?= $no++ ?></td>
                    <td><?= $d['id']; ?></td>
                    <td><?= $d['nama']; ?></td>
					<td><?= $d['no_hp']; ?></td>
                    <td><?= $d['isi_laporan']; ?></td>

                    <!-- GAMBAR -->
                    <td> 
                            <img src="../gambar/<?= $d['bukti']; ?>" width="80" class="rounded shadow-sm">
                    </td>

                    <!-- STATUS -->
                    <td>
                        <?php if($d['status'] == "Menunggu"){ ?>
                            <span class="badge badge-menunggu">Menunggu</span>
                        <?php } elseif($d['status'] == "Diproses"){ ?>
                            <span class="badge badge-proses">Diproses</span>
                        <?php } else { ?>
                            <span class="badge badge-selesai">Selesai</span>
                        <?php } ?>
                    </td>

                    <!-- AKSI -->
                    <td>
    <a href="update_status.php?id=<?= $d['id']; ?>&status=Diproses" 
       class="btn btn-sm btn-warning">Proses</a>

    <a href="update_status.php?id=<?= $d['id']; ?>&status=Selesai" 
       class="btn btn-sm btn-success">Selesai</a>

</td>
                </tr>
                <?php } ?>

                </tbody>
            </table>
        </div>
    </div>

</div>
</body>
</html>
