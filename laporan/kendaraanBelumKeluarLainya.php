<?php
include "config/koneksi.php"; $table = "penimbanganLainya_d"; $kd = "nmSlipLainya"; 
include "config/fungsi_form.php";
include "config/inc.library.php";
		if(isset($_GET['batal'])){
				$qry = mysql_query("UPDATE $table SET complate = 'c' WHERE $kd = '$_GET[batal]'");
				$page = "data";
		}


?>
					<div class="block-flat">
						<div class="header">
							<h3><?=$_SESSION[nmMenu]?> </h3><div class="clear"></div>
						</div>
						<div class="content">
                        <table class="table table-bordered" id="datatable" >
								<thead class="no-border">
    <tr>
<th>No.</th>
<th>Tanggal</th>
<th>No. Kendaraan</th>
<th>No. Seri</th>
<th>Supplier</th>
<th>bruto</th>
<th>Jam Masuk</th>
<?php if($_SESSION[leveluser] == "superVisor" or $_SESSION[leveluser] == "superUser" ){ ?>
<th>aksi</th>
<?php 	} ?>
    </tr>
								</thead>
								<tbody class="no-border-x no-border-y">
									<?php 	
									$tBruto = 0;
									$nomor = 0; if(isset($_GET['hal'])){ $nomor = $_GET['hal'];};
											$qryData = mysql_query("SELECT *, DATE(tanggalMasuk) as tglM, TIME(tanggalMasuk) as jamM FROM $table where complate = 'n' ORDER BY tanggalMasuk asc");
											while ($rowData = mysql_fetch_array($qryData)) { $nomor++;
									?>
  <tr>
<td><?=$nomor?></td>
<td><?=$rowData['tglM']?></td>
<td><?=$rowData['nmKendaraan']?></td>
<td><?=$rowData['nmSlipLainya']?></td>
<td><?=$rowData['nmRelasi']?></td>
<td><?=$rowData['bruto']?></td> <?php $tBruto += $rowData['bruto'];  ?>
<td><?=$rowData['jamM']?></td>
<?php if($_SESSION[leveluser] == "superVisor" or $_SESSION[leveluser] == "superUser" ){ ?>
<td><a href="?batal=<?=$rowData['nmSlipLainya']?>" class="label label-danger">Batal</a></td>
<?php 	} ?>
  </tr>
									<?php 	} ?>
								</tbody>
<tfoot class="no-border">
    <tr>
<th></th>
<th></th>
<th></th>
<th></th>
<th></th>
<th><?=$tBruto?></th>
<th></th>
<?php if($_SESSION[leveluser] == "superVisor" or $_SESSION[leveluser] == "superUser" ){ ?>
<th></th>
<?php 	} ?>
    </tr>
								</tfoot>                                
							</table>
						</div>
					</div>
