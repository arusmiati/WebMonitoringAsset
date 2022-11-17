<?php 
session_start();
require 'function.php';
$id = $_GET['id'];
$per = $_GET['periode'];
$nik = $_GET['nik'];
if(!isset($_SESSION['$login'])){
    header("Location: homepage.php?nik=$nik");
    exit;
}

$kronologis = query("SELECT * FROM user WHERE id_unit = '$id' LIMIT 1");
$nik = $kronologis['username'];
if (Hapus($nik) > 0) {
    echo "<script>
        alert('Data berhasil dihapus');
        </script>";
    header("Location:data.php?nik=$nik");
} else {
    header("Location:data.php?nik=$nik");
}
