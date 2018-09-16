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
$query = mysql_query("select *, TIME(tanggalMasuk) as jamMasuk, TIME(tanggalKeluar) as jamKeluar from penimbanganTBS_d where nmSlipTBS = '$slip'");
$row = mysql_fetch_array($query);

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
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
      SUPLIER : <?=$row['nmRelasi']?>
    </span><span style="text-transform:uppercase;">
    
    </span></td>
    <td><?=$row['nmBarang']?></td>
    <td><span style="text-transform:uppercase;">
      <?=$row['jamMasuk']?>
    </span><span style="text-transform:uppercase;">
    <?=$row['jamKeluar']?>
    </span></td>
    <td><div align="right">
      <?=tgl_indo($row['tanggalKeluar'])?>
    </div></td>
  </tr>
</table>


<table width="100%" border="2" cellpadding="0" cellspacing="0">
  <tr>
    <td class="style1">&nbsp;plat mobil : <?=$row['nmKendaraan']?></td>
    <td class="hbesar"><div align="center"><strong>potongan</strong></div></td>
    <td class="hbesar"><div align="center"><strong>pulangan</strong></div></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="5" cellpadding="0">
      <tr>
        <td>Berat Bruto</td>
        <td>:</td>
        <td><div align="right"><span style="text-transform:uppercase;">
          <?=format_angka($row['bruto'])?>
        </span> Kg</div></td>
      </tr>
      <tr>
        <td>Berat Tara</td>
        <td>:</td>
        <td><div align="right"><span style="text-transform:uppercase;">
          <?=format_angka($row['tara'])?>
        </span> Kg</div></td>
      </tr>
      <tr>
        <td><strong>Berat Netto</strong></td>
        <td>:</td>
        <td><div align="right"><strong>
          <?=format_angka($row['netto'])?>
        </strong> Kg</div></td>
      </tr>
      <tr>
        <td>Berat Potongan</td>
        <td>:</td>
        <td><div align="right"><span style="text-transform:uppercase;">
          <?=format_angka($row['potongan'])?>
        </span> Kg</div></td>
      </tr>
      <tr>
        <td><strong>Berat Terima</strong></td>
        <td>:</td>
        <td><div align="right"><strong>
          <?=format_angka($row['beratBersih'])?>
        </strong> Kg</div></td>
      </tr>
      <tr>
        <td>Berat Tandan</td>
        <td>:</td>
        <td><div align="right"><span style="text-transform:uppercase;">
          <?=format_angka($row['beratTandan'])?>
        </span> Kg</div></td>
      </tr>
      <tr>
        <td>Jumlah Tandan</td>
        <td>:</td>
        <td><div align="right"><span style="text-transform:uppercase;">
          <?=$row['jumlahTandan']?>
        </span> jjg</div></td>
      </tr>
    </table></td>
    <td><table width="100%" border="0" cellspacing="5" cellpadding="0">
      <tr>
        <td>Wajib</td>
        <td>:</td>
        <td><div align="right"><span style="text-transform:uppercase;">
          <?=$row['potWajib']?>
        </span>%</div></td>
      </tr>
      <tr>
        <td>Sampah</td>
        <td>:</td>
        <td><div align="right"><span style="text-transform:uppercase;">
          <?=$row['potSampah']?>
        </span>%</div></td>
      </tr>
      <tr>
        <td>Tankai</td>
        <td>:</td>
        <td><div align="right"><span style="text-transform:uppercase;">
          <?=$row['potTangkai']?>
        </span>%</div></td>
      </tr>
      <tr>
        <td>Pasir</td>
        <td>:</td>
        <td><div align="right"><span style="text-transform:uppercase;">
          <?=$row['potPasir']?>
        </span>%</div></td>
      </tr>
      <tr>
        <td>Air</td>
        <td>:</td>
        <td><div align="right"><span style="text-transform:uppercase;">
          <?=$row['potAir']?>
        </span>%</div></td>
      </tr>
      <tr>
        <td>Mutu</td>
        <td>:</td>
        <td><div align="right"><span style="text-transform:uppercase;">
          <?=$row['potMutu']?>
        </span>%</div></td>
      </tr>
      <tr>
        <td><strong>Total</strong></td>
        <td><strong>:</strong></td>
        <td><div align="right"><strong><span style="text-transform:uppercase;">
        <?=$row['potonganPersen']?>  
        </span>%</strong></div></td>
      </tr>
    </table></td>
    <td><table width="100%" border="0" cellspacing="5" cellpadding="0">
      <tr>
        <td>Mentah</td>
        <td>:</td>
        <td><div align="left"><span style="text-transform:uppercase;">
          <?=$row['potMentah']?>
        </span></div></td>
      </tr>
      <tr>
        <td>Busuk</td>
        <td>:</td>
        <td><div align="left"><span style="text-transform:uppercase;">
          <?=$row['potBusuk']?>
        </span></div></td>
      </tr>
      <tr>
        <td>Tankos</td>
        <td>:</td>
        <td><div align="left"><span style="text-transform:uppercase;">
          <?=$row['potTankos']?>
        </span></div></td>
      </tr>
      <tr>
        <td>Lain-lain</td>
        <td>:</td>
        <td><div align="left"><span style="text-transform:uppercase;">
          <?=$row['potLainya']?>
        </span></div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><div align="right"></div></td>
      </tr>
      <tr>
        <td>Brondolan</td>
        <td>:</td>
        <td><div align="right"><span style="text-transform:uppercase;">
          <?=$row['potBrondol']?>
        </span>%</div></td>
      </tr>
      <tr>
        <td>Dura</td>
        <td>:</td>
        <td><div align="right"><span style="text-transform:uppercase;">
          <?=$row['potDura']?>
        </span>%</div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;Catatan:<br />
      <span style="text-transform:uppercase;">
      &nbsp;<?=$row['keterangan']?>
      </span><br />
      <br />
    <br /></td>
    <td><div align="center">Diketahui Oleh<br />
        <br />
          <br />
        <br />
    </div></td>
    <td><div align="center">Diterima Oleh<br />
      <br />
      <br />
      <br />
    </div></td>
  </tr>
</table>
<?=$slipKeberapa?>


<script src="../js/jquery-2.1.1.min.js"></script>
<script>
$(document).ready(function(e) {
	setInterval(function(){
		window.location.href='../contentChack.php?menu=penimbanganTBS';
	}, 100);
});
</script>  
</body>

</html>