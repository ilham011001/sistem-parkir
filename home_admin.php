<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-Parking</title>

	<!-- start: Css -->
	<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
	<script type="text/javascript" src="asset/js/jquery.min.js"></script>
	<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>

	<!-- plugins -->
	<link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
	<link rel="stylesheet" type="text/css" href="asset/css/plugins/nouislider.min.css"/>
	<link rel="stylesheet" type="text/css" href="asset/css/plugins/select2.min.css"/>
	<link rel="stylesheet" type="text/css" href="asset/css/plugins/ionrangeslider/ion.rangeSlider.css"/>
	<link rel="stylesheet" type="text/css" href="asset/css/plugins/ionrangeslider/ion.rangeSlider.skinFlat.css"/>
	<link rel="stylesheet" type="text/css" href="asset/css/plugins/bootstrap-material-datetimepicker.css"/>
	<link rel="stylesheet" type="text/css" href="asset/css/plugins/simple-line-icons.css"/>
	<link rel="stylesheet" type="text/css" href="asset/css/plugins/mediaelementplayer.css"/>
	<link href="asset/css/style.css" rel="stylesheet">
	<!-- end: Css -->
	<link rel="shortcut icon" href="asset/img/logo.png">
</head>

<?php 
include 'config/koneksi.php';

if (isset($_POST['btn_baru'])) {
	$username = $_POST['username_baru'];
	$password = $_POST['password_baru'];
	$confirm_password = $_POST['confirm_password_baru'];

	if ($password == $confirm_password) {
		$query = mysqli_query($con, "INSERT INTO tb_login VALUES('$username','$password')");
		echo "<script>document.location.href='home_admin.php'</script>";
	}else{
		echo "<script>alert('Password Tidak Sama !!')</script>";
	}
}

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();

    echo "<script>document.location.href='index.php'</script>";
  }

  if (isset($_POST['btn_delete'])) {
  	$query = mysqli_query($con, "TRUNCATE TABLE tb_akses_admin");
  }
 ?>

<body class="dashboard topnav">
	<!-- start: Header -->
        <nav class="navbar navbar-default header navbar-fixed-top bg-dark-red">
          <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
                <div class="navbar-brand" style="margin-left: -10px;" name="home_logo">
                <img src="asset/img/logo.png" class="img-circle" alt="logo" style="float: left;margin-top: -10px;" width="45px"/>
                 <b style="float: left;margin-left: 4px;">E-Parking</b>
                </div>

              <ul class="nav navbar-nav navbar-right user-nav">
                <li class="user-name"><span>Admin</span></li>
                  <li class="dropdown avatar-dropdown">
                   <img src="asset/img/avatar-admin.png" class="img-circle avatar" alt="username" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="cursor: pointer;" />
                   <ul class="dropdown-menu user-dropdown">
                     <li>
                      <ul>
                        <a href="?logout">
                          <li style="float: left;"><span class="fa fa-power-off "></span></li>
                          <li style="color: black; float: left;margin-left: 10px">Log Out</li>
                        </a>
                      </ul>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      <!-- end: Header -->

	<!-- Content-Admin -->
	<div id="content">
		<!-- Input Petugas Baru -->
		<div class="col-md-6" style="margin-top: 30px">
                  <div class="col-md-12 panel">
                    <div class="col-md-12 panel-heading bg-dark-red">
                      <h4 style="color: white;font-size: 20pt;">Form Petugas Baru</h4>
                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                      <div class="col-md-12">
                        <form method="post">
                          <div class="col-md-12" style="margin-top: -30px;">
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                              <input type="text" class="form-text" name="username_baru" value="<?= @$username ?>" required>
                              <span class="bar"></span>
                              <label>Username</label>
                            </div>

                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                              <input type="password" class="form-text" id="validate_password" name="password_baru" required>
                              <span class="bar"></span>
                              <label>Password</label>
                            </div>

                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                              <input type="password" class="form-text" id="validate_confirm_password" name="confirm_password_baru" required>
                              <span class="bar"></span>
                              <label>Confirm Password</label>
                            </div>

                            <input class="submit btn btn-warning col-md-5 right" type="submit" style="height: 40px" value="Submit" name="btn_baru">
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End:Input Petugas Baru -->

              <!-- Daftar Petugas Parkir -->          
                <div class="col-md-6 col-sm-12 col-x-12" style="margin-top: 30px;">
                  <div class="col-md-12 panel">
                    <div class="col-md-12 panel-heading bg-dark-red">
                      <h4 style="color: white;font-size: 20pt;">Daftar Petugas</h4>
                    </div>
                    <div class="panel-body">
                    <div class="table-responsive col-md-12 col-sm-12 col-xs-12">
                    <table class="table table-hover col-md-12 col-sm-12 col-xs-12" width="100%" cellspacing="0" style="margin-top: 30px;">
                      <?php 
                        $sql = "SELECT username FROM tb_login";
                        $query = mysqli_query($con, $sql);

                        while ($data = mysqli_fetch_array($query)) {?>
                      <tr style="font-size: 12pt">
                        <td align="center"><?php echo $data['username'] ?></td>
                      </tr>
                      <?php } ?>
                  </table>
                  </div>
                  </div>
                  </div>
                </div>
              <!-- end:Daftar Petugas Parkir --> 

              <!-- Aktivitas Petugas Parkir -->
              <form method="post">
              <div class="col-md-12 col-sm-12 col-x-12" style="margin-top: 30px;">
                  <div class="col-md-12 panel">
                    <div class="col-md-12 panel-heading bg-dark-red">
                      <h4 style="color: white;font-size: 20pt;">Aktivitas Petugas</h4>
                    </div>
                    <div class="panel-body">
                    <div class="table-responsive col-md-12 col-sm-12 col-xs-12">
                    <input class="submit btn btn-warning col-md-2" type="submit" style="height: 40px;margin-top: 20px;" value="Delete All" onclick="return confirm('Apakah Anda Yakin Menghapus Semuanya?')" name="btn_delete">
                    <table class="table table-hover col-md-12 col-sm-12 col-xs-12" width="100%" cellspacing="0" style="margin-top: 5px;">
                    <thead>
                     <tr style="font-size: 13pt">
                        <th>Username</th>
                        <th>Jam Login</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $sql = "SELECT * FROM tb_akses_admin ORDER BY jam_login DESC";
                        $query = mysqli_query($con, $sql);

                        while ($data = mysqli_fetch_array($query)) {?>

                      <tr style="font-size: 12pt">
                        <td><?php echo $data['username'] ?></td>
                        <td><?php echo $data['jam_login'] . " WIB" ?></td>
                      </tr>

                      <?php } ?>
                    </tbody>
                  </table>
                  </div>
                  </div>
                  </div>
                </div>
              </form>
              <!-- End: Aktivitas Petugas Parkir  -->
        </div>
	<!-- end: Content-Admin -->
</body>
</html>