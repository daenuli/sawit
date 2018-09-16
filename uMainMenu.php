<?php include_once("config/koneksi.php"); error_reporting(0); session_start(); include("config/identitas.php");?>
  <div id="head-nav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="fa fa-gear"></span>
        </button>
        <a class="navbar-brand" href="#"><span><?=$namaPerusahaan?></span></a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
			<li <?php if($_GET[menu] == 'kendaraanBelumKeluarTBS'){ echo'class="active"'; $_SESSION[akses] = "laporan/kendaraanBelumKeluarTBS"; $_SESSION[nmMenu] = "Kendaraan Belum Keluar TBS";} ?> ><a href="contentChack.php?menu=kendaraanBelumKeluarTBS">Kendaraan Belum Keluar TBS</a></li>
            <li <?php if($_GET[menu] == 'kendaraanBelumKeluarCPO'){ echo'class="active"'; $_SESSION[akses] = "laporan/kendaraanBelumKeluarCPO"; $_SESSION[nmMenu] = "Kendaraan Belum Keluar CPO";} ?> ><a href="contentChack.php?menu=kendaraanBelumKeluarCPO">Kendaraan Belum Keluar CPO</a></li>
            <li <?php if($_GET[menu] == 'kendaraanBelumKeluarLainya'){ echo'class="active"'; $_SESSION[akses] = "laporan/kendaraanBelumKeluarLainya"; $_SESSION[nmMenu] = "Kendaraan Belum Keluar Lainnya";} ?> ><a href="contentChack.php?menu=kendaraanBelumKeluarLainya">Kendaraan Belum Keluar Lainya</a></li>          
          
        </ul>
    <ul class="nav navbar-nav navbar-right user-nav">
      <li class="dropdown profile_menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img alt="Avatar" src="images/<?=$_SESSION[leveluser]?>.png" width="30px" /><?=$_SESSION[namalengkap]?> <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li <?php if($_GET[menu] == 'myAccount'){ echo'class="active"'; $_SESSION[akses] = "utility/myAccount"; $_SESSION[nmMenu] = "My Acount";} ?> ><a href="contentChack.php?menu=myAccount">My Account</a></li>
         
          <li class="divider"></li>
          <li><a href="iLogout.php">Sign Out</a></li>
        </ul>
      </li>
    </ul>			
    <ul class="nav navbar-nav navbar-right not-nav">
    <!--belum keluar -->
    <?php $qryBkTBS = mysql_query("SELECT *, DATE(tanggalMasuk) as tglM, TIME(tanggalMasuk) as jamM FROM penimbanganTBS_d where complate = 'n' ORDER BY tanggalMasuk asc");
		$numBkTbs = mysql_num_rows($qryBkTBS); ?>
      <li class="button dropdown">
        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">T<span class="bubble"><?=$numBkTbs?></span></a>
        <ul class="dropdown-menu">
          <li>
            <div class="nano nscroller">
              <div class="content">
                <ul>
                <?php while($rowBkTBS = mysql_fetch_array($qryBkTBS)){ ?>
                  <li><a href="contentChack.php?menu=penimbanganTBS&nmKendaraan=<?=$rowBkTBS['nmKendaraan']?>"><i class="fa fa-sign-in info"></i> <b><?=$rowBkTBS['nmKendaraan']?></b> - <?=$rowBkTBS['nmRelasi']?> <span class="date"><?=$rowBkTBS['jamM']?> <?=$rowBkTBS['tglM']?></span></a></li>
                <?php } ?>
                </ul>
              </div>
            </div>
            <ul class="foot"><li><a href="#">View all activity </a></li></ul>           
          </li>
        </ul>
      </li>    
     <!-- tutup belum keluar --> 
    <!--belum keluar -->
    <?php $qryBkTBS = mysql_query("SELECT *, DATE(tanggalMasuk) as tglM, TIME(tanggalMasuk) as jamM FROM penimbanganCPO_d where complate = 'n' ORDER BY tanggalMasuk asc");
		$numBkTbs = mysql_num_rows($qryBkTBS); ?>
      <li class="button dropdown">
        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">C<span class="bubble"><?=$numBkTbs?></span></a>
        <ul class="dropdown-menu">
          <li>
            <div class="nano nscroller">
              <div class="content">
                <ul>
                <?php while($rowBkTBS = mysql_fetch_array($qryBkTBS)){ ?>
                  <li><a href="contentChack.php?menu=penimbanganCPO&nmKendaraan=<?=$rowBkTBS['nmKendaraan']?>"><i class="fa fa-sign-in success"></i> <b><?=$rowBkTBS['nmKendaraan']?></b> - <?=$rowBkTBS['nmRelasi']?> <span class="date"><?=$rowBkTBS['jamM']?> <?=$rowBkTBS['tglM']?></span></a></li>
                <?php } ?>
                </ul>
              </div>
            </div>
            <ul class="foot"><li><a href="#">View all activity </a></li></ul>           
          </li>
        </ul>
      </li>    
     <!-- tutup belum keluar --> 
    <!--belum keluar -->
    <?php $qryBkTBS = mysql_query("SELECT *, DATE(tanggalMasuk) as tglM, TIME(tanggalMasuk) as jamM FROM penimbanganLainya_d where complate = 'n' ORDER BY tanggalMasuk asc");
		$numBkTbs = mysql_num_rows($qryBkTBS); ?>
      <li class="button dropdown">
        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">L<span class="bubble"><?=$numBkTbs?></span></a>
        <ul class="dropdown-menu">
          <li>
            <div class="nano nscroller">
              <div class="content">
                <ul>
                <?php while($rowBkTBS = mysql_fetch_array($qryBkTBS)){ ?>
                  <li><a href="contentChack.php?menu=penimbanganLainya&nmKendaraan=<?=$rowBkTBS['nmKendaraan']?>"><i class="fa fa-sign-in warning"></i> <b><?=$rowBkTBS['nmKendaraan']?></b> - <?=$rowBkTBS['nmRelasi']?> <span class="date"><?=$rowBkTBS['jamM']?> <?=$rowBkTBS['tglM']?></span></a></li>
                <?php } ?>
                </ul>
              </div>
            </div>
            <ul class="foot"><li><a href="#">View all activity </a></li></ul>           
          </li>
        </ul>
      </li>    
     <!-- tutup belum keluar -->      
     
    		
    </ul>

      </div><!--/.nav-collapse -->
    </div>
  </div>