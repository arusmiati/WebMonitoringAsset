<?php
session_start();
if (!isset($_SESSION['$login'])) {
    header("Location: login.php");
    exit;
}
  
include 'function.php';
$nik = $_GET['nik'];

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
    
</head>
<body>
    <section class="home">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="navbar-header">
            <img src="foto/logo.png" alt="">
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
    <div class="home-item d-flex">
        <div class="home-left">
            <img src="foto/icon.png" alt="" srcset="" width="400px">
            <img src="foto/ellipse2.png" alt="" srcset="" width="400px"> 
        </div>
        <div class="home-right">
            <h1 class="text1">MONITORING</h1>
            <h1 class="text2">ASSET</h1>
            
            <a href="data.php?nik=<?= $nik ?>">Lihat Selengkapnya</a>
        </div>
    </div>
    </section>
</body>
</html>