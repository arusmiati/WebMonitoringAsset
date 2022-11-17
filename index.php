<?php

session_start();

if(isset($_SESSION['$login'])){
    header("Location: homepage.php");
    exit;
}
require 'function.php';

if(isset($_POST['Submit'])){
    $login = Login($_POST);
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
    <style>
        .login-container{
            min-height: 60vh !important;
        }
    </style>
    <!-- CSS only -->
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
<section class="main">
        <div class="login-container">
            <div class="form-cont">
                <div class="inner-form">
                    <div class="social-login">
                        <img src="foto/logo.png" alt="" srcset="">
                    </div>
                    <br>
                    <div class="login-form">
                        <form action="getldap.php" method="post">
                            <div>
                                <label>NIK</label>
                                <input type="text" name="nik" class="form-control" id="nik" aria-describedby="namelHelp" placeholder="Input NIK" required>
                            </div>
                            <div>
                                <label>Password</label>
                                <input name="password" type="password" class="form-control password-field" id="password-field" placeholder="Input Password" required>
                                <span id="hide" toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password-icon"></span>
                            </div>
                            <?php if(isset($login['error'])):?>
                                <p class="error" style="color: red; font-weigth: 400;"><?= $login['pesan']; ?></p>
                            <?php endif ?>
                            <button type="submit" name="Submit" value="Submit" class="button btn btn-primary">
                                Login
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
       <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>