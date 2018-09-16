<?php
include "config/koneksi.php"; $table = "penimbanganCPO_d"; $kd = "nmSlipCPO"; 
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
										nmSlipCPO = '$_POST[nmSlipCPO]',
										nmKendaraan = '$_POST[nmKendaraan]',
										nmSupir = '$_POST[nmSupir]',
										nmRelasi = '$_POST[nmRelasi]',
										nmDO = '$_POST[nmDO]',
										tara = '$_POST[tara]',
										tanggalMasuk = NOW(),
										userMasuk = '$_SESSION[namalengkap]',
										complate = 'n'
									");
				if($qry){echo "<meta http-equiv='refresh' content='0; url=?page=data'> ";}				
		}
		// ===========================================
		if($btnSubmit == 'edit'){
			$qryRelasi = mysql_query("select potongan from tb_relasi where nmRelasi = '$_POST[nmRelasi]'");
			$rowRelasi = mysql_fetch_assoc($qryRelasi);
			$brutoAsli = $_POST['brutoAsli'];			
				$qry = mysql_query("UPDATE $table SET 
										nmSlipCPO = '$_POST[nmSlipCPO]',
										nmKendaraan = '$_POST[nmKendaraan]',
										nmSupir = '$_POST[nmSupir]',
										nmRelasi = '$_POST[nmRelasi]',
										nmDO = '$_POST[nmDO]',
										bruto = '$_POST[bruto]',
										brutoAsli = '$brutoAsli',
										tara = '$_POST[tara]',
										netto = '$_POST[netto]',
										tanggalKeluar = NOW(),
										userKeluar = '$_SESSION[namalengkap]',
										complate = 'y',
										keterangan = '$_POST[keterangan]',
										potongan = '$_POST[potongan]',
										potFFA = '$_POST[potFFA]',
										potAir = '$_POST[potAir]',
										potKotoran = '$_POST[potKotoran]',
										jumlahSegel = '$_POST[jumlahSegel]',
										segel = '$_POST[segel]',
										beratBersih = '$_POST[beratBersih]'

									WHERE $kd = '$_POST[$kd]'
									");
				if($qry){ ?><meta http-equiv='refresh' content='0; url=laporanEx/slipCPO.php?noSlip=<?=$_POST[$kd]?>'> <?php }
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
                  <td><input type="text" name="nmSlipCPO" id="nmSlipCPO" required="required" autocomplete="off" value="<?=buatKodeFaktur("penimbanganCPO_d","")?>" readonly="readonly" /></td>
                </tr>
                <tr>
                    <td>No. Kendaraan</td>
                    <td>:</td>
                    <td><input type="text" name="nmKendaraan" id="nmKendaraan" required="required" autocomplete="off" value="<?=$_GET['nmKendaraan']?>" /></td>
                </tr>
                <tr>
                    <td>No. DO</td>
                    <td>:</td>
                    <td><input type="text" name="nmDO" id="nmDO" required="required" autocomplete="off" /></td>
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
                    <input type="text" name="tara" id="tara"  readonly="readonly" required="required" />
                    <button name="getTimbangan" onclick="getTara()" id="getTimbangan" class="btn btn-warning btn-sm" type="button" style="cursor:pointer;">Timbangan 1</button>
                    <button name="getTimbanganTwo" onclick="getTaraTwo()" id="getTimbanganTwo" class="btn btn-warning btn-sm" type="button" style="cursor:pointer;">Timbangan 2</button>
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
                  <td><input type="text" name="nmSlipCPO" id="nmSlipCPO" required="required" autocomplete="off" value="<?=$rowEdit['nmSlipCPO']?>" readonly="readonly" /></td>
                </tr>
                <tr>
                    <td>No. Kendaraan</td>
                    <td>:</td>
                    <td><input type="text" name="nmKendaraan" id="nmKendaraan" required="required" autocomplete="off" value="<?=$rowEdit['nmKendaraan']?>" readonly="readonly" /></td>
                </tr>
                <tr>
                    <td>No. DO</td>
                    <td>:</td>
                    <td><input type="text" name="nmDO" id="nmDO" required="required" autocomplete="off" value="<?=$rowEdit['nmDO']?>" readonly="readonly" /></td>
                </tr>
                <tr>
                    <td>Customer</td>
                    <td>:</td>
                    <td><input type="text" name="nmRelasi" id="nmRelasi" required="required" autocomplete="off" value="<?=$rowEdit['nmRelasi']?>" readonly="readonly" /></td>
                </tr>
                <tr>
                    <td>Bruto</td>
                    <td>:</td>
                    <td><input type="text" name="bruto" id="bruto" required="required" autocomplete="off" value="<?=$rowEdit['bruto']?>" readonly="readonly" />
                    <input type="hidden" name="brutoAsli" id="brutoAsli" required="required" value="<?=$rowEdit['brutoAsli']?>" readonly="readonly" />
                    <button name="getTimbangan" onclick="getNetto()" id="getTimbangan" class="btn btn-warning btn-sm" type="button" style="cursor:pointer;">Timbangan 1</button>
                    <button name="getTimbanganTwo" onclick="getNettoTwo()" id="getTimbanganTwo" class="btn btn-warning btn-sm" type="button" style="cursor:pointer;">Timbangan 2</button></td>
                </tr>
                <tr>
                    <td>Tara</td>
                    <td>:</td>
                    <td>
                    <input type="text" name="tara" id="tara" required="required" autocomplete="off" value="<?=$rowEdit['tara']?>" readonly="readonly" />
                    </td>
                </tr>
                <tr>
                    <td>Netto</td>
                    <td>:</td>
                    <td><input type="netto" name="netto" id="netto" required="required" autocomplete="off" value="<?=$rowEdit['netto']?>" readonly="readonly" /></td>
                </tr>    
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr> 
                <tr>
                    <td>Potongan</td>
                    <td>:</td>
                    <td><input type="potongan" parsley-type="number" name="potongan" id="potongan" required="required" autocomplete="off" value="0" onkeyup="berBer()" /></td>
                </tr> 
                <tr>
                    <td>Berat Bersih</td>
                    <td>:</td>
                    <td><input type="beratBersih" name="beratBersih" id="beratBersih" required="required" autocomplete="off" value="0" readonly="readonly" /></td>
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
    <div class="col-sm-6 col-md-6">
        <table class="no-border">
            <tbody class="no-border-x no-border-y">
                <tr>
                  <td colspan="3"><h4>Mutu Produk</h4></td>
                  <td width="20%">&nbsp;</td>
                  <td width="1%">&nbsp;</td>
                  <td>&nbsp;</td>                  
                </tr>            
                <tr>
                  <td width="20%">Pot. FFA</td>
                  <td width="1%">:</td>
                  <td><input type="text" parsley-type="number" name="potFFA" id="potFFA" required="required" autocomplete="off" value="0" onkeyup="berBer()" /></td>
                  <td width="20%">&nbsp;</td>
                  <td width="1%">&nbsp;</td>
                  <td>&nbsp;</td>                  
                </tr>
                <tr>
                  <td width="20%">Pot. Air</td>
                  <td width="1%">:</td>
                  <td><input type="text" parsley-type="number" name="potAir" id="potAir" required="required" autocomplete="off" value="0" onkeyup="berBer()" /></td>
                  <td width="20%">&nbsp;</td>
                  <td width="1%">&nbsp;</td>
                  <td>&nbsp;</td>                  
                </tr>
                <tr>
                  <td width="20%">Pot. Kotoran</td>
                  <td width="1%">:</td>
                  <td><input type="text" parsley-type="number" name="potKotoran" id="potKotoran" required="required" autocomplete="off" value="0" onkeyup="berBer()" /></td>
                  <td width="20%">&nbsp;</td>
                  <td width="1%">&nbsp;</td>
                  <td>&nbsp;</td>                  
                </tr>
                <tr>
                  <td width="20%">&nbsp;</td>
                  <td width="1%">:</td>
                  <td>&nbsp;</td>
                  <td width="20%">&nbsp;</td>
                  <td width="1%">&nbsp;</td>
                  <td>&nbsp;</td>                  
                </tr>
                <tr>
                  <td width="20%">Jumlah Segel</td>
                  <td width="1%">:</td>
                  <td><input type="text" parsley-type="number" name="jumlahSegel" id="jumlahSegel" required="required" autocomplete="off" value="0" onkeyup="berBer()" /></td>
                  <td width="20%">&nbsp;</td>
                  <td width="1%">&nbsp;</td>
                  <td>&nbsp;</td>                  
                </tr>
                <tr>
                  <td width="20%">Segel</td>
                  <td width="1%">:</td>
                  <td><textarea name="segel" id="segel" autocomplete="off" value="0"> </textarea></td>
                  <td width="20%">&nbsp;</td>
                  <td width="1%">&nbsp;</td>
                  <td>&nbsp;</td>                  
                </tr>                                                                                                        
            </tbody>
        </table>
    </div>    
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
function getTara(){
 			  $.get('indikator.php', function(data){
				  if(data >= <?=$rMw[0]?>){
					 $('#tara').val(parseInt(data));
					 $('#indikator').html(parseInt(data));
					 $('#getTimbangan').hide();
					 $('#getTimbanganTwo').hide();
				  };
			  });
};
function getTaraTwo(){
 			  $.get('indikator2.php', function(data){
				  if(data >= <?=$rMw[0]?>){
					 $('#tara').val(parseInt(data));
					 $('#indikator').html(parseInt(data));
					 $('#getTimbangan').hide();
					 $('#getTimbanganTwo').hide();
				  };
			  });
};
function getNetto(){
	potPot();
			
 			  $.get('indikator.php', function(data){
				  $('#brutoAsli').val(parseInt(data));
			potongan = (data * potongan)/100;
			data = parseInt(data) + parseInt(potongan);	  
				$.get('data2.php',{ total : data }, function(bulat){
				  if(data >= <?=$rMw[0]?>){
					  $('#bruto').val(bulat);
					  $('#indikator').html(bulat);
					  netto = parseInt(bulat) - $('#tara').val() ;
					  $('#netto').val(netto); 
					  $('#getTimbangan').hide();
					  $('#getTimbanganTwo').hide();
					  berBer();
				  };
				});  
			  });
};
function getNettoTwo(){
	potPot();
			
 			  $.get('indikator2.php', function(data){
				  $('#brutoAsli').val(parseInt(data));
			potongan = (data * potongan)/100;
			data = parseInt(data) + parseInt(potongan);	
				$.get('data2.php',{ total : data }, function(bulat){  
				  if(data >= <?=$rMw[0]?>){
					  $('#bruto').val(bulat);
					  $('#indikator').html(bulat);
					  netto = parseInt(bulat) - $('#tara').val() ;
					  $('#netto').val(netto); 
					  $('#getTimbangan').hide();
					  $('#getTimbanganTwo').hide();
					  berBer();
				  };
				});  
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
 		

