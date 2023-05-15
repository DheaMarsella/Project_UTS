<?php
    include_once('../../database/dbkoneksi.php');

    $sql = "SELECT * FROM tipe_pakaian";
    $rs = $dbh->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
    <?php include("../Shared/head.php"); ?>
    <body class="sb-nav-fixed">
        <?php include("../Shared/nav_header.php"); ?>
        <div id="layoutSidenav">
            <?php include("../Shared/nav_sidebar.php"); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tipe Pakaian</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Tipe Pakaian</li>
                        </ol>
                    
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data List Tipe Pakaian
                            </div>
                            
                            <div class="card-body">
                                <table id="datatablesSimple" class="table">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Tipe</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                            
                                    <tbody>
                                        <?php 
                                            foreach($rs as $row){
                                        ?>
                                            <tr>
                                                <td><?=$row['id']?></td>
                                                <td><?=$row['tipe']?></td>
                                                <td colspan="3">
                                                    <a class="btn btn-primary" href="view.php?id=<?=$row['id']?>">View</a>
                                                    <a class="btn btn-primary" href="update.php?idedit=<?=$row['id']?>">Edit</a>
                                                    <a class="btn btn-primary" href="delete.php?iddel=<?=$row['id']?>"
                                                    onclick="if(!confirm('Anda Yakin Hapus Data Tipe Pakaian <?=$row['tipe']?>?')) {return false}"
                                                    >Delete</a>
                                                </td>
                                            </tr>
                                        <?php  
                                        } 
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <a class="btn btn-success" href="form_tipe_pakaian.php" role="button">Create Pesanan</a>
                        </div>
                    </div>
                </main>
                <?php include("../Shared/footer.php"); ?>
            </div>
        </div>
    </body>
</html>
