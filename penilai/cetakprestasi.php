<?php
include "../koneksi.php";
session_start();
$nip_session = $_SESSION['login_pejabat'];
$nip_pegawai = $_GET['id'];

$query = "SELECT * FROM tabel_pegawai where NIP = '$nip_pegawai' ";
$result = mysqli_query($db, $query);
$dinilai = mysqli_fetch_assoc($result);

$query_2 = "SELECT * FROM tabel_pegawai where NIP = '$nip_session' ";
$result_2 = mysqli_query($db, $query_2);
$penilai = mysqli_fetch_assoc($result_2);

$query_3 = "SELECT * FROM tabel_nilai_perilaku_kerja where NIP = '$nip_pegawai' ";
$result_3 = mysqli_query($db, $query_3);
$perilaku = mysqli_fetch_assoc($result_3);


$sql_4 = "SELECT tabel_nilai_realisasi_skp.NILAI_SKP FROM tabel_target_skp join  tabel_nilai_realisasi_skp on tabel_target_skp.ID_TARGET=tabel_nilai_realisasi_skp.ID_TARGET  where tabel_target_skp.NIP ='$nip_pegawai' ";
$result_4 = mysqli_query($db, $sql_4);
$total_SKP=0;
$jumlah=0;
if (mysqli_num_rows($result_4) > 0) {
    // output data of each row

    while($row = mysqli_fetch_assoc($result_4)) {
        $jumlah++;
        $total_SKP = $total_SKP + $row["NILAI_SKP"];
    }
}
$rata_SKP = $total_SKP/$jumlah;

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
  <title>Cetak Penilaian Prestasi Kerja Pegawai Negeri Sipil</title>
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
	<center><img src="../garuda.png" style=" height:150px;"></img></center>
    <h4><center><b>PENILAIAN PRESTASI KERJA<br>PEGAWAI NEGERI SIPIL</b></center></h4>
	<br>
	<div class="container">
	<h5>PEMERINTAH PROVINSI JAWA TIMUR</h5>
    <h5 align="right" style="margin-top:-25px;" style="margin-left:113px;">JANGKA WAKTU PENILAIAN </h5>
    <h5>BADAN KEPEGAWAIAN DAERAH</h5>
    <h5 align="right" style="margin-top:-25px;">BULAN Januari s/d Desember <?php $tanggal=getdate(); echo $tanggal['year'];?></h5>

    <table width="100%" border="1" cellspacing="10px" cellpadding="10px" style="text-align: center;" >
        <tr>
			<td rowspan="6">1.</td>
			<td colspan="10" align="left"><b>&nbsp;YANG DINILAI</b></td>
		</tr>
        <tr>
            <td colspan="4" align="left">&nbsp;a. Nama</td>
            <td colspan="4" align="left">&nbsp;<?php echo $dinilai['NAMA']; ?></td>
        </tr>
        <tr>
            <td colspan="4" align="left">&nbsp;b. NIP</td>
            <td colspan="4" align="left">&nbsp;<?php echo $dinilai['NIP']; ?></td>
        </tr>
        <tr>
            <td colspan="4" align="left">&nbsp;c. Pangkat, Golongan ruang, TMT</td>
            <td colspan="4" align="left">&nbsp;<?php echo $dinilai['PANGKAT_GOLONGAN']; ?></td>
        </tr>
        <tr>
            <td colspan="4" align="left">&nbsp;d. Jabatan Pekerjaan</td>
            <td colspan="4" align="left">&nbsp;<?php echo $dinilai['JABATAN']; ?></td>
        </tr>
        <tr>
            <td colspan="4" align="left">&nbsp;e. Unit Organisasi</td>
            <td colspan="4" align="left">&nbsp;<?php echo $dinilai['UNIT_KERJA']; ?></td>
        </tr>
        <tr>
			<td rowspan="6">2.</td>
			<td colspan="10" align="left"><b>&nbsp;PEJABAT PENILAI</b></td>
		</tr>
        <tr>
            <td colspan="4" align="left">&nbsp;a. Nama</td>
            <td colspan="4" align="left">&nbsp;<?php echo $penilai['NAMA']; ?></td>
        </tr>
        <tr>
            <td colspan="4" align="left">&nbsp;b. NIP</td>
            <td colspan="4" align="left">&nbsp;<?php echo $penilai['NIP']; ?></td>
        </tr>
        <tr>
            <td colspan="4" align="left">&nbsp;c. Pangkat, Golongan ruang, TMT</td>
            <td colspan="4" align="left">&nbsp;<?php echo $penilai['PANGKAT_GOLONGAN']; ?></td>
        </tr>
        <tr>
            <td colspan="4" align="left">&nbsp;d. Jabatan Pekerjaan</td>
            <td colspan="4" align="left">&nbsp;<?php echo $penilai['JABATAN']; ?></td>
        </tr>
        <tr>
            <td colspan="4" align="left">&nbsp;e. Unit Organisasi</td>
            <td colspan="4" align="left">&nbsp;<?php echo $penilai['UNIT_KERJA']; ?></td>
        </tr>
        <tr>
			<td rowspan="6">3.</td>
			<td colspan="10" align="left"><b>&nbsp;ATASAN PEJABAT PENILAI</b></td>
		</tr>
        <tr>
            <td colspan="4" align="left">&nbsp;a. Nama</td>
            <td colspan="4" align="left">&nbsp;Dra. Ec. NIRMALA DEWI, MM</td>
        </tr>
        <tr>
            <td colspan="4" align="left">&nbsp;b. NIP</td>
            <td colspan="4" align="left">&nbsp;19650909 199403 2 006</td>
        </tr>
        <tr>
            <td colspan="4" align="left">&nbsp;c. Pangkat, Golongan ruang, TMT</td>
            <td colspan="4" align="left">&nbsp;Pembina Tk. I / (IV/b)</td>
        </tr>
        <tr>
            <td colspan="4" align="left">&nbsp;d. Jabatan Pekerjaan</td>
            <td colspan="4" align="left">&nbsp;Kepala Bidang Aplikasi Informatika</td>
        </tr>
        <tr>
            <td colspan="4" align="left">&nbsp;e. Unit Organisasi</td>
            <td colspan="4" align="left">&nbsp;Dinas Komunikasi Dan Informatika Provinsi Jawa Timur</td>
        </tr>
        <tr>
			<td rowspan="13">4.</td>
			<td colspan="7" align="left"><b>&nbsp;UNSUR YANG DINILAI</b></td>
            <td align="left"><b>&nbsp;Jumlah</b></td>
		</tr>
        <tr>
            <td colspan="6" align="left">&nbsp;<b>a. Sasaran Kerja Pegawai (SKP)</b></td>
            <td  align="left">&nbsp;<b><?php echo $rata_SKP; ?> x 60%</b></td>
            <td  align="left">&nbsp;<?php echo $rata_SKP*0.6; ?></td>
        </tr>
        <tr>
            <td rowspan="9" align="left">&nbsp;<b>b. Perilaku Kerja</b></td>
            <td colspan="4" align="left">&nbsp;1. Orientasi Pelayanan</td>
            <td align="left">&nbsp;<?php echo $perilaku['ORIENTASI_PELAYANAN']; ?></td>
            <td align="left">&nbsp;
                <?php
                    if($perilaku['ORIENTASI_PELAYANAN']>=91){
                        echo "(Sangat Baik)";
                    } else if($perilaku['ORIENTASI_PELAYANAN']>=76 && $perilaku['ORIENTASI_PELAYANAN']<=90){
                        echo "(Baik)";
                    } else if($perilaku['ORIENTASI_PELAYANAN']>=61 && $perilaku['ORIENTASI_PELAYANAN']<=75){
                        echo "(Cukup)";
                    } else if($perilaku['ORIENTASI_PELAYANAN']>=51 && $perilaku['ORIENTASI_PELAYANAN']<=60){
                        echo "(Kurang)";
                    } else if($perilaku['ORIENTASI_PELAYANAN']<=50){
                        echo "(Sangat Kurang)";
                    }
                ?>
            </td>
            <td align="left">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4" align="left">&nbsp;2. Integritas</td>
            <td align="left">&nbsp;<?php echo $perilaku['INTEGRITAS']; ?></td>
            <td align="left">&nbsp;
                <?php
                    if($perilaku['INTEGRITAS']>=90){
                        echo "(Sangat Baik)";
                    } else if($perilaku['INTEGRITAS']>=70){
                        echo "(Baik)";
                    } else if($perilaku['INTEGRITAS']>=60){
                        echo "(Cukup)";
                    } else if($perilaku['INTEGRITAS']>=45){
                        echo "(Kurang)";
                    } else {
                        echo "(Sangat Kurang)";
                    }
                ?>
            </td>
            <td align="left">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4" align="left">&nbsp;3. Komitmen</td>
            <td align="left">&nbsp;<?php echo $perilaku['KOMITMEN']; ?></td>
            <td align="left">&nbsp;
                <?php
                    if($perilaku['KOMITMEN']>=90){
                        echo "(Sangat Baik)";
                    } else if($perilaku['KOMITMEN']>=70){
                        echo "(Baik)";
                    } else if($perilaku['KOMITMEN']>=60){
                        echo "(Cukup)";
                    } else if($perilaku['KOMITMEN']>=45){
                        echo "(Kurang)";
                    } else {
                        echo "(Sangat Kurang)";
                    }
                ?>
            </td>
            <td align="left">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4" align="left">&nbsp;4. Disiplin</td>
            <td align="left">&nbsp;<?php echo $perilaku['DISIPLIN']; ?></td>
            <td align="left">&nbsp;
                <?php
                    if($perilaku['DISIPLIN']>=90){
                        echo "(Sangat Baik)";
                    } else if($perilaku['DISIPLIN']>=70){
                        echo "(Baik)";
                    } else if($perilaku['DISIPLIN']>=60){
                        echo "(Cukup)";
                    } else if($perilaku['DISIPLIN']>=45){
                        echo "(Kurang)";
                    } else {
                        echo "(Sangat Kurang)";
                    }
                ?>
            </td>
            <td align="left">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4" align="left">&nbsp;5. Kerjasama</td>
            <td align="left">&nbsp;<?php echo $perilaku['KERJASAMA']; ?></td>
            <td align="left">&nbsp;
                <?php
                    if($perilaku['KERJASAMA']>=90){
                        echo "(Sangat Baik)";
                    } else if($perilaku['KERJASAMA']>=70){
                        echo "(Baik)";
                    } else if($perilaku['KERJASAMA']>=60){
                        echo "(Cukup)";
                    } else if($perilaku['KERJASAMA']>=45){
                        echo "(Kurang)";
                    } else {
                        echo "(Sangat Kurang)";
                    }
                ?>
            </td>
            <td align="left">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4" align="left">&nbsp;6. Kepemimpinan</td>
            <td align="left">&nbsp;<?php echo $perilaku['KEPEMIMPINAN']; ?></td>
            <td align="left">&nbsp;
                <?php
                    if($perilaku['KEPEMIMPINAN']>=90){
                        echo "(Sangat Baik)";
                    } else if($perilaku['KEPEMIMPINAN']>=70){
                        echo "(Baik)";
                    } else if($perilaku['KEPEMIMPINAN']>=60){
                        echo "(Cukup)";
                    } else if($perilaku['KEPEMIMPINAN']>=45){
                        echo "(Kurang)";
                    } else {
                        echo "(Sangat Kurang)";
                    }
                ?>
            </td>
            <td align="left">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4" align="left">&nbsp;7. Jumlah</td>
            <td align="left">&nbsp;<?php echo $perilaku['JUMLAH']; ?></td>
            <td align="left">&nbsp;
                <?php
                    if($perilaku['JUMLAH']>=90){
                        echo "(Sangat Baik)";
                    } else if($perilaku['JUMLAH']>=70){
                        echo "(Baik)";
                    } else if($perilaku['JUMLAH']>=60){
                        echo "(Cukup)";
                    } else if($perilaku['JUMLAH']>=45){
                        echo "(Kurang)";
                    } else {
                        echo "(Sangat Kurang)";
                    }
                ?>
            </td>
            <td align="left">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4" align="left">&nbsp;8. Nilai rata-rata</td>
            <td align="left">&nbsp;<?php echo $perilaku['NILAI_RATA_RATA']; ?></td>
            <td align="left">&nbsp;
                <?php
                    if($perilaku['NILAI_RATA_RATA']>=90){
                        echo "(Sangat Baik)";
                    } else if($perilaku['NILAI_RATA_RATA']>=70){
                        echo "(Baik)";
                    } else if($perilaku['NILAI_RATA_RATA']>=60){
                        echo "(Cukup)";
                    } else if($perilaku['NILAI_RATA_RATA']>=45){
                        echo "(Kurang)";
                    } else {
                        echo "(Sangat Kurang)";
                    }
                ?>
                </td>
            <td align="left">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="5" align="left">&nbsp;<b>9. Nilai Perilaku Kerja</b></td>
            <td align="left">&nbsp;<b><?php echo $perilaku['NILAI_RATA_RATA']; ?> x 40%</b></td>
            <td align="left">&nbsp;<?php echo $perilaku['NILAI_RATA_RATA']*0.4; ?></td>
        </tr>
        <tr>
            <td colspan="7" rowspan="2" align="left">&nbsp;<b><center>NILAI PRESTASI KERJA</center></b></td>
            <td align="left">&nbsp;<b><?php echo ($rata_SKP*0.6)+($perilaku['NILAI_RATA_RATA']*0.4); ?></b></td>
        </tr>
        <tr>
            <td align="left">&nbsp;<b>
            <?php
                $hasil = ($rata_SKP*0.6)+($perilaku['NILAI_RATA_RATA']*0.4);

                if($hasil>=92){
                    echo "(Sangat Baik)";
                } else if($hasil<=91 && $hasil>=76){
                    echo "(Baik)";
                } else if($hasil<=75 && $hasil>=61){
                    echo "(Cukup)";
                } else if($hasil<=60 && $hasil>=51){
                    echo "(Sedang)";
                } else if($hasil<=50){
                    echo "(Buruk)";
                }
            ?>

            </b></td>
        </tr>
        <tr>
            <td colspan="9" align="left"><b>5. KEBERATAN DARI PEGAWAI NEGERI SIPIL YANG DINILAI (APABILA ADA)</b>
            <br><br><br><br><br><br><br><br><br><br>
            <center><b>Tanggal, ………………….</b></center><br></td>
        </tr>
        <tr>
            <td colspan="9" align="left"><b>6. TANGGAPAN PEJABAT PENILAI ATAS KEBERATAN</b>
            <br><br><br><br><br><br><br><br><br><br>
            <center><b>Tanggal, ………………….</b></center><br></td>
        </tr>
        <tr>
            <td colspan="9" align="left"><b>7. KEPUTUSAN ATASAN PEJABAT PENILAI ATAS KEBERATAN</b>
            <br><br><br><br><br><br><br><br><br><br>
            <center><b>Tanggal, ………………….</b></center><br></td>
        </tr>
        <tr>
            <td colspan="9" align="left"><b>8. REKOMENDASI</b>
            <br><br><br><br><br><br><br><br><br><br>
            <center><b>Tanggal, ………………….</b></center><br></td>
        </tr>
        <tr>
            <td colspan="9" align="right"><b>9. DIBUAT TANGGAL,  Desember <?php $tanggal=getdate(); echo $tanggal['year'];?></b></td>
        </tr>
        <tr>
            <td colspan="9" align="right" >PEJABAT PENILAI
				<br>
				<br>
				<br>
				<br>
                <br>
				<br>
			</td>
        </tr>
        <tr>
			<td colspan="9" align="right"><u><?php echo $penilai['NAMA']; ?></u></td>
		</tr>
        <tr>
			<td colspan="9" align="right">
				<?php
    			$tes = $penilai['NIP'];

    			$pertama = substr($tes,0,8);
    			$kedua = substr($tes,8,6);
    			$tiga = substr($tes,14,1);
    			$empat = substr($tes,14,3);

    			$hasil=$pertama." ".$kedua." ".$tiga." ".$empat;;

    			echo $hasil;
				?>
			</td>
            <br>
		</tr>

        <tr>
            <td colspan="9" align="left"><b>10. DITERIMA TANGGAL,  Desember <?php $tanggal=getdate(); echo $tanggal['year'];?></b></td>
        </tr>
        <tr>
            <td colspan="9" align="left" >PEGAWAI NEGERI SIPIL YANG <br>DINILAI,
            <br>
				<br>
				<br>
				<br>
                <br>
				<br>
			</td>
        </tr>
        <tr>
			<td colspan="9" align="left"><u><?php echo $dinilai['NAMA']; ?></u></td>
		</tr>
        <tr>
			<td colspan="9" align="left">
				<?php
    			$tes = $dinilai['NIP'];

    			$pertama = substr($tes,0,8);
    			$kedua = substr($tes,8,6);
    			$tiga = substr($tes,14,1);
    			$empat = substr($tes,14,3);

    			$hasil=$pertama." ".$kedua." ".$tiga." ".$empat;;

    			echo $hasil;
				?>
			</td>
            <br>
		</tr>

        <tr>
            <td colspan="9" align="right"><b>11. DITERIMA TANGGAL,  Desember <?php $tanggal=getdate(); echo $tanggal['year'];?></b></td>
        </tr>
        <tr>
            <td colspan="9" align="right" >ATASAN PEJABAT YANG MENILAI
            <br>
				<br>
				<br>
				<br>
                <br>
				<br>
			</td>
        </tr>
        <tr>
			<td colspan="9" align="right"><u>Dra. Ec. NIRMALA DEWI, MM</u></td>
		</tr>
        <tr>
			<td colspan="9" align="right">
				<?php
    			$tes = "196509091994032006";

    			$pertama = substr($tes,0,8);
    			$kedua = substr($tes,8,6);
    			$tiga = substr($tes,14,1);
    			$empat = substr($tes,14,3);

    			$hasil=$pertama." ".$kedua." ".$tiga." ".$empat;;

    			echo $hasil;
				?>
			</td>
            <br>
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