<?php
    include_once('../../database/dbkoneksi.php');

    $_id = $_GET["id"];
    $sql = "SELECT * FROM pakaian WHERE id=?";
    $rs = $dbh->prepare($sql);
    $rs -> execute([$_id]);
    $row = $rs -> fetch();
?>

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
          <h1 class="mt-4">View Pakaian</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">List Pakaian</a></li>
            <li class="breadcrumb-item active">View Pakaian</li>
          </ol>
          <div class="card mb-4">
            <div class="card-body">
              <p class="mb-0">

                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
                <link rel="stylesheet"
                  href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
              </p>

              <div class="form-group row">
                <label for="nama" class="col-4 col-form-label">Nama</label>
                <div class="col-8">
                  <label id="nama"><?=$row['nama']?></label>
                </div>
              </div>

              <div class="form-group row">
                <label for="ukuran" class="col-4 col-form-label">Ukuran</label>
                <div class="col-8">
                <label id="ukuran"><?=$row['ukuran']?></label>
                </div>
              </div>

              <div class="form-group row">
                <label for="warna" class="col-4 col-form-label">Warna</label>
                <div class="col-8">
                <label id="warna"><?=$row['warna']?></label>
                </div>
              </div>

              <div class="form-group row">
                <label for="stok" class="col-4 col-form-label">Stok</label>
                <div class="col-8">
                <label id="stok"><?=$row['stok']?></label>
                </div>
              </div>

              <div class="form-group row">
                <label for="harga" class="col-4 col-form-label">Harga</label>
                <div class="col-8">
                <label id="harga"><?=$row['harga']?></label>
                </div>
              </div>

              <div class="form-group row">
                <label for="tipe_pakaian_id" class="col-4 col-form-label">Tipe Pakaian</label>
                <div class="col-8">
                <label id="tipe_pakaian_id"><?=$row['tipe_pakaian_id']?></label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main> 
      <?php include("../Shared/footer.php"); ?>
    </div>
  </div>
</body>

</html>