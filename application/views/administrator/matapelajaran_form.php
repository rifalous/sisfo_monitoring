<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-university"></i> Form Input Mata Pelajaran
  </div>
  <form action="<?= base_url('administrator/matapelajaran/tambah_matapelajaran_aksi') ?>" method="post">
    <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Kode Mata Pelajaran</label>
            <input type="text" name="kode_matapelajaran" class="form-control">
            <?= form_error('kode_matapelajaran', '<div class="text-danger small">', '</div>'); ?>
          </div>
          <div class="form-group">
            <label for="">Nama Mata Pelajaran</label>
            <input type="text" name="nama_matapelajaran" class="form-control">
            <?= form_error('nama_matapelajaran', '<div class="text-danger small">', '</div>'); ?>
          </div>

          <div class="form-group">
            <label for="">Kelas</label>
            <select name="kelas" id="" class="form-control">
              <option value="">--Pilih Kelas--</option>
              <?php foreach($kelas as $kls): ?>
                <option value="<?= $kls->nama_kelas	; ?>"><?= $kls->nama_kelas	; ?></option>
              <?php endforeach; ?>
            </select>
            <?= form_error('kelas', '<div class="text-danger small">', '</div>'); ?>
          </div>
      
          <button type="submit" class="btn btn-primary mb-4">Simpan</button>
        </div>
    </div>
  </form>
</div>