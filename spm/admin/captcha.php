<?php
session_start();

// Karakter captcha (huruf kecil & besar)
$characters = 'abcdefghjkmnopqrstuvwxyzABCDEFGHJKMNOPQRSTUVWXYZ';
$captcha = '';

// Generate 4 karakter random
for ($i = 0; $i < 4; $i++) {
    $captcha .= $characters[rand(0, strlen($characters) - 1)];
}

// Simpan ke session
$_SESSION['captcha'] = $captcha;

// Buat gambar captcha
header('Content-Type: image/png');
$image = imagecreate(100, 40);

// Warna
$bg = imagecolorallocate($image, 255, 255, 255);
$text_color = imagecolorallocate($image, 0, 0, 0);

// Tampilkan captcha ke gambar
imagestring($image, 5, 25, 10, $captcha, $text_color);

// Output image
imagepng($image);
imagedestroy($image);
?>