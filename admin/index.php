<?php
include "../koneksi.php";
  session_start();

  if(isset($_GET['hapus'])){
  $id=$_GET['hapus'];
  $SQL = $db->prepare("UPDATE tabel_pegawai SET password=? WHERE nip=?");
  $pass=null;
  $SQL->bind_param("si",$pass,$id);

  $SQL->execute();
  header("Location: index.php");
  }

  if(isset($_POST['update'])){

    $SQL = $db->prepare("UPDATE tabel_pegawai SET password=? WHERE nip=?");

    $SQL->bind_param("si",$_POST['password'],$_POST['nip']);

    $SQL->execute();
    // echo "hhh";
    header("Location: index.php");
  }

  if(isset($_POST['update2'])){

    $SQL = $db->prepare("UPDATE tabel_pegawai SET password=? WHERE nip=?");

    $SQL->bind_param("si",$_POST['password'],$_POST['nip']);

    $SQL->execute();
    header("Location: index.php");
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
  <title>Kelola Data Akun Pegawai</title>

  <link rel="shorcut icon" href="../icon.ico">
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
    <a href="index.php" class="logo">
      <!-- logo for regular state and mobile devices -->
      <span class="logo-mini">KP</span>
      <span class="logo-lg">DINKOMINFO JATIM</span>
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

            <a class="" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs fa fa-user"> <?php echo $_SESSION['status_admin']; ?> : <?php echo $_SESSION['nama_admin']; ?></span>
            </a>

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
        <li class=""><a href="kelolajabatan.php"><i class="fa fa-link"></i> <span>Kelola Relasi Pegawai</span></a></li>
        <li class=""><a href="keloladataadmin.php"><i class="fa fa-link"></i> <span>Kelola Data Admin</span></a></li>
        <li class=""><a href="logout.php"><i class="fa fa-sign-out"></i> <span>Keluar</span></a></li>
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
        Tabel Data Akun Pegawai
      </h1>
    </section>

    <!-- Main content -->

    <section class="content container-fluid">
        <div class="box">
            <div class="box-header">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Tambah</button>

              <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Data Akun Pegawai</h4>
                    </div>
                    <div class="modal-body">

                    <form action="" method="POST">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label >NIP</label>
                            <select name="nip" class="form-control" style="width: 180%;">
                              <option>- Pilih Pegawai -</option>
                              <?php
                                include "../koneksi.php";
                                $sql = "SELECT * FROM tabel_pegawai WHERE status NOT LIKE 'Admin' and password is null";
                                $result = $db->query($sql);

                                if ($result->num_rows > 0) {
                                  while($row = $result->fetch_assoc()) {

                              ?>
                                <option value="<?php echo $row['NIP'];?>"><?php echo $row['NIP']."||".$row['NAMA'];?></option>
                              <?php
                                  }
                                }?>

                            </select>
                          </div>

                          <div class="form-group">
                            <label >Password</label>
                              <input type="password" name="password" class="form-control" placeholder="Password" minlength="8" maxlength="16">
                          </div>
                      </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-success pull-left" name="update" value="update" >Simpan</button>
                    </div>
                    </form>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="example1_length"></div></div><div class="col-sm-6"><div id="example1_filter" class="dataTables_filter"></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                  <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 182px;">NIP</th>
                  <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">Nama</th>
                  <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 156px;">Password</th>
                  <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 156px;">Aksi</th>
                </thead>
                <tbody>

              <?php
                include "../koneksi.php";
                $sql = "SELECT * FROM tabel_pegawai WHERE status NOT LIKE 'Admin' and password is not null";
                $result = $db->query($sql);

                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {

              ?>
                <tr role="row" class="odd">
                  <td><?php echo $row['NIP']; ?></td>
                  <td><?php echo $row['NAMA']; ?></td>
                  <td><?php echo $row['PASSWORD']; ?></td>
                  <td>
                  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default<?php echo $row['NIP']; ?>"><i class="fa fa-edit"></i>&nbsp;Ubah</button>
                      <a href="index.php?hapus=<?php echo $row['NIP']?>"  type="button" class="btn btn-danger"><i class="fa fa-trash"></i>&nbsp;Hapus</a>

                      <div class="modal fade" id="modal-default<?php echo $row['NIP']; ?>">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Ubah Data Akun Pegawai</h4>
                    </div>
                    <div class="modal-body">

                    <form action="index.php" method="POST">
                    <input type="hidden" name="nip" value="<?php echo $row['NIP']?>"></input>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label >NIP</label><br>
                            <input type="text" name="nip" class="form-control" value="<?php echo $row['NIP']?>" disabled></input><br><br>
                          </div>

                          <div class="form-group">
                            <label >Password</label><br>
                            <input type="password" name="password" class="form-control" placeholder="Password" minlength="8" maxlength="16"></input><br>
                          </div>
                      </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-success pull-left" name="update2" value="update" >Simpan</button>
                    </div>
                    </form>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->


                  </td>
                </tr>
                <?php
                  }
                }
                ?>
              </table></div></div><div class="row"><div class="col-sm-5"><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"></div></div></div></div>
            </div>
            <!-- /.box-body -->
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

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
