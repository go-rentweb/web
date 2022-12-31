<?php
include 'koneksi.php';
// menyimpan data id kedalam variabel
$username   = $_GET['username'];
// query SQL untuk insert data
$query="DELETE from user where username='$username'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:datauser.php");
?>