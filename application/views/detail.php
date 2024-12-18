<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title><?= $judul; ?></title>
	<meta name="description" content="">
	<meta name="keywords" content="">

	<link href="<?= base_url('assets/front')?>/assets/img/favicon.png" rel="icon">
	<link href="<?= base_url('assets/front')?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

	<link href="https://fonts.googleapis.com" rel="preconnect">
	<link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Marcellus:wght@400&display=swap"
		rel="stylesheet">


	<link href="<?= base_url('assets/front')?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/front')?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="<?= base_url('assets/front')?>/assets/vendor/aos/aos.css" rel="stylesheet">
	<link href="<?= base_url('assets/front')?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/front')?>/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

	<link href="<?= base_url('assets/front')?>/assets/css/main.css" rel="stylesheet">


	<!-- =======================================================
  * Template Name: AgriCulture
  * Template URL: https://bootstrapmade.com/agriculture-bootstrap-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="blog-page">
	<header id="header" class="header d-flex align-items-center position-relative">
		<div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

			<!-- Logo -->
			<a href="index.html" class="logo d-flex align-items-center">
				<img src="<?= base_url('assets/front')?>/assets/img/ad1.png" alt="AgriCulture">
			</a>
			<!-- Navigation Menu -->
			<nav id="navmenu" class="navmenu">
				<ul>
					<li><a href="<?= base_url() ?>">Home</a></li>
				</ul>
				<i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
			</nav>
			<!-- Login Button -->
			<div class="search-widget widget-item">
				<form action="<?= base_url('home/search') ?>" method="get">
					<input type="text" name="q" placeholder="Search for posts..." required>
					<button type="submit" title="Search"><i class="bi bi-search"></i></button>
				</form>
			</div>

		</div>
	</header>

	<main class="main">

		<!-- Blog Posts 2 Section -->
		<div class="container">
			<div class="widgets-container">
			</div>
			<div class="row">

				<div class="col-lg-8">

					<!-- Blog Details Section -->
					<section id="blog-details" class="blog-details section">
						<div class="container">

							<article class="article">

								<div class="post-img">
									<img src="<?= base_url('upload/konten/' . $konten1->foto); ?>" alt=""
										class="img-fluid">
								</div>

								<h2 class="title"><?= $konten1->judul; ?></h2>

								<div class="meta-top">
									<ul>
										<li class="d-flex align-items-center"><i class="bi bi-person"></i>
											<a href="blog-details.html"><?= $konten1->nama_kategori; ?></a></li>
										<li class="d-flex align-items-center"><i class="bi bi-clock"></i>
											<a href="blog-details.html"><time
													datetime="2020-01-01"><?= $konten1->tanggal; ?></time></a></li>
									</ul>
								</div><!-- End meta top -->

								<div class="content">
									<h6>
										<?= $konten1->keterangan; ?>
									</h6>

								</div><!-- End post content -->

								<div class="meta-bottom">
								</div><!-- End meta bottom -->

							</article>


						</div>
					</section><!-- /Blog Details Section -->
					<div class="widgets-container">
					</div>

				</div>
				<div class="col-lg-4 sidebar">

					<div class="widgets-container">


						<!-- Categories Widget -->
						<div class="categories-widget widget-item">

							<h3 class="widget-title">Categories</h3>
							<ul class="mt-3">
								<?php foreach ($kategori as $kate) { ?>
								<li><a href="<?= base_url('home/kategori/'.$kate['nama_kategori']) ?>">
										<?= $kate['nama_kategori'] ?>
									</a></li>
								<?php } ?>
							</ul>

						</div>
						<!--/Categories Widget -->
					</div>
				</div>
	</main>

	<footer id="footer" class="footer dark-background">

		<div class="footer-top">
			<div class="container">
				<div class="row gy-4">
					<div class="col-lg-8 col-md-6 footer-about">
						<a href="index.html" class="logo d-flex align-items-center">
							<span class="sitename"><?= $konfig->judul_website; ?></span>
						</a>
						<div class="footer-contact pt-3">
							<p><?= $konfig->profil_website; ?></p>
							<p class="mt-3"><strong>Phone:</strong> <span>+<?= $konfig->no_wa; ?></span></p>
							<p><strong>Email:</strong> <span><?= $konfig->email; ?></span></p>
						</div>
					</div>

					<div class="col-lg-2 col-md-3 footer-links">
						<h4>Lokasi</h4>
						<ul>
							<?php foreach($kategori as $ktr) { ?>
								<li><a href="<?= base_url('home/kategori/'.$ktr['nama_kategori']) ?>"><?= $ktr['nama_kategori'] ?></a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="copyright text-center">
			<div
				class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

				<div class="d-flex flex-column align-items-center align-items-lg-start">
					<div>
						© Copyright <strong><span>MyWebsite</span></strong>. All Rights Reserved
					</div>
					<div class="credits">
						<!-- All the links in the footer should remain intact. -->
						<!-- You can delete the links only if you purchased the pro version. -->
						<!-- Licensing information: https://bootstrapmade.com/license/ -->
						<!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
						Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed by <a
							href="https://themewagon.com">ThemeWagon</a>
					</div>
				</div>

				<div class="social-links order-first order-lg-last mb-3 mb-lg-0">
					<a href=""><i class="bi bi-twitter-x"></i></a>
					<a href=""><i class="bi bi-facebook"></i></a>
					<a href=""><i class="bi bi-instagram"></i></a>
					<a href=""><i class="bi bi-linkedin"></i></a>
				</div>

			</div>
		</div>

	</footer>

	<!-- Scroll Top -->
	<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
			class="bi bi-arrow-up-short"></i></a>

	<!-- Preloader -->
	<div id="preloader"></div>

	<!-- Vendor JS Files -->
	<script src="<?= base_url('assets/front')?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url('assets/front')?>/assets/vendor/php-email-form/validate.js"></script>
	<script src="<?= base_url('assets/front')?>/assets/vendor/aos/aos.js"></script>
	<script src="<?= base_url('assets/front')?>/assets/vendor/swiper/swiper-bundle.min.js"></script>
	<script src="<?= base_url('assets/front')?>/assets/vendor/glightbox/js/glightbox.min.js"></script>

	<!-- Main JS File -->
	<script src="<?= base_url('assets/front')?>/assets/js/main.js"></script>

</body>

</html>
