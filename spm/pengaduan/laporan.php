<?php
include "koneksi.php";

$nama  = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$isi   = $_POST['isi'];

// ambil file
$nama_asli = $_FILES['bukti']['name'];
$tmp       = $_FILES['bukti']['tmp_name'];

// ambil ekstensi file
$ext = pathinfo($nama_asli, PATHINFO_EXTENSION);

// buat nama baru (AMAN & PENDEK)
$nama_file = "img_" . time() . "." . $ext;

// upload
move_uploaded_file($tmp, "../gambar/" . $nama_file);

// simpan ke database
$query = mysqli_query($conn, "INSERT INTO pengaduan (nama, no_hp, isi_laporan, bukti) 
VALUES ('$nama','$no_hp','$isi','$nama_file')");

if($query){
    $id = mysqli_insert_id($conn); // ambil ID terakhir

    header("Location: sukses.php?id=$id");
    exit;
} else {
    echo mysqli_error($conn);
}
?>