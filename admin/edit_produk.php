 <?php
  // memanggil file koneksi.php untuk membuat koneksi
  include '../koneksi.php';

  // mengecek apakah di url ada nilai GET id
  // ambil nilai id dari url dan disimpan dalam variabel $id
  $id = $_GET["id"];

  // menampilkan data dari database yang mempunyai id_motor=$id_motor
  $query = "SELECT * FROM produk WHERE id_motor='$id'";
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
     <h1>Edit Produk <?php echo $data['tipe_motor']; ?></h1>
     <center>
       <form method="POST" action="proses_edit.php" enctype="multipart/form-data">
         <section class="base">
           <!-- menampung nilai id produk yang akan di edit -->
           <input name="id_motor" value="<?php echo $data['id_motor']; ?>" hidden />
           <div>
             <label>Tipe Motorr</label>
             <input type="text" name="tipe_motor" value="<?php echo $data['tipe_motor']; ?>" autofocus="" required="" />
           </div>
           <div>
             <label>Stock</label>
             <input type="number" name="stok" required="" value="<?php echo $data['stok']; ?>" autofocus="" required="" />
           </div>
           <div>
             <label>Harga</label>
             <input type="text" name="harga" required="" value="<?php echo $data['harga']; ?> " autofocus="" required="" />
           </div>
           <div>
             <button type="submit">Simpan Perubahan</button>
           </div>
         </section>
       </form>
 </body>

 </html>