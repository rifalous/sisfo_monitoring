<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-university"></i> Form Update Siswa
  </div>

  <?php foreach($siswa as $sw): ?>
  <?= form_open_multipart('orangtua/siswa/update_siswa_aksi'); ?>

    <div class="row">
      <div class="col-md-6">

        <div class="form-group" hidden>
          <label for="">ID Siswa</label>
          <input type="hidden" name="id" value="<?= $sw->id; ?>">
          <input type="text" name="nim" class="form-control" value="<?= $sw->id; ?>">
          <?= form_error('nim', '<div class="text-danger small">', '</div>'); ?>
        </div> 
        <div class="form-group">
          <label for="">Nama Siswa</label>
          <input type="text" name="nama_lengkap" class="form-control" value="<?= $sw->nama_lengkap; ?>">
          <?= form_error('nama_lengkap', '<div class="text-danger small">', '</div>'); ?>
        </div>
        <div class="form-group">
            <label for="">Kelas</label>
            <select name="kelas" id="" class="form-control">
              <option><?= $sw->kelas; ?></option>
              <?php foreach($kelas as $kls): ?>
                <option value="<?= $kls->nama_kelas	; ?>"><?= $kls->nama_kelas	; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        <div class="form-group">
          <label for="">Alamat</label>
          <input type="text" name="alamat" class="form-control" value="<?= $sw->alamat; ?>">
          <?= form_error('alamat', '<div class="text-danger small">', '</div>'); ?>
        </div>
        <div class="form-group">
          <label for="">Email</label>
          <input type="text" name="email" class="form-control" value="<?= $sw->email; ?>">
          <?= form_error('email', '<div class="text-danger small">', '</div>'); ?>
        </div>
        <div class="form-group">
          <label for="">Telepon</label>
          <input type="text" name="telepon" class="form-control" value="<?= $sw->telepon; ?>">
          <?= form_error('telepon', '<div class="text-danger small">', '</div>'); ?>
        </div>
        <div class="form-group">
          <label for="">Tempat Lahir</label>
          <input type="text" name="tempat_lahir" class="form-control" value="<?= $sw->tempat_lahir; ?>">
          <?= form_error('tempat_lahir', '<div class="text-danger small">', '</div>'); ?>
        </div>
        <div class="form-group">
          <label for="">Tanggal Lahir</label>
          <input type="date" name="tanggal_lahir" class="form-control" value="<?= $sw->tanggal_lahir; ?>">
          <?= form_error('tanggal_lahir', '<div class="text-danger small">', '</div>'); ?>
        </div>
        <div class="form-group">
          <label for="">Jenis Kelamin</label>
          <select name="jenis_kelamin" id="" class="form-control" value="<?= $sw->jenis_kelamin; ?>">
            <option>Laki-laki</option>
            <option>Perempuan</option>
          </select>
          <?= form_error('jenis_kelamin', '<div class="text-danger small">', '</div>'); ?>
        </div>
        <div class="form-group">
          <?php foreach($detail as $dt): ?>
            <img src="<?= base_url('assets/uploads/').$sw->photo; ?>" style="width:20%;">
          <?php endforeach; ?><br><br>
          <label for="">Foto</label><br>
          <input type="file" name="userfile" value="<?= $sw->photo; ?>">
        </div>

        <button type="submit" class="btn btn-primary mb-5">Simpan</button>

      </div>
    </div>

  <?php form_close(); ?>
  <?php endforeach; ?>
</div>