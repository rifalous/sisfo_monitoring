<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-university"></i> Form Input Agenda Kelas
  </div>
  <form action="<?= base_url('administrator/agenda/tambah_agenda_aksi') ?>" method="post">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="">Tanggal</label>
          <input type="date" name="tanggal" class="form-control">
          <?= form_error('tanggal', '<div class="text-danger small">', '</div>'); ?>
        </div>
        <div class="form-group">
          <label for="">Mata Pelajaran</label>
          <select name="matapelajaran" id="" class="form-control">
            <option value="">--Pilih Mata Pelajaran--</option>
            <?php foreach($matapelajaran as $mp): ?>
            <option value="<?= $mp->id ?>"><?= $mp->nama_matapelajaran; ?></option>
            <?php endforeach; ?>
          </select>
          <?= form_error('nama_jurusan', '<div class="text-danger small">', '</div>'); ?>
        </div>
        <div class="form-group">
          <label for="">Materi Pembahasan</label>
          <input type="text" name="materi_pembahasan" placeholder="Masukkan Materi Pembahasan" class="form-control">
          <?= form_error('materi_pembahasan', '<div class="text-danger small">', '</div>'); ?>
        </div>
        <div class="form-group">
          <label for="">Kelas</label>
          <select name="kelas" id="" class="form-control">
            <option value="">--Pilih Kelas--</option>
            <?php foreach($kelas as $kls): ?>
            <option value="<?= $kls->id ?>"><?= $kls->nama_kelas; ?></option>
            <?php endforeach; ?>
          </select>
          <?= form_error('kelas', '<div class="text-danger small">', '</div>'); ?>
        </div>
        <div class="form-group">
          <label for="">Pengajar</label>
          <select name="pengajar" id="" class="form-control">
            <option value="">--Pilih Pengajar--</option>
            <?php foreach($pengajar as $pjr): ?>
            <option value="<?= $pjr->id ?>"><?= $pjr->nama_pengajar; ?></option>
            <?php endforeach; ?>
          </select>
          <?= form_error('pengajar', '<div class="text-danger small">', '</div>'); ?>
        </div>
    
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </form>
</div>