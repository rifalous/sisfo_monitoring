<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-eye"></i> Detail Mata Pelajaran
  </div>

  <table class="table table-striped table-bordered tabel-hover">

    <?php foreach($detail as $dt): ?>
      <tr>
        <th>Kode Mata Pelajaran</th>
        <td><?= $dt->kode_matapelajaran; ?></td>
      </tr>
      <tr>
        <th>Nama Mata Pelajaran</th>
        <td><?= $dt->nama_matapelajaran; ?></td>
      </tr>
      <tr>
        <th>Kelas</th>
        <td><?= $dt->kelas; ?></td>
      </tr>
    <?php endforeach; ?>

  </table>
  <?= anchor('orangtua/matapelajaran', '<div class="btn btn-primary btn-sm">Kembali</div>') ?>
  
</div>