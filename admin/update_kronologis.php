<?php 
require 'function.php';
$id = $_GET['id'];
$nik = $_GET['nik'];
$user = query("SELECT * FROM user WHERE username = '$nik' LIMIT 1");
$idu = $user['id_unit'];
$periode = $_GET['periode'];
$kronologis = query("SELECT * FROM kronologis WHERE id_kronologis = $id");

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
    
}
if (isset($_POST['update'])) {
    if (updateKronologis($_POST) > 0) {
        alert("Data Berhasil Ditambahkan");
        header("Location:laporan_detail.php?id=$idu&nik=$nik&periode=$periode");
       
    } else {
        alert('Data Gagal Diupdate');
        header("Location:laporan_detail.php?idu=$id&nik=$nik&periode=$periode");
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Asset</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
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
            background: white !important;
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
        /* laporan */
        .create-item form{
            background: #e70000;
            margin: 40px 100px;
            padding: 20px;
        }

        
        .title.d-flex p {
            color: white;
            width: 200px;
        }

        p.titik {
            width: 20px !important;
        }

        input.forum, textarea{
            border: 1px white solid;
            width: 800px;
            margin-bottom: 10px;
            padding-left: 12px;
            border-radius: 5px;
        }

        input.forum:focus, textarea:focus{
            box-shadow: 0 5px 10px white;
            outline: none;
        }

        .create-item h5{
            color:white;
            font-weight: 700;
            font-size: 20px;
        }

        textarea{
            height: 100px !important;
        }
        
        .cek{
            color: white;
            font-weight: 400;
        }

        .btn{
            width: 100%;
            text-align: right;
            border: none;
            outline: none;
        }

        .btn button {
            background: white;
            border: 2px #e13838 solid;
            padding: 10px 30px;
            border-radius: 20px;
            color: red;
            font-weight: 700;
        }

        .btn button:focus{
            outline: none;
            border: 0px #E13838 solid;
        }

        .btn button:hover{
            background: #f98989;
            color: white;
        }

        input.forum1{
            background: white;
            padding: 5px;
        }
    </style>
</head>
<body>
    <section class="data" style="background-image: url(foto/bg8.png); background-size: cover; background-repeat: no-repeat; width: 100%; min-height: 100vh;">
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
                <li class="name nav-item back">
                    <a href="laporan_detail.php?id=<?= $id ?>&nik=<?= $nik ?>&periode=<?= date("j F Y", strtotime($periode)) ?>" class="btn back" aria-hidden="true">Back</a>
                </li> 
                <li class="name nav-item">
                    <a href="login.php" class="btn" aria-hidden="true">Sign Out</a>
                </li>      
            </ul>      
        </div>
    </nav>

    <div class="create-item">
        <form action="" method="post" enctype="multipart/form-data" class="dropzone" id="image-upload">

            <h5>Kronologis Permasalahan</h5>
            <div class="title d-flex">
              <p>Tanggal</p>
              <p class="titik">:</p>
              <input class="forum" type="date" name="tanggal" value="<?= $kronologis['tanggal']?>" id="" required>
            </div>
            <div class="title d-flex">
              <p>Perihal dan Keterangan</p>
              <p class="titik">:</p>
              <textarea name="perihal" id="" cols="20" rows="10" required><?= $kronologis['perihal']?></textarea>
            </div>
            <div class="title d-flex">
              <p>Dokumen Pendukung</p>
              <p class="titik">:</p>
              <div class="cek">
                <input type="checkbox" name="dokumen" id="" <?php if (isset($dokumen) && $dokumen=="ada") echo "checked";?> value="ada">&nbsp; Ada &nbsp; &nbsp; 
                <input type="checkbox" name="dokumen" id="" <?php if (isset($dokumen) && $dokumen=="tidak ada") echo "checked";?> value="tidak ada">&nbsp; Tidak Ada
              </div>
            </div>
            <div class="title d-flex">
              <p>Status Dokumen </p>
              <p class="titik">:</p>
              <div class="cek">
                <input type="checkbox" name="status" id="" <?php if (isset($status) && $status=="asli") echo "checked";?> value="asli">&nbsp; Asli &nbsp; &nbsp; 
                <input type="checkbox" name="status" id="" <?php if (isset($status) && $status=="copy") echo "checked";?> value="copy">&nbsp; Copy
              </div>
            </div>
            <div class="title d-flex">
              <p>Upload Dokumen Pendukung (Bila Ada)</p>
              <p class="titik">:</p>
              <div class="cek">
                <input  class="forum forum1" type="file" name="lampiran"/><br>
                <label for="" style="color: white"><?= $kronologis['lampiran'] ?></label>
              </div>
            </div>
            <div class="click">
              <div class="btn">
                <button name="update" type="submit">Update Data</button>
              </div>
            </div>
        </form>
    </div>
    </section>

    <script>
        $('input[type="checkbox"]').on('change', function() {
            $('input[name="' + this.name + '"]').not(this).prop('checked', false);
        });
    </script>
</body>
</html>