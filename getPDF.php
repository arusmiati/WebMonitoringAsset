<?php

require_once 'FPDF/fpdf.php';
require_once 'function.php';
$nik = $_GET['nik'];
$per = $_GET['periode'];
$period = date("Y-m", strtotime($per));
$periode = query("SELECT * FROM progress_permasalahan WHERE periode LIKE '%$period%'");

if(isset($_POST['btnPDF'])){
    class myPDF extends FPDF{
        function header(){
            $this->SetFont('Arial','B', 14);
            $this->Cell(276,5,'PROGRESS PENANGANAN PERMASALAHAN ASET TELKOM
            (LITIGASI, NON LITIGASI, BERPOTENSI BERMASALAH)',0,0,'C');
            $this->Ln();
           
        }
    }
    $pdf = new FPDF('p', 'mm', 'A4');
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B','14');
    
    $pdf->Cell('10', '10','No','1','0','C');
    $pdf->Cell('35', '10','Permasalahan & Kategori Permasalahan*','1','0','C');
    $pdf->Cell('35', '10','Ringkasan Permasalahan**','1','0','C');
    $pdf->Cell('35', '10','Progress Penanganan & Rencana Tindak Lanjut***','1','0','C');
    $pdf->Cell('35', '10','Isu Penting','1','0','C');
    $pdf->Output();
}

?>