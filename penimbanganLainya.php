<?php
include "config/koneksi.php"; $table = "penimbanganLainya_d"; $kd = "nmSlipLainya"; 
include "config/fungsi_form.php";
include "config/inc.library.php";
	if(!isset($_GET['page'])){$page = 'data';}else{$page = $_GET['page'];} // $page

		if(isset($_GET['nmKendaraan'])){
				$qry = mysql_query("SELECT * FROM $table WHERE nmKendaraan = '$_GET[nmKendaraan]' AND complate = 'n'");
				$jumQ = mysql_num_rows($qry);
				if($jumQ == 0){$page = 'add';}else{$page = "edit";}	
		}
		if(isset($_GET['batal'])){
				$qry = mysql_query("UPDATE $table SET complate = 'c' WHERE $kd = '$_GET[batal]'");
				$page = "data";
		}									
	# jika btn submit ada yang di kirim
	if(isset($_POST['btnSubmit'])){ $btnSubmit = $_POST['btnSubmit'];
		if($btnSubmit == 'add'){
				$qry = mysql_query("INSERT INTO $table SET 
								nmSlipLainya = '$_POST[nmSlipLainya]',
								nmKendaraan = '$_POST[nmKendaraan]',
								nmSupir = '$_POST[nmSupir]',
								nmRelasi = '$_POST[nmRelasi]',
								kdMaterial = '$_POST[kdMaterial]',
								nmMaterial = '$_POST[nmMaterial]',
								bruto = '$_POST[bruto]',
								tanggalMasuk = NOW(),
								userMasuk = '$_SESSION[namalengkap]',
								complate = 'n'	
									");
				if($qry){echo "<meta http-equiv='refresh' content='0; url=?page=data'>";}				
		}
		// ===========================================
		if($btnSubmit == 'edit'){
				$qry = mysql_query("UPDATE $table SET 
										nmSlipLainya = '$_POST[nmSlipLainya]',
										nmKendaraan = '$_POST[nmKendaraan]',
										nmSupir = '$_POST[nmSupir]',
										nmRelasi = '$_POST[nmRelasi]',
										kdMaterial = '$_POST[kdMaterial]',
										nmMaterial = '$_POST[nmMaterial]',
										bruto = '$_POST[bruto]',
										tara = '$_POST[tara]',
										netto = '$_POST[netto]',
										tanggalKeluar = NOW(),
										userKeluar = '$_SESSION[namalengkap]',
										complate = 'y',
										keterangan = '$_POST[keterangan]'

									WHERE $kd = '$_POST[$kd]'
									");
				if($qry){ ?><meta http-equiv='refresh' content='0; url=laporanEx/slipLainya.php?noSlip=<?=$_POST[$kd]?>'> <?php }
		} // ===========================================
	}
	
#jika page add
if($page == 'add'){ ?>

<div class="block-flat">
    
    					<div class="header">
                            <div class="col-sm-6 col-md-6">
                                <h3><?=$_SESSION[nmMenu]?><button type="button" class="btn btn-success btn-lg"><i class="fa fa-sign-in"></i> MASUK</button></h3>
                            </div>  
                            <div class="col-sm-6 col-md-6">
                                <div class="overflow-hidden">
                                    <h1 class="no-margin color-danger"><span class="big-text" id="indikator">0</span> <span class="color-warning">Kg</span></h1>
                                    
                                </div>
                            
                            </div>    
                            <div class="clear"></div>                   
						</div>
                        
    <div class="content">
    <form onsubmit="return confirm('Lanjutkan Simpan?')" action="?page=data" method="post" parsley-validate novalidate>
    <div class="col-sm-6 col-md-6">
        <table class="no-border">
            <tbody class="no-border-x no-border-y">
                <tr>
                  <td width="20%">No. Slip</td>
                  <td width="1%">:</td>
                  <td><input type="text" name="nmSlipLainya" id="nmSlipLainya" required="required" autocomplete="off" value="<?=buatKodeFaktur("penimbanganLainya_d","")?>" readonly="readonly" /></td>
                </tr>
                <tr>
                    <td>No. Kendaraan</td>
                    <td>:</td>
                    <td><input type="text" name="nmKendaraan" id="nmKendaraan" required="required" autocomplete="off" value="<?=$_GET['nmKendaraan']?>" /></td>
                </tr>
                <tr>
                    <td>No. Material</td>
                    <td>:</td>
                    <td><input type="text" name="kdMaterial" id="kdMaterial" required="required" autocomplete="off" /></td>
                </tr>
                <tr>
                    <td>Material</td>
                    <td>:</td>
                    <td><input type="text" name="nmMaterial" id="nmMaterial" required="required" autocomplete="off" /></td>
                </tr>                
                <tr>
                    <td>Customer</td>
                    <td>:</td>
                    <td>
                  <select class="select2" id="nmRelasi" name="nmRelasi" required>
                              <option value="">--Pilih Customer--</option>
                              <?php 
                              $qryF = mysql_query("select * from tb_relasi order by nmRelasi asc"); 
                              while($rowF = mysql_fetch_array($qryF)){
                              ?> 
                                <option value="<?=$rowF[1]?>"><?=$rowF[1]?></option>
                              <?php
                              }
                              ?>  
                  </select>
                    
                    </td>
                </tr>
                <tr>
                    <td>Berat</td>
                    <td>:</td>
                    <td>
                    <input type="text" name="bruto" id="bruto"  readonly="readonly" required="required" />
                    <button name="getTimbangan" onclick="getBruto()" id="getTimbangan" class="btn btn-warning btn-sm" type="button" style="cursor:pointer;">Timbangan 1</button>
                    <button name="getTimbanganTwo" onclick="getBrutoTwo()" id="getTimbanganTwo" class="btn btn-warning btn-sm" type="button" style="cursor:pointer;">Timbangan 2</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div> 
        <div class="clear"></div>
        <hr />
        <a href="?page=data" class="btn btn-default">Kembali</a><button name="btnSubmit" type="submit" class="btn btn-primary" value="add" >Simpan</button>
    </form>  
     
    </div>
    
</div>

<?php
 }
// ==================================== 
#jika page edit
if($page == 'edit'){	
$rowEdit = mysql_fetch_array($qry);
?>				    

<div class="block-flat"> 
                        
                        <div class="header">
                            <div class="col-sm-6 col-md-6">
                                <h3><?=$_SESSION[nmMenu]?><button type="button" class="btn btn-info btn-lg">KELUAR <i class="fa fa-sign-out"></i></button></h3>
                            </div>  
                            <div class="col-sm-6 col-md-6">
                                <div class="overflow-hidden">
                                    <h1 class="no-margin color-danger"><span class="big-text" id="indikator">0</span> <span class="color-warning">Kg</span></h1>
                                    
                                </div>
                            
                            </div>    
                            <div class="clear"></div>                   
						</div>
                        
    <div class="content">
    <form onsubmit="return confirm('Lanjutkan Simpan?')" action="?page=data" method="post" parsley-validate novalidate>
    <div class="col-sm-6 col-md-6">
        <table class="no-border">
            <tbody class="no-border-x no-border-y">
                <tr>
                  <td width="20%">No. Slip</td>
                  <td width="1%">:</td>
                  <td><input type="text" name="nmSlipLainya" id="nmSlipLainya" required="required" autocomplete="off" value="<?=$rowEdit['nmSlipLainya']?>" readonly="readonly" /></td>
                </tr>
                <tr>
                    <td>No. Kendaraan</td>
                    <td>:</td>
                    <td><input type="text" name="nmKendaraan" id="nmKendaraan" required="required" autocomplete="off" value="<?=$rowEdit['nmKendaraan']?>" readonly="readonly" /></td>
                </tr>
                <tr>
                    <td>No. Material</td>
                    <td>:</td>
                    <td><input type="text" name="kdMaterial" id="kdMaterial" required="required" autocomplete="off" value="<?=$rowEdit['kdMaterial']?>" readonly="readonly" /></td>
                </tr>
                <tr>
                    <td>Material</td>
                    <td>:</td>
                    <td><input type="text" name="nmMaterial" id="nmMaterial" required="required" autocomplete="off" value="<?=$rowEdit['nmMaterial']?>" readonly="readonly" /></td>
                </tr>                
                <tr>
                    <td>Customer</td>
                    <td>:</td>
                    <td><input type="text" name="nmRelasi" id="nmRelasi" required="required" autocomplete="off" value="<?=$rowEdit['nmRelasi']?>" readonly="readonly" /></td>
                </tr>
                <tr>
                    <td>Bruto</td>
                    <td>:</td>
                    <td><input type="text" name="bruto" id="bruto" required="required" autocomplete="off" value="<?=$rowEdit['bruto']?>" readonly="readonly" /></td>
                </tr>
                <tr>
                    <td>Tara</td>
                    <td>:</td>
                    <td>
                    <input type="text" name="tara" id="tara" required="required" autocomplete="off" value="<?=$rowEdit['tara']?>" readonly="readonly" />
                    <button name="getTimbangan" onclick="getNetto()" id="getTimbangan" class="btn btn-warning btn-sm" type="button" style="cursor:pointer;">Timbangan 1</button>
                    <button name="getTimbangan" onclick="getNettoTwo()" id="getTimbanganTwo" class="btn btn-warning btn-sm" type="button" style="cursor:pointer;">Timbangan 2</button>
                  </td>
                </tr>
                <tr>
                    <td>Netto</td>
                    <td>:</td>
                    <td><input type="netto" name="netto" id="netto" required="required" autocomplete="off" value="<?=$rowEdit['netto']?>" readonly="readonly" /></td>
                </tr>  
                <tr>
                    <td collspan="3">&nbsp</td>
                </tr> 
                <tr>
                    <td>Keterangan</td>
                    <td>:</td>
                    <td><input type="keterangan" name="keterangan" id="keterangan" autocomplete="off" value="" /></td>
                </tr>                    
                                                                            
            </tbody>
        </table>
    </div>
    <div class="col-sm-6 col-md-6"></div>    
      <div class="clear"></div>
        <hr />
        <a href="?page=data" class="btn btn-default">Kembali</a><button name="btnSubmit" type="submit" class="btn btn-primary" value="edit" >Simpan</button>
       </form>
    </div>
</div>

<?php
 }
// =====================================   
#jika page data
if($page == 'data'){ 

?>
	  	<div class="block-flat">
			  <div class="header">							
				<h3><?=$_SESSION[nmMenu]?></h3>
			  </div>
			  	<div class="content">
					 <form class="form-horizontal" action="" method="get" style="border-radius: 0px;">
		              <div class="form-group"><?php $label = "Nomor Kendaraan"; $field = "nmKendaraan"; $value = ""; ?>
		                <label class="col-sm-3 control-label"><?=$label?></label>
		                <div class="col-sm-3">
		                  <input type="text" class="form-control" id="<?=$field?>" name="<?=$field?>" placeholder="<?=$label?>" value="<?=$value?>" required="required" autocomplete="off">
		                </div>
		                <div class="col-sm-3">  
		                  <button name="btnProses" type="submit" class="btn btn-primary" style="cursor:pointer;" value="Proses" >Proses</button>
		                </div>
		              </div>   
	                </form>
                </div>
        </div>
<?php					
 }   
// ===================================== 
 $sqlMw = mysql_query("select nmMinimum from u_minimum");
 $rMw = mysql_fetch_array($sqlMw);
 ?>
 
 <script type="text/javascript">
function potPot(isi){
	relasi = $('#nmRelasi').val();
<?php $qryPot = mysql_query("select * from tb_relasi");
while($rPot = mysql_fetch_array($qryPot)){	?>
	if(relasi == '<?=$rPot['nmRelasi']?>'){ potongan =  <?=$rPot['potongan']?>;}
<?php }; ?>	
};
function getBruto(){
 			  $.get('indikator.php', function(data){
				  if(data >= <?=$rMw[0]?>){
					 $('#bruto').val(parseInt(data));
					 $('#indikator').html(parseInt(data));
					 $('#getTimbangan').hide();
					 $('#getTimbanganTwo').hide();
				  };
			  });
};
function getNetto(){
 			  $.get('indikator.php', function(data){
				  if(data >= <?=$rMw[0]?>){
					  $('#tara').val(parseInt(data));
					  $('#indikator').html(parseInt(data));
					  bruto  = $('#bruto').val();
					  tara   = parseInt(data);
					  if(bruto > tara){ $('#bruto').val(bruto); $('#tara').val(tara);	 
					  }else{ 			$('#bruto').val(tara); $('#tara').val(bruto); };
					  netto = $('#bruto').val() - $('#tara').val()  ;
					  $('#netto').val(netto); 
					  $('#getTimbangan').hide();
					 $('#getTimbanganTwo').hide();
					  berBer();
				  };
			  });
};
function getBrutoTwo(){
 			  $.get('indikator2.php', function(data){
				  if(data >= <?=$rMw[0]?>){
					 $('#bruto').val(parseInt(data));
					 $('#indikator').html(parseInt(data));
					 $('#getTimbangan').hide();
					 $('#getTimbanganTwo').hide();
				  };
			  });
};
function getNettoTwo(){
 			  $.get('indikator2.php', function(data){
				  if(data >= <?=$rMw[0]?>){
					  $('#tara').val(parseInt(data));
					  $('#indikator').html(parseInt(data));
					  bruto  = $('#bruto').val();
					  tara   = parseInt(data);
					  if(bruto > tara){ $('#bruto').val(bruto); $('#tara').val(tara);	 
					  }else{ 			$('#bruto').val(tara); $('#tara').val(bruto); };
					  netto = $('#bruto').val() - $('#tara').val()  ;
					  $('#netto').val(netto); 
					  $('#getTimbangan').hide();
					 $('#getTimbanganTwo').hide();
					  berBer();
				  };
			  });
};

function berBer(){
		netto = $('#netto').val();	
		$('#potongan').val();
		beratBersih = netto - $('#potongan').val();
		$('#beratBersih').val(beratBersih)
};
function tandan(){
		$('#jumlahTandan').val($('#beratBersih').val()/$('#beratTandan').val());
};
</script> 
 		

