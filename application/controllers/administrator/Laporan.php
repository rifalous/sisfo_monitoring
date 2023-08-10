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
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/laporan', $data);
    $this->load->view('templates_administrator/footer');
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
    $this->load->view('administrator/print_laporan', $data);
  }
}