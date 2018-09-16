<div class="col-sm-offset-3 col-sm-6 col-md-6"> 
 <?php include_once "config/koneksi.php"; 
 if($_POST['aksi'] == 'simpan'){ 
 	$qryEdit = mysql_query("UPDATE u_minimum SET nmMinimum = '$_POST[nmMinimum]' WHERE kdMinimum = '1'");
			if($qryEdit){
			echo 			'<div class="alert alert-info alert-white rounded">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<div class="icon"><i class="fa fa-check-circle"></i></div>
								<strong>Success!</strong> Data Telah Di Ganti Menjadi <strong>'.$_POST['nmMinimum'].' Kg</strong> !.
							 </div>';
			}
 } ?>
 </div>
	

<div class="col-sm-offset-3 col-sm-6 col-md-6">
        <div class="block-flat">
         <div class="header">							
            <h3>Setting Weight Minimum</h3>
          </div>
          <div class="content">
            <form class="form-horizontal" action="" method="post" role="form"  parsley-validate novalidate>
              <div class="form-group">
                <div class="col-sm-12">
                <?php
				$qWm = mysql_query("select * from u_minimum");
				$r = mysql_fetch_array($qWm);
				?>
                 <center><h1 class="big-text no-margin"><?=$r['nmMinimum']?> Kg</h1>
                 <input name="nmMinimum" type="text" class="bslider form-control" data-slider-value="[<?=$r['nmMinimum']?>]" data-slider-step="5" data-slider-max="3000" data-slider-min="10" value="<?=$r['nmMinimum']?>" /> Kg</center>
                </div> 
              </div>
              <div class="form-group">
              <div class="col-sm-12"><hr />
                <center><button type="submit" name="aksi" class="btn btn-primary" value="simpan">Simpan</button></center>
              </div>
              </div>
            </form>
          </div>
        </div>				
      </div>
      
      
                              
                              
                              
                            
      
   