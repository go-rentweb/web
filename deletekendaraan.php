<?php
include 'koneksi.php';
// menyimpan data id kedalam variabel
$nama   = $_GET['nama'];
// query SQL untuk insert data
$query="DELETE from data_unit where nama='$nama'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:datakendaraan.php");
?>