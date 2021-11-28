<?php
include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include

?>
<html>

<head>
  <title>Katalog</title>
  <style>
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 20px;
    }

    .header ul {
      display: flex;
      justify-content: space-between;
      align-items: center;
      list-style: none;
      gap: 10px 40px;
    }

    #content {
      height: 100vh;
      width: 100%;
    }

    th {
      padding: 10px;
    }

    table {
      border-collapse: collapse;
      width: 60%;
      margin: auto;
      margin-top: 40px;
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

<body>
  <div id="header" class="header">
    <h3>Dealer Motor Wates Jaya</h3>

    <ul>
      <li><a href="admin.php">Login as Admin</a></li>
      <li class="sidebar-pilih"><a href="index.php">Home</a></li>
      <li class="sidebar-pilihan">Katalog</li>
    </ul>
  </div>
  <div id="content">
    <center>
      <form name="form" action="" method="POST">
        <input class="pencarian" type="text" name="filtermotor" placeholder="Cari tipe motor">
        <button class="buttoncari" type="submit">Cari Motor</button>
      </form>
      <table border>
        <thead>
          <tr>
            <th>Tipe motor</th>
            <th>Harga</th>
            <th>Stock</th>
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
          // jalankan query untuk menampilkan semua data diurutkan berdasarkan nomor
          $result = mysqli_query($koneksi, $query);
          //mengecek apakah ada error ketika menjalankan query
          if (!$result) {
            die("Query Error: " . mysqli_errno($koneksi) .
              " - " . mysqli_error($koneksi));
          }

          //buat perulangan untuk element tabel dari data
          $no = 1; //variabel untuk membuat nomor urut

          // hasil query akan disimpan dalam variabel $data dalam bentuk array
          while ($row = mysqli_fetch_assoc($result)) // kemudian dicetak dengan perulangan while
          {
          ?>
            <tr>
              <td><?php echo $row['tipe_motor']; ?></td> <!-- Pemanggilan nama produk -->
              <td>Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></td> <!-- Pemanggilan harga produk -->
              <td><?php echo number_format($row['stok'], 0, ',', '.'); ?></td> <!-- Pemanggilan harga produk -->
            </tr>

          <?php
            $no++; //untuk nomor urut terus bertambah 1
          }
          ?>
        </tbody>
      </table>
  </div>
  <div id="footer">
    <img src="" alt="">
  </div>
</body>

</html>