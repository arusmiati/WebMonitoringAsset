<?php

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        .box-laporan{
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
        table{
            border-collapse: collapse;
            width: 1000px;
            margin: 10px auto;
        }
        table th{
            background: #E13838;
            color: white;
            font-weight: 500;
            border: 1px solid black;
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
            font-size: 18px;
            margin: 5px 10px;
            text-align: left !important;
        }

        table td{
            color: #E13838;
            font-size: 18px;
        }
        table a:hover{
            text-decoration: none;
            color: #f98989;
        }

        .form-inline {
            width: 500px;
            margin: 10px auto;
        }

        button.search{
            background: white;
            border: 2px #E13838 solid;
            outline: none;
            color: #E13838;
            font-weight: 500;
            border-radius: 10px;
        }

        button.search:hover{
            background: #E13838;
            color: white;
        }
    </style>
</head>
<body>
   
    <section class="data" style="background-image: url(foto/bg8.png); background-size: cover; background-repeat: no-repeat; background-position: 50%; width: 100%; min-height: 100vh;">
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

    <div class="data-item">
        <div class="header" style="width: 100%">
            <center><h1 style="color: #e13838; font-size: 60px; font-weight: bold;padding-top: 120px">Laporan Asset</h1></center>
        </div>
        <center><a href="create.php?nik=<?php echo $nik ?>" class="create" aria-hidden="true">Create Data</a></center>
        <form class="form-inline" method="POST" action="">
			<label>Date:</label>
			<input type="date" class="form-control" placeholder="Start"  name="date1" value="<?php echo isset($_POST['date1']) ? $_POST['date1'] : '' ?>" />
			<label>To</label>
			<input type="date" class="form-control" placeholder="End"  name="date2" value="<?php echo isset($_POST['date2']) ? $_POST['date2'] : '' ?>"/>
			<button class="btn search btn-primary" name="search">Search</button> 
            
		</form>
        <div class="box-laporan">
            <br>
           
            <table>
                <tr>
                    <th>No</th>
                    <th>Laporan</th>
                </tr>
                <tr>
                    <?php include'datarange_all.php'?>
                </tr>
            </table>
        
        </div>
    </div>
    </section>
</body>
</html>