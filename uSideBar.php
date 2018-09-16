<?php include_once("config/koneksi.php"); error_reporting(0); session_start();
if(isset($_GET['menu'])){
  $_SESSION[menu]     = $_GET['menu'];
};
function CA($kdMenu,$nmMenu, $akses){
	if($_SESSION[menu] == $kdMenu){ echo'class="active"'; $_SESSION[nmMenu] = $nmMenu; $_SESSION[akses] = $akses; };
	
};
?>		
        <div class="cl-sidebar">
			<div class="cl-toggle"><i class="fa fa-bars"></i></div>
			<div class="cl-navblock">
        <div class="menu-space">
          <div class="content">
            <div class="side-user">
              <div class="avatar"><img src="images/<?=$_SESSION[leveluser]?>.png" alt="Avatar" width="50px" /></div>
              <div class="info">
                <a href="#"><?=$_SESSION[namalengkap]?></a>
                <img src="images/state_online.png" alt="Status" /> <span><?=$_SESSION[leveluser]?></span>
              </div>
            </div>
            <ul class="cl-vnavigation">
             <?php 
			 $qrySideBar = mysql_query("SELECT * FROM u_sidebar where header = 'header' and $_SESSION[leveluser] = 'y'"); 
			 while ($rowSideBar = mysql_fetch_array($qrySideBar)){ ?>
             
				 
                 <li <?=CA($rowSideBar['kdMenu'],$rowSideBar['nmMenu'],$rowSideBar['akses'])?>><a href="<?=$rowSubSideBar['link']?>"><i class="fa <?=$rowSideBar['icon']?>"></i><span><?=$rowSideBar['nmMenu']?></span></a>
                 
                 	<?php $qSubSideBar = mysql_query("SELECT * FROM u_sideBar where header = '$rowSideBar[kdMenu]' and $_SESSION[leveluser] = 'y'");
					if(mysql_num_rows($qSubSideBar) != 0 ){ ?>
                    
                        <ul class="sub-menu">
                        <?php while ($rowSubSideBar = mysql_fetch_array($qSubSideBar)){ ?>
                          <li <?=CA($rowSubSideBar['kdMenu'],$rowSubSideBar['nmMenu'],$rowSubSideBar['akses'])?>><a href="<?=$rowSubSideBar['link']?>"><?=$rowSubSideBar['nmMenu']?></a></li>
                        <?php } ?>
                        </ul>
                    
                    <?php } ?>
                    
                    
                  </li> 
                  
                  
			 <?php }; ?> 
              <!--<li><a href="#"><i class="fa fa-external-link nav-icon"></i><span>Master</span></a>
                <ul class="sub-menu">
                  <li><a href="maps.html">Google Maps</a></li>
                  <li><a href="vector-maps.html"><span class="label label-primary pull-right">New</span>Vector Maps</a></li>
                </ul>
              </li>                         
               -->
            </ul>
          </div>
        </div>
        <div class="text-right collapse-button" style="padding:7px 9px;">
          <!--<input type="text" class="form-control search" placeholder="Search..." /> -->
          <button id="sidebar-collapse" class="btn btn-default" style=""><i style="color:#fff;" class="fa fa-angle-left"></i></button>
        </div>
			</div>
		</div>
        
        <?php $tukar = array(
                            	'<div class="btn-group">
									<button type="button" class="btn btn-lg btn-default btn-facebook bg">T</button>
									<button type="button" class="btn btn-lg btn-default">B&nbsp; &nbsp;S</button>
								</div>', 
                                '<div class="btn-group">
									<button type="button" class="btn btn-lg btn-default btn-twitter bg">C</button>
									<button type="button" class="btn btn-lg btn-default">P&nbsp; &nbsp;O</button>
								</div>',
                                '<div class="btn-group">
									<button type="button" class="btn btn-lg btn-default btn-google-plus bg">L</button>
									<button type="button" class="btn btn-lg btn-default">ainnya</button>
								</div>' 
							);
				$cari = array("TBS","CPO","Lainnya");	
				$_SESSION[nmMenu] = str_replace($cari,$tukar,$_SESSION[nmMenu]);		        
		?>