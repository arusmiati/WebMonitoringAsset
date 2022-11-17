<?php

include 'function.php';
$nik = $_GET['nik'];
$id = $_GET['id'];
$per = $_GET['periode'];
$periode = query("SELECT * FROM periode WHERE periode LIKE '%$per%'");

$units = query("SELECT * FROM unit WHERE id_unit = $id");
$user = query("SELECT * FROM user WHERE id_unit = $id LIMIT 1");
$krono = querys("SELECT * FROM kronologis WHERE id_unit = $id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Asset</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    
    <!-- CSS only -->
    <link rel="stylesheet" href="css/style.css" media="print">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <style>
        body{
            font-family: 'Noto Serif', serif;
        }
        .box-laporan{
            margin-left: 20%;
            font-size: 25px;
        }

        .box-laporan ul li{
            color: #f98989;
        }
        .box-laporan ul li a{
            text-decoration: none;
            color:#E13838 !important;
        }
        .box-laporan ul li a:hover{
            color: #f98989 !important;
        }

        .navbar .collapse1 ul li{
            padding: 0px 3px;
            text-align: center;
            margin-left: 100px
        }

        .navbar .collapse1 ul li a{
            color: #E13838;
            font-weight: 700;
            text-decoration: none;
            font-size: 20px;
        }

        .navbar .collapse1 ul li a:hover{
            color: #f98989;
            
        }
        .box-laporan{
            margin-left: 20%;
            font-size: 25px;
        }

        .box-laporan ul li{
            color: #f98989;
        }
        .box-laporan ul li a{
            text-decoration: none;
            color:#E13838 !important;
        }
        .box-laporan ul li a:hover{
            color: #f98989 !important;
        }

        .data-item a.create {
            background: #E13838;
            border-radius: 20px;
            border: none;
            color: white;
            font-weight: bold;
            text-decoration: none;
            padding: 10px 30px;
        }
        .data-item a.create:hover{
            background: #f98989;
        }
        .laporan-detail{
            padding-top: 50px;
            padding-left: 50px;
            padding-right: 50px;
        }

        .laporan-detail h1{
            text-align: center;
            font-weight: 700;
            font-size: 20px;
            font-family: "Cambria", Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        .laporan-detail p{
            font-size: 18px;
            font-weight: 500;
            margin-bottom: 0px !important;
            font-family: "Cambria", Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        table{
            margin: 20px auto;
            border-collapse: collapse;
            width: 1200px;
        }
        table th{
            background-color: #E13838;
            color: white;
            font-weight: 500;
            border: 1px solid black;
            padding: 10px 20px;
            text-align: center !important;
            font-size: 18px;
            font-weight: 600;
            font-family: "Cambria", Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        table td{
            border: 1px solid black;
            text-align: center;
            font-family: "Cambria", Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        table a{
            font-family: "Cambria", Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            text-decoration: none;
            color: #E13838;
            padding: 5px 10px;
            font-weight: 600;
            margin: 5px 10px;
        }

        table a:hover{
            text-decoration: none;
            color: #f98989;
        }
        li.nav-item.nav{
            background-color: white !important;
        }

        li.nav-item.nav a{
            color: #E13838 !important;
        }

        li.nav-item.nav a:hover{
            color: #f98989 !important;
        }

        .nav-item .back{
            padding: 5px 10px;
            background: none !important;
            border-color: #E13838;
        }

        li.name.nav-item.back {
            background-color: white !important;
            border: 2px #e13838 solid;
            padding: 0px 20px;
        }

        a.btn.back{
            color: #e13838 !important;
            background: none !important;
            border: none !important;
        }

        a.btn.back:hover{
            border: none !important;
        }

        @media print{
            .aksi, .lampiran{
                display: none;
            }
        }
        
    </style>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section class="data" style="background: white !important; width: 100%; min-height: 100vh;">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="navbar-header">
            <img src="foto/logo.png" alt="">
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <div class="collapse1 navbar-collapse" id="navbarNav">
                <?php 
                
                $tanggal = query("SELECT * FROM progress_permasalahan WHERE id_unit = '$id' LIMIT 1");
                $tgl = $tanggal['periode'];
                ?>
                    <li class="nav-item nav"><a class="nav1" href="tambah.php?id=<?= $id ?>&periode=<?= date("j F Y", strtotime($tgl)) ?>">Input</a></li>
                    <li class="nav-item nav"><a class="nav1" href="delete.php?id=<?= $id ?>&nik=<?= $nik ?>&periode=<?= date("j F Y", strtotime($per)) ?>">Delete</a></li>
                    <li class="nav-item nav"><button style="background: none;outline: none; color:#e13838; font-weight: 600; border: none;" onclick="window.print();">Download</button></li>
                </div>
                
                <li class="name nav-item back">
                    <a href="data.php?nik=<?= $nik ?>" class="btn back" aria-hidden="true">Back</a>
                </li> 
                <li class="name nav-item">
                    <a href="logout.php" class="btn" aria-hidden="true">Sign Out</a>
                </li>      
            </ul>      
        </div>
    </nav>


    <div class="laporan">
    <div class="laporan-detail">
        <h1>PROGRESS PENANGANAN PERMASALAHAN ASET TELKOM <br>(LITIGASI, NON LITIGASI, BERPOTENSI BERMASALAH)</h1>
        <br>
       <div class="d-flex">
        <p style="width: 200px;">Unit</p>
        <p>: <?= $units['nama_unit'] ?></p>
       </div>
       <div class="d-flex">
        <p style="width: 200px;">Penanggung Jawab</p>
        <p>: <?= $user['Nama']?></p>
       </div>
       <div class="d-flex">
        <p style="width: 200px;">Periode</p>
        <?php $progres = query("SELECT * FROM progress_permasalahan WHERE periode = '$per' OR id_unit = '$id' LIMIT 1") ?>
        <p>: <?= date("l, j F Y", strtotime($progres['periode'])) ?></p> 
       </div>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Permasalahan & Kategori Permasalahan*</th>
                <th>Ringkasan Permasalahan**</th>
                <th>Progress Penanganan & Rencana Tindak Lanjut***</th>
                <th>Isu Penting</th>
                <th class="aksi">Aksi</th>
            </tr>
            <?php $i=1; 
            $progres = querys("SELECT * FROM progress_permasalahan WHERE periode = '$per' OR id_unit = '$id'");
            foreach ($progres as $p) :?>
            <tr> 
                    <td><?= $i++ ?></td>
                    <td><?= $p['permasalahan'] ?></td>
                    <td><?= $p['ringkasan'] ?></td>
                    <td><?= $p['progress'] ?></td>
                    <td><?= $p['isu'] ?></td>
                    <td class="aksi"><a href="update_progress.php?id=<?= $p['id_progress']?>&nik=<?= $nik ?>&periode=<?= date("j F Y", strtotime($p['periode'])) ?>">Update</a></td>
            </tr>
            <?php endforeach ?>
        </table>
       <p>* Berdasarkan Prioritas</p>
       <p>** Dilengkapi kronologis (di lembar terpisah sebagaimana contoh format terlampir), menjadi satu kesatuan dengan laporan ini</p>
       <p>*** Dilengkapi dengan Waktu dan/atau Rencana Waktu (Time Plan)</p>
    </div>

    <div class="laporan-detail">
        <h1>KRONOLOGIS PERMASALAHAN*</h1>
        <br>
       
        <table border="1">
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Tanggal</th>
                <th rowspan="2">Perihal dan Keterangan</th>
                <th colspan="2">Dokumen Pendukung**</th>
                <th colspan="2">Status Dokumen***</th>
                <th class="aksi" rowspan="2">Aksi</th>
            </tr>
            <tr>
                <th>Ada</th>
                <th>Tidak Ada</th>
                <th>Asli</th>
                <th>Copy</th>
            </tr>
            <?php $i=1; 
           
            foreach ($krono as $k) :?>
            <tr> 
                    <td><?= $i++ ?></td>
                    <td><?php echo $k['tanggal']?></td>
                    <td><?= $k['perihal'] ?></td>
                    <td><?php if($k['dokumen'] == 'ada'){ echo '√';}else{echo ' ';} ?></td>
                    <td><?php if($k['dokumen'] == 'tidak ada'){ echo '√';}else{echo ' ';} ?></td>
                    <td><?php if($k['statuss'] == 'asli'){ echo '√';}else{echo ' ';} ?></td>
                    <td><?php if($k['statuss'] == 'copy'){ echo '√';}else{echo ' ';} ?></td>
                    <td class="aksi"><a href="update_kronologis.php?id=<?= $k['id_kronologis']?>&nik=<?= $nik ?>&periode=<?= date("j F Y", strtotime($per)) ?>">Update</a></td>
            </tr>
            <?php endforeach ?>
        </table>
       <p>* Kronologis dibuat per permasalahan (case) aset</p>
       <p>** Diberi tanda centang (√) di salah satu kolom “Ada” / “Tidak Ada”</p>
       <p>*** Diberi tanda centang (√) di salah satu kolom “Asli” / “Copy”</p>
       <br><br>
       <div class="lampiran">
       
       <?php 
       $kronol = query("SELECT * FROM kronologis WHERE id_unit = $id AND lampiran != ''");
       foreach ($kronol as $kr): ?>
       <p style="font-weight: bold">Lampiran :</p>
            <ul>
                <li><a style="text-decoration: none; color: #E13838; font-weight: bold; padding: 5px 10px;" href=""><?= $kr['lampiran'] ?></a></li>
            </ul>
        <?php endforeach ?>
       </div>
    </div>
    </div>
    </section>
</body>
</html>