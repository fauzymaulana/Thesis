<?php
	require 'DbConfig.php';
	$db = new DbConfig();

	$create_table_users = "CREATE TABLE users(
	id_adm INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	nama_lengkap VARCHAR(50) NOT NULL,
	username VARCHAR(30) NOT NULL,
	password VARCHAR(205) NOT NULL)";

	$bikin = $db->koneksi->query($create_table_users);
	if($bikin === true) echo "1. Tabel user sukses dimuat<br>";

	$insert_user = "INSERT INTO users(nama_lengkap,username,password) VALUES ('Fauzi Maulana','fauzi','" . md5('fauzi') . "')";
	$db->koneksi->query($insert_user);


	$create_table_sessionPesanan1 = "CREATE TABLE sessionpesanan_1(
		id_pesanan INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		id_konsumen INT(6) NOT NULL,
		no_invoice INT(6) NOT NULL,
		layanan1 VARCHAR(100) NOT NULL,
		harga_perUnit1 VARCHAR(8) NOT NULL,
		quantity1 VARCHAR(3) NOT NULL,
		subTotal1 VARCHAR(8) NOT NULL)";
	$buatSession1 = $db->koneksi->query($create_table_sessionPesanan1);
	if ($buatSession1 === true) echo "2. Tabel Session Pesanan 1 sukses dibuat<br>"; 


	$create_table_sessionPesanan2 = "CREATE TABLE sessionpesanan_2(
		id_pesanan INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		id_konsumen INT(6) NOT NULL,
		no_invoice INT(6) NOT NULL,
		layanan2 VARCHAR(100) NOT NULL,
		harga_perUnit2 VARCHAR(8) NOT NULL,
		quantity2 VARCHAR(3) NOT NULL,
		subTotal2 VARCHAR(8) NOT NULL)";
	$buatSession2 = $db->koneksi->query($create_table_sessionPesanan2);
	if ($buatSession2 === true) echo "3. Tabel Session Pesanan 2 sukses dibuat<br>";



	$create_table_invoice = "CREATE TABLE invoice(
		id_invoice INT(6)  AUTO_INCREMENT AUTO_INCREMENT PRIMARY KEY,
		no_invoice INT(6) UNSIGNED ZEROFILL,
		nama_konsumen VARCHAR(50) NOT NULL,
		no_telepon VARCHAR(15) NOT NULL,
		subTotal INT(8) NOT NULL,
		diskon INT(20) NOT NULL,
		total INT(8) NOT NULL,
		tanggal DATE DEFAULT CURRENT_TIMESTAMP,
		kode_hash VARCHAR(255) NOT NULL)";

	$invoice = $db->koneksi->query($create_table_invoice);
	if ($invoice === true) echo "4. Tabel invoice sukses dimuat<br>";


	$create_table_Data_Konsumen = "CREATE TABLE Data_Konsumen(
		id_konsumen INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		no_invoice INT(6) UNSIGNED ZEROFILL,
		nama_konsumen VARCHAR(50) NOT NULL,
		no_telepon VARCHAR(15) NOT NULL)";
		$data = $db->koneksi->query($create_table_Data_Konsumen);
		if ($data === true) echo "5. Tabel DataKonsumen Berhasil dibuat<br>";
		

	$create_table_layanan = "CREATE TABLE layanan(
		id_layanan INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		layanan VARCHAR(100) NOT NULL,
		harga_perUnit INT(8) NOT NULL)";
		$tblayanan = $db->koneksi->query($create_table_layanan);
		if ($tblayanan === true) echo "6. Tabel layanan berhasil dibuat<br>";

		$insert_layanan = "INSERT INTO layanan(layanan,harga_perUnit) VALUES 
		('Desain Poster',250000),
		('Desain Logo',150000),
		('Desain $ Cetak Stiker',50000),
		('Video Invitation',300000),
		('Website Invitation',450000),
		('Undangan Cetak type TRIFOLD',5000),
		('Undangan Cetak type 103',2000),
		('Undangan Cetak type 104',2000),
		('Undangan Cetak type 109',4000),
		('Undangan Cetak type C09',6000),
		('Undangan Cetak type K77',5000),
		('Undangan Cetak type T01',3000)";
	$db->koneksi->query($insert_layanan);
	?>