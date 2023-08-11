<?php

class Presensi extends CI_Controller{

  public function index(){
    setlocale(LC_ALL, 'IND'); 
    $bulan = strftime('%B');
    $data['presensi'] = $this->db->query(
        "SELECT siswa.nama_lengkap, siswa.kelas, presensi.* from siswa left join presensi ON siswa.id = presensi.id_siswa WHERE presensi.bulan = '$bulan' ORDER BY siswa.nama_lengkap ASC")
    ->result();
    $this->load->view('templates_pengajar/header');
    $this->load->view('templates_pengajar/sidebar');
    $this->load->view('pengajar/presensi', $data);
    $this->load->view('templates_pengajar/footer');
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
    setlocale(LC_ALL, 'IND'); 
    $bulan = strftime('%B');
    $data['presensi'] = $this->db->query(
        "SELECT siswa.nama_lengkap, siswa.kelas, presensi.* from siswa left join presensi ON siswa.id = presensi.id_siswa WHERE presensi.bulan = '$bulan' ORDER BY siswa.nama_lengkap ASC")
    ->result();
    $this->load->view('pengajar/print_laporan_presensi', $data);
  }

  public function tambah_presensi(){
    // $data['matapelajaran'] = $this->agenda_model->tampil_data('matapelajaran')->result();
    // $data['kelas'] = $this->agenda_model->tampil_data('kelas')->result();
    // $data['pengajar'] = $this->agenda_model->tampil_data('pengajar')->result();
    $this->load->view('templates_pengajar/header');
    $this->load->view('templates_pengajar/sidebar');
    $this->load->view('pengajar/presensi_form');
    $this->load->view('templates_pengajar/footer');
  }

  public function tambah_presensi_aksi(){
      $bulan = $this->input->post('bulan');
      $tahun = $this->input->post('tahun');
      $cekData = $this->db->query("SELECT * FROM presensi WHERE presensi.bulan='$bulan'")->result();
      if (!$cekData) {
        $siswa = $this->db->query("SELECT siswa.id, siswa.nama_lengkap, kelas.id as id_kelas, kelas.nama_kelas FROM siswa join kelas WHERE siswa.kelas = kelas.nama_kelas")->result();
        foreach ($siswa as $sw) {
            $sql= "INSERT INTO `presensi`(`id`, `id_siswa`, `id_kelas`, `bulan`, `tahun`, `w1`, `w2`, `w3`, `w4`, `w5`, `w6`, `w7`, `w8`, `total_realisasi`) 
            VALUES ('','$sw->id','$sw->id_kelas','$bulan','$tahun','0','0','0','0','0','0','0','0','0')";
            $query = $this->db->query($sql);
        }
        $this->session->set_flashdata(
        'pesan',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Generate Berhasil!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>'
        );
        redirect('pengajar/presensi/');
      }
      else {
        // echo "Generate Gagal! Data Presensi Bulan ".$bulan." sudah di Generate sebelumnya!";
        $this->session->set_flashdata(
        'pesan',
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Generate Gagal! Data Presensi Bulan '.$bulan.' sudah di Generate sebelumnya!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>'
        );
        redirect('pengajar/presensi/');
      }
  }

  public function update($id){
    setlocale(LC_ALL, 'IND'); 
    $bulan = strftime('%B');
    $where = array('id' => $id);
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
      "SELECT siswa.id as id_siswa, siswa.nama_lengkap, siswa.kelas, presensi.* from siswa left join presensi ON siswa.id = presensi.id_siswa WHERE presensi.id = $id")
    ->result();
    $data['matapelajaran'] = $this->agenda_model->tampil_data('matapelajaran')->result();
    $data['kelas'] = $this->agenda_model->tampil_data('kelas')->result();
    $data['pengajar'] = $this->agenda_model->tampil_data('pengajar')->result();

    $this->load->view('templates_pengajar/header');
    $this->load->view('templates_pengajar/sidebar');
    $this->load->view('pengajar/presensi_update',$data);
    $this->load->view('templates_pengajar/footer');
  }

  public function update_aksi(){
    $id = $this->input->post('id');
    $id_siswa   = $this->input->post('id_siswa');
    $bulan   = $this->input->post('bulan');
    $tahun   = $this->input->post('tahun');
    $w1   = $this->input->post('w1');
    $w2   = $this->input->post('w2');
    $w3   = $this->input->post('w3');
    $w4   = $this->input->post('w4');
    $w5   = $this->input->post('w5');
    $w6   = $this->input->post('w6');
    $w7   = $this->input->post('w7');
    $w8   = $this->input->post('w8');
    $total_realisasi = $this->input->post('total_realisasi');

    $data = array(
      'id'   => $id,
      'id_siswa'   => $id_siswa,
      'bulan' => $bulan,
      'tahun' => $tahun,
      'w1' => $w1,
      'w2' => $w2,
      'w3' => $w3,
      'w4' => $w4,
      'w5' => $w5,
      'w6' => $w6,
      'w7' => $w7,
      'w8' => $w8,
      'total_realisasi' => $total_realisasi
    );

    $where = array(
      'id' => $id
    );

    $this->agenda_model->update_data($where, $data, 'presensi');
    $this->session->set_flashdata(
      'pesan',
      '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data presensi berhasil diupdate
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('pengajar/presensi');
  }

//   public function delete($id){
//     $where = array('id' => $id);
//     $this->agenda_model->hapus_data($where, 'agenda');
//     $this->session->set_flashdata(
//       'pesan',
//       '<div class="alert alert-danger alert-dismissible fade show" role="alert">
//         Data agenda berhasil dihapus
//         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//           <span aria-hidden="true">&times;</span>
//         </button>
//       </div>'
//     );
//     redirect('pengajar/agenda');
//   }

//   public function _rules(){
//     $this->form_validation->set_rules('tanggal', 'tanggal', 'required', [
//       'required' => 'tanggal wajib diisi!'
//     ]);
//     $this->form_validation->set_rules('matapelajaran', 'matapelajaran', 'required', [
//       'required' => 'mata pelajaran wajib diisi!'
//     ]);
//     $this->form_validation->set_rules('materi_pembahasan', 'materi_pembahasan', 'required', [
//       'required' => 'materi pembahasan wajib diisi!'
//     ]);
//     $this->form_validation->set_rules('kelas', 'kelas', 'required', [
//       'required' => 'kelas wajib diisi!'
//     ]);
//     $this->form_validation->set_rules('pengajar', 'pengajar', 'required', [
//       'required' => 'pengajar wajib diisi!'
//     ]);
//   }

  
}