<?php include "config/fungsi_form.php"; ?>

						  	<div class="block-flat">
								  <div class="header">							
									<h3><?=$_SESSION[nmMenu]?></h3>
								  </div>
								  <div class="content">
									 <form class="form-horizontal" action="" style="border-radius: 0px;">
              <div class="form-group"><?php $label = "No. Slip"; $field = "noSlip"; $value = ""; ?>
                <label class="col-sm-3 control-label"><?=$label?></label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="<?=$field?>" name="<?=$field?>" placeholder="<?=$label?>" value="<?=$value?>" required="required" autocomplete="off">
                </div><div class="col-sm-3">  
                  <button name="btnProses" type="submit" onclick="kirimLaporanSleksi('slipCPO.php?')" class="btn btn-primary" style="cursor:pointer;" value="Proses" >Proses</button>
                </div>
              </div>  
            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-9">
                        
              </div>
            </div>  
                                    </form>
                                    </div>
                                </div>
<script>
	function kirimLaporanSleksi(lokasi){
		var noSlip = $('#noSlip').val();
		if(noSlip !== ""){
		window.open('laporanEx/'+lokasi+'noSlip='+noSlip);
		//window.location.href='laporan/'+lokasi+'.php?awal='+awal+'&akhir='+akhir;
		}else{alert('Isi Tanggal Awal dan Akhir')}
	};	
</script>	