<?php
	session_start();
    unset($_SESSION['login']);
    unset($_SESSION['nama_pejabat']);
    unset($_SESSION['status_pejabat']);
    header("location: /kp/ ");
?>