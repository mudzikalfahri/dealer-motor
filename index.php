<?php
include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include

?>
<html>

<head>
    <title>Home</title>
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
            position: relative;
            height: 100vh;
            width: 100%;
            background-image: url("./assets/hero.jpg");
            background-size: cover;
        }

        .herotitle {
            background-color: white;
            color: red;
            font-size: 46px;
            position: absolute;
            top: 160px;
            text-align: center;
            width: 100%;
            padding: 20px 0;
        }
    </style>
</head>

<body>
    <div id="header" class="header">
        <h3>Dealer Motor Wates Jaya</h3>

        <ul>
            <li><a href="admin.php">Login as Admin</a></li>
            <li class="sidebar-pilih">Home</li>
            <li class="sidebar-pilihan"><a href="katalog.php">Katalog</a></li>
        </ul>
    </div>
    <div id="content">
        <h1 class="herotitle">DEALER NO 1 DI WATES, MANTAP BOS!</h1>
    </div>
</body>

</html>