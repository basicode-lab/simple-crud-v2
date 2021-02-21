<div class="container mt-3">
  <div class="row">
    <div class="col-lg-6">
      <div class="card mb-3" style="max-width: 540px;">
      <div class="card-header"><?= $siswa['nama']; ?></div>
        <div class="row g-0">
          <div class="col-md-4">
            <img src="<?= base_url('assets/img/siswa/' . $siswa['gambar']); ?>" alt="foto siswa" class="img-thumbnail">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <table>
                <tr>
                  <td class="card-text">NIS</td>
                  <td>: </td>
                  <td><?= $siswa['nis']; ?></td>
                </tr>
                <tr>
                  <td class="card-text">Alamat</td>
                  <td>: </td>
                  <td><?= $siswa['alamat']; ?></td>
                </tr>
                <tr>
                  <td class="card-text">Nomer HP</td>
                  <td>: </td>
                  <td><?= $siswa['no_hp']; ?></td>
                </tr>
                <tr>
                  <td class="card-text">Kelas</td>
                  <td>: </td>
                  <td><?= $siswa['kelas']; ?></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
      <a href="<?= base_url('siswa'); ?>" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
  </div>
</div>