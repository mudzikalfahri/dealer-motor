<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../koneksi.php';

// membuat variabel untuk menampung data dari form
$id_transaksi = $_POST['id_transaksi'];
$id_pembeli = $_POST['id_pembeli'];
$id_motor = $_POST['id_motor'];
$id_karyawan = $_POST['id_karyawan'];
//cek dulu jika merubah gambar produk jalankan coding ini

// jalankan query UPDATE berdasarkan ID yang produknya kita edit
$query  = "UPDATE transaksi SET id_transaksi = '$id_transaksi', id_motor = '$id_motor', id_karyawan = '$id_karyawan', id_pembeli = '$id_pembeli'";
$query .= "WHERE id_transaksi = '$id_transaksi'";
$result = mysqli_query($koneksi, $query);
// periska query apakah ada error
if (!$result) {
    die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
        " - " . mysqli_error($koneksi));
} else {
    //tampil alert dan akan redirect ke halaman index.php
    echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
}
