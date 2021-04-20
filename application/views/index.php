<!-- Sidebar -->
<ul class="col-md-4 navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
  <div class=" text-white text-center mt-3">
    <h4>ANTRIAN NASABAH BJS</h4>
    <h4>CABANG LHOKSEUMAWE</h4>
    <h6><?= date('d-m-Y') ?></h6>
  </div>
  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <div class="row m-2">
    <?php foreach ($ruang_teller as $row) : ?>
      <div class="col-sm-6">
        <div class="card mb-3 text-center">
          <div class="card-body">
            <h3 class="text-black font-weight-bold">
              <?php if ($row['aktif'] == 2) : ?>
                Isoma
              <?php else :
                $this->db->select_max('no_antri');
                $query = $this->db->get_where('tb_utama', ['id_ruang' => $row['id_ruang']]);
              ?>
                <?php foreach ($query->result() as $key) : ?>
                  <?= $key->no_antri; ?>
                <?php endforeach; ?>

                <?php if (!$key->no_antri) : ?>
                  <?//php else : ?>
                  Wait
                <?php endif; ?>
              <?php endif; ?>
            </h3>
          </div>
          <hr class="mt-0">
          <h6 class="font-weight-bold text-primary mb-3"><?= $row['nama'] ?></h6>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="row m-2">
    <?php foreach ($ruang_cs as $row) : ?>
      <div class="col-sm-6">
        <div class="card mb-3 text-center">
          <div class="card-body">
            <h3 class="text-black font-weight-bold">
              <?php if ($row['aktif'] == 2) : ?>
                Isoma
              <?php else :
                $this->db->select_max('no_antri');
                $query = $this->db->get_where('tb_utama', ['id_ruang' => $row['id_ruang']]);
              ?>
                <?php foreach ($query->result() as $key) : ?>
                  <?= $key->no_antri; ?>
                <?php endforeach; ?>

                <?php if (!$key->no_antri) : ?>
                  <?//php else : ?>
                  Wait
                <?php endif; ?>
              <?php endif; ?>
            </h3>
          </div>
          <hr class="mt-0">
          <h6 class="font-weight-bold text-primary mb-3"><?= $row['nama'] ?></h6>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Content Row -->
      <div class="row">

        <!-- Area Chart -->
        <div class="col-md-12 mt-4">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">BANK JAGO SYARIAH</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>