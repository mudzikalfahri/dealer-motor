<?php
include('../koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include

?>
<!DOCTYPE html>
<html>

<head>
    <title>Tambah Karyawan</title>

</head>

<body>
    <center>
        <h1>Tambah karyawan</h1>
        <center>
            <form method="POST" action="proses_tambah_karyawan.php" enctype="multipart/form-data">
                <section class="base">
                    <div>
                        <label>Id karyawan</label>
                        <input type="text" name="id_karyawan" autofocus="" required="" />
                    </div>
                    <div>
                        <label>Nama</label>
                        <input type="text" name="nama_karyawan" autofocus="" required="" />
                    </div>
                    <label for="gender_karyawan">Jenis Kelamin:</label>
                    <select name="gender_karyawan" id="color">
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan" selected>Perempuan</option>
                    </select>
                    <div>
                        <button type="submit">Tambah karyawan</button>
                    </div>
                </section>
            </form>
</body>

</html>