<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-university"></i> Agenda Kelas
  </div>

  <?= $this->session->flashdata('pesan'); ?>
  
  <a class="btn btn-primary btn-sm mb-2" href="<?php echo base_url('pengajar/agenda/tambah_agenda') ?>"><i class="fas fa-plus fa-sm"></i>  Tambah Agenda</a>

  <table class="table table-striped table-bordered table-hover">
    <tr>
      <th>NO</th>
      <th>TANGGAL</th>
      <th>MATA PELAJARAN</th>
      <th>MATERI PEMBAHASAN</th>
      <th>KELAS</th>
      <th>PENGAJAR</th>
      <th colspan="2">AKSI</th>
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
      <td width="20px"><?= anchor('pengajar/agenda/update/'.$agd->id, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
      <td width="20px"><?= anchor('pengajar/agenda/delete/'.$agd->id, '<div onclick="return confirm(\'Yakin akan menghapus?\')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>