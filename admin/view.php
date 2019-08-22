<?php
//ini_set('display_errors','on');

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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

 <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/base/jquery-ui.css" rel="stylesheet">
 
 <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
 
 
<script>
$(document).ready(function() {
	$('#member').DataTable( {
		
	} );
	var type3="user";
	var type4="partner";
	
	var id ="<?php echo $getdata['state']; ?>";
	
	$.ajax({
	url: 'ajaxgetcity.php',
	type: 'GET',
	data: { state_id: id,types:type3} ,
	contentType: 'application/json; charset=utf-8',
	success: function (response) {

		document.getElementById("citydiv").innerHTML='';
		document.getElementById("citydiv").innerHTML=response;
		document.getElementById('home_city').value="<?php echo $getdata['home_city']; ?>";
	},
	error: function () {
		alert("error");
	}
}); 

var id1 ="<?php echo $fetchpartnerdata['state']; ?>";
	
	$.ajax({
	url: 'ajaxgetcity.php',
	type: 'GET',
	data: { state_id: id1,types:type4} ,
	contentType: 'application/json; charset=utf-8',
	success: function (response) {

		document.getElementById("partnercitydiv").innerHTML='';
		document.getElementById("partnercitydiv").innerHTML=response;
		document.getElementById('partnerpreferred_cities').value="<?php echo $fetchpartnerdata['preferred_cities']; ?>";
	},
	error: function () {
		alert("error");
	}
}); 


var casteid ="<?php echo $getdata['caste']; ?>";
	
	$.ajax({
	url: 'ajaxsubcaste.php',
	type: 'GET',
	data: { caste_id: casteid,types:type3} ,
	contentType: 'application/json; charset=utf-8',
	success: function (response) {

		document.getElementById("subcastediv").innerHTML='';
		document.getElementById("subcastediv").innerHTML=response;
		document.getElementById('sub_caste').value="<?php echo $getdata['sub_caste']; ?>";
	},
	error: function () {
		alert("error");
	}
}); 

var casteid1 ="<?php echo $fetchpartnerdata['caste']; ?>";
	
	$.ajax({
	url: 'ajaxsubcaste.php',
	type: 'GET',
	data: { caste_id: casteid1,types:type4} ,
	contentType: 'application/json; charset=utf-8',
	success: function (response) {

		document.getElementById("partnersubcastediv").innerHTML='';
		document.getElementById("partnersubcastediv").innerHTML=response;
		document.getElementById('partnersub_caste').value="<?php echo $fetchpartnerdata['sub_caste']; ?>";
	},
	error: function () {
		alert("error");
	}
}); 

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
                        <h4 class="page-title">Edit Member</h4>
                    </div>
                    <!--div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> <a href="https://themeforest.net/item/elite-admin-responsive-dashboard-web-app-kit-/16750820" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy Now</a>
                        <ol class="breadcrumb">
                            <li><a href="index.php">Matrimony</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--row -->
                <script>
				function enableedit()
				{
					document.getElementById('addbasic').style.visibility="visible";
					document.getElementById('addeducation').style.visibility="visible";
					document.getElementById('addfamily').style.visibility="visible";
					document.getElementById('addreligious').style.visibility="visible";
					document.getElementById('addlocation').style.visibility="visible";
					document.getElementById('adduploads').style.visibility="visible";
					document.getElementById('addpartner').style.visibility="visible";
				}
                </script>
				<br><br>
                   <div class="col-sm-12">
				   
                        <div class="white-box" class="col-sm-12">
                            <div class="r-icon-stats">
                          <div class="row" >
						  
                    <div class="col-sm-12">
					<!--div align="right"><a href="members.php?type=all.php" align="right"><b><i class="fa fa-backward" aria-hidden="true"></i>Back</b></a>
						  </div-->
                        <div class="white-box">
						
                             <form method="post" name="user_detail" id="user_detail" enctype="multipart/form-data">
                        	
							
								<div id="tabs">
								<ul style="border:none">
									<li><a href="#basic">Basic Details</a>
									</li>
									<li><a href="#education">Education / Profession</a>
									</li>
									<li><a href="#family">Family Details</a>
									</li>
									<li><a href="#plan">Plan Details</a>
									</li>
									<li><a href="#payment">Payment History</a>
									</li>
									<li><a href="#uploads">Photos</a>
									</li>
									
									<li><a href="#partner">Partner Preference</a>
									</li>
								</ul>
								<div id="basic">
								<br>
								<br>
                          <div class="row">
                              <div class="col-sm-12">
                                  <div class="white-box">
                                     <div class="col-lg-12 col-xs-12 neMrgATop10">
							<h3>BASIC DETAILS</h3>
            	<div class="box box-solid">
            		<div class="box-header with-border">
                		<h2 class="box-title"><div class="row">
						<div class="col-md-8">
                    		<b>Bala (NM_123)</b></div>
							<div class="col-sm-3"
							<h4 style="padding-bottom:10px;">
                                    	(<a href="addmember.php">EDIT MEMBER</a>)
                                </h4>
								</div>
								</div>
                    	</h2>
                	</div>
                	<div class="box-body neAdminProfileView">
                    	<div class="row">
                    		<div class="col-md-3 col-xs-12">
							<img src="../uploads/profile_image/images.jpg" width="100" height="100">
							</div>
                            <div class="col-md-9 col-xs-12">
                            
                            
                               
                                
                            	<h4 class="col-xs-12" style="border-bottom:1px solid rgba(239, 239, 239, 1);padding-bottom:10px;">
                                    	
                                </h4>
                       	 		<div class="form-group col-md-6 col-xs-12">
                           	 		<div class="row">
                                		<label class="col-xs-5">
                                   	 		Full Name:
                                		</label>
                               	 		<span class="col-xs-7">Bala</span>
                            		</div>
                        		 </div>
                                 
                                 <div class="form-group col-md-6 col-xs-12">
                           	 		<div class="row">
                                		<label class="col-xs-5">
                                   	 		Gender:
                                		</label>
                               	 		<span class="col-xs-7">Male</span>
                            		</div>
                        		 </div>
                                 
                                 <div class="form-group col-md-6 col-xs-12">
                           	 		<div class="row">
                                		<label class="col-xs-5">
                                   	 		Age:
                                		</label>
                               	 		<span class="col-xs-7">22</span>
                            		</div>
                        		 </div>
                                 
                                 
                            	<div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Date of Birth:
                                			</label>
                               	 			<span class="col-xs-7">10-05-1997</span>
                            		  </div>
                        		  </div>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Height:
                                			</label>
                               	 			<span class="col-xs-7">160cm</span>
                            		  </div>
                        		  </div>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Weight:
                                			</label>
                               	 			<span class="col-xs-7">55 KG</span>
                            		  </div>
                        		  </div>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Mother Tongue:
                                			</label>
                               	 			<span class="col-xs-7">Tamil</span>
                            		  </div>
                        		  </div>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Marital Status:
                                			</label>
                               	 			<span class="col-xs-7">
											Unmarried</span>
                            		  </div>
                        		  </div>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Skin Tone:
                                			</label>
                               	 			<span class="col-xs-7">Normal</span>
                            		  </div>
                        		  </div>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Eating Habit:
                                			</label>
                               	 			<span class="col-xs-7"></span>
                            		  </div>
                        		  </div>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Drinking:
                                			</label>
                               	 			<span class="col-xs-7"></span>
                            		  </div>
                        		  </div>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Body type:
                                			</label>
                               	 			<span class="col-xs-7"></span>
                            		  </div>
                        		  </div>
                                  
                                  
                                  <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Smoking:
                                			</label>
                               	 			<span class="col-xs-7">></span>
                            		  </div>
                        		  </div>
                                  
                                  <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Profile Created By:
                                			</label>
                               	 			<span class="col-xs-7"></span>
                            		  </div>
                        		  </div>
                                  
                                  
                                <h4 class="col-xs-12" style="border-bottom:1px solid rgba(239, 239, 239, 1);padding-bottom:10px;">
                                    	<b>Religious Information</b>
                                 </h4>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Religion:
                                			</label>
                               	 			<span class="col-xs-7"></span>
                            		  </div>
                        		  </div>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Caste:
                                			</label>
                               	 			<span class="col-xs-7"><span>
                            		  </div>
                        		  </div>
                                  
                                   <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Subcaste:
                                			</label>
                               	 			<span class="col-xs-7"></span>
                            		  </div>
                        		  </div>
                              
                                   <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Raasi:
                                			</label>
                               	 			<span class="col-xs-7"></span>
                            		  </div>
                        		  </div>

								  <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Star:
                                			</label>
                               	 			<span class="col-xs-7"></span>
                            		  </div>
                        		  </div>

								  <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Paadham:
                                			</label>
                               	 			<span class="col-xs-7"></span>
                            		  </div>
                        		  </div>

								  <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			having dosham:
                                			</label>
                               	 			<span class="col-xs-7"></span>
                            		  </div>
                        		  </div>

								  <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Dosham Details:
                                			</label>
                               	 			<span class="col-xs-7"></span>
                            		  </div>
                        		  </div>
                               
                                <h4 class="col-xs-12" style="border-bottom:1px solid rgba(239, 239, 239, 1);padding-bottom:10px;">
                                    	<b>Location Information</b>
                                  </h4>
                               
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Country:
                                			</label>
                               	 			<span class="col-xs-7"></span>
                            		  </div>
                        		  </div>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			State:
                                			</label>
                               	 			<span class="col-xs-7"></span>
                            		  </div>
                        		  </div>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			City:
                                			</label>
                               	 			<span class="col-xs-7"></span>
                            		  </div>
                        		  </div>
                                  
                              
                                <div class="clearfix"></div>
                                
                                 <h4 class="col-xs-12" style="border-bottom:1px solid rgba(239, 239, 239, 1);padding-bottom:10px;">
                                    	<b>Contact Information</b>
                                  </h4>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Email:
                                			</label>
                               	 			<span class="col-xs-7"></span>
                            		  </div>
                        		  </div>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Mobile:
                                			</label>
                               	 			<span class="col-xs-7"></span>
                            		  </div>
                        		  </div>
                                
                                <div class="clearfix"></div>
                               </div></div></div></div></div>
                               </div></div></div></div>
								<div id="education">
								<br>
								<br>
									 <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h4 class="col-xs-12" style="border-bottom:1px solid rgba(239, 239, 239, 1);padding-bottom:10px;">
                                    	<b>Education / Profession Information</b>
                                  </h4>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Education:
                                			</label>
                               	 			<span class="col-xs-7"></span>
                            		  </div>
                        		  </div>
                                
                                
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Occupation:
                                			</label>
                               	 			<span class="col-xs-7"></span>
                            		  </div>
                        		  </div>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Annual Income:
                                			</label>
                               	 			<span class="col-xs-7"></span>
                            		  </div>
                        		  </div>

								  <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Office Details:
                                			</label>
                               	 			<span class="col-xs-7"></span>
                            		  </div>
                        		  </div>
								  </div>
								  </div>
								  </div>
								<div id="family">
								
								<br>
								<br>
									 <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h4 class="col-xs-12" style="border-bottom:1px solid rgba(239, 239, 239, 1);padding-bottom:10px;">
                                    	<b>Family Details</b>
                                  </h4>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
										<label class="col-xs-5">
                                   	 	  Family Type:
                                		</label>
                               	 			<span class="col-xs-7"></span>
                            		  </div>
                        		  </div>

								  <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
										<label class="col-xs-5">
                                   	 	  Family Type:
                                		</label>
                               	 			<span class="col-xs-7"></span>
                            		  </div>
                        		  </div>
                                
                                
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Father Name :
                                			</label>
                               	 			<span class="col-xs-7"></span>
                            		  </div>
                        		  </div>
                               <div class="clearfix"></div> 
								
								<div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                		<label class="col-xs-5">
											Father's Occupation:
                                		</label>
                               	 		<span class="col-xs-7"></span>
                            		  </div>
                        		  </div>
                              
								<div class="clearfix"></div> 

								 
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                	<label class="col-xs-5">
                                   	 			Mother's Name:
                                			</label>
                               	 		<span class="col-xs-7"></span>
                            		  </div>
                        		  </div><div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                		<label class="col-xs-5">
											Mother's Occupation:
                                		</label>
                               	 		<span class="col-xs-7"></span>
                            		  </div>
                        		  </div>
                              

							   <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			No Of Siblings:
                                			</label>
                               	 		<span class="col-xs-7"></span>
                            		  </div>
                        		  </div>
								</div>
								</div>
								</div>
								<div id="plan">
								<h4 class="col-xs-12" style="border-bottom:1px solid rgba(239, 239, 239, 1);padding-bottom:10px;">
                                    	<b>Plan Details</b>
                                </h4>
								
								 <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Plan Name:
                                			</label>
                               	 		<span class="col-xs-7"></span>
                            		  </div>
                        		  </div>
								  
								   <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Duration:
                                			</label>
                               	 		<span class="col-xs-7"></span>
                            		  </div>
                        		  </div>
								  
								   <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Expiry Date:
                                			</label>
                               	 		<span class="col-xs-7">
										</span>
                            		  </div>
                        		  </div>
								  
								  <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Balance Days:
                                			</label>
                               	 		<span class="col-xs-7"></span>
                            		  </div>
                        		  </div>
								  
								  <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Balance Contact Details To View:
                                			</label>
                               	 		<span class="col-xs-7"></span>
                            		  </div>
                        		  </div>
								  
								  <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Profile Highlighter - Duration:
                                			</label>
                               	 		<span class="col-xs-7"></span>
                            		  </div>
                        		  </div>
								  
								  <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Total Contact Details:
                                			</label>
                               	 		<span class="col-xs-7"></span>
                            		  </div>
                        		  </div>
								  
								  <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Other Benifits:
                                			</label>
                               	 		<span class="col-xs-7"></span>
                            		  </div>
                        		  </div>
                               
								</div>
									
										</div>
                                	</div>
                                    
								<div id="payment">
								<br>
								<br>
									<div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h4 class="col-xs-12" style="border-bottom:1px solid rgba(239, 239, 239, 1);padding-bottom:10px;">
                                    	<b>Payment History</b>
                                </h4>
								
								
								 <table  id="member1" class="display">
						   <thead>
							  <tr>
							
								<th>S.NO</th>
								<th >Date Of Active</th>
								<th>Plan Name</th>
								<th>Expired Date</th>
							  </tr>
							  </thead>
							  	<tbody>
							 
							  <tr>
							  <td>1</td>
							  <td>2019-04-16</td>
							  <td>Silver</td>
							  <td>2019-04-16</td>
								
								
							  </tr>
							
								
								  </tbody>
							</table>
							</div>
							</div>
							</div>		
							<div id="uploads">
								<br>
								<br>
								<div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h4 class="col-xs-12" style="border-bottom:1px solid rgba(239, 239, 239, 1);padding-bottom:10px;">
                                    	<b>Photos</b>
                                </h4>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Profile Image:
                                			</label>
                                		<img src="../uploads/profile_image/images.jpg" width="100" height="100">
                            		  </div>
                        		</div>
								
								  <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Horo Scope:
                                			</label>
                                				<img src="../uploads/profile_image/images.jpg" width="100" height="100">
                            		  </div>
                        		</div>
                                
								
								<div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Cover Image:
                                			</label>
                                				<img src="../uploads/profile_image/images.jpg" width="100" height="100">
                            		  </div>
                        		</div>
								
								  <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Id Proof:
                                			</label>
                                				<img src="../uploads/profile_image/images.jpg" width="100" height="100">
                            		  
                            		  </div>
                        		</div>
								
								 <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Photo Gallery:
                                			</label>
                               	 			<div class="form-group">
								 <br><br>
								 <table style="border:0px;">
								 <tr>
								 
									<img src="../uploads/profile_image/images.jpg" width="100" height="100">
									</tr></table>
										
                                	</div>
                            		  </div>
                        		</div>
                               
								</div>
								</div></div>
								
								<div id="partner">
								partner
							<br>
							<br>
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
                             
                           
							
                            
                            </form>
							
							
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
					  border: 0px solid #dddddd;
					  text-align: left;
					  padding: 8px;
					}

					tr:nth-child(even) {
					  background-color: #dddddd;
					}
					</style>
               
                <!--div class="right-sidebar">
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
                </div-->
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
