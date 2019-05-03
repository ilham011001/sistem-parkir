<?php
	error_reporting(0);

	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "db_parkiran";

	$con = mysqli_connect($host, $user, $pass, $db) or DIE("<script>alert('Gagal Koneksi Ke Database !!')</script>");
 ?>