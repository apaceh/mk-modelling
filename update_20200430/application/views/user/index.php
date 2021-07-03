<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h3 class="h3 mb-0 text-gray-800 d-none d-sm-inline-block ">Manajemen User</h3>
    <a href="<?php echo base_url('') ?>user/tambah_user/" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Data User</a>
  </div>
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>NO</th>
              <th>Nama User</th>
              <th>Level</th>
              <th>User</th>
              <th>Aktif</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 0;
            foreach ($user as $usr) {
              $no++ ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $usr['nama'] ?></td>
                <td><?php if ($usr['level'] == 0) {
                      echo "Belum ditentukan";
                    } elseif ($usr['level'] == 1) {
                      echo "Admin";
                    } elseif ($usr['level'] == 2) {
                      echo "Teller/CS";
                    }
                    ?></td>
                <td><?php echo $usr['user'] ?></td>
                <td>
                  <?php if ($usr['aktif'] == 1) { ?>
                    <a href="<?php echo base_url(); ?>user/aktif/<?php echo $usr['id_login'] ?>/<?php echo $usr['aktif'] ?>" class="btn btn-success btn-icon-split btn-sm">
                      <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                      </span>
                      <span class="text">Aktif</span>
                    <?php } else { ?>
                    </a>
                    <a href="<?php echo base_url(); ?>user/aktif/<?php echo $usr['id_login'] ?>/<?php echo $usr['aktif'] ?>" class="btn btn-danger btn-icon-split btn-sm">
                      <span class="icon text-white-50">
                        <i class="fas fa-exclamation-triangle"></i>
                      </span>
                      <span class="text">Nonaktif</span>
                    </a>
                  <?php } ?>
                </td>
                <td align="center">
                  <a href="<?php echo base_url(); ?>user/edit/<?php echo $usr['id_login'] ?>" class="btn btn-primary btn-circle btn-sm" title="Edit">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a href="<?php echo base_url(); ?>user/hapus/<?php echo $usr['id_login'] ?>" class="btn btn-danger btn-circle btn-sm" title="Hapus">
                    <i class="fas fa-trash"></i>
                  </a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>