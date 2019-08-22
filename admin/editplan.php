<?php

ob_start();
session_start();
require('../config.php');

if($_SESSION['adminid']=='')
{
header('location:../adminlogin.php');
}

if($_POST['addplan']=='Edit Plan')
{
	$plan_name=$_POST['plan_name'];
	$duration=$_POST['duration'];
	$allow_contacts=$_POST['allow_contacts'];
	$allow_profile=$_POST['allow_profile'];
	$allow_message=$_POST['allow_message'];
	$video_upload=$_POST['video_upload'];
	$online_chat=$_POST['online_chat'];
	$amount=$_POST['amount'];
	mysqli_query($conn,"update tbl_membership_plan set plan_name='".$plan_name."',duration='".$duration."',allow_contacts='".$allow_contacts."',allow_profile='".$allow_profile."',allow_message='".$allow_message."',video_upload='".$video_upload."',online_chat='".$online_chat."',amount='".$amount."'");
	header("Location:membership_plan.php");
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
	
	
} );


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
                        <h4 class="page-title">Add Membership Plan</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> <a href="https://themeforest.net/item/elite-admin-responsive-dashboard-web-app-kit-/16750820" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy Now</a>
                        <ol class="breadcrumb">
                            <li><a href="index.php">Matrimony</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--row -->
                <div class="row">
				
				<br><br>
                   <div class="col-sm-12">
				   
                        <div class="white-box" class="col-sm-12">
                            <div class="r-icon-stats">
                           <div class="white-box" class="col-sm-12">
                            <div class="r-icon-stats">
							<form method="POST">
							<?php 
							$getrow=mysqli_query($conn,"select * from tbl_membership_plan where id='".$_GET['id']."'");
							$fetchdata=mysqli_fetch_array($getrow);
							?>
                           <table  id="member" class="display" style="width:100%">
						   <tr>
						   <td>Plan Name</td>
						   <td><input type="text" name="plan_name" id="plan_name" required value="<?php echo $fetchdata['plan_name'];?>"></td>
						   </tr>
						   <tr>
						   <td>Duration Type</td>
						   <td><input type="text" name="duration" id="duration" required value="<?php echo $fetchdata['duration'];?>"></td>
						   </tr>
						   <tr>
						   <td>Allow Contacts</td>
						   <td><input type="text" name="allow_contacts" id="allow_contacts" required value="<?php echo $fetchdata['allow_contacts'];?>"></td>
						   </tr>
						   <tr>
						   <td>Allow Profile</td>
						   <td><input type="text" name="allow_profile" id="allow_profile" required value="<?php echo $fetchdata['allow_profile'];?>"></td>
						   </tr>
						   <tr>
						   <td>Allow Message</td>
						   <td><input type="text" name="allow_message" id="allow_message" required value="<?php echo $fetchdata['allow_message'];?>"></td>
						   </tr>
						   <tr>
						   <td>Amount</td>
						   <td><input type="text" name="amount" id="amount" value="<?php echo $fetchdata['amount'];?>"></td>
						   </tr>
						   <tr>
						   <td>Video Upload</td>
						   <td>
						   <?php
						   if($fetchdata['video_upload']=="on"){
							   $video="checked";
						   }
						   else
						   {
							    $video="";
						   }
						   
						   if($fetchdata['online_chat']=="on"){
							   $chat="checked";
						   }
						   else
						   {
							    $chat="";
						   }
						   ?>
						   <label class="switch">
							  <input type="checkbox" name="video_upload" id="video_upload" <?php echo $video; ?>>
							  <span class="slider round"></span>
							</label></td>
						   </tr>
						   <tr>
						   <td>Online Chat</td>
						   <td>
						   <label class="switch">
							  <input type="checkbox" name="online_chat" id="online_chat" <?php echo $chat; ?>>
							  <span class="slider round"></span>
							</label>
						   </td>
						   </tr>
						   
						   
						   <tr>
						   <td>
						   <input type="submit" name="addplan" id="addplan" value="Edit Plan" class="btn btn-custom btn-block" style="width:100px">
						   
						   </td>
						   </tr>
					
							</table>
							</form>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
                </div>
				
				
               <style>
			   
			   .switch {
			  position: relative;
			  display: inline-block;
			  width: 60px;
			  height: 34px;
			}

			.switch input { 
			  opacity: 0;
			  width: 0;
			  height: 0;
			}

			.slider {
			  position: absolute;
			  cursor: pointer;
			  top: 0;
			  left: 0;
			  right: 0;
			  bottom: 0;
			  background-color: #ccc;
			  -webkit-transition: .4s;
			  transition: .4s;
			}

			.slider:before {
			  position: absolute;
			  content: "";
			  height: 26px;
			  width: 26px;
			  left: 4px;
			  bottom: 4px;
			  background-color: white;
			  -webkit-transition: .4s;
			  transition: .4s;
			}

			input:checked + .slider {
			  background-color: #01c0c8;
			}

			input:focus + .slider {
			  box-shadow: 0 0 1px #2196F3;
			}

			input:checked + .slider:before {
			  -webkit-transform: translateX(26px);
			  -ms-transform: translateX(26px);
			  transform: translateX(26px);
			}

			/* Rounded sliders */
			.slider.round {
			  border-radius: 34px;
			}

			.slider.round:before {
			  border-radius: 50%;
			}
			   table.dataTable.row-border tbody th, table.dataTable.row-border tbody td, table.dataTable.display tbody th, table.dataTable.display tbody td
			   {
				   border-top:none;
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
</body>

</html>
