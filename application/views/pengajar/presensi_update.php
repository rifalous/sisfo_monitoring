<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-university"></i> Form Update Kelas
  </div>

  <?php foreach($presensi as $pr): ?>
  <form action="<?= base_url('pengajar/presensi/update_aksi') ?>" method="post">

    <div class="row">
      <div class="col-md-6">
        
        <div class="form-group">
          <label for="">Siswa</label>
          <input type="hidden" name="id" value="<?= $pr->id; ?>">
          <select name="id_siswa" id="" class="form-control">
              <option value="<?= $pr->id_siswa; ?>"><?= $pr->nama_lengkap; ?></option>
          </select>
        </div>

        <div class="form-group">
          <label for="">Bulan</label>
          <input readonly type="text" name="bulan" class="form-control" value="<?= $pr->bulan; ?>">
        </div>

        <div class="form-group">
          <label for="">Tahun</label>
          <input readonly type="text" name="tahun" class="form-control" value="<?= $pr->tahun; ?>">
        </div>

        <div class="form-group">
          <label for="">W1</label>
          <input type="text" name="w1" class="form-control" value="<?= $pr->w1; ?>">
        </div>

        <div class="form-group">
          <label for="">W2</label>
          <input type="text" name="w2" class="form-control" value="<?= $pr->w2; ?>">
        </div>

        <div class="form-group">
          <label for="">W3</label>
          <input type="text" name="w3" class="form-control" value="<?= $pr->w3; ?>">
        </div>

        <div class="form-group">
          <label for="">W4</label>
          <input type="text" name="w4" class="form-control" value="<?= $pr->w4; ?>">
        </div>
        <div class="form-group">
          <label for="">W5</label>
          <input type="text" name="w5" class="form-control" value="<?= $pr->w5; ?>">
        </div>

        <div class="form-group">
          <label for="">W6</label>
          <input type="text" name="w6" class="form-control" value="<?= $pr->w6; ?>">
        </div>

        <div class="form-group">
          <label for="">W7</label>
          <input type="text" name="w7" class="form-control" value="<?= $pr->w7; ?>">
        </div>

        <div class="form-group">
          <label for="">W8</label>
          <input type="text" name="w8" class="form-control" value="<?= $pr->w8; ?>">
        </div>

        <div class="form-group">
          <label for="">Total Realisasi</label>
          <input type="text" name="total_realisasi" class="form-control" value="<?= $pr->total_realisasi; ?>">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>

      </div>
    </div>

  </form>
  <?php endforeach; ?>
</div>