<div class="container pt-5">
  <div class="h2 text-center mb-3">Ambil No Antrian Anda</div>
  <form class="user col-5 mx-auto">

    <div class="h2 text-center mt-5">
      <?php foreach ($nasabah as $row) {
        if ($row['teller'] > 0) {
          echo 'T-' . $row['teller'];
        } else {
          echo "Belum ada antrian";
        }
      }
      ?>
    </div>
    <a href="<?php echo base_url() ?>nasabah/teller/<?php echo $row['teller'] ?>" class="btn btn-google btn-user btn-block">
      <div class="h4">Teller</div>
    </a>
    <div class="h2 text-center mt-5">
      <?php foreach ($nasabah as $row) {
        if ($row['cs'] > 0) {
          echo 'CS-' . $row['cs'];
        } else {
          echo "Belum ada antrian";
        }
      }
      ?>
    </div>
    <a href="<?php echo base_url() ?>nasabah/cs/<?php echo $row['cs'] ?>" class="btn btn-facebook btn-user btn-block">
      <div class="h4">Customer Service</div>
    </a>
  </form>
</div>