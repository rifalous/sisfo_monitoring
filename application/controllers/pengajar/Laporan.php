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
    $this->load->view('templates_pengajar/header');
    $this->load->view('templates_pengajar/sidebar');
    $this->load->view('pengajar/laporan', $data);
    $this->load->view('templates_pengajar/footer');
  }

  public function print(){
    setlocale(LC_ALL, 'IND'); 
    $bulan = strftime('%B');
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
      "SELECT siswa.nama_lengkap, siswa.kelas, presensi.* from siswa left join presensi ON siswa.id = presensi.id_siswa WHERE presensi.bulan= '$bulan' ORDER BY siswa.nama_lengkap ASC")
    ->result();
    $this->load->view('pengajar/print_laporan', $data);
  }
}