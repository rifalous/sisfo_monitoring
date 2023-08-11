<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-university"></i> Form Update Kelas
  </div>

  <?php foreach($kelas as $kls): ?>
  <form action="<?= base_url('pengajar/kelas/update_aksi') ?>" method="post">

    <div class="row">
      <div class="col-md-6">

        <div class="form-group">
          <label for="">Kode Kelas</label>
          <input type="hidden" name="id" value="<?= $kls->id; ?>">
          <input type="text" name="kode_kelas" class="form-control" value="<?= $kls->kode_kelas; ?>">
        </div>
        <div class="form-group">
          <label for="">Nama Kelas</label>
          <input type="text" name="nama_kelas" class="form-control" value="<?= $kls->nama_kelas; ?>">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>

      </div>
    </div>

  </form>
  <?php endforeach; ?>
</div>