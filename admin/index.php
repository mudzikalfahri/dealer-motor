<?php
include('../koneksi.php'); //memanggil file koneksi ke database

?>

<html>

<head>
   <title>Data Motor</title>
   <style>
      body {
         padding-bottom: 100px;
      }

      th {
         padding: 10px;
      }

      table {
         border-collapse: collapse;
         width: 60%;
      }

      thead {
         background-color: rgba(0, 0, 0, 0.9);
         color: white;
      }

      tbody {
         background-color: white;
         color: black;
      }

      td {
         padding: 10px;
      }

      .button {
         width: 20%;
         margin-top: 20px;
         padding: 8px 16px;
         background-color: black;
         color: white;
      }

      h1 {
         margin-top: 60px;
      }

      .hero {
         height: 250px;
         width: 100%;
         margin-top: 40px;
         background-image: url("../assets/hero.jpg");
         background-size: cover;
      }

      #sidebar {
         width: 100%;
         display: flex;
         justify-content: space-between;
         align-items: center;
      }

      .pencarian {
         padding: 10px 15px;
      }

      .buttoncari {
         padding: 10px 15px;
         border: 1px solid black;
         background-color: black;
         color: white;

      }
   </style>
</head>
<?php
session_start();
if ($_SESSION['status'] != "login") {
   header("location:http://localhost/dealer/admin.php?pesan=belum_login");
}
?>

<body>
   <div id="sidebar">
      <div class="">Selamat datang, <?php echo $_SESSION['username'] ?></div>
      <a class="button" href="logout.php">Logout</a>
   </div>
   <div class="hero"></div>
   <div id="content">
      <center>
         <h1>Data Motor</h1>
         <center>
            <form name="form" action="" method="POST">
               <input class="pencarian" type="text" name="filtermotor" placeholder="Cari tipe motor">
               <button class="buttoncari" type="submit">Cari Motor</button>
            </form>
            <br />
            <a href="tambah_produk.php">Tambah Produk</a>
            <center>
               <table border>

                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Tipe</th>
                        <th>Stock</th>

                        <th>Harga</th>
                        <th>Id</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php

                     $filterproduk = "" . "%";
                     if (isset($_POST['filtermotor'])) {
                        $filterproduk = "%" . $_POST['filtermotor'] . "%";
                     }
                     // jalankan query untuk menampilkan semua data diurutkan berdasarkan nomor
                     $query = "SELECT * FROM produk WHERE tipe_motor LIKE '$filterproduk' ORDER BY id_motor ASC";
                     $result = mysqli_query($koneksi, $query);
                     //mengecek apakah ada error ketika menjalankan query
                     if (!$result) {
                        die("Query Error: " . mysqli_errno($koneksi) .
                           " - " . mysqli_error($koneksi));
                     }

                     //buat perulangan untuk element tabel dari data
                     $no = 1; //variabel untuk membuat nomor urut
                     // hasil query akan disimpan dalam variabel $data dalam bentuk array
                     // kemudian dicetak dengan perulangan while
                     while ($row = mysqli_fetch_assoc($result)) {
                     ?>
                        <tr>
                           <td><?php echo $no; ?></td>
                           <td><?php echo $row['tipe_motor']; ?></td>
                           <td><?php echo number_format($row['stok'], 0, ',', '.'); ?></td>
                           <td>Rp. <?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
                           <td><?php echo number_format($row['id_motor'], 0, ',', '.'); ?></td>
                           <td>
                              <a href="edit_produk.php?id=<?php echo $row['id_motor']; ?>">Edit</a> |
                              <a href="proses_hapus.php?id=<?php echo $row['id_motor']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                           </td>
                        </tr>

                     <?php
                        $no++; //untuk nomor urut terus bertambah 1
                     }
                     ?>
                  </tbody>
               </table>
               <center>
                  <h1>Data Karyawan</h1>
                  <center>
                     <br />
                     <a href="tambah_karyawan.php">Tambah Karyawan</a>
                     <center>
                        <table border>
                           <thead>
                              <tr>
                                 <th>No</th>
                                 <th>Nama</th>
                                 <th>Gender</th>
                                 <th>Id</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              // jalankan query untuk menampilkan semua data diurutkan berdasarkan nomor
                              $query = "SELECT * FROM karyawan ORDER BY id_karyawan ASC";
                              $result = mysqli_query($koneksi, $query);
                              //mengecek apakah ada error ketika menjalankan query
                              if (!$result) {
                                 die("Query Error: " . mysqli_errno($koneksi) .
                                    " - " . mysqli_error($koneksi));
                              }

                              //buat perulangan untuk element tabel dari data
                              $no = 1; //variabel untuk membuat nomor urut
                              // hasil query akan disimpan dalam variabel $data dalam bentuk array
                              // kemudian dicetak dengan perulangan while
                              while ($row = mysqli_fetch_assoc($result)) {
                              ?>
                                 <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row['nama_karyawan']; ?></td>
                                    <td><?php echo $row['gender_karyawan']; ?></td>
                                    <td><?php echo number_format($row['id_karyawan'], 0, ',', '.'); ?></td>
                                    <td>
                                       <a href="edit_karyawan.php?id=<?php echo $row['id_karyawan']; ?>">Edit</a> |
                                       <a href="proses_hapus_karyawan.php?id=<?php echo $row['id_karyawan']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                                    </td>
                                 </tr>

                              <?php
                                 $no++; //untuk nomor urut terus bertambah 1
                              }
                              ?>
                           </tbody>
                        </table>
                        <center>
                           <h1>Data Pembeli</h1>
                           <center>
                              <br />
                              <a href="tambah_pembeli.php">Tambah Data Pembeli</a>
                              <center>
                                 <table border>
                                    <thead>
                                       <tr>
                                          <th>No</th>
                                          <th>Nama</th>
                                          <th>Alamat</th>
                                          <th>Id</th>
                                          <th>Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                       // jalankan query untuk menampilkan semua data diurutkan berdasarkan nomor
                                       $query = "SELECT * FROM pembeli ORDER BY id_pembeli ASC";
                                       $result = mysqli_query($koneksi, $query);
                                       //mengecek apakah ada error ketika menjalankan query
                                       if (!$result) {
                                          die("Query Error: " . mysqli_errno($koneksi) .
                                             " - " . mysqli_error($koneksi));
                                       }

                                       //buat perulangan untuk element tabel dari data
                                       $no = 1; //variabel untuk membuat nomor urut
                                       // hasil query akan disimpan dalam variabel $data dalam bentuk array
                                       // kemudian dicetak dengan perulangan while
                                       while ($row = mysqli_fetch_assoc($result)) {
                                       ?>
                                          <tr>
                                             <td><?php echo $no; ?></td>
                                             <td><?php echo $row['nama_pembeli']; ?></td>
                                             <td><?php echo $row['alamat_pembeli']; ?></td>
                                             <td><?php echo number_format($row['id_pembeli'], 0, ',', '.'); ?></td>
                                             <td>
                                                <a href="edit_pembeli.php?id=<?php echo $row['id_pembeli']; ?>">Edit</a> |
                                                <a href="proses_hapus_pembeli.php?id=<?php echo $row['id_pembeli']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                                             </td>
                                          </tr>

                                       <?php
                                          $no++; //untuk nomor urut terus bertambah 1
                                       }
                                       ?>
                                    </tbody>
                                 </table>
                                 <center>
                                    <h1>Transaksi List</h1>
                                    <center>
                                       <br />
                                       <a href="tambah_transaksi.php">Tambah Transaksi</a>
                                       <table class="transaksi" border>
                                          <thead>
                                             <tr>
                                                <th>No</th>
                                                <th>Pembeli</th>
                                                <th>Alamat</th>
                                                <th>Tipe Motor</th>
                                                <th>Harga</th>
                                                <th>Karyawan</th>
                                                <th>Tanggal beli</th>
                                                <th>Action</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?php
                                             // jalankan query untuk menampilkan semua data diurutkan berdasarkan nomor
                                             $query = "SELECT * FROM transaksi_penjualan ORDER BY tgl_beli  ASC";
                                             $result = mysqli_query($koneksi, $query);
                                             //mengecek apakah ada error ketika menjalankan query
                                             if (!$result) {
                                                die("Query Error: " . mysqli_errno($koneksi) .
                                                   " - " . mysqli_error($koneksi));
                                             }

                                             //buat perulangan untuk element tabel dari data
                                             $no = 1; //variabel untuk membuat nomor urut
                                             // hasil query akan disimpan dalam variabel $data dalam bentuk array
                                             // kemudian dicetak dengan perulangan while
                                             while ($row = mysqli_fetch_assoc($result)) {
                                             ?>
                                                <tr>
                                                   <td><?php echo $no; ?></td>
                                                   <td><?php echo $row['nama_pembeli']; ?></td>
                                                   <td><?php echo $row['alamat_pembeli']; ?></td>
                                                   <td><?php echo $row['tipe_motor']; ?></td>
                                                   <td>Rp. <?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
                                                   <td><?php echo $row['nama_karyawan']; ?></td>
                                                   <td><?php echo $row['tgl_beli']; ?></td>
                                                   <td>
                                                      <a href="edit_transaksi.php?id=<?php echo $row['id_transaksi']; ?>">Edit</a> |
                                                      <a href="proses_hapus_transaksi.php?id=<?php echo $row['id_transaksi']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                                                   </td>
                                                </tr>

                                             <?php
                                                $no++; //untuk nomor urut terus bertambah 1
                                             }
                                             ?>
                                          </tbody>
                                       </table>
   </div>
</body>

</html>