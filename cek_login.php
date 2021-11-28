<?php
// mengaktifkan session php
session_start();

// menghubungkan dengan file koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
$hashedpassword = md5($password);

// mencocokan username dan password admin
$data = mysqli_query($koneksi, "select * from admin where username='$username' and password='$hashedpassword'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if ($cek > 0) {
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:admin/index.php");
} else {
	header("location:admin.php?pesan=gagal");
}
