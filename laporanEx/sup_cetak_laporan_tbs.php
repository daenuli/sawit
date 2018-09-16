<?php
require('fpdf.php');
require("../config/koneksi.php");

function jam($jam){
		$j = substr($jam,0,5);
		return $j;
	}
function barang($rel){
	$qrelasi = mysql_query("select * from tbbarang where kodeBarang = '$rel'"); 
	$rr = mysql_fetch_array($qrelasi);
	return $rr['namaBarang'];
}
function relasi($rel){
	$qrelasi = mysql_query("select * from tbrelasi where kodeRelasi = '$rel'"); 
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
	$w = array(8, 20, 20, 20, 25,   13, 13, 13, 13, 13,   10, 10, 8, 8, 15, 15);
	$l = array('L','L','L','L','L','R','R','R','R','R','R','R','R','R','R','R');
	
if($laporan == "tanggal"){$query = mysql_query("SELECT *, time(tanggalMasuk) as time_masuk, time(tanggalKeluar) as time_keluar FROM penimbanganTBS_d WHERE tanggalMasuk = '$data' and complate = 'y' and tanggalKeluar BETWEEN '$tawal' and '$takhir'");
$this->Cell(array_sum($w),6,tgl_indo($data),'0');}
elseif($laporan == "kendaraan"){$query = mysql_query("SELECT *, time(tanggalMasuk) as time_masuk, time(tanggalKeluar) as time_keluar FROM penimbanganTBS_d WHERE nmKendaraan = '$data' and complate = 'y' and tanggalKeluar BETWEEN '$tawal' and '$takhir'");
$this->Cell(array_sum($w),6,$data,'0');}
elseif($laporan == "relasi"){$query = mysql_query("SELECT *, time(tanggalMasuk) as time_masuk, time(tanggalKeluar) as time_keluar FROM penimbanganTBS_d WHERE nmRelasi = '$data' and complate = 'y' and tanggalKeluar BETWEEN '$tawal' and '$takhir'");
$this->Cell(array_sum($w),6,$data,'0');}
elseif($laporan == "barang"){$query = mysql_query("SELECT *, time(tanggalMasuk) as time_masuk, time(tanggalKeluar) as time_keluar FROM penimbanganTBS_d WHERE nmBarang = '$data' and complate = 'y' and tanggalKeluar BETWEEN '$tawal' and '$takhir'");
$this->Cell(array_sum($w),6,$data,'0');};
		
	// Header
	
	$this->Ln();
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],'TB',0,$l[$i]);
	$this->Ln();
	$tbersih = 0; $tbruto = 0; $ttara = 0; $tnetto =0; $tpotongan = 0;
	$i = 1;
	while($row = mysql_fetch_array($query)){
		$this->Cell($w[0],6,$i,'','',$l[0]);
		if($laporan != "tanggal"){$this->Cell($w[1],6,tgl_indo($row['tanggalMasuk']),'','',$l[1]);};
		if($laporan != "kendaraan"){$this->Cell($w[2],6,$row['nmKendaraan'],'','',$l[2]);};
		if($laporan != "relasi"){$this->Cell($w[2],6,$row['nmRelasi'],'','',$l[2]);};
		if($laporan != "barang"){$this->Cell($w[2],6,$row['nmBarang'],'','',$l[2]);};
		$this->Cell($w[4],6,$row['nmSlipTBS'],'','',$l[4]);
		
		$this->Cell($w[5],6,$row['bruto'],'','',$l[5]);
		$this->Cell($w[6],6,$row['tara'],'','',$l[6]);
		$this->Cell($w[7],6,$row['netto'],'','',$l[7]);
		$this->Cell($w[8],6,$row['potongan'],'','',$l[8]);
		$this->Cell($w[9],6,$row['beratBersih'],'','',$l[9]);
		
		$this->Cell($w[10],6,$row['jumlahTandan'],'','',$l[10]);
		$this->Cell($w[11],6,$row['beratTandan'],'','',$l[11]);
		
		$this->Cell($w[12],6,jam($row['time_masuk']),'','',$l[12]);
		$this->Cell($w[13],6,jam($row['time_keluar']),'','',$l[13]);
		
		$this->Ln();
		$tbruto = $tbruto + $row['bruto'];
		$ttara = $ttara + $row['tara'];
		$tnetto = $tnetto + $row['netto'];
		$tpotongan = $tpotongan + $row['potongan'];
		$tbersih = $tbersih + $row['beratBersih'];
		$i++;
		
	}
		$this->Cell($w[0],6,'','','',$l[0]);
		$this->Cell($w[1],6,'','','',$l[1]);
		$this->Cell($w[2],6,'','','',$l[2]);
		$this->Cell($w[3],6,'','','',$l[3]);
		$this->Cell($w[4],6,'','','',$l[4]);
		$this->Cell($w[5],6,$tbruto,'TB','',$l[5]);
		$this->Cell($w[6],6,$ttara,'TB','',$l[6]);
		$this->Cell($w[7],6,$tnetto,'TB','',$l[7]);
		$this->Cell($w[8],6,$tpotongan,'TB','',$l[8]);
		$this->Cell($w[9],6,$tbersih,'TB','',$l[9]);
		
		
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
	$dquery = mysql_query("SELECT SUM(bruto),SUM(tara),SUM(netto),SUM(potongan),SUM(beratBersih) FROM penimbanganTBS_d WHERE complate = 'y' and DATE(tanggalKeluar) BETWEEN '$tawal' and '$takhir'");
	$bbersih = mysql_fetch_array($dquery);
	$w = array(8, 15, 15, 15, 25,   13, 13, 13, 13, 13,   10, 10, 15, 15, 15, 15);
	$l = array('L','R','R','R','R','R','R','R','R','R','R','R','R','R','R','R');

		
	$this->Ln(5);
		$this->Cell(140,6,'','',0,'C');
		$this->Cell($w[7],6,'Total Bruto: ','',0,'L');
		$this->Cell('35',6,$bbersih[0].' Kg','B',0,'R');
		$this->Ln();
	$this->Ln(5);
		$this->Cell(140,6,'','',0,'C');
		$this->Cell($w[7],6,'Total Tara: ','',0,'L');
		$this->Cell('35',6,$bbersih[1].' Kg','B',0,'R');
		$this->Ln();
	$this->Ln(5);
		$this->Cell(140,6,'','',0,'C');
		$this->Cell($w[7],6,'Total Netto: ','',0,'L');
		$this->Cell('35',6,$bbersih[2].' Kg','B',0,'R');
		$this->Ln();
	$this->Ln(5);
		$this->Cell(140,6,'','',0,'C');
		$this->Cell($w[7],6,'Total Potongan: ','',0,'L');
		$this->Cell('35',6,$bbersih[3].' Kg','B',0,'R');
		$this->Ln();	
	$this->Ln(5);
		$this->Cell(140,6,'','',0,'C');
		$this->Cell($w[7],6,'Total Terima: ','',0,'L');
		$this->Cell('35',6,$bbersih[4].' Kg','B',0,'R');
		$this->Ln();				
				

		$this->Ln();

}



function Header()
{
    // Logo
    //$this->Image('logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Move to the right
    $this->Cell(60);
    // Title
    $this->Cell(60,5,'PT. CIPTA AGRO SEJATI','B',0,'C');
    // Line break
    $this->Ln(3);
	// Move to the right
    $this->Cell(60);
	// Title
    $this->Cell(60,10,'Tanggal '.tgl_indo($_GET['awal']).' / '.tgl_indo($_GET['akhir']).'',0,0,'C');
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


$pdf = new PDF('P','mm','A4');
$pdf->AliasNbPages();
// Column headings
$ttbersih = 0;

// Data loading
$pdf->SetFont('Arial','',8);
$pdf->AddPage();
$tawal = $_GET['awal'];
$takhir = $_GET['akhir'];
$laporan = $_GET['laporan'];
	$dquery = mysql_query("select DISTINCT nmRelasi from penimbanganTBS_d");
	if($laporan == "tanggal"){$dquery = mysql_query("select DISTINCT tanggalMasuk from penimbanganTBS_d WHERE complate = 'y' and tanggalKeluar BETWEEN '$tawal' and '$takhir'");
	$header = array('No', 'No Polisi', 'Costumer', 'Produk', 'No Seri', 'Bruto', 'Tara', 'Netto', 'Pot.', 'Terima', 'jml Tdn','brt Tdn', 'J Mas', 'J Kel');}
	elseif($laporan == "kendaraan"){$dquery = mysql_query("select DISTINCT nmKendaraan from penimbanganTBS_d WHERE complate = 'y' and tanggalKeluar BETWEEN '$tawal' and '$takhir'");
	$header = array('No', 'Tanggal', 'Costumer', 'produk', 'No Seri', 'Bruto', 'Tara', 'Netto', 'Pot.', 'Terima', 'jml Tdn','brt Tdn', 'J Mas', 'J Kel');}
	elseif($laporan == "relasi"){$dquery = mysql_query("select DISTINCT nmRelasi from penimbanganTBS_d WHERE complate = 'y' and tanggalKeluar BETWEEN '$tawal' and '$takhir'");
	$header = array('No', 'Tanggal', 'No Polisi', 'produk', 'No Seri', 'Bruto', 'Tara', 'Netto', 'Pot.', 'Terima', 'jml Tdn','brt Tdn', 'J Mas', 'J Kel');}
	elseif($laporan == "barang"){$dquery = mysql_query("select DISTINCT nmBarang from penimbanganTBS_d WHERE complate = 'y' and tanggalKeluar BETWEEN '$tawal' and '$takhir'");
	$header = array('No', 'Tanggal', 'No Polisi', 'costumer', 'No Seri', 'Bruto', 'Tara', 'Netto', 'Pot.', 'Terima', 'jml Tdn','brt Tdn', 'J Mas', 'J Kel');};
	while($dq = mysql_fetch_array($dquery)){
		$pdf->ImprovedTable($header,$dq[0],$laporan,$tawal,$takhir);
	};
	
$pdf->persetujuan($tawal,$takhir);
$pdf->Output();
?>
