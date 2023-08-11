<div class="container-fluid">
  
    <h5>Tahun Ajaran 2022/2023</h5>
    <h5>Bulan <?php setlocale(LC_ALL, 'IND'); echo strftime('%B %Y'); ?></h5>

  <div class="alert alert-success" role="alert">
    <i class="fas fa-university"></i> Presensi Siswa
  </div>
  <a class="btn btn-info btn-sm mb-2" href="<?php echo base_url('orangtua/presensi/print') ?>"><i class="fas fa-print fa-sm"></i>  Cetak Presensi</a>
  <a class="btn btn-primary btn-sm mb-2" href="<?php echo base_url('orangtua/presensi/tambah_presensi') ?>"><i class="fas fa-plus fa-sm"></i>  Generate Presensi</a>

  <?= $this->session->flashdata('pesan'); ?>
  
  <!-- <a class="btn btn-primary btn-sm mb-2" href="<?php echo base_url('orangtua/presensi/tambah_presensi') ?>"><i class="fas fa-plus fa-sm"></i>  Tambah Agenda</a> -->

  <table class="table table-striped table-bordered table-hover">
    <tr>
      <th rowspan="2">NO</th>
      <th rowspan="2">NAMA</th>
      <th colspan="8">PERTEMUAN KE</th>
      <th rowspan="2">TOTAL REALISASI KEHADIRAN</th>
      <th rowspan="2">AKSI</th>
    </tr>
    <tr>
      <th>1</th>
      <th>2</th>
      <th>3</th>
      <th>4</th>
      <th>5</th>
      <th>6</th>
      <th>7</th>
      <th>8</th>
    </tr>
    <!-- <tr>
      <th>NO</th>
      <th>TANGGAL</th>
      <th>MATA PELAJARAN</th>
      <th>MATERI PEMBAHASAN</th>
      <th>KELAS</th>
      <th>PENGAJAR</th>
      <th colspan="2">AKSI</th>
    </tr> -->

    <?php 
    $no = 1;
    foreach($presensi as $pr): ?>
    <tr>
      <td width="20px;"><?= $no++; ?></td>
      <td><?= $pr->nama_lengkap; ?></td>
      <td><?= $pr->w1; ?></td>
      <td><?= $pr->w2; ?></td>
      <td><?= $pr->w3; ?></td>
      <td><?= $pr->w4; ?></td>
      <td><?= $pr->w5; ?></td>
      <td><?= $pr->w6; ?></td>
      <td><?= $pr->w7; ?></td>
      <td><?= $pr->w8; ?></td>
      <td><?= $pr->total_realisasi ?></td>
      <td width="20px"><?= anchor('orangtua/presensi/update/'.$pr->id, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
      <!-- <td width="20px"><?= anchor('orangtua/presensi/delete/'.$pr->id, '<div onclick="return confirm(\'Yakin akan menghapus?\')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td> -->
    </tr>
    <?php endforeach; ?>
  </table>
</div>