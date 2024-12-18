<div class="container mt-4">
    <h3>Tambah Konten</h3>
    <form method="POST" action="<?= site_url('admin/konten/simpan'); ?>" enctype="multipart/form-data">
        <!-- Form Input for Judul -->
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" required>
        </div>

        <!-- Form Input for Kategori -->
        <div class="form-group">
            <label for="kategori">Kategori</label>
            <select class="form-control" id="kategori" name="nama_kategori" required>
                <?php foreach ($kategori as $k) { ?>
                    <option value="<?= $k['nama_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                <?php } ?>
            </select>
        </div>

        <!-- Form Input for Keterangan -->
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" required></textarea>
        </div>

        <!-- Form Input for Foto -->
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
        </div>

        <!-- Form Buttons -->
        <button type="submit" class="btn btn-primary">Simpan Konten</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
    </form>
</div>
