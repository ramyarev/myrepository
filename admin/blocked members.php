<?php
//ini_set('display_errors','on');

ob_start();
session_start();
require('../config.php');

if($_SESSION['adminid']=='')
{
header('location:../adminlogin.php');
}

if($_POST['blockeduser']=='Submit')
{
	
	$email_id=$_POST['email_id'];
	$mobile_no=$_POST['mobile_no'];
	$reason=$_POST['reason'];
	$blocked_date=$_POST['blocked_date'];
	
	
	
	mysqli_query($conn,"insert into  tbl_blocked_user (email_id,mobile_no,reason,blocked_date,edited_by) values ('".$email_id."','".$mobile_no."','".$reason."','".$blocked_date."','admin')");
	header("Location:blocked members.php");
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

 <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/base/jquery-ui.css" rel="stylesheet">
 
 <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
 
 


<style>
					table {
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th {
  cursor: pointer;
  background-color:#01c0c8;
  color:#fff;
  text-align:center;
}

th, td {
  text-align: left;
  padding: 16px;
  border-bottom:1px solid #d5d5d5;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}


.tab {
 background-color: #01c0c8;
}


.tab button {
   background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}


.tab button:hover {
  background-color: #fff;
  color:#01c0c8;
}


.tab button.active {
   background-color: #fff;
  color:#01c0c8;
}


.tabcontent {

  padding: 0px 12px;
 
 
  border-left: none;

}
			</style>
					

</head>

<body>
    <!-- Preloader -->
       <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
           <?php include('header.php') ?>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
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
                        <h4 class="page-title"> <a href="index.php">Blocked Members</a></h4>
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
               
				<br><br>
                   <div class="col-sm-12">
				   
                        <div class="white-box" class="col-sm-12">
                            <div class="">
                          <div class="row" >
						  
                    <div class="col-sm-12">
					<!--div align="right"><a href="members.php?type=all.php" align="right"><b><i class="fa fa-backward" aria-hidden="true"></i>Back</b></a>
						  </div-->
                        <div class="white-box">
						
                             <form method="post" name="user_detail" id="user_detail" enctype="multipart/form-data">
                        	
							
								<div id="tabs">
								<ul style="border:none">
									<li><a href="#blocked">Blocked List</a>
									</li>
									<li><a href="#add">Add to Block</a>
									</li>
									
								</ul>								
								<div id="blocked">
								<br>
								
				           <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3>
                                   		<b>Blocked List</b>
                                	</h3>
                                </div>
                            </div>
							<br>
                            <div class="row">
                    			<div class="col-md-12 col-xs-12">
						<div style="overflow-x:auto;">
						<table  id="member" class="display" style="width:100%">
						
						  
							  <tr>
								<th>Date</th>
								
								<th onclick="sortTable(1)">Email_ID</th>
								<th onclick="sortTable(0)">Mobile Number</th>
								<th onclick="sortTable(0)">Reason</th>						
							  </tr>
							 
							  <tbody>
							  <?php $getblocked=mysqli_query($conn,"select * from tbl_blocked_user");
								while($fetchblocked=mysqli_fetch_array($getblocked))
								{
							  ?>
							  <tr>
							  <td><?php echo $fetchblocked['blocked_date'] ?></td>							 
								
								<td><?php echo $fetchblocked['email_id'] ?></td>	
                                <td><?php echo $fetchblocked['mobile_no'] ?></td>
                                 <td><?php echo $fetchblocked['reason'] ?></td>								
								</tr>
								<?php } ?>
								</tbody>
								</table>																		  							  
								</div>
						
						</div>
						</div>
						</div>
								<div id="add">
								<br>
								
				           <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3>
                                   		<b>Add to Block</b>
                                	</h3>
                                </div>
                            </div>
							<br>
                            <div class="row">
                    			<div class="col-md-6 col-xs-12">
						<div style="overflow-x:auto;">
						<form>
						<div class="form-group">
                                		<label>
                                    		Date
                                   	 	</label>
                                    	<input type="date" class="form-control" data-validetta="required" value="" name="blocked_date" id="blocked_date">
                                	</div>									
									<div class="form-group">
                                		<label>
                                    		Email_ID
                                   	 	</label>
                                    	<input type="email" class="form-control" data-validetta="required" value="" name="email_id" id="email_id">
                                	</div>
									<div class="form-group">
                                		<label>
                                    		Mobile Number
                                   	 	</label>
                                    	<input type="text" class="form-control" data-validetta="required" value="" name="mobile_no" id="mobile_no">
                                	</div>
									                                	<div class="form-group">
                                		<label>
                                    		Reason
                                    	</label>
                                    	<textarea class="form-control" name="reason" id="reason"></textarea>
                                    </div>
									<input type="submit" name="blockeduser" id="blockeduser" value="Submit" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:56px">
                                 
									</form>
											</div>
						
						</div>
						</div>
						</div>
								
                                </div>
								
								</div>
								
								
 
							<script>

							$("#tabs").tabs({
								activate: function (event, ui) {
									var active = $('#tabs').tabs('option', 'active');
									$("#tabid").html('the tab id is ' + $("#tabs ul>li a").eq(active).attr("href"));

								}
							}

							);
							</script>
                             
                           
							
                            
                           
							
							
                        </div>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
				
				
				<style>
					.ui-widget-header
					{
						background:#edf1f5;
						//border:0px solid #e3249a;
						
					}
					.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default
					{
						background:#1e5d77;
						border:1px solid #1e5d77;
						color:#FFFFFF;
					}
					.ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active
					{
						background:#de3c94;
						border:1px solid #de3c94;
						color:#FFFFFF;
					}
					.ui-state-active a, .ui-state-active a:link, .ui-state-active a:visited
					{
						color:#FFFFFF;
					}
					.ui-state-default a, .ui-state-default a:link, .ui-state-default a:visited
					{
						color:#FFFFFF;
					}
					body {
					background-color: #FFFFFF;
				}
				#tabs {
					width: 100%;
					margin-left: auto;
					margin-right: auto;
					margin-top: 10px;
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
					  background-color: transparent;
					}
					</style>
               </div>
					
					
					
									<?php include('footer.php') ?>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
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
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}

</script>
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

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
 
</body>

</html>
 