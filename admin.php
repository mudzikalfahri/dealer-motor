<!DOCTYPE html>
<html>

<head>
  <title>Login Admin</title>

  <style>
    .login-square {
      margin: auto;
      margin-top: 100px;
      width: max-content;
      padding: 50px 80px;
      max-width: 400px;
      border: 1px solid black;
      border-radius: 10px;
      background-color: rgba(255, 255, 255, 0.9);
    }

    body {
      background-repeat: no-repeat;
      background-size: cover;
      background-image: url("https://i.pinimg.com/originals/7b/60/77/7b6077badb73229ed02549b0e568e888.jpg");
    }

    .input {
      padding: 12px 20px;
      background-color: white;
      border: none;
      width: 100%;
      outline: none;
      margin: 10px 0;
    }

    button {
      width: 80%;
      margin-top: 20px;
      padding: 8px 16px;
      background-color: black;
      color: white;
    }

    .title {
      text-align: center;
    }

    .gagal {
      background-color: white;
      margin: auto;
      width: max-content;
      padding: 10px 20px;
    }
  </style>

</head>

<body>
  <!-- cek pesan notifikasi -->
  <?php
  if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == "gagal") {
      echo "<div class='gagal'>Login gagal! username dan password salah!</div>";
    } else if ($_GET['pesan'] == "logout") {
      echo "<div class='gagal'>Anda telah berhasil logout</div>";
    } else if ($_GET['pesan'] == "belum_login") {
      echo "<div class='gagal'>Anda harus login untuk mengakses halaman admin</div>";
    }
  }
  ?>
  <div class="login-square">
    <h1 class="title">Dealer Motor Wates Jaya</h1>
    <a href="index.php">Ke halaman utama</a>
    <h2>Admin login</h2>
    <form method="post" action="cek_login.php">
      <label><b>Username</b></label>
      <input class="input" type="text" name="username" placeholder="Masukkan username">
      <label><b>Password</b></label>
      <input class="input" type="password" name="password" placeholder="Masukkan password">
      <button class="tombollogin" type="submit" value="LOGIN">LOGIN</button>
      </table>
    </form>
  </div>
</body>

</html>