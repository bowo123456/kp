<?php  
include "../koneksi.php";
session_start();
$nip_session = $_SESSION['nip'];
$nip_pegawai = $_GET['id'];
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
  <title>Cetak SKP</title>
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
<?php  
	include "../koneksi.php";
	$result = $db->query("SELECT * FROM tabel_user WHERE nip='$nip_session'");
	$row3 = mysqli_fetch_assoc($result);

	$result2 = $db->query("SELECT * FROM tabel_user WHERE nip='$nip_pegawai'");
	$row2 = mysqli_fetch_assoc($result2);
?>
<body class="hold-transition skin-blue sidebar-mini">
	<h4><center>FORMULIR SASARAN KERJA<br>PEGAWAI NEGERI SIPIL</center></h4>
	<br>
	<div class="container">
	<table width="100%" border="1" cellspacing="10px" cellpadding="10px" style="text-align: center;" >
		<tr>
			<td>No.</td>
			<td style="text-align: left;" colspan="2">&nbsp;I. PEJABAT PENILAI</td>
			<td>No.</td>
			<td style="text-align: left;" colspan="6">&nbsp;II. PEGAWAI NEGERI SIPIL YANG DINILAI</td>
		</tr>
		<tr>
			<td>1.</td>
			<td style="text-align: left;">&nbsp;Nama</td>
			<td style="text-align: left;">&nbsp;<?php echo $row3['nama']; ?></td>
			<td>1.</td>
			<td style="text-align: left;">&nbsp;Nama</td>
			<td style="text-align: left;" colspan="5">&nbsp;<?php echo $row2['nama']; ?></td>
		</tr>
		<tr>
			<td>2.</td>
			<td style="text-align: left;">&nbsp;NIP</td>
			<td style="text-align: left;">&nbsp;<?php
    			$tes = $row3['nip'];

    			$pertama = substr($tes,0,8);
    			$kedua = substr($tes,8,6);
    			$tiga = substr($tes,14,1);
    			$empat = substr($tes,14,3);

    			$hasil=$pertama." ".$kedua." ".$tiga." ".$empat;;

    			echo $hasil;
				?></td>
			<td>2.</td>
			<td style="text-align: left;">&nbsp;NIP</td>
			<td style="text-align: left;" colspan="5">&nbsp;<?php
    			$tes = $row2['nip'];

    			$pertama = substr($tes,0,8);
    			$kedua = substr($tes,8,6);
    			$tiga = substr($tes,14,1);
    			$empat = substr($tes,14,3);

    			$hasil=$pertama." ".$kedua." ".$tiga." ".$empat;;

    			echo $hasil;
				?></td>
		</tr>
		<tr>
			<td>3.</td>
			<td style="text-align: left;">&nbsp;Pangkat</td>
			<td style="text-align: left;">&nbsp;<?php echo $row3['pangkat_golongan']; ?></td>
			<td>3.</td>
			<td style="text-align: left;">&nbsp;Pangkat</td>
			<td style="text-align: left;" colspan="5">&nbsp;<?php echo $row2['pangkat_golongan']; ?></td>
		</tr>
		<tr>
			<td>4.</td>
			<td style="text-align: left;">&nbsp;Jabatan</td>
			<td style="text-align: left;">&nbsp;<?php echo $row3['jabatan']; ?></td>
			<td>4.</td>
			<td style="text-align: left;">&nbsp;Jabatan</td>
			<td style="text-align: left;" colspan="5">&nbsp;<?php echo $row2['jabatan']; ?></td>
		</tr>
		<tr>
			<td>5.</td>
			<td style="text-align: left;">&nbsp;Unit Kerja</td>
			<td style="text-align: left;">&nbsp;DINAS KOMUNIKASI DAN INFORMATIKA</td>
			<td>5.</td>
			<td style="text-align: left;">&nbsp;Unit Kerja</td>
			<td style="text-align: left;" colspan="5">&nbsp;DINAS KOMUNIKASI DAN INFORMATIKA</td>
		</tr>
		<tr>
			<td rowspan="2" >No.</td>
			<td style="text-align: center;" rowspan="2" colspan="2">&nbsp;III. KEGIATAN TUGAS JABATAN</td>
			<td rowspan="2" >AK</td>
			<td colspan="6"><center>TARGET TAHUNAN</center></td>
		</tr>
		<tr>
			<td colspan="2">KUANT/OUTPUT</td>
			<td>KUAL/MUTU</td>
			<td colspan="2">WAKTU</td>
			<td>BIAYA</td>
		</tr>
		<?php 
                $sql = "SELECT * FROM tabel_formulir_skp";
                $result = $db->query($sql);
                $nomor = 1;

                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {

              ?>
		<tr>
			<td><?php echo $nomor++; ?>.</td>
			<td style="text-align: left;" colspan="2">&nbsp;<?php echo $row["kegiatan_tugas_jabatan"]; ?></td>
			<td>0</td>
			<td><?php echo $row["kuantitas"]; ?></td>
			<td><?php echo $row["output"]; ?></td>
			<td><?php echo $row["kualitas"]; ?></td>
			<td><?php echo $row["waktu"]; ?></td>
			<td>Bulan</td>
			<td style="text-align: left;">&nbsp;Rp.&nbsp;<?php echo number_format($row["biaya"],2,',','.'); ?></td>
		</tr>
		<?php 
		}
	}
		 ?>
	</table>

	<table width="100%" style="text-align: center;" >
		<br>
		<br>
		<br>	
		<tr>
			<td width="50%"><br>
				<br>
				<br>
			</td>
			<td width="50%" colspan="3"><center>Surabaya, Januari <?php echo date("Y");?></center>
			</td>
		</tr>
		<tr>
			<td><center>Pejabat Penilai</center>
				<br>
				<br>
				<br>
				<br>
			</td>
			<td colspan="3"><center>Pegawai Negeri Sipil Yang Dinilai</center>
				<br>
				<br>
				<br>
				<br>
			</td>
		</tr>
		<tr>
			<td><center><u><?php echo $row3['nama']; ?></u></center></td>
			<td colspan="3"><center><u><?php echo $row2['nama']; ?></u></center></td>
		</tr>
		<tr>
			<td><center>
				<?php
    			$tes = $row3['nip'];

    			$pertama = substr($tes,0,8);
    			$kedua = substr($tes,8,6);
    			$tiga = substr($tes,14,1);
    			$empat = substr($tes,14,3);

    			$hasil=$pertama." ".$kedua." ".$tiga." ".$empat;;

    			echo $hasil;
				?>
			</center></td>
			<td colspan="3"><center>
				<?php
    			$tes = $row2['nip'];

    			$pertama = substr($tes,0,8);
    			$kedua = substr($tes,8,6);
    			$tiga = substr($tes,14,1);
    			$empat = substr($tes,14,3);

    			$hasil=$pertama." ".$kedua." ".$tiga." ".$empat;;

    			echo $hasil;
				?>
			</center></td>
		</tr>
	</table>
	</div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<!-- <script type="text/javascript">
		window.print();
	</script> -->


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>