<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../koneksi.php';

// membuat variabel untuk menampung data dari form
$id_motor = $_POST['id_motor'];
$tipe_motor = $_POST['tipe_motor'];
$stok = $_POST['stok'];
$harga = $_POST['harga'];
//cek dulu jika merubah gambar produk jalankan coding ini

// jalankan query UPDATE berdasarkan ID yang produknya kita edit
$query  = "UPDATE produk SET tipe_motor = '$tipe_motor', stok = '$stok', harga = '$harga'";
$query .= "WHERE id_motor = '$id_motor'";
$result = mysqli_query($koneksi, $query);
// periska query apakah ada error
if (!$result) {
  die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
    " - " . mysqli_error($koneksi));
} else {
  //tampil alert dan akan redirect ke halaman index.php
  echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
}
