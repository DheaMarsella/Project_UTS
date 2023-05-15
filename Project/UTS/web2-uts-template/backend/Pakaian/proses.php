<?php
require_once('../../database/dbkoneksi.php');

$_id = $_POST['id'];
$_nama = $_POST['nama'];
$_ukuran = $_POST['ukuran'];
$_warna = $_POST['warna'];
$_stok = $_POST['stok'];
$_harga = $_POST['harga'];
$_tipe_pakaian_id = $_POST['tipe_pakaian_id'];

$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["image_location"]["name"]);
$file_name = $_FILES["image_location"]["tmp_name"];
$imageFileType = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
$_image_location = $target_file . $file_name . $imageFileType;
move_uploaded_file($file_name, $target_file);

$_proses = $_POST['proses'];

// array data
$ar_data[] = $_id; // ? 1
$ar_data[] = $_nama; // ? 2
$ar_data[] = $_ukuran; // 3
$ar_data[] = $_warna;
$ar_data[] = $_stok;
$ar_data[] = $_harga; // ? 7
$ar_data[] = $_tipe_pakaian_id; // ? 7
$ar_data[] = $_image_location;

if ($_proses == "Simpan") {
  // data baru
  $sql = "INSERT INTO pakaian (id,nama,ukuran,warna,stok,
    harga,tipe_pakaian_id,image_location) VALUES (?,?,?,?,?,?,?,?)";
} else if ($_proses == "Update") {
  $ar_data[] = $_POST['idedit']; // ? 8
  $sql = "UPDATE pakaian SET id=?,nama=?,ukuran=?,warna=?,
    stok=?,harga=?,tipe_pakaian_id=?,image_location=? WHERE id=?";
}
if (isset($sql)) {
  $st = $dbh->prepare($sql);
  $st->execute($ar_data);
}

header('Location: ./index.php');
?>