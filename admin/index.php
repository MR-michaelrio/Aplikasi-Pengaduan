<?php
session_start();
include '../koneksi.php';
$koneksi = new database();

include "../template/index.php";



echo $_SESSION['username'];echo"<br>";
echo $_SESSION['password'];echo"<br>";
echo $_SESSION['level'];echo"<br>";
?>