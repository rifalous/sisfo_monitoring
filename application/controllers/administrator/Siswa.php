<?php

class Siswa extends CI_Controller{

  public function index(){
    $data['siswa'] = $this->siswa_model->tampil_data('siswa')->result();
    // $data['kelas'] = $this->prodi_model->tampil_data('kelas')->result();
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/siswa', $data);
    $this->load->view('templates_administrator/footer');
  }

  public function detail($id){
    $data['detail'] = $this->siswa_model->ambil_id_siswa($id);
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/siswa_detail', $data);
    $this->load->view('templates_administrator/footer');
  }

  public function tambah_siswa(){
    // $data['prodi'] = $this->siswa_model->tampil_data('prodi')->result();
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/siswa_form');
    $this->load->view('templates_administrator/footer');
  }

  public function tambah_siswa_aksi(){
    $this->_rules();
    if($this->form_validation->run() == FALSE){
      $this->tambah_siswa();
    }
    else{
      $nama_lengkap  = $this->input->post('nama_lengkap');
      $kelas         = $this->input->post('kelas');
      $alamat        = $this->input->post('alamat');
      $email         = $this->input->post('email');
      $telepon       = $this->input->post('telepon');
      $tempat_lahir  = $this->input->post('tempat_lahir');
      $tanggal_lahir = $this->input->post('tanggal_lahir');
      $jenis_kelamin = $this->input->post('jenis_kelamin');
      $photo         = $_FILES['photo'];
      if($photo=''){
      }
      else{
        $config['upload_path']   = './assets/uploads';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|tiff';

        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('photo')){
          echo "Gagal Upload!";
          die();
        }
        else{
          $photo = $this->upload->data('file_name');
        }
      }

      $data = array(
        'nama_lengkap'  => $nama_lengkap,
        'kelas'         => $kelas,
        'alamat'        => $alamat,
        'email'         => $email,
        'telepon'       => $telepon,
        'tempat_lahir'  => $tempat_lahir,
        'tanggal_lahir' => $tanggal_lahir,
        'jenis_kelamin' => $jenis_kelamin,
        'photo'         => $photo,
      );

      $this->siswa_model->insert_data($data, 'siswa');
      $this->session->set_flashdata(
        'pesan',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Data siswa berhasil ditambahkan
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
      );
      redirect('administrator/siswa');
    }
  }

  public function update($id){
    $where = array('id' => $id);

    $data['siswa'] = $this->db->query("SELECT * FROM siswa sw WHERE sw.id='$id'")->result();
    // $data['prodi']     = $this->siswa_model->tampil_data('prodi')->result();
    $data['detail']    = $this->siswa_model->ambil_id_siswa($id);
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/siswa_update', $data);
    $this->load->view('templates_administrator/footer');
  }

  public function update_siswa_aksi(){
    $this->_rules();

    if($this->form_validation->run() == FALSE){
      $this->update();
    }
    else{
      $id            = $this->input->post('id');
      $nama_lengkap  = $this->input->post('nama_lengkap');
      $kelas         = $this->input->post('kelas');
      $alamat        = $this->input->post('alamat');
      $email         = $this->input->post('email');
      $telepon       = $this->input->post('telepon');
      $tempat_lahir  = $this->input->post('tempat_lahir');
      $tanggal_lahir = $this->input->post('tanggal_lahir');
      $jenis_kelamin = $this->input->post('jenis_kelamin');
      $photo         = $_FILES['userfile']['name'];
      if($photo){
        $config['upload_path']   = './assets/uploads';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|tiff';

        $this->load->library('upload', $config);
        if($this->upload->do_upload('userfile')){
          $userfile = $this->upload->data('file_name');
          $this->db->set('photo', $userfile);
        }
        else{
          echo "Gagal upload!";
        }
      }

      $data = array(
        'nama_lengkap'  => $nama_lengkap,
        'kelas'         => $kelas,
        'alamat'        => $alamat,
        'email'         => $email,
        'telepon'       => $telepon,
        'tempat_lahir'  => $tempat_lahir,
        'tanggal_lahir' => $tanggal_lahir,
        'jenis_kelamin' => $jenis_kelamin
      );

      // print_r($data);
      // die;

      $where = array(
        'id' => $id,
      );

      $this->siswa_model->update_data($where, $data, 'siswa');
      $this->session->set_flashdata(
        'pesan',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Data siswa berhasil diupdate
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
      );
      redirect('administrator/siswa');
    }
  }

  public function delete($id){
    $where = array('id' => $id);
    $this->siswa_model->hapus_data($where, 'siswa');
    $this->session->set_flashdata(
      'pesan',
      '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data siswa berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('administrator/siswa');
  }

  public function _rules(){
    $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'required', [
      'required' => 'Nama lengkap wajib diisi!'
    ]);
    $this->form_validation->set_rules('kelas', 'kelas', 'required', [
      'required' => 'Kelas wajib diisi!'
    ]);
    $this->form_validation->set_rules('alamat', 'alamat', 'required', [
      'required' => 'Alamat wajib diisi!'
    ]);
    $this->form_validation->set_rules('email', 'email', 'required', [
      'required' => 'Email wajib diisi!'
    ]);
    $this->form_validation->set_rules('telepon', 'telepon', 'required', [
      'required' => 'Nomor telepon wajib diisi!'
    ]);
    $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required', [
      'required' => 'Tempat lahir wajib diisi!'
    ]);
    $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required', [
      'required' => 'Tanggal lahir wajib diisi!'
    ]);
    $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required', [
      'required' => 'Jenis kelamin wajib diisi!'
    ]);
  }
}