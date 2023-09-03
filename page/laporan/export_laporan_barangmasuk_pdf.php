<?php
require('fpdf.php'); // Include FPDF library

class PDF extends FPDF
{
    function Header()
    {
        // Header content here
    }

    function Footer()
    {
        // Footer content here
    }
}

$koneksi = new mysqli("localhost", "gste8519_nurizkiansyah", "gste8519_nurizkiansyah", "gste8519_nurizkiansyah");

$bln = $_POST['bln'];
$thn = $_POST['thn'];

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Laporan Barang Masuk Bulan ' . $bln . ' Tahun ' . $thn, 0, 1, 'C');

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(10, 10, 'No', 1, 0, 'C');
$pdf->Cell(40, 10, 'Id Transaksi', 1, 0, 'C');
$pdf->Cell(40, 10, 'Tanggal Masuk', 1, 0, 'C');
$pdf->Cell(40, 10, 'Kode Barang', 1, 0, 'C');
$pdf->Cell(40, 10, 'Nama Barang', 1, 0, 'C');
$pdf->Cell(40, 10, 'Pengirim', 1, 0, 'C');
$pdf->Cell(40, 10, 'Jumlah Masuk', 1, 0, 'C');
$pdf->Cell(40, 10, 'Satuan Barang', 1, 1, 'C');

$sql = $koneksi->query("SELECT * FROM barang_masuk WHERE MONTH(tanggal) = '$bln' AND YEAR(tanggal) = '$thn'");
$no = 1;
while ($data = $sql->fetch_assoc()) {
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(10, 10, $no++, 1);
    $pdf->Cell(40, 10, $data['id_transaksi'], 1);
    $pdf->Cell(40, 10, $data['tanggal'], 1);
    $pdf->Cell(40, 10, $data['kode_barang'], 1);
    $pdf->Cell(40, 10, $data['nama_barang'], 1);
    $pdf->Cell(40, 10, $data['pengirim'], 1);
    $pdf->Cell(40, 10, $data['jumlah'], 1);
    $pdf->Cell(40, 10, $data['satuan'], 1);
    $pdf->Ln();
}

$pdf->Output(); // Output PDF
?>
