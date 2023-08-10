<?php

class matapelajaran extends CI_Controller{

  public function index(){
    $data['matapelajaran'] = $this->matapelajaran_model->tampil_data('matapelajaran')->result();
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/matapelajaran',$data);
    $this->load->view('templates_administrator/footer');
  }

  public function tambah_matapelajaran(){
    $data['kelas'] = $this->matapelajaran_model->tampil_data('kelas')->result();
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/matapelajaran_form',$data);
    $this->load->view('templates_administrator/footer');
  }

  public function tambah_matapelajaran_aksi(){
    $this->_rules();

    if($this->form_validation->run() == FALSE){
      $this->tambah_matapelajaran();
    }
    else{
      $kode_matapelajaran = $this->input->post('kode_matapelajaran');
      $nama_matapelajaran = $this->input->post('nama_matapelajaran');
      $kelas      = $this->input->post('kelas');

      $data = array(
        'kode_matapelajaran' => $kode_matapelajaran,
        'nama_matapelajaran' => $nama_matapelajaran,
        'kelas'      => $kelas,
      );

      $this->matapelajaran_model->insert_data($data, 'matapelajaran');
      $this->session->set_flashdata(
        'pesan',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Data mata kuliah berhasil ditambahkan
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
      );
      redirect('administrator/matapelajaran');
    }
  }

  public function _rules(){
    $this->form_validation->set_rules('kode_matapelajaran', 'kode_matapelajaran', 'required', [
      'required' => 'Kode mata kuliah wajib diisi!'
    ]);
    $this->form_validation->set_rules('nama_matapelajaran', 'nama_matapelajaran', 'required', [
      'required' => 'Nama mata kuliah wajib diisi!'
    ]);
    $this->form_validation->set_rules('kelas', 'kelas', 'required', [
      'required' => 'Kelas wajib diisi!'
    ]);
  }

  public function detail($id){
    $data['detail'] = $this->matapelajaran_model->ambil_id_matapelajaran($id);
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/matapelajaran_detail',$data);
    $this->load->view('templates_administrator/footer');
  }

  public function update($id){
    $where = array('id' => $id);
    $data['matapelajaran'] = $this->db->query("SELECT * FROM matapelajaran mp WHERE mp.id='$id'")->result();
    $data['kelas'] = $this->matapelajaran_model->tampil_data('kelas')->result();

    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/matapelajaran_update',$data);
    $this->load->view('templates_administrator/footer');
  }

  public function update_aksi(){
    $id                 = $this->input->post('id');
    $kode_matapelajaran = $this->input->post('kode_matapelajaran');
    $nama_matapelajaran = $this->input->post('nama_matapelajaran');
    $kelas      = $this->input->post('kelas');

    $data = array(
      'kode_matapelajaran' => $kode_matapelajaran,
      'nama_matapelajaran' => $nama_matapelajaran,
      'kelas'      => $kelas,
    );

    // print_r($data);
    // die;

    $where = array(
      'id' => $id
    );

    $this->matapelajaran_model->update_data($where, $data, 'matapelajaran');
    $this->session->set_flashdata(
      'pesan',
      '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data mata kuliah berhasil diupdate
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('administrator/matapelajaran');
  }

  public function delete($id){
    $where = array('id' => $id);
    $this->matapelajaran_model->hapus_data($where, 'matapelajaran');
    $this->session->set_flashdata(
      'pesan',
      '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data matapelajaran berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('administrator/matapelajaran');
  }
}