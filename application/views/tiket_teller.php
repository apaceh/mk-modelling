<center>
  <b>
    <h3>No Antrian:</h3>
  </b>
  <b>
    <h1><?php foreach ($nasabah as $row) {

          echo 'T-' . $row['teller'];
        } ?></h1>
  </b>
</center>
<script>
  window.print();
</script>