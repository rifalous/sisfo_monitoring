<?php

class Agenda extends CI_Controller{

  public function index(){
    $data['agenda'] = $this->db->query(
        "SELECT agenda.id, 
            agenda.tanggal, 
            matapelajaran.nama_matapelajaran as matapelajaran, 
            agenda.materi_pembahasan, 
            kelas.nama_kelas as kelas, 
            pengajar.nama_pengajar as pengajar
        FROM agenda 
        JOIN matapelajaran,kelas,pengajar 
        WHERE agenda.id_matapelajaran=matapelajaran.id 
        AND agenda.id_kelas = kelas.id 
        AND agenda.id_user = pengajar.id")
    ->result();
    $this->load->view('templates_pengajar/header');
    $this->load->view('templates_pengajar/sidebar');
    $this->load->view('pengajar/agenda', $data);
    $this->load->view('templates_pengajar/footer');
  }

  public function tambah_agenda(){
    $data['matapelajaran'] = $this->agenda_model->tampil_data('matapelajaran')->result();
    $data['kelas'] = $this->agenda_model->tampil_data('kelas')->result();
    $data['pengajar'] = $this->agenda_model->tampil_data('pengajar')->result();
    $this->load->view('templates_pengajar/header');
    $this->load->view('templates_pengajar/sidebar');
    $this->load->view('pengajar/agenda_form', $data);
    $this->load->view('templates_pengajar/footer');
  }

  public function tambah_agenda_aksi(){
    $this->_rules();

    if($this->form_validation->run() == FALSE){
      $this->tambah_agenda();
    }
    else{
      $tanggal = $this->input->post('tanggal');
      $id_matapelajaran = $this->input->post('matapelajaran');
      $materi_pembahasan = $this->input->post('materi_pembahasan');
      $id_kelas = $this->input->post('kelas');
      $id_user = $this->input->post('pengajar');

      $data = array(
        'tanggal' => $tanggal  ,
        'id_matapelajaran' => $id_matapelajaran,   
        'materi_pembahasan' => $materi_pembahasan, 
        'id_kelas' => $id_kelas, 
        'id_user' => $id_user
      );

      $this->agenda_model->insert_data($data, 'agenda');
      $this->session->set_flashdata(
        'pesan',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Data agenda berhasil ditambahkan
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
      );
      redirect('pengajar/agenda');
    }
  }

  public function update($id){
    $where = array('id' => $id);
    $data['agenda'] = $this->db->query(
        "SELECT agenda.id, 
            agenda.tanggal, 
            agenda.id_matapelajaran, 
            agenda.id_kelas, 
            agenda.id_user, 
            matapelajaran.nama_matapelajaran as matapelajaran, 
            agenda.materi_pembahasan, 
            kelas.nama_kelas as kelas, 
            pengajar.nama_pengajar as pengajar
        FROM agenda 
        JOIN matapelajaran,kelas,pengajar 
        WHERE agenda.id_matapelajaran=matapelajaran.id 
        AND agenda.id_kelas = kelas.id 
        AND agenda.id_user = pengajar.id
        AND agenda.id = '$id'")
    ->result();
    $data['matapelajaran'] = $this->agenda_model->tampil_data('matapelajaran')->result();
    $data['kelas'] = $this->agenda_model->tampil_data('kelas')->result();
    $data['pengajar'] = $this->agenda_model->tampil_data('pengajar')->result();

    $this->load->view('templates_pengajar/header');
    $this->load->view('templates_pengajar/sidebar');
    $this->load->view('pengajar/agenda_update',$data);
    $this->load->view('templates_pengajar/footer');
  }

  public function update_aksi(){
    $id = $this->input->post('id');
    $tanggal   = $this->input->post('tanggal');
    $id_matapelajaran   = $this->input->post('matapelajaran');
    $materi_pembahasan   = $this->input->post('materi_pembahasan');
    $id_kelas   = $this->input->post('kelas');
    $id_user = $this->input->post('pengajar');

    $data = array(
      'tanggal'   => $tanggal,
      'id_matapelajaran'   => $id_matapelajaran,
      'materi_pembahasan' => $materi_pembahasan,
      'id_kelas' => $id_kelas,
      'id_user' => $id_user
    );

    $where = array(
      'id' => $id
    );

    $this->agenda_model->update_data($where, $data, 'agenda');
    $this->session->set_flashdata(
      'pesan',
      '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data agenda berhasil diupdate
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('pengajar/agenda');
  }

  public function delete($id){
    $where = array('id' => $id);
    $this->agenda_model->hapus_data($where, 'agenda');
    $this->session->set_flashdata(
      'pesan',
      '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data agenda berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('pengajar/agenda');
  }

  public function _rules(){
    $this->form_validation->set_rules('tanggal', 'tanggal', 'required', [
      'required' => 'tanggal wajib diisi!'
    ]);
    $this->form_validation->set_rules('matapelajaran', 'matapelajaran', 'required', [
      'required' => 'mata pelajaran wajib diisi!'
    ]);
    $this->form_validation->set_rules('materi_pembahasan', 'materi_pembahasan', 'required', [
      'required' => 'materi pembahasan wajib diisi!'
    ]);
    $this->form_validation->set_rules('kelas', 'kelas', 'required', [
      'required' => 'kelas wajib diisi!'
    ]);
    $this->form_validation->set_rules('pengajar', 'pengajar', 'required', [
      'required' => 'pengajar wajib diisi!'
    ]);
  }

  
}