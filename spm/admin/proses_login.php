<?php
session_start();
include "koneksi.php";

if (isset($_POST['login'])) {

    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = md5($_POST['password']);
    $cap  = $_POST['captcha'];

    // cek captcha
    if ($cap != $_SESSION['captcha']) {
        echo "<script>
                alert('Captcha salah!');
                window.location='login.php';
              </script>";
        exit;
    }

    // cek ke database
    $query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$user' AND password='$pass'");

    if (mysqli_num_rows($query) > 0) {
        $_SESSION['admin'] = $user;

        echo "<script>
                alert('Login berhasil!');
                window.location='dashboard.php';
              </script>";
    } else {
        echo "<script>
                alert('Username atau password salah!');
                window.location='login.php';
              </script>";
    }
}
?>