<?php

session_start();
if (!isset($_SESSION['$login'])) {
    header("Location: index.php");
    exit;
}

include 'function.php';
$nik = $_GET['nik'];

$idp = query("SELECT DISTINCT periode FROM periode ORDER BY periode");


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
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <!-- CSS only -->
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        .box-laporan {
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

        table {
            border-collapse: collapse;
            width: 1000px;
            margin: 10px auto;
            overflow-y: scroll;
            overflow: auto;
            overflow-x: scroll;
        }

        table th {
            background: #E13838;
            color: white;
            font-weight: 500;
            border: 1px solid black;
            text-align: center !important;
            font-size: 18px;
            font-weight: 600;
            font-family: "Cambria", Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        table td {
            border: 1px solid black;
            text-align: center;
            font-family: "Cambria", Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        table a {
            font-family: "Cambria", Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            text-decoration: none;
            color: #E13838;
            font-size: 18px;
            margin: 5px 10px;
            text-align: left !important;
        }

        table td {
            color: #E13838;
            font-size: 18px;
        }

        table a:hover {
            text-decoration: none;
            color: #f98989;
        }

        .form-inline {
            width: 1000px;
            margin: 10px auto;
            flex-direction: column;
        }

        button.search {
            background: white;
            border: 2px #E13838 solid;
            outline: none;
            color: #E13838;
            font-weight: 500;
            border-radius: 10px;
        }

        button.search:hover {
            background: #E13838;
            color: white;
        }

        button.btn.search.btn-primary:hover {
            background: #f98989;
            color: white;
            animation: 1.5 ease;
            border: none;
        }

        .form-search {
            margin: 5px auto;
            justify-content: right;
            width: 1000px;
        }

        input[type="search"] {
            border: 1px #dddd solid;
            height: 30px;
            width: 220px;
            border-radius: 5px;
            font-size: 13px;
            outline: none;
            padding: 0px 5px;
        }

        .form-inline .form-group {
            width: 1000px;
        }

        .form-search input {
            width: 200px;
            background: none;
            border: 1px #dddd solid;
            outline: none;
            height: 30px;
            font-size: 12px;
            border-radius: 5px;
            padding: 5px 7px;
        }

        button.tombol-cari {
            height: 30px;
            background: none;
            border: none;
            font-size: 15px;
            font-weight: 600;
            color: #e13838;
        }

        .form-inline select {
            width: 300px !important;
        }

        #buttons{
            width: 100%;
            text-align: center;
            margin-bottom: 100px !important;
        }
        input[type="button"] {
            border: 1px #e13838 solid;
            background: white;
            padding: 5px;
            font-size: 15px;
            font-weight: 600;
            margin: 0px 4px;
            color: #E13838;
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <section class="data" style="background-image: url(foto/bg8.png); background-size: cover; background-repeat: no-repeat; background-position: 50%; width: 100%; min-height: 100vh;">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="navbar-header">
                <img src="foto/logo.png" alt="">
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="name nav-item">
                        <a href="logout.php" class="btn" aria-hidden="true">Sign Out</a>
                    </li>
                </ul>
            </div>



        </nav>

        <div class="data-item">
            <div class="header" style="width: 100%">
                <center>
                    <h1 style="color: #e13838; font-size: 60px; font-weight: bold;padding-top: 120px">Laporan Asset</h1>
                </center>
            </div>
            <form class="form-inline" method="POST" action="">
                <div class="form-group">
                    <label for="inputBulan" class="col-sm-2 col-md-2 col-lg-1 col-form-label">Bulan</label>
                    <div class="col-sm-10 col-md-4 col-lg-3">
                        <select name="bulan" id="inputBulan" class="form-control">
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputTahun" class="col-sm-2 col-md-2 col-lg-1 col-form-label">Tahun</label>
                    <div class="col-sm-10 col-md-4 col-lg-3">
                        <select name="tahun" id="inputTahun" class="form-control">
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2020">2023</option>
                            <option value="2021">2024</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputTahun" class="col-sm-2 col-md-2 col-lg-1 col-form-label"></label> 
                    <div class="col-sm-10 col-md-4 col-lg-3">
                        <button class="btn search btn-primary" name="search">Terapkan</button>
                    </div>
                </div>
            </form>

            <div class="box-laporan">
                <br>
                <table id="myTable">
                    <tr>
                        <th>No</th>
                        <th>Laporan</th>
                    </tr>
                    <tr>
                        <?php include 'datarange_all.php' ?>
                    </tr>
                </table>

            </div>
            <br>
        </div>
    </section>
    <!-- Script JS -->
    <script src="js/script.js"></script>
      <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>