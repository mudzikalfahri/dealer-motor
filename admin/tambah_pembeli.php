<?php
include('../koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include

?>
<!DOCTYPE html>
<html>

<head>
    <title>Tambah pembeli</title>

</head>

<body>
    <center>
        <h1>Tambah pembeli</h1>
        <center>
            <form method="POST" action="proses_tambah_pembeli.php" enctype="multipart/form-data">
                <section class="base">
                    <div>
                        <label>Id pembeli</label>
                        <input type="text" name="id_pembeli" autofocus="" required="" />
                    </div>
                    <div>
                        <label>Nama</label>
                        <input type="text" name="nama_pembeli" autofocus="" required="" />
                    </div>
                    <div>
                        <label>Alamat</label>
                        <input type="text" name="alamat_pembeli" autofocus="" required="" />
                    </div>

                    <div>
                        <button type="submit">Tambah pembeli</button>
                    </div>
                </section>
            </form>
</body>

</html>