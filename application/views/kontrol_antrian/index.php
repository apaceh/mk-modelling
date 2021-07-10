<div class="row align-content-center justify-content-center m-2">
  <div class="card col-4 shadow">
    <div class="card-body text-center">
      <h4>Antrian Bank Jago</h4>
      <?php if (!isset($antrian)) : ?>
        <h1 class="my-4 text-primary">IDLE</h1>

        <a href="<?= base_url('kontrolAntrian'); ?>/next_antrian/" class="btn btn-success">Ambil Antrian</a>
      <?php else : ?>
        <h1 class="my-4 text-primary"><?= $antrian['no_antri']; ?></h1>

        <a href="<?= base_url('kontrolAntrian'); ?>/next_antrian/<?= $antrian['id']; ?>" class="btn btn-success">Antrian Selanjutnya</a>
      <?php endif; ?>
    </div>
  </div>
</div>