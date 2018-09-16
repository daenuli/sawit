<?php
include "config/koneksi.php"; $table = "penimbanganTBS_d"; $kd = "nmSlipTBS"; 
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
			$qryRelasi = mysql_query("select potongan from tb_relasi where nmRelasi = '$_POST[nmRelasi]'");
			$rowRelasi = mysql_fetch_assoc($qryRelasi);
			$brutoAsli = $_POST['brutoAsli'];
				$qry = mysql_query("INSERT INTO $table SET 
										nmSlipTBS = '$_POST[nmSlipTBS]',
										nmKendaraan = '$_POST[nmKendaraan]',
										nmSupir = '$_POST[nmSupir]',
										nmRelasi = '$_POST[nmRelasi]',
										nmBarang = '$_POST[nmBarang]',
										bruto = '$_POST[bruto]',
										brutoAsli = '$brutoAsli',
										tanggalMasuk = NOW(),
										userMasuk = '$_SESSION[namalengkap]',
										complate = 'n'
									");
				if($qry){echo "<meta http-equiv='refresh' content='0; url=?page=data'>";}				
		}
		// ===========================================
		if($btnSubmit == 'edit'){
			$potPers = $_POST['potWajib'] + $_POST['potSampah'] + $_POST['potTangkai'] + $_POST['potPasir'] + $_POST['potAir'] + $_POST['potMutu'];
				$qry = mysql_query("UPDATE $table SET 
										nmSlipTBS = '$_POST[nmSlipTBS]',
										nmKendaraan = '$_POST[nmKendaraan]',
										nmSupir = '$_POST[nmSupir]',
										nmRelasi = '$_POST[nmRelasi]',
										nmBarang = '$_POST[nmBarang]',
										bruto = '$_POST[bruto]',
										tara = '$_POST[tara]',
										netto = '$_POST[netto]',
										tanggalKeluar = NOW(),
										userKeluar = '$_SESSION[namalengkap]',
										complate = 'y',
										keterangan = '$_POST[keterangan]',
										potongan = '$_POST[potongan]',
										potonganPersen = '$potPers',
										potWajib = '$_POST[potWajib]',
										potSampah = '$_POST[potSampah]',
										potTangkai = '$_POST[potTangkai]',
										potPasir = '$_POST[potPasir]',
										potAir = '$_POST[potAir]',
										potMutu = '$_POST[potMutu]',
										potMentah = '$_POST[potMentah]',
										potBusuk = '$_POST[potBusuk]',
										potTankos = '$_POST[potTankos]',
										potLainya = '$_POST[potLainya]',
										potBrondol = '$_POST[potBrondol]',
										potDura = '$_POST[potDura]',
										jumlahTandan = '$_POST[jumlahTandan]',
										beratTandan = '$_POST[beratTandan]',
										beratBersih = '$_POST[beratBersih]'

									WHERE $kd = '$_POST[$kd]'
									");
				if($qry){ ?><meta http-equiv='refresh' content='0; url=laporanEx/slipTBS.php?noSlip=<?=$_POST[$kd]?>'> <?php }
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
                  <td><input type="text" name="nmSlipTBS" id="nmSlipTBS" required="required" autocomplete="off" value="<?=buatKodeFaktur("penimbanganTBS_d","")?>" readonly="readonly" /></td>
                </tr>
                <tr>
                    <td>No. Kendaraan</td>
                    <td>:</td>
                    <td><input type="text" name="nmKendaraan" id="nmKendaraan" required="required" autocomplete="off" value="<?=$_GET['nmKendaraan']?>" /></td>
                </tr>
                <tr>
                    <td>Produk</td>
                    <td>:</td>
                    <td><input type="text" name="nmBarang" id="nmBarang" required="required" autocomplete="off" /></td>
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
                    <td>Bruto</td>
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
                  <td><input type="text" name="nmSlipTBS" id="nmSlipTBS" required="required" autocomplete="off" value="<?=$rowEdit['nmSlipTBS']?>" readonly="readonly" /></td>
                </tr>
                <tr>
                    <td>No. Kendaraan</td>
                    <td>:</td>
                    <td><input type="text" name="nmKendaraan" id="nmKendaraan" required="required" autocomplete="off" value="<?=$rowEdit['nmKendaraan']?>" readonly="readonly" /></td>
                </tr>
                <tr>
                    <td>Produk</td>
                    <td>:</td>
                    <td><input type="text" name="nmBarang" id="nmBarang" required="required" autocomplete="off" value="<?=$rowEdit['nmBarang']?>" readonly="readonly" /></td>
                </tr>
                <tr>
                    <td>Supplier</td>
                    <td>:</td>
                    <td><input type="text" name="nmRelasi" id="nmRelasi" required="required" autocomplete="off" value="<?=$rowEdit['nmRelasi']?>" readonly="readonly" /></td>
                </tr>
                <tr>
                    <td>Bruto</td>
                    <td>:</td>
                    <td><input type="text" name="bruto" id="bruto" required="required" autocomplete="off" value="<?=$rowEdit['bruto']?>" readonly="readonly" />
                    	<input type="hidden" name="brutoAsli" id="brutoAsli" required="required" autocomplete="off" value="<?=$rowEdit['brutoAsli']?>" readonly="readonly" /></td>
                </tr>
                <tr>
                    <td>Tara</td>
                    <td>:</td>
                    <td><input type="text" name="tara" id="tara" required="required" autocomplete="off" value="<?=$rowEdit['tara']?>" readonly="readonly" />
                    <button name="getTimbangan" onclick="getNetto()" id="getTimbangan" class="btn btn-warning btn-sm" type="button" style="cursor:pointer;">Timbangan 1</button>
                    <button name="getTimbanganTwo" onclick="getNettoTwo()" id="getTimbanganTwo" class="btn btn-warning btn-sm" type="button" style="cursor:pointer;">Timbangan 2</button></td>
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
                    <td><input type="potongan" name="potongan" id="potongan" required="required" autocomplete="off" value="" readonly="readonly" /></td>
                </tr> 
                <tr>
                    <td>Berat Bersih</td>
                    <td>:</td>
                    <td><input type="beratBersih" name="beratBersih" id="beratBersih" required="required" autocomplete="off" value="" readonly="readonly" /></td>
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
    <div class="col-sm-6 col-md-6" id="serbaPotongan">
        <table class="no-border">
            <tbody class="no-border-x no-border-y">
                <tr>
                  <td colspan="3"><strong>Potongan</strong></td>
                  <td colspan="3"></td>                
                </tr>            
                <tr>
                  <td width="20%">Wajib %</td>
                  <td width="1%">:</td>
                  <td><input type="text" parsley-type="number" name="potWajib" id="potWajib" required="required" autocomplete="off" value="0" onkeyup="berBer()" /></td>
                  <td width="20%">Sampah %</td>
                  <td width="1%">:</td>
                  <td><input type="text" parsley-type="number" name="potSampah" id="potSampah" required="required" autocomplete="off" value="0" onkeyup="berBer()" /></td>                  
                </tr>
                <tr>
                  <td width="20%">Tangkai %</td>
                  <td width="1%">:</td>
                  <td><input type="text" parsley-type="number" name="potTangkai" id="potTangkai" required="required" autocomplete="off" value="0" onkeyup="berBer()" /></td>
                  <td width="20%">Pasir %</td>
                  <td width="1%">:</td>
                  <td><input type="text" parsley-type="number" name="potPasir" id="potPasir" required="required" autocomplete="off" value="0" onkeyup="berBer()" /></td>                  
                </tr>
                <tr>
                  <td width="20%">Air %</td>
                  <td width="1%">:</td>
                  <td><input type="text" parsley-type="number" name="potAir" id="potAir" required="required" autocomplete="off" value="0" onkeyup="berBer()" /></td>
                  <td width="20%">Mutu %</td>
                  <td width="1%">:</td>
                  <td><input type="text" parsley-type="number" name="potMutu" id="potMutu" required="required" autocomplete="off" value="0" onkeyup="berBer()" /></td>                  
                </tr>
                <tr>
                  <td colspan="6"><strong>Pulangan</strong></td>
                </tr>                
                <tr>
                  <td width="20%">Mentah (Kg)</td>
                  <td width="1%">:</td>
                  <td><input type="text" parsley-type="number" name="potMentah" id="potMentah" required="required" autocomplete="off" value="0" /></td>
                  <td width="20%">Busuk (Kg)</td>
                  <td width="1%">:</td>
                  <td><input type="text" parsley-type="number" name="potBusuk" id="potBusuk" required="required" autocomplete="off" value="0" /></td>                  
                </tr>
                <tr>
                  <td width="20%">Tankos (Kg)</td>
                  <td width="1%">:</td>
                  <td><input type="text" parsley-type="number" name="potTankos" id="potTankos" required="required" autocomplete="off" value="0" /></td>
                  <td width="20%">Lainya (Kg)</td>
                  <td width="1%">:</td>
                  <td><input type="text" parsley-type="number" name="potLainya" id="potLainya" required="required" autocomplete="off" value="0" /></td>                  
                </tr>
                <tr>
                  <td width="20%">Brondol %</td>
                  <td width="1%">:</td>
                  <td><input type="text" parsley-type="number" name="potBrondol" id="potBrondol" required="required" autocomplete="off" value="0" /></td>
                  <td width="20%">Dura %</td>
                  <td width="1%">:</td>
                  <td><input type="text" parsley-type="number" name="potDura" id="potDura" required="required" autocomplete="off" value="0" /></td>                  
                </tr>
                 <tr>
                  <td colspan="6">&nbsp; </td>
                </tr>  
                <tr>
                  <td width="20%">&nbsp;</td>
                  <td width="1%">:</td>
                  <td>&nbsp;</td>
                  <td width="20%">Berat Tandan</td>
                  <td width="1%">:</td>
                  <td><input type="text" parsley-type="number" name="beratTandan" id="beratTandan" required="required" autocomplete="off" value="0" onkeyup="tandan()" /></td>                  
                </tr>   
                <tr>
                  <td width="20%">&nbsp;</td>
                  <td width="1%">:</td>
                  <td>&nbsp;</td>
                  <td width="20%">Jumlah Tandan</td>
                  <td width="1%">:</td>
                  <td><input type="text" parsley-type="number" name="jumlahTandan" id="jumlahTandan" required="required" autocomplete="off" value="0" /></td>                  
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
function getBruto(){
	potPot();
 			  $.get('indikator.php', function(data){
				  $('#brutoAsli').val(data);
				  potongan = (data * potongan)/100
				  data = parseInt(data - potongan);
				  		$.get('data1.php',{ total : data }, function(bulat){
						  if(data >= <?=$rMw[0]?>){
							  $('#indikator').html(bulat);
							 $('#bruto').val(bulat);
							 $('#getTimbangan').hide();
							 $('#getTimbanganTwo').hide();
						  };
						});
			  });
};
function getNetto(){
 			  $.get('indikator.php', function(data){
				  if(data >= <?=$rMw[0]?>){
					  $('#tara').val(parseInt(data));
					  $('#indikator').html(parseInt(data));
					  netto = $('#bruto').val() - parseInt(data);
					  $('#netto').val(netto); 
					  $('#getTimbangan').hide();
					  $('#getTimbanganTwo').hide();
					  berBer();
				  };
			  });
};

function getBrutoTwo(){
	potPot();
 			  $.get('indikator2.php', function(data){
				  $('#brutoAsli').val(data);
				  potongan = (data * potongan)/100
				  data = parseInt(data - potongan);
				  		$.get('data1.php',{ total : data }, function(bulat){
						  if(data >= <?=$rMw[0]?>){
							 $('#bruto').val(bulat);
							 $('#indikator').html(parseInt(bulat));
							 $('#getTimbangan').hide();
							 $('#getTimbanganTwo').hide();
						  };
						});  
			  });
};
function getNettoTwo(){
 			  $.get('indikator2.php', function(data){
				  if(data >= <?=$rMw[0]?>){
					  $('#tara').val(parseInt(data));
					  $('#indikator').html(parseInt(data));
					  netto = $('#bruto').val() - parseInt(data);
					  $('#netto').val(netto); 
					  $('#getTimbangan').hide();
					  $('#getTimbanganTwo').hide();
					  berBer();
				  };
			  });
};

function berBer(){
		netto = $('#netto').val();	
		total = Math.round((($('#potWajib').val() * netto)/100) + 
		(($('#potSampah').val() * netto)/100) + 
		(($('#potTangkai').val() * netto)/100) + 
		(($('#potPasir ').val() * netto)/100) + 
		(($('#potAir').val() * netto)/100) + 
		(($('#potMutu').val() * netto)/100));
		$('#potongan').val(total);
		beratBersih = netto - total;
		$('#beratBersih').val(beratBersih)
};
function tandan(){
		$('#jumlahTandan').val(Math.round($('#beratBersih').val()/$('#beratTandan').val()));
};
</script> 
 		

