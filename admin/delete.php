<?php 
session_start();
$nik = $_GET['nik'];
if(!isset($_SESSION['$login'])){
    header("Location: homepage.php?nik=$nik");
    exit;
}

require 'function.php';
$id = $_GET['id'];
$per = $_GET['periode'];

if (Hapus($per) > 0) {
    echo "<script>
        alert('Data berhasil dihapus');
        </script>";
    header("Location:data.php?nik=$nik");
} else {
    echo 'Data gagal dihapus';
}
