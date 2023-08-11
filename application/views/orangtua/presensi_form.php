<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-university"></i> Form Generate Presensi
  </div>
  <form action="<?= base_url('orangtua/presensi/tambah_presensi_aksi') ?>" method="post">
    <div class="row">
      <div class="col-md-6">

        <div class="form-group">
          <label for="">Tahun</label>
          <input readonly type="text" name="tahun" class="form-control" value="<?php setlocale(LC_ALL, 'IND'); echo strftime('%Y'); ?>">
        </div>

        <div class="form-group">
          <label for="">Bulan</label>
          <select name="bulan" id="" class="form-control">
            <option value="">--Pilih Bulan--</option>
            <?php 
                $bulan = array("Januari", "Februari", "Maret","April", "Mei", "Juni","Juli", "Agustus","September","Oktober", "November", "Desember");
                foreach($bulan as $bl): ?>
            <option value="<?= $bl ?>"><?= $bl ?></option>
            <?php endforeach; ?>
          </select>
          <?= form_error('bulan', '<div class="text-danger small">', '</div>'); ?>
        </div>

        <button type="submit" class="btn btn-primary">Generate</button>
      </div>
    </div>
  </form>
</div>