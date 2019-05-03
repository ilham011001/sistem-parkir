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

  $username = "ilham";
  $password = "sihab";

  if (isset($_POST['login_admin'])) {
      if (($_POST['username'] == $username) && ($_POST['password'] == $password)) {
        session_start();

        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;

        echo "<script>document.location.href='home_admin.php'</script>";
      }else{
        echo "<script>alert('Username atau Password Salah !!');document.location.href='admin.php'</script>";
      }
    }

  if (isset($_POST['back'])) {
      header('location:index.php');
  }
 ?>

<body style="overflow-y: hidden;" class="bg-dark-red">
	<div class="panel container col-lg-4 col-md-6 col-sm-8 col-xs-12" style="position: relative; margin: auto; box-shadow: 0 7px 16px #691816, 0 4px 5px #93211f;">
        <div class="panel-body">
            <div style="float: left; margin-left:20px;">
            <img src="asset/img/logo.png" width="100px" class="animated fadeInDown">
          </div>
          <div style="float: left;">
            <h1 class="animated fadeInLeft" style="margin-left: 40px; font-size: 62pt"><?php echo $waktu; ?></h1>
            <p class="animated fadeInRight" style="margin-left: 85px; font-size: 14pt;"><?php echo $tanggal;?></p>
          </div>
        </div>
        <div class="panel-heading bg-dark-red">
            <h4 style="color: white" class="animated zoomIn">Login Admin</h4>
        </div>
        <div class="col-md-12 panel-body" style="padding-bottom:400px;">
                       <div class="col-md-11">
                        <form class="cmxform" method="POST">
                            <div class="form-group form-animate-text" style="margin-top:50px !important;">
                              <input type="text" class="form-text" id="validate_username " name="username" required>
                              <span class="bar"></span>
                              <label>Username Admin</label>
                            </div>

                            <div class="form-group form-animate-text" style="margin-top:10px !important;">
                              <input type="password" class="form-text" id="validate_password" name="password" required>
                              <span class="bar"></span>
                              <label>Password</label>
                            </div>

                            <input class="submit btn btn-danger col-md-5 col-sm-5 col-xs-12" type="submit" value="Login Admin" name="login_admin" style="margin-top: 10px;margin-left: 10px; height: 40px;">
                        </form>
                            
                        <form class="cmxform" method="POST">
                             <input class="submit btn btn-success col-md-5 col-sm-5 col-xs-12" type="submit" value="Back" name="back" style="margin-top: 10px;margin-left: 10px; height: 40px;">
                        </form>
                    </div>
        </div>
    </div>
</body>
</html>