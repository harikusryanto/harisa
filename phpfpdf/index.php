<?php
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
//$pdf->Image('img/logo.png', 5, 5);
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);

// mencetak string 
$pdf->Cell(190,7,'HARISA WEDDING ORGANIZER',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'DAFTAR PENJUALAN HARISA WEDDING ORGANIZER',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,6,'ID',1,0);
$pdf->Cell(85,6,'NAMA LENGKAP',1,0);
$pdf->Cell(27,6,'ALAMAT',1,0);
$pdf->Cell(25,6,'PAKET',1,1);

$pdf->SetFont('Arial','',10);

include 'koneksi.php';
$wedding = mysqli_query($connect, "select * from wedding");
while ($row = mysqli_fetch_array($wedding)){
    $pdf->Cell(20,6,$row['id'],1,0);
    $pdf->Cell(85,6,$row['nama_lengkap'],1,0);
    $pdf->Cell(27,6,$row['alamat'],1,0);
    $pdf->Cell(25,6,$row['paket'],1,1); 
}

$pdf->Output();
?>
