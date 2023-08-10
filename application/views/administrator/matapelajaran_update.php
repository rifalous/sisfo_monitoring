<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-edit"></i> Form Edit Mata Pelajaran
  </div>

  <?php foreach($matapelajaran as $mp): ?>
    <form action="<?= base_url('administrator/matapelajaran/update_aksi') ?>" method="post">

      <div class="row">
        <div class="col-md-6">

          <div class="form-group">
            <label for="">Kode Mata Pelajaran</label>
            <input type="hidden" name="id" class="form-control" value="<?= $mp->id ?>">
            <input type="text" name="kode_matapelajaran" class="form-control" value="<?= $mp->kode_matapelajaran ?>">
          </div>

          <div class="form-group">
            <label for="">Nama Mata Pelajaran</label>
            <input type="text" name="nama_matapelajaran" class="form-control" value="<?= $mp->nama_matapelajaran ?>">
          </div>
          
          <div class="form-group">
            <label for="">Kelas</label>
            <select name="kelas" id="" class="form-control">
              <option><?= $mp->kelas; ?></option>
              <?php foreach($kelas as $kls): ?>
                <option value="<?= $kls->nama_kelas	; ?>"><?= $kls->nama_kelas	; ?></option>
              <?php endforeach; ?>
            </select>
          </div>


          <button type="submit" class="btn btn-primary btn-sm">Simpan</button>

        </div>
      </div>

    </form>
  <?php endforeach; ?>
  
</div>