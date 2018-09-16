<?PHP 
include_once "config/koneksi.php";
include "config/fungsi_form.php";
include "config/inc.library.php";
if(isset($_POST['btnSubmit'])){
  if($_POST['btnSubmit'] == 'addTBS'){
    $_GET['page'] = 'listTBS';
     $qryTBS = mysql_query("insert into penimbangantbs_d set
          nmSlipTBS = '$_POST[nmSlipTBS]',
          nmKendaraan = '$_POST[nmKendaraan]',
          nmSupir = '$_POST[nmSupir]',
          nmRelasi = '$_POST[nmRelasi]',
          nmBarang = '$_POST[nmBarang]',
          bruto = '$_POST[bruto]',
          brutoAsli = '$_POST[brutoAsli]',
          tara = '$_POST[tara]',
          netto = '$_POST[netto]',
          tanggalMasuk = '$_POST[tanggalMasuk]',
          tanggalKeluar = '$_POST[tanggalKeluar]',
          userMasuk = '$_POST[userMasuk]',
          userKeluar = '$_POST[userKeluar]',
          keterangan = '$_POST[keterangan]',
          potongan = '$_POST[potongan]',
          potonganPersen = '$_POST[potonganPersen]',
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
          beratBersih = '$_POST[beratBersih]',
          complate = 'y'");
     if($qryTBS){ $message[] = "TERSIMPAN"; }
  }   
  if($_POST['btnSubmit'] == 'editTBS'){
    $_GET['page'] = 'listTBS';
     $qryTBS = mysql_query("update penimbangantbs_d set
          
         nmSlipTBS = '$_POST[nmSlipTBS]',
										nmKendaraan = '$_POST[nmKendaraan]',
										nmSupir = '$_POST[nmSupir]',
										nmRelasi = '$_POST[nmRelasi]',
										nmBarang = '$_POST[nmBarang]',
										bruto = '$_POST[bruto]',
										
										tara = '$_POST[tara]',
										netto = '$_POST[netto]',
										
										
										
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
		  
		  
          where nmSlipTBS = '$_POST[nmSlipTBS]'");
     if($qryTBS){ $message[] = "BERUBAH"; }
  } 
  if($_POST['btnSubmit'] == 'addCPO'){
    $_GET['page'] = 'listCPO';
     $qryCPO = mysql_query("insert into penimbanganCPO_d set
          nmSlipCPO = '$_POST[nmSlipCPO]',
          nmKendaraan = '$_POST[nmKendaraan]',
          nmSupir = '$_POST[nmSupir]',
          nmRelasi = '$_POST[nmRelasi]',
          nmDO = '$_POST[nmDO]',
          bruto = '$_POST[bruto]',
          brutoAsli = '$_POST[brutoAsli]',
          tara = '$_POST[tara]',
          netto = '$_POST[netto]',
          tanggalMasuk = '$_POST[tanggalMasuk]',
          tanggalKeluar = '$_POST[tanggalKeluar]',
          userMasuk = '$_POST[userMasuk]',
          userKeluar = '$_POST[userKeluar]',
          keterangan = '$_POST[keterangan]',
          potongan = '$_POST[potongan]',
          potFFA = '$_POST[potFFA]',
          potAir = '$_POST[potAir]',
          potKotoran = '$_POST[potKotoran]',
          jumlahSegel = '$_POST[jumlahSegel]',
          segel = '$_POST[segel]',
          beratBersih = '$_POST[beratBersih]',
          complate = 'y'");
     if($qryCPO){ $message[] = "TERSIMPAN"; }
  }   
  if($_POST['btnSubmit'] == 'editCPO'){
    $_GET['page'] = 'listCPO';
     $qryCPO = mysql_query("update penimbanganCPO_d set
 										nmSlipCPO = '$_POST[nmSlipCPO]',
										nmKendaraan = '$_POST[nmKendaraan]',
										nmSupir = '$_POST[nmSupir]',
										nmRelasi = '$_POST[nmRelasi]',
										nmDO = '$_POST[nmDO]',
										bruto = '$_POST[bruto]',
										
										tara = '$_POST[tara]',
										netto = '$_POST[netto]',
										
										
										
										keterangan = '$_POST[keterangan]',
										potongan = '$_POST[potongan]',
										potFFA = '$_POST[potFFA]',
										potAir = '$_POST[potAir]',
										potKotoran = '$_POST[potKotoran]',
										jumlahSegel = '$_POST[jumlahSegel]',
										segel = '$_POST[segel]',
										beratBersih = '$_POST[beratBersih]'
          where nmSlipCPO = '$_POST[nmSlipCPO]'");
     if($qryCPO){ $message[] = "BERUBAH"; }
  }  
  if($_POST['btnSubmit'] == 'addLainya'){
    $_GET['page'] = 'listLainya';
     $qryLainya = mysql_query("insert into penimbanganLainya_d set
          nmSlipLainya = '$_POST[nmSlipLainya]',
          nmKendaraan = '$_POST[nmKendaraan]',
          nmRelasi = '$_POST[nmRelasi]',
          kdMaterial = '$_POST[kdMaterial]',
          nmMaterial = '$_POST[nmMaterial]',
          bruto = '$_POST[bruto]',
          tara = '$_POST[tara]',
          netto = '$_POST[netto]',
          tanggalMasuk = '$_POST[tanggalMasuk]',
          tanggalKeluar = '$_POST[tanggalKeluar]',
          userMasuk = '$_POST[userMasuk]',
          userKeluar = '$_POST[userKeluar]',
          keterangan = '$_POST[keterangan]',
          complate = 'y'");
     if($qryLainya){ $message[] = "TERSIMPAN"; }
  }   
  if($_POST['btnSubmit'] == 'editLainya'){
    $_GET['page'] = 'listLainya';
     $qryLainya = mysql_query("update penimbanganLainya_d set
          nmSlipLainya = '$_POST[nmSlipLainya]',
          nmKendaraan = '$_POST[nmKendaraan]',
          nmRelasi = '$_POST[nmRelasi]',
          kdMaterial = '$_POST[kdMaterial]',
          nmMaterial = '$_POST[nmMaterial]',
          bruto = '$_POST[bruto]',
          tara = '$_POST[tara]',
          netto = '$_POST[netto]',
          
          
          
          
          keterangan = '$_POST[keterangan]'
          
          where nmSlipLainya = '$_POST[nmSlipLainya]'");
     if($qryLainya){ $message[] = "BERUBAH"; }     
  }         
}
if(isset($_GET['delete'])){
  if($_GET['delete'] == 'TBS'){
    $_GET['page'] = 'listTBS';
      $qryTBS = mysql_query("delete from penimbanganTBS_d where nmSlipTBS = '$_GET[kd]'");  
      if($qryTBS){ $message[] = "TERHAPUS"; }  
   }
  if($_GET['delete'] == 'CPO'){
    $_GET['page'] = 'listCPO';
      $qryCPO = mysql_query("delete from penimbanganCPO_d where nmSlipCPO = '$_GET[kd]'");  
      if($qryCPO){ $message[] = "TERHAPUS"; }       
   }
  if($_GET['delete'] == 'Lainya'){
    $_GET['page'] = 'listLainya';
      $qryLainya = mysql_query("delete from penimbanganLainya_d where nmSlipLainya = '$_GET[kd]'");  
      if($qryLainya){ $message[] = "TERHAPUS"; }       
   }      
}    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.png">

    <title>Clean Zone</title>
    <!-- Bootstrap core CSS -->
    <link href="js/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="js/jquery.gritter/css/jquery.gritter.css" />

  <link rel="stylesheet" href="fonts/font-awesome-4/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->
  <link rel="stylesheet" type="text/css" href="js/jquery.nanoscroller/nanoscroller.css" />
  <link rel="stylesheet" type="text/css" href="js/jquery.easypiechart/jquery.easy-pie-chart.css" />
  <link rel="stylesheet" type="text/css" href="js/bootstrap.switch/bootstrap-switch.css" />
  <link rel="stylesheet" type="text/css" href="js/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css" />
  <link rel="stylesheet" type="text/css" href="js/jquery.select2/select2.css" />
  <link rel="stylesheet" type="text/css" href="js/bootstrap.slider/css/slider.css" />
    					<link rel="stylesheet" type="text/css" href="js/jquery.datatables/bootstrap-adapter/css/datatables.css" />
						<link rel="stylesheet" type="text/css" href="js/jquery.datatables/media/css/TableTools.css" />
  <link href="css/style.css" rel="stylesheet" />
  
  </head>

  <body>


  <!-- Fixed navbar -->
<?php include_once "uMainMenu.php"; ?>  
  <div id="cl-wrapper">
<?php include_once "uSideBar.php"; ?> 

    <div class="container-fluid" id="pcont">
    <div class="cl-mcont">
<?php
    if (! count($message)==0 ){
            echo "<div class='mssgBox'>";
      echo '<div class="alert alert-success alert-white rounded">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <div class="icon"><i class="fa fa-check"></i></div>
                  <strong>';
        $Num=0;
        foreach ($message as $indeks=>$pesan_tampil) { 
        $Num++;
          echo "$pesan_tampil"; 
        } 
      echo '!</strong> has been saved successfully!
                 </div>'; 
    } 
?>        
    
      <div class="row">
        <div class="col-md-12">
          <div class="block-flat">
<?php if(isset($_GET['page'])){ ?>
  <?php if($_GET['page'] == 'listTBS'){ ?> <!-- ======================================================================================= -->
                  
            <div class="header">              
              <h3>LIST TBS</h3>
            </div>
            <div class="content">
              <div class="table-responsive">
                <table class="table table-bordered" id="datatable" >
                  <thead>
                    <tr>
                      <th>Slip TBS</th>
                      <th>Kendaraan</th>
                      <th>Relasi</th>
                      <th>Barang</th>
                                            <th>Bruto</th>
                      <th>Bruto Asli</th>
                      <th>Tara</th>
                      <th>Netto</th>
                      
                      <th>Potongan</th>
                      <th>Berat Terima</th>
                      <th>Tandan</th>
                      <th>Berat Tandan</th>
                                            <th>Tanggal Masuk</th>
                      <th>Tanggal Keluar</th>
                      <th width="100px">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                                    <?php
                  $qryData = mysql_query("select * from penimbanganTBS_d where complate = 'y'");
                  while($row = mysql_fetch_array($qryData)){
                  ?>
                    <tr class="odd gradeX">
                      <td><?=$row['nmSlipTBS']?></td>
                      <td><?=$row['nmKendaraan']?></td>
                      <td><?=$row['nmRelasi']?></td>
                      <td><?=$row['nmBarang']?></td>
                      <td><?=$row['bruto']?></td>
                      <td><?=$row['brutoAsli']?></td>
                      <td><?=$row['tara']?></td>
                      <td><?=$row['netto']?></td>
                      
                      <td><?=$row['potongan']?></td>
                      <td><?=$row['beratBersih']?></td>
                      <td><?=$row['jumlahTandan']?></td>
                      <td><?=$row['beratTandan']?></td>
                      
                      <td><?=$row['tanggalMasuk']?></td>
                      <td><?=$row['tanggalKeluar']?></td>
                      <td class="center">
                      <a class="label label-default" href="?menu=TBS&page=editTBS&kd=<?=$row['nmSlipTBS']?>"><i class="fa fa-pencil"></i></a> 
                      <a onclick="return confirm('Lanjutkan Hapus?')" class="label label-danger" href="?menu=TBS&delete=TBS&kd=<?=$row['nmSlipTBS']?>"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                                      <?php } ?>  
                  </tbody>
                </table>              
              </div>
                            <hr>
                        <!--<a class="btn btn-primary" href="?menu=TBS&page=addTBS&kd=1">Tambah Data</a>   -->  
            </div>

  <?php } ?>  
  <?php if($_GET['page'] == 'addTBS'){ ?> <!-- ======================================================================================= -->
                  
            <div class="header">              
              <h3>TAMBAH DATA TBS</h3>
            </div>
            <div class="content">
              <form class="form-horizontal" onsubmit="return confirm('Lanjutkan Simpan?')" action="?menu=TBS" method="post" style="border-radius: 0px;"> 
                <?php
                  inputForm("nmSlipTBS","nmSlipTBS",$row['nmSlipTBS']);
                  inputForm("nmKendaraan","nmKendaraan",$row['nmKendaraan']);
                  inputForm("nmRelasi","nmRelasi",$row['nmRelasi']);
                  inputForm("nmBarang","nmBarang",$row['nmBarang']);
                  inputForm("bruto","bruto",$row['bruto']);
                  inputForm("brutoAsli","brutoAsli",$row['brutoAsli']);
                  inputForm("tara","tara",$row['tara']);
                  inputForm("netto","netto",$row['netto']);
                  inputForm("tanggalMasuk","tanggalMasuk",$row['tanggalMasuk']);
                  inputForm("tanggalKeluar","tanggalKeluar",$row['tanggalKeluar']);
                  inputForm("userMasuk","userMasuk",$row['userMasuk']);
                  inputForm("userKeluar","userKeluar",$row['userKeluar']);
                  inputForm("complate","complate",$row['complate']);
                  inputForm("keterangan","keterangan",$row['keterangan']);
                  inputForm("potongan","potongan",$row['potongan']);
                  inputForm("potonganPersen","potonganPersen",$row['potonganPersen']);
                  inputForm("potWajib","potWajib",$row['potWajib']);
                  inputForm("potSampah","potSampah",$row['potSampah']);
                  inputForm("potTangkai","potTangkai",$row['potTangkai']);
                  inputForm("potPasir","potPasir",$row['potPasir']);
                  inputForm("potAir","potAir",$row['potAir']);
                  inputForm("potMutu","potMutu",$row['potMutu']);
                  inputForm("potMentah","potMentah",$row['potMentah']);
                  inputForm("potBusuk","potBusuk",$row['potBusuk']);
                  inputForm("potTankos","potTankos",$row['potTankos']);
                  inputForm("potLainya","potLainya",$row['potLainya']);
                  inputForm("potBrondol","potBrondol",$row['potBrondol']);
                  inputForm("potDura","potDura",$row['potDura']);
                  inputForm("jumlahTandan","jumlahTandan",$row['jumlahTandan']);
                  inputForm("beratTandan","beratTandan",$row['beratTandan']);
                  inputForm("beratBersih","beratBersih",$row['beratBersih']);
                ?>    
                            
                            <hr>
                        <a type="submit" name="btnSubmit" value="addTBS" class="btn btn-default" href="?menu=TBS&page=listTBS" >Kembali</a> 
                        <button type="submit" name="btnSubmit" value="addTBS" class="btn btn-primary" >Simpan</button> 
                      </form>   
            </div>

  <?php } ?>  
  <?php if($_GET['page'] == 'editTBS'){ 
  $qry = mysql_query("SELECT * FROM penimbanganTBS_d WHERE nmSlipTBS = '$_GET[kd]'");
  $rowEdit = mysql_fetch_array($qry); ?> <!-- ======================================================================================= -->
 <div class="block-flat"> 
						<div class="header">
							<h3><?=$_SESSION[nmMenu]?><button type="button" class="btn btn-info btn-lg">KELUAR <i class="fa fa-sign-out"></i></button></h3>
						</div>
    <div class="content">
    <form onsubmit="return confirm('Lanjutkan Simpan?')" action="?page=data" method="post" parsley-validate novalidate>
    <div class="col-sm-6 col-md-6">
        <table class="no-border">
            <tbody class="no-border-x no-border-y">
                <tr>
                  <td width="20%">No. Slip</td>
                  <td width="1%">:</td>
                  <td><input type="text" name="nmSlipTBS" id="nmSlipTBS" required autocomplete="off" value="<?=$rowEdit['nmSlipTBS']?>" readonly /></td>
                </tr>
                <tr>
                    <td>No. Kendaraan</td>
                    <td>:</td>
                    <td><input type="text" name="nmKendaraan" id="nmKendaraan" required autocomplete="off" value="<?=$rowEdit['nmKendaraan']?>"  /></td>
                </tr>
                <tr>
                    <td>Produk</td>
                    <td>:</td>
                    <td><input type="text" name="nmBarang" id="nmBarang" required autocomplete="off" value="<?=$rowEdit['nmBarang']?>"  /></td>
                </tr>
                <tr>
                    <td>Supplier</td>
                    <td>:</td>
                    <td><input type="text" name="nmRelasi" id="nmRelasi" required autocomplete="off" value="<?=$rowEdit['nmRelasi']?>"  /></td>
                </tr>
                <tr>
                    <td>Bruto</td>
                    <td>:</td>
                    <td><input type="text" name="bruto" id="bruto" required autocomplete="off" value="<?=$rowEdit['bruto']?>" readonly /></td>
                </tr>
                <tr>
                    <td>Tara</td>
                    <td>:</td>
                    <td><input type="text" name="tara" id="tara" required autocomplete="off" value="<?=$rowEdit['tara']?>" readonly />
                    </td>
                </tr>
                <tr>
                    <td>Netto</td>
                    <td>:</td>
                    <td><input type="netto" name="netto" id="netto" required autocomplete="off" value="<?=$rowEdit['netto']?>" readonly /></td>
                </tr>    
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr> 
                <tr>
                    <td>Potongan</td>
                    <td>:</td>
                    <td><input type="potongan" name="potongan" id="potongan" required autocomplete="off" value="<?=$rowEdit['potongan']?>" /></td>
                </tr> 
                <tr>
                    <td>Berat Bersih</td>
                    <td>:</td>
                    <td><input type="beratBersih" name="beratBersih" id="beratBersih" required autocomplete="off" value="<?=$rowEdit['beratBersih']?>" /></td>
                </tr>  
                <tr>
                    <td collspan="3">&nbsp</td>
                </tr> 
                <tr>
                    <td>Keterangan</td>
                    <td>:</td>
                    <td><input type="keterangan" name="keterangan" id="keterangan" autocomplete="off" value="<?=$rowEdit['keterangan']?>" /></td>
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
                  <td><input type="text" parsley-type="number" name="potWajib" id="potWajib" required autocomplete="off" value="<?=$rowEdit['potWajib']?>" onkeyup="berBer()" /></td>
                  <td width="20%">Sampah %</td>
                  <td width="1%">:</td>
                  <td><input type="text" parsley-type="number" name="potSampah" id="potSampah" required autocomplete="off" value="<?=$rowEdit['potSampah']?>" onkeyup="berBer()" /></td>                  
                </tr>
                <tr>
                  <td width="20%">Tangkai %</td>
                  <td width="1%">:</td>
                  <td><input type="text" parsley-type="number" name="potTangkai" id="potTangkai" required autocomplete="off" value="<?=$rowEdit['potTangkai']?>" onkeyup="berBer()" /></td>
                  <td width="20%">Pasir %</td>
                  <td width="1%">:</td>
                  <td><input type="text" parsley-type="number" name="potPasir" id="potPasir" required autocomplete="off" value="<?=$rowEdit['potPasir']?>" onkeyup="berBer()" /></td>                  
                </tr>
                <tr>
                  <td width="20%">Air %</td>
                  <td width="1%">:</td>
                  <td><input type="text" parsley-type="number" name="potAir" id="potAir" required autocomplete="off" value="<?=$rowEdit['potAir']?>" onkeyup="berBer()" /></td>
                  <td width="20%">Mutu %</td>
                  <td width="1%">:</td>
                  <td><input type="text" parsley-type="number" name="potMutu" id="potMutu" required autocomplete="off" value="<?=$rowEdit['potMutu']?>" onkeyup="berBer()" /></td>                  
                </tr>
                <tr>
                  <td colspan="6"><strong>Pulangan</strong></td>
                </tr>                
                <tr>
                  <td width="20%">Mentah (Kg)</td>
                  <td width="1%">:</td>
                  <td><input type="text" parsley-type="number" name="potMentah" id="potMentah" required autocomplete="off" value="<?=$rowEdit['potMentah']?>" /></td>
                  <td width="20%">Busuk (Kg)</td>
                  <td width="1%">:</td>
                  <td><input type="text" parsley-type="number" name="potBusuk" id="potBusuk" required autocomplete="off" value="<?=$rowEdit['potBusuk']?>" /></td>                  
                </tr>
                <tr>
                  <td width="20%">Tankos (Kg)</td>
                  <td width="1%">:</td>
                  <td><input type="text" parsley-type="number" name="potTankos" id="potTankos" required autocomplete="off" value="<?=$rowEdit['potTankos']?>" /></td>
                  <td width="20%">Lainya (Kg)</td>
                  <td width="1%">:</td>
                  <td><input type="text" parsley-type="number" name="potLainya" id="potLainya" required autocomplete="off" value="<?=$rowEdit['potLainya']?>" /></td>                  
                </tr>
                <tr>
                  <td width="20%">Brondol %</td>
                  <td width="1%">:</td>
                  <td><input type="text" parsley-type="number" name="potBrondol" id="potBrondol" required autocomplete="off" value="<?=$rowEdit['potBrondol']?>" /></td>
                  <td width="20%">Dura %</td>
                  <td width="1%">:</td>
                  <td><input type="text" parsley-type="number" name="potDura" id="potDura" required autocomplete="off" value="<?=$rowEdit['potDura']?>" /></td>                  
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
                  <td><input type="text" parsley-type="number" name="beratTandan" id="beratTandan" required autocomplete="off" value="<?=$rowEdit['beratTandan']?>" onkeyup="tandan()" /></td>                  
                </tr>   
                <tr>
                  <td width="20%">&nbsp;</td>
                  <td width="1%">:</td>
                  <td>&nbsp;</td>
                  <td width="20%">Jumlah Tandan</td>
                  <td width="1%">:</td>
                  <td><input type="text" parsley-type="number" name="jumlahTandan" id="jumlahTandan" required autocomplete="off" value="<?=$rowEdit['jumlahTandan']?>" /></td>                  
                </tr>                                                                                                        
            </tbody>
        </table>
<script type="text/javascript">
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
</script>
        
                
    </div>    
      <div class="clear"></div>
        <hr />
        <a href="?page=listTBS" class="btn btn-default">Kembali</a><button name="btnSubmit" type="submit" class="btn btn-primary" value="editTBS" >Simpan</button>
       </form>
    </div>
</div>
  <?php } ?>    
  <?php if($_GET['page'] == 'listCPO'){ ?> <!-- ======================================================================================= -->
                  
            <div class="header">              
              <h3>LIST CPO</h3>
            </div>
            <div class="content">
              <div class="table-responsive">
                <table class="table table-bordered" id="datatable" >
                  <thead>
                    <tr>
                      <th>Slip CPO</th>
                      <th>Kendaraan</th>
                      <th>Relasi</th>
                      
                                            <th>Bruto</th>
                      <th>Bruto Asli</th>
                      <th>Tara</th>
                      <th>Netto</th>
                      
                      <th>Potongan</th>
                      <th>Terima</th>
                      <th>ffa</th>
                      <th>air</th>
                      <th>kotor</th>
                                            <th>Tanggal Masuk</th>
                      <th>Tanggal Keluar</th>
                      <th width="100px">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                                    <?php
                  $qryData = mysql_query("select * from penimbanganCPO_d where complate = 'y'");
                  while($row = mysql_fetch_array($qryData)){
                  ?>
                    <tr class="odd gradeX">
                      <td><?=$row['nmSlipCPO']?></td>
                      <td><?=$row['nmKendaraan']?></td>
                      <td><?=$row['nmRelasi']?></td>
                      
                      <td><?=$row['bruto']?></td>
                      <td><?=$row['brutoAsli']?></td>
                      <td><?=$row['tara']?></td>
                      <td><?=$row['netto']?></td>
                      
                      <td><?=$row['potongan']?></td>
                      <td><?=$row['beratBersih']?></td>
                      <td><?=$row['potFFA']?></td>
                      <td><?=$row['potAir']?></td> 
                      <td><?=$row['potKotoran']?></td>
                      
                      <td><?=$row['tanggalMasuk']?></td>
                      <td><?=$row['tanggalKeluar']?></td>
                      <td class="center">
                      <a class="label label-default" href="?menu=CPO&page=editCPO&kd=<?=$row['nmSlipCPO']?>"><i class="fa fa-pencil"></i></a> 
                      <a onclick="return confirm('Lanjutkan Hapus?')" class="label label-danger" href="?menu=CPO&delete=CPO&kd=<?=$row['nmSlipCPO']?>"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                                      <?php } ?>  
                  </tbody>
                </table>              
              </div>
                            <hr>
                        <!--<a class="btn btn-primary" href="?menu=CPO&page=addCPO&kd=1">Tambah Data</a>  -->   
            </div>

  <?php } ?>  
  <?php if($_GET['page'] == 'addCPO'){ ?> <!-- ======================================================================================= -->
                  
            <div class="header">              
              <h3>TAMBAH DATA CPO</h3>
            </div>
            <div class="content">
              <form class="form-horizontal" onsubmit="return confirm('Lanjutkan Simpan?')" action="?menu=CPO" method="post" style="border-radius: 0px;"> 
                <?php
                  inputForm("nmSlipCPO","nmSlipCPO",$row['nmSlipCPO']);
                  inputForm("nmKendaraan","nmKendaraan",$row['nmKendaraan']);
                  inputForm("nmRelasi","nmRelasi",$row['nmRelasi']);
                  inputForm("nmDO","nmDO",$row['nmDO']);
                  inputForm("bruto","bruto",$row['bruto']);
                  inputForm("brutoAsli","brutoAsli",$row['brutoAsli']);
                  inputForm("tara","tara",$row['tara']);
                  inputForm("netto","netto",$row['netto']);
                  inputForm("tanggalMasuk","tanggalMasuk",$row['tanggalMasuk']);
                  inputForm("tanggalKeluar","tanggalKeluar",$row['tanggalKeluar']);
                  inputForm("userMasuk","userMasuk",$row['userMasuk']);
                  inputForm("userKeluar","userKeluar",$row['userKeluar']);
                  inputForm("complate","complate",$row['complate']);
                  inputForm("keterangan","keterangan",$row['keterangan']);
                  inputForm("potongan","potongan",$row['potongan']);
                  inputForm("potFFA","potFFA",$row['potFFA']);
                  inputForm("potAir","potAir",$row['potAir']);
                  inputForm("potKotoran","potKotoran",$row['potKotoran']);
                  inputForm("jumlahSegel","jumlahSegel",$row['jumlahSegel']);
                  inputForm("segel","segel",$row['segel']);
                  inputForm("beratBersih","beratBersih",$row['beratBersih']);
                ?>    
                            
                            <hr>
                        <a type="submit" name="btnSubmit" value="addCPO" class="btn btn-default" href="?menu=CPO&page=listCPO" >Kembali</a> 
                        <button type="submit" name="btnSubmit" value="addCPO" class="btn btn-primary" >Simpan</button> 
                      </form>   
            </div>

  <?php } ?>  
  <?php if($_GET['page'] == 'editCPO'){ 
    $qry = mysql_query("SELECT * FROM penimbanganCPO_d WHERE nmSlipCPO = '$_GET[kd]'");
  $rowEdit = mysql_fetch_array($qry); ?> <!-- ======================================================================================= -->
<div class="block-flat"> 
						<div class="header">
							<h3><?=$_SESSION[nmMenu]?><button type="button" class="btn btn-info btn-lg">KELUAR <i class="fa fa-sign-out"></i></button></h3>
						</div>
    <div class="content">
    <form onsubmit="return confirm('Lanjutkan Simpan?')" action="?page=data" method="post" parsley-validate novalidate>
    <div class="col-sm-6 col-md-6">
        <table class="no-border">
            <tbody class="no-border-x no-border-y">
                <tr>
                  <td width="20%">No. Slip</td>
                  <td width="1%">:</td>
                  <td><input type="text" name="nmSlipCPO" id="nmSlipCPO" required autocomplete="off" value="<?=$rowEdit['nmSlipCPO']?>" readonly  /></td>
                </tr>
                <tr>
                    <td>No. Kendaraan</td>
                    <td>:</td>
                    <td><input type="text" name="nmKendaraan" id="nmKendaraan" required autocomplete="off" value="<?=$rowEdit['nmKendaraan']?>"  /></td>
                </tr>
                <tr>
                    <td>No. DO</td>
                    <td>:</td>
                    <td><input type="text" name="nmDO" id="nmDO" required autocomplete="off" value="<?=$rowEdit['nmDO']?>"  /></td>
                </tr>
                <tr>
                    <td>Customer</td>
                    <td>:</td>
                    <td><input type="text" name="nmRelasi" id="nmRelasi" required autocomplete="off" value="<?=$rowEdit['nmRelasi']?>"  /></td>
                </tr>
                <tr>
                    <td>Bruto</td>
                    <td>:</td>
                    <td><input type="text" name="bruto" id="bruto" required autocomplete="off" value="<?=$rowEdit['bruto']?>" readonly  /></td>
                </tr>
                <tr>
                    <td>Tara</td>
                    <td>:</td>
                    <td>
                    <input type="text" name="tara" id="tara" required autocomplete="off" value="<?=$rowEdit['tara']?>" readonly  />
                    </td>
                </tr>
                <tr>
                    <td>Netto</td>
                    <td>:</td>
                    <td><input type="netto" name="netto" id="netto" required autocomplete="off" value="<?=$rowEdit['netto']?>" readonly  /></td>
                </tr>    
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr> 
                <tr>
                    <td>Potongan</td>
                    <td>:</td>
                    <td><input type="potongan" parsley-type="number" name="potongan" id="potongan" required autocomplete="off" value="<?=$rowEdit['potongan']?>" onkeyup="berBer()" /></td>
                </tr> 
                <tr>
                    <td>Berat Bersih</td>
                    <td>:</td>
                    <td><input type="beratBersih" name="beratBersih" id="beratBersih" required autocomplete="off" value="<?=$rowEdit['beratBersih']?>"  /></td>
                </tr>       
                <tr>
                    <td collspan="3">&nbsp</td>
                </tr> 
                <tr>
                    <td>Keterangan</td>
                    <td>:</td>
                    <td><input type="keterangan" name="keterangan" id="keterangan" autocomplete="off" value="<?=$rowEdit['keterangan']?>" /></td>
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
                  <td><input type="text" parsley-type="number" name="potFFA" id="potFFA" required autocomplete="off" value="<?=$rowEdit['potFFA']?>" onkeyup="berBer()" /></td>
                  <td width="20%">&nbsp;</td>
                  <td width="1%">&nbsp;</td>
                  <td>&nbsp;</td>                  
                </tr>
                <tr>
                  <td width="20%">Pot. Air</td>
                  <td width="1%">:</td>
                  <td><input type="text" parsley-type="number" name="potAir" id="potAir" required autocomplete="off" value="<?=$rowEdit['potAir']?>" onkeyup="berBer()" /></td>
                  <td width="20%">&nbsp;</td>
                  <td width="1%">&nbsp;</td>
                  <td>&nbsp;</td>                  
                </tr>
                <tr>
                  <td width="20%">Pot. Kotoran</td>
                  <td width="1%">:</td>
                  <td><input type="text" parsley-type="number" name="potKotoran" id="potKotoran" required autocomplete="off" value="<?=$rowEdit['potKotoran']?>" onkeyup="berBer()" /></td>
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
                  <td><input type="text" parsley-type="number" name="jumlahSegel" id="jumlahSegel" required autocomplete="off" value="<?=$rowEdit['jumlahSegel']?>" onkeyup="berBer()" /></td>
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
<script type="text/javascript">
function berBer(){
		netto = $('#netto').val();	
		$('#potongan').val();
		beratBersih = netto - $('#potongan').val();
		$('#beratBersih').val(beratBersih)
};
</script>        
        
    </div>    
      <div class="clear"></div>
        <hr />
        <a href="?page=listCPO" class="btn btn-default">Kembali</a><button name="btnSubmit" type="submit" class="btn btn-primary" value="editCPO" >Simpan</button>
       </form>
    </div>
</div>
  <?php } ?>   
  <?php if($_GET['page'] == 'listLainya'){ ?> <!-- ======================================================================================= -->
                  
            <div class="header">              
              <h3>LIST Lainya</h3>
            </div>
            <div class="content">
              <div class="table-responsive">
                <table class="table table-bordered" id="datatable" >
                  <thead>
                    <tr>
                      <th>Slip Lainya</th>
                      <th>Kendaraan</th>
                      <th>Relasi</th>
                      <th>Kode Material</th>
                      <th>Nama Material</th>
                                            <th>Bruto</th>
                      
                      <th>Tara</th>
                      <th>Netto</th>
                                            <th>Tanggal Masuk</th>
                      <th>Tanggal Keluar</th>
                      <th width="100px">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                                    <?php
                  $qryData = mysql_query("select * from penimbanganLainya_d where complate = 'y'");
                  while($row = mysql_fetch_array($qryData)){
                  ?>
                    <tr class="odd gradeX">
                      <td><?=$row['nmSlipLainya']?></td>
                      <td><?=$row['nmKendaraan']?></td>
                      <td><?=$row['nmRelasi']?></td>
                      <td><?=$row['kdMaterial']?></td>
                      <td><?=$row['nmMaterial']?></td>
                      <td><?=$row['bruto']?></td>
                      
                      <td><?=$row['tara']?></td>
                      <td><?=$row['netto']?></td>
                      <td><?=$row['tanggalMasuk']?></td>
                      <td><?=$row['tanggalKeluar']?></td>
                      <td class="center">
                      <a class="label label-default" href="?menu=Lainya&page=editLainya&kd=<?=$row['nmSlipLainya']?>"><i class="fa fa-pencil"></i></a> 
                      <a onclick="return confirm('Lanjutkan Hapus?')" class="label label-danger" href="?menu=Lainya&delete=Lainya&kd=<?=$row['nmSlipLainya']?>"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                                      <?php } ?>  
                  </tbody>
                </table>              
              </div>
                            <hr>
                        <!--<a class="btn btn-primary" href="?menu=Lainya&page=addLainya&kd=1">Tambah Data</a>     -->
            </div>

  <?php } ?>  
  <?php if($_GET['page'] == 'addLainya'){ ?> <!-- ======================================================================================= -->
                  
            <div class="header">              
              <h3>TAMBAH DATA Lainya</h3>
            </div>
            <div class="content">
              <form class="form-horizontal" onsubmit="return confirm('Lanjutkan Simpan?')" action="?menu=Lainya" method="post" style="border-radius: 0px;"> 
                <?php
                  inputForm("nmSlipLainya","nmSlipLainya",$row['nmSlipLainya']);
                  inputForm("nmKendaraan","nmKendaraan",$row['nmKendaraan']);
                  inputForm("nmRelasi","nmRelasi",$row['nmRelasi']);
                  inputForm("kdMaterial","kdMaterial",$row['kdMaterial']);
                  inputForm("nmMaterial","nmMaterial",$row['nmMaterial']);
                  inputForm("bruto","bruto",$row['bruto']);
                  inputForm("tara","tara",$row['tara']);
                  inputForm("netto","netto",$row['netto']);
                  inputForm("tanggalMasuk","tanggalMasuk",$row['tanggalMasuk']);
                  inputForm("tanggalKeluar","tanggalKeluar",$row['tanggalKeluar']);
                  inputForm("userMasuk","userMasuk",$row['userMasuk']);
                  inputForm("userKeluar","userKeluar",$row['userKeluar']);
                  inputForm("complate","complate",$row['complate']);
                  inputForm("keterangan","keterangan",$row['keterangan']);
                ?>    
                            
                            <hr>
                        <a type="submit" name="btnSubmit" value="addLainya" class="btn btn-default" href="?menu=Lainya&page=listLainya" >Kembali</a> 
                        <button type="submit" name="btnSubmit" value="addLainya" class="btn btn-primary" >Simpan</button> 
                      </form>   
            </div>

  <?php } ?>  
  <?php if($_GET['page'] == 'editLainya'){ 
   $qry = mysql_query("SELECT * FROM penimbanganLainya_d WHERE nmSlipLainya = '$_GET[kd]'");
  $rowEdit = mysql_fetch_array($qry);
  ?> <!-- ======================================================================================= -->
<div class="block-flat"> 
						<div class="header">
							<h3><?=$_SESSION[nmMenu]?><button type="button" class="btn btn-info btn-lg">KELUAR <i class="fa fa-sign-out"></i></button></h3>
						</div>
    <div class="content">
    <form onsubmit="return confirm('Lanjutkan Simpan?')" action="?page=data" method="post" parsley-validate novalidate>
    <div class="col-sm-6 col-md-6">
        <table class="no-border">
            <tbody class="no-border-x no-border-y">
                <tr>
                  <td width="20%">No. Slip</td>
                  <td width="1%">:</td>
                  <td><input type="text" name="nmSlipLainya" id="nmSlipLainya" required autocomplete="off" value="<?=$rowEdit['nmSlipLainya']?>" readonly /></td>
                </tr>
                <tr>
                    <td>No. Kendaraan</td>
                    <td>:</td>
                    <td><input type="text" name="nmKendaraan" id="nmKendaraan" required autocomplete="off" value="<?=$rowEdit['nmKendaraan']?>"  /></td>
                </tr>
                <tr>
                    <td>No. Material</td>
                    <td>:</td>
                    <td><input type="text" name="kdMaterial" id="kdMaterial" required autocomplete="off" value="<?=$rowEdit['kdMaterial']?>"  /></td>
                </tr>
                <tr>
                    <td>Material</td>
                    <td>:</td>
                    <td><input type="text" name="nmMaterial" id="nmMaterial" required autocomplete="off" value="<?=$rowEdit['nmMaterial']?>"  /></td>
                </tr>                
                <tr>
                    <td>Customer</td>
                    <td>:</td>
                    <td><input type="text" name="nmRelasi" id="nmRelasi" required autocomplete="off" value="<?=$rowEdit['nmRelasi']?>"  /></td>
                </tr>
                <tr>
                    <td>Bruto</td>
                    <td>:</td>
                    <td><input type="text" name="bruto" id="bruto" required autocomplete="off" value="<?=$rowEdit['bruto']?>" readonly  /></td>
                </tr>
                <tr>
                    <td>Tara</td>
                    <td>:</td>
                    <td>
                    <input type="text" name="tara" id="tara" required autocomplete="off" value="<?=$rowEdit['tara']?>" readonly  />
                  </td>
                </tr>
                <tr>
                    <td>Netto</td>
                    <td>:</td>
                    <td><input type="netto" name="netto" id="netto" required autocomplete="off" value="<?=$rowEdit['netto']?>" readonly  /></td>
                </tr>  
                <tr>
                    <td collspan="3">&nbsp</td>
                </tr> 
                <tr>
                    <td>Keterangan</td>
                    <td>:</td>
                    <td><input type="keterangan" name="keterangan" id="keterangan" autocomplete="off" value="<?=$rowEdit['keterangan']?>" /></td>
                </tr>                    
                                                                            
            </tbody>
        </table>
    </div>
    <div class="col-sm-6 col-md-6"></div>    
      <div class="clear"></div>
        <hr />
        <a href="?page=listLainya" class="btn btn-default">Kembali</a><button name="btnSubmit" type="submit" class="btn btn-primary" value="editLainya" >Simpan</button>
       </form>
    </div>
</div>
  <?php } ?>              
<?php } ?>                          
                        
          </div>        
        </div>
      </div>
          
  
      
      </div>
    </div> 
    
  </div>

  <script src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery.nanoscroller/jquery.nanoscroller.js"></script>
  <script type="text/javascript" src="js/jquery.sparkline/jquery.sparkline.min.js"></script>
  <script type="text/javascript" src="js/jquery.easypiechart/jquery.easy-pie-chart.js"></script>
  <script type="text/javascript" src="js/behaviour/general.js"></script>
  <script src="js/jquery.ui/jquery-ui.js" type="text/javascript"></script>
  <script type="text/javascript" src="js/jquery.nestable/jquery.nestable.js"></script>
  <script type="text/javascript" src="js/bootstrap.switch/bootstrap-switch.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
  <script src="js/jquery.select2/select2.min.js" type="text/javascript"></script>
  <script src="js/bootstrap.slider/js/bootstrap-slider.js" type="text/javascript"></script>
  <script type="text/javascript" src="js/jquery.gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="js/jquery.datatables/jquery.datatables.min.js"></script>
	<script type="text/javascript" src="js/jquery.datatables/bootstrap-adapter/js/datatables.js"></script>
    <script type="text/javascript" src="js/jquery.datatables/media/js/ZeroClipboard.js"></script>
    <script type="text/javascript" src="js/jquery.datatables/media/js/TableTools.js"></script>


    <script type="text/javascript">
     
      
      $(document).ready(function(){
        //initialize the javascript
        App.init();
        App.dataTables();
      });
    </script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
      <script src="js/behaviour/voice-commands.js"></script>
  <script src="js/bootstrap/dist/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.flot/jquery.flot.js"></script>
  <script type="text/javascript" src="js/jquery.flot/jquery.flot.pie.js"></script>
  <script type="text/javascript" src="js/jquery.flot/jquery.flot.resize.js"></script>
  <script type="text/javascript" src="js/jquery.flot/jquery.flot.labels.js"></script>
  </body>
</html>
