<div class="container mt-3">
  <div class="row">
    <div class="col-sm-12">
    <?php if(validation_errors()) : ?>
      <div class="alert alert-danger pb-0" role="alert">
      <?= validation_errors(); ?>
      </div>
    <?php endif; ?>
    <?= $this->session->flashdata('pesan'); ?>
      <?= form_open_multipart('siswa/tambahsiswa'); ?>
        <div class="card">
          <div class="card-header">Form Input data</div>
          <div class="card-body">
            <div class="mb-3">
              <label for="nis" class="form-label">NIS Siswa</label>
              <input type="text" class="form-control" id="nis" name="nis" value="<?= rand(10000, 99999); ?>" readonly>
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">Nama lengkap Siswa</label>
              <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>" autocomplete="off" autofocus>
            </div>
            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat Siswa</label>
              <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= set_value('alamat'); ?></textarea>
            </div>
            <div class="mb-3">
              <label for="hp" class="form-label">Nomer Handphone Siswa</label>
              <input type="text" class="form-control" id="hp" name="hp" value="<?= set_value('hp'); ?>" autocomplete="off">
            </div>
            <div class="mb-3">
              <label for="kelas" class="form-label">Kelas siswa</label>
              <select class="form-select" aria-label="Default select example" name="kelas">
                <option selected disabled>--Pilih--</option>
                <option value="X">X</option>
                <option value="XI">XI</option>
                <option value="XII">XII</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="gambar" class="form-label">Gambar siswa</label>
              <input class="form-control" type="file" id="gambar" name="gambar">
            </div>
            <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save"></i> Tambah data</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>