<?php
    include_once('../../database/dbkoneksi.php');

    $sql = "SELECT * FROM pesanan";
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
                        <h1 class="mt-4">List Pesanan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">List Pesanan</li>
                        </ol>
                    
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data List Pesanan
                            </div>
                            
                            <div class="card-body">
                                <table id="datatablesSimple" class="table">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Tanggal</th>
                                            <th>Id Pakaian</th>
                                            <th>Nama Pakaian</th>
                                            <th>Quantity</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        <?php 
                                            foreach($rs as $row){
                                                $id = $row['pakaian_id'];
                                                $sql = "SELECT * FROM pakaian WHERE id=?";
                                                $rs_pakaian = $dbh -> prepare($sql);
                                                $rs_pakaian -> execute([$id]);
                                                $rs_pakaian_value = $rs_pakaian -> fetch();
                                        ?>
                                            <tr>
                                                <td><?=$row['id']?></td>
                                                <td><?=$row['tanggal']?></td>
                                                <td><?=$row['pakaian_id']?></td>
                                                <td><?=$rs_pakaian_value['nama']?></td>
                                                <td><?=$row['quantity']?></td>
                                                <td colspan="3">
                                                    <a class="btn btn-primary" href="view.php?id=<?=$row['id']?>">View</a>
                                                    <a class="btn btn-primary" href="update.php?idedit=<?=$row['id']?>">Edit</a>
                                                    <a class="btn btn-primary" href="delete.php?iddel=<?=$row['id']?>"
                                                    onclick="if(!confirm('Anda Yakin Hapus Data Pesanan dengan id <?=$row['id']?>?')) {return false}"
                                                    >Delete</a>
                                                </td>
                                            </tr>
                                        <?php  
                                            } 
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <a class="btn btn-success" href="form_pesanan.php" role="button">Create Pesanan</a>
                        </div>
                    </div>
                </main>
                <?php include("../Shared/footer.php");?>
            </div>
        </div>
    </body>
</html>
