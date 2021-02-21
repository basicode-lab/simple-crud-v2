<div class="container mt-3">
  <div class="row">
    <div class="col-lg-12">
    <?= $this->session->flashdata('pesan'); ?>
      <div class="card border-primary mb-3">
        <div class="card-header bg-primary text-light"><a href="<?= base_url('siswa/tambahsiswa'); ?>" class="btn btn-success"><i class="fas fa-user-plus"></i> Tambah data siswa</a></div>
        <div class="card-body text-primary">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">NIS</th>
                <th scope="col">Nama</th>
                <th scope="col">Kelas</th>
                <th style="text-align: center;" scope="col">Aksi</th>
              </tr>
            </thead>
            <?php if($siswa == null) : ?>
              <td colspan="5" style="text-align: center;">Tidak ada data</td>
            <?php endif; ?>
            <?php 
            $i = $this->uri->segment(3) + 1;
            foreach($siswa as $s) : ?>
              <tbody>
                <tr>
                  <th scope="row"><?= $i++; ?></th>
                  <td><?= $s['nis']; ?></td>
                  <td><?= $s['nama']; ?></td>
                  <td><?= $s['kelas']; ?></td>
                  <td style="text-align: center; width:300px;">  
                    <a href="<?= base_url('siswa/lihatsiswa/' . $s['nis']); ?>" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Lihat</a>
                    <a href="<?= base_url('siswa/ubahsiswa/' . $s['nis']); ?>" class="btn btn-warning btn-sm"><i class="fas fa-user-edit"></i> Ubah</a>
                    <a href="<?= base_url('siswa/hapussiswa/' . $s['nis']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data siswa ini?')"><i class="fas fa-trash"></i> Hapus</a>
                  </td>
                </tr>
              </tbody>
            <?php endforeach; ?>
          </table>
          <?= $this->pagination->create_links(); ?>
        </div>
      </div>
    </div>
  </div>
</div>