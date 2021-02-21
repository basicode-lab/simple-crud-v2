<?php 
  class Siswa extends CI_Controller
  {
    public function __construct()
    {
      parent::__construct();
      $this->load->model('Siswa_model');
    }

    public function index()
    {
      $data['title'] = "Kelola data siswa";
      $jumlahData    = $this->Siswa_model->jumlahData();
      $config        = [
        'base_url'  => base_url('index.php/siswa/index/'),
        'total_rows'=> $jumlahData,
        'per_page'  => 10
      ];
      $this->load->library('pagination', $config);
      $from          = $this->uri->segment(3);
      $data['siswa'] = $this->Siswa_model->getData($config['per_page'], $from);
      $this->load->view('layouts/header', $data);
      $this->load->view('layouts/navbar');
      $this->load->view('siswa/index', $data);
      $this->load->view('layouts/footer');
    }

    public function tambahsiswa()
    {
      $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
        'required'  => 'Nama lengkap tidak boleh kosong'
      ]);
      $this->form_validation->set_rules('nis', 'Nis', 'required|is_unique[siswa.nis]', [
        'required'  => 'Nama lengkap tidak boleh kosong'
      ]);
      $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
        'required'  => 'Alamat tidak boleh kosong'
      ]);
      $this->form_validation->set_rules('hp', 'Nomer Hp', 'required|trim|numeric', [
        'required'  => 'Nomer Handphone tidak boleh kosong',
        'numeric'   => 'Nomer harus berisi angka'
      ]);
      if ($this->form_validation->run() == false) {
        $data['title'] = "Tambah data siswa";
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/navbar');
        $this->load->view('siswa/tambah_siswa');
        $this->load->view('layouts/footer');
      }else {
        $uploadGambar = $_FILES['gambar']['name'];
        if ($uploadGambar) {
          $config['allowed_types']    = 'jpg|png|jpeg';
          $config['upload_path']      = './assets/img/siswa/';
          $config['max_size']         = 2048;
          $config['file_ext_tolower'] = TRUE;
          $this->upload->initialize($config);
          if ($this->upload->do_upload('gambar')) {
            $this->Siswa_model->tambahDataSiswa();
            $this->session->set_flashdata('pesan', '
              <div class="alert alert-success" role="alert">
                Data dan gambar siswa berhasil ditambahkan
              </div>
            ');
            redirect('siswa/tambahsiswa');
          }else {
            $this->session->set_flashdata('pesan', '
              <div class="alert alert-danger pb-0" role="alert">
                '.$this->upload->display_errors().'
              </div>
            ');
            redirect('siswa/tambahsiswa');
          }
        }else {
          $this->session->set_flashdata('pesan', '
            <div class="alert alert-danger" role="alert">
              Gambar siswa harus diupload
            </div>
          ');
          redirect('siswa/tambahsiswa');
        }
      }
    }

    public function hapussiswa($nis)
    {
      $data['siswa'] = $this->Siswa_model->getDataNis($nis);
      $gambarLama = $data['siswa']['gambar'];
      $this->Siswa_model->hapusDataSiswa($nis, $gambarLama);
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-success" role="alert">
          Data siswa berhasil dihapus
        </div>
      ');
      redirect('siswa');
    }

    public function lihatsiswa($nis)
    {
      $data['siswa'] = $this->Siswa_model->getDataNis($nis);
      $data['title'] = "Detail lengkap data siswa";
      $this->load->view('layouts/header', $data);
      $this->load->view('layouts/navbar');
      $this->load->view('siswa/lihat_siswa');
      $this->load->view('layouts/footer');
    }

    public function ubahsiswa($nis)
    {
      $data['siswa'] = $this->Siswa_model->getDataNis($nis);
      $data['kelas'] = ['X', 'XI', 'XII'];
      $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
        'required'  => 'Nama lengkap tidak boleh kosong'
      ]);
      $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
        'required'  => 'Alamat tidak boleh kosong'
      ]);
      $this->form_validation->set_rules('hp', 'Nomer Hp', 'required|trim|numeric', [
        'required'  => 'Nomer Handphone tidak boleh kosong',
        'numeric'   => 'Nomer harus berisi angka'
      ]);
      if ($this->form_validation->run() == false) {
        $data['title'] = "Ubah data siswa";
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/navbar');
        $this->load->view('siswa/ubah_siswa', $data);
        $this->load->view('layouts/footer');
      }else {
        $uploadGambar = $_FILES['gambar']['name'];
        if ($uploadGambar) {
          $config = [
            'allowed_types' => 'jpg|png|jpeg',
            'upload_path'   => './assets/img/siswa/',
            'max_size'      => 4096,
            'file_ext_tolower' => TRUE
          ];
          $this->upload->initialize($config);
          if ($this->upload->do_upload('gambar')) {
            $gambarLama = $data['siswa']['gambar'];
            if ($gambarLama) {
              unlink(FCPATH . 'assets/img/siswa/' . $gambarLama);
            }
            $gambarBaru = $this->upload->data('file_name');
            $this->Siswa_model->ubahDataGambarSiswa($nis, $gambarBaru);
            $this->Siswa_model->ubahDataSiswa($nis);
            $this->session->set_flashdata('pesan', '
              <div class="alert alert-success" role="alert">
                Data dan gambar siswa berhasil diubah
              </div>
            ');
            redirect('siswa');
          }else {
            $this->session->set_flashdata('pesan', '
              <div class="alert alert-danger pb-0" role="alert">
                '.$this->upload->display_errors().'
              </div>
            ');
            redirect('siswa');
          }
        }else {
          $this->Siswa_model->ubahDataSiswa($nis);
          $this->session->set_flashdata('pesan', '
            <div class="alert alert-success" role="alert">
              Data siswa berhasil diubah
            </div>
          ');
          redirect('siswa');
        }
      }
    }
  }
?>