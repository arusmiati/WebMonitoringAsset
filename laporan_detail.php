<?php

include 'function.php';
$conn = koneksi();
$nik = $_GET['nik'];
$id = $_GET['id'];
$per = $_GET['periode'];
$periode = query("SELECT * FROM periode WHERE periode LIKE '%$per%'");

$units = query("SELECT * FROM unit WHERE id_unit = $id");
$user = query("SELECT * FROM user WHERE id_unit = $id LIMIT 1");
$krono = mysqli_query($conn, "SELECT * FROM kronologis WHERE id_unit = $id AND tanggal != ''");

if (isset($_POST['delete'])) {
    header("Location:data.php?nik=<?= $nik ?>");
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


    <!-- CSS only -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/style.css" media="print">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/fe8876d200.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    
    <style>
        body {
            font-family: 'Noto Serif', serif;
        }

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

        .navbar .collapse1 ul li {
            padding: 0px 3px;
            text-align: center;
            margin-left: 100px
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

        .laporan-detail p,
        pre {
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

        td.history li {
            list-style: none;
            text-align: left;
            padding-left: 10px;
            font-size: 13px;
        }

        @media print {

            th.aksi,
            td.history,
            .lampiran {
                display: none;
            }

            pre {
                border: none !important;
            }
            @page {
                size: A4 landscape;
            }

            thead { display:table-header-group }


        }
        
        .lampiran ul li {
            list-style: none;
            background: #fefefe;
            width: 200px;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 1px 2px 4px 1px #dddd;
            font-size: 12px;
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
                    <div class="collapse1 navbar-collapse" id="navbarNav">
                        <?php
                        $tanggal = query("SELECT * FROM progress_permasalahan WHERE id_unit = '$id' LIMIT 1");
                        $tgl = $tanggal['periode'];
                        ?>
                        <li class="nav-item nav tambah"><a class="nav1" href="tambah.php?id=<?= $id ?>&nik=<?= $nik?>&periode=<?= $per ?>">Input</a></li>

                        <li class="nav-item nav hapus"><a class="nav1" href="delete.php?id=<?= $id ?>&nik=<?= $nik ?>&periode=<?= $per ?>">Delete</a></li>
                        <li class="nav-item nav download"><button style="background: none;outline: none; color:#e13838; font-weight: 600; border: none;" onclick="window.print();">Download</button></li>
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


        <div class="laporan print" id="example">
            <div class="laporan-detail">
                <h1>PROGRESS PENANGANAN PERMASALAHAN ASET TELKOM <br>(LITIGASI, NON LITIGASI, BERPOTENSI BERMASALAH)</h1>
                <br>
                <div class="d-flex">
                    <p style="width: 200px;">Unit</p>
                    <p>: <?= $units['nama_unit'] ?></p>
                </div>
                <div class="d-flex">
                    <p style="width: 200px;">Penanggung Jawab</p>
                    <p style="font-style: italic;">: (Diisi Manual)</p>
                </div>
                <div class="d-flex">
                    <p style="width: 200px;">Periode</p>
                    <?php $progres = query("SELECT * FROM progress_permasalahan WHERE periode = '$per' AND id_unit = '$id' LIMIT 1") ?>
                    <p>: <?= $progres['periode'] ?></p>
                </div>
                <table border="1" id="example" class="display nowrap">
                    <thead>
                        <th>No</th>
                        <th>Permasalahan & Kategori Permasalahan*</th>
                        <th>Ringkasan Permasalahan**</th>
                        <th>Progress Penanganan & Rencana Tindak Lanjut***</th>
                        <th>Isu Penting</th>
                        <th class="aksi">Aksi</th>
                    </thead>
                    <?php $i = 1;
                    $progres = querys("SELECT * FROM progress_permasalahan WHERE periode = '$per' AND id_unit = '$id'");
                    foreach ($progres as $p) : ?>
                            <td><?= $i++ ?></td>
                            <td align=left valign=top>
                                <?= nl2br($p['permasalahan']) ?>
                            </td>
                            <td align=left valign=top>
                            <?= nl2br($p['ringkasan']) ?>
                            </td>
                            <td align=left valign=top>
                            <?= nl2br($p['progress']) ?>
                            </td>
                            <td align=left valign=top>
                            <?= nl2br($p['isu']) ?>
                            </td>
                            <td class="history">
                                <li><a href="update_progress.php?id=<?= $p['id_progress'] ?>&nik=<?= $nik ?>&periode=<?= $p['periode'] ?>">Update</a></li>
                                <li><a href="history.php?id=<?= $p['id_progress'] ?>&nik=<?= $nik ?>&periode=<?= $p['periode'] ?>">History</a></li>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
                <p>* Berdasarkan Prioritas</p>
                <p>** Dilengkapi kronologis (di lembar terpisah sebagaimana contoh format terlampir), menjadi satu kesatuan dengan laporan ini</p>
                <p>*** Dilengkapi dengan Waktu dan/atau Rencana Waktu (Time Plan)</p>
            </div>
            <?php $row = mysqli_num_rows($krono);
            if ($row < 1) {
            ?>
                <div class="laporan-detail" style="display: none;"></div>
            <?php } else { ?>
                <div class="laporan-detail kronologis">
                    <h1>KRONOLOGIS PERMASALAHAN*</h1>
                    <br>

                    <table border="1">
                        <thead>
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
                        </thead>
                        <?php $i = 1;

                        foreach ($krono as $k) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?php echo $k['tanggal'] ?></td>
                                <td align=left valign=top>
                                <?= nl2br($k['perihal']) ?>
                                </td>
                                <td><?php if ($k['dokumen'] == 'ada') {
                                        echo '√';
                                    } else {
                                        echo ' ';
                                    } ?></td>
                                <td><?php if ($k['dokumen'] == 'tidak ada') {
                                        echo '√';
                                    } else {
                                        echo ' ';
                                    } ?></td>
                                <td><?php if ($k['statuss'] == 'asli') {
                                        echo '√';
                                    } else {
                                        echo ' ';
                                    } ?></td>
                                <td><?php if ($k['statuss'] == 'copy') {
                                        echo '√';
                                    } else {
                                        echo ' ';
                                    } ?></td>
                                <td class="history">
                                    <li><a href="update_kronologis.php?id=<?= $k['id_kronologis'] ?>&nik=<?= $nik ?>&periode=<?= $p['periode'] ?>">Update</a></li>
                                    <li><a href="history_kronologis.php?id=<?= $k['id_kronologis'] ?>&nik=<?= $nik ?>&periode=<?= $p['periode'] ?>">History</a></li>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                    <p>* Kronologis dibuat per permasalahan (case) aset</p>
                    <p>** Diberi tanda centang (√) di salah satu kolom “Ada” / “Tidak Ada”</p>
                    <p>*** Diberi tanda centang (√) di salah satu kolom “Asli” / “Copy”</p>
                    <br><br>
                    <div class="lampiran">

                        <?php
                        $kronol = mysqli_query($conn, "SELECT * FROM kronologis WHERE id_unit = $id AND periode = '$per' AND lampiran != ''"); ?>
                        <p style="font-weight: 600; margin-left: 30px">Lampiran :</p>
                        <?php foreach ($kronol as $kr) : ?>
                            <div class="lampiran">
                                <ul>
                                    <li><i class="fa fa-paperclip"></i><a href="docs/<?php echo $kr["lampiran"]; ?>" target="_blank" style="text-decoration: none; color: #E13838; font-weight: bold; padding: 5px 10px;"><?= substr($kr["lampiran"], 0, 13) ?>...</a></li>
                                </ul>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

    <script>
        document.querySelector('textarea').addEventListener('keyup', function() {
            document.querySelector('pre').innerText = this.value;
        });

        $(document).ready(function() {
            $('#example').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
        } );
} );
    </script>
    <script src="jquery-3.1.1.min.js"></script>
    <script src="js.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
   <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>