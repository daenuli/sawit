
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
  <link href="css/style.css" rel="stylesheet" />
	
  </head>

  <body>


  <!-- Fixed navbar -->
// main menu	
	<div id="cl-wrapper">
// sidebar	

		<div class="container-fluid" id="pcont">
		<div class="cl-mcont">
        
		
			<div class="row">
				<div class="col-md-12">
					<div class="block-flat">
                    
						<div class="header">							
							<h3>Basic DataTable</h3>
						</div>
						<div class="content">
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable" >
									<thead>
										<tr>
											<th>Rendering engine</th>
											<th>Browser</th>
											<th>Platform(s)</th>
											<th>Engine version</th>
											<th width="80px">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<tr class="odd gradeX">
											<td>Trident</td>
											<td>Internet
												 Explorer 4.0</td>
											<td>Win 95+</td>
											<td class="center"> 4</td>
											<td class="center"><a class="label label-default" href="?page=edit&kd=1"><i class="fa fa-pencil"></i></a> <a onclick="return confirm('Lanjutkan Hapus?')" class="label label-danger" href="?del=1"><i class="fa fa-times"></i></a></td>
										</tr>
									</tbody>
								</table>							
							</div>
						</div>
                        
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
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
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
