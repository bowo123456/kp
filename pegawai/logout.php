<?php
    session_start();
    unset($_SESSION['login']);
    unset($_SESSION['nama_pegawai']);
    unset($_SESSION['status_pegawai']);
    header("location: /kp/ ");
?>