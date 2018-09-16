<?php
include "config/koneksi.php"; $table = "penimbanganTBS_d"; $kd = "noSlip"; 
include "config/fungsi_form.php";
include "config/inc.library.php";
	if(!isset($_GET['page'])){$page = 'data';}else{$page = $_GET['page'];} // $page

		if(isset($_GET['noKendaraan'])){			
				$qry = mysql_query("SELECT * FROM $table WHERE nmKendaraan = '$_GET[nmKendaraan]' AND complate = 'n'");
				$jumQ = mysql_num_rows($qry);
				if($jumQ == 0){$page = 'add';}else{$page = "edit";}
		}			
	// ===========================================					
	# jika btn submit ada yang di kirim
	if(isset($_POST['btnSubmit'])){ $btnSubmit = $_POST['btnSubmit'];
		if($btnSubmit == 'add'){
				$qry = mysql_query("INSERT INTO $table SET 
										`noSlip` = '$_POST[noSlip]',
										`noKendaraan` = '$_POST[noKendaraan]',
										`nmSupir` = '$_POST[nmSupir]',
										`kdRelasi` = '$_POST[kdRelasi]',
										`nmRelasi` = '$_POST[nmRelasi]',
										`kdBarang` = '$_POST[kdBarang]',
										`nmBarang` = '$_POST[nmBarang]',
										`nmAsal` = '$_POST[nmAsal]',
										`nmTujuan` = '$_POST[nmTujuan]',
										`bruto` = '$_POST[bruto]',
										`tara` = '$_POST[tara]',
										`netto` = '$_POST[netto]',
										`tanggalMasuk` = NOW(),
										`tanggalKeluar` = '$_POST[tanggalKeluar]',
										`noSlipTambang` = '$_POST[noSlip]',
										`beratTambang` = '$_POST[beratTambang]',
										`complate` = 'n',
										`userMasuk` = '$_SESSION[namalengkap]',
										`UserKeluar` = ''
									");
				if($qry){echo '<div class="alert alert-success alert-white rounded">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<div class="icon"><i class="fa fa-check"></i></div>
									<strong>Penimbangan Masuk!</strong> has been saved successfully!
								 </div>';}				
		}
		// ===========================================
		if($btnSubmit == 'edit'){
				$qry = mysql_query("UPDATE $table SET 
										`noSlip` = '$_POST[noSlip]',
										`noKendaraan` = '$_POST[noKendaraan]',
										`nmSupir` = '$_POST[nmSupir]',
										`kdRelasi` = '$_POST[kdRelasi]',
										`nmRelasi` = '$_POST[nmRelasi]',
										`kdBarang` = '$_POST[kdBarang]',
										`nmBarang` = '$_POST[nmBarang]',
										`nmAsal` = '$_POST[nmAsal]',
										`nmTujuan` = '$_POST[nmTujuan]',
										`bruto` = '$_POST[bruto]',
										`tara` = '$_POST[tara]',
										`netto` = '$_POST[netto]',
										`tanggalKeluar` = NOW(),
										`noSlipTambang` = '$_POST[noSlipTambang]',
										`beratTambang` = '$_POST[beratTambang]',
										`complate` = 'y',
										`UserKeluar` = '$_SESSION[namalengkap]'

									WHERE $kd = '$_POST[$kd]'
									");
				if($qry){ ?>
							<script>
									window.open('laporan/strukTambang.php?noSlip=<?=$_POST[$kd]?>');	
							</script>	 
						<?php echo '<div class="alert alert-success alert-white rounded">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<div class="icon"><i class="fa fa-check"></i></div>
									<strong>Penimbangan Keluar!</strong> has been saved successfully!
								 </div>';}
		}
		// ===========================================
	}
	//========================================
	
#jika page add
if($page == 'add'){
	//$qryAdd = mysql_query("SELECT * FROM kendaraan WHERE noKendaraan = '$_GET[noKendaraan]'"); $rowAdd = mysql_fetch_array($qryAdd); ?>
<div class="block-flat">
						<div class="header">
							<h3>Masuk <?=$_SESSION[nmMenu]?></h3>
						</div>
						<div class="content">
<form class="form-horizontal" onsubmit="return confirm('Lanjutkan Simpan?')" action="?page=data" method="post" style="border-radius: 0px;" parsley-validate novalidate>
<table class="no-border">
<tbody class="no-border-x no-border-y">
	<tr>
	  <td width="20%"><b>No Slip </b></td>
	  <td width="1%"><b>:</b></td>
	  <td width="79%"><input name="noSlip" id="noSlip" value="<?=buatKodeFaktur("penimbanganTambang","T");?>" size="11" maxlength="11" readonly="readonly"/>
      </td></tr>
	<tr>
      <td><b>No. Kendaraan</b></td>
	  <td><b>:</b></td>
	  <td><input name="noKendaraan" id="noKendaraan" value="<?=$rowKendaraan['noKendaraan']?>" size="9" maxlength="9" readonly="readonly" /> 
      <b>Relasi : </b> <input name="nmRelasi" id="nmRalasi" value="<?=$rowKendaraan['nmRelasi']?>" size="9" maxlength="9" readonly="readonly" /></td>
    </tr>
	<tr>
      <td><b>Barang</b></td>
	  <td><b>:</b></td>
	  <td> <?=inputFormSelectBiasa("nmBarang","Barang","tb_barang","Raw Coal")?>
      </td>
    </tr>
	<tr>
      <td><b>Supir</b></td>
	  <td><b>:</b></td>
	  <td>
                  <select class="select2" name="nmSupir" required>
                  <option value="">--Pilih Supir--</option>
                  <?php 
				  $qryF = mysql_query("select * from tb_supir order by nmSupir asc"); 
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
	  <td><b>Asal / Tujuan </b></td>
	  <td><b>:</b></td>
	  <td><b>
	    Asal :<?=inputFormSelectBiasa("nmAsal","Asal","tB_asalTujuan")?>
        Tujuan :<?=inputFormSelectBiasa("nmTujuan","Tujuan","tB_asalTujuan")?>
      </b></td>
    </tr>    
	<tr><td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
    </tr>
	<tr>
	  <td><b>Penimbangan</b></td>
	  <td><b>:</b></td>
	  <td><b>
	    <b>Tara </b><input name="tara" class="angkaC" id="tara" size="14" maxlength="20" readonly="readonly" required="required" />
<button name="getTimbangan" onclick="getTara()" id="getTimbangan" class="btn btn-warning btn-sm" type="button" style="cursor:pointer;">Gett</button>
      </b></td>
    </tr>
	<tr>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
    </tr>
	<tr>
	  <td><a href="?page=data" class="btn btn-default">Cancel</a><button name="btnSubmit" type="submit" class="btn btn-primary" style="cursor:pointer;" value="add" >Simpan</button></td>
	  <td>&nbsp;</td>
	  <td></td>
    </tr>
    
</tbody>   
</table>
</form>
</div>
</div>
<?php
 }
// ==================================== 
#jika page edit
if($page == 'edit'){	
//$qryEdit = mysql_query("SELECT * FROM $table WHERE $kd = '$_GET[kd]'"); 
$rowEdit = mysql_fetch_array($qry);
?>				    
<div class="block-flat"> 
						<div class="header">
							<h3>Keluar <?=$_SESSION[nmMenu]?></h3>
						</div>
						<div class="content"> 
<form class="form-horizontal" onsubmit="return confirm('Lanjutkan Simpan?')" action="?page=data" method="post" style="border-radius: 0px;" parsley-validate novalidate> 
<table class="no-border">
<tbody class="no-border-x no-border-y">

	<tr>
	  <td width="20%"><b>No Slip </b></td>
	  <td width="1%"><b>:</b></td>
	  <td width="79%"><input name="noSlip" id="noSlip" value="<?=$rowEdit['noSlip']?>" size="11" maxlength="11" readonly="readonly"/>
      </td></tr>
	<tr>
      <td><b>No. Kendaraan</b></td>
	  <td><b>:</b></td>
	  <td><input name="noKendaraan" id="noKendaraan" value="<?=$rowEdit['noKendaraan']?>" size="9" maxlength="9" readonly="readonly" /> 
      <b>Relasi : </b> <input name="nmRelasi" id="nmRalasi" value="<?=$rowEdit['nmRelasi']?>" size="9" maxlength="9" readonly="readonly" /></td>
    </tr>
	<tr>
      <td><b>Barang</b></td>
	  <td><b>:</b></td>
	  <td><input name="nmBarang" id="nmBarang" value="<?=$rowEdit['nmBarang']?>" size="30" maxlength="30" readonly="readonly"/> 
      </td>
    </tr>
	<tr>
      <td><b>Supir</b></td>
	  <td><b>:</b></td>
	  <td><input name="nmSupir" id="nmSupir" value="<?=$rowEdit['nmSupir']?>" size="30" maxlength="100" readonly="readonly" /></td>
    </tr>
	<tr>
	  <td><b>Asal / Tujuan </b></td>
	  <td><b>:</b></td>
	  <td><b>
	    Asal :<?=inputFormSelectBiasa("nmAsal","Asal","tB_asalTujuan",$rowEdit['nmAsal'])?>
        Tujuan :<?=inputFormSelectBiasa("nmTujuan","Tujuan","tB_asalTujuan",$rowEdit['nmTujuan'])?>
      </b></td>
    </tr>    
	<tr><td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
    </tr>
	<tr>
	  <td><b>Penimbangan</b></td>
	  <td><b>:</b></td>
	  <td><b>
	    <b>Bruto </b><input name="bruto" class="angkaC" id="bruto" size="14" maxlength="20" readonly="readonly" required="required" />
<button onclick="getBruto()" name="getTimbangan" id="getTimbangan" class="btn btn-warning btn-sm" type="button">Get</button>
		<b>Tara </b><input name="tara" class="angkaC" id="tara" value="<?=$rowEdit['tara']?>" size="14" maxlength="20" readonly="readonly" required="required" />
        <b>Netto </b><input name="netto" class="angkaC" id="netto" size="14" maxlength="20" readonly="readonly" required="required" />
      </b></td>
    </tr>
	<tr>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
    </tr>
	<tr>
	  <td><a href="?page=data" class="btn btn-default">Cancel</a><button name="btnSubmit" type="submit" class="btn btn-primary" style="cursor:pointer;" value="edit" >Simpan</button></td>
	  <td>&nbsp;</td>
	  <td></td>
    </tr>
    
</tbody>   
</table>
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
    <div class="form-group"><?php $label = "Nomor Kendaraan"; $field = "noKendaraan"; $value = ""; ?>
      <label class="col-sm-3 control-label"><?=$label?></label>
      <div class="col-sm-3">
        <input type="text" class="form-control" id="<?=$field?>" name="<?=$field?>" placeholder="<?=$label?>" value="<?=$value?>" required="required" autocomplete="off">
      </div><div class="col-sm-3">  
        <button name="btnProses" type="submit" class="btn btn-primary" style="cursor:pointer;" value="Proses" >Proses</button>
      </div>
    </div>  
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
              
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
function getTara(){
 			  $.get('indikator.php', function(data){
				  if(data >= <?=$rMw[0]?>){
					  $('#tara').val(parseInt(data));
					  $('#getTimbangan').hide();
				  };
			  });
};
function getBruto(){
 			  $.get('indikator.php', function(data){
				  if(data >= <?=$rMw[0]?>){
					  $('#bruto').val(parseInt(data));
					  $('#netto').val(parseInt(data) - $('#tara').val()); 
					  $('#getTimbangan').hide();
				  };
			  });
};
</script> 
 		

