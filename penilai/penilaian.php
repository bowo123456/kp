<?php
include "../koneksi.php";
session_start();

if(isset($_POST['btn_simpan'])){
  include '../koneksi.php';

    $ORIENTASI_PELAYANAN = $_POST['ORIENTASI_PELAYANAN'];
    $INTEGRITAS = $_POST['INTEGRITAS'];
    $KOMITMEN = $_POST['KOMITMEN'];
    $DISIPLIN = $_POST['DISIPLIN'];
    $KERJASAMA = $_POST['KERJASAMA'];
    $KEPEMIMPINAN = $_POST['KEPEMIMPINAN'];
    $NIP = $_POST['nip'];

    $jumlah =$ORIENTASI_PELAYANAN+$INTEGRITAS+$KOMITMEN+$DISIPLIN+$KERJASAMA+$KEPEMIMPINAN;
    $rata = $jumlah/6;

    $sql = "INSERT INTO tabel_nilai_perilaku_kerja (ORIENTASI_PELAYANAN, INTEGRITAS, KOMITMEN, DISIPLIN, KERJASAMA, KEPEMIMPINAN, NIP, JUMLAH, NILAI_RATA_RATA)
    VALUES ('$ORIENTASI_PELAYANAN','$INTEGRITAS','$KOMITMEN','$DISIPLIN','$KERJASAMA','$KEPEMIMPINAN','$NIP','$jumlah','$rata')";

    if ($db->query($sql) === TRUE) {
        header("location: penilaian.php");
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}
if(isset($_POST['btn_ubah'])){
  include '../koneksi.php';

    $ORIENTASI_PELAYANAN = $_POST['ORIENTASI_PELAYANAN'];
    $INTEGRITAS = $_POST['INTEGRITAS'];
    $KOMITMEN = $_POST['KOMITMEN'];
    $DISIPLIN = $_POST['DISIPLIN'];
    $KERJASAMA = $_POST['KERJASAMA'];
    $KEPEMIMPINAN = $_POST['KEPEMIMPINAN'];
    $NIP = $_POST['nip'];

    $jumlah =$ORIENTASI_PELAYANAN+$INTEGRITAS+$KOMITMEN+$DISIPLIN+$KERJASAMA+$KEPEMIMPINAN;
    $rata = $jumlah/6;

    $sql = "UPDATE tabel_nilai_perilaku_kerja SET ORIENTASI_PELAYANAN = $ORIENTASI_PELAYANAN, INTEGRITAS = $INTEGRITAS, KOMITMEN = $KOMITMEN,
     DISIPLIN = $DISIPLIN, KERJASAMA = $KERJASAMA, KEPEMIMPINAN = $KEPEMIMPINAN, JUMLAH = $jumlah, NILAI_RATA_RATA = $rata
     Where NIP = '$NIP'";

    if ($db->query($sql) === TRUE) {
        header("location: penilaian.php");
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
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
  <title>Data SKP Pegawai</title>
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
        Tabel Penilaian Sasaran Kerja
      </h1>
    </section>

    <!-- Main content -->

    <section class="content container-fluid">
        <div class="box">
            <div class="box-header">

            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="example1_length"></div></div><div class="col-sm-6"><div id="example1_filter" class="dataTables_filter"></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                  <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 182px;">NIP</th>
                  <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">Nama</th>
                  <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 199px;">Jabatan</th>
                  <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 156px;">Unit Kerja</th>
                  <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 156px;">Aksi</th>
                </thead>
                <tbody>

              <?php
                include "../koneksi.php";
                $sql = "SELECT * FROM tabel_relasi_pegawai
                JOIN tabel_pegawai
                ON tabel_relasi_pegawai.id_pegawai=tabel_pegawai.NIP";
                $result = $db->query($sql);

                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {

              ?>
                <tr role="row" class="odd">
                  <td><?php echo $row['id_pegawai']; ?></td>
                  <td><?php echo $row['nama_pegawai']; ?></td>
                  <td><?php echo $row['JABATAN']; ?></td>
                  <td><?php echo $row['UNIT_KERJA']; ?></td>
                  <td>
                    <a href="detailpenilaian.php?id=<?php echo $row['id_pegawai']; ?>"  type="button" class="btn btn-default">Detail</a>
                    <a href="cetak.php?id=<?php echo $row['id_pegawai']; ?>"  type="button" class="btn btn-success ">Cetak</a><br><br>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"></i>&nbsp;Penilaian Prestasi Kerja</button>
                  </td>
                </tr>
                  <?php
                    $query = "SELECT * FROM tabel_nilai_perilaku_kerja where NIP = '".$row['id_pegawai'] ."'";
                    $result = mysqli_query($db, $query);
                    $row2 = mysqli_fetch_assoc($result);
                  ?>
                  <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Penilaian Prestasi Pegawai Negeri Sipil</h4>
                    </div>

                    <div class="modal-body">
                    <form action="" method="POST">
                      <input type="hidden" value="<?php echo $row['id_pegawai']; ?>" name="nip" />
                      <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                          <label >Orientasi Pelayanan</label><br>
                          <input type="number" class="form-control" required="" name="ORIENTASI_PELAYANAN" value="<?php echo $row2['ORIENTASI_PELAYANAN']; ?>" style="width: 40%;"><br>
                        </div>

                        <div class="form-group">
                          <label >Integritas</label><br>
                          <input type="number" class="form-control" required="" name="INTEGRITAS" value="<?php echo $row2['INTEGRITAS']; ?>" style="width: 40%;"><br>
                        </div>

                        <div class="form-group">
                          <label >Komitmen</label><br>
                          <input type="number" class="form-control" required="" name="KOMITMEN"  value="<?php echo $row2['KOMITMEN']; ?>"  style="width: 40%;"><br>
                        </div>

                        <div class="form-group">
                          <label >Disiplin</label><br>
                          <input type="number" class="form-control" required="" name="DISIPLIN"  value="<?php echo $row2['DISIPLIN']; ?>"  style="width: 40%;"><br>
                        </div>

                        <div class="form-group">
                          <label >Kerjasama</label><br>
                          <input type="number" class="form-control" required="" name="KERJASAMA"  value="<?php echo $row2['KERJASAMA']; ?>"  style="width: 40%;"><br>
                        </div>

                        <div class="form-group">
                          <label >Kepemimpinan</label><br>
                          <input type="number" class="form-control" required="" name="KEPEMIMPINAN"  value="<?php echo $row2['KEPEMIMPINAN']; ?>"  style="width: 40%;"><br>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                      <?php if(!isset($row2['INTEGRITAS'])){ ?>
                      <button type="submit" class="btn btn-primary pull-left" name="btn_simpan" >Simpan</button>
                      <?php } else { ?>
                      <button type="submit" class="btn btn-primary pull-left" name="btn_ubah" >Ubah</button>
                      <?php } ?>
                      <a href="cetakprestasi.php?id=<?php echo $row['id_pegawai']; ?>" type="button" class="btn btn-success pull-left" name="btn_cetak" >Cetak</a>
                    </div>
                    </form>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
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