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
$query = mysql_query("select *, TIME(tanggalMasuk) as jamMasuk, TIME(tanggalKeluar) as jamKeluar from penimbanganLainya_d where nmSlipLainya = '$slip'");
$row = mysql_fetch_assoc($query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

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
<table width="100%" border="2" cellpadding="0" cellspacing="0">
  <tr>
    <td width="50%"><table width="100%" border="0" cellspacing="5" cellpadding="0">
      <tr>
        <td width="49%" class="bkiri">No. Slip</td>
        <td width="3%">:</td>
        <td width="48%" class="kll"><div align="left"><span style="text-transform:uppercase;">
          <?=$row['nmSlipLainya']?>
        </span></div></td>
      </tr>
      <tr>
        <td class="bkiri">No. Polisi</td>
        <td>:</td>
        <td class="kll"><div align="left"><span style="text-transform:uppercase;">
          <?=$row['nmKendaraan']?>
        </span></div></td>
      </tr>
      <tr>
        <td class="bkiri">Tanggal</td>
        <td>:</td>
        <td class="kll">
          <div align="left">
            <?=tgl_indo($row['tanggalKeluar'])?>
          </div></td>
      </tr>
      <tr>
        <td class="bkiri">Jam Masuk</td>
        <td>:</td>
        <td class="kll"><div align="left"><span style="text-transform:uppercase;">
          <?=$row['jamMasuk']?>
        </span></div></td>
      </tr>
      <tr>
        <td class="bkiri">Jam Keluar</td>
        <td>:</td>
        <td class="kll"><div align="left"><span style="text-transform:uppercase;">
          <?=$row['jamKeluar']?>
        </span></div></td>
      </tr>
      <tr>
        <td class="bkiri">Custumer</td>
        <td>:</td>
        <td class="kll"><div align="left"><span style="text-transform:uppercase;">
          <?=$row['nmRelasi']?>
        </span></div></td>
      </tr>
      <tr>
        <td class="bkiri">Nama Material</td>
        <td>:</td>
        <td class="kll"><div align="left"><span style="text-transform:uppercase;">
          <?=$row['nmMaterial']?>
        </span></div></td>
      </tr>
      <tr>
        <td class="bkiri">No. Material</td>
        <td>:</td>
        <td class="kll"><div align="left"><span style="text-transform:uppercase;">
          <?=$row['kdMaterial']?>
        </span></div></td>
      </tr>
      <tr>
        <td class="siku">Keterangan</td>
        <td>:</td>
        <td class="bbawah"><div align="left"><span style="text-transform:uppercase;">
          <?=$row['keterangan']?>
        </span></div></td>
      </tr>
    </table></td>
    <td width="50%"><table width="100%" border="0" cellspacing="5" cellpadding="0">
      <tr>
        <td width="52%" class="bkiri"><strong>Bruto</strong></td>
        <td width="5%">:</td>
        <td width="43%" class="kll"><div align="right"><strong><span style="text-transform:uppercase;">
            <?=format_angka($row['bruto'])?>
                </span> Kg</strong></div></td>
      </tr>
      <tr>
        <td class="style1">Tara</td>
        <td>:</td>
        <td class="kll"><div align="right"><strong><span style="text-transform:uppercase;">
            <?=format_angka($row['tara'])?>
                </span> Kg</strong></div></td>
      </tr>
      <tr>
        <td class="style1">Netto</td>
        <td>:</td>
        <td class="kll"><div align="right"><strong><span style="text-transform:uppercase;">
            <?=format_angka($row['netto'])?>
        </span> Kg</strong></div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>:</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>:</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>:</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>:</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>:</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>:</td>
        <td>&nbsp;</td>
      </tr>
      
    </table></td>
  </tr>
  <tr>
    <td colspan="3"><table width="100%" border="1" cellspacing="0" cellpadding="0">
      <tr>
        
        <td width="22%"><div align="center">Disetujui Oleh<br />
          <br />
          <br />
          <br />
        </div></td>
        <td width="23%"><div align="center">Diketahui Oleh<br />
          <br />
          <br />
          <br />
        </div></td>
        <td width="18%"><div align="center">Diterima Oleh<br />
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
		window.location.href='../contentChack.php?menu=menu=penimbanganLainya';
	}, 100);
});
</script>  
</body>

</html>
