<?php
require('fpdf.php');
require('config/koneksi.php');
require('config/fungsi_indotgl.php');
$tabel = "penimbangantambang";
function jam($jam){
		$j = substr($jam,11,8);
		return $j;
	}
function relasi($rel){
	$qrelasi = mysql_query("select * from tb_relasi where kodeRelasi = '$rel'"); 
	$rr = mysql_fetch_array($qrelasi);
	return $rr['namaRelasi'];
};
function barang($rel){
	$qrelasi = mysql_query("select * from tb_barang where kodeBarang = '$rel'"); 
	$rr = mysql_fetch_array($qrelasi);
	return $rr['namaBarang'];
};	

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
	$this->Cell(0,10,'00/00/0000 - 00/00/0000',0,0,'R');
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

// Simple table
function BasicTable($tabel)
{
$based = $_GET['based']; if($based == "tanggalKeluar"){$based = "SUBSTR(tanggalKeluar,1,10)"; };
$parameterSatu = $_GET['awal']; $parameterDua = $_GET['akhir'];
$header = array('Tgl. Masuk', 'Tgl. Keluar', 'Material', 'Supplier', 'Kendaraan', 'Bruto', 'Tara', 'Netto', 'Jam Mas.', 'Jam Kel.');
$field = array('tanggalMasuk', 'tanggalKeluar', 'kodeBarang','kodeRelasi','noKendaraan','bruto','tara','netto','tanggalMasuk','tanggalKeluar');
$tb = 0; $tt = 0; $tn = 0;
$queryHead  = mysql_query("select DISTINCT $based from $tabel WHERE SUBSTR(tanggalKeluar,1,10) BETWEEN '$parameterSatu' and '$parameterDua' order by tanggalKeluar asc");
while($rowHead = mysql_fetch_array($queryHead)){
	$where = $rowHead[0];
	$this->Cell(40,10,$rowHead[0]);
	$this->Ln(8);
		
		$w = array(22, 22, 35, 35, 20, 30, 30, 30, 30, 20);
		// Header
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],7,$header[$i],1,0,'C');
		$this->Ln();
		//content
		$b = 0; $t = 0; $n = 0;
		$query = mysql_query("select * from $tabel where $based = '$where' and SUBSTR(tanggalKeluar,1,10) BETWEEN '$parameterSatu' and '$parameterDua' order by tanggalKeluar asc");
		while($row = mysql_fetch_array($query)){
			$this->Cell($w[0],6,tgl_indo($row[$field[0]]),'1');
			$this->Cell($w[1],6,tgl_indo($row[$field[1]]),'1');
			$this->Cell($w[2],6,barang($row[$field[2]]),'1');
			$this->Cell($w[3],6,relasi($row[$field[3]]),'1');
			$this->Cell($w[4],6,$row[$field[4]],'1');
			$this->Cell($w[5],6,number_format($row[$field[5]]),'1',0,'R');
			$this->Cell($w[6],6,number_format($row[$field[6]]),'1',0,'R');
			$this->Cell($w[7],6,number_format($row[$field[7]]),'1',0,'R');
			$this->Cell($w[8],6,jam($row[$field[8]]),'1');
			$this->Cell($w[9],6,jam($row[$field[9]]),'1');
			$this->Ln();
			$b = $b + $row[$field[5]]; $t = $t + $row[$field[6]]; $n = $n + $row[$field[7]];
		};
		
			
			$this->Cell($w[0]+$w[1]+$w[2]+$w[3]+$w[4],6,'Jumlah','0',0,'R');
			$this->Cell($w[5],6,number_format($b),'1',0,'R');
			$this->Cell($w[6],6,number_format($t),'1',0,'R');
			$this->Cell($w[7],6,number_format($n),'1',0,'R');
			$this->Cell($w[8]+$w[9],6,jam($row[$field[8]]),'0');
			$this->Ln();
			$tb = $tb + $b; $tt = $tt + $t; $tn = $tn + $n;
};		
			$this->Ln();
			$this->Cell($w[0]+$w[1]+$w[2]+$w[3]+$w[4],6,'Total','T',0,'R');
			$this->Cell($w[5],6,number_format($tb),'1',0,'R');
			$this->Cell($w[6],6,number_format($tt),'1',0,'R');
			$this->Cell($w[7],6,number_format($tn),'1',0,'R');
			$this->Cell($w[8]+$w[9],6,jam($row[$field[8]]),'T');
			$this->Ln();
	
}

}

$pdf = new PDF();
$pdf->AliasNbPages();
// Column headings


// Data loading
//$data = $pdf->LoadData('tutorial/countries.txt');
$pdf->SetFont('Arial','',11);

$pdf->AddPage('L');

$pdf->BasicTable($tabel);


$pdf->Output();
?>
