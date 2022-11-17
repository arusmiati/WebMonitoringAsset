<?php

include 'function.php';
$id = $_GET['id'];
$nik = $_GET['nik'];
$per = $_GET['periode'];
$conn = koneksi();
$history = mysqli_query($conn, "SELECT * FROM history WHERE id_progress = $id ORDER BY id_history DESC");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            font-family: "Cambria", Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        .navbar .collapse1 ul li a {
            color: #E13838;
            font-weight: 700;
            text-decoration: none;
            font-size: 20px;
        }

        .navbar .collapse1 ul li a:hover {
            color: #f98989;

        }

        .box-laporan {
            margin-left: 20%;
            font-size: 25px;
        }

        .box-laporan ul li {
            color: #f98989;
        }

        .box-laporan ul li a {
            text-decoration: none;
            color: #E13838 !important;
        }

        .box-laporan ul li a:hover {
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

        .data-item a.create:hover {
            background: #f98989;
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

        .data-item a.create:hover {
            background: #f98989;
        }

        .laporan-detail {
            padding-top: 50px;
            padding-left: 50px;
            padding-right: 50px;
        }

        .laporan-detail h1 {
            text-align: center;
            font-weight: 700;
            font-size: 20px;
            font-family: "Cambria", Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        .laporan-detail p {
            font-size: 18px;
            font-weight: 500;
            margin-bottom: 0px !important;
            font-family: "Cambria", Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 1200px;
        }

        table th {
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

        table td {
            border: 1px solid black;
            text-align: center;
            padding: 0px 5px;
            font-family: "Cambria", Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        table a {
            font-family: "Cambria", Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            text-decoration: none;
            color: #E13838;
            padding: 5px 10px;
            font-weight: 600;
            margin: 5px 10px;
        }

        table a:hover {
            text-decoration: none;
            color: #f98989;
        }

        li.nav-item.nav {
            background-color: white !important;
        }

        li.nav-item.nav a {
            color: #E13838 !important;
        }

        li.nav-item.nav a:hover {
            color: #f98989 !important;
        }

        .nav-item .back {
            padding: 5px 10px;
            background: none !important;
            border-color: #E13838;
        }

        li.name.nav-item.back {
            background-color: white !important;
            border: 2px #e13838 solid;
            padding: 0px 20px;
        }

        p {
            font-family: "Cambria", Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        a.btn.back {
            color: #e13838 !important;
            background: none !important;
            border: none !important;
        }

        a.btn.back:hover {
            border: none !important;
        }

        td.history a {
            text-align: center;
            padding: 0 !important;
            margin: 0 !important;
        }

        h1 {
            color: #e13838;
            font-weight: 700;
            font-size: 35px;
            font-family: "Cambria", Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        .history-item {
            background: none;
            border: 1px #efefef solid;
            box-shadow: 2px 5px 5px 2px #efefef;
            margin: 10px 50px;
            padding: 5px 15px;
            border-radius: 10px;
            font-family: "Cambria", Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            overflow-y: scroll;
            overflow: auto;
        }

        p.tanggal {
            font-size: 12px;
            color: grey;
            margin-top: -10px;
            font-weight: 700;
            font-family: "Cambria", Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        p.title {
            font-family: "Cambria", Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-weight: 700;
            margin-bottom: -5px;
            color: #e13838;
        }
    </style>
</head>

<body>
    <section class="data" style="background: white !important; width: 100%; min-height: 100vh;">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="navbar-header">
                <img src="foto/logo.png" alt="">
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">

                    <li class="name nav-item back">
                        <a href="laporan_detail1.php?nik=<?= $nik ?>&periode=<?= $per ?>" class="btn back" aria-hidden="true">Back</a>
                    </li>
                    <li class="name nav-item">
                        <a href="logout.php" class="btn" aria-hidden="true">Sign Out</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="history">
            <center>
                <h1>HISTORY</h1>
            </center>
            <?php
            $i = 1;
            foreach ($history as $h) :
            ?>
                <div class="history-item">
                    <?php
                    $id_unit = $h['id_unit'];
                    $names = query("SELECT nama_unit FROM unit WHERE id_unit = $id_unit");
                    $nama = $names['nama_unit'];
                    ?>
                    <p class="nama"><i class="fa fa-user"></i> <?php echo $nama  ?></p>
                    <p class="tanggal"><?php echo $h['ket'] ?> <?= date("l, j F Y, H:i A", strtotime($h["last_edit"])) ?></p>

                    <table border="1">
                        <tr class="th" bgcolor='#e13838'>
                            <th>No</th>
                            <th>Permasalahan & Kategori Permasalahan*</th>
                            <th>Ringkasan Permasalahan**</th>
                            <th>Progress Penanganan & Rencana Tindak Lanjut***</th>
                            <th>Isu Penting</th>
                        </tr>

                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $h['permasalahan'] ?></td>
                            <td><?php echo $h['ringkasan'] ?></td>
                            <td><?php echo $h['progress'] ?></td>
                            <td><?php echo $h['isu'] ?></td>
                        </tr>
                    </table>
                </div>
            <?php endforeach ?>
            <br>

        </div>
   <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>