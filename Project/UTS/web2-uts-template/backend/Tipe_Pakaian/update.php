<?php
    include_once('../../database/dbkoneksi.php');

    $_id = $_GET["idedit"];
    $sql = "SELECT * FROM tipe_pakaian WHERE id=?";
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
          <h1 class="mt-4">Form Edit Tipe Pakaian</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">List Tipe Pakaian</a></li>
            <li class="breadcrumb-item active">Form Edit Tipe Pakaian</li>
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
                  <div class="col-8">
                    <input id="idedit" type="hidden" value=<?=$row['id']?> name="idedit" class="form-control">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="tipe" class="col-4 col-form-label">Tipe Pakaian</label>
                  <div class="col-8">
                    <input id="tipe" value="<?=$row['tipe']?>" name="tipe" type="text" class="form-control">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="offset-4 col-8">
                    <button name="proses" type="submit" class="btn btn-primary" value="Update">Submit</button>
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