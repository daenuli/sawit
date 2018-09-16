<?PHP
include_once("config/koneksi.php");
$qryPot = mysql_query("select potongan from tb_relasi where nmRelasi = 'Relasi 2'");
$r = mysql_fetch_assoc($qryPot);
echo $r['potongan'];

?>