<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Parking</title>

  <!-- start: Css -->
  <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">

  <!-- plugins -->
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/nouislider.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/select2.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/ionrangeslider/ion.rangeSlider.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/ionrangeslider/ion.rangeSlider.skinFlat.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/bootstrap-material-datetimepicker.css"/>
  <link href="asset/css/style.css" rel="stylesheet">
  <!-- end: Css -->
  <link rel="shortcut icon" href="asset/img/logo.png">

</head>

<?php
  include "config/koneksi.php";

  date_default_timezone_set("Asia/Jakarta");
  $waktu = date('H:i');
  $tanggal = date('D, d M Y');

  if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($con, "SELECT * FROM tb_login WHERE username = '$username' AND password = '$password'");
    $row = mysqli_fetch_array($query);

    if ($row['username'] == $username && $row['password'] == $password) {
        session_start();
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['role'] = "petugas";

        $query = mysqli_query($con, "INSERT INTO tb_akses_admin VALUES('$username','$waktu')");

        echo "<script>document.location.href='home.php?nama=$username'</script>";
    }else{
        echo "<script>alert('Username atau Password Salah !!');document.location.href='index.php'</script>";
    }
  }

  if (isset($_POST['signup'])) {
        header('location:admin.php');
  }
 ?>

<body class="bg-teal" style="overflow-y: hidden;">
  	<div class="panel container col-lg-4 col-md-6 col-sm-6 col-xs-12" style="position: relative; margin: auto; box-shadow: 0 7px 16px #00655b, 0 4px 5px #006f64;">
          <div class="panel-body">
            <div style="float: left; margin-left:20px;">
              <img src="asset/img/logo.png" width="100px" class="animated fadeInDown">
            </div>
            <div style="float: left;">
              <h1 class="animated fadeInLeft" id="jam" style="margin-left: 40px; font-size: 62pt"><?= $waktu ?></h1>
              <p class="animated fadeInRight" style="margin-left: 85px; font-size: 14pt;"><?= $tanggal;?></p>
            </div>
          </div>
          <div class="panel-heading bg-teal">
              <h4 style="color: white" class="animated zoomIn">Login Petugas Parkir</h4>
          </div>
          <div class="col-md-12 panel-body" style="padding-bottom:400px;">
                        <div class="col-md-11">
                          <form class="cmxform" method="POST">
                              <div class="form-group form-animate-text" style="margin-top:50px !important;">
                                <input type="text" class="form-text" id="validate_username" name="username" required>
                                <span class="bar"></span>
                                <label>Username</label>
                              </div>

                              <div class="form-group form-animate-text" style="margin-top:20px !important;">
                                <input type="password" class="form-text" id="validate_password" name="password" required>
                                <span class="bar"></span>
                                <label>Password</label>
                              </div>

                              <input class="submit btn btn-success col-md-5 col-sm-5 col-xs-12" style="margin-top: 10px; margin-left: 10px;height: 40px;" type="submit" value="Login" name="login">
                              </form>
                              <form class="cmxform" method="POST">
                              <input class="submit btn btn-danger col-md-5 col-sm-5 col-xs-12" style="margin-top: 10px; margin-left: 10px; height: 40px;" type="submit" value="Admin" name="signup">
                              </form>
                          </div>                       
          </div>
      </div>
</body>
</html>