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
		if($btnSubmit == 'add'){
				$pass=md5($_POST['password']);
				$qry = mysql_query("INSERT INTO $table SET 
													 password        = '$pass',
													 username    = '$_POST[username]',
													 nama_lengkap    = '$_POST[nama_lengkap]',
													 email           = '$_POST[email]',  
													 level           = '$_POST[level]',  
													 no_telp         = '$_POST[no_telp]' ");
				if($qry){echo '<div class="alert alert-success alert-white rounded">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<div class="icon"><i class="fa fa-check"></i></div>
									<strong>Add!</strong> has been saved successfully!
								 </div>';}				
		}
		// ===========================================
		if($btnSubmit == 'edit'){
				if (empty($_POST['password'])) {
						$qry = mysql_query("UPDATE $table SET 
													 nama_lengkap    = '$_POST[nama_lengkap]',
													 email           = '$_POST[email]', 
													 level           = '$_POST[level]', 
													 no_telp         = '$_POST[no_telp]'  
											   WHERE $kd      = '$_POST[$kd]'");

				}else{
						$pass=md5($_POST['password']);
						$qry = mysql_query("UPDATE $table SET 
													 password        = '$pass',
													 nama_lengkap    = '$_POST[nama_lengkap]',
													 email           = '$_POST[email]', 
													 level           = '$_POST[level]', 
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
						$qryEdit = mysql_query("SELECT * FROM $table WHERE $kd = '$_GET[kd]'");
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
$row = 5;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM $table";
$pageQry = mysql_query($pageSql) or die ("error paging: ".mysql_error());
$jml	 = mysql_num_rows($pageQry);
$max	 = ceil($jml/$row);
?>
					<div class="block-flat">
						<div class="header">
							<h3>Table <?=$_SESSION[nmMenu]?> <a href="?page=add" class="btn btn-primary pull-right">Tambah</a></h3><div class="clear"></div>
						</div>
						<div class="content">
							<table class="no-border">
								<thead class="no-border">
    <tr>
    	<th width="40px">No.</th>
        <th>Username</th>
        <th>Nama Lengkap</th>
        <th>email</th>
        <th>No. telpon</th>
        <th>Level</th>               
        <th class="text-center" width="80px">Aksi</th>
    </tr>
								</thead>
								<tbody class="no-border-x no-border-y">
									<?php 	$nomor = 0; if(isset($_GET['hal'])){ $nomor = $_GET['hal'];};
											$qryData = mysql_query("SELECT * FROM $table ORDER BY (SUBSTR($kd,3) + 0) ASC LIMIT $hal, $row");
											while ($rowData = mysql_fetch_array($qryData)) { $nomor++;
									?>
  <tr>
  	  <td><?=$nomor?></td>
      <td><?=$rowData['username']?></td>
      <td><?=$rowData['nama_lengkap']?></td>
      <td><?=$rowData['email']?></td>
      <td><?=$rowData['no_telp']?></td>
      <td><?=$rowData['level']?></td>           
      <td class="text-center"><a class="label label-default" href="?page=edit&kd=<?=$rowData[$kd]?>"><i class="fa fa-pencil"></i></a> <a onclick="return confirm('Lanjutkan Hapus?')" class="label label-danger" href="?del=<?=$rowData[$kd]?>"><i class="fa fa-times"></i></a></td>
  </tr>
									<?php 	} ?>
								</tbody>
							</table>
						</div>
                        	
                        				<div>	
                                        	<ul class="pagination">
												<?php
													echo "<li><a><b>Jumlah Data :</b>  $jml</a></li>";
                                                
                                                ?>                      
            								</ul>						
            								<ul class="pagination pull-right">
												<?php
                                                for ($h = 1; $h <= $max; $h++) {
                                                    $list[$h] = $row * $h - $row;
															$classHal = "";
												if(isset($_GET['hal'])){if($_GET['hal']== $list[$h]){$classHal = "class='active'";}};
													echo "<li $classHal ><a href='?page=data&hal=$list[$h]'>$h</a></li>";
                                                }
                                                ?>                      
            								</ul>
            							</div>
                                        <div class="clear"></div>
					</div>
<?php					
 }   
// ===================================== 
 ?>