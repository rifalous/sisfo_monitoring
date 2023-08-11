<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-university"></i> Form Update Pengajar
  </div>

  <?php foreach($pengajar as $pjr): ?>
  <?= form_open_multipart('pengajar/pengajar/update_pengajar_aksi'); ?>

    <div class="row">
      <div class="col-md-6">

        <div class="form-group">
          <label for="">Nama pengajar</label>
          <input type="hidden" name="id" value="<?= $pjr->id; ?>">
          <input type="text" name="nama_pengajar" class="form-control" value="<?= $pjr->nama_pengajar; ?>">
          <?= form_error('nama_pengajar', '<div class="text-danger small">', '</div>'); ?>
        </div>
        <div class="form-group">
          <label for="">Alamat</label>
          <input type="text" name="alamat" class="form-control" value="<?= $pjr->alamat; ?>">
          <?= form_error('alamat', '<div class="text-danger small">', '</div>'); ?>
        </div>
        <div class="form-group">
          <label for="">Jenis Kelamin</label>
          <select name="jenis_kelamin" id="" class="form-control" value="<?= $pjr->jenis_kelamin; ?>">
            <option>Laki-laki</option>
            <option>Perempuan</option>
          </select>
          <?= form_error('jenis_kelamin', '<div class="text-danger small">', '</div>'); ?>
        </div>
        <div class="form-group">
          <label for="">Email</label>
          <input type="text" name="email" class="form-control" value="<?= $pjr->email; ?>">
          <?= form_error('email', '<div class="text-danger small">', '</div>'); ?>
        </div>
        <div class="form-group">
          <label for="">No. Telepon</label>
          <input type="text" name="telp" class="form-control" value="<?= $pjr->telp; ?>">
          <?= form_error('telp', '<div class="text-danger small">', '</div>'); ?>
        </div>
        <div class="form-group">
          <?php foreach($detail as $dt): ?>
            <img src="<?= base_url('assets/uploads/').$pjr->photo; ?>" style="width:20%;">
          <?php endforeach; ?><br><br>
          <label for="">Foto</label><br>
          <input type="file" name="userfile" value="<?= $pjr->photo; ?>">
        </div>

        <button type="submit" class="btn btn-primary mb-5">Simpan</button>

      </div>
    </div>

  <?php form_close(); ?>
  <?php endforeach; ?>
</div>