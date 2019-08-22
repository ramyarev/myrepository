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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

 <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/base/jquery-ui.css" rel="stylesheet">
 
 <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
 
 
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
                        <h4 class="page-title"> <a href="index.php">Matches</a></h4>
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
                   <div class="col-sm-12">
				   
                        <div class="white-box" class="col-sm-12">
                            <div class="">
                          <div class="row" >
						  
                    <div class="col-sm-12">
					<!--div align="right"><a href="members.php?type=all.php" align="right"><b><i class="fa fa-backward" aria-hidden="true"></i>Back</b></a>
						  </div-->
                        <div class="white-box">
						
                             <form method="post" name="user_detail" id="user_detail" enctype="multipart/form-data">
                        	
							<?php 
							
								$user_id=$_GET['id'];
								
								$fetchgender=mysqli_fetch_array(mysqli_query($conn,"select * from tbl_user where user_id='".$user_id."'"));

                                $gender=$fetchgender['gender'];

								$todaydata=mysqli_query($conn,"SELECT * FROM tbl_user WHERE (gender = (select gender from tbl_partners WHERE user_id='".$user_id."') or (age >= (select min_age from tbl_partners WHERE user_id='".$user_id."') and age <= (select max_age from tbl_partners WHERE user_id='".$user_id."')) or ( feet_inch >= (select min_feet_inch from tbl_partners WHERE user_id='".$user_id."') and feet_inch <= (select max_feet_inch from tbl_partners WHERE user_id='".$user_id."')) or ( weight >= (select min_weight from tbl_partners WHERE user_id='".$user_id."')  and weight <= (select max_weight from tbl_partners WHERE user_id='".$user_id."')) or caste = (select caste from tbl_partners WHERE user_id='".$user_id."') or sub_caste = (select sub_caste from tbl_partners WHERE user_id='".$user_id."') or marital_status = (select marital_status  from tbl_partners WHERE user_id='".$user_id."') or mother_tongue = (select mother_tongue  from tbl_partners WHERE user_id='".$user_id."') or raasi = (select raasi  from tbl_partners WHERE user_id='".$user_id."') or star = (select natchathiram  from tbl_partners WHERE user_id='".$user_id."') or having_dosham = (select having_dosham  from tbl_partners WHERE user_id='".$user_id."') or dosham_details = (select dosham  from tbl_partners WHERE user_id='".$user_id."') or occupation = (select profession  from tbl_partners WHERE user_id='".$user_id."') or physical_status = (select physical_status  from tbl_partners WHERE user_id='".$user_id."') or nationality = (select nationality  from tbl_partners WHERE user_id='".$user_id."') or  country = (select country  from tbl_partners WHERE user_id='".$user_id."') or home_city = (select preferred_cities  from tbl_partners WHERE user_id='".$user_id."') or paadham = (select paadham  from tbl_partners WHERE user_id='".$user_id."') or education = (select education  from tbl_partners WHERE user_id='".$user_id."') or  state = (select state from tbl_partners WHERE user_id='".$user_id."') ) and weight!='' and feet_inch!='' and age!=0 and user_id!='".$user_id."' and delete_status=0 and gender!='".$gender."' and DATE(profile_created_by) = CURDATE() order by profile_created_by desc");
								
								
								$todaycount=mysqli_num_rows($todaydata);
								
								
								$premiumdata=mysqli_query($conn,"SELECT * FROM tbl_user WHERE (gender = (select gender from tbl_partners WHERE user_id='".$user_id."') or (age >= (select min_age from tbl_partners WHERE user_id='".$user_id."') and age <= (select max_age from tbl_partners WHERE user_id='".$user_id."')) or ( feet_inch >= (select min_feet_inch from tbl_partners WHERE user_id='".$user_id."') and feet_inch <= (select max_feet_inch from tbl_partners WHERE user_id='".$user_id."')) or ( weight >= (select min_weight from tbl_partners WHERE user_id='".$user_id."')  and weight <= (select max_weight from tbl_partners WHERE user_id='".$user_id."')) or caste = (select caste from tbl_partners WHERE user_id='".$user_id."') or sub_caste = (select sub_caste from tbl_partners WHERE user_id='".$user_id."') or marital_status = (select marital_status  from tbl_partners WHERE user_id='".$user_id."') or mother_tongue = (select mother_tongue  from tbl_partners WHERE user_id='".$user_id."') or raasi = (select raasi  from tbl_partners WHERE user_id='".$user_id."') or star = (select natchathiram  from tbl_partners WHERE user_id='".$user_id."') or having_dosham = (select having_dosham  from tbl_partners WHERE user_id='".$user_id."') or dosham_details = (select dosham  from tbl_partners WHERE user_id='".$user_id."') or occupation = (select profession  from tbl_partners WHERE user_id='".$user_id."') or physical_status = (select physical_status  from tbl_partners WHERE user_id='".$user_id."') or nationality = (select nationality  from tbl_partners WHERE user_id='".$user_id."') or  country = (select country  from tbl_partners WHERE user_id='".$user_id."') or home_city = (select preferred_cities  from tbl_partners WHERE user_id='".$user_id."') or paadham = (select paadham  from tbl_partners WHERE user_id='".$user_id."')  or education = (select education  from tbl_partners WHERE user_id='".$user_id."') or  state = (select state from tbl_partners WHERE user_id='".$user_id."') ) and weight!='' and feet_inch!='' and age!=0 and user_id!='".$user_id."' and delete_status=0 and gender!='".$gender."'  order by profile_created_by desc");
								
								$premiumdata1=mysqli_query($conn,"SELECT * FROM tbl_user WHERE (gender = (select gender from tbl_partners WHERE user_id='".$user_id."') or (age >= (select min_age from tbl_partners WHERE user_id='".$user_id."') and age <= (select max_age from tbl_partners WHERE user_id='".$user_id."')) or ( feet_inch >= (select min_feet_inch from tbl_partners WHERE user_id='".$user_id."') and feet_inch <= (select max_feet_inch from tbl_partners WHERE user_id='".$user_id."')) or ( weight >= (select min_weight from tbl_partners WHERE user_id='".$user_id."')  and weight <= (select max_weight from tbl_partners WHERE user_id='".$user_id."')) or caste = (select caste from tbl_partners WHERE user_id='".$user_id."') or sub_caste = (select sub_caste from tbl_partners WHERE user_id='".$user_id."') or marital_status = (select marital_status  from tbl_partners WHERE user_id='".$user_id."') or mother_tongue = (select mother_tongue  from tbl_partners WHERE user_id='".$user_id."') or raasi = (select raasi  from tbl_partners WHERE user_id='".$user_id."') or star = (select natchathiram  from tbl_partners WHERE user_id='".$user_id."') or having_dosham = (select having_dosham  from tbl_partners WHERE user_id='".$user_id."') or dosham_details = (select dosham  from tbl_partners WHERE user_id='".$user_id."') or occupation = (select profession  from tbl_partners WHERE user_id='".$user_id."') or physical_status = (select physical_status  from tbl_partners WHERE user_id='".$user_id."') or nationality = (select nationality  from tbl_partners WHERE user_id='".$user_id."') or  country = (select country  from tbl_partners WHERE user_id='".$user_id."') or home_city = (select preferred_cities  from tbl_partners WHERE user_id='".$user_id."') or paadham = (select paadham  from tbl_partners WHERE user_id='".$user_id."') or education = (select education  from tbl_partners WHERE user_id='".$user_id."') or  state = (select state from tbl_partners WHERE user_id='".$user_id."') ) and weight!='' and feet_inch!='' and age!=0 and user_id!='".$user_id."' and delete_status=0 and gender!='".$gender."'  order by profile_created_by desc");
								
								$i=1;
								$premiumcount='';
								while($fetchpremiumdata1=mysqli_fetch_array($premiumdata1)) {

								$getplanid=mysqli_fetch_array(mysqli_query($conn,"select plan_id from tbl_membership_user where user_id='".$fetchpremiumdata1['user_id']."' and status=0"));
						
								$getplanname=mysqli_fetch_array(mysqli_query($conn,"select category from tbl_plan where id='".$getplanid['plan_id']."' and delete_status=0"));
								
								
								if($getplanname['category']=='premium')
								{
									$premiumcount=+$i;
										$i++;
								}
							
								}
								
								
								$recommenddata=mysqli_query($conn,"SELECT * FROM tbl_user WHERE (gender = (select gender from tbl_partners WHERE user_id='".$user_id."') or (age >= (select min_age from tbl_partners WHERE user_id='".$user_id."') and age <= (select max_age from tbl_partners WHERE user_id='".$user_id."')) or ( feet_inch >= (select min_feet_inch from tbl_partners WHERE user_id='".$user_id."') and feet_inch <= (select max_feet_inch from tbl_partners WHERE user_id='".$user_id."')) or ( weight >= (select min_weight from tbl_partners WHERE user_id='".$user_id."')  and weight <= (select max_weight from tbl_partners WHERE user_id='".$user_id."')) or caste = (select caste from tbl_partners WHERE user_id='".$user_id."') or sub_caste = (select sub_caste from tbl_partners WHERE user_id='".$user_id."') or marital_status = (select marital_status  from tbl_partners WHERE user_id='".$user_id."') or mother_tongue = (select mother_tongue  from tbl_partners WHERE user_id='".$user_id."') or raasi = (select raasi  from tbl_partners WHERE user_id='".$user_id."') or star = (select natchathiram  from tbl_partners WHERE user_id='".$user_id."') or having_dosham = (select having_dosham  from tbl_partners WHERE user_id='".$user_id."') or dosham_details = (select dosham  from tbl_partners WHERE user_id='".$user_id."') or occupation = (select profession  from tbl_partners WHERE user_id='".$user_id."') or physical_status = (select physical_status  from tbl_partners WHERE user_id='".$user_id."') or nationality = (select nationality  from tbl_partners WHERE user_id='".$user_id."') or  country = (select country  from tbl_partners WHERE user_id='".$user_id."') or home_city = (select preferred_cities  from tbl_partners WHERE user_id='".$user_id."') or paadham = (select paadham  from tbl_partners WHERE user_id='".$user_id."') or education = (select education  from tbl_partners WHERE user_id='".$user_id."') or  state = (select state from tbl_partners WHERE user_id='".$user_id."') ) and weight!='' and feet_inch!='' and age!=0 and user_id!='".$user_id."' and delete_status=0 and gender!='".$gender."' and active=1 order by profile_created_by desc");
								
								
								$recommandcount=mysqli_num_rows($recommenddata);
								
								
								$locationdata=mysqli_query($conn,"SELECT * FROM tbl_user WHERE (gender = (select gender from tbl_partners WHERE user_id='".$user_id."') and (age >= (select min_age from tbl_partners WHERE user_id='".$user_id."') and age <= (select max_age from tbl_partners WHERE user_id='".$user_id."')) and ( feet_inch >= (select min_feet_inch from tbl_partners WHERE user_id='".$user_id."') and feet_inch <= (select max_feet_inch from tbl_partners WHERE user_id='".$user_id."')) and ( weight >= (select min_weight from tbl_partners WHERE user_id='".$user_id."')  and weight <= (select max_weight from tbl_partners WHERE user_id='".$user_id."')) and caste = (select caste from tbl_partners WHERE user_id='".$user_id."') and marital_status = (select marital_status  from tbl_partners WHERE user_id='".$user_id."') and mother_tongue = (select mother_tongue  from tbl_partners WHERE user_id='".$user_id."') and raasi = (select raasi  from tbl_partners WHERE user_id='".$user_id."') and home_city = (select preferred_cities  from tbl_partners WHERE user_id='".$user_id."') and having_dosham = (select having_dosham  from tbl_partners WHERE user_id='".$user_id."') and dosham_details = (select dosham  from tbl_partners WHERE user_id='".$user_id."')  and physical_status = (select physical_status  from tbl_partners WHERE user_id='".$user_id."') and paadham = (select paadham  from tbl_partners WHERE user_id='".$user_id."') ) and weight!='' and feet_inch!='' and age!=0 and user_id!='".$user_id."' and delete_status=0 and gender!='".$gender."' order by profile_created_by desc");
								
								
								$locationcount=mysqli_num_rows($locationdata);
								
								
								$educationdata=mysqli_query($conn,"SELECT * FROM tbl_user WHERE (gender = (select gender from tbl_partners WHERE user_id='".$user_id."') and (age >= (select min_age from tbl_partners WHERE user_id='".$user_id."') and age <= (select max_age from tbl_partners WHERE user_id='".$user_id."')) and ( feet_inch >= (select min_feet_inch from tbl_partners WHERE user_id='".$user_id."') and feet_inch <= (select max_feet_inch from tbl_partners WHERE user_id='".$user_id."')) and ( weight >= (select min_weight from tbl_partners WHERE user_id='".$user_id."')  and weight <= (select max_weight from tbl_partners WHERE user_id='".$user_id."')) and caste = (select caste from tbl_partners WHERE user_id='".$user_id."') and marital_status = (select marital_status  from tbl_partners WHERE user_id='".$user_id."') and mother_tongue = (select mother_tongue  from tbl_partners WHERE user_id='".$user_id."') and raasi = (select raasi  from tbl_partners WHERE user_id='".$user_id."') and education = (select education  from tbl_partners WHERE user_id='".$user_id."') and having_dosham = (select having_dosham  from tbl_partners WHERE user_id='".$user_id."') and dosham_details = (select dosham  from tbl_partners WHERE user_id='".$user_id."')  and physical_status = (select physical_status  from tbl_partners WHERE user_id='".$user_id."') and paadham = (select paadham  from tbl_partners WHERE user_id='".$user_id."') ) and weight!='' and feet_inch!='' and age!=0 and user_id!='".$user_id."' and delete_status=0 and gender!='".$gender."' order by profile_created_by desc");
								
								
								$educationcount=mysqli_num_rows($educationdata);
								
								
								$professiondata=mysqli_query($conn,"SELECT * FROM tbl_user WHERE (gender = (select gender from tbl_partners WHERE user_id='".$user_id."') and (age >= (select min_age from tbl_partners WHERE user_id='".$user_id."') and age <= (select max_age from tbl_partners WHERE user_id='".$user_id."')) and ( feet_inch >= (select min_feet_inch from tbl_partners WHERE user_id='".$user_id."') and feet_inch <= (select max_feet_inch from tbl_partners WHERE user_id='".$user_id."')) and ( weight >= (select min_weight from tbl_partners WHERE user_id='".$user_id."')  and weight <= (select max_weight from tbl_partners WHERE user_id='".$user_id."')) and caste = (select caste from tbl_partners WHERE user_id='".$user_id."') and marital_status = (select marital_status  from tbl_partners WHERE user_id='".$user_id."') and mother_tongue = (select mother_tongue  from tbl_partners WHERE user_id='".$user_id."') and raasi = (select raasi  from tbl_partners WHERE user_id='".$user_id."') and occupation = (select profession  from tbl_partners WHERE user_id='".$user_id."') and having_dosham = (select having_dosham  from tbl_partners WHERE user_id='".$user_id."') and dosham_details = (select dosham  from tbl_partners WHERE user_id='".$user_id."')  and physical_status = (select physical_status  from tbl_partners WHERE user_id='".$user_id."') and paadham = (select paadham  from tbl_partners WHERE user_id='".$user_id."') ) and weight!='' and feet_inch!='' and age!=0 and user_id!='".$user_id."' and delete_status=0 and gender!='".$gender."' order by profile_created_by desc");
								
								
								$professioncount=mysqli_num_rows($professiondata);
								
								
								$stardata=mysqli_query($conn,"SELECT * FROM tbl_user WHERE (gender = (select gender from tbl_partners WHERE user_id='".$user_id."') and (age >= (select min_age from tbl_partners WHERE user_id='".$user_id."') and age <= (select max_age from tbl_partners WHERE user_id='".$user_id."')) and ( feet_inch >= (select min_feet_inch from tbl_partners WHERE user_id='".$user_id."') and feet_inch <= (select max_feet_inch from tbl_partners WHERE user_id='".$user_id."')) and ( weight >= (select min_weight from tbl_partners WHERE user_id='".$user_id."')  and weight <= (select max_weight from tbl_partners WHERE user_id='".$user_id."')) and caste = (select caste from tbl_partners WHERE user_id='".$user_id."')  and marital_status = (select marital_status  from tbl_partners WHERE user_id='".$user_id."') and mother_tongue = (select mother_tongue  from tbl_partners WHERE user_id='".$user_id."') and raasi = (select raasi  from tbl_partners WHERE user_id='".$user_id."') and star = (select natchathiram  from tbl_partners WHERE user_id='".$user_id."') and having_dosham = (select having_dosham  from tbl_partners WHERE user_id='".$user_id."') and dosham_details = (select dosham  from tbl_partners WHERE user_id='".$user_id."')  and physical_status = (select physical_status  from tbl_partners WHERE user_id='".$user_id."') and paadham = (select paadham  from tbl_partners WHERE user_id='".$user_id."') ) and weight!='' and feet_inch!='' and age!=0 and user_id!='".$user_id."' and delete_status=0 and gender!='".$gender."' order by profile_created_by desc");
								
								
								$starcount=mysqli_num_rows($stardata);
								
								$discovercount=$locationcount+$educationcount+$professioncount+$starcount;
								
							?>
								<div id="tabs">
								<ul style="border:none">
									<li><a href="#Today">Today (<?php echo $todaycount; ?>)</a>
									</li>
									<li><a href="#Premium">Premium (<?php echo $premiumcount; ?>)</a>
									</li>
									<li><a href="#Recommended">Recommended (<?php echo $recommandcount; ?>)</a>
									</li>
									<li>
									<a href="#discovered">Discovered (<?php echo $discovercount; ?>)</a><span class="caret"></span>
									
									</li>
									<li><a href="" style="color:red;font-weight:bold" >Sended Mail (50)</a>
									</li>
									<li><a href="" style="color:red;font-weight:bold">Sended SMS (50)</a>
									</li>
								</ul>
								<div id="discovered" >
								<ul  class="nav"style="display:inlineblock;list-style-type:none;cursor: pointer;">
								    <li class="nav-item"><a data-toggle="collapse" data-target="#location">Location</a>
									</li>
									<li class="nav-item"><a data-toggle="collapse" data-target="#education">Education</a>
									</li>
									<li class="nav-item"><a data-toggle="collapse" data-target="#profession">Profession</a>
									</li>
									<li class="nav-item"><a data-toggle="collapse" data-target="#staff">Star</a>
									</li>
									</ul>
									</div>
								<div id="Today">
								<br>
								
				           <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3>
                                   		<b>TODAY MATCHES</b>
                                	</h3>
                                </div>
                            </div>
							<br>
                            <div class="row">
                    			<div class="col-md-12 col-xs-12">
						<div style="overflow-x:auto;">
						<table  id="member" class="display" style="width:100%">
						
						  
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
                                <th>Option</th>								
							  </tr>
							 
							  <tbody>
							  <?php while($fetchtodaydata=mysqli_fetch_array($todaydata)) { ?>
							  <tr>
							  <td><i class="fa fa-star" aria-hidden="true"></i></td>
							  <td>
							  <?php if($fetchtodaydata['profile_image']!='') { ?>
							  <img src="../uploads/profile_image/<?php echo $fetchtodaydata['profile_image']; ?>" width="100" height="100">
							  <?php } else { ?>
							  <img src="../images/noimage.jpg" width="100" height="100">
							  <?php } ?>
							  </td>
							  <td>NM<?php echo $fetchtodaydata['user_id']; ?></td>
								<td><?php echo $fetchtodaydata['name']; ?></td>
								<td><?php echo $fetchtodaydata['email']; ?></td>
								<td><?php echo $fetchtodaydata['gender']; ?></td>
								<td><?php echo $fetchtodaydata['marital_status']; ?></td>
								<td><?php $fetchcity=mysqli_fetch_array(mysqli_query($conn,"select * from tbl_city where id='".$fetchtodaydata['home_city']."'"));
								echo $fetchcity['city']; ?></td>
								<td><?php echo date("d-m-Y", strtotime($fetchtodaydata['profile_created_by']));;?></td>
                                <td>
								 <a href="viewdetail.php?id=<?php echo $fetchtodaydata['user_id'] ?>" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">View Profile</a>
                                 <a href="#" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">Send Mail</a>
                                 <a href="#" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">Send SMS</a>
                                 </td>								 
								</tr>
								<?php } ?>
								</tbody>
								</table>																		  							  
								</div>
						</div>
						</div>
						</div>
						<div id="Premium">
								<br>
								
				           <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3>
                                   		<b>PREMIUM MATCHES</b>
                                	</h3>
                                </div>
                            </div>
							<br>
                            <div class="row">
                    			<div class="col-md-12 col-xs-12">
						<div style="overflow-x:auto;">
						<table  id="member" class="display" style="width:100%">
						
						 
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
                                <th>Option</th>									
							  </tr>
							 
							  <tbody>
							 <?php while($fetchpremiumdata=mysqli_fetch_array($premiumdata)) {

								$getplanid=mysqli_fetch_array(mysqli_query($conn,"select plan_id from tbl_membership_user where user_id='".$fetchpremiumdata['user_id']."' and status=0"));
						
								$getplanname=mysqli_fetch_array(mysqli_query($conn,"select category from tbl_plan where id='".$getplanid['plan_id']."' and delete_status=0"));
								
								
								if($getplanname['category']=='premium')
								{
								?>
							  <tr>
							  <td><i class="fa fa-star" aria-hidden="true"></i></td>
							  <td>
							  <?php if($fetchpremiumdata['profile_image']!='') { ?>
							  <img src="../uploads/profile_image/<?php echo $fetchpremiumdata['profile_image']; ?>" width="100" height="100">
							  <?php } else { ?>
							  <img src="../images/noimage.jpg" width="100" height="100">
							  <?php } ?>
							  </td>
							  <td>NM<?php echo $fetchpremiumdata['user_id']; ?></td>
								<td><?php echo $fetchpremiumdata['name']; ?></td>
								<td><?php echo $fetchpremiumdata['email']; ?></td>
								<td><?php echo $fetchpremiumdata['gender']; ?></td>
								<td><?php echo $fetchpremiumdata['marital_status']; ?></td>
								<td><?php $fetchcity=mysqli_fetch_array(mysqli_query($conn,"select * from tbl_city where id='".$fetchpremiumdata['home_city']."'"));
								echo $fetchcity['city']; ?></td>
								<td><?php echo date("d-m-Y", strtotime($fetchpremiumdata['profile_created_by']));;?></td>
                                <td>
								 <a href="viewdetail.php?id=<?php echo $fetchpremiumdata['user_id'] ?>" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">View Profile</a>
                                 <a href="#" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">Send Mail</a>
                                 <a href="#" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">Send SMS</a>
                                 </td>								 
								</tr>
							 <?php } } ?>
								</tbody>
								</table>
						
						
						  
							  
								</div>
						</div>
						</div>
						</div>
						<div id="Recommended">
								<br>
								
				           <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3>
                                   		<b>RECOMMENDED MATCHES</b>
                                	</h3>
                                </div>
                            </div>
							<br>
                            <div class="row">
                    			<div class="col-md-12 col-xs-12">
						<div style="overflow-x:auto;">
						<table  id="member" class="display" style="width:100%">
						
						 
								<th>Status</th>
								<th onclick="sortTable(0)">Image</th>
								<th onclick="sortTable(1)">Matri_ID</th>
								<th onclick="sortTable(0)">Name</th>
								<th>Email</th>
								<th>Gender</th>								
								<th>Marital Status</th>
								<th>Location</th>
								<th>Registered On</th>								
							   <th>Option</th>	
							  </tr>
							 
							 <tbody>
							  <?php while($fetchrecommanddata=mysqli_fetch_array($recommenddata)) { ?>
							  <tr>
							  <td><i class="fa fa-star" aria-hidden="true"></i></td>
							  <td>
							  <?php if($fetchrecommanddata['profile_image']!='') { ?>
							  <img src="../uploads/profile_image/<?php echo $fetchrecommanddata['profile_image']; ?>" width="100" height="100">
							  <?php } else { ?>
							  <img src="../images/noimage.jpg" width="100" height="100">
							  <?php } ?>
							  </td>
							  <td>NM<?php echo $fetchrecommanddata['user_id']; ?></td>
								<td><?php echo $fetchrecommanddata['name']; ?></td>
								<td><?php echo $fetchrecommanddata['email']; ?></td>
								<td><?php echo $fetchrecommanddata['gender']; ?></td>
								<td><?php echo $fetchrecommanddata['marital_status']; ?></td>
								<td><?php $fetchcity=mysqli_fetch_array(mysqli_query($conn,"select * from tbl_city where id='".$fetchrecommanddata['home_city']."'"));
								echo $fetchcity['city']; ?></td>
								<td><?php echo date("d-m-Y", strtotime($fetchrecommanddata['profile_created_by']));;?></td>
                                <td>
								 <a href="viewdetail.php?id=<?php echo $fetchrecommanddata['user_id'] ?>" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">View Profile</a>
                                 <a href="#" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">Send Mail</a>
                                 <a href="#" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">Send SMS</a>
                                 </td>								 
								</tr>
								<?php } ?>
								</tbody>
								</table>
						
						
						  
							  
								</div>
						</div>
						</div>
						</div>
						
						<div id="location" class="collapse">
						
								<br>
								
				           <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3>
                                   		<b>LOCATION MATCHES</b>
                                	</h3>
                                </div>
                            </div>
							<br>
                            <div class="row">
                    			<div class="col-md-12 col-xs-12">
						<div style="overflow-x:auto;">
						<table  id="member" class="display" style="width:100%">
						
						 
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
                                <th>Option</th>									
							  </tr>
							 
							  <tbody>
							  <?php while($fetchlocationdata=mysqli_fetch_array($locationdata)) { ?>
							  <tr>
							  <td><i class="fa fa-star" aria-hidden="true"></i></td>
							  <td>
							  <?php if($fetchlocationdata['profile_image']!='') { ?>
							  <img src="../uploads/profile_image/<?php echo $fetchlocationdata['profile_image']; ?>" width="100" height="100">
							  <?php } else { ?>
							  <img src="../images/noimage.jpg" width="100" height="100">
							  <?php } ?>
							  </td>
							  <td>NM<?php echo $fetchlocationdata['user_id']; ?></td>
								<td><?php echo $fetchlocationdata['name']; ?></td>
								<td><?php echo $fetchlocationdata['email']; ?></td>
								<td><?php echo $fetchlocationdata['gender']; ?></td>
								<td><?php echo $fetchlocationdata['marital_status']; ?></td>
								<td><?php $fetchcity=mysqli_fetch_array(mysqli_query($conn,"select * from tbl_city where id='".$fetchlocationdata['home_city']."'"));
								echo $fetchcity['city']; ?></td>
								<td><?php echo date("d-m-Y", strtotime($fetchlocationdata['profile_created_by']));;?></td>
                                <td>
								 <a href="viewdetail.php?id=<?php echo $fetchlocationdata['user_id'] ?>" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">View Profile</a>
                                 <a href="#" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">Send Mail</a>
                                 <a href="#" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">Send SMS</a>
                                 </td>								 
								</tr>
								<?php } ?>
								</tbody>
								</table>
						
						
						  
							  
								</div>
						</div>
						</div>
						</div>
						
						
						<div id="education" class="collapse">
						
								<br>
								
				           <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3>
                                   		<b>EDUCATION MATCHES</b>
                                	</h3>
                                </div>
                            </div>
							<br>
                            <div class="row">
                    			<div class="col-md-12 col-xs-12">
						<div style="overflow-x:auto;">
						<table  id="member" class="display" style="width:100%">
						
						 
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
                                <th>Option</th>									
							  </tr>
							 
							  <tbody>
							  <?php while($fetcheducationdata=mysqli_fetch_array($educationdata)) { ?>
							  <tr>
							  <td><i class="fa fa-star" aria-hidden="true"></i></td>
							  <td>
							  <?php if($fetcheducationdata['profile_image']!='') { ?>
							  <img src="../uploads/profile_image/<?php echo $fetcheducationdata['profile_image']; ?>" width="100" height="100">
							  <?php } else { ?>
							  <img src="../images/noimage.jpg" width="100" height="100">
							  <?php } ?>
							  </td>
							  <td>NM<?php echo $fetcheducationdata['user_id']; ?></td>
								<td><?php echo $fetcheducationdata['name']; ?></td>
								<td><?php echo $fetcheducationdata['email']; ?></td>
								<td><?php echo $fetcheducationdata['gender']; ?></td>
								<td><?php echo $fetcheducationdata['marital_status']; ?></td>
								<td><?php $fetchcity=mysqli_fetch_array(mysqli_query($conn,"select * from tbl_city where id='".$fetcheducationdata['home_city']."'"));
								echo $fetchcity['city']; ?></td>
								<td><?php echo date("d-m-Y", strtotime($fetcheducationdata['profile_created_by']));;?></td>
                                <td>
								 <a href="viewdetail.php?id=<?php echo $fetcheducationdata['user_id'] ?>" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">View Profile</a>
                                 <a href="#" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">Send Mail</a>
                                 <a href="#" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">Send SMS</a>
                                 </td>								 
								</tr>
								<?php } ?>
								</tbody>
								</table>
						
						
						  
							  </div>
								</div>
						</div>
						</div>
					
						<div id="profession" class="collapse">
					
								<br>
								
				           <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3>
                                   		<b>PROFESSION MATCHES</b>
                                	</h3>
                                </div>
                            </div>
							<br>
                            <div class="row">
                    			<div class="col-md-12 col-xs-12">
						<div style="overflow-x:auto;">
						<table  id="member" class="display" style="width:100%">
						
						 
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
                                <th>Option</th>									
							  </tr>
							 
							  <tbody>
							  <?php while($fetchprofessiondata=mysqli_fetch_array($professiondata)) { ?>
							  <tr>
							  <td><i class="fa fa-star" aria-hidden="true"></i></td>
							  <td>
							  <?php if($fetchprofessiondata['profile_image']!='') { ?>
							  <img src="../uploads/profile_image/<?php echo $fetchprofessiondata['profile_image']; ?>" width="100" height="100">
							  <?php } else { ?>
							  <img src="../images/noimage.jpg" width="100" height="100">
							  <?php } ?>
							  </td>
							  <td>NM<?php echo $fetchprofessiondata['user_id']; ?></td>
								<td><?php echo $fetchprofessiondata['name']; ?></td>
								<td><?php echo $fetchprofessiondata['email']; ?></td>
								<td><?php echo $fetchprofessiondata['gender']; ?></td>
								<td><?php echo $fetchprofessiondata['marital_status']; ?></td>
								<td><?php $fetchcity=mysqli_fetch_array(mysqli_query($conn,"select * from tbl_city where id='".$fetchprofessiondata['home_city']."'"));
								echo $fetchcity['city']; ?></td>
								<td><?php echo date("d-m-Y", strtotime($fetchprofessiondata['profile_created_by']));;?></td>
                                <td>
								 <a href="viewdetail.php?id=<?php echo $fetchtodaydata['user_id'] ?>" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">View Profile</a>
                                 <a href="#" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">Send Mail</a>
                                 <a href="#" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">Send SMS</a>
                                 </td>								 
								</tr>
								<?php } ?>
								</tbody>
								</table>
						
						
						  
							  </div>
								</div>
						</div>
						</div>
					
						<div id="staff" class="collapse">
					
								<br>
								
				           <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3>
                                   		<b>STAR MATCHES</b>
                                	</h3>
                                </div>
                            </div>
							<br>
                            <div class="row">
                    			<div class="col-md-12 col-xs-12">
						<div style="overflow-x:auto;">
						<table  id="member" class="display" style="width:100%">
						
						 
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
                                <th>Option</th>									
							  </tr>
							 
							 <tbody>
							  <?php while($fetchstardata=mysqli_fetch_array($stardata)) { ?>
							  <tr>
							  <td><i class="fa fa-star" aria-hidden="true"></i></td>
							  <td>
							  <?php if($fetchstardata['profile_image']!='') { ?>
							  <img src="../uploads/profile_image/<?php echo $fetchstardata['profile_image']; ?>" width="100" height="100">
							  <?php } else { ?>
							  <img src="../images/noimage.jpg" width="100" height="100">
							  <?php } ?>
							  </td>
							  <td>NM<?php echo $fetchstardata['user_id']; ?></td>
								<td><?php echo $fetchstardata['name']; ?></td>
								<td><?php echo $fetchstardata['email']; ?></td>
								<td><?php echo $fetchstardata['gender']; ?></td>
								<td><?php echo $fetchstardata['marital_status']; ?></td>
								<td><?php $fetchcity=mysqli_fetch_array(mysqli_query($conn,"select * from tbl_city where id='".$fetchstardata['home_city']."'"));
								echo $fetchcity['city']; ?></td>
								<td><?php echo date("d-m-Y", strtotime($fetchstardata['profile_created_by']));;?></td>
                                <td>
								 <a href="viewdetail.php?id=<?php echo $fetchstardata['user_id'] ?>" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">View Profile</a>
                                 <a href="#" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">Send Mail</a>
                                 <a href="#" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">Send SMS</a>
                                 </td>								 
								</tr>
								<?php } ?>
								</tbody>
								</table>
						
						
						  
							  
								</div>
						</div>
						</div>
						</div>
					
						<div id="Mail">
								<br>
								
				          <!-- <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3>
                                   		<b>SENDED MAIL</b>
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
								
								<th onclick="sortTable(1)">Matri_ID</th>
								<th onclick="sortTable(0)">Subject</th>
								<th>Details</th>
								<th>To</th>								
								<th>Option</th>																
							  </tr>
							 
							  <tbody>
							  <tr>
							  <td>10-05-2019</td>
							  <td>example@gmail.com</td>
							  <td>Matches</td>
								<td>Education matches</td>
								<td>example@gmail.com</td>
								<td>
								 <a href="viewmember.php" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">View Profile</a>
                                 </td>									
								</tr>
								 <tr>
							  <td>10-05-2019</td>
							  <td>example@gmail.com</td>
							  <td>Matches</td>
								<td>Education matches</td>
								<td>example@gmail.com</td>
								<td>
								 <a href="viewmember.php" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">View Profile</a>
                                 </td>									
								</tr>
								<tr>
							  <td>10-05-2019</td>
							  <td>example@gmail.com</td>
							  <td>Matches</td>
								<td>Education matches</td>
								<td>example@gmail.com</td>
								<td>
								 <a href="viewmember.php" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">View Profile</a>
                                 </td>									
								</tr>
								 <tr>
							  <td>10-05-2019</td>
							  <td>example@gmail.com</td>
							  <td>Matches</td>
								<td>Education matches</td>
								<td>example@gmail.com</td>
								<td>
								 <a href="viewmember.php" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">View Profile</a>
                                 </td>									
								</tr>
								</tbody>
								</table>
						
						
						  
							  
								</div>
						</div>
						</div>
						</div>-->
						<!--
						<div id="SMS">
								<br>
								
				           <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3>
                                   		<b>SENDED SMS </b>
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
								<th onclick="sortTable(0)">Number</th>
								<th onclick="sortTable(1)">Subject</th>
								<th onclick="sortTable(0)">Details</th>
								<th>To</th>
								<th>Option</th>								
																
							  </tr>
							 
							  <tbody>
							  <tr>
							  <td>10-05-2019</td>
							  <td>9854712547</td>
							  <td>Matches</td>
								<td>Native Matches</td>
								<td>9658745214</td>
								 <td>
								 <a href="viewmember.php" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">View Profile</a>
                                </td>	
								</tr>
								 <tr>
							  <td>10-05-2019</td>
							  <td>9854712547</td>
							  <td>Matches</td>
								<td>Native Matches</td>
								<td>9658745214</td>
								 <td>
								 <a href="viewmember.php" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">View Profile</a>
                                </td>	
								</tr>
								<tr>
							  <td>10-05-2019</td>
							  <td>9854712547</td>
							  <td>Matches</td>
								<td>Native Matches</td>
								<td>9658745214</td>
								 <td>
								 <a href="viewmember.php" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">View Profile</a>
                                </td>	
								</tr>
								 <tr>
							  <td>10-05-2019</td>
							  <td>9854712547</td>
							  <td>Matches</td>
								<td>Native Matches</td>
								<td>9658745214</td>
								 <td>
								 <a href="viewmember.php" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">View Profile</a>
                                </td>	
								</tr>
								</tbody>
								</table>
						
						
						  
							  
								</div>
						</div>
						</div>
						</div>
							-->	
								
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
