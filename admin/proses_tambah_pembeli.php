<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../koneksi.php';

// membuat variabel untuk menampung data dari form
$id_pembeli = $_POST['id_pembeli'];
$nama_pembeli = $_POST['nama_pembeli'];
$alamat_pembeli    = $_POST['alamat_pembeli'];

$query = "INSERT INTO pembeli (id_pembeli, nama_pembeli, alamat_pembeli) VALUES ('$id_pembeli' ,'$nama_pembeli', '$alamat_pembeli')";
$result = mysqli_query($koneksi, $query);
// periska query apakah ada error
if (!$result) {
    echo "<script>alert('Data gagal ditambahkan, Duplicate Id!');window.location='index.php';</script>";
    die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
        " - " . mysqli_error($koneksi));
} else {
    //tampil alert dan akan redirect ke halaman index.php
    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
}
