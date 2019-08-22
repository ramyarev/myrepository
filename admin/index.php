<?php
ob_start();
session_start();
require('../config.php');

if($_SESSION['adminid']=='')
{
header('location:../adminlogin.php');
}

$allmember=mysqli_query($conn,"select * from tbl_user");
$allmembercount=mysqli_num_rows($allmember);

$paidmember=mysqli_query($conn,"select * from tbl_user where paid_status=1");
$paidmembercount=mysqli_num_rows($paidmember);


$malemember=mysqli_query($conn,"select * from tbl_user where gender='male'");
$malemembercount=mysqli_num_rows($malemember);

$femalemember=mysqli_query($conn,"select * from tbl_user where gender='female'");
$femalemembercount=mysqli_num_rows($femalemember);

$todaymember=mysqli_query($conn,"SELECT * FROM tbl_user WHERE DATE(profile_created_by) = CURDATE()");
$todaymembercount=mysqli_num_rows($todaymember);


$lastweekmember=mysqli_query($conn,"select * from tbl_user where  profile_created_by >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)");
$lastweekmembercount=mysqli_num_rows($lastweekmember);

$lastmonthmember=mysqli_query($conn,"select * from tbl_user where  profile_created_by >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)");
$lastmonthmembercount=mysqli_num_rows($lastmonthmember);

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
}

th, td {
  text-align: left;
  padding: 16px;
  border-bottom:1px solid #d5d5d5;
}

tr:nth-child(even) {
  background-color: #f2f2f2
}
</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
	
	$('#member').DataTable( {
		 "ordering": false
		  // "searching": false
		
	} );
	} );
</script>
					
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2",
	animationEnabled: true,
	title: {
		text: ""
	},
	subtitles: [{
		text: "Paid Unpaid and Approval Details",
		fontSize: 16
	}],
	data: [{
		type: "pie",
		indexLabelFontSize: 18,
		radius: 80,
		indexLabel: "{label} - {y}",
		yValueFormatString: "###0.0\"%\"",
		click: explodePie,
		dataPoints: [
			{ y: 1, label: "Paid" },
			{ y: 1, label: "Unpaid"},
			{ y: 1, label: "Approval" },
			
		]
	}]
});
chart.render();

function explodePie(e) {
	for(var i = 0; i < e.dataSeries.dataPoints.length; i++) {
		if(i !== e.dataPointIndex)
			e.dataSeries.dataPoints[i].exploded = false;
	}
}
 
}
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
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
                        <h4 class="page-title"> <a href="index.php">Dashboard</a></h4>
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
                <div class="row">
                    <div class="col-md-3 col-sm-6">
					<a href="members.php?type=today">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-megna" style="width: 50px;height: 50px;padding: 10px;"></i>
                                <div class="bodystate">
                                    <h4><?php echo $todaymembercount; ?></h4>
                                    <span class="text-muted" style="font-size:12px;">Today Member(s)</span>
                                </div>
                            </div>
                        </div>
						</a>
                    </div>
                    <div class="col-md-3 col-sm-6">
					<a href="members.php?type=lweek">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-info" style="width: 50px;height: 50px;padding: 10px;"></i>
                                <div class="bodystate">
                                    <h4><?php echo $lastweekmembercount; ?></h4>
                                    <span class="text-muted" style="font-size:12px;">Last Week Member(s)</span>
                                </div>
                            </div>
                        </div>
						</a>
                    </div>
                    <div class="col-md-3 col-sm-6">
					<a href="members.php?type=lmonth">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-success" style="width: 50px;height: 50px;padding: 10px;"></i>
                                <div class="bodystate">
                                    <h4><?php echo $lastmonthmembercount; ?></h4>
                                    <span class="text-muted" style="font-size:12px;">Last Month Member(s)</span>
                                </div>
                            </div>
                        </div>
						</a>
                    </div>
                    <div class="col-md-3 col-sm-6">
					<a href="members.php?type=all">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-inverse" style="width: 50px;height: 50px;padding: 10px;"></i>
                                <div class="bodystate">
                                    <h4><?php echo $allmembercount; ?></h4>
                                    <span class="text-muted" style="font-size:12px;">Total Member(s)</span>
									
                                </div>
                            </div>
                        </div>
						</a>
                    </div>
                </div>
				
				
				<div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
					<a href="members.php?type=male">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-megna" style="width: 50px;height: 50px;padding: 10px;"></i>
                                <div class="bodystate">
                                    <h4><?php echo $malemembercount; ?></h4>
                                    <span class="text-muted" style="font-size:12px;">Male Member(s)</span>
									
                                </div>
                            </div>
                        </div>
						</a>
                    </div>
                    <div class="col-md-3 col-sm-6">
					<a href="members.php?type=female">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-info" style="width: 50px;height: 50px;padding: 10px;"></i>
                                <div class="bodystate">
                                    <h4><?php echo $femalemembercount; ?></h4>
                                    <span class="text-muted" style="font-size:12px;">Female Member(s)</span>
									
                                </div>
                            </div>
                        </div>
						</a>
                    </div>
                    <div class="col-md-3 col-sm-6">
					<a href="members.php?type=active">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-success" style="width: 50px;height: 50px;padding: 10px;"></i>
                                <div class="bodystate">
                                    <h4></h4>
                                    <span class="text-muted" style="font-size:12px;">Active Member(s)</span>
                                </div>
                            </div>
                        </div>
						</a>
                    </div>
                    <div class="col-md-3 col-sm-6">
					<a href="members.php?type=paid">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-inverse" style="width: 50px;height: 50px;padding: 10px;"></i>
                                <div class="bodystate">
                                    <h4><?php echo $paidmembercount; ?></h4>
                                    <span class="text-muted" style="font-size:12px;">Paid Member(s)</span>
                                </div>
                            </div>
                        </div>
						</a>
                    </div>
                </div>
                <!--/row -->
				<div class="row">
                    <div class="col-md-4 col-sm-12 col-xs-12">
					
					<a href="members.php?type=paid">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="fa fa-credit-card-alt" aria-hidden="true" style="width: 50px;height: 50px;padding: 10px;"> </i>
                                <div class="bodystate">
                                    <h3>TOTAL PAYMENTS</h3>
									<h4>0</h4>
                                    <span class="text-muted" style="font-size:12px;"></span>
                                </div>
                            </div>
                        </div>
						</a>                    
					</div>
					</div>
					<div class="row">
					<div class="col-md-3 col-sm-6">
					<a href="members.php?type=male">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                 <i class="fa fa-credit-card-alt bg-megna" aria-hidden="true" style="width: 50px;height: 50px;padding: 10px;"> </i>
                                <div class="bodystate">
                                    
                                    <span class="text-muted" style="font-size:12px;">Today</span>
									<h4>0</h4>
                                </div>
                            </div>
                        </div>
						</a>
                    </div>
                    <div class="col-md-3 col-sm-6">
					<a href="members.php?type=female">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="fa fa-credit-card-alt bg-info" aria-hidden="true" style="width: 50px;height: 50px;padding: 10px;"> </i>
                                <div class="bodystate">
                                   
                                    <span class="text-muted" style="font-size:12px;">Lastweek</span>
									<h4>0</h4>
                                </div>
                            </div>
                        </div>
						</a>
                    </div>
                    <div class="col-md-3 col-sm-6">
					<a href="members.php?type=active">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                 <i class="fa fa-credit-card-alt bg-success" aria-hidden="true" style="width: 50px;height: 50px;padding: 10px;"> </i>
                                <div class="bodystate">
                                   
                                    <span class="text-muted" style="font-size:12px;">Last Month</span>
									<h4>0</h4>
                                </div>
                            </div>
                        </div>
						</a>
                    </div>
                    <div class="col-md-3 col-sm-6">
					<a href="members.php?type=paid">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="fa fa-credit-card-alt bg-inverse" aria-hidden="true" style="width: 50px;height: 50px;padding: 10px;"> </i>
                                <div class="bodystate">
                                   
                                    <span class="text-muted" style="font-size:12px;">Last Year</span>
									<h4>0</h4>
                                </div>
                            </div>
                        </div>
						</a>
                    </div>
					</div>
					<div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div id="chartContainer" style="height: 370px; width: 100%;">

</div>
						</div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Total Members Joined</h3>
                            <ul class="list-inline text-center">
                                <li>
                                    <h5><i class="fa fa-circle m-r-5" style="color: #01c0c8;"></i>Total Member</h5>
                                </li>
                                
                            </ul>
                            <div id="morris-area-chart2" style="height: 370px;"></div>
                        </div>
                    </div>
                </div>
                
                <!-- .row -->
				<div class="row">
					<div class="col-sm-12">			
                        <div class="white-box">
						<div style="overflow-x:auto;">
						<table  id="member" class="display" style="width:100%">
						
						  <h3><b>RECENT Jointed MEMBERS</b></h3>
							  <tr>
								<th>Status</th>
								<th onclick="sortTable(0)">Image</th>
								<th onclick="sortTable(1)">Matri_ID</th>
								<th onclick="sortTable(0)">Name</th>
								<th>Email</th>
								<th>Gender</th>								
								<th>Marital Status</th>
								<th>Location</th>
								<th>Registered On</th>								
							  </tr>
							 
							  <tbody>
							  <?php 
								
								$query=mysqli_query($conn,"select * from tbl_user where delete_status=0 order by profile_created_by desc limit 0,12");				
								
								while($fetchdata=mysqli_fetch_array($query))
								{
								?>
							  <tr>
							  <td>
							  <?php if($fetchdata['login_way']=='desktop') { ?>
							  <i class="icon-star icon-large icon-d"></i>
							  <br>
							  <span><?php echo $fetchdata['lastlogin'] ?></span>
							   <?php } else if($fetchdata['login_way']=='mobile') { ?>
							  <i class="icon-star icon-large icon-c"></i>
							  <br>
							  <span><?php echo $fetchdata['lastlogin'] ?></span>
							  
							  <?php } else { ?>
							  <br>
							  <i class="icon-star icon-large icon-a"></i>
							  <span><?php echo $fetchdata['lastlogin'] ?></span>
							  <?php } ?>
							  </td>
							  <td><?php if($fetchdata['profile_image']!='') { ?>
							  <img src="../uploads/profile_image/<?php echo $fetchdata['profile_image']; ?>" width="100" height="100">
							  <?php } else { ?>
							  <img src="../images/profile.png" width="100" height="100">
							  <?php } ?></td>
							  <td>NM123</td>
								<td><?php echo $fetchdata['name']; ?></td>
								<td><?php echo $fetchdata['email']; ?></td>
								<td><?php echo $fetchdata['gender']; ?></td>
								<td><?php echo $fetchdata['marital_status']; ?></td>
								<td><?php $fetchcity=mysqli_fetch_array(mysqli_query($conn,"select * from tbl_city where id='".$fetchdata['home_city']."'"));
								echo $fetchcity['city'];
								?></td>
								<td><?php echo date("d/m/Y", strtotime($fetchdata['profile_created_by'])); ?></td>								
								</tr>
								<?php } ?>
								</tbody>
								</table>
								</div>
								
								<style>
								.icon-d {
									color: red;
									position: relative;
									-webkit-text-stroke-width: 1px;
									-webkit-text-stroke-color: red;
								}
								.icon-c {
									color: green;
									position: relative;
									-webkit-text-stroke-width: 1px;
									-webkit-text-stroke-color: green;
								}
								</style>
						</div>
						</div>
						</div>
						</div>
                
                <!-- /.right-sidebar -->
            </div> 
			</div>
            <!-- /.container-fluid -->
			
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

</body>

</html>
