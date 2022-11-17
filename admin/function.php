<?php
function koneksi()
{
    return mysqli_connect('localhost', 'root', '', 'telkom');
}

function query($query)
{
    $conn = koneksi();

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result)==1){
        return mysqli_fetch_assoc($result);
    }


    $rows = []; 
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function querys($query)
{
    $conn = koneksi();

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result)==0){
        return mysqli_fetch_assoc($result);
    }


    $rows = []; 
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}
function login($data)
{
    $conn = koneksi();

    $username = htmlspecialchars($data['nik']);
    $password = htmlspecialchars($data['password']);
    
    if ($user = query("SELECT * FROM user WHERE username = '$username'")) {
        error_reporting(0);
        $nama = $user['nama'];
        $last = "UPDATE user SET last_login = CURRENT_TIMESTAMP() WHERE Nama = '$nama'";
        mysqli_query($conn, $last);

        header("Location: homepage.php");
        exit;
    }

    return [
        'error' => true,
        'pesan' => 'Username/Password Salah'
    ];
}

function TambahData($data)
{
    $conn = koneksi();
    $nik = $_GET['nik'];
    $user = query("SELECT * FROM user WHERE username = '$nik'");
    $id_unit = $user['id_unit'];
    $periode = htmlspecialchars($data['periode']);
    $permasalahan = htmlspecialchars($data['permasalahan']);
    $ringkasan = htmlspecialchars($data['ringkasan']);
    $progress = htmlspecialchars($data['progress']);
    $isu = htmlspecialchars($data['isu']);
    $tanggal = htmlspecialchars($data['tanggal']);
    $perihal = htmlspecialchars($data['perihal']);
    $cek = $_POST['dokumen'];
    $status = $_POST['status'];
    $direktori = "docs/";
    $lampiran = $_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], $direktori . $lampiran);
    $bln = date("F Y", strtotime($data['periode']));
    $query_periode = "INSERT INTO periode VALUES ('', '$bln', '$id_unit')";
    mysqli_query($conn, $query_periode);

    $query_laporan = "INSERT INTO progress_permasalahan VALUES ('', '$periode', '$id_unit', '$permasalahan', '$ringkasan', '$progress', '$isu')";
    mysqli_query($conn, $query_laporan);

    $query_kronologis = "INSERT INTO kronologis VALUES ('', '$periode', '$id_unit', '$tanggal', '$perihal', '$cek', '$status', '$lampiran')";
    mysqli_query($conn, $query_kronologis);
    header("Location:data.php?nik=$nik");
}

function TambahData1($data)
{
    $conn = koneksi();
    $id = $_GET['id'];
    $nik = $_GET['nik'];
    $user = query("SELECT * FROM user WHERE id_unit = '$id'");
    $periode = $_GET['periode'];
    $permasalahan = htmlspecialchars($data['permasalahan']);
    $ringkasan = htmlspecialchars($data['ringkasan']);
    $progress = htmlspecialchars($data['progress']);
    $isu = htmlspecialchars($data['isu']);
    $tanggal = htmlspecialchars($data['tanggal']);
    $perihal = htmlspecialchars($data['perihal']);
    $cek = $_POST['dokumen'];
    $status = $_POST['status'];
    $direktori = "docs/";
    $lampiran = $_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], $direktori . $lampiran);
    
    $query_laporan = "INSERT INTO progress_permasalahan VALUES ('', '$periode', '$id', '$permasalahan', '$ringkasan', '$progress', '$isu')";
    mysqli_query($conn, $query_laporan);

    $query_kronologis = "INSERT INTO kronologis VALUES ('', '$periode', '$id', '$tanggal', '$perihal', '$cek', '$status', '$lampiran')";
    mysqli_query($conn, $query_kronologis);
    header("Location:laporan_detail.php?id=$id&nik=$nik&periode=date('j F Y', strtotime($periode))");
}

function updateProgress($id){
    
    $conn = koneksi();
    $nik = $_GET['nik'];
    $per = $_GET['periode'];
    $id = $_GET['id'];
    $permasalahan = $_POST['permasalahan'];
    $ringkasan = $_POST['ringkasan'];
    $progress = $_POST['progress'];
    $isu = $_POST['isu'];
    $query = "UPDATE progress_permasalahan SET 
                permasalahan = '$permasalahan',
                ringkasan = '$ringkasan',
                progress = '$progress',
                isu = '$isu' WHERE id_progress = '$id'";
    mysqli_query($conn, $query) or die (mysqli_error($conn));
    return mysqli_affected_rows($conn);
    header("Location:laporan_detail.php?id=<?= $id ?>&nik=<?= $nik ?>&periode=<?= date('j F Y', strtotime($per)) ?>");
}

function upload()
{
    $nama_file = $_FILES['lampiran']['name'];
    $tipe_file = $_FILES['lampiran']['type'];
    $ukuran_file = $_FILES['lampiran']['size'];
    $error = $_FILES['lampiran']['error'];
    $tmp_file = $_FILES['lampiran']['tmp_name'];
    $ekstensi_file = explode('.', $nama_file);
    $ekstensi_file = strtolower(end($ekstensi_file));


    $nama_file_baru = uniqid();
    $nama_file_baru .= '.';
    $nama_file_baru .= $ekstensi_file;
    move_uploaded_file($tmp_file, 'docs/' . $nama_file_baru);

    return $nama_file_baru;
}

function updateKronologis($id){
    $conn = koneksi();
    $nik = $_GET['nik'];
    $per = $_GET['periode'];
    $id = $_GET['id'];
    $tanggal = $_POST['tanggal'];
    $perihal = $_POST['perihal'];
    $dokumen = $_POST['dokumen'];
    $status = $_POST['status'];
    
    $lampiran = upload();
    if(!$lampiran){
        return false;
    }

    $query = "UPDATE kronologis SET 
                tanggal = '$tanggal',
                perihal = '$perihal',
                dokumen = '$dokumen',
                statuss = '$status',
                lampiran = '$lampiran'
                 WHERE id_kronologis = '$id'";
    mysqli_query($conn, $query) or die (mysqli_error($conn));
    return mysqli_affected_rows($conn);
    header("Location:laporan_detail.php?id=<?= $id ?>&nik=<?= $nik ?>&periode=<?= date('j F Y', strtotime($per)) ?>");
}

function Hapus($id){
    $conn = koneksi();

    $id = $_GET['id'];
    $nik = $_GET['nik'];
    $periode = $_GET['periode'];
    $kronologis = query("SELECT * FROM kronologis WHERE id_unit = $id AND periode = $periode");

    unlink('docs/' .$kronologis['lampiran']);

    mysqli_query($conn, "DELETE FROM progress_permasalahan WHERE id_unit = $id AND periode = $periode") or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);

    mysqli_query($conn, "DELETE FROM kronologis WHERE id_unit = $id AND periode = $periode") or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}
?>