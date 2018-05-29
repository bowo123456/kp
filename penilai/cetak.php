<?php
include "../koneksi.php";
session_start();
$nip_session = $_SESSION['login_pejabat'];
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
  <title>Cetak Penilaian Sasaran Kerja</title>
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
	$result = $db->query("SELECT * FROM tabel_pegawai WHERE NIP='$nip_session'");
	$row3 = mysqli_fetch_assoc($result);

	$result2 = $db->query("SELECT * FROM tabel_pegawai WHERE NIP='$nip_pegawai'");
	$row2 = mysqli_fetch_assoc($result2);
?>
<body class="hold-transition skin-blue sidebar-mini">
	<h4><center>PENILAIAN CAPAIAN SASARAN KERJA<br>PEGAWAI NEGERI SIPIL</center></h4>
	<br>
	<div class="container">
	<h5>Jangka Waktu Penilaian 2 Januari s/d 31 Desember <?php $tanggal=getdate(); echo $tanggal['year'];?></h5>
	<table width="100%" border="1" cellspacing="10px" cellpadding="10px" style="text-align: center;" >
		<tr>
			<td rowspan="2" >No.</td>
			<td style="text-align: center;" rowspan="2" colspan="2">&nbsp;I. KEGIATAN TUGAS JABATAN</td>
			<td rowspan="2" >AK</td>
			<td colspan="6"><center>TARGET</center></td>
			<td rowspan="2" >AK</td>
			<td colspan="6"><center>Realisasi</center></td>
			<td rowspan="2">PENGHITUNGAN</td>
			<td rowspan="2">NILAI CAPAIAN SKP</td>
		</tr>
		<tr>
			<td colspan="2">KUANT/OUTPUT</td>
			<td>KUAL/MUTU</td>
			<td colspan="2">WAKTU</td>
			<td>BIAYA</td>
			<td colspan="2">KUANT/OUTPUT</td>
			<td>KUAL/MUTU</td>
			<td colspan="2">WAKTU</td>
			<td>BIAYA</td>
		</tr>
		<?php
                $sql = "SELECT * FROM tabel_target_skp join tabel_nilai_realisasi_skp on tabel_target_skp.ID_TARGET = tabel_nilai_realisasi_skp.ID_TARGET   where NIP='$nip_pegawai'";
                $result = $db->query($sql);
                $nomor = 1;

				$total=0;
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {

              ?>
		<tr>
			<td><?php echo $nomor++; ?>.</td>
			<td style="text-align: left;" colspan="2">&nbsp;<?php echo $row["KEGIATAN_TUGAS_JABATAN"]; ?></td>
			<td>0</td>
			<td><?php echo $row["KUANTITAS"]; ?></td>
			<td><?php echo $row["OUTPUT"]; ?></td>
			<td><?php echo $row["KUALITAS"]; ?></td>
			<td><?php echo $row["WAKTU"]; ?></td>
			<td>Bulan</td>
			<td style="text-align: left;">&nbsp;Rp.&nbsp;<?php echo number_format($row["BIAYA"],2,',','.'); ?></td>

			<td>0</td>
			<td><?php echo $row["RKUANTITAS"]; ?></td>
			<td><?php echo $row["OUTPUT"]; ?></td>
			<td><?php echo $row["RKUALITAS"]; ?></td>
			<td><?php echo $row["RWAKTU"]; ?></td>
			<td>Bulan</td>
			<td style="text-align: left;">&nbsp;Rp.&nbsp;<?php echo number_format($row["RBIAYA"],2,',','.'); ?></td>
			<td><?php
				// ((RKUANTITAS/KUANTITAS*100)+(RKUALITAS/KUALITAS*100)+(((1.76*WAKTU-RWAKTU)/WAKTU)*100)+(((1.76*BIAYA-RBIAYA)/BIAYA)*100))
				$perhitungan = ($row['RKUANTITAS']/$row['KUANTITAS']*100)+($row['RKUALITAS']/$row['KUALITAS']*100)+
				(((1.76*$row['WAKTU']-$row['RWAKTU'])/$row['WAKTU'])*100)+(((1.76*$row['BIAYA']-$row['RBIAYA'])/$row['BIAYA'])*100);
				echo $perhitungan;
			?></td>

			<td>
			<?php
				$nilai_capaian = $perhitungan/4;
				$total+=$nilai_capaian;
				echo $nilai_capaian;
			?>
			</td>

		</tr>

		<?php
		}
	}
		 ?>


		<tr>
			<td></td>
			<td colspan="2">II. TUGAS TAMBAHAN DAN KREATIVITAS/UNSUR PENUNJANG</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td style="text-align: left;"></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td style="text-align: left;"></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>

		<?php
            $sql = "SELECT * FROM tabel_tugas_tambahan where nip='$nip_pegawai'";
            $result = $db->query($sql);
            $nomor = 1;

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {

            ?>
		<tr>
			<td><?php echo $nomor++; ?>.</td>
			<td colspan="2"><?php echo $row['nama_tugas_tambahan']; ?></td>
			<td></td>
			<td colspan="2"><?php if($row['nama_tugas_tambahan'] == "Kreativitas") { echo "";} else{echo $row['nilai_tugas_tambahan'];}  ?></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><?php
			$n = $row['nilai_tugas_tambahan'];
			$m = $row['nama_tugas_tambahan'];

			if($m == "Kreativitas"){
				if($n == 3){
					echo 3;
					$total=$total+3;
				} else if ($n == 6){
					echo 6;
					$total=$total+6;
				} else if ($n == 12){
					echo 12;
					$total=$total+12;
				}
			} else{
				if($n==0){
					echo 0;
					$total=$total+0;
				} else if($n<=3 && $n>=1){
					echo 1;
					$total=$total+1;
				} else if($n<=6 && $n>=4){
					echo 2;
					$total=$total+2;
				} else if($n>=7){
					echo 3;
					$total=$total+3;
				}
			}
			?></td>

		</tr>
		<?php
		}
	}
		 ?>
		<tr>
			<td rowspan="2" colspan="18">Nilai Capaian SKP</td>
			<td><?php echo  $total; ?></td>
		</tr>
		<tr>
			<td><?php
				// =IF(R24<=50,"(Buruk)",IF(R24<=60,"(Sedang)",IF(R24<=75,"(Cukup)",IF(R24<=90.99,"(Baik)","(Sangat Baik)"))))

				if($total<=50){
					echo "Buruk";
				} else if($n<=60 && $n>=50){
					echo "Sedang";
				} else if($n<=75 && $n>=60){
					echo "Cukup";
				} else if($n<=90.99 && $n>=75){
					echo "Baik";
				} else{
					echo "Sangat Baik";
				}


			?></td>
		</tr>

	</table>

	<table width="100%" style="text-align: center;" >
		<br>
		<br>
		<br>
		<tr>
			<td width="50%"><br>
				<br>
			</td>
			<td width="50%" colspan="3"><center>Surabaya, Desember <?php echo date("Y");?></center>
			</td>
		</tr>
		<tr>
			<td><center></center>
				<br>
				<br>
				<br>
				<br>
			</td>
			<td colspan="3"><center>Pejabat Penilai</center>
				<br>
				<br>
				<br>
				<br>
			</td>
		</tr>
		<tr>
			<td colspan="3"><center></center></td>
			<td><center><u><?php echo $row3['NAMA']; ?></u></center></td>
		</tr>
		<tr>
			<td colspan="3"><center>

			</center></td>
			<td><center>
				<?php
    			$tes = $row3['NIP'];

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
	<script type="text/javascript">
		window.print();
	</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>