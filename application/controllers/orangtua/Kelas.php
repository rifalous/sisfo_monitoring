<?php

class Kelas extends CI_Controller{

  public function index(){
    $data['kelas'] = $this->kelas_model->tampil_data('kelas')->result();
    $this->load->view('templates_orangtua/header');
    $this->load->view('templates_orangtua/sidebar');
    $this->load->view('orangtua/kelas', $data);
    $this->load->view('templates_orangtua/footer');
  }

  public function tambah_kelas(){
    $this->load->view('templates_orangtua/header');
    $this->load->view('templates_orangtua/sidebar');
    $this->load->view('orangtua/kelas_form');
    $this->load->view('templates_orangtua/footer');
  }

  public function tambah_kelas_aksi(){
    $this->_rules();

    if($this->form_validation->run() == FALSE){
      $this->tambah_prodi();
    }
    else{
      $kode_kelas   = $this->input->post('kode_kelas');
      $nama_kelas   = $this->input->post('nama_kelas');

      $data = array(
        'kode_kelas'    => $kode_kelas  ,
        'nama_kelas'    => $nama_kelas
      );

      $this->kelas_model->insert_data($data, 'kelas');
      $this->session->set_flashdata(
        'pesan',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Data kelas berhasil ditambahkan
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
      );
      redirect('orangtua/kelas');
    }
  }

  public function update($id){
    $where = array('id' => $id);
    $data['kelas'] = $this->db->query("SELECT * FROM kelas WHERE id='$id'")->result();

    $this->load->view('templates_orangtua/header');
    $this->load->view('templates_orangtua/sidebar');
    $this->load->view('orangtua/kelas_update',$data);
    $this->load->view('templates_orangtua/footer');
  }

  public function update_aksi(){
    $id = $this->input->post('id');
    $kode_kelas   = $this->input->post('kode_kelas');
    $nama_kelas   = $this->input->post('nama_kelas');

    $data = array(
      'kode_kelas'   => $kode_kelas,
      'nama_kelas'   => $nama_kelas,
    );

    $where = array(
      'id' => $id
    );

    $this->kelas_model->update_data($where, $data, 'kelas');
    $this->session->set_flashdata(
      'pesan',
      '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data kelas berhasil diupdate
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('orangtua/kelas');
  }

  public function delete($id){
    $where = array('id' => $id);
    $this->kelas_model->hapus_data($where, 'kelas');
    $this->session->set_flashdata(
      'pesan',
      '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data kelas berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('orangtua/kelas');
  }

  public function _rules(){
    $this->form_validation->set_rules('kode_kelas', 'kode_kelas', 'required', [
      'required' => 'Kode kelas wajib diisi!'
    ]);
    $this->form_validation->set_rules('nama_kelas', 'nama_kelas', 'required', [
      'required' => 'Nama kelas wajib diisi!'
    ]);
  }

  
}