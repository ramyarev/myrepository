<?php

ob_start();
session_start();
require('../config.php');

if($_SESSION['adminid']=='')
{
header('location:../adminlogin.php');
}

if($_POST['addfeature']=='Add Plan Feature')
{
	$plan_id=$_POST['plan_id'];
	$default_amount=$_POST['default_amount'];
	$default_duration=$_POST['default_duration'];
	$default_message=$_POST['default_message'];
	$default_horoscope=$_POST['default_horoscope'];
	$default_mobileno=$_POST['default_mobileno'];
	$default_allaccess=$_POST['default_allaccess'];
	$video_upload=$_POST['video_upload'];
	$online_chat=$_POST['online_chat'];
	$unlimited_message=$_POST['unlimited_message'];
	$unlimited_horoscope=$_POST['unlimited_horoscope'];
	$unlimited_mobileno=$_POST['unlimited_mobileno'];
	$unlimited_allaccess=$_POST['unlimited_allaccess'];
	$profile_highlighter=$_POST['profile_highlighter'];
	$highlighter_days=$_POST['highlighter_days'];
	
	
	$unlimited_day="";
	
	if($_POST['unlimited_day']!='')
	{
		$unlimited_day=implode(",",$_POST['unlimited_day']);
	}
	
	$unlimited_noofdays=$_POST['unlimited_noofdays'];
	$unlimited_intime=$_POST['unlimited_intime'];
	$unlimited_outtime=$_POST['unlimited_outtime'];
	
	$unlimitedplan=$_POST['unlimitedplan'];
	$allow_premiumprofile=$_POST['allow_premiumprofile'];
	$premiumplan=$_POST['premiumplan'];
	$personal_assistance=$_POST['personal_assistance'];
	$door_step_assistance=$_POST['door_step_assistance'];
	
	if($_GET['id']!='')
	{
		
		$checkrow=mysqli_query($conn,"select * from tbl_plan_feature where plan_id='".$plan_id."' and id='".$_GET['id']."' and delete_status=0");
		//echo "select * from tbl_plan_feature where plan_id='".$plan_id."' and plan_id!='".$plan_id."' and delete_status=0";exit;
		$rowcount=mysqli_num_rows($checkrow);
		
		if($rowcount!=1)
		{
		
			echo "<script>alert('Feature Already Added for this plan');</script>";
		}
		else
		{
			mysqli_query($conn,"update tbl_plan_feature set plan_id='".$plan_id."',default_amount='".$default_amount."',default_duration='".$default_duration."',default_message='".$default_message."',default_horoscope='".$default_horoscope."',default_mobileno='".$default_mobileno."',default_allaccess='".$default_allaccess."',video_upload='".$video_upload."',online_chat='".$online_chat."',unlimited_message='".$unlimited_message."',unlimited_horoscope='".$unlimited_horoscope."',unlimited_mobileno='".$unlimited_mobileno."',unlimited_allaccess='".$unlimited_allaccess."',profile_highlighter='".$profile_highlighter."',highlighter_days='".$highlighter_days."',unlimited_day='".$unlimited_day."',unlimited_noofdays='".$unlimited_noofdays."',unlimited_intime='".$unlimited_intime."',unlimited_outtime='".$unlimited_outtime."',unlimitedplan='".$unlimitedplan."',allow_premiumprofile='".$allow_premiumprofile."',premiumplan='".$premiumplan."',personal_assistance='".$personal_assistance."',door_step_assistance='".$door_step_assistance."' where id='".$_GET['id']."'");
			header("Location:membership_plan.php");
		}
		
	}
	else
	{
		
		$checkrow=mysqli_query($conn,"select * from tbl_plan_feature where plan_id='".$plan_id."' and delete_status=0");
		$rowcount=mysqli_num_rows($checkrow);
		
		if($rowcount>0)
		{
		
			echo "<script>alert('Feature Already Added for this plan');</script>";
		}
		else
		{
			mysqli_query($conn,"insert into  tbl_plan_feature (plan_id,default_amount,default_duration,default_message,default_horoscope,default_mobileno,default_allaccess,video_upload,online_chat,unlimited_message,unlimited_horoscope,unlimited_mobileno,unlimited_allaccess,profile_highlighter,highlighter_days,unlimited_day,unlimited_noofdays,unlimited_intime,unlimited_outtime,unlimitedplan,allow_premiumprofile,premiumplan,personal_assistance,door_step_assistance) values ('".$plan_id."','".$default_amount."','".$default_duration."','".$default_message."','".$default_horoscope."','".$default_mobileno."','".$default_allaccess."','".$video_upload."','".$online_chat."','".$unlimited_message."','".$unlimited_horoscope."','".$unlimited_mobileno."','".$unlimited_allaccess."','".$profile_highlighter."','".$highlighter_days."','".$unlimited_day."','".$unlimited_noofdays."','".$unlimited_intime."','".$unlimited_outtime."','".$unlimitedplan."','".$allow_premiumprofile."','".$premiumplan."','".$personal_assistance."','".$door_step_assistance."')");
			
			header("Location:membership_plan.php");
		}
	}
	
	
	
}


	$getfeature=mysqli_fetch_array(mysqli_query($conn,"select * from tbl_plan_feature where id='".$_GET['id']."' and delete_status=0"));
	
	$getcategory=mysqli_fetch_array(mysqli_query($conn,"select * from tbl_plan where delete_status=0 and id='".$getfeature['plan_id']."'"));
	
	if($getfeature['profile_highlighter']=='on')
	{
		$highchecked= "checked";
	}
	else {
		$highchecked= "";
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
	var category='<?php echo $getcategory['id']; ?>';
	var featureid='<?php echo $_GET['id']; ?>';
		
	$.ajax({
        url: 'ajaxplan.php',
        type: 'GET',
        data: { category: category,featureid: featureid} ,
        contentType: 'application/json; charset=utf-8',
        success: function (response) {
			
			document.getElementById("result").innerHTML = response;
			<?php if($highchecked=='checked')
			{	?>
			document.getElementById('highlighterday_div').style.visibility="visible";
			<?php } else { ?>
			document.getElementById('highlighterday_div').style.visibility="hidden";
			<?php } ?>
			document.getElementById('unlimitedplan').value="<?php echo $getfeature['unlimitedplan']; ?>";
			document.getElementById('premiumplan').value="<?php echo $getfeature['premiumplan']; ?>";
        },
        error: function () {
            alert("error");
        }
    }); 
	
	
} );

function getdata(category)
{
	$.ajax({
        url: 'ajaxplan.php',
        type: 'GET',
        data: { category: category} ,
        contentType: 'application/json; charset=utf-8',
        success: function (response) {
		
			document.getElementById("result").innerHTML = response;
			document.getElementById('highlighterday_div').style.visibility="hidden";
        },
        error: function () {
            alert("error");
        }
    }); 
}

function enableday()
{
	if($('#profile_highlighter').is(":checked")==true)
	{
		document.getElementById('highlighterday_div').style.visibility="visible";
	}
	else
	{
		document.getElementById('highlighterday_div').style.visibility="hidden";
	}
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
                        <h4 class="page-title">Add Plan Feature</h4>
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
							
							 <div class="row">
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label>
										Plan Name:
									</label>
									<select name="plan_id" id="plan_id" class="form-control" onchange="getdata(this.value)">
									<option value="">Select Plan Name</option>
								   <?php $getplan=mysqli_query($conn,"select * from tbl_plan where delete_status=0");
									while($fetchplan=mysqli_fetch_array($getplan))
									{
								   ?>
								   <option value="<?php echo $fetchplan['id']; ?>"><?php echo $fetchplan['plan_name']; ?></option>
									<?php } ?>
								   </select>
								   <script>
								   document.getElementById('plan_id').value="<?php echo $getfeature['plan_id']; ?>";
								   </script>
								</div>
								
								<div class="form-group">
									<label>
										<h4><b>DEFAULT:</b></h4>
									</label>
								</div>
								
								</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-xs-12">
                            		<div class="form-group">
                                		<label>
                                    		Amount:
                                   	 	</label>
                                    	<input type="text" class="form-control" data-validetta="required" value="<?php echo $getfeature['default_amount']; ?>" name="default_amount" id="default_amount">
                                	</div>
                                                             
                            	</div>
                                
                                
                                <div class="col-md-6 col-xs-12">
								
								<div class="form-group">
								<label>
									Duration:
								</label>
										<input type="text" class="form-control" value="<?php echo $getfeature['default_duration']; ?>" name="default_duration" id="default_duration" data-validetta="required">
								</div>
								
								</div>
								
								<div class="col-md-6 col-xs-12">
                            		<div class="form-group">
                                		<label>
                                    		Allow Message:
                                   	 	</label>
                                    	<input type="text" class="form-control" data-validetta="required" value="<?php echo $getfeature['default_message']; ?>" name="default_message" id="default_message">
                                	</div>
                                                             
                            	</div>
                                
                                
                                <div class="col-md-6 col-xs-12">
								
								<div class="form-group">
								<label>
									Allow Horoscope:
								</label>
										<input type="text" class="form-control" value="<?php echo $getfeature['default_horoscope']; ?>" name="default_horoscope" id="default_horoscope" data-validetta="required">
								</div>
								
								</div>
								
								<div class="col-md-6 col-xs-12">
                            		<div class="form-group">
                                		<label>
                                    		Allow Mobile No Access:
                                   	 	</label>
                                    	<input type="text" class="form-control" data-validetta="required" value="<?php echo $getfeature['default_mobileno']; ?>" name="default_mobileno" id="default_mobileno">
                                	</div>
                                                             
                            	</div>
                                
                                <div class="col-md-6 col-xs-12">
								
								<div class="form-group">
								<label>
									Allow All Access Details:
								</label>
										<input type="text" class="form-control" value="<?php echo $getfeature['default_allaccess']; ?>" name="default_allaccess" id="default_allaccess" data-validetta="required">
								</div>
								
								</div>
								
								<div class="col-md-6 col-xs-12">
								
								<div class="form-group">
								<label>
									Video Upload:
								</label>
									<?php 
										if($getfeature['video_upload']=='on')
										{
											$checked= "checked";
										}
										else {
											$checked= "";
										}
										
										if($getfeature['online_chat']=='on')
										{
											$chatchecked= "checked";
										}
										else {
											$chatchecked= "";
										}
									?>
										<label class="switch">
									  <input type="checkbox" name="video_upload" id="video_upload" <?php echo $checked; ?>>
									  <span class="slider round"></span>
									</label>
								</div>
								
								</div>
								
								<div class="col-md-6 col-xs-12">
                            		<div class="form-group">
                                		<label>
                                    		Online Chat:
                                   	 	</label>
                                    	<label class="switch">
									  <input type="checkbox" name="online_chat" id="online_chat" <?php echo $chatchecked; ?>>
									  <span class="slider round"></span>
									</label>
                                	</div>
                                                             
                            	</div>
								</div>
								
								<div id="result"></div>
								</div>
								
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
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul>
                                <li><b>Layout Options</b></li>
                                <li>
                                    <div class="checkbox checkbox-info">
                                        <input id="checkbox1" type="checkbox" class="fxhdr">
                                        <label for="checkbox1"> Fix Header </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox checkbox-warning">
                                        <input id="checkbox2" type="checkbox" class="fxsdr">
                                        <label for="checkbox2"> Fix Sidebar </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox checkbox-success">
                                        <input id="checkbox4" type="checkbox" class="open-close">
                                        <label for="checkbox4"> Toggle Sidebar </label>
                                    </div>
                                </li>
                            </ul>
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" theme="default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" theme="green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" theme="gray" class="yellow-theme">3</a></li>
                                <li><a href="javascript:void(0)" theme="blue" class="blue-theme">4</a></li>
                                <li><a href="javascript:void(0)" theme="purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" theme="megna" class="megna-theme working">6</a></li>
                                <li><b>With Dark sidebar</b></li>
                                <br/>
                                <li><a href="javascript:void(0)" theme="default-dark" class="default-dark-theme">7</a></li>
                                <li><a href="javascript:void(0)" theme="green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" theme="gray-dark" class="yellow-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" theme="blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" theme="purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" theme="megna-dark" class="megna-dark-theme">12</a></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/varun.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/genu.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/ritesh.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/arijit.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/govinda.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/hritik.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/john.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/pawandeep.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
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
