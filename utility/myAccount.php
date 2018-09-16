<?php
include "config/koneksi.php"; $table = "users"; $kd = "username"; 
include "config/fungsi_form.php";
include "config/inc.library.php";
	if(!isset($_GET['page'])){$page = 'data';}else{$page = $_GET['page'];} // $page

		if(isset($_GET['del'])){
				$qry = mysql_query("DELETE FROM $table 
									WHERE $kd = '$_GET[del]'
									");
				if($qry){echo ' <div class="alert alert-success alert-white rounded">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<div class="icon"><i class="fa fa-check"></i></div>
									<strong>Delete!</strong> has been saved successfully!
								 </div>';}
		}			
	// ===========================================					
	# jika btn submit ada yang di kirim
	if(isset($_POST['btnSubmit'])){ $btnSubmit = $_POST['btnSubmit'];

		// ===========================================
		if($btnSubmit == 'edit'){
				if (empty($_POST['password'])) {
						$qry = mysql_query("UPDATE $table SET 
													 nama_lengkap    = '$_POST[nama_lengkap]',
													 email           = '$_POST[email]', 
													 no_telp         = '$_POST[no_telp]'  
											   WHERE $kd      = '$_POST[$kd]'");

				}else{
						$pass=md5($_POST['password']);
						$qry = mysql_query("UPDATE $table SET 
													 password        = '$pass',
													 nama_lengkap    = '$_POST[nama_lengkap]',
													 email           = '$_POST[email]',  
													 no_telp         = '$_POST[no_telp]'  
											   WHERE $kd      = '$_POST[$kd]'");
				}
				if($qry){echo '<div class="alert alert-success alert-white rounded">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<div class="icon"><i class="fa fa-check"></i></div>
									<strong>Edit!</strong> has been saved successfully!
								 </div>';}
		}
		// ===========================================
	}
	//========================================
	
#jika page add
if($page == 'add'){?>
						  	<div class="block-flat">
								  <div class="header">							
									<h3>Tambah <?=$_SESSION[nmMenu]?></h3>
								  </div>
								  <div class="content">
									 <form class="form-horizontal" onsubmit="return confirm('Lanjutkan Simpan?')" action="?page=data" method="post" style="border-radius: 0px;"> <?php
    inputForm("username","User Name");
	inputForm("nama_lengkap","Nama Lengkap");
	inputForm("email","Email");
	inputForm("no_telp","Telpon");
	inputFormLevelUser();
	inputForm("password","Password");
		inputFormButton('btnSubmit','Tambah','add');
						  echo ' </form>
								</div>
							  </div>';
 }
// ==================================== 
#jika page edit
if($page == 'edit'){					    
						$qryEdit = mysql_query("SELECT * FROM $table WHERE $kd = '$_SESSION[namauser]'");
						$rowEdit = mysql_fetch_array($qryEdit);
				?>
						  	<div class="block-flat">
								  <div class="header">							
									<h3>Tambah <?=$_SESSION[nmMenu]?></h3>
								  </div>
								  <div class="content">
									 <form class="form-horizontal" onsubmit="return confirm('Lanjutkan Simpan?')" action="?page=data" method="post" style="border-radius: 0px;"> <?php
    inputFormReadOnly("username","User Name",$rowEdit['username']);
	inputForm("nama_lengkap","Nama Lengkap",$rowEdit['nama_lengkap']);
	inputForm("email","Email",$rowEdit['email']);
	inputForm("no_telp","Telpon",$rowEdit['no_telp']);
	inputFormLevelUser($rowEdit['level']);
	inputForm("password","Password");
		inputFormButton('btnSubmit','Simpan','edit');
						  echo ' </form>
								</div>
							  </div>';
 }
// =====================================   
#jika page data
if($page == 'data'){ 
						$qryEdit = mysql_query("SELECT * FROM $table WHERE $kd = '$_SESSION[namauser]'");
						$rowEdit = mysql_fetch_array($qryEdit);
				?>
						  	<div class="block-flat">
								  <div class="header">							
									<h3>My Account</h3>
								  </div>
								  <div class="content">
									 <form class="form-horizontal" onsubmit="return confirm('Lanjutkan Simpan?')" action="?page=data" method="post" style="border-radius: 0px;"> <?php
    inputFormReadOnly("username","User Name",$rowEdit['username']);
	inputForm("nama_lengkap","Nama Lengkap",$rowEdit['nama_lengkap']);
	inputForm("email","Email",$rowEdit['email']);
	inputForm("no_telp","Telpon",$rowEdit['no_telp']);
	inputForm("password","Password");
		inputFormButton('btnSubmit','Simpan','edit');
						  echo ' </form>
								</div>
							  </div>';
					
 }   
// ===================================== 
 ?>