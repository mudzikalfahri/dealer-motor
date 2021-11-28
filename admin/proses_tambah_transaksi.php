<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../koneksi.php';

// membuat variabel untuk menampung data dari form
$id_pembeli = $_POST['id_pembeli'];
$id_karyawan = $_POST['id_karyawan'];
$id_motor    = $_POST['id_motor'];

$query = "INSERT INTO transaksi (id_pembeli, id_karyawan, id_motor) VALUES ('$id_pembeli' ,'$id_karyawan', '$id_motor')";
$result = mysqli_query($koneksi, $query);
// periska query apakah ada error
if (!$result) {
    die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
        " - " . mysqli_error($koneksi));
} else {
    //tampil alert dan akan redirect ke halaman index.php
    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
}
