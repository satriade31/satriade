<a class="btn btn-primary mb-3" href="<?= base_url('admin/kategori/tambah') ?>">
	<i class="fas fa-plus"></i> Tambah Kategori
</a>

<div class="table-responsive">
	<table class="table table-hover table-bordered text-center">
		<thead class="thead-dark">
			<tr>
				<th style="width: 10%;">#</th>
				<th style="width: 60%;">Nama Kategori</th>
				<th style="width: 30%;">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php if (!empty($kategori)) : ?>
				<?php foreach ($kategori as $index => $row) : ?>
					<tr>
						<td><?= $index + 1; ?></td>
						<td><?= htmlspecialchars($row['nama_kategori'], ENT_QUOTES, 'UTF-8'); ?></td>
						<td>
							<!-- Tombol Edit -->
							<a class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editKategori<?= $row['id_kategori']; ?>">
								<i class="mdi mdi-border-color"></i> Edit
							</a>

							<!-- Tombol Hapus -->
							<a href="<?= base_url('admin/kategori/hapus/' . $row['id_kategori']); ?>" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Yakin ingin menghapus?');">
								<i class="fas fa-trash"></i> Hapus
							</a>

							<!-- Modal Edit -->
							<div class="modal fade" id="editKategori<?= $row['id_kategori']; ?>" tabindex="-1" aria-labelledby="editKategoriModalLabel<?= $row['id_kategori']; ?>" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="editKategoriModalLabel<?= $row['id_kategori']; ?>">Edit Kategori</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<form action="<?= site_url('admin/kategori/update'); ?>" method="POST" enctype="multipart/form-data">
											<div class="modal-body">
												<input type="hidden" name="id_kategori" value="<?= $row['id_kategori']; ?>">

												<div class="form-group">
													<label for="namaKategori<?= $row['id_kategori']; ?>">Nama Kategori</label>
													<input type="text" class="form-control" id="namaKategori<?= $row['id_kategori']; ?>" name="nama_kategori" value="<?= htmlspecialchars($row['nama_kategori'], ENT_QUOTES, 'UTF-8'); ?>" required>
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
						</td>
					</tr>
				<?php endforeach; ?>
			<?php else : ?>
				<tr>
					<td colspan="3">Data kategori tidak ditemukan.</td>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>
</div>
