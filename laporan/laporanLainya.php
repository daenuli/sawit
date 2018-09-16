<?php include "config/fungsi_form.php"; ?>
						  	<div class="block-flat">
								  <div class="header">							
									<h3><?=$_SESSION[nmMenu]?></h3>
								  </div>
								  <div class="content">
									 <form class="form-horizontal" style="border-radius: 0px;"> <?php
    inputFormDate("awal","Awal");
	inputFormDate("akhir","Akhir"); ?>
    								<div class="form-group">
                                        <label class="col-sm-3 control-label">Select2</label>
                                    <div class="col-sm-2">
                                      <select class="select2" name="relasi" id="relasi">
                                      <option value="">-- Relasi --</option>
                                      <?PHP $qrySupplier = mysql_query("select distinct nmRelasi from penimbanganLainya_d"); 
										while($r = mysql_fetch_array($qrySupplier)){ ?>
                                           <option value="<?=$r['nmRelasi']?>"><?=$r['nmRelasi']?></option>
                                       <?php } ?>    
                                      </select>
                                    </div>
                                    </div>    
    
               <div class="form-group">
              <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-primary" onclick="kirimLaporanSleksi('cetak_laporan_lainnya.php?laporan=tanggal')">Harian</button>
                <button type="submit" class="btn btn-primary" onclick="kirimLaporanSleksi('cetak_laporan_lainnya.php?laporan=kendaraan')">Kendaraan</button>
                <button type="submit" class="btn btn-primary" onclick="kirimLaporanSleksi('cetak_laporan_lainnya.php?laporan=barang')">Material</button>
                <button type="submit" class="btn btn-primary" onclick="kirimLaporanSleksi('cetak_laporan_lainnya.php?laporan=relasi')">Supplier</button>               
              </div>
              </div>
						   </form>
								</div>
							  </div>
<script>
	function kirimLaporanSleksi(lokasi){
		var awal = $('#awal').val();
		var akhir =$('#akhir').val();
		var relasi =$('#relasi').val();
		if(awal !== "" && akhir !== ""){
		window.open('laporanEx/'+lokasi+'&awal='+awal+'&akhir='+akhir+'&relasi='+relasi);
		//window.location.href='laporan/'+lokasi+'.php?awal='+awal+'&akhir='+akhir;
		}else{alert('Isi Tanggal Awal dan Akhir')}
	};	
	
	function kirimLaporan(lokasi){
		var awal = $('#awal').val();
		var akhir =$('#akhir').val();
		if(awal !== "" && akhir !== ""){
		window.open('laporanEx/'+lokasi+'&awal='+awal+'&akhir='+akhir);
		//window.location.href='laporan/'+lokasi+'.php?awal='+awal+'&akhir='+akhir;
		}else{alert('Isi Tanggal Awal dan Akhir')}
	};	
</script>	