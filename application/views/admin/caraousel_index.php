<form action="<?= site_url('admin/caraousel/simpan'); ?>" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label for="judul">Judul</label>
		<input type="text" class="form-control" id="judul" name="judul" value="<?= $aa['judul']; ?>" required>
	</div>
	<div class="form-group">
		<label for="judul1">Judul</label>
		<input type="text" class="form-control" id="judul1" name="judul1" value="<?= $aa['judul1']; ?>" required>
	</div>
	<div class="form-group">
		<label for="foto">Unggah File</label>
		<input type="file" class="form-control" id="foto" name="foto" accept=".jpg, .jpeg, .png, .gif" required>
		<small class="form-text text-muted">Pilih foto dengan ukuran (1:3)</small>
	</div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-primary">Unggah</button>
	</div>
</form>
<br>

<!-- Card Section -->
<?php foreach ($caraousel as $aa) { ?>
<div class="card h-100">
	<img src="<?= base_url('upload/caraousel/' . $aa['foto']); ?>" class="card-img-top" alt="Foto">
	<div class="card-body">
		<h5 class="card-title"><?= htmlspecialchars($aa['judul']); ?></h5>
		<h5 class="card-title"><?= htmlspecialchars($aa['judul1']); ?></h5>
		
		<td class="text-center">
			<!-- Tombol Hapus -->
			<a class="btn btn-outline-danger btn-sm" onClick="return confirm('Apakah anda yakin menghapus data ini?')"
				href="<?= base_url('admin/caraousel/hapus/' . $aa['id_caraousel']); ?>">
				<i class="icon-trash"></i> Hapus
			</a>
			<!-- Tombol Edit -->
			<a class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
				data-bs-target="#editcaraousel<?= $aa['id_caraousel']; ?>">
				<i class="mdi mdi-border-color"></i> Edit
			</a>
			<div class="modal fade" id="editcaraousel<?= $aa['id_caraousel']; ?>" tabindex="-1"
				aria-labelledby="editCaraouselModalLabel<?= $aa['id_caraousel']; ?>" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="editCaraouselModalLabel<?= $aa['id_caraousel']; ?>">Edit
								Caraousel</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<form action="<?= site_url('admin/Caraousel/update'); ?>" method="POST"
							enctype="multipart/form-data">
							<div class="modal-body">
								<input type="hidden" name="id_caraousel" value="<?= $aa['id_caraousel']; ?>">
								<!-- Form Fields -->
								<div class="form-group">
									<label for="judul">Judul</label>
									<input type="text" class="form-control" id="judul" name="judul"
										value="<?= $aa['judul']; ?>" required>
								</div>
								<div class="form-group">
									<label for="judul1">Judul1</label>
									<input type="text" class="form-control" id="judul1" name="judul1"
										value="<?= $aa['judul1']; ?>" required>
								</div>
								
								<div class="form-group">
									<label for="foto">Foto</label>
									<input type="file" class="form-control" id="foto" name="foto">
									<small class="form-text text-muted">Upload foto baru
										jika ingin mengganti.</small>
								</div>
								
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
								<button type="submit" class="btn btn-primary">Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
	</div>
</div>
<?php } ?>
