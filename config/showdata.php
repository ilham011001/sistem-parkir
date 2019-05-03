<?php 

	$kode = $_POST['kode'];

	include 'koneksi.php';
	date_default_timezone_set("Asia/Jakarta");	

		$query = mysqli_query($con, "SELECT hitung_jam_masuk,jenis FROM tb_daftar_parkir WHERE kode = '$kode'");
		$data = mysqli_fetch_array($query);

		$jam_masuk = $data['hitung_jam_masuk'];
		$jam_keluar = date('H');

		if ($jam_keluar == $jam_masuk) {
			$lama = 1;
		}else if ($jam_keluar > $jam_masuk){
			$lama = $jam_keluar - $jam_masuk;
		}else{
			$jam_keluar = $jam_keluar + 24;
			$lama = $jam_keluar - $jam_masuk;
		}

		if($data['jenis'] == "Motor"){
			$hasil = 1000 * $lama;
		}elseif ($data['jenis'] == "Mobil") {
			$hasil = 2000 * $lama;
		}elseif ($data['jenis'] == "Truk/Bus/Lainnya") {
			$hasil = 3000 * $lama;
		}

		echo "$kode";
 ?>