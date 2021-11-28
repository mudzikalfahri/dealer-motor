<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../koneksi.php';

// membuat variabel untuk menampung data dari form
$id_karyawan = $_POST['id_karyawan'];
$nama_karyawan = $_POST['nama_karyawan'];
$gender_karyawan    = $_POST['gender_karyawan'];

$query = "INSERT INTO karyawan (id_karyawan, nama_karyawan, gender_karyawan) VALUES ('$id_karyawan' ,'$nama_karyawan', '$gender_karyawan')";
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
