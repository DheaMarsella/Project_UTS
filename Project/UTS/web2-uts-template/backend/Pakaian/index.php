<?php
    include_once('../../database/dbkoneksi.php');

    $sql = "SELECT * FROM pakaian";
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
                        <h1 class="mt-4">List Pakaian</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">List Pakaian</li>
                        </ol>
                    
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data List Pakaian
                            </div>
                            
                            <table id="datatablesSimple" class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nama</th>
                                        <th>Ukuran</th>
                                        <th>Warna</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th>Tipe Pakaian Id</th>
                                        <th>Tipe Pakaian</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    foreach($rs as $row){
                                        $id_tipe_pakaian = $row['tipe_pakaian_id'];
                                        $sql_get_tipe_pakaian_id = "SELECT * FROM tipe_pakaian WHERE id=?";
                                        $rs_tipe_pakaian = $dbh->prepare($sql_get_tipe_pakaian_id);
                                        $rs_tipe_pakaian -> execute([$id_tipe_pakaian]);
                                        $rs_tipe_pakaian_value = $rs_tipe_pakaian->fetch();
                                ?>
                                    <tr>
                                        <td><?=$row['id']?></td>
                                        <td><?=$row['nama']?></td>
                                        <td><?=$row['ukuran']?></td>
                                        <td><?=$row['warna']?></td>
                                        <td><?=$row['stok']?></td>
                                        <td><?=$row['harga']?></td>
                                        <td align="center"><?=$row['tipe_pakaian_id']?></td>
                                        <td><?=$rs_tipe_pakaian_value['tipe']?></td>
                                        <td colspan="3">
                                            <a class="btn btn-primary" href="view.php?id=<?=$row['id']?>">View</a>
                                            <a class="btn btn-primary" href="update.php?idedit=<?=$row['id']?>">Edit</a>
                                            <a class="btn btn-primary" href="delete.php?iddel=<?=$row['id']?>"
                                            onclick="if(!confirm('Anda Yakin Hapus Data Pelanggan <?=$row['nama']?>?')) {return false}"
                                            >Delete</a>
                                        </td>
                                    </tr>
                                <?php  
                                    } 
                                ?>
                                </tbody>
                            </table>
                            <a class="btn btn-success" href="form_pakaian.php" role="button">Create Pakaian</a>
                        </div>
                    </div>
                </main>
                <?php include("../Shared/footer.php"); ?>
            </div>
        </div>
    </body>
</html>
