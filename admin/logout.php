<?php
    session_start();
    unset($_SESSION['login']);
    unset($_SESSION['nama_admin']);
    unset($_SESSION['status_admin']);
    header("location: /kp/index.php ");
?>