<?php
// memanggil file koneksi.php untuk membuat koneksi
include '../koneksi.php';

// mengecek apakah di url ada nilai GET id
// ambil nilai id dari url dan disimpan dalam variabel $id
$id = $_GET["id"];

// menampilkan data dari database yang mempunyai id_motor=$id_motor
$query = "SELECT * FROM transaksi WHERE id_transaksi='$id'";
$result = mysqli_query($koneksi, $query);
// jika data gagal diambil maka akan tampil error berikut
if (!$result) {
    die("Query Error: " . mysqli_errno($koneksi) .
        " - " . mysqli_error($koneksi));
}
// mengambil data dari database
$data = mysqli_fetch_assoc($result);
// apabila data tidak ada pada database maka akan dijalankan perintah ini
if (!count($data)) {
    echo "<script>alert('Data Tidak Ditemukan');window.location='index.php';</script>";
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Data</title>
</head>

<body>
    <center>
        <h1>Edit Produk <?php echo $data['id_transaksi']; ?></h1>
        <center>
            <form method="POST" action="proses_edit_transaksi.php" enctype="multipart/form-data">
                <section class="base">
                    <!-- menampung nilai id produk yang akan di edit -->
                    <div>
                        <label>Id Transaksi</label>
                        <input type="text" name="id_transaksi" value="<?php echo $data['id_transaksi']; ?>" autofocus="" required="" />
                    </div>
                    <div>
                        <label>Id Pembeli</label>
                        <input type="text" name="id_pembeli" value="<?php echo $data['id_pembeli']; ?>" autofocus="" required="" />
                    </div>
                    <div>
                        <label>Id Motor</label>
                        <input type="text" name="id_motor" value="<?php echo $data['id_motor']; ?>" autofocus="" required="" />
                    </div>
                    <div>
                        <label>Id Karyawan</label>
                        <input type="text" name="id_karyawan" value="<?php echo $data['id_karyawan']; ?>" autofocus="" required="" />
                    </div>
                    <div>
                        <button type="submit">Simpan Perubahan</button>
                    </div>
                </section>
            </form>
</body>

</html>