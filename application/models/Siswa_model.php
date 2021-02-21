<?php 
  class Siswa_model extends CI_Model
  {
    public function getData($limit, $offset)
    {
      return $this->db->get('siswa', $limit, $offset)->result_array();
    }

    public function tambahDataSiswa()
    {
      $data = [
        'nis' => htmlspecialchars($this->input->post('nis'), true),
        'nama' => htmlspecialchars($this->input->post('nama'), true),
        'gambar' => $this->upload->data('file_name'),
        'alamat' => htmlspecialchars($this->input->post('alamat'), true),
        'no_hp' => htmlspecialchars($this->input->post('hp'), true),
        'kelas' => $this->input->post('kelas')
      ];
      return $this->db->insert('siswa', $data);
    }

    public function hapusDataSiswa($nis, $gambarLama)
    {
      unlink(FCPATH . 'assets/img/siswa/' . $gambarLama);
      return $this->db->delete('siswa', ['nis' => $nis]);
    }

    public function getDataNis($nis)
    {
      return $this->db->get_where('siswa', ['nis' => $nis])->row_array();
    }

    public function ubahDataSiswa($nis)
    {
      $data = [
        'nama'  => htmlspecialchars($this->input->post('nama'), true),
        'alamat'  => htmlspecialchars($this->input->post('alamat'), true),
        'no_hp'  => htmlspecialchars($this->input->post('hp'), true),
        'kelas' => $this->input->post('kelas')
      ];
      $this->db->set($data);
      $this->db->where('nis', $nis);
      return $this->db->update('siswa');
    }

    public function ubahDataGambarSiswa($nis, $gambarBaru)
    {
      $this->db->set('gambar', $gambarBaru);
      $this->db->where('nis', $nis);
      return $this->db->update('siswa');
    }

    public function jumlahData()
    {
      return $this->db->get('siswa')->num_rows();
    }
  }
?>