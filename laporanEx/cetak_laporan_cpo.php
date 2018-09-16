<?php
require('fpdf.php');
require("../config/koneksi.php");
	$relasi = "";
		if(isset($_GET['relasi'])){
			if($_GET['relasi'] !== ""){
			$relasi = "nmRelasi = '$_GET[relasi]' and";
			}
		};
function jam($jam){
		$j = substr($jam,0,5);
		return $j;
	}
function format_angka($angka) {
	$hasil = number_format($angka,0, ",",".");
	return $hasil;
}	
function barang($rel){
	$qrelasi = mysql_query("select * from tbbarang WHERE kodeBarang = '$rel'"); 
	$rr = mysql_fetch_array($qrelasi);
	return $rr['namaBarang'];
}
function relasi($rel){
	$qrelasi = mysql_query("select * from tbrelasi WHERE kodeRelasi = '$rel'"); 
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
		$relasi = "";
		if(isset($_GET['relasi'])){
			if($_GET['relasi'] !== ""){
			$relasi = "nmRelasi = '$_GET[relasi]' and";
			}
		};
	// Column widths
	$w = array(6, 20, 20, 18, 20,   18, 13, 13, 13, 13,   15, 10, 10, 10, 10,  10, 10);
	$l = array('L','L','L','L','L',  'L','R','R','R','R',  'R','R','R','R','R','R','R');
	
if($laporan == "tanggal"){$query = mysql_query("SELECT *, time(tanggalMasuk) as time_masuk, time(tanggalKeluar) as time_keluar  FROM penimbanganCPO_d WHERE $relasi tanggalMasuk = '$data' and complate = 'y' and DATE(tanggalKeluar) BETWEEN '$tawal' and '$takhir'");
$this->Cell(array_sum($w),6,tgl_indo($data),'0');}
elseif($laporan == "kendaraan"){$query = mysql_query("SELECT *, time(tanggalMasuk) as time_masuk, time(tanggalKeluar) as time_keluar  FROM penimbanganCPO_d WHERE $relasi nmKendaraan = '$data' and complate = 'y' and DATE(tanggalKeluar) BETWEEN '$tawal' and '$takhir'");
$this->Cell(array_sum($w),6,$data,'0');}
elseif($laporan == "relasi"){$query = mysql_query("SELECT *, time(tanggalMasuk) as time_masuk, time(tanggalKeluar) as time_keluar  FROM penimbanganCPO_d WHERE $relasi nmRelasi = '$data' and complate = 'y' and DATE(tanggalKeluar) BETWEEN '$tawal' and '$takhir'");
$this->Cell(array_sum($w),6,$data,'0');};
		
	// Header
	
	$this->Ln();
	$this->SetFont('Times','',10);
	
		
		$this->Cell($w[0],5,'No','T','',$l[0]);
		if($laporan != "tanggal"){$this->Cell($w[1],5,'Tanggal','T','',$l[1]);};
		if($laporan != "kendaraan"){$this->Cell($w[2],5,'No Polisi','T','',$l[2]);};
		if($laporan != "relasi"){$this->Cell($w[3],5,'Relasi','T','',$l[3]);};
		$this->Cell($w[4],5,'No Seri','T','',$l[4]);
		$this->Cell($w[5],5,'No DO','T','',$l[5]);
		$this->Cell($w[6],5,'Bruto','T','',$l[6]);
		$this->Cell($w[7],5,'Tara','T','',$l[7]);
		$this->Cell($w[8],5,'Netto','T','',$l[8]);
		$this->Cell($w[9],5,'Pot','T','',$l[9]);
		$this->Cell($w[10],5,'Berat','T','',$l[10]);
		$this->Cell($w[11],5,'jam','T','',$l[11]);
		$this->Cell($w[12],5,'jam','T','',$l[12]);
		$this->Cell($w[13],5,'FFA','T','',$l[13]);
		$this->Cell($w[14],5,'Air','T','',$l[14]);
		$this->Cell($w[15],5,'Kotor','T','',$l[15]);
		$this->Cell($w[16],5,'jumlah','T','',$l[16]);
		
			$this->Ln();	
		$this->Cell($w[0],5,'','B','',$l[0]);
		if($laporan != "tanggal"){$this->Cell($w[1],5,'','B','',$l[1]);};
		if($laporan != "kendaraan"){$this->Cell($w[2],5,'','B','',$l[2]);};
		if($laporan != "relasi"){$this->Cell($w[3],5,'','B','',$l[3]);};
		$this->Cell($w[4],5,'','B','',$l[4]);
		$this->Cell($w[5],5,'','B','',$l[5]);
		$this->Cell($w[6],5,'','B','',$l[6]);
		$this->Cell($w[7],5,'','B','',$l[7]);
		$this->Cell($w[8],5,'','B','',$l[8]);
		$this->Cell($w[9],5,'','B','',$l[9]);
		$this->Cell($w[10],5,'Terima','B','',$l[10]);
		$this->Cell($w[11],5,'Masuk','B','',$l[11]);
		$this->Cell($w[12],5,'Keluar','B','',$l[12]);
		$this->Cell($w[13],5,'','B','',$l[13]);
		$this->Cell($w[14],5,'','B','',$l[14]);
		$this->Cell($w[15],5,'','B','',$l[15]);
		$this->Cell($w[16],5,'segel','B','',$l[16]);
		
	$this->Ln();
	$this->SetFont('Times','',10);
	$tbersih = 0; $tbruto = 0; $ttara = 0; $tnetto =0; $tpotongan = 0;
	$i = 1;
	while($row = mysql_fetch_array($query)){
		$this->Cell($w[0],6,$i,'','',$l[0]);
		if($laporan != "tanggal"){$this->Cell($w[1],6,tgl_indo($row['tanggalMasuk']),'','',$l[1]);};
		if($laporan != "kendaraan"){$this->Cell($w[2],6,$row['nmKendaraan'],'','',$l[2]);};
		if($laporan != "relasi"){$this->Cell($w[3],6,$row['nmRelasi'],'','',$l[3]);};
		$this->Cell($w[4],6,$row['nmSlipCPO'],'','',$l[4]);
		$this->Cell($w[5],6,$row['nmDO'],'','',$l[5]);
		$this->Cell($w[6],6,format_angka($row['bruto']),'','',$l[6]);
		$this->Cell($w[7],6,format_angka($row['tara']),'','',$l[7]);
		$this->Cell($w[8],6,format_angka($row['netto']),'','',$l[8]);
		$this->Cell($w[9],6,format_angka($row['potongan']),'','',$l[9]);
		$this->Cell($w[10],6,format_angka($row['beratBersih']),'','',$l[10]);
		$this->Cell($w[11],6,jam($row['time_masuk']),'','',$l[11]);
		$this->Cell($w[12],6,jam($row['time_keluar']),'','',$l[12]);
		$this->Cell($w[13],6,$row['potFFA'],'','',$l[13]);
		$this->Cell($w[14],6,$row['potAir'],'','',$l[14]);
		$this->Cell($w[15],6,$row['potKotoran'],'','',$l[15]);
		$this->Cell($w[16],6,$row['jumlahSegel'],'','',$l[16]);
		$this->Ln();
		$this->SetFont('Times','',10);
		$tbruto = $tbruto + $row['bruto'];
		$ttara = $ttara + $row['tara'];
		$tnetto = $tnetto + $row['netto'];
		$tpotongan = $tpotongan + $row['potongan'];
		$tbersih = $tbersih + $row['beratBersih'];
		$i++;
		
	}
	
		$this->Cell($w[0],6,'','','',$l[0]);
		if($laporan != "tanggal"){$this->Cell($w[1],6,'','','',$l[1]);};
		if($laporan != "kendaraan"){$this->Cell($w[2],6,'','','',$l[2]);};
		if($laporan != "relasi"){$this->Cell($w[3],6,'','','',$l[3]);};
		$this->Cell($w[4],6,'','','',$l[4]);
		$this->Cell($w[5],6,'','','',$l[4]);
		$this->Cell($w[6],6,format_angka($tbruto),'TB','',$l[6]);
		$this->Cell($w[7],6,format_angka($ttara),'TB','',$l[7]);
		$this->Cell($w[8],6,format_angka($tnetto),'TB','',$l[8]);
		$this->Cell($w[9],6,format_angka($tpotongan),'TB','',$l[9]);
		$this->Cell($w[10],6,format_angka($tbersih),'TB','',$l[10]);
		$this->Cell($w[10],6,'','','',$l[10]);
		$this->Cell($w[11],6,'','','',$l[11]);
		$this->Cell($w[12],6,'','','',$l[12]);
		$this->Cell($w[13],6,'','','',$l[13]);
		$this->Cell($w[14],6,'','','',$l[13]);
		$this->Cell($w[15],6,'','','',$l[15]);
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
function persetujuan($ttbersih,$tawal,$takhir)
{
		$relasi = "";
		if(isset($_GET['relasi'])){
			if($_GET['relasi'] !== ""){
			$relasi = "nmRelasi = '$_GET[relasi]' and";
			}
		};
	$dquery = mysql_query("SELECT SUM(bruto),SUM(tara),SUM(netto),SUM(potongan),SUM(beratBersih) FROM penimbanganCPO_d WHERE $relasi complate = 'y' and DATE(tanggalKeluar) BETWEEN '$tawal' and '$takhir'");
	$bbersih = mysql_fetch_array($dquery);
	$w = array(6, 20, 20, 18, 20,   18, 13, 13, 13, 13,   15, 10, 10, 10, 10,  10, 10);
	$l = array('L','L','L','L','L','R','R','R','R','R','R','R','R','R','R','R');

	$this->Ln(5);
		$this->Cell(140,6,'','',0,'C');
		$this->Cell(20,6,'Total Bruto: ','',0,'L');
		$this->Cell('35',6,format_angka($bbersih[0]).' Kg','B',0,'R');
		$this->Ln();
	$this->Ln(5);
		$this->Cell(140,6,'','',0,'C');
		$this->Cell(20,6,'Total Tara: ','',0,'L');
		$this->Cell('35',6,format_angka($bbersih[1]).' Kg','B',0,'R');
		$this->Ln();
	$this->Ln(5);
		$this->Cell(140,6,'','',0,'C');
		$this->Cell(20,6,'Total Netto: ','',0,'L');
		$this->Cell('35',6,format_angka($bbersih[2]).' Kg','B',0,'R');
		$this->Ln();
	$this->Ln(5);
		$this->Cell(140,6,'','',0,'C');
		$this->Cell(20,6,'Total Potongan: ','',0,'L');
		$this->Cell('35',6,format_angka($bbersih[3]).' Kg','B',0,'R');
		$this->Ln();	
	$this->Ln(5);
		$this->Cell(140,6,'','',0,'C');
		$this->Cell(20,6,'Total Terima: ','',0,'L');
		$this->Cell('35',6,format_angka($bbersih[4]).' Kg','B',0,'R');
		$this->Ln();	

}



function kepala()
{
    // Logo
    //$this->Image('logo.png',10,6,30);
    // Times bold 15
    $this->SetFont('Times','B',12);
    // Move to the right
    $this->Cell(60);
    // Title
    $this->Cell(60,5,'PT. CIPTA AGRO SEJATI','B',0,'C');
    // Line break
    $this->Ln(3);
	// Move to the right
    $this->Cell(60);
	// Title
    $this->Cell(60,10,$_GET['relasi'].' Tanggal '.tgl_indo($_GET['awal']).' / '.tgl_indo($_GET['akhir']).'',0,0,'C');
    // Line break
    $this->Ln(7);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Times italic 8
    $this->SetFont('Times','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

}


$pdf = new PDF('P','mm','Legal');
$pdf->SetLeftMargin('3');
$pdf->SetRightMargin('1');
$pdf->AliasNbPages();
// Column headings
$ttbersih = 0;

// Data loading

$pdf->AddPage();
$pdf->kepala();
$pdf->SetFont('Times','',10);
$tawal = $_GET['awal'];
$takhir = $_GET['akhir'];
$laporan = $_GET['laporan'];
	$dquery = mysql_query("select DISTINCT nmRelasi from penimbanganCPO_d");
	if($laporan == "tanggal"){$dquery = mysql_query("select DISTINCT tanggalMasuk from penimbanganCPO_d WHERE $relasi complate = 'y' and DATE(tanggalKeluar) BETWEEN '$tawal' and '$takhir'");
	$header = array('No', 'No Polisi', 'Customer', 'No Seri', 'No DO', 'Bruto', 'Tara', 'Netto', 'Potongan', 'Terima', 'In', 'out', 'FFA', 'Air', 'kotor', 'Jlh Sgl');}
	elseif($laporan == "kendaraan"){$dquery = mysql_query("select DISTINCT nmKendaraan from penimbanganCPO_d WHERE $relasi complate = 'y' and DATE(tanggalKeluar) BETWEEN '$tawal' and '$takhir'");
	$header = array('No', 'Tanggal', 'Customer', 'No Seri', 'No DO', 'Bruto', 'Tara', 'Netto', 'Potongan', 'Terima', 'in', 'out', 'FFA', 'Air', 'kotor', 'Jlh Sgl');}
	elseif($laporan == "relasi"){$dquery = mysql_query("select DISTINCT nmRelasi from penimbanganCPO_d WHERE $relasi complate = 'y' and DATE(tanggalKeluar) BETWEEN '$tawal' and '$takhir'");
	$header = array('No', 'Tanggal', 'No Polisi', 'No Seri', 'No DO', 'Bruto', 'Tara', 'Netto', 'Potongan', 'Terima', 'Masuk', 'Keluar', 'FFA', 'Air', 'kotor', 'Jlh Sgl');};
	while($dq = mysql_fetch_array($dquery)){
		$pdf->ImprovedTable($header,$dq[0],$laporan,$tawal,$takhir);
	};
	
$pdf->persetujuan($ttbersih,$tawal,$takhir);
$pdf->Output();
?>
