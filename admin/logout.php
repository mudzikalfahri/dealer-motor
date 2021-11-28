<?php
// mengaktifkan session
session_start();

// mengaktifkan semua session
session_destroy();

// mengalihkan halaman sambil mengirim pesan logout
header("location:../admin.php?pesan=logout");
?>