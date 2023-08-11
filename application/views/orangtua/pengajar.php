<div class="container-fluid">

  <div class="alert alert-success" role="alert">
    <i class="fas fa-university"></i> Daftar Pengajar
  </div>

  <?= $this->session->flashdata('pesan'); ?>

  <a class="btn btn-primary btn-sm mb-2" href="<?php echo base_url('orangtua/pengajar/tambah_pengajar') ?>"><i class="fas fa-plus fa-sm"></i>  Tambah Pengajar</a>

  <table class="table table-striped table-hover table-borderd">
    <tr>
      <th>NO</th>
      <th>NAMA PENGAJAR</th>
      <th>ALAMAT</th>
      <th>EMAIL</th>
      <th colspan="3">AKSI</th>
    </tr>

    <?php 
    $no = 1;
    foreach($pengajar as $pjr): ?>
    <tr>
      <td width="20px;"><?= $no++; ?></td>
      <td><?= $pjr->nama_pengajar; ?></td>
      <td><?= $pjr->alamat; ?></td>
      <td><?= $pjr->email; ?></td>
      <td width="20px"><?= anchor('orangtua/pengajar/detail/'.$pjr->id, '<div class="btn btn-sm btn-info"><i class="fa fa-eye"></i></div>') ?></td>
      <td width="20px"><?= anchor('orangtua/pengajar/update/'.$pjr->id, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
      <td width="20px"><?= anchor('orangtua/pengajar/delete/'.$pjr->id, '<div onclick="return confirm(\'Yakin akan menghapus?\')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>