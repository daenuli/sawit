<?php
include "config/koneksi.php"; $table = "u_sidebar"; $kd = "kdMenu"; 
include "config/fungsi_form.php";
include "config/inc.library.php";
	if(!isset($_GET['page'])){$page = 'data';}else{$page = $_GET['page'];} // $page

		if(isset($_GET['c'])){
				$qry = mysql_query("UPDATE $table SET 
									$_GET[c] = '$_GET[i]'
									WHERE $kd = '$_GET[k]'
									");
				if($qry){echo ' <div class="alert alert-success alert-white rounded">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<div class="icon"><i class="fa fa-check"></i></div>
									<strong>Success!</strong> has been saved successfully!
								 </div>';}
		}			
	// ===========================================					
	
	

#jika page data
if($page == 'data'){ ?>
					<div class="block-flat">
						<div class="header">
							<h3>Setting Hak Akses</h3>
						</div>
						<div class="content">
							<table class="">
								<thead class="no-border">
									<tr>
										<th>Menu</th>
										<th class="text-center">Super Visor</th>
										<th class="text-center">Operator</th>                               		</tr>
								</thead>
								<tbody class="">
									<?php 	
											$qryData = mysql_query("SELECT * FROM $table");
											while ($rowData = mysql_fetch_array($qryData)) { 
									?>
									<tr>
										<td style="width:30%;"><?=$rowData['nmMenu']?></td>
                                        <td class="text-center">
                                    <?php    
                    if($rowData['superVisor'] == 'y'){?><a class="label label-success" href="?c=superVisor&i=n&k=<?=$rowData['kdMenu']?>"><i class="fa fa-pencil"></i></a><?php 
											  }else{ ?> <a class="label label-danger" href="?c=superVisor&i=y&k=<?=$rowData['kdMenu']?>"><i class="fa fa-pencil"></i></a> <?php }; ?>    
                                        </td>
										<!--<td class="text-center"><a class="label label-success" href="#"><i class="fa fa-pencil"></i></a></td> -->
									<td class="text-center">
                                    <?php    
                    if($rowData['operator'] == 'y'){?><a class="label label-success" href="?c=operator&i=n&k=<?=$rowData['kdMenu']?>"><i class="fa fa-pencil"></i></a><?php 
											  }else{ ?> <a class="label label-danger" href="?c=operator&i=y&k=<?=$rowData['kdMenu']?>"><i class="fa fa-pencil"></i></a> <?php }; ?>    
                                        </td>
                                       
									</tr>
                                    <?php } ?>
								</tbody>
							</table>
						</div>
					</div>
<?php					
 }   
// ===================================== 
 ?>