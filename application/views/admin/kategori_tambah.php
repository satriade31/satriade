<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SeoDash Free Bootstrap Admin Template by Adminmart</title>
	<link rel="shortcut icon" type="image/png"
		href="<?= base_url('assets/template/src') ?>/assets/images/logos/seodashlogo.png" />
	<link rel="stylesheet" href="<?= base_url('assets/template/src') ?>/assets/css/styles.min.css" />
</head>

<body>
	<!-- Body Wrapper -->
	<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
		data-sidebar-position="fixed" data-header-position="fixed">
		<div
			class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
			<div class="d-flex align-items-center justify-content-center w-100">
				<div class="row justify-content-center w-100">
					<div class="col-md-8 col-lg-6 col-xxl-3">
						<div class="card mb-0">
							<div class="card-body">
								<a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
									<img src="<?= base_url('assets/template/src') ?>/assets/images/logos/logo-light.svg"
										alt="">
								</a>
								<p class="text-center">Your Social Campaigns</p>
								<!-- Form Sign-Up -->
								<form method="POST" action="<?= base_url('admin/kategori/simpan') ?>">
									<div class="mb-3">
										<label for="nama_kategori" class="form-label">Nama Kategori</label>
										<input type="text" class="form-control" id="nama_kategori" name="nama_kategori"
											required>
									</div>
									<button type="submit" class="btn btn-primary">Simpan</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="<?= base_url('assets/template/src') ?>/assets/libs/jquery/dist/jquery.min.js"></script>
	<script src="<?= base_url('assets/template/src') ?>/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>
