<?php echo form_open_multipart('user/tambah'); ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Tambah User</h6>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-7 mx-auto">
              <div class="row g-3">
                <div class="col-12 mb-3">
                  <label class="form-label">Nama Pegawai<small class="text-danger">*</small> </label>
                  <input name="tnama" type="text" class="form-control" value="<?php echo set_value('tnama'); ?>">
                  <?php echo form_error('tnama', '<small class="text-danger">', '</small>');
                  ?>
                </div>
                <div class=" col-12 mb-3">
                  <label for="alamat_calon" class="form-label">Jenis User</label>
                  <select class="form-control form-select-sm" name="tlevel">
                    <option value="0">Pilih Jenis User</option>
                    <option value="1">Admin </option>
                    <option value="2">Teller/CS</option>
                  </select>
                </div>
                <div class="col-12 mb-3">
                  <label class="form-label">User<small class="text-danger">*</small> </label>
                  <input name="tuser" type="text" class="form-control" value="<?php echo set_value('tuser'); ?>">
                  <?php echo form_error('tuser', '<small class="text-danger">', '</small>');
                  ?>
                </div>
                <div class="col-12 mb-3">
                  <label class="form-label">Password<small class="text-danger">*</small> </label>
                  <input name="tpass" type="text" class="form-control" value="<?php echo set_value('tpass'); ?>">
                  <?php echo form_error('tpass', '<small class="text-danger">', '</small>');
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1>
    <button type="submit" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Pengumuman</button>
  </div>
</div>
</form>