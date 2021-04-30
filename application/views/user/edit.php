<?php echo form_open_multipart('user/editp'); ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-7 mx-auto">
              <div class="row g-3">
                <div class="col-12 mb-3">
                  <input name="tid" type="text" class="form-control" value="<?php echo $user['id_login']
                                                                            ?>" hidden>
                  <label class="form-label">Nama Pegawai<small class="text-danger">*</small> </label>
                  <input name="tnama" type="text" class="form-control" value="<?php echo $user['nama']; ?>">
                  <?php echo form_error('tnama', '<small class="text-danger">', '</small>');
                  ?>
                </div>
                <div class=" col-12 mb-3">
                  <label for="alamat_calon" class="form-label">Jenis User</label>
                  <select class="form-control form-select-sm" name="tlevel">
                    <option value="0" <?php if ($user['level'] == 0) {
                                        echo "selected";
                                      } ?>>Pilih Jenis User</option>
                    <option value="1" <?php if ($user['level'] == 1) {
                                        echo "selected";
                                      } ?>>Admin </option>
                    <option value="2" <?php if ($user['level'] == 2) {
                                        echo "selected";
                                      } ?>>Teller/CS</option>
                  </select>
                </div>
                <div class="col-12 mb-3">
                  <label class="form-label">User Baru </label>
                  <input name="tuser" type="text" class="form-control" placeholder="Isi user bila ingin merubah">
                  <?php echo form_error('tuser', '<small class="text-danger">', '</small>');
                  ?>
                </div>
                <div class="col-12 mb-3">
                  <label class="form-label">Password Baru </label>
                  <input name="tpass" type="text" class="form-control" placeholder="Isi Password bila ingin merubah">
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
    <button type="submit" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Simpan Perubahan</button>
  </div>
</div>
</form>