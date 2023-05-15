<!DOCTYPE html>
<html lang="en">

<?php include("../Shared/head.php"); ?>
<body>
  <?php include("../Shared/nav_header.php"); ?>
  <div id="layoutSidenav">
    <?php include("../Shared/nav_sidebar.php"); ?>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-4">
          <h1 class="mt-4">Form Pesanan</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">List Pakaian</a></li>
            <li class="breadcrumb-item active">Form Pesanan</li>
          </ol>
          <div class="card mb-4">
            <div class="card-body">
              <p class="mb-0">
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
                <link rel="stylesheet"
                  href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
              </p>

              <form method="POST" action="proses.php">
                <div class="form-group row">
                  <label for="nama" class="col-4 col-form-label">Nama</label>
                  <div class="col-8">
                    <input id="nama" name="nama" type="text" class="form-control" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="ukuran" class="col-4 col-form-label">Ukuran</label>
                  <div class="col-8">
                    <input id="ukuran" name="ukuran" type="text" class="form-control" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="warna" class="col-4 col-form-label">Warna</label>
                  <div class="col-8">
                    <input id="warna" name="warna" type="text" class="form-control">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="stok" class="col-4 col-form-label">Stok</label>
                  <div class="col-8">
                    <input id="stok" name="stok" type="text" class="form-control" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="harga" class="col-4 col-form-label">Harga</label>
                  <div class="col-8">
                    <input id="harga" name="harga" type="text" class="form-control" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="tipe_pakaian_id" class="col-4 col-form-label">Tipe Pakaian</label>
                  <div class="col-8">
                    <?php
                      require_once('../../database/dbkoneksi.php');

                      $sql_tipe_pakaian = "SELECT * FROM tipe_pakaian";
                      $rs_tipe_pakaian = $dbh->query($sql_tipe_pakaian);
                    ?>
                    <select id="tipe_pakaian_id" name="tipe_pakaian_id" class="form-control">
                      <?php
                      foreach ($rs_tipe_pakaian as $row_tipe_pakaian) {
                      ?>
                      <option value="<?= $row_tipe_pakaian['id'] ?>"><?= $row_tipe_pakaian['tipe'] ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="image_location" class="col-4 col-form-label">Foto</label>
                  <div class="col-8">
                    <input id="image_location" name="image_location" type="file" class="form-control" required>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="offset-4 col-8">
                    <button name="proses" type="submit" class="btn btn-primary"
                      value="Simpan">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </main>
      <?php include("../Shared/footer.php"); ?>
    </div>
  </div>   
</body>

</html>