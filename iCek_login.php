<?php
include "config/koneksi.php";
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$username = anti_injection($_POST['username']);
$pass     = anti_injection(md5($_POST['password']));

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) OR !ctype_alnum($pass)){
  echo "Sekarang loginnya tidak bisa di injeksi lho.";
}
else{
$login=mysql_query("SELECT * FROM users WHERE username='$username' AND password='$pass' AND blokir='N'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);
$sv=mysql_query("SELECT * FROM users WHERE level='admin'");
$s = mysql_fetch_array($sv);
// Apabila username dan password ditemukan
if ($ketemu > 0){
	exec("taskkill /im realterm.exe");
	exec("start realterm.exe baud=2400 data=8n1 port=1 flow=2 capfile=C:/xampp/htdocs/ciptaagrosejati_v2/capture.txt Capture=1 visible=0"); 
	exec("start realterm.exe baud=2400 data=7e1 port=3 flow=2 capfile=C:/xampp/htdocs/ciptaagrosejati_v2/capture.txt Capture=1 visible=0"); 

	
  session_start();
  include "iTimeout.php";

  $_SESSION['KCFINDER']=array();
  $_SESSION['KCFINDER']['disabled'] = false;
  $_SESSION['KCFINDER']['uploadURL'] = "../tinymcpuk/gambar";
  $_SESSION['KCFINDER']['uploadDir'] = "";

  $_SESSION[namauser]     = $r[username];
  $_SESSION[namalengkap]  = $r[nama_lengkap];
  $_SESSION[passuser]     = $r[password];
  $_SESSION[leveluser]    = $r[level];
  $_SESSION[supervisor]   = $s[nama_lengkap];
  
  // session timeout
  $_SESSION[login] = 1;
  timer();

	$sid_lama = session_id();
	
	session_regenerate_id();

	$sid_baru = session_id();

  mysql_query("UPDATE users SET id_session='$sid_baru' WHERE username='$username'");
  header('location:contentChack.php');
}
else{
  include "iError-login.php";
}
}
?>
