<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Penilaian Kinerja Pegawai Negeri Sipil</title>

    <!-- Bootstrap core CSS -->
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">

    <link rel="shorcut icon" href="icon.ico">

    <!-- Custom styles for this template -->
    <link href="asset/css/heroic-features.css" rel="stylesheet">

    <link href="../../../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </head>

  <body>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
          <div class="col-md-4">
          </div>

          <div class="col-md-4">
            <form class="form-signin" action="index.php" method="POST">
              <div class="text-center mb-4">
                <img class="mb-4" src="new_logo_jatim.png" alt="" height="100px" weight="100px">
                <h1 class="h2 mb-2 font-weight-normal">Sistem Penilaian Kinerja</h1>
                <p class="h4 mb-4 font-weight-normal">Login</p>
              </div>

              <div class="form-label-group">
                <input type="text" class="form-control" name="nip" placeholder="NIP" required autofocus maxlength="18">
              </div>
              <br>
              <div class="form-label-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required minlength="8" maxlength="16">
              </div>
              <br>
              <br>
              <button class="btn btn-lg btn-primary btn-block" name="btnLogin" type="submit">Masuk</button>
              <p class="mt-5 mb-3 text-muted text-center">&copy; Powered by Muhammad Sarwani 2018</p>
            </form>
          </div>
          <div class="col-md-4">
          </div>
        </div>
      </div>
    <!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>

  <?php
	    session_start();

	    if(isset($_POST['btnLogin'])){

		  include 'koneksi.php';

		  $nip=$_POST['nip'];
		  $password=$_POST['password'];
		  $query="SELECT * FROM tabel_pegawai WHERE NIP='$nip' and PASSWORD='$password'";

      if (!$result=$db->query($query)){
			  die('sql salah [' . $db->error . ']');
		  } else {
		    if ($result->num_rows>0){
				  $row=$result->fetch_assoc();
          if($row['STATUS']=="Admin"){
            $_SESSION['login_admin']=$row['NIP'];
            $_SESSION['status_admin']=$row['STATUS'];
            $_SESSION['nama_admin']=$row['NAMA'];
            header("location:admin/index.php");
          } else if($row['STATUS']=="Pegawai Yang Dinilai"){
            $_SESSION['login_pegawai']=$row['NIP'];
            $_SESSION['status_pegawai']=$row['STATUS'];
            $_SESSION['nama_pegawai']=$row['NAMA'];
            header("location:pegawai/index.php");
          } else if($row['STATUS']=="Pejabat Penilai"){
            $_SESSION['login_pejabat']=$row['NIP'];
            $_SESSION['status_pejabat']=$row['STATUS'];
            $_SESSION['nama_pejabat']=$row['NAMA'];
            header("location:penilai/index.php");
          }
		    }
      else {
        echo'<script>
          window.location.assign("index.php");
          alert("User/password anda salah.");
        </script>';
		  }
	  }

	$db->close();
	}
?>
</html>