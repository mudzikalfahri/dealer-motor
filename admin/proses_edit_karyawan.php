<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../koneksi.php';

// membuat variabel untuk menampung data dari form
$id_karyawan = $_POST['id_karyawan'];
$nama_karyawan = $_POST['nama_karyawan'];
$gender_karyawan = $_POST['gender_karyawan'];
//cek dulu jika merubah gambar produk jalankan coding ini

// jalankan query UPDATE berdasarkan ID yang produknya kita edit
$query  = "UPDATE karyawan SET nama_karyawan = '$nama_karyawan', gender_karyawan = '$gender_karyawan'";
$query .= "WHERE id_karyawan = '$id_karyawan'";
$result = mysqli_query($koneksi, $query);
// periska query apakah ada error
if (!$result) {
    die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
        " - " . mysqli_error($koneksi));
} else {
    //tampil alert dan akan redirect ke halaman index.php
    echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
}
