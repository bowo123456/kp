<?php
include "../koneksi.php";
  session_start();
  if(isset($_GET['hapus'])){
  $id=$_GET['hapus'];
  $sql = "DELETE FROM tabel_pegawai WHERE nip='$id'";

    if ($db->query($sql) === TRUE) {
      header("location: keloladatapegawai.php");
    }
    else {
      echo "Error deleting record: " . $db->error;
    }
  }

  if(isset($_POST['btn_simpan'])){
    include '../koneksi.php';

    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $pangkat_golongan = $_POST['pangkat_golongan'];
    $jabatan = $_POST['jabatan'];
    $unit_kerja = $_POST['unit_kerja'];
    $status = $_POST['status'];

    $sql1 = "SELECT nip FROM tabel_pegawai WHERE nip='$nip'";

    if (!$result=$db->query($sql1)){
      die('sql salah [' . $db->error . ']');
    } else {
      if ($result->num_rows>0){
        echo "<SCRIPT type='text/javascript'> //not showing me this
      alert('NIP sudah terdaftar !');
      window.location.replace(\"keloladatapegawai.php\");
      </SCRIPT>";
      } else{
        $sql = "INSERT INTO tabel_pegawai (nip, nama, pangkat_golongan, jabatan, unit_kerja, status)
        VALUES ('$nip','$nama','$pangkat_golongan','$jabatan','$unit_kerja','$status')";

        if ($db->query($sql) === TRUE) {
            header("location: keloladatapegawai.php");
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }
      }
    }
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
  <title>Kelola Data Pegawai | Admin</title>
  <!-- Tell the browser to be responsive to screen width -->

  <link rel="shorcut icon" href="../icon.ico">
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
        <li class=""><a href="index.php"><i class="fa fa-link"></i> <span>Kelola Data Akun Pegawai</span></a></li>
        <li class="active"><a href="keloladatapegawai.php"><i class="fa fa-link"></i> <span>Kelola Data Pegawai</span></a></li>
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
        Tabel Data Pegawai
      </h1>
    </section>

    <!-- Main content -->

    <section class="content container-fluid">
        <div class="box">
            <div class="box-header">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i>&nbsp;Tambah</button>
            </div>

            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Data Pegawai</h4>
                    </div>
                    <div class="modal-body">


                    <form action="" method="POST">
                      <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                  <label >NIP</label>
                  <input type="text" class="form-control" name="nip" placeholder="Masukkan NIP" style="width: 60%;" maxlength="18" minlength="18" required>
                </div>
                <div class="form-group">
                  <label >Nama</label>
                  <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" required>
                </div>
                <div class="form-group">
                  <label >Pangkat/Gol. Ruang</label>
                  <select name="pangkat_golongan" class="form-control" style="width: 85%;" REQUIRED>
                    <option value="" >- Pilih Pangkat/Gol. Ruang -</option>
                    <option value="Pembina Utama / (IV/e)" >Pembina Utama / (IV/e)</option>
                    <option value="Pembina Utama Madya / (IV/d)" >Pembina Utama Madya / (IV/d)</option>
                    <option value="Pembina Utama Muda / (IV/c)" >Pembina Utama Muda / (IV/c)</option>
                    <option value="Pembina Tingkat I / (IV/b)" >Pembina Tingkat I / (IV/b)</option>
                    <option value="Pembina / (IV/a)" >Pembina / (IV/a)</option>
                    <option value="Penata Tingkat I / (III/d)" >Penata Tingkat I / (III/d)</option>
                    <option value="Penata / (III/c)" >Penata / (III/c)</option>
                    <option value="Penata Muda Tingkat I / (III/b)" >Penata Muda Tingkat I / (III/b)</option>
                    <option value="Penata Muda / (III/a)" >Penata Muda / (III/a)</option>
                    <option value="Pengatur Tingkat I / (II/d)" >Pengatur Tingkat I / (II/d)</option>
                    <option value="Pengatur / (II/c)" >Pengatur / (II/c)</option>
                    <option value="Pengatur Muda Tingkat I / (II/b)" >Pengatur Muda Tingkat I / (II/b)</option>
                    <option value="Pengatur Muda / (II/a)" >Pengatur Muda / (II/a)</option>
                    <option value="Juru Tingkat I / (I/d)" >Juru Tingkat I / (I/d)</option>
                    <option value="Juru / (I/c)" >Juru / (I/c)</option>
                    <option value="Juru Muda Tingkat I / (I/b)" >Juru Muda Tingkat I / (I/b)</option>
                    <option value="Juru Muda / (I/a)" >Juru Muda / (I/a)</option>
                  </select>
                </div>
                <div class="form-group">
                  <label >Jabatan</label>
                  <select name="jabatan" class="form-control" style="width: 130%;" required>
                    <option value="" >- Pilih Jabatan -</option>
                    <option value="Kepala Bidang APTIKA" >Kepala Bidang APTIKA</option>
                    <option value="Kepala Seksi Tata Kelola & Pemberdayaan TIK" >Kepala Seksi Tata Kelola & Pemberdayaan TIK</option>
                    <option value="Staff Seksi Tata Kelola & Pemberdayaan TIK" >Staff Seksi Tata Kelola & Pemberdayaan TIK</option>
                    <option value="Kepala Seksi Pengembangan Aplikasi" >Kepala Seksi Pengembangan Aplikasi</option>
                    <option value="Staff Seksi Pengembangan Aplikasi" >Staff Seksi Pengembangan Aplikasi</option>
                    <option value="Kepala Seksi Persandian dan Keamanan Informasi" >Kepala Seksi Persandian dan Keamanan Informasi</option>
                    <option value="Staff Seksi Persandian dan Keamanan Informasi" >Staff Seksi Persandian dan Keamanan Informasi</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Unit Kerja</label>
                  <input type="text" class="form-control" name="unit_kerja" value="Dinas Komunikasi dan Informatika Provinsi Jawa Timur" placeholder="Dinas Komunikasi dan Informatika Provinsi Jawa Timur" readonly="readonly" style="width: 130%;">
                </div>
                <div class="form-group">
                  <label >Status</label>
                  <select name="status" class="form-control" style="width: 65%;" required>
                    <option value="" >- Pilih Status -</option>
                    <option value="Pegawai Yang Dinilai" >Pegawai Yang Dinilai</option>
                    <option value="Pejabat Penilai" >Pejabat Penilai</option>
                  </select>
                </div>
                      </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-success pull-left" name="btn_simpan" >Simpan</button>
                    </div>
                    </form>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="example1_length"></div></div><div class="col-sm-6"><div id="example1_filter" class="dataTables_filter"></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                  <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 120px;">NIP</th>
                  <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">Nama</th>
                  <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 156px;">Pangkat/Gol. Ruang</th>
                  <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 156px;">Jabatan</th>
                  <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 156px;">Unit Kerja</th>
                  <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 156px;">Aksi</th>
                </thead>
                <tbody>

              <?php
                include "../koneksi.php";
                $sql = "SELECT * FROM tabel_pegawai WHERE STATUS NOT LIKE 'Admin'";
                $result = $db->query($sql);

                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {

              ?>
                <tr role="row" class="odd">
                  <td><?php echo $row['NIP']; ?></td>
                  <td><?php echo $row['NAMA']; ?></td>
                  <td><?php echo $row['PANGKAT_GOLONGAN']; ?></td>
                  <td><?php echo $row['JABATAN']; ?></td>
                  <td><?php echo $row['UNIT_KERJA']; ?></td>
                  <td>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default<?php echo $row['NIP']; ?>"><i class="fa fa-edit"></i>&nbsp;Ubah</button>
                    <a href="keloladatapegawai.php?hapus=<?php echo $row['NIP']?>"  type="button" class="btn btn-danger"><i class="fa fa-trash"></i>&nbsp;Hapus</a>
                    <?php
                      include ('formubahdatapegawai.php');
                    ?>
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
