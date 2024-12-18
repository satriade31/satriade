<a class="btn btn-primary m-2" href="<?= base_url('admin/user/tambah') ?>">Tambah User</a>
<div class="col-lg-8">
	<div class="card">
		<div class="card-body">
			<h5 class="card-title">Data Pengguna</h5>
			<div class="table-responsive">
				<table class="table text-nowrap align-middle mb-0">
					<thead>
						<tr class="border-2 border-bottom border-primary border-0">
							<th scope="col">Username</th>
							<th scope="col">Nama</th>
							<th scope="col">Level</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody class="table-group-divider">
						<?php foreach($user as $aa) { ?>
						<tr>
							<td><?= $aa['username']?></td>
							<td><?= $aa['nama']?></td>
							<td><?= $aa['level']?></td>
							<td>
								<!-- Edit Button that triggers the modal -->
								<a class="btn btn-warning btn-sm" data-bs-toggle="modal"
									data-bs-target="#editModal<?= $aa['id_user'] ?>">Edit</a>
								<a href="<?= base_url('admin/user/hapus/'.$aa['id_user']) ?>"
									class="btn btn-danger btn-sm"
									onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');">Hapus</a>
							</td>
						</tr>

						<!-- Edit Modal for each user -->
						<div class="modal fade" id="editModal<?= $aa['id_user'] ?>" tabindex="-1"
							aria-labelledby="editModalLabel<?= $aa['id_user'] ?>" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="editModalLabel<?= $aa['id_user'] ?>">Edit User:
											<?= $aa['username'] ?></h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal"
											aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<form method="POST" action="<?= base_url('admin/user/edit/'.$aa['id_user']) ?>">
											<input type="hidden" name="id_user" value="<?= $aa['id_user'] ?>">

											<div class="mb-3">
												<label for="username<?= $aa['id_user'] ?>"
													class="form-label">Username</label>
												<input type="text" class="form-control"
													id="username<?= $aa['id_user'] ?>" name="username"
													value="<?= $aa['username'] ?>" required>
											</div>

											<div class="mb-3">
												<label for="nama<?= $aa['id_user'] ?>" class="form-label">Nama</label>
												<input type="text" class="form-control" id="nama<?= $aa['id_user'] ?>"
													name="nama" value="<?= $aa['nama'] ?>" required>
											</div>

											<div class="mb-3">
												<label for="level<?= $aa['id_user'] ?>" class="form-label">Level</label>
												<input type="text" class="form-control" id="level<?= $aa['id_user'] ?>"
													name="level" value="<?= $aa['level'] ?>" readonly required>
											</div>

											<button type="submit" class="btn btn-primary">Save Changes</button>
										</form>
									</div>
								</div>
							</div>
						</div>

						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
