<?php 
include "../config/koneksi.php";
error_reporting(0);
include_once "../config/fungsi_indotgl.php";

$slip = $_GET['noSlip'];

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

//$slip = "201312210002";
$query = mysql_query("select *, TIME(tanggalMasuk) as jamMasuk, TIME(tanggalKeluar) as jamKeluar from penimbanganCPO_d where nmSlipCPO = '$slip'");
$row = mysql_fetch_array($query);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Scaleindo</title>

<style type="text/css">
<!--
.hbesar {
	text-transform: uppercase;
}
body {
	font-family:sans-serif;
	font-size: 16px;
	letter-spacing: 5pt;
}
.style1 {text-transform: uppercase; font-weight: bold; }
h4 {
	height: 10px;
}
-->
</style>
</head>

<body onLoad="window.print()">
<center><h4> PT. CIPTA AGRO SEJATI</h4>
</center>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><span style="text-transform:uppercase;">
      <?=$row['nmRelasi']?>
    </span>:<span style="text-transform:uppercase;">
    <?=$row['nmDO']?>
    </span></td>
    <td>&nbsp;</td>
    <td><span style="text-transform:uppercase;">
      <?=$row['jamMasuk']?></span><span style="text-transform:uppercase;">
    <?=$row['jamKeluar']?>
    </span></td>
    <td><div align="right"><span style="text-transform:uppercase;">
      <?=tgl_indo($row['tanggalKeluar'])?>
    </span></div></td>
  </tr>
</table>


<table width="100%" border="2" cellpadding="0" cellspacing="0">
  <tr>
    <td width="38%" class="style1">&nbsp;plat mobil : <span style="text-transform:uppercase;">
      <?=$row['nmKendaraan']?>
    </span></td>
    <td width="38%" class="hbesar"><div align="center"><strong>Keterangan</strong></div></td>
    <td width="24%" class="hbesar"><div align="center"><strong>No. seri segel</strong></div></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="5">
      <tr>
        <td class="bkiri">Berat Bruto</td>
        <td>:</td>
        <td class="kll"><div align="right"><span style="text-transform:uppercase;">
            <?=format_angka($row['bruto'])?>
        </span> Kg</div></td>
      </tr>
      <tr>
        <td class="bkiri">Berat Tarra</td>
        <td>:</td>
        <td class="kll"><div align="right"><span style="text-transform:uppercase;">
            <?=format_angka($row['tara'])?>
        </span> Kg</div></td>
      </tr>
      <tr>
        <td class="bkiri"><strong>Berat Netto</strong></td>
        <td>:</td>
        <td class="kll"><div align="right"><strong><span style="text-transform:uppercase;">
            <?=format_angka($row['netto'])?>
        </span> Kg</strong></div></td>
      </tr>
      <tr>
        <td class="bkiri">Berat Pot.</td>
        <td>:</td>
        <td class="kll"><div align="right"><span style="text-transform:uppercase;">
            <?=format_angka($row['potongan'])?>
        </span> Kg</div></td>
      </tr>
      <tr>
        <td class="siku">Berat Terima</td>
        <td>:</td>
        <td class="bbawah"><div align="right"><span style="text-transform:uppercase;">
            <?=format_angka($row['beratBersih'])?>
        </span> Kg</div></td>
      </tr>
    </table></td>
    <td><table width="100%" border="0" cellspacing="5" cellpadding="0">
      <tr>
        <td class="bkiri">FFA</td>
        <td>:</td>
        <td class="kll" ><div align="right"><span style="text-transform:uppercase;">
            <?=$row['potFFA']?>
        </span>%</div></td>
      </tr>
      <tr>
        <td class="bkiri">Kadar Air</td>
        <td>:</td>
        <td class="kll"><div align="right"><span style="text-transform:uppercase;">
            <?=$row['potAir']?>
        </span>%</div></td>
      </tr>
      <tr>
        <td class="bkiri" style="font-size:14px;">Kadar Kotoran</td>
        <td>:</td>
        <td class="kll"><div align="right"><span style="text-transform:uppercase;">
            <?=$row['potKotoran']?>
        </span>%</div></td>
      </tr>
      <tr>
        <td class="bkiri">Jumlah Segel</td>
        <td>:</td>
        <td class="kll"><div align="right"><span style="text-transform:uppercase;">
            <?=$row['jumlahSegel']?>
        </span></div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><div align="right"></div></td>
      </tr>
    </table></td>
    <td><table width="100%" border="0" cellspacing="5" cellpadding="0">
      <tr>
        <td colspan="3"><div align="center"><span style="text-transform:uppercase;">
          <?=$row['segel']?>
        </span></div></td>
        </tr>
      
    </table></td>
  </tr>
  <tr>
    <td colspan="3"><table width="100%" border="1" cellspacing="0" cellpadding="0">
      <tr>
        <td width="37%">Catatan<br />
          <br />
          <br />
          <br /></td>
        <td width="21%"><div align="center">Disetujui Oleh<br />
          <br />
          <br />
          <br />
        </div></td>
        <td width="21%"><div align="center">Diketahui Oleh<br />
          <br />
          <br />
          <br />
        </div></td>
        <td width="21%"><div align="center">Diterima Oleh<br />
          <br />
          <br />
          <br />
        </div></td>
      </tr>
    </table></td>
  </tr>
</table>
<?=$slipKeberapa?>

<script src="../js/jquery-2.1.1.min.js"></script>
<script>
$(document).ready(function(e) {
	setInterval(function(){
		window.location.href='../contentChack.php?menu=penimbanganCPO';
	}, 100);
});
</script>  
</body>

</html>
