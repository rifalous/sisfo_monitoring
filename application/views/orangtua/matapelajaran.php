<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-university"></i> Mata Pelajaran
  </div>

  <?= $this->session->flashdata('pesan'); ?>

  <a class="btn btn-primary btn-sm mb-2" href="<?php echo base_url('orangtua/matapelajaran/tambah_matapelajaran') ?>"><i class="fas fa-plus fa-sm"></i>  Tambah Mata Pelajaran</a>
  
  <table class="table tabel-bordered table-hover table-striped">
    <tr>
      <th>NO</th>
      <th>KODE MATA PELAJARAN</th>
      <th>NAMA MATA PELAJARAN</th>
      <th>KELAS</th>
      <th colspan="3">AKSI</th>
    </tr>

  <?php 
  $no = 1;
  foreach($matapelajaran as $mp): ?>
    <tr>
      <td width="20px;"><?= $no++; ?></td>
      <td><?= $mp->kode_matapelajaran; ?></td>
      <td><?= $mp->nama_matapelajaran; ?></td>
      <td><?= $mp->kelas; ?></td>
      <td width="20px"><?= anchor('orangtua/matapelajaran/detail/'.$mp->id, '<div class="btn btn-sm btn-info"><i class="fa fa-eye"></i></div>') ?></td>
      <td width="20px"><?= anchor('orangtua/matapelajaran/update/'.$mp->id, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
      <td width="20px"><?= anchor('orangtua/matapelajaran/delete/'.$mp->id, '<div onclick="return confirm(\'Yakin akan menghapus?\')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
    </tr>
  <?php endforeach; ?>

  </table>
</div>