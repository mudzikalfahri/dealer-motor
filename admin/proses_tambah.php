<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../koneksi.php';

// membuat variabel untuk menampung data dari form
$id_motor = $_POST['id_motor'];
$tipe_motor = $_POST['tipe_motor'];
$stok    = $_POST['stok'];
$harga    = $_POST['harga'];

$query = "INSERT INTO produk (id_motor, tipe_motor, stok, harga) VALUES ('$id_motor' ,'$tipe_motor', '$stok', '$harga')";
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
