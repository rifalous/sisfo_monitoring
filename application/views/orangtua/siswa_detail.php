<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-eye"></i> Data Siswa
  </div>

  <table class="table table-bordered table-hover table-striped">

    <?php foreach($detail as $dt): ?>
      <img class="mb-2" src="<?= base_url('assets/uploads/').$dt->photo; ?>" alt="" style="width:20%;">
      <tr>
        <th>ID</th>
        <td><?= $dt->id; ?></td>
      </tr>
      <tr>
        <th>NAMA LENGKAP</th>
        <td><?= $dt->nama_lengkap; ?></td>
      </tr>
      <tr>
        <th>KELAS</th>
        <td><?= $dt->kelas; ?></td>
      </tr>
      <tr>
        <th>ALAMAT</th>
        <td><?= $dt->alamat; ?></td>
      </tr>
      <tr>
        <th>EMAIL</th>
        <td><?= $dt->email; ?></td>
      </tr>
      <tr>
        <th>TELEPON</th>
        <td><?= $dt->telepon; ?></td>
      </tr>
      <tr>
        <th>TEMPAT LAHIR</th>
        <td><?= $dt->tempat_lahir; ?></td>
      </tr>
      <tr>
        <th>TANGGAL LAHIR</th>
        <td><?= $dt->tanggal_lahir; ?></td>
      </tr>
      <tr>
        <th>JENIS KELAMIN</th>
        <td><?= $dt->jenis_kelamin; ?></td>
      </tr>

    <?php endforeach; ?>
  </table>

  <?= anchor('orangtua/dashboard', '<div class="btn btn-primary btn-sm mb-5">Kembali</div>') ?>
  
</div>