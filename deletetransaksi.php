<?php
include 'koneksi.php';
// menyimpan data id kedalam variabel
$id_transaksi   = $_GET['id_transaksi'];
// query SQL untuk insert data
$query="DELETE from transaksi where id_transaksi='$id_transaksi'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:datatransaksi.php");
?>