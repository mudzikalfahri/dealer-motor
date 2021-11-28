<?php
include('../koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include

?>
<!DOCTYPE html>
<html>

<head>
  <title>Tambah Produk</title>

</head>

<body>
  <center>
    <h1>Tambah Produk</h1>
    <center>
      <form method="POST" action="proses_tambah.php" enctype="multipart/form-data">
        <section class="base">
          <div>
            <label>Id Motor</label>
            <input type="text" name="id_motor" autofocus="" required="" />
          </div>
          <div>
            <label>Tipe Motor</label>
            <input type="text" name="tipe_motor" autofocus="" required="" />
          </div>
          <div>
            <label>Stock</label>
            <input type="number" name="stok" required="" />
          </div>
          <div>
            <label>Harga</label>
            <input type="text" name="harga" required="" />
          </div>
          <div>
            <button type="submit">Simpan Produk</button>
          </div>
        </section>
      </form>
</body>

</html>