<?php

class pengajar extends CI_Controller{

  public function index(){
    $data['pengajar'] = $this->pengajar_model->tampil_data('pengajar')->result();
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/pengajar', $data);
    $this->load->view('templates_administrator/footer');
  }

  public function detail($id){
    $data['detail'] = $this->pengajar_model->ambil_id_pengajar($id);
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/pengajar_detail', $data);
    $this->load->view('templates_administrator/footer');
  }

  public function tambah_pengajar(){
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/pengajar_form');
    $this->load->view('templates_administrator/footer');
  }

  public function tambah_pengajar_aksi(){
    $this->_rules();
    if($this->form_validation->run() == FALSE){
      $this->tambah_pengajar();
    }
    else{
      $id            = $this->input->post('id');
      $nama_pengajar = $this->input->post('nama_pengajar');
      $alamat        = $this->input->post('alamat');
      $jenis_kelamin = $this->input->post('jenis_kelamin');
      $email         = $this->input->post('email');
      $telp          = $this->input->post('telp');
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
        'id'            => $id,
        'nama_pengajar' => $nama_pengajar,
        'alamat'        => $alamat,
        'jenis_kelamin' => $jenis_kelamin,
        'email'         => $email,
        'telp'          => $telp,
        'photo'         => $photo,
      );

      $this->pengajar_model->insert_data($data, 'pengajar');
      $this->session->set_flashdata(
        'pesan',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Data pengajar berhasil ditambahkan
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
      );
      redirect('administrator/pengajar');
    }
  }

  public function update($id){
    $where = array('id' => $id);
    $data['pengajar']     = $this->pengajar_model->edit_data($where, 'pengajar')->result();
    $data['detail']    = $this->pengajar_model->ambil_id_pengajar($id);
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/pengajar_update', $data);
    $this->load->view('templates_administrator/footer');
  }

  public function update_pengajar_aksi(){
    $this->_rules();

    if($this->form_validation->run() == FALSE){
      $id = $this->input->post('id');
      $this->update($id);
    }
    else{
      $id            = $this->input->post('id');
      $nama_pengajar = $this->input->post('nama_pengajar');
      $alamat        = $this->input->post('alamat');
      $jenis_kelamin = $this->input->post('jenis_kelamin');
      $email         = $this->input->post('email');
      $telp          = $this->input->post('telp');
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
        'id'            => $id,
        'nama_pengajar' => $nama_pengajar,
        'alamat'        => $alamat,
        'jenis_kelamin' => $jenis_kelamin,
        'email'         => $email,
        'telp'          => $telp
      );

      // print_r($data);
      // die;

      $where = array(
        'id' => $id,
      );

      $this->pengajar_model->update_data($where, $data, 'pengajar');
      $this->session->set_flashdata(
        'pesan',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Data pengajar berhasil diupdate
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
      );
      redirect('administrator/pengajar');
    }
  }

  public function delete($id){
    $where = array('nidn' => $id);
    $this->pengajar_model->hapus_data($where, 'pengajar');
    $this->session->set_flashdata(
      'pesan',
      '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data pengajar berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('administrator/pengajar');
  }

  public function _rules(){
    $this->form_validation->set_rules('nama_pengajar', 'nama_pengajar', 'required', [
      'required' => 'Nama pengajar wajib diisi!'
    ]);
    $this->form_validation->set_rules('alamat', 'alamat', 'required', [
      'required' => 'Alamat wajib diisi!'
    ]);
    $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required', [
      'required' => 'Jenis kelamin wajib diisi!'
    ]);
    $this->form_validation->set_rules('email', 'email', 'required', [
      'required' => 'Email wajib diisi!'
    ]);
    $this->form_validation->set_rules('telp', 'telp', 'required', [
      'required' => 'Nomor telepon wajib diisi!'
    ]);
  }
}