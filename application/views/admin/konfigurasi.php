

<div class="container mt-4">
    <h3>Konfigurasi</h3>
    <form method="POST" action="<?= base_url('admin/konfigurasi/update') ?>">
        <!-- Form Input for Judul -->
        <div class="form-group">
            <label for="judul">Judul Website</label>
            <input type="text" class="form-control" id="judul" name="judul_website" value="<?= $konfig->judul_website; ?>"/>
        </div>

        <!-- Form Input for Kategori -->

        <!-- Form Input for Keterangan -->
        <div class="form-group">
            <label for="profil_website">Profile</label>
            <textarea class="form-control" id="profil_website" name="profil_website"><?= $konfig->profil_website; ?></textarea>
        </div>
        <div class="form-group">
            <label for="judul">Facebook</label>
            <input type="text" class="form-control" id="facebook" name="facebook" value="<?= $konfig->facebook; ?>"/>
        </div>
        <div class="form-group">
            <label for="judul">Instagram</label>
            <input type="text" class="form-control" id="instagram" name="instagram" value="<?= $konfig->instagram; ?>"/>
        </div>
        <div class="form-group">
            <label for="judul">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $konfig->email; ?>"/>
        </div>
        <div class="form-group">
            <label for="judul">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $konfig->alamat; ?>"/>
        </div>
        <div class="form-group">
            <label for="judul">WhatsApp</label>
            <input type="text" class="form-control" id="no_wa" name="no_wa" value="<?= $konfig->no_wa; ?>"/>
        </div>

        <!-- Form Input for Foto -->

        <!-- Form Buttons -->
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
    </form>
</div>
