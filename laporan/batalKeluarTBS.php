<?php
include "config/koneksi.php"; $table = "penimbanganTBS_d"; $kd = "noSlipTBS"; 
include "config/fungsi_form.php";
include "config/inc.library.php";


?>
					<div class="block-flat">
						<div class="header">
							<h3><?=$_SESSION[nmMenu]?>
        
                                </h3><div class="clear"></div>
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
    </tr>
								</thead>
								<tbody class="no-border-x no-border-y">
									<?php 	$nomor = 0; if(isset($_GET['hal'])){ $nomor = $_GET['hal'];};
											$qryData = mysql_query("SELECT *, DATE(tanggalMasuk) as tglM, TIME(tanggalMasuk) as jamM FROM $table where complate = 'c' ORDER BY tanggalMasuk asc");
											while ($rowData = mysql_fetch_array($qryData)) { $nomor++;
									?>
  <tr>
<td><?=$nomor?></td>
<td><?=$rowData['tglM']?></td>
<td><?=$rowData['nmKendaraan']?></td>
<td><?=$rowData['nmSlipTBS']?></td>
<td><?=$rowData['nmRelasi']?></td>
<td><?=$rowData['bruto']?></td>
<td><?=$rowData['jamM']?></td>
  </tr>
									<?php 	} ?>
								</tbody>
							</table>
						</div>
					</div>
