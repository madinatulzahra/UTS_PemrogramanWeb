<?php
$id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Laporan Berhasil</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background-color: #fff9db;
    font-family: 'Segoe UI', sans-serif;
}

.card {
    border-radius: 20px;
}

.success-icon {
    font-size: 60px;
}

.btn-kuning {
    background-color: #ffd43b;
    border: none;
}

.btn-kuning:hover {
    background-color: #fab005;
}
</style>
</head>

<body class="d-flex justify-content-center align-items-center vh-100">

<div class="card shadow p-5 text-center" style="max-width: 400px;">

    <div class="success-icon">🎉</div>

    <h4 class="mt-3">Laporan Berhasil Dikirim!</h4>

    <p class="text-muted">
        Terima kasih, laporan Anda telah diterima oleh sistem.
    </p>

    <div class="alert alert-warning">
        <strong>ID Laporan:</strong> <?= $id ?>
    </div>

    <p class="small text-muted">
        Simpan ID ini untuk mengecek status laporan Anda.
    </p>

    <div class="d-grid gap-2 mt-3">
        <a href="tracking.php" class="btn btn-kuning">
            🔍 Cek Status
        </a>

        <a href="index.php" class="btn btn-kuning">
            🏠 Kembali ke Beranda
        </a>
    </div>

</div>

</body>
</html>