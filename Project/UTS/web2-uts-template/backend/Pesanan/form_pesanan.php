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
                            <li class="breadcrumb-item"><a href="index.php">List Pesanan</a></li>
                            <li class="breadcrumb-item active">Form Pesanan</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <p class="mb-0">
                                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
                                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
                                </p>

                                <form method="POST" action="proses.php">
                                    <div class="form-group row">
                                        <label for="tanggal" class="col-4 col-form-label">Tanggal</label> 
                                        <div class="col-8">
                                            <input id="tanggal" name="tanggal" type="date" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="pakaian_id" class="col-4 col-form-label">Pakaian</label>
                                        <div class="col-8">
                                            <?php
                                                require_once('../../database/dbkoneksi.php');

                                                $sql = "SELECT * FROM pakaian";
                                                $rs_pakaian = $dbh->query($sql);
                                            ?>
                                            <select id="pakaian_id" name="pakaian_id" class="form-control">
                                                <?php
                                                    foreach ($rs_pakaian as $row_pakaian) {
                                                ?>
                                                    <option value="<?= $row_pakaian['id'] ?>"><?= $row_pakaian['nama'] ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="quantity" class="col-4 col-form-label">Quantity</label> 
                                        <div class="col-8">
                                            <input id="quantity" name="quantity" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-4 col-8">
                                            <button name="proses" value="Simpan" type="submit" class="btn btn-primary">Submit</button>
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
