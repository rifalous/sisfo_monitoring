<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-university"></i> Daftar Kelas
  </div>

  <?= $this->session->flashdata('pesan'); ?>

  <?= anchor('administrator/kelas/tambah_kelas', '<button class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus fa-sm"></i> Tambah Kelas</button>') ?>

  <table class="table table-striped table-bordered table-hover">
    <tr>
      <th>NO</th>
      <th>KODE KELAS</th>
      <th>NAMA KELAS</th>
      <th colspan="2">AKSI</th>
    </tr>

    <?php 
    $no = 1;
    foreach($kelas as $kls): ?>
    <tr>
      <td width="20px;"><?= $no++; ?></td>
      <td><?= $kls->kode_kelas; ?></td>
      <td><?= $kls->nama_kelas; ?></td>
      <td width="20px"><?= anchor('administrator/kelas/update/'.$kls->id, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
      <td width="20px"><?= anchor('administrator/kelas/delete/'.$kls->id, '<div onclick="return confirm(\'Yakin akan menghapus?\')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>