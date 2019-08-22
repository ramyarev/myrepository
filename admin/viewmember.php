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
                        <h4 class="page-title"> <a href="index.php">View And Edit Member</a></h4>
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
				<br><br>
                   <div class="col-sm-12">
				   
                        <div class="white-box" class="col-sm-12">
                            <div class="r-icon-stats">
							<form method="post" name="user_detail" id="user_detail" enctype="multipart/form-data">
							<div id="tabs">
								<ul style="border:none">
									<li><a href="#basic">Basic Details</a>
									</li>
									<li><a href="#education">Education / Profession</a>
									</li>
									<li><a href="#family">Family Details</a>
									</li>
									<li><a href="#religious">Religious</a>
									</li>
									<li><a href="#location">Location</a>
									</li>
									<li><a href="#uploads">Upload Photos</a>
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
							<?php 
							
							if($_GET['type']=='premium')
							{
								$getdata=mysqli_query($conn,"select * from tbl_user_temp where user_id='".$_GET['id']."'"); 
							}
							else
							{
								$getdata=mysqli_query($conn,"select * from tbl_user where user_id='".$_GET['id']."'"); 
							}
							
							
							$fetchdata=mysqli_fetch_array($getdata);
							?>
            	<div class="box box-solid">
            		<div class="box-header with-border">
                		<h2 class="box-title">
                    		<?php echo $fetchdata['name']; ?> &nbsp;&nbsp;<small>(&nbsp;&nbsp;Matri Id: &nbsp;&nbsp;)</small>
                    	</h2>
                	</div>
                	<div class="box-body neAdminProfileView">
                    	<div class="row">
                    		<div class="col-md-3 col-xs-12">
							<?php if($fetchdata['profile_image']!="") {  ?>
                             <img src="../uploads/profile_image/<?php echo $fetchdata['profile_image']; ?>" class="img-responsive" style="width:193px;height:262px;">
							<?php } else { ?>
							 <img src="../images/noimage.jpg" class="img-responsive" style="width:200px;height:200px;">
							<?php } ?>				
						   </div>
                            <div class="col-md-9 col-xs-12">
                            
                            <h4 class="col-xs-12" style="border-bottom:1px solid rgba(239, 239, 239, 1);padding-bottom:10px;">
                                    	About Me &nbsp (<a href="addmember.php?id=<?php echo $fetchdata['user_id'] ?>&type=all">EDIT MEMBER</a>)
                                </h4>
                               
                                
                            	<h4 class="col-xs-12" style="border-bottom:1px solid rgba(239, 239, 239, 1);padding-bottom:10px;">
                                    	<b>Basic Details</b>
                                </h4>
                       	 		<div class="form-group col-md-6 col-xs-12">
                           	 		<div class="row">
                                		<label class="col-xs-5">
                                   	 		Full Name:
                                		</label>
                               	 		<span class="col-xs-7"><?php echo $fetchdata['name']; ?></span>
                            		</div>
                        		 </div>
                                 
                                 <div class="form-group col-md-6 col-xs-12">
                           	 		<div class="row">
                                		<label class="col-xs-5">
                                   	 		Gender:
                                		</label>
                               	 		<span class="col-xs-7"><?php echo $fetchdata['gender']; ?></span>
                            		</div>
                        		 </div>
                                 
                                 <div class="form-group col-md-6 col-xs-12">
                           	 		<div class="row">
                                		<label class="col-xs-5">
                                   	 		Age:
                                		</label>
                               	 		<span class="col-xs-7"><?php echo $fetchdata['age']; ?></span>
                            		</div>
                        		 </div>
                                 
                                 
                            	<div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Date of Birth:
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchdata['dob']; ?></span>
                            		  </div>
                        		  </div>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Height:
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchdata['height']; ?></span>
                            		  </div>
                        		  </div>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Weight:
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchdata['weight']; ?></span>
                            		  </div>
                        		  </div>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Mother Tongue:
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchdata['mother_tongue']; ?></span>
                            		  </div>
                        		  </div>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Marital Status:
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchdata['marital_status']; ?></span>
                            		  </div>
                        		  </div>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Skin Tone:
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchdata['complexion']; ?></span>
                            		  </div>
                        		  </div>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Eating Habit:
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchdata['eating_habits']; ?></span>
                            		  </div>
                        		  </div>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Drinking:
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchdata['drinking_habits']; ?></span>
                            		  </div>
                        		  </div>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Body type:
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchdata['body_type']; ?></span>
                            		  </div>
                        		  </div>
                                  
                                  
                                  <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Smoking:
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchdata['smoking_habits']; ?></span>
                            		  </div>
                        		  </div>
                                  
                                  <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Profile Created By:
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchdata['profile_created_for']; ?></span>
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
                               	 			<span class="col-xs-7"><?php echo $fetchdata['religion']; ?></span>
                            		  </div>
                        		  </div>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Caste:
                                			</label>
                               	 			<span class="col-xs-7"><?php
											$getcaste=mysqli_fetch_array(mysqli_query($conn,"select caste  from tbl_caste where id='".$fetchdata['caste']."'"));	
											echo $getcaste['caste']; ?></span>
                            		  </div>
                        		  </div>
                                  
                                   <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Subcaste:
                                			</label>
                               	 			<span class="col-xs-7"><?php 
											$getsubcaste=mysqli_fetch_array(mysqli_query($conn,"select subcaste  from tbl_subcaste where id='".$fetchdata['sub_caste']."'"));
											echo $getsubcaste['subcaste']; ?></span>
                            		  </div>
                        		  </div>
                              
                                   <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Raasi:
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchdata['raasi']; ?></span>
                            		  </div>
                        		  </div>

								  <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Star:
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchdata['star']; ?></span>
                            		  </div>
                        		  </div>

								  <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Paadham:
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchdata['paadham']; ?></span>
                            		  </div>
                        		  </div>

								  <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			having dosham:
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchdata['having_dosham']; ?></span>
                            		  </div>
                        		  </div>

								  <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Dosham Details:
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchdata['dosham_details']; ?></span>
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
                               	 			<span class="col-xs-7"><?php echo $fetchdata['country']; ?></span>
                            		  </div>
                        		  </div>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			State:
                                			</label>
                               	 			<span class="col-xs-7"><?php 
											$getstate=mysqli_fetch_array(mysqli_query($conn,"select state  from tbl_state where id='".$fetchdata['state']."'"));	
											echo $getstate['state']; ?></span>
                            		  </div>
                        		  </div>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			City:
                                			</label>
                               	 			<span class="col-xs-7"><?php 
											$getcity=mysqli_fetch_array(mysqli_query($conn,"select city  from tbl_city where id='".$fetchdata['home_city']."'"));
											echo $getcity['city']; ?></span>
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
                               	 			<span class="col-xs-7"><?php echo $fetchdata['email']; ?></span>
                            		  </div>
                        		  </div>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Mobile:
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchdata['mobile_number']; ?></span>
                            		  </div>
                        		  </div>
                                
                                <div class="clearfix"></div>
                               </div></div></div></div></div>
                               </div></div></div></div>
                                <h4 class="col-xs-12" style="border-bottom:1px solid rgba(239, 239, 239, 1);padding-bottom:10px;">
                                    	<b>Education / Profession Information</b>
                                  </h4>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Education:
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchdata['mobile_number']; ?></span>
                            		  </div>
                        		  </div>
                                
                                
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Occupation:
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchdata['education']; ?></span>
                            		  </div>
                        		  </div>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Annual Income:
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchdata['occupation']; ?></span>
                            		  </div>
                        		  </div>

								  <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Office Details:
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchdata['office_details']; ?></span>
                            		  </div>
                        		  </div>
                                  
                                 
                                  
                                  <h4 class="col-xs-12" style="border-bottom:1px solid rgba(239, 239, 239, 1);padding-bottom:10px;">
                                    	<b>Family Details</b>
                                  </h4>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
										<label class="col-xs-5">
                                   	 	  Family Type:
                                		</label>
                               	 			<span class="col-xs-7"><?php echo $fetchdata['family_type']; ?></span>
                            		  </div>
                        		  </div>

								  <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
										<label class="col-xs-5">
                                   	 	  Family Type:
                                		</label>
                               	 			<span class="col-xs-7"><?php echo $fetchdata['family_status']; ?></span>
                            		  </div>
                        		  </div>
                                
                                
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Father Name :
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchdata['father_name']; ?></span>
                            		  </div>
                        		  </div>
                               <div class="clearfix"></div> 
								
								<div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                		<label class="col-xs-5">
											Father's Occupation:
                                		</label>
                               	 		<span class="col-xs-7"><?php echo $fetchdata['father_occupation']; ?></span>
                            		  </div>
                        		  </div>
                              
								<div class="clearfix"></div> 

								 
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                	<label class="col-xs-5">
                                   	 			Mother's Name:
                                			</label>
                               	 		<span class="col-xs-7"><?php echo $fetchdata['mother_name']; ?></span>
                            		  </div>
                        		  </div><div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                		<label class="col-xs-5">
											Mother's Occupation:
                                		</label>
                               	 		<span class="col-xs-7"><?php echo $fetchdata['mother_occupation']; ?></span>
                            		  </div>
                        		  </div>
                              

							   <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			No Of Siblings:
                                			</label>
                               	 		<span class="col-xs-7"><?php echo $fetchdata['no_of_siblings']; ?></span>
                            		  </div>
                        		  </div>
								  
								  
								  
								  <div class="form-group col-md-12 col-xs-12">
                                 
                                <h4 class="col-xs-12" style="border-bottom:1px solid rgba(239, 239, 239, 1);padding-bottom:10px;">
                                    	<b>Offer Details</b>
                                </h4>
                               
								</div>
								
								<div class="form-group col-md-12 col-xs-12">
                                 
                                <h4 class="col-xs-12" style="border-bottom:1px solid rgba(239, 239, 239, 1);padding-bottom:10px;">
                                    	<b>Plan Details</b>
                                </h4>
								<?php 
									$getplanid=mysqli_query($conn,"select * from tbl_membership_user where user_id='".$_GET['id']."' and status=0"); 							
									$fetchplanid=mysqli_fetch_array($getplanid);
									
									
									$getplandetails=mysqli_query($conn,"select * from tbl_plan_feature where plan_id='".$fetchplanid['plan_id']."' "); 							
									$fetchplandetails=mysqli_fetch_array($getplandetails);
									
									$getplanname=mysqli_query($conn,"select * from tbl_plan where id='".$fetchplanid['plan_id']."' ");
				
									$fetchplanname=mysqli_fetch_array($getplanname);
									
								?>
								 <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Plan Name:
                                			</label>
                               	 		<span class="col-xs-7"><?php echo $fetchplanname['plan_name']; ?></span>
                            		  </div>
                        		  </div>
								  
								   <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Duration:
                                			</label>
                               	 		<span class="col-xs-7"><?php echo $fetchplandetails['default_duration']; ?></span>
                            		  </div>
                        		  </div>
								  
								   <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Expiry Date:
                                			</label>
                               	 		<span class="col-xs-7">
										<?php
										$duration=$fetchplandetails['default_duration'];
										$activedate=$fetchplanid['activedate'];
										$next_due_date = date('Y-m-d', strtotime($activedate. ' +'.$duration.' days'));
										echo $next_due_date; 
										?></span>
                            		  </div>
                        		  </div>
								  
								  <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Balance Days:
                                			</label>
                               	 		<span class="col-xs-7"><?php 
										$nowdate=date("Y-m-d");

										$earlier = new DateTime($nowdate);
										$later = new DateTime($next_due_date);

										$diff = $later->diff($earlier)->format("%a");	
										echo $diff; ?></span>
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
                               	 		<span class="col-xs-7"><?php 
										$highlighterduration=$fetchplandetails['highlighter_days'];
										$activedate=$fetchplanid['activedate'];
										$highlighterday = date('Y-m-d', strtotime($activedate. ' +'.$highlighterduration.' days'));
										echo $highlighterday
										?></span>
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
								
								
								<div class="form-group col-md-12 col-xs-12">
                                 
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
							  <?php 
							  $i=1;
								$historyquery=mysqli_query($conn,"select * from tbl_membership_user where user_id='".$_GET['id']."'");
								while($fetchdatahistory=mysqli_fetch_array($historyquery))
								{
									$fetchhistorydate=mysqli_fetch_array(mysqli_query($conn,"select * from tbl_user where user_id='".$_GET['id']."'"))	;
									$fetchhistoryplan=mysqli_fetch_array(mysqli_query($conn,"select * from tbl_plan where id='".$fetchdatahistory['plan_id']."'"))	;
									$fetchhistoryplandetail=mysqli_fetch_array(mysqli_query($conn,"select * from tbl_plan_feature where plan_id='".$fetchdatahistory['plan_id']."'"))	;
									
									$duration=$fetchhistoryplandetail['default_duration'];
									$activedate=$fetchdatahistory['activedate'];
									$next_due_date1 = date('Y-m-d', strtotime($activedate. ' +'.$duration.' days'));
									
								?>
							
								
							  <tr>
							  <td><?php echo $i; ?></td>
							  <td><?php echo $fetchdatahistory['activedate']; ?></td>
							  <td><?php echo $fetchhistoryplan['plan_name']; ?></td>
							  <td><?php echo $next_due_date1; ?></td>
								
								
							  </tr>
							
								<?php $i++; }  ?>
								  </tbody>
							</table>
							
								
								</div>
								  
								  
								  
								 <div class="form-group col-md-12 col-xs-12">
                                 
                                <h4 class="col-xs-12" style="border-bottom:1px solid rgba(239, 239, 239, 1);padding-bottom:10px;">
                                    	<b>Photos</b>
                                </h4>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Profile Image:
                                			</label>
                                		<?php	if( $fetchdata['profile_image']!='') { ?>
                               	 			<img src="../uploads/profile_image/<?php echo $fetchdata['profile_image']; ?>" width="150px" height="150px">
                               	 			<?php }
										else { ?>
										<img src="../images/profile.png" width="150" height="150"/>
										<?php } ?>
                            		  </div>
                        		</div>
								
								  <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Horo Scope:
                                			</label>
                                				<?php	if( $fetchdata['horoscope']!='') { ?>
                               	 			<img src="../uploads/horoscope/<?php echo $fetchdata['horoscope']; ?>"  width="150px" height="150px">
                               	 				<?php }
										else { ?>
										<img src="../images/profile.png" width="150" height="150"/>
										<?php } ?>
                            		  </div>
                        		</div>
                                
								
								<div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Cover Image:
                                			</label>
                                				<?php	if( $fetchdata['cover_image']!='') { ?>
                               	 			<img src="../uploads/cover_image/<?php echo $fetchdata['cover_image']; ?>"  width="150px" height="150px">
                               	 				<?php }
										else { ?>
										<img src="../images/profile.png" width="150" height="150"/>
										<?php } ?>
                            		  </div>
                        		</div>
								
								  <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Id Proof:
                                			</label>
                                				<?php	if( $fetchdata['cover_image']!='') { ?>
                               	 			<img src="../uploads/id_proof/<?php echo $fetchdata['id_proof']; ?>"  width="150px" height="150px">
                               	 			<?php }
										else { ?>
										<img src="../images/profile.png" width="150" height="150"/>
										<?php } ?>
                            		  
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
								 
									<?php 
										
										$getpic=mysqli_query($conn,"select * from tbl_gallery where user_id='".$fetchdata['user_id']."'");
										$j=1;
										while($fetchpic=mysqli_fetch_array($getpic))
										{
											?>
												<td>
												<img src="../uploads/photo_gallery/<?php echo $fetchpic['gallery'] ?>" width="150" height="150"/>
												</td>
												<td></td>
											<?php 
											
											if($j==4)
											{ $j=0; ?>
												</tr>
												
											<?php }
											
											$j++;
										}
										?></table>
										
                                	</div>
                            		  </div>
                        		</div>
                               
								</div>
								  
								  
								  
								 <div class="form-group col-md-12 col-xs-12">
                                  <?php 
								  
									$getpartnerdata=mysqli_query($conn,"select * from tbl_partners where user_id='".$_GET['id']."'"); 
							
									$fetchpartnerdata=mysqli_fetch_array($getpartnerdata);

								  ?>
                                <h3 class="col-xs-12 text-danger" style="border-bottom:1px solid rgba(239, 239, 239, 1);padding-bottom:10px;">
                                    Partner Preference
                                </h3>
                                <h4 class="col-xs-12" style="border-bottom:1px solid rgba(239, 239, 239, 1);padding-bottom:10px;">
                                    	<b>Basic Preference</b>
                                </h4>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Looking For:
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchpartnerdata['marital_status']; ?></span>
                            		  </div>
                        		</div>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Mother Tongue:
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchpartnerdata['mother_tongue']; ?></span>
                            		  </div>
                        		  </div>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Age:
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchpartnerdata['min_age']; ?> to <?php echo $fetchpartnerdata['max_age']; ?></span>
                            		  </div>
                        		</div>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Height:
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchpartnerdata['min_height']; ?> to <?php echo $fetchpartnerdata['max_height']; ?></span>
                            		  </div>
                        		 </div>

								 <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Weight:
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchpartnerdata['min_weight']; ?> to <?php echo $fetchpartnerdata['max_weight']; ?></span>
                            		  </div>
                        		 </div>

								 <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Physical Status:
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchpartnerdata['physical_status']; ?></span>
                            		  </div>
                        		 </div>
                                 
                                  <h4 class="col-xs-12" style="border-bottom:1px solid rgba(239, 239, 239, 1);padding-bottom:10px;">
                                    	<b>Religious Preferences</b>
                                </h4>
                               
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Caste:
                                			</label>
                               	 			<span class="col-xs-7"><?php 
											$getpartnercaste=mysqli_fetch_array(mysqli_query($conn,"select caste  from tbl_caste where id='".$fetchpartnerdata['caste']."'"));	
											echo $getpartnercaste['caste']; ?></span>
                            		  </div>
                        		  </div>
								  
								  <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Sub Caste:
                                			</label>
                               	 			<span class="col-xs-7"><?php
											$getpartnersubcaste=mysqli_fetch_array(mysqli_query($conn,"select subcaste  from tbl_subcaste where id='".$fetchpartnerdata['caste']."'"));	
											
											echo $getpartnersubcaste['subcaste']; ?></span>
                            		  </div>
                        		  </div>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Raasi 
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchpartnerdata['raasi']; ?></span>
                            		  </div>
                        		</div>

								<div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Natchathiram 
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchpartnerdata['natchathiram']; ?></span>
                            		  </div>
                        		</div>
								
								<div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Paadham 
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchpartnerdata['paadham']; ?></span>
                            		  </div>
                        		</div>
								
								<div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Having Dosham 
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchpartnerdata['having_dosham']; ?></span>
                            		  </div>
                        		</div>
								
								<div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Dosham 
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchpartnerdata['dosham']; ?></span>
                            		  </div>
                        		</div>
								</div>
								 <div class="form-group col-md-12 col-xs-12">
                               
                                  <h4 class="col-xs-12" style="border-bottom:1px solid rgba(239, 239, 239, 1);padding-bottom:10px;">
                                    	<b>Education / Profession Preferences</b>
                                </h4>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Education:
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchpartnerdata['education']; ?></span>
                            		  </div>
                        		</div>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Profession:
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchpartnerdata['profession']; ?></span>
                            		  </div>
                        		  </div>
                                  
                                 
                                  
                                 <h4 class="col-xs-12" style="border-bottom:1px solid rgba(239, 239, 239, 1);padding-bottom:10px;">
                                    	<b>Location Preferences</b>
                                </h4>
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Nationality:
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchpartnerdata['nationality']; ?></span>
                            		  </div>
                        		</div>
								
								<div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Country:
                                			</label>
                               	 			<span class="col-xs-7"><?php echo $fetchpartnerdata['country']; ?></span>
                            		  </div>
                        		  </div>

								<div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			State:
                                			</label>
                               	 			<span class="col-xs-7"><?php 
											$getpartnerstate=mysqli_fetch_array(mysqli_query($conn,"select state  from tbl_state where id='".$fetchpartnerdata['state']."'"));
											echo $getpartnerstate['state']; ?></span>
                            		  </div>
                        		</div>
                                
                                <div class="form-group col-md-6 col-xs-12">
                           	 		 <div class="row">
                                			<label class="col-xs-5">
                                   	 			Preferred Cities:
                                			</label>
                               	 			<span class="col-xs-7"><?php 
											$getpartnercity=mysqli_fetch_array(mysqli_query($conn,"select city  from tbl_city where id='".$fetchpartnerdata['preferred_cities']."'"));
											echo $getpartnercity['city']; ?></span>
                            		  </div>
                        		</div>
                             
                       		 </div>
                		 </div>
            		 </div>
            	 </div>
            	 </div>
            	 </div>
							
							
                        </div>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
				
				<style>
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
