<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-print"></i> Laporan Siswa
  </div>

  <?= $this->session->flashdata('pesan'); ?>

  <a class="btn btn-info btn-sm mb-2" href="<?php echo base_url('pengajar/laporan/print') ?>"><i class="fas fa-print fa-sm"></i>  Print Laporan</a>

  <table class="table table-striped table-bordered table-hover">
    <tr>
      <th>NO</th>
      <th>TANGGAL</th>
      <th>MATA PELAJARAN</th>
      <th>MATERI PEMBAHASAN</th>
      <th>KELAS</th>
      <th>PENGAJAR</th>
    </tr>

    <?php 
    $no = 1;
    foreach($agenda as $agd): ?>
    <tr>
      <td width="20px;"><?= $no++; ?></td>
      <td><?= $agd->tanggal; ?></td>
      <td><?= $agd->matapelajaran; ?></td>
      <td><?= $agd->materi_pembahasan; ?></td>
      <td><?= $agd->kelas; ?></td>
      <td><?= $agd->pengajar; ?></td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>