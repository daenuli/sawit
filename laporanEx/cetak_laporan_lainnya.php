<?php
require('fpdf.php');
require("../config/koneksi.php");
	$relasi = "";
		if(isset($_GET['relasi'])){
			if($_GET['relasi'] !== ""){
			$relasi = "nmRelasi = '$_GET[relasi]' and";
			}
		};
function format_angka($angka) {
	$hasil = number_format($angka,0, ",",".");
	return $hasil;
}	
function barang($rel){
	$qrelasi = mysql_query("select * from tbbarang WHERE $relasi kodeBarang = '$rel'"); 
	$rr = mysql_fetch_array($qrelasi);
	return $rr['namaBarang'];
}
function relasi($rel){
	$qrelasi = mysql_query("select * from tbrelasi WHERE $relasi kodeRelasi = '$rel'"); 
	$rr = mysql_fetch_array($qrelasi);
	return $rr['namaRelasi'];
}

function tgl_indo($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = substr($tgl,5,2);
			$tahun = substr($tgl,0,4);
			return $tanggal.'-'.$bulan.'-'.$tahun;		 
}

class PDF extends FPDF
{
	
	

// Load data
function LoadData($file)
{
	// Read file lines
	$lines = file($file);
	$data = array();
	foreach($lines as $line)
		$data[] = explode(';',trim($line));
	return $data;
}

// Better table
function ImprovedTable($header, $data, $laporan,$tawal,$takhir)
{
	// Column widths
	$w = array(8, 20, 25, 25, 25,   25, 25, 20, 20, 13,   10, 10, 15, 15, 15, 15);
	$l = array('L','L','L','L','L','L','L','R','R','R','R','R','R','R','R','R');
	
		$relasi = "";
		if(isset($_GET['relasi'])){
			if($_GET['relasi'] !== ""){
			$relasi = "nmRelasi = '$_GET[relasi]' and";
			}
		};
	
if($laporan == "tanggal"){$query = mysql_query("SELECT * FROM penimbanganLainya_d WHERE $relasi tanggalMasuk = '$data' and complate = 'y' and DATE(tanggalKeluar) BETWEEN '$tawal' and '$takhir'");
$this->Cell(array_sum($w),6,tgl_indo($data),'0');}
elseif($laporan == "kendaraan"){$query = mysql_query("SELECT * FROM penimbanganLainya_d WHERE $relasi nmKendaraan = '$data' and complate = 'y' and DATE(tanggalKeluar) BETWEEN '$tawal' and '$takhir'");
$this->Cell(array_sum($w),6,$data,'0');}
elseif($laporan == "relasi"){$query = mysql_query("SELECT * FROM penimbanganLainya_d WHERE $relasi nmRelasi = '$data' and complate = 'y' and DATE(tanggalKeluar) BETWEEN '$tawal' and '$takhir'");
$this->Cell(array_sum($w),6,$data,'0');}
elseif($laporan == "barang"){$query = mysql_query("SELECT * FROM penimbanganLainya_d WHERE $relasi nmMaterial = '$data' and complate = 'y' and DATE(tanggalKeluar) BETWEEN '$tawal' and '$takhir'");
$this->Cell(array_sum($w),6,$data,'0');};
		
	// Header
	$this->SetFont('Arial','',10);
	$this->Ln();
	
	$this->Cell($w[0],6,'No','TB','',$l[0]);
		if($laporan != "tanggal"){$this->Cell($w[1],6,'Tanggal','TB','','L');};
		if($laporan != "kendaraan"){$this->Cell($w[2],6,'Kendaraan','TB','','L');};
		if($laporan != "relasi"){$this->Cell($w[3],6,'Relasi','TB','','L');};
		if($laporan != "barang"){$this->Cell($w[4],6,'Material','TB','','L');};
		$this->Cell($w[5],6,'Kode Material','TB','',$l[5]);
		$this->Cell($w[6],6,'Slip','TB','',$l[6]);
		
		
		$this->Cell($w[7],6,'Bruto','TB','',$l[7]);
		$this->Cell($w[8],6,'Tara','TB','',$l[8]);
		$this->Cell($w[9],6,'Netto','TB','',$l[9]);
	
	
	$this->Ln();
	$this->SetFont('Arial','',10);
	$tbersih = 0; $tbruto = 0; $ttara = 0; $tnetto =0; $tpotongan = 0;
	$i = 1;
	while($row = mysql_fetch_array($query)){
		$this->Cell($w[0],6,$i,'','',$l[0]);
		if($laporan != "tanggal"){$this->Cell($w[1],6,tgl_indo($row['tanggalMasuk']),'','','L');};
		if($laporan != "kendaraan"){$this->Cell($w[2],6,$row['nmKendaraan'],'','','L');};
		if($laporan != "relasi"){$this->Cell($w[3],6,$row['nmRelasi'],'','','L');};
		if($laporan != "barang"){$this->Cell($w[4],6,$row['nmMaterial'],'','','L');};
		$this->Cell($w[5],6,$row['kdMaterial'],'','',$l[4]);
		$this->Cell($w[6],6,$row['nmSlipLainya'],'','',$l[5]);
		
		
		$this->Cell($w[7],6,format_angka($row['bruto']),'','',$l[6]);
		$this->Cell($w[8],6,format_angka($row['tara']),'','',$l[7]);
		$this->Cell($w[9],6,format_angka($row['netto']),'','',$l[8]);
		$this->SetFont('Arial','',10);
		$this->Ln();
		$tbruto = $tbruto + $row['bruto'];
		$ttara = $ttara + $row['tara'];
		$tnetto = $tnetto + $row['netto'];
		//$tpotongan = $tpotongan + $row['potongan'];
		//$tbersih = $tbersih + $row['beratBersih'];
		$i++;
		
	}
		$this->Cell($w[0],6,'','','',$l[0]);
		if($laporan != "tanggal"){$this->Cell($w[1],6,'','','','L');};
		if($laporan != "kendaraan"){$this->Cell($w[2],6,'','','','L');};
		if($laporan != "relasi"){$this->Cell($w[3],6,'','','','L');};
		if($laporan != "barang"){$this->Cell($w[4],6,'','','','L');};
		$this->Cell($w[5],6,'','','',$l[5]);
		$this->Cell($w[6],6,'','','',$l[5]);
		$this->Cell($w[7],6,format_angka($tbruto),'TB','',$l[6]);
		$this->Cell($w[8],6,format_angka($ttara),'TB','',$l[7]);
		$this->Cell($w[9],6,format_angka($tnetto),'TB','',$l[8]);
		
		
		$this->Cell($w[12],6,'','','',$l[12]);
		$this->Cell($w[13],6,'','','',$l[13]);
		
		$this->Cell($w[10],6,'','','',$l[10]);
		$this->Cell($w[11],6,'','','',$l[11]);
		$this->Ln();
		
	// Data
	/* foreach($data as $row)
	{
		$this->Cell($w[0],6,$row[0],'LR');
		$this->Cell($w[1],6,$row[1],'LR');
		$this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
		$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
		$this->Ln();
	} */
	// Closing line
	//$this->Cell(array_sum($w),0,'','T');
}



// Better table
function persetujuan($tawal, $takhir)
{
		$relasi = "";
		if(isset($_GET['relasi'])){
			if($_GET['relasi'] !== ""){
			$relasi = "nmRelasi = '$_GET[relasi]' and";
			}
		};
	$dquery = mysql_query("SELECT SUM(bruto),SUM(tara),SUM(netto) FROM penimbanganLainya_d WHERE $relasi complate = 'y' and DATE(tanggalKeluar) BETWEEN '$tawal' and '$takhir'");
	$bbersih = mysql_fetch_array($dquery);
	$w = array(8, 15, 15, 15, 25,   13, 13, 13, 13, 13,   10, 10, 15, 15, 15, 15);
	$l = array('L','L','L','L','L','R','R','R','R','R','R','R','R','R','R','R');
		
	$this->Ln(5);
		$this->Cell(120,6,'','',0,'C');
		$this->Cell(20,6,'Total Bruto: ','',0,'L');
		$this->Cell('35',6,format_angka($bbersih[0]).' Kg','B',0,'R');
		$this->Ln();
	$this->Ln(5);
		$this->Cell(120,6,'','',0,'C');
		$this->Cell(20,6,'Total Tara: ','',0,'L');
		$this->Cell('35',6,format_angka($bbersih[1]).' Kg','B',0,'R');
		$this->Ln();
	$this->Ln(5);
		$this->Cell(120,6,'','',0,'C');
		$this->Cell(20,6,'Total Netto: ','',0,'L');
		$this->Cell('35',6,format_angka($bbersih[2]).' Kg','B',0,'R');
		$this->Ln();	

}



function kepala()
{
    // Logo
    //$this->Image('logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Move to the right
    $this->Cell(100);
    // Title
    $this->Cell(10,5,'PT. CIPTA AGRO SEJATI','B',0,'C');
    // Line break
    $this->Ln(3);
	// Move to the right
    $this->Cell(100);
	// Title
    $this->Cell(10,10,$_GET['relasi'].' Tanggal '.tgl_indo($_GET['awal']).' / '.tgl_indo($_GET['akhir']).'',0,0,'C');
    // Line break
    $this->Ln(7);
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

}


$pdf = new PDF('P','mm','Legal');
$pdf->SetLeftMargin('5');
$pdf->SetRightMargin('1');
$pdf->AliasNbPages();
// Column headings
$ttbersih = 0;

// Data loading

$pdf->AddPage();
$pdf->kepala();
$pdf->SetFont('Arial','',10);
$tawal = $_GET['awal'];
$takhir = $_GET['akhir'];
$laporan = $_GET['laporan'];
	$dquery = mysql_query("select DISTINCT nmRelasi from penimbanganLainya_d");
	if($laporan == "tanggal"){$dquery = mysql_query("select DISTINCT tanggalMasuk from penimbanganLainya_d WHERE $relasi complate = 'y' and DATE(tanggalKeluar) BETWEEN '$tawal' and '$takhir'");
	$header = array('No', 'No Polisi', 'Costumer', 'Material', 'No Seri', 'No Material', 'Bruto', 'Tara', 'Netto');}
	elseif($laporan == "kendaraan"){$dquery = mysql_query("select DISTINCT nmKendaraan from penimbanganLainya_d WHERE $relasi complate = 'y' and DATE(tanggalKeluar) BETWEEN '$tawal' and '$takhir'");
	$header = array('No', 'Tanggal', 'Costumer', 'Material', 'No Seri', 'No Material', 'Bruto', 'Tara', 'Netto');}
	elseif($laporan == "relasi"){$dquery = mysql_query("select DISTINCT nmRelasi from penimbanganLainya_d WHERE $relasi complate = 'y' and DATE(tanggalKeluar) BETWEEN '$tawal' and '$takhir'");
	$header = array('No', 'Tanggal', 'No Polisi', 'Material', 'No Seri', 'No Material', 'Bruto', 'Tara', 'Netto');}
	elseif($laporan == "barang"){$dquery = mysql_query("select DISTINCT nmMaterial from penimbanganLainya_d WHERE $relasi complate = 'y' and DATE(tanggalKeluar) BETWEEN '$tawal' and '$takhir'");
	$header = array('No', 'Tanggal', 'Costumer', 'No Polisi', 'No Seri', 'No Material', 'Bruto', 'Tara', 'Netto');}
	while($dq = mysql_fetch_array($dquery)){
		$pdf->ImprovedTable($header,$dq[0],$laporan,$tawal,$takhir);
	};
	
$pdf->persetujuan($tawal,$takhir);
$pdf->Output();
?>
