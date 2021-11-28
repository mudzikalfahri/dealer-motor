<?php
// memanggil file koneksi.php untuk membuat koneksi
include '../koneksi.php';

// mengecek apakah di url ada nilai GET id
// ambil nilai id dari url dan disimpan dalam variabel $id
$id = $_GET["id"];

// menampilkan data dari database yang mempunyai id_motor=$id_motor
$query = "SELECT * FROM pembeli WHERE id_pembeli='$id'";
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
    echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Data</title>
</head>

<body>
    <center>
        <h1>Edit Produk <?php echo $data['nama_pembeli']; ?></h1>
        <center>
            <form method="POST" action="proses_edit_pembeli.php" enctype="multipart/form-data">
                <section class="base">
                    <!-- menampung nilai id produk yang akan di edit -->
                    <input name="id_pembeli" value="<?php echo $data['id_pembeli']; ?>" hidden />
                    <div>
                        <label>Nama</label>
                        <input type="text" name="nama_pembeli" value="<?php echo $data['nama_pembeli']; ?>" autofocus="" required="" />
                    </div>
                    <div>
                        <label>alamat</label>
                        <input type="text" name="alamat_pembeli" value="<?php echo $data['alamat_pembeli']; ?>" autofocus="" required="" />
                    </div>
                    <div>
                        <button type="submit">Simpan Perubahan</button>
                    </div>
                </section>
            </form>
</body>

</html>