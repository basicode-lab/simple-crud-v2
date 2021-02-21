<div class="container mt-3">
  <div class="row">
    <div class="col-sm-12">
    <?php if(validation_errors()) : ?>
      <div class="alert alert-danger pb-0" role="alert">
      <?= validation_errors(); ?>
      </div>
    <?php endif; ?>
    <?= $this->session->flashdata('pesan'); ?>
      <?= form_open_multipart('siswa/ubahsiswa/' . $siswa['nis']); ?>
        <div class="card">
          <div class="card-header">Form ubah data</div>
          <div class="card-body">
            <div class="mb-3">
              <label for="nis" class="form-label">NIS Siswa</label>
              <input type="text" class="form-control" id="nis" name="nis" value="<?= $siswa['nis'] ?>" readonly>
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">Nama lengkap Siswa</label>
              <input type="text" class="form-control" id="nama" name="nama" value="<?= $siswa['nama']; ?>" autocomplete="off" autofocus>
            </div>
            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat Siswa</label>
              <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= $siswa['alamat']; ?></textarea>
            </div>
            <div class="mb-3">
              <label for="hp" class="form-label">Nomer Handphone Siswa</label>
              <input type="text" class="form-control" id="hp" name="hp" value="<?= $siswa['no_hp']; ?>" autocomplete="off">
            </div>
            <div class="mb-3">
              <label for="kelas" class="form-label">Kelas siswa</label>
              <select class="form-select" aria-label="Default select example" name="kelas">
                <option selected disabled>--Pilih--</option>
                <?php foreach($kelas as $k) : ?>
                  <?php if($k == $siswa['kelas']) : ?>
                    <option value="<?= $k; ?>" selected><?= $k; ?></option>
                  <?php else : ?>
                    <option value="<?= $k; ?>"><?= $k; ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="row mb-3">
              <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
              <div class="row">
                <div class="col-sm-3">
                  <img src="<?= base_url('assets/img/siswa/' . $siswa['gambar']); ?>" alt="Gamabr siswa" class="img-thumbnail">
                </div>
                <div class="col-sm-9">
                  <input type="file" name="gambar" id="gambar" class="form-control">
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-warning mt-2"><i class="fas fa-save"></i> Ubah data</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>