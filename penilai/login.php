<!DOCTYPE html>
<html lang="en">
<head>
	<title>Halaman Masuk Penilai</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../asset_untuk_login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../asset_untuk_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../asset_untuk_login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../asset_untuk_login/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../asset_untuk_login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../asset_untuk_login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../asset_untuk_login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../asset_untuk_login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../asset_untuk_login/css/util.css">
	<link rel="stylesheet" type="text/css" href="../asset_untuk_login/css/main.css">
<!--===============================================================================================-->
</head>
<?php
	if(isset($_POST['btnLogin'])) {
    $nip =$_POST["nip"];
    $password =$_POST["password"];
    include '../koneksi.php';
    $result = mysqli_query($db,"SELECT * FROM tabel_user WHERE nip = '$nip' AND password = '$password' AND status='Pejabat Penilai' ") ;
    $no_of_rows = mysqli_num_rows($result);
    if ($no_of_rows > 0) {

      $result = mysqli_fetch_array($result);

      session_start();

      $_SESSION['nip_pejabat']=$result['nip'];
      $_SESSION['nama_pejabat']=$result['nama'];
      $_SESSION['status_pejabat']=$result['status'];

      echo "<SCRIPT type='text/javascript'> //not showing me this
      alert('Berhasil Login');
      window.location.replace(\"index.php\");
      </SCRIPT>";

    } else {
    	 echo "<SCRIPT type='text/javascript'> //not showing me this
      alert('Gagal Login');
      </SCRIPT>";
    }
}
?>
<body>

	<div class="container-login100" style="background-image: url('images/123123.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form class="login100-form validate-form" action="login.php" method="POST">
				<span class="login100-form-title p-b-37">
					Login Penilai
				</span>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Masukkan NIP">
					<input class="input100" type="text" name="nip" placeholder="NIP">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Masukkan Password">
					<input class="input100" type="password" name="password" placeholder="Password">
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn" name="btnLogin" type="submit">
						Masuk
					</button>
				</div>
			</form>
		</div>
	</div>

<!--===============================================================================================-->
	<script src="../asset_untuk_login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../asset_untuk_login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../asset_untuk_login/vendor/bootstrap/js/popper.js"></script>
	<script src="../asset_untuk_login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../asset_untuk_login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../asset_untuk_login/vendor/daterangepicker/moment.min.js"></script>
	<script src="../vendor/daterangepicker/daterangepicker.js"></script>
<!--=============asset_untuk_login/==================================================================================-->
	<script src="../asset_untuk_login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../asset_untuk_login/js/main.js"></script>

</body>
</html>