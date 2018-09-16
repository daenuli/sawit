<?php 
error_reporting(0);
session_start();
include_once "../config/koneksi.php";
include_once "../config/fungsi_indotgl.php";
$id = $_GET['noSlip'];
$qrySlip = mysql_query("select * from h_slip where noSlip = '$id'");
$jumSlip = mysql_num_rows($qrySlip);
$slipKeberapa = '';
if($jumSlip == 0){
	mysql_query("INSERT INTO h_slip SET noSlip = '$id', qty = 0");
	}else{
	mysql_query("UPDATE h_slip SET qty = qty+1 WHERE noSlip = '$id'");
	$rowKeberapa = mysql_fetch_array($qrySlip); $rowKeberapa['qty'] += 1;
	$slipKeberapa = "Cetakan Ke ".$rowKeberapa['qty'];
	};
$query = mysql_query("select * from penimbanganPelabuhan where noSlip = '$id'");
$row = mysql_fetch_array($query);
function asal($rel){
	$qrelasi = mysql_query("select * from tb_asaltujuan where kodeAsalTujuan = '$rel'"); 
	$rr = mysql_fetch_array($qrelasi);
	echo $rr['nmAsalTujuan'];
};
function relasi($rel){
	$qrelasi = mysql_query("select * from tb_relasi where kodeRelasi = '$rel'"); 
	$rr = mysql_fetch_array($qrelasi);
	echo $rr['nmRelasi'];
};
function barang($rel){
	$qrelasi = mysql_query("select * from tb_barang where kodeBarang = '$rel'"); 
	$rr = mysql_fetch_array($qrelasi);
	echo $rr['nmBarang'];
};
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!--<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png"> -->

    <title>PT. BARAMUTIARA PRIMA</title>

    <!-- Bootstrap core CSS -->
    <!--<link href="dist/css/bootstrap.css" rel="stylesheet"> -->
<style type="text/css">
<!--
.hbesar {
	text-transform: uppercase;
}
body {
	font-family: "Lucida Console";
	font-size: 16px;
	letter-spacing: 5pt;
}
.style1 {text-transform: uppercase; font-weight: bold; }
h4 {
	height: 10px;
}
-->
</style>

    <!-- Custom styles for this template -->

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body onLoad="window.print()" onfocus="window.close()">
    <div class="container">

    <table width="100%">
  <tr>
    <td style="border-bottom:1px #000 solid;"><img src="logo.jpg" width="186" height="55"></td>
    <td>Pelabuhan</td>
    <td><?=$slipKeberapa?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>No  Pol Truk</td>
    <td>: <span style="text-transform:uppercase;"><?=$row['noKendaraan']?></span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Nama Supir</td>
    <td>: <?=$row['nmSupir']?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Nama Barang</td>
    <td>: <?=$row['nmBarang']?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Nama Relasi</td>
    <td>: <?=$row['nmRelasi']?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Nama Asal</td>
    <td>: <?=$row['nmAsal']?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="border-bottom:1px #000 solid;">Nama Tujuan</td>
    <td style="border-bottom:1px #000 solid;">: <?=$row['nmTujuan']?></td>
    <td style="border-bottom:1px #000 solid;">&nbsp;</td>
    <td style="border-bottom:1px #000 solid;">&nbsp;</td>
    <td style="border-bottom:1px #000 solid;">&nbsp;</td>
    <td style="border-bottom:1px #000 solid;">&nbsp;</td>
  </tr> 
  <tr style="border-bottom:1px #000 solid;">
    <td style="border-bottom:1px #000 solid;">Jam Masuk</td>
    <td style="border-bottom:1px #000 solid;">Jam Keluar</td>
    <td style="border-bottom:1px #000 solid;">No. Slip Tbg</td>
    <td style="border-bottom:1px #000 solid;" colspan="2"><div align="center">Keterangan</div></td>
    <td style="border-bottom:1px #000 solid;">&nbsp;</td>
  </tr>
  <tr>
    <td><?=tgl_indo($row['tanggalMasuk'])?></td>
    <td><?=tgl_indo($row['tanggalKeluar'])?></td>
    <td><?=$row['noSlip']?></td>
    <td><strong style="font-size:14px">Bruto</strong></td>
    <td><div align="right"><strong style="font-size:14px">
      <?=$row['bruto']?>
    </strong></div></td>
    <td>kg</td>
  </tr>
  <tr>
    <td><?=substr($row['tanggalMasuk'],11,8)?></td>
    <td><?=substr($row['tanggalKeluar'],11,8)?></td>
    <td>&nbsp;</td>
    <td style="border-bottom:1px #000 solid;"><strong style="font-size:14px">Tara</strong></td>
    <td style="border-bottom:1px #000 solid;"><div align="right"><strong style="font-size:14px">
      <?=$row['tara']?>
    </strong></div></td>
    <td style="border-bottom:1px #000 solid;">kg</td>
  </tr>
  <tr>
    <td style="border-bottom:thin solid #000;">&nbsp;</td>
    <td style="border-bottom:thin solid #000;">&nbsp;</td>
    <td style="border-bottom:thin solid #000;">&nbsp;</td>
    <td style="border-bottom:thin solid #000;"><strong style="font-size:14px">Netto</strong></td>
    <td style="border-bottom:thin solid #000;"><div align="right"><strong style="font-size:14px">
      <?=$row['netto']?>
    </strong></div></td>
    <td style="border-bottom:thin solid #000;">kg</td>
  </tr>
  <tr style="border-top:1px #000 solid;">
    <td>Keterangan</td>
    <td colspan="4"><?php 
	$qryToleransi = mysql_query("select nmToleransi from u_toleransi"); $rT = mysql_fetch_array($qryToleransi); 
	$net = $row['netto']; $bt = $row['beratTambang']; $sel = $bt - $net; $per = ($sel/$bt)*100; if($per > $rT[0]){echo "Penyusutan Melebihi Batas Toleransi";}else{echo "Penyusutan Kurang Dari Batas Toleransi";}   ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><p align="center">Ditimbang Oleh</p>
          <p align="center">&nbsp;</p>
          <p align="center">(<?php echo $_SESSION['namauser']?>)</p></td>
        <td><p align="center">Diperiksa Oleh</p>
          <p align="center">&nbsp;</p>
          <p align="center">(   &nbsp;   &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; )</p></td>
        <td><p align="center">Supir</p>
          <p align="center">&nbsp;</p>
          <p align="center">(
            <?=$row['nmSupir']?>
            )</p></td>
        </tr>
      </table></td>
  </tr>
</table>



    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
   
</body>
</html>
