<div class="container-fluid">

  <div class="alert alert-success" role="alert">
    <i class="fas fa-university"></i> Siswa
  </div>

  <?= $this->session->flashdata('pesan'); ?>

  <a class="btn btn-primary btn-sm mb-2" href="<?php echo base_url('administrator/siswa/tambah_siswa') ?>"><i class="fas fa-plus fa-sm"></i>  Tambah Siswa</a>

  <table class="table table-striped table-hover table-borderd">
    <tr>
      <th>NO</th>
      <th>NAMA LENGKAP</th>
      <th>JENIS KELAMIN</th>
      <th>KELAS</th>
      <th>ALAMAT</th>
      <!-- <th>EMAIL</th> -->
      <th colspan="3">AKSI</th>
    </tr>

    <?php 
    $no = 1;
    foreach($siswa as $sw): ?>
    <tr>
      <td width="20px;"><?= $no++; ?></td>
      <td><?= $sw->nama_lengkap; ?></td>
      <td><?= $sw->jenis_kelamin; ?></td>
      <td><?= $sw->kelas; ?></td>
      <td><?= $sw->alamat; ?></td>
      <td width="20px"><?= anchor('administrator/siswa/detail/'.$sw->id, '<div class="btn btn-sm btn-info"><i class="fa fa-eye"></i></div>') ?></td>
      <td width="20px"><?= anchor('administrator/siswa/update/'.$sw->id, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
      <td width="20px"><?= anchor('administrator/siswa/delete/'.$sw->id, '<div onclick="return confirm(\'Yakin akan menghapus?\')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>