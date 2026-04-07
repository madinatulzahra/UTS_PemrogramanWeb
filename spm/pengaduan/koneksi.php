<?php
$conn = mysqli_connect("localhost", "root", "", "spm");

if(!$conn){
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>