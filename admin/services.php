<?php

ob_start();
session_start();
require('../config.php');

if($_SESSION['adminid']=='')
{
header('location:../adminlogin.php');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Namma Matrimony</title>
    <!-- Bootstrap Core CSS -->
    
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="../plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/megna.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


<script>
$(document).ready(function() {
	$('#member').DataTable( {
		
	} );
	
	 $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
} );

function approve()
{
	var sThisVal='';
	$('input[class=checkbox]').each(function () {
    sThisVal +=','+ (this.checked ? $(this).val() : "");
	
});
var checkval=sThisVal.replace(/^,|,$/g,'');

window.location.href = $(location).attr("href")+'?id='+checkval+'&type=approve';

}

function unapprove()
{
	var sThisVal='';
	$('input[class=checkbox]').each(function () {
    sThisVal +=','+ (this.checked ? $(this).val() : "");
	
});
var checkval=sThisVal.replace(/^,|,$/g,'');

window.location.href = $(location).attr("href")+'?id='+checkval+'&type=unapprove';

}
</script>

</head>

<body>
    <!-- Preloader -->
 <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <?php include('header.php') ?><!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                        <!-- input-group -->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search..."> <span class="input-group-btn">
            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
            </span> </div>
                        <!-- /input-group -->
                    </li>
                    <li class="user-pro">
                      <!--  <a href="#" class="waves-effect"><img src="../plugins/images/users/d1.jpg" alt="user-img" class="img-circle"> <span class="hide-menu">Dr. Steve Gection<span class="fa arrow"></span></span>
                        </a>-->
                        <ul class="nav nav-second-level">
                            <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li>
                    <?php include('sidebar.php'); ?>
                </ul>
            </div>
        </div>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"> <a href="index.php">Report</a></h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> <!--a href="https://themeforest.net/item/elite-admin-responsive-dashboard-web-app-kit-/16750820" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy Now</a-->
                        <ol class="breadcrumb">
                            <form role="search" class="app-search hidden-xs">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                       
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                   <!--row -->
                                   <div class="col-sm-12">				                                                      				
				
   <hr>
						<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'all')">All</button>
  <button class="tablinks" onclick="openCity(event, 'mandabam')">Mandabam</button>
  <button class="tablinks" onclick="openCity(event, 'bazaar')">Bazaar</button>
  <button class="tablinks" onclick="openCity(event, 'photo')">Photography</button>
  </div>
<div class="container">
       <div class="num_rows"><br>
		
				<div class="form-group"> 	<!--		Show Numbers Of Rows 		-->
			 		<label for="start">From date:</label>

                 <input style="padding: 5px;"type="date" id="start" name="trip-start">
				 <label for="end">To date:</label>

                 <input style="padding: 5px;" type="date" id="start" name="trip-start">
                 <a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"><i class="fa fa-download" aria-hidden="true"></i> &nbsp Submit</a>
                                
			  	</div>
				
        </div>	
	
        <div class="tb_search">
		<div class="num_rows"><br>
		
				<div class="form-group"> 
				<!--		Show Numbers Of Rows 		-->
			 		<select class  ="form-control" name="state"  id="maxRows">						 
						 
						 <option value="10" selected="selected">Short by Today</option>
						 <option value="15">Short by Yesterday</option>
						 <option value="20">Short by Last week</option>
						 <option value="50">Short by Last Month</option>
						 <option value="70">Short by Last YEar</option>						
                         <option value="5000">Short by Show ALL</option>
						</select>
			 		
			  	</div>
        </div>
       </div>
      </div>
<div id="all" class="tabcontent">
  <div class="white-box">
  <div style="overflow-x:auto;">
  <h3 style="terx-align:center">All Services</h3>
                           <table  id="member" class="display" style="width:100%">
						   <thead>
							  <tr>
		<th><input type="checkbox" id="select_all"> &nbsp Select</th>
		<th>Date of Registration</th>
		<th>Location</th>
		<th>Category</th>
		<th>From & To Date</th>
		<th>Mobile Number</th>
		<th>Mail_ID</th>
		<th>User ID</th>
		
	</tr>
					
							  </thead>
							  <tbody>
							  <?php 
								
								$query=mysqli_query($conn,"select * from tbl_user");								
								
								while($fetchdata=mysqli_fetch_array($query))
								{
								?>
								
							  <tr>
								<tr>
		<td><input type="checkbox" id="select_all"> </td>
		<td>10-12-2019</td>
		<td>Salem</td>
		<td>Photo</td>
		<td>10-02-2019 to 12-02-2019</td>
		<td>+91 32158 72547</td>
		<td>example@gmail.com</td>
		<td>NM_123</td>
	</tr>

							  </tr>
							 
							 <?php } ?>
							  </tbody>
							</table>
							</div>
							</div>
</div>

<div id="mandabam" class="tabcontent">
<div class="white-box">
  <div style="overflow-x:auto;">
  <h3 style="terx-align:center">Mandabam</h3>
                           <table  id="member" class="display" style="width:100%">
						   <thead>
							  <tr>		
								<th rowspan="2"><input type="checkbox" id="select_all"></th>
								<th>Date of Registration</th>
		<th>Location</th>
		<th>Mandabam Name</th>
		<th>From & To Date</th>
		<th>Mobile Number</th>
		<th>Mail_ID</th>
		<th>User ID</th>
		
							  </tr>
							  </thead>
							  <tbody>
							  <?php 
								
								$query=mysqli_query($conn,"select * from tbl_user");								
								
								while($fetchdata=mysqli_fetch_array($query))
								{
								?>
								
							  <tr>
								<td><input type="checkbox" class="checkbox" value="<?php echo $fetchdata['user_id'] ?>"></td>
								<td>10-12-2019</td>
		<td>Salem</td>
		<td>Name</td>
		<td>10-02-2019 to 12-02-2019</td>
		<td>+91 32158 72547</td>
		<td>example@gmail.com</td>
		<td>NM_123</td>
							  </tr>
							 
							 <?php } ?>
							  </tbody>
							</table>
							</div>

</div>
</div>
<div id="bazaar" class="tabcontent">
  <div class="white-box">
  <div style="overflow-x:auto;">
 <h3 style="text-align:center">Bazaar</h3>
                           <table  id="member" class="display" style="width:100%">
						   <thead>
							  <tr>
								<th><input type="checkbox" id="select_all"></th>
								<th>Date of Registration</th>
				<th>User ID</th>
		<th>Category</th>
		<th>Name</th>
		<th>Mobile Number</th>
		<th>From & To Date</th>		
		<th>Place</th>
							  </tr>
							  </thead>
							  <tbody>
							  <?php 
								
								$query=mysqli_query($conn,"select * from tbl_user");								
								
								while($fetchdata=mysqli_fetch_array($query))
								{
								?>
								
							  <tr>
								<td><input type="checkbox" class="checkbox" value="<?php echo $fetchdata['user_id'] ?>"></td>
								<td>10-12-2019</td>
		<td>NM_123</td>
		<td>Catering</td>
		<td>Name</td>
		<td>+91 32158 72547</td>
		<td>10-02-2019 to 12-02-2019</td>			
		<td>Salem</td>
							  </tr>
							 
							 <?php } ?>
							  </tbody>
							</table>
							</div>

</div></div>
<div id="photo" class="tabcontent">
  <div class="white-box">
  <div style="overflow-x:auto;">
  <h3 style="terx-align:center">Photography</h3>
                           <table  id="member" class="display" style="width:100%">
						   <thead>
							  <tr>
								<th rowspan="2"><input type="checkbox" id="select_all"></th>
                               <th>Date of Registration</th>
		<th>User ID</th>		
		<th>User Name</th>	
		<th>Mobile Number</th>
		<th>PLace</th>
		
							  </tr>
							  </thead>
							  <tbody>
							  <?php 
								
								$query=mysqli_query($conn,"select * from tbl_user");								
								
								while($fetchdata=mysqli_fetch_array($query))
								{
								?>
								
							  <tr>
								<td><input type="checkbox" class="checkbox" value="<?php echo $fetchdata['user_id'] ?>"></td>
								<td>10-12-2019</td>
		<td>NM_123</td>
		<td>Name</td>		
		<td>+91 32158 72547</td>
		<td>Salem</td>
							  </tr>
							 
							 
							 <?php } ?>
							  </tbody>
							</table>
							</div>

</div></div>
	</div></div>
				</div>
					</div>
                </div>
				</div>
				<style>
					.display {
					  font-family: arial, sans-serif;
					  border-collapse: collapse;
					  width: 100%;
					}

					table {
					  font-family: arial, sans-serif;
					  border-collapse: collapse;
					  width: 100%;
					}

					td, th {
					  border: 1px solid #dddddd;
					  text-align: center;
					  padding: 8px;
					}

					tr:nth-child(even) {
					  background-color: #f1f1f1;
					}
					.approvest {
					  font-family: arial, sans-serif;
					  border-collapse: collapse;
					  width: 100%;
					}
th {
  cursor: pointer;
  background-color:#01c0c8;
  color:#fff;
  text-align:center;
}
					

					table.dataTable thead .sorting {
						background:#01c0c8;
						color: #fff;
					}
					table.dataTable thead .sorting_asc {
						background:#01c0c8;
						color: #fff;
					}
					.dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
						
    color: #ffffff !important;
    border: 1px solid #01c0c8;
    background-color: #01c0c8;
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #fff), color-stop(100%, #dcdcdc));
    background: -webkit-linear-gradient(top, #fff 0%, #dcdcdc 100%);
    background: -moz-linear-gradient(top, #fff 0%, #dcdcdc 100%);
    background: -ms-linear-gradient(top, #fff 0%, #dcdcdc 100%);
    background: -o-linear-gradient(top, #fff 0%, #dcdcdc 100%);
    background: linear-gradient(to bottom, #01c0c8 0%, #aefcff 100%);
}
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
	cursor: pointer;
    color: #ffffff !important;
    border: 1px solid transparent;
    background: #12c6cd;
    box-shadow: none;
}
.num_rows {
  width: 80%;
  float:left;
}
.tb_search{
  width: 20%;
  float:right;
}
.pagination-container {
  width: 70%;
  float:left;
}

.rows_count {
  width: 30%;
  float:right;
  text-align:right;
  color: #999;
}			

input[type=date] {
	webkit-appearance: initial;
	-border: 1px solid #d5d5d5;
}
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  padding: 5px;
    border-radius: 5px;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: #1e5d77;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
  color:#fff;
      margin: 0 .2em 1px 0;
	  border-top-left-radius: 10px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #de3c94;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #de3c94;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}

.radio-inline, .checkbox-inline {
	position: relative;
    display:inline-block;
	padding-left: 30px;
    margin-bottom: 0;
    vertical-align: middle;

    cursor: pointer;
    font-size: 18px;
}
.tablink {
  background-color: #555;
  color: white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  font-size: 17px;
  width: 25%;
}

.tablink:hover {
  background-color: #777;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  color: white;
  display: none;
  padding: 100px 20px;

}
					</style>
               
               
                <!-- /.right-sidebar -->
            </div>
            <!-- /.container-fluid -->
           <?php include('footer.php') ?>
       
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
	
    <!--<script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>-->
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/tether.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Morris JavaScript -->
    <script src="../plugins/bower_components/raphael/raphael-min.js"></script>
    <script src="../plugins/bower_components/morrisjs/morris.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="../plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- jQuery peity -->
    <script src="../plugins/bower_components/peity/jquery.peity.min.js"></script>
    <script src="../plugins/bower_components/peity/jquery.peity.init.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="js/dashboard1.js"></script>
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
	<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
<script>
function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
</body>

</html>
