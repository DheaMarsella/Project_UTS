<?php
    include_once('../../database/dbkoneksi.php');

    $_id = $_GET["id"];
    $sql = "SELECT * FROM pesanan WHERE id=?";
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
          <h1 class="mt-4">View Pesanan</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">List Pesanan</a></li>
            <li class="breadcrumb-item active">View Pesanan</li>
          </ol>
          <div class="card mb-4">
            <div class="card-body">
              <p class="mb-0">

                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
                <link rel="stylesheet"
                  href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
              </p> 
              <div class="form-group row">
                <label for="id" class="col-4 col-form-label">Id</label>
                <div class="col-8">
                    <label id="id"><?=$row['id']?></label>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="tanggal" class="col-4 col-form-label">Tanggal</label>
                <div class="col-8">
                  <label id="tanggal"><?=$row['tanggal']?></label>
                </div>
              </div>

              <div class="form-group row">
                <label for="pakaian_id" class="col-4 col-form-label">Id Pakaian</label>
                <div class="col-8">
                <label id="pakaian_id"><?=$row['pakaian_id']?></label>
                </div>
              </div>

              <div class="form-group row">
                <label for="pakaian_nama" class="col-4 col-form-label">Nama Pakaian</label>
                <div class="col-8">
                  <?php
                      $id = $row['pakaian_id'];
                      $sql = "SELECT * FROM pakaian WHERE id=?";
                      $rs_pakaian = $dbh -> prepare($sql);
                      $rs_pakaian -> execute([$id]);
                      $rs_pakaian_value = $rs_pakaian -> fetch();
                  ?>
                <label id="pakaian_nama"><?=$rs_pakaian_value['nama']?></label>
                </div>
              </div>

              <div class="form-group row">
                <label for="quantity" class="col-4 col-form-label">Quantity</label>
                <div class="col-8">
                <label id="quantity"><?=$row['quantity']?></label>
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