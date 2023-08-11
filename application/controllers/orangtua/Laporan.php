<?php

class Laporan extends CI_Controller{

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
    $data['presensi'] = $this->db->query(
      "SELECT siswa.nama_lengkap, siswa.kelas, presensi.* from siswa left join presensi ON siswa.id = presensi.id_siswa ORDER BY siswa.nama_lengkap ASC")
    ->result();
    $this->load->view('templates_orangtua/header');
    $this->load->view('templates_orangtua/sidebar');
    $this->load->view('orangtua/laporan', $data);
    $this->load->view('templates_orangtua/footer');
  }

  public function print(){
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
    $dataUser = $this->user_model->ambil_data($this->session->userdata['username']);
    $dataUser = array(
      'username' => $dataUser->username,
      'level'    => $dataUser->level,
      'id_child' => $dataUser->id_child,
    );
    $id = $dataUser['id_child'];
    $data['detail'] = $this->db->query(
      "SELECT siswa.nama_lengkap, siswa.kelas FROM siswa WHERE siswa.id='$id'")
    ->result();
    $data['presensi'] = $this->db->query(
      "SELECT siswa.nama_lengkap, siswa.kelas, presensi.* from siswa left join presensi ON siswa.id = presensi.id_siswa WHERE presensi.id_siswa = '$id'")
    ->result();
    $this->load->view('orangtua/print_laporan', $data);
  }
}