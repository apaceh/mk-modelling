<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h3 class="h3 mb-0 text-gray-800 d-none d-sm-inline-block ">Manajemen Ruang Kerja</h3>
  </div>
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>NO</th>
              <th>Nama</th>
              <th>Jenis</th>
              <th>Aktif</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($ruang as $row) : ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['jenis'] == 0 ? "Teller" : "CS"; ?></td>
                <td>
                  <?php if ($row['aktif'] == 0) : ?>
                    Non-Aktif
                  <?php elseif ($row['aktif'] == 1) : ?>
                    Aktif
                  <?php else : ?>
                    Isoma
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>