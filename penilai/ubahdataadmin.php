<?php
include '../koneksi.php';
if(isset($_POST['update'])){

  $SQL = $db->prepare("UPDATE tabel_user SET nama=?,jabatan=?,unit_kerja=?,password=? WHERE nip=? AND status='Admin' ");

  $SQL->bind_param("ssssi",$_POST['nama'],$_POST['jabatan'],$_POST['unit_kerja'],$_POST['password'],$_GET['edit']);

  $SQL->execute();

  header("Location: keloladataadmin.php");

}
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Starter</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../asset_untuk_halaman_admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../asset_untuk_halaman_admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../asset_untuk_halaman_admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../asset_untuk_halaman_admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="../asset_untuk_halaman_admin/dist/css/skins/skin-blue.min.css">

  <link rel="stylesheet" href="../asset_untuk_halaman_admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Admin</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="index.php"><i class="fa fa-link"></i> <span>Kelola Data Akun Pegawai</span></a></li>
        <li class=""><a href="keloladatapegawai.php"><i class="fa fa-link"></i> <span>Kelola Data Pegawai</span></a></li>
        <li class=""><a href="keloladataadmin.php"><i class="fa fa-link"></i> <span>Kelola Data Admin</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Cetak</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Cetak Sasaran Kerja PNS</a></li>
            <li><a href="#">Cetak Penilaian Sasaran Kerja PNS</a></li>
            <li><a href="#">Cetak Prestasi Kerja PNS</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ubah Data Admin
      </h1>
        <form action="" method="POST">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label >Nama</label>
                <input type="text" class="form-control" name="nama" >
              </div>
              <div class="form-group">
                <label >Jabatan</label>
                <select name="jabatan" class="form-control" style="width: 50%;" >
                  <option value="Kepala Bidang APTIKA" >Kepala Bidang APTIKA</option>
                  <option value="Kepala Seksi Tata Kelola & Pemberdayaan TIK" >Kepala Seksi Tata Kelola &amp; Pemberdayaan TIK</option>
                  <option value="Staff Seksi Tata Kelola & Pemberdayaan TIK" >Staff Seksi Tata Kelola &amp; Pemberdayaan TIK</option>
                  <option value="Kepala Seksi Pengembangan Aplikasi" >Kepala Seksi Pengembangan Aplikasi</option>
                  <option value="Staff Seksi Pengembangan Aplikasi" >Staff Seksi Pengembangan Aplikasi</option>
                  <option value="Kepala Seksi Persandian dan Keamanan Informasi" >Kepala Seksi Persandian dan Keamanan Informasi</option>
                  <option value="Staff Seksi Persandian dan Keamanan Informasi" >Staff Seksi Persandian dan Keamanan Informasi</option>
                </select>
              </div>
              <div class="form-group">
                <label>Unit Kerja</label>
                <input type="text" class="form-control" name="unit_kerja" value="Dinas Komunikasi dan Informatika Provinsi Jawa Timur" placeholder="Dinas Komunikasi dan Informatika Provinsi Jawa Timur" readonly="readonly" style="width: 70%;">  
              </div>
              <div class="form-group">
                <label >Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" style="width: 50%;">
              </div>
              <button type="submit" name="update" value="update" class="btn btn-success">Simpan Perubahan</button>
            </div>
          </div>
        </form>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="#">Muhammad Sarwani</a>.</strong> All rights reserved.
  </footer>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="../asset_untuk_halaman_admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../asset_untuk_halaman_admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../asset_untuk_halaman_admin/dist/js/adminlte.min.js"></script>

<!-- DataTables -->

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>