<?php
include 'koneksi.php'; 
date_default_timezone_set("Asia/Jakarta");
		
		$kode = "EP135";
		$query = mysqli_query($con, "SELECT hitung_jam_masuk,jenis FROM tb_daftar_parkir WHERE kode = '$kode'");
		$data = mysqli_fetch_array($query);

		$jam_keluar = date('H');
		$jam_masuk = $data['hitung_jam_masuk'];

		if ($jam_keluar == $jam_masuk) {
			$lama = 1;
		}else if ($jam_keluar > $jam_masuk){
			$lama = $jam_keluar - $jam_masuk;
		}else{
			$jam_keluar = $jam_keluar + 24;
			$lama = $jam_keluar - $jam_masuk;
		}

		echo $jam_masuk . "<br/>";
		echo $jam_keluar . "<br/>";
		echo $lama;
 ?>