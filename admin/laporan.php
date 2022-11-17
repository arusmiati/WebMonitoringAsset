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

        .navbar{
            background-color: white !important;
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

        @media screen and (max-width: 800px) {
            .nabar .collapse1 ul li a{
                font-size: 15px;
            }
        }

    </style>
</head>
<body>
    <section class="data" style="background-image: url(foto/bg8.png); background-size: cover; background-repeat: no-repeat; width: 100%; min-height: 100vh;">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="navbar-header">
            <img src="foto/logo.png" alt="">
        </div>
        
        <div class="collapse1 navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li><a class="nav1" href="tambah.php">Tambah</a></li>
                <li><a class="nav1" href="delete.php">Hapus</a></li>
            </ul>     
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="name nav-item back">
                    <a href="data.php" class="btn back" aria-hidden="true">Back</a>
                </li> 
                <li class="name nav-item">
                    <a href="logout.php" class="btn" aria-hidden="true">Sign Out</a>
                </li>      
            </ul>      
        </div>
    </nav>

    <div class="data-item">
        <iframe src="docs/Format Monitoring Progress Penanganan Permasalahan Aset.pdf" width="100%" style="margin-top: 90px" height="850" frameborder="0"></iframe>
    </div>
    </section>
</body>
</html>