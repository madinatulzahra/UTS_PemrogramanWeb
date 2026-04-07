<?php
session_start();
include "koneksi.php";

$error = "";

// proses login
if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = md5($_POST['password']);
    $cap  = $_POST['captcha'];

    // cek captcha
    if ($cap != $_SESSION['captcha']) {
        $error = "Captcha salah!";
    } else {
        $query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$user' AND password='$pass'");
        
        if (mysqli_num_rows($query) > 0) {
            $_SESSION['admin'] = $user;
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Username atau password salah!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login Staf</title>

<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: linear-gradient(135deg, #fff3bf, #ffe066);
    height: 100vh;
    font-family: 'Segoe UI', sans-serif;
}

/* Box login */
.login-box {
    width: 380px;
    border-radius: 20px;
    background: #fffdf5;
}

/* Judul */
.title {
    font-weight: bold;
    color: #f59f00;
}

/* Subjudul */
.subtitle {
    font-size: 14px;
    color: #777;
}

/* Input */
.form-control:focus {
    border-color: #ffd43b;
    box-shadow: 0 0 6px rgba(255, 212, 59, 0.5);
}

/* Tombol */
.btn-kuning {
    background-color: #ffd43b;
    border: none;
    font-weight: 500;
}

.btn-kuning:hover {
    background-color: #fab005;
}

/* captcha */
.captcha-img {
    border-radius: 10px;
    border: 1px solid #eee;
}
</style>
</head>

<body class="d-flex justify-content-center align-items-center">

<div class="card login-box shadow p-4">

    <!-- HEADER -->
    <div class="text-center mb-3">
        <h4 class="title">Login Staf</h4>
        <div class="subtitle">Sistem Pengaduan Masyarakat Desa</div>
    </div>

    <!-- ERROR -->
    <?php if ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <!-- FORM -->
    <form method="POST">

        <!-- Username -->
        <div class="mb-3">
            <label class="form-label">👤 Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label class="form-label">🔒 Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <!-- CAPTCHA -->
        <div class="mb-3 text-center">
            <img src="../captcha.php" id="captchaImg" class="captcha-img mb-2">
            <br>
            <button type="button" onclick="refreshCaptcha()" class="btn btn-sm btn-outline-secondary">
                🔄 Refresh Captcha
            </button>
        </div>

        <div class="mb-3">
            <input type="text" name="captcha" class="form-control" placeholder="Masukkan captcha" required>
        </div>

        <!-- Button -->
        <button type="submit" name="login" class="btn btn-kuning w-100">
            🚀 Masuk ke Dashboard
        </button>

    </form>

</div>

<script>
function refreshCaptcha(){
    document.getElementById("captchaImg").src = "captcha.php?" + Date.now();
}
</script>

</body>
</html>