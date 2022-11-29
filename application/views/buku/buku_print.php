<?php
$pdf = new FPDF("P", "cm", "A4");
$pdf->AddPage();
$pdf->SetTitle("Laporan Data BUKU");
$pdf->SetFont("Arial", "B", "12");
$pdf->Cell("19", 1, "PLN PERSERO", 0, 1, "C");
$pdf->SetFont("Arial", "", "12");
$pdf->Cell("19", 1, "Alamat: JL.Mistar Cokrokusumo KM 39, Cempaka, Banjarbaru, Kalimantan Selatan 70733", 0, 1, "C");
$pdf->Line(1, 3, 20, 3);
$pdf->ln (1);
$pdf->SetFont("Arial", "B", "12");
$pdf->Cell(19, 1, "Laporan Data Buku", 0, 1, "C");
$pdf->ln(1);
$pdf->SetFont("Arial", "B", "11");
$pdf->SetFillColor(125, 229, 237);
$pdf->Cell(1, 1, "No", 1, 0, "C", true);
// $pdf->Cell(6, 1, "Foto", 1, 0, "C", true);
$pdf->Cell(3.8, 1, "Isbn", 1, 0, "C", true);
$pdf->Cell(7, 1, "Nama Buku", 1, 0, "C", true);
$pdf->Cell(3, 1, "Penerbit", 1, 0, "C", true);
$pdf->Cell(2.4, 1, "Tahun Buku", 1, 0, "C", true);
$pdf->Cell(2.5, 1, "Stok_buku", 1, 1, "C", true);
// $pdf->Cell(4, 1, "Tanggal Selesai", 1, 0, "C", true);
// $pdf->Cell(4, 1, "Jenis Beasiswa", 1, 1, "C", true);
$pdf->SetFont("Arial", "", 11);
$no = 1;
foreach ($buku as $a) {
    $pdf->Cell(1, 1, $no++, 1, 0, "C",);
    // $pdf->Cell(6, 1, $a->foto, 1, 0, "C");
    $pdf->Cell(3.8, 1, $a->isbn, 1, 0, "C");
    $pdf->Cell(7, 1, $a->title, 1, 0, "C");
    $pdf->Cell(3, 1, $a->penerbit, 1, 0, "C");
    $pdf->Cell(2.4, 1, $a->thn_buku, 1, 0, "C");
    $pdf->Cell(2.5, 1, $a->jml, 1, 1, "C");
    
}
$pdf->Output();