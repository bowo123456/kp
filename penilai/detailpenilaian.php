<?php
include "../koneksi.php";
session_start();

if(isset($_GET['btn_simpan'])){
  include '../koneksi.php';

  $nip = $_GET['nip'];
  $nama_tugas_tambahan = $_GET['nama_tugas_tambahan'];

  $sql = "INSERT INTO tabel_tugas_tambahan (nip, nama_tugas_tambahan,nilai_tugas_tambahan)
        VALUES ('$nip','$nama_tugas_tambahan',0)";

  if ($db->query($sql) === TRUE) {
    header("Location: detailpenilaian.php?id=".$nip);
  } else {
    echo "Error updating record: " . $$db->error;
  }


}

if(isset($_GET['simpan'])){
  if(isset($_GET['ubah'])){
    $panjang =  $_GET['panjang'];
    $nip = $_GET['nip'];

    for ($i=0; $i <$panjang  ; $i++) {
      $ID_TARGET = $_GET['ID_TARGET'][$i];
      $RKUANTITAS=$_GET['RKUANTITAS'][$i];
      $RKUALITAS=$_GET['RKUALITAS'][$i];
      $RWAKTU=$_GET['RWAKTU'][$i];
      $RBIAYA=$_GET['RBIAYA'][$i];

      $sql = "UPDATE tabel_nilai_realisasi_skp SET RKUANTITAS=$RKUANTITAS,RKUALITAS=$RKUALITAS,RWAKTU=$RWAKTU,RBIAYA=$RBIAYA WHERE ID_TARGET=$ID_TARGET";

      if ($db->query($sql) === TRUE) {
        header("Location: detailpenilaian.php?id=".$nip);
      } else {
          echo "Error updating record: " . $db->error;
        }
      }
    } else {
      $panjang =  $_GET['panjang'];
      $nip = $_GET['nip'];

      for ($i=0; $i <$panjang ; $i++) {
      $ID_TARGET = $_GET['ID_TARGET'][$i];
      $RKUANTITAS=$_GET['RKUANTITAS'][$i];
      $RKUALITAS=$_GET['RKUALITAS'][$i];
      $RWAKTU=$_GET['RWAKTU'][$i];
      $RBIAYA=$_GET['RBIAYA'][$i];

      $sql = "INSERT INTO tabel_nilai_realisasi_skp (ID_TARGET,RKUANTITAS,RKUALITAS,RWAKTU,RBIAYA ) VALUES ($ID_TARGET,$RKUANTITAS,$RKUALITAS,$RWAKTU,$RBIAYA)  ";

        if ($db->query($sql) === TRUE) {
          header("Location: detailpenilaian.php?id=".$nip);
        } else {
          echo "Error updating record: " . $$db->error;
        }
      }
    }
  }

  if(isset($_GET['simpan1'])){
  $panjang = $_GET['panjang'];
  $nip = $_GET['nip'];


    for ($i=0; $i <$panjang ; $i++) {
      $id = $_GET['id_tugas_tambahan'][$i];
      $nilai_tugas_tambahan = $_GET['nilai_tugas_tambahan'][$i];

      $sql = "UPDATE tabel_tugas_tambahan SET nilai_tugas_tambahan=$nilai_tugas_tambahan WHERE id_tugas_tambahan=$id";
      if ($db->query($sql) === TRUE) {
        header("Location: detailpenilaian.php?id=".$nip);
      } else {
          echo "Error updating record: " . $db->error;
        }

      }
  }

  if(isset($_GET['hapus'])){
    $id=$_GET['hapus'];
    $nip = $_GET['nip'];
    $sql = "DELETE FROM tabel_tugas_tambahan WHERE id_tugas_tambahan='$id'";

      if ($db->query($sql) === TRUE) {
        header("location: detailpenilaian.php?id=".$nip);
      }
      else {
        echo "Error deleting record: " . $db->error;
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
  <title>Detail Penilaian Capaian Sasaran Kerja</title>
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
      <!-- mini logo for sidebar mini 50x50 pixels -->
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
              <span class="hidden-xs fa fa-user">&nbsp;<?php
              echo $_SESSION['status_pejabat']; ?> : <?php echo $_SESSION['nama_pejabat']; ?></span>
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
        <li class=""><a href="index.php"><i class="fa fa-link"></i> <span>Data SKP Pegawai</span></a></li>
        <li class="active"><a href="penilaian.php"><i class="fa fa-link"></i> <span>Penilaian Capaian Sasaran Kerja</span></a></li>
        <li class=""><a href="logout.php"><i class="fa fa-sign-out"></i> <span>Keluar</span></a></li>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Penilaian Capaian Sasaran Kerja
      </h1>
    </section>

    <!-- Main content -->
    <?php
      $nip = $_GET['id'];
      include "../koneksi.php";
      $sql = "SELECT * FROM tabel_target_skp
      JOIN tabel_pegawai
      ON tabel_target_skp.NIP=tabel_pegawai.NIP";
      $result = $db->query($sql);
      $row = mysqli_fetch_assoc($result);
    ?>
    <section class="content container-fluid">
        <div class="box">

            <!-- /.box-header -->
            <div class="box-header">
              <label >NIP</label>
                  <input type="text" class="form-control" name="nip" value="<?php echo $row['NIP']; ?>" style="width: 30%;" disabled>
                  <br>
                  <label >Nama</label>
                  <input type="text" class="form-control" name="nama" value="<?php echo $row['NAMA']; ?>" style="width: 30%;" disabled>
            </div>

            <!-- /.box-body -->
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap content container-fluid"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="example1_length"></div></div><div class="col-sm-6"><div id="example1_filter" class="dataTables_filter"></div></div></div><div class="row"><div class="col-sm-12">
              <form action="detailpenilaian.php" method="GET">


            <input type="hidden" name="nip" value="<?php echo $row['NIP']; ?>">


              <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;Simpan</button>
              <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row" style="text-align:center;">
                  <th rowspan="2" colspan="1" style="width: 50px; text-align:center;">No.</th>
                  <th rowspan="2" colspan="1" style="width: 224px; text-align:center;">Kegiatan Tugas Jabatan</th>
                  <th rowspan="2" colspan="1" style="width: 40px; text-align:center;">Kuantitas</th>
                  <th rowspan="2" colspan="1" style="width: 40px; text-align:center;">Output</th>
                  <th rowspan="2" colspan="1" style="width: 40px; text-align:center;">Kualitas</th>
                  <th rowspan="2" colspan="1" style="width: 40px; text-align:center;">Waktu</th>
                  <th rowspan="2" colspan="1" style="width: 40px; text-align:center;">Biaya</th>
                  <th rowspan="1" colspan="4" style="width: 156px; text-align:center;">Realisasi</th>
                  </tr>
                <tr role="row">
                  <th style="width: 40px; text-align:center;">Kualitas</th>
                  <th style="width: 40px; text-align:center;">Kuantitas</th>
                  <th style="width: 40px; text-align:center;">Waktu</th>
                  <th style="width: 40px; text-align:center;">Biaya</th>
                  </tr>
                </thead>
                <tbody>

              <?php
                $no = 1;
                include "../koneksi.php";
                $sql = "SELECT
                tabel_target_skp.NIP,
                tabel_target_skp.KUANTITAS,
                tabel_target_skp.KUALITAS,
                tabel_target_skp.BIAYA,
                tabel_target_skp.WAKTU,
                tabel_target_skp.KEGIATAN_TUGAS_JABATAN,
                nrs.RKUANTITAS,
                nrs.RKUALITAS,
                nrs.RBIAYA,
                nrs.RWAKTU,
                tabel_target_skp.OUTPUT,
                tabel_target_skp.ID_TARGET


                FROM tabel_target_skp
                JOIN tabel_pegawai
                ON tabel_target_skp.NIP=tabel_pegawai.NIP
                left JOIN tabel_nilai_realisasi_skp as nrs
                ON tabel_target_skp.ID_TARGET=nrs.ID_TARGET
                WHERE tabel_target_skp.STATUS like 'Konfirmasi' ";
                $result = $db->query($sql);

                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {

             if(isset($row['RKUANTITAS'])){

              echo '  <input type="hidden" name="ubah" value="OK" >';

            }
              ?>
                <tr role="row" class="odd">
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $row['KEGIATAN_TUGAS_JABATAN']; ?></td>
                  <td><?php echo $row['KUANTITAS']; ?></td>
                  <td><?php echo $row['OUTPUT']; ?></td>
                  <td><?php echo $row['KUALITAS']; ?></td>
                  <td><?php echo $row['WAKTU']; ?></td>
                  <td><?php echo $row['BIAYA']; ?></td>
                  <td>
                  <input type="hidden" name="ID_TARGET[]" value="<?php echo $row['ID_TARGET'] ?>" >
                  <input type="number" class="form-control" required="" value="<?php if(isset($row['RKUANTITAS'])){ echo $row['RKUANTITAS']; }?>" name="RKUANTITAS[]" style="width: 100%;" min=-1></input>
                  </td>
                  <td>
                    <input type="number" class="form-control" required="" value="<?php if(isset($row['RKUALITAS'])) echo $row['RKUALITAS']; ?>" name="RKUALITAS[]" style="width: 100%;" min=-1></input>
                  </td>
                  <td>
                  <input type="number" class="form-control" required="" value="<?php  if(isset($row['RWAKTU'])) echo $row['RWAKTU'];  ?>" name="RWAKTU[]" style="width: 100%;" min=-1></input>
                  </td>
                  <td>
                  <input type="number" class="form-control" required="" value="<?php  if(isset($row['RBIAYA'])) echo $row['RBIAYA'];  ?>" name="RBIAYA[]" style="width: 100%;" min=-1></input>
                  </td>
                </tr>
                <?php
                  }
                }
                ?>
              </table></div></div><div class="row"><div class="col-sm-5"><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"></div></div></div></div>
                <input type="hidden" name="panjang" value="<?php echo $result->num_rows; ?>" />
              </form>

                <h2>TUGAS TAMBAHAN DAN KREATIVITAS/UNSUR PENUNJANG</h2>
              <form action="detailpenilaian.php" method="GET">
            <input type="hidden" name="nip" value="<?php echo $_GET['id']; ?>">

              <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah</h4>
                    </div>
                    <div class="modal-body">
                    <form action="" method="POST">
                      <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                          <label>Nama*</label>
                          <textarea rows="3" class="form-control" name="nama_tugas_tambahan" placeholder="Masukkan Nama Tugas Tambahan atau Kreativitas/Unsur Penunjang" required  style="width: 120%;"></textarea>
                          <br><small>*) Ketik "Kreativitas" jika ingin mengisi nilai Kreativitas</small>
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
            <form action="detailpenilaian.php" method="GET">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i>&nbsp;Tambah</button>
            <button type="submit" name="simpan1" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;Simpan</button>
              <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info" style="width: 80%; ">
                <thead>
                <tr role="row" style="text-align:center;">
                  <th rowspan="2" colspan="1" style="width: 50px; text-align:center;">No.</th>
                  <th rowspan="2" colspan="1" style="width: 450px; text-align:center;">Nama Tugas Tambahan</th>
                  <th rowspan="2" colspan="1" style="width: 100px; text-align:center;">Nilai</th>
                  <th rowspan="2" colspan="1" style=" text-align:center;">Aksi</th>
                  </tr>
                </thead>
                <tbody>

              <?php
                $no = 1;
                include "../koneksi.php";
                $nip = $_GET['id'];
                $sql = "SELECT * FROM tabel_tugas_tambahan WHERE nip like '$nip' ";
                $result = $db->query($sql);

                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {

                if(isset($row['RKUANTITAS'])){

            }
              ?>
              <input type="hidden" name="nip" value="<?php echo $row['nip']; ?>">
                  <input type="hidden" name="panjang" value="<?php echo $result->num_rows; ?>" />
                <tr role="row" class="odd">
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $row['nama_tugas_tambahan']; ?></td>
                  <td><input type="number" class="form-control" required="" value="<?php if(isset($row['nilai_tugas_tambahan'])) echo $row['nilai_tugas_tambahan']; ?>" name="nilai_tugas_tambahan[]" min=-1></input></td>
                  <td><a href="detailpenilaian.php?hapus=<?php echo $row['id_tugas_tambahan']?>&nip=<?php echo $row['nip']; ?>"  type="button" class="btn btn-danger"><i class="fa fa-trash"></i>&nbsp;Hapus</a></td>
                  <td>
                  </td>
                </tr>

            <input type="hidden" name="id_tugas_tambahan[]" value="<?php echo $row['id_tugas_tambahan']; ?>">
                <?php
                  }
                }
                ?>
              </table></div></div><div class="row"><div class="col-sm-5"><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"></div></div></div></div>

              </form>
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