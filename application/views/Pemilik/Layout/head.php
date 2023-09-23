<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>CV. BUANA PUTRA CIREMAI</title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="<?= base_url('asset/plus-admin/') ?>assets/vendors/mdi/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="<?= base_url('asset/plus-admin/') ?>assets/vendors/flag-icon-css/css/flag-icon.min.css">
	<link rel="stylesheet" href="<?= base_url('asset/plus-admin/') ?>assets/vendors/css/vendor.bundle.base.css">
	<!-- endinject -->
	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="<?= base_url('asset/plus-admin/') ?>assets/vendors/jquery-bar-rating/css-stars.css" />
	<link rel="stylesheet" href="<?= base_url('asset/plus-admin/') ?>assets/vendors/font-awesome/css/font-awesome.min.css" />
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<!-- endinject -->
	<!-- Layout styles -->
	<link rel="stylesheet" href="<?= base_url('asset/plus-admin/') ?>assets/css/demo_2/style.css" />
	<!-- End layout styles -->
	<link rel="shortcut icon" href="<?= base_url('asset/plus-admin/') ?>assets/images/favicon.png" />
	<link href="<?= base_url('asset/') ?>datatables.min.css" rel="stylesheet">
</head>

<body>
	<div class="container-scroller">
		<!-- partial:partials/_horizontal-navbar.html -->
		<div class="horizontal-menu">
			<nav class="navbar top-navbar col-lg-12 col-12 p-0">
				<div class="container">
					<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
						<a class="navbar-brand brand-logo" href="index.html">
							<img src="<?= base_url('asset/logo2.jpg') ?>" alt="logo" />
						</a>
						<a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?= base_url('asset/plus-admin/') ?>assets/images/logo-mini.svg" alt="logo" /></a>
					</div>
					<div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">

						<ul class="navbar-nav navbar-nav-right">
							<li class="nav-item nav-profile dropdown">
								<a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
									<div class="nav-profile-img">
										<img src="<?= base_url('asset/plus-admin/') ?>assets/images/faces/face1.jpg" alt="image" />
									</div>
									<div class="nav-profile-text">
										<p class="text-black font-weight-semibold m-0"> Pemilik Perusahaan </p>
										<span class="font-13 online-color">online <i class="mdi mdi-chevron-down"></i></span>
									</div>
								</a>
								<div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">

									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="<?= base_url('cLogin/logout') ?>">
										<i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
								</div>
							</li>
						</ul>
						<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
							<span class="mdi mdi-menu"></span>
						</button>
					</div>
				</div>
			</nav>
			<nav class="bottom-navbar">
				<div class="container">
					<ul class="nav page-navigation">
						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('Pemilik/cDashboard') ?>">
								<i class="mdi mdi-compass-outline menu-icon"></i>
								<span class="menu-title">Dashboard</span>
							</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('Pemilik/cLaporan') ?>">

								<i class="mdi mdi-book menu-icon"></i>
								<span class="menu-title">Laporan Transaksi</span>
							</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('Pemilik/cLaporanPeramalan') ?>">
								<i class="mdi mdi-chart-bar menu-icon"></i>
								<span class="menu-title">Laporan Peramalan</span>
							</a>
						</li>

					</ul>
				</div>
			</nav>
		</div>