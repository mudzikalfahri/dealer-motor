<?php
include('../koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include

?>
<!DOCTYPE html>
<html>

<head>
    <title>Tambah Transaksi</title>

</head>

<body>
    <center>
        <h1>Tambah Transaksi</h1>
        <center>
            <form method="POST" action="proses_tambah_transaksi.php" enctype="multipart/form-data">
                <section class="base">
                    <div>
                        <label>Id Motor</label>
                        <input type="text" name="id_motor" autofocus="" required="" />
                    </div>
                    <div>
                        <label>Id Karyawan</label>
                        <input type="text" name="id_karyawan" required="" />
                    </div>
                    <div>
                        <label>Id Pembeli</label>
                        <input type="text" name="id_pembeli" autofocus="" required="" />
                    </div>
                    <div>
                        <button type="submit">Simpan Produk</button>
                    </div>
                </section>
            </form>
</body>

</html>