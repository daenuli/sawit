<?php
require('fpdf.php');
require('../config/koneksi.php');
require('config/fungsi_indotgl.php');
$tabel = "penimbangantambang";
function jam($jam){
		$j = substr($jam,11,5);
		return $j;
	}
class PDF extends FPDF
{
// Page header
function Header()
{
	// Logo
	$this->Image('logo.jpg',10,6,50);
	// Arial bold 15
	$this->SetFont('Arial','',12);
	// Move to the right
	$this->Cell(80);
	// Title
	//$this->Cell(60,10,'00/00/0000 - 00/00/0000','0',0,'C');
	$this->SetY(10);
	$this->Cell(0,10,'laporan PELABUHAN per BARANG '.tgl_indo($_GET['awal']).' - '.tgl_indo($_GET['akhir']),0,0,'R');
	// Line break
	$this->Ln(12);
		
}	
// Page footer
function Footer()
{
	// Position at 1.5 cm from bottom
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Page number
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
// Better table
function ImprovedTable()
{
	// Column widths
	$w = array(25, 17, 17, 12, 12, 22, 25, 25, 12, 12, 12);
	$queryHead  = mysql_query("select DISTINCT nmBarang from penimbanganTambang WHERE SUBSTR(tanggalKeluar,1,10) BETWEEN '$_GET[awal]' and '$_GET[akhir]' order by tanggalKeluar asc");
	$gb = 0; $gt = 0; $gn = 0;
	while($rH = mysql_fetch_array($queryHead)){
	$this->Cell(0,10,$rH['nmBarang'],0,0,'L');
	$this->Ln();
	// Header
	$this->SetFont('Arial','',8);
		//$this->Cell($w[0],7,"No.",1,0,'C');
		$this->Cell($w[0],5,"No.Slip",1,0,'C');
		$this->Cell($w[1],5,"Tgl. Masuk",1,0,'C');
		$this->Cell($w[2],5,"Tgl. Keluar",1,0,'C');
		$this->Cell($w[3],5,"Masuk",1,0,'C');
		$this->Cell($w[4],5,"Keluar",1,0,'C');
		$this->Cell($w[5],5,"Kendaraan",1,0,'C');
		$this->Cell($w[6],5,"Suplier",1,0,'C');
		$this->Cell($w[7],5,"Matrial",1,0,'C');
		$this->Cell($w[8],5,"Bruto",1,0,'C');
		$this->Cell($w[9],5,"Tara",1,0,'C');
		$this->Cell($w[10],5,"Netto",1,0,'C');
	$this->Ln();
	$this->SetFont('Arial','',11);
	// Data
	$nomor = 0;
	$qry = mysql_query("select * from penimbanganTambang where nmBarang = '$rH[nmBarang]' and SUBSTR(tanggalKeluar,1,10) BETWEEN '$_GET[awal]' and '$_GET[akhir]' order by tanggalKeluar asc");
	$tb = 0; $tt = 0; $tn = 0;
	while($r = mysql_fetch_array($qry)){
		//$this->Cell($w[0],6,$nomor.'0','LR');
		$this->Cell($w[0],6,$r['noSlip'],'LR',0,'C');
		$this->Cell($w[1],6,tgl_indo($r['tanggalMasuk']),'LR',0,'R');
		$this->Cell($w[2],6,tgl_indo($r['tanggalKeluar']),'LR',0,'R');
		$this->Cell($w[3],6,jam($r['tanggalMasuk']),'LR',0,'R');
		$this->Cell($w[4],6,jam($r['tanggalKeluar']),'LR',0,'R');
		$this->Cell($w[5],6,$r['noKendaraan'],'LR',0,'L');
		$this->Cell($w[6],6,$r['nmRelasi'],'LR',0,'L');
		$this->Cell($w[7],6,$r['nmBarang'],'LR',0,'L');
		$this->Cell($w[8],6,$r['bruto'],'LR',0,'R'); $tb += $r['bruto'];
		$this->Cell($w[9],6,$r['tara'],'LR',0,'R');	$tt += $r['tara'];
		$this->Cell($w[10],6,$r['netto'],'LR',0,'R'); $tn += $r['netto'];
		$this->Ln();
	}
	// Closing line
	$this->Cell(array_sum($w),0,'','T');
	$this->Ln();
		$this->Cell($w[0],6,'','',0,'C');
		$this->Cell($w[1],6,'','',0,'R');
		$this->Cell($w[2],6,'','',0,'R');
		$this->Cell($w[3],6,'','',0,'R');
		$this->Cell($w[4],6,'','',0,'R');
		$this->Cell($w[5],6,'','',0,'L');
		$this->Cell($w[6],6,'','',0,'L');
		$this->Cell($w[7],6,'Sub Total: ','',0,'L');
		$this->Cell($w[8],6,$tb,'LRB',0,'R'); $gb += $tb;
		$this->Cell($w[9],6,$tt,'LRB',0,'R'); $gt += $tt;
		$this->Cell($w[10],6,$tn,'LRB',0,'R'); $gn += $tn;
		$this->Ln();
	$this->Cell(array_sum($w),0,'','');	
	
	$this->Ln();
	} //closing looping heading
	
		// Closing line

	$this->Ln(5);
		$this->Cell($w[0],6,'','',0,'C');
		$this->Cell($w[1],6,'','',0,'R');
		$this->Cell($w[2],6,'','',0,'R');
		$this->Cell($w[3],6,'','',0,'R');
		$this->Cell($w[4],6,'','',0,'R');
		$this->Cell($w[5],6,'','',0,'L');
		$this->Cell($w[6],6,'','',0,'L');
		$this->Cell($w[7],6,'Total Bruto: ','',0,'L');
		$this->Cell('35',6,$gb.' Kg','B',0,'R');
		$this->Ln();
	$this->Ln(5);
		$this->Cell($w[0],6,'','',0,'C');
		$this->Cell($w[1],6,'','',0,'R');
		$this->Cell($w[2],6,'','',0,'R');
		$this->Cell($w[3],6,'','',0,'R');
		$this->Cell($w[4],6,'','',0,'R');
		$this->Cell($w[5],6,'','',0,'L');
		$this->Cell($w[6],6,'','',0,'L');
		$this->Cell($w[7],6,'Total Tara: ','',0,'L');
		$this->Cell('35',6,$gt.' Kg','B',0,'R');
		$this->Ln();
	$this->Ln(5);
		$this->Cell($w[0],6,'','',0,'C');
		$this->Cell($w[1],6,'','',0,'R');
		$this->Cell($w[2],6,'','',0,'R');
		$this->Cell($w[3],6,'','',0,'R');
		$this->Cell($w[4],6,'','',0,'R');
		$this->Cell($w[5],6,'','',0,'L');
		$this->Cell($w[6],6,'','',0,'L');
		$this->Cell($w[7],6,'Total Netto: ','',0,'L');
		$this->Cell('35',6,$gn.' Kg','B',0,'R');
		$this->Ln();				
	
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',11);
$pdf->AddPage();
$pdf->ImprovedTable();
$pdf->Output();
?>
