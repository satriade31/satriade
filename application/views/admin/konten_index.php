<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Konten Management</title>
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
					<div class="col-md-12">
						<div class="card mb-0">
							<div class="card-body">
								<h4 class="card-title text-center mb-4">Konten Management</h4>

								<!-- Add Konten Button -->
								<button class="btn btn-outline-success mb-3">
									<a class="mdi mdi-plus-circle" href="<?= site_url('admin/konten/tambah')?>"> Tambah
										Konten</a>
								</button>

								<div class="table-responsive">
									<table class="table table-striped table-hover">
										<thead class="thead-light">
											<tr>
												<th>No</th>
												<th>Judul</th>
												<th>Kategori</th>
												<th>Keterangan</th>
												<th>Foto</th>
												<th>Slug</th>
												<th>Tanggal</th>
												<th>Username</th>
												<th class="text-center">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1; foreach ($konten1 as $k) { ?>
											<tr>
												<th scope="row"><?= $no; ?></th>
												<td><?= htmlspecialchars($k['judul']); ?></td>
												<td><?= htmlspecialchars($k['nama_kategori']); ?></td>
												<td><?= htmlspecialchars($k['keterangan']); ?></td>
												<td>
													<?php if (!empty($k['foto'])) { ?>
													<img src="<?= base_url('upload/konten/' . $k['foto']); ?>"
														alt="Foto" class="img-thumbnail" width="150">
													<?php } else { ?>
													<span class="text-muted">Tidak ada foto</span>
													<?php } ?>
												</td>
												<td><?= htmlspecialchars($k['slug']); ?></td>
												<td><?= htmlspecialchars($k['tanggal']); ?></td>
												<td><?= htmlspecialchars($k['username']); ?></td>
												<td class="text-center">
													<!-- Tombol Hapus -->
													<a class="btn btn-outline-danger btn-sm"
														onClick="return confirm('Apakah anda yakin menghapus data ini?')"
														href="<?= base_url('admin/konten/hapus/' . $k['id_konten']); ?>">
														<i class="icon-trash"></i> Hapus
													</a>
													<!-- Tombol Edit -->
													<a class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
														data-bs-target="#edit<?= $k['id_konten']; ?>">
														<i class="mdi mdi-border-color"></i> Edit
													</a>
												</td>
											</tr>

											<!-- Edit Konten Modal -->
											<div class="modal fade" id="edit<?= $k['id_konten']; ?>" tabindex="-1"
												aria-labelledby="editKontenModalLabel<?= $k['id_konten']; ?>"
												aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title"
																id="editKontenModalLabel<?= $k['id_konten']; ?>">Edit
																Konten</h5>
															<button type="button" class="btn-close"
																data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<form action="<?= site_url('admin/konten/update'); ?>"
															method="POST" enctype="multipart/form-data">
															<div class="modal-body">
																<input type="hidden" name="id_konten"
																	value="<?= $k['id_konten']; ?>">
																<!-- Form Fields -->
																<div class="form-group">
																	<label for="judul">Judul</label>
																	<input type="text" class="form-control" id="judul"
																		name="judul" value="<?= $k['judul']; ?>"
																		required>
																</div>
																<div class="form-group">
																	<label for="keterangan">Keterangan</label>
																	<textarea class="form-control" id="keterangan"
																		name="keterangan" rows="4"
																		required><?= $k['keterangan']; ?></textarea>
																</div>
																<div class="form-group">
																	<label for="foto">Foto</label>
																	<input type="file" class="form-control" id="foto"
																		name="foto">
																	<small class="form-text text-muted">Upload foto baru
																		jika ingin mengganti.</small>
																</div>
																<div class="form-group">
																	<label for="slug">Slug</label>
																	<input type="text" class="form-control" id="slug"
																		name="slug" value="<?= $k['slug']; ?>" required>
																</div>
																<div class="form-group">
																	<label for="nama_kategori">Nama Kategori</label>
																	<input type="text" class="form-control"
																		id="nama_kategori" name="nama_kategori"
																		value="<?= $k['nama_kategori']; ?>" required>
																</div>
																<div class="form-group">
																	<label for="tanggal">Tanggal</label>
																	<input type="date" class="form-control" id="tanggal"
																		name="tanggal" value="<?= $k['tanggal']; ?>"
																		required>
																</div>
																<div class="form-group">
																	<label for="username">Username</label>
																	<input type="text" class="form-control"
																		id="username" name="username"
																		value="<?= $k['username']; ?>" required>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary"
																	data-bs-dismiss="modal">Batal</button>
																<button type="submit"
																	class="btn btn-primary">Simpan</button>
															</div>
														</form>
													</div>
												</div>
											</div>
								</div>
							</div>
							<?php $no++; } ?>
							</tbody>
							</table>
						</div>
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
