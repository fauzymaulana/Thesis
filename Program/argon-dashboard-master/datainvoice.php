<!DOCTYPE html>
<html>
<?php session_start();
require 'DbConfig.php';
$db = new DbConfig();?>
<?php
if(!$_SESSION['user']){
header('location: index.php');
}
?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="refresh" content="90">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Uniqa Digital Invitation</title>
	<!-- Favicon -->
	<link rel="icon" href="assets/img/brand/logo-uniqa-3.png" type="image/png">
	<link rel="stylesheet" href="alert/css/sweetalert.css">
	<link rel=”stylesheet” href=”/fontawesome/css/all.min.css”>
	<!-- Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
	<!-- Icons -->
	<link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
	<link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
	<!-- Page plugins -->
	<!-- Argon CSS -->
	<link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>

	<?php
	
	$cek = isset($_SESSION['user']);
	?> 
	<!-- Sidenav -->
	<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
		<div class="scrollbar-inner">
			<!-- Brand -->
			<div class="sidenav-header  align-items-center">
				<a class="navbar-brand" href="javascript:void(0)">
					<img src="assets/img/brand/logo-uniqa-3.png" class="navbar-brand-img" alt="...">
				</a>
			</div>
			<div class="navbar-inner">
				<!-- Collapse -->
				<div class="collapse navbar-collapse" id="sidenav-collapse-main">
					<!--  Nav items -->
					<ul class="navbar-nav">
						<li class="nav-item">
							<!-- Divider -->
							<a class="nav-link">
								<i class="ni text-primary"></i>
								<h3 class="nav-link-text">Menu</h3>
							</a> <hr class="my-3">
							<a class="nav-link" href="dashboard.php">
								<i class="ni ni-tv-2 text-primary"></i>
								<span class="nav-link-text">Dashboard</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="tambahinvoice.php">
								<i class="ni ni-fat-add"></i>
								<span class="nav-link-text">Tambah Invoice</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="datainvoice.php">
								<i class="ni ni-bullet-list-67 text-default"></i>
								<span class="nav-link-text"><b>Data Invoice</b></span>
							</a>
						</li>
						<!-- <li class="nav-item">
							<a class="nav-link" href="datakonsumen.php">
								<i class="ni ni-bullet-list-67 text-default"></i>
								<span class="nav-link-text">Data Konsumen</span>
							</a>
						</li> -->
						<li class="nav-item">
							<a class="nav-link" href="validasiuniqa.php">
								<i class="ni ni-check-bold text-primary"></i>
								<span class="nav-link-text">Verifikasi</span>
							</a>
						</li>
						 <!-- <li class="nav-item">
				              <a class="nav-link" href="SHARSA.php">
				                <i class="ni ni-check-bold text-primary"></i>
				                <span class="nav-link-text">Pengujian</span>
				              </a>
				            </li> -->
					</ul>
				</div>
			</div>
		</div>
	</nav>
	<!-- Main content -->
	<div class="main-content" id="panel">
		<!-- Topnav -->
		<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
			<div class="container-fluid">
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Search form -->
					<form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
						<div class="form-group mb-0">
							<div class="input-group input-group-alternative input-group-merge">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-search"></i></span>
								</div>
								<input class="form-control" placeholder="Search" type="text">
							</div>
						</div>
						<button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</form>
					<!-- Navbar links -->
					<ul class="navbar-nav align-items-center  ml-md-auto ">
						<li class="nav-item d-xl-none">
							<!-- Sidenav toggler -->
							<div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
								<div class="sidenav-toggler-inner">
									<i class="sidenav-toggler-line"></i>
									<i class="sidenav-toggler-line"></i>
									<i class="sidenav-toggler-line"></i>
								</div>
							</div>
						</li>
						<li class="nav-item d-sm-none">
							<a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
								<i class="ni ni-zoom-split-in"></i>
							</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								
							</a>
							
						</li>
						
					</ul>
					<ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
						<li class="nav-item dropdown">
							<a class="nav-link"href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<div class="media align-items-center">
									<span class="avatar avatar-sm rounded-circle">
										<img src="assets/img/brand/girl.png">
									</span> 
									
									<div class="media-body  ml-2  d-none d-lg-block">
										
										<span class="mb-0 text-sm  font-weight-bold"><?= $_SESSION['user']['nama_lengkap'];?></span>
										
									</div>
								</div>
								<div class="dropdown-menu  dropdown-menu-right ">
									<div class="dropdown-divider"></div>
									<a href="logout.php" class="dropdown-item">
										<i class="ni ni-user-run"></i>
										
										<span>Logout</span>
									</a>
								</div>
							</a>
						</li>            
					</ul>
					<ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
						<li class="nav-item dropdown">
							<a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								
							</a>
							<div class="dropdown-menu  dropdown-menu-right ">
								<div class="dropdown-divider"></div>
								<a href="#" class="dropdown-item">
									<i class="ni ni-user-run"></i>
									<span>Logout</span>
								</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- Header -->
		<!-- Header -->
		<div class="header bg-primary pb-6">
			<div class="container-fluid">
				<div class="header-body">
					<div class="row align-items-center py-4">
						<div class="col-lg-6 col-7">
							<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
								<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
									<li class="breadcrumb-item"><a href="dashboard.php"><i class="fas fa-home"></i></a></li>
									<li class="breadcrumb-item"><a href="#">Data Invoice</a></li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>


		<!-- Page content -->
		<div class="container-fluid mt--6">
			<div class="row">
				<div class="col">
					<div class="card border-0">
						<div class="container">
							<div style="overflow-y: auto; text-align: center;">
								<table class="table table-striped" width="150%" >
									<thead>
										<tr>
											<th><b><h5>No</h5></b></th>
											<th><b><h5>No. Invoice</h5></b></th>
											<th><b><h5>Nama Konsumen</h5></b></th>
											<th><b><h5>No. Telp</h5></b></th>
											<th><b><h5>Layanan</h5></b></th>
											<th><b><h5>Sub Total</h5></b></th>
											<th><b><h5>Diskon</h5></b></th>
											<th><b><h5>Total</h5></b></th>
											<th><b><h5>Tanggal</h5></b></th>
											<th><b><h5>Kode Hash</h5></b></th>
											<th><b><h5>Aksi</h5></b></th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
																				//query ke db select tabel
																		// $sql = $db->koneksi->query("SELECT * FROM invoice ORDER BY no_invoice ASC");
																		// $sql = $db->koneksi->query("SELECT * FROM invoice AS invoice INNER JOIN sessionpesanan_1 AS sessionpesanan_1 ON invoice.no_invoice  = sessionpesanan_1.no_invoice INNER JOIN sessionpesanan_2 AS sessionpesanan_2 ON invoice.no_invoice = sessionpesanan_2.no_invoice  ORDER BY no_invoice ASC");
										$sql = $db->koneksi->query("SELECT * FROM invoice JOIN sessionpesanan_1 USING(no_invoice) JOIN sessionpesanan_2 Using(no_invoice)  ORDER BY no_invoice DESC");
																		//untuk penomoran tabel
										if (mysqli_num_rows($sql) > 0) {
																				//membuat variabel $no untuk menyimpan no urut
											while ($data = $sql->fetch_array(MYSQLI_ASSOC)) {
												$tgl = $data['tanggal'];
																						//menampilkan data perulangan
												$format = $data['subTotal'];
												$formatt = $data['total'];


												?>
												<tr>
													<td><?php echo $no++; ?></td>
													<td><?php echo $data['no_invoice']; ?></td>
													<td><?php echo $data['nama_konsumen']; ?></td>
													
													
													<td><?php echo $data['no_telepon']; ?></td>
													<td><?php echo $data['layanan1'].", ".$data['layanan2']; ?></td>
													<td>Rp. <?php echo number_format($format);?></td>
													<td><?php echo $data['diskon'];?> %</td>
													<td>Rp. <?php echo number_format($formatt);;?></td>
													<td><?php echo date('d F Y',strtotime($tgl)); ?></td>
													<td><?php echo $data['kode_hash'];?></td>
													<td>
														<form method="post" action="">
															<a href="process.php?no_invoice=<?=$data['no_invoice']?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?')" name="delete" id="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
															<a href="surat.php?no_invoice=<?=$data['no_invoice']?>" class="btn btn-success btn-sm"><i class="fa fa-print"></i></a>
														</form>
													</td>
													
													<!-- // $no++; -->
												<?php }
																				//jika query menghasilkan nilai 0
											}else{
												echo '
												<tr>
												<td colspan"6">Tidak ada data.</td>
												</tr>
												';
											}
											?>
											
										</tbody>
									</table>
								</div>

							</div>
						</div>
						<footer class="footer pt-0">
							<div class="row align-items-center justify-content-lg-between">
								<div class="col-lg-6">
									<div class="copyright text-center  text-lg-left  text-muted">
										&copy; 2021 <a href="https://www.uniqa.id" class="font-weight-bold ml-1" target="_blank">Uniqa Indonesia</a>
									</div>
								</div>
								<div class="col-lg-6">
									<ul class="nav nav-footer justify-content-center justify-content-lg-end">
										<li class="nav-item">
											<a href="https://uniqa.id/contacts/" class="nav-link" target="_blank">Creative Tim</a>
										</li>
										<li class="nav-item">
											<a href="https://www.uniqa.id/contacts/" class="nav-link" target="_blank">About Us</a>
										</li>
										<li class="nav-item">
											<a href="https://uniqa.id/blog/" class="nav-link" target="_blank">Blog</a>
										</li>
										
									</ul>
								</div>
							</div>
						</footer>
					</div>
				</div>
			</div>
			


			<!-- Footer -->
			
		</div>
		<!-- Page content -->
		
		
		
		<script src="assets/vendor/jquery/dist/jquery.min.js"></script>
		<script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
		<script src="assets/vendor/js-cookie/js.cookie.js"></script>
		<script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
		<script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
		<!-- Optional JS -->
		<script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
		<script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
		<!-- Argon JS -->
		<script src="assets/js/argon.js?v=1.2.0"></script>

		<script src="jquery/jquery-2.2.1.js"></script>
		<script src="bootstrap/js/bootstrap.js"></script>
		<script src="bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script>
			$(function(){
				$('.timepicker').timepicker({
					showInputs: false
				})
			});
		</script>

	</body>
	</html>
