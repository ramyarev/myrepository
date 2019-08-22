<?php

ob_start();
session_start();
require('../config.php');

if($_SESSION['adminid']=='')
{
header('location:../adminlogin.php');
}


/* if($_POST['delete2']=='submit')
{
	$reason=$_POST['reason'];
	$fixed_date1=$_POST['fixed_date1'];
	$site_name=$_POST['site_name'];
	
	mysqli_query($conn,"insert into tbl_delete_account (reason,fixed_date1,site_name,user_id) values('"
	.$reason."','".$fixed_date1."','".$site_name."','".$_GET['id']."')");
	
}
 */
if($_POST['delete1']=='submit' || $_POST['delete2']=='submit' || $_POST['delete3']=='submit')
{
	$reason=$_POST['reason'];
	
	$bride_name=$_POST['bride_name'];
	$marriage_option=$_POST['marriage_option'];
	$fixed_date=$_POST['fixed_date'];
	$story=$_POST['story'];
	$fixed_date1=$_POST['fixed_date1'];
	$site_name=$_POST['site_name'];
	
	$getcount=mysqli_fetch_array(mysqli_query($conn,"select count(*) as count from tbl_delete_account where user_id='".$_GET['id']."'"));
	
	if($getcount['count']==0)
	{
		
	mysqli_query($conn,"insert into tbl_delete_account (reason,bride_name,marriage_option,fixed_date,story,user_id,fixed_date1,site_name) values('"
	.$reason."','".$bride_name."','".$marriage_option."','".$fixed_date."','".$story."','".$_GET['id']."','".$fixed_date1."','".$site_name."')");
	
	
	}
	else{
		mysqli_query($conn,"update tbl_delete_account set reason='".$reason."',bride_name='".$bride_name."',marriage_option='".$marriage_option."',fixed_date='".$fixed_date."',story='".$story."',fixed_date1='".$fixed_date1."',site_name='".$site_name."' where user_id='".$_GET['id']."'");
		
		
	}
	
}

if($_POST['setstatus']=='save')
{
	$block_status=$_POST['block_status'];
	mysqli_query($conn,"update tbl_blocklist set block_status='".$block_status."' where user_id='".$_GET['id']."'");
}

if($_POST['block']=='submit')
{
	$search_id=$_POST['search_id'];
	
	$getcount=mysqli_fetch_array(mysqli_query($conn,"select count(*) as count from tbl_blocklist where user_id='".$_GET['id']."'"));
	
	if($getcount['count']==0)
	{
	mysqli_query($conn,"insert into tbl_blocklist (search_id,user_id) values('"
	.$search_id."','".$_GET['id']."')");
	}
	else{
		mysqli_query($conn,"update tbl_account_privacy set search_id='".$search_id."' where user_id='".$_GET['id']."'");
		
		
	}
	
	
	
}
if($_POST['save']=='submit')
{
	$contact_settings=$_POST['contact_settings'];
	$profile_active=$_POST['profile_active'];
	$contact_settings2=$_POST['contact_settings2'];
	$horoscope_settings=$_POST['horoscope_settings'];
	$getcount=mysqli_fetch_array(mysqli_query($conn,"select count(*) as count from tbl_account_privacy where user_id='".$_GET['id']."'"));
	
	if($getcount['count']==0)
	{
	mysqli_query($conn,"insert into tbl_account_privacy (contact_settings,profile_active,contact_settings2,horoscope_settings,user_id) values('"
	.$contact_settings."','".$profile_active."','".$contact_settings2."','".$horoscope_settings."','".$_GET['id']."')");
	}
	else{
		mysqli_query($conn,"update tbl_account_privacy set contact_settings='".$contact_settings."',profile_active='".$profile_active."',contact_settings2='".$contact_settings2."',horoscope_settings='".$horoscope_settings."' where user_id='".$_GET['id']."'");
		
		
	}
	
	header('location:details.php?id='.$_GET['id']);
}


if($_POST['notification']=='submit')
{
	$today=$_POST['today'];
	$viewed_my_profile=$_POST['viewed_my_profile'];
	$new_match=$_POST['new_match'];
	$photo_match=$_POST['photo_match'];
	$shortlist_me=$_POST['shortlist_me'];
	$all_notification=$_POST['all_notification'];
	$sms_alert=$_POST['sms_alert'];
	$email_alert=$_POST['email_alert'];
	
	$getcount1=mysqli_fetch_array(mysqli_query($conn,"select count(*) as count from tbl_notification_alert where user_id='".$_GET['id']."'"));
	
	if($getcount1['count']==0)
	{
	mysqli_query($conn,"insert into tbl_notification_alert (today,viewed_my_profile,new_match,photo_match,shortlist_me,all_notification,sms_alert,email_alert,user_id) values('"
	.$today."','".$viewed_my_profile."','".$new_match."','".$photo_match."','".$shortlist_me."','".$all_notification."','".$sms_alert."','".$email_alert."','".$_GET['id']."')");
	
	}
	else{
		mysqli_query($conn,"update tbl_notification_alert set today='".$today."',viewed_my_profile='".$viewed_my_profile."',new_match='".$new_match."',photo_match='".$photo_match."',shortlist_me='".$shortlist_me."' ,all_notification='".$all_notification."',sms_alert='".$sms_alert."',email_alert='".$email_alert."' where user_id='".$_GET['id']."'");
		
		
	}
	
	header('location:details.php?id='.$_GET['id']);
	
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
table th , table td{
    text-align: center;
}

table tr:nth-child(even){
    background-color: #e4e3e3
}

th {
  background: #01c0c8;
  color: #fff;
}

.pagination {
  margin: 0;
}

.pagination li:hover{
    cursor: pointer;
}

.header_wrap {

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
.switch {
  position: relative;
  display: inline-block;
  width: 50px;
  height: 25px;
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
  height: 18px;
  width: 18px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #de3c94;
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
                        <h4 class="page-title"> <a href="index.php">Details </a></h4>
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
                        	
							
								<div id="tabs">
								<ul style="border:none">
									<li><a href="#Offer">My Offers</a>
									</li>
									<li><a href="#Invites">My Refers & Invites</a>
									</li>
									<li><a href="#Settings">Settings</a><span class="caret"></span>
									</li>
									<li><a href="#Statistics">Statistics Viewed by Others</a>
									</li>
									<li><a href="#Statistics_1">Statistics Viewed by Me</a>
									</li>
									
									<li><a href="#Notification">Notifications</a>
									</li>
									<li><a href="#Plan">Plan Details</a>
									</li>
									<li><a href="" style="color:red;font-weight:bold">Service</a>
									</li>
									<li><a href="" style="color:red;font-weight:bold">Live Chat</a>
									</li>
									<li><a href="" style="color:red;font-weight:bold">Admin Chat</a>
									</li>
									
									<li><a href="#help">Help & Support</a>
									</li>
								</ul>
								<div id="Settings" style="overflow-x:auto;"class="col-sm-12">
								<ul  class="nav"style="display:inlineblock;list-style-type:none;cursor: pointer;background: #1e5d77;color: #fff;">
								    <li class="nav-item"><a data-toggle="collapse" data-target="#account"><i class="fa fa-lock" aria-hidden="true"></i> &nbsp Account Privacy</a>
									</li>
									<li class="nav-item"><a data-toggle="collapse" data-target="#notification_alert"><i class="fa fa-bell" aria-hidden="true"></i> &nbsp Notification Alert</a>
									</li>
									<li class="nav-item"><a data-toggle="collapse" data-target="#blocked_list"><i class="fa fa-ban" aria-hidden="true"></i> &nbsp Blocked List</a>
									</li>
									<li class="nav-item"><a data-toggle="collapse" data-target="#delete"><i class="fa fa-trash" aria-hidden="true"></i> &nbsp Delete Account</a>
									</li>
									</ul>
									</div>
									<!--<div id="Service" style="overflow-x:auto;"class="col-sm-12">
								    <ul  class="nav"style="display:inlineblock;list-style-type:none;cursor: pointer;background: #1e5d77;color: #fff;">
								    <li class="nav-item"><a data-toggle="collapse" data-target="#mandapam"><i class="fa fa-home" aria-hidden="true"></i> &nbsp Mandapam</a>
									</li>
									<li class="nav-item"><a data-toggle="collapse" data-target="#bazar"><i class="fa fa-shopping-cart" aria-hidden="true"></i> &nbsp Bazaar</a>
									</li>
									<li class="nav-item"><a data-toggle="collapse" data-target="#photography"><i class="fa fa-camera" aria-hidden="true"></i> &nbsp Photography</a>
									</li>
									
									</ul>
									</div>-->
									<div id="Notification" style="overflow-x:auto;"class="col-sm-12">
								    <ul  class="nav"style="display:inlineblock;list-style-type:none;cursor: pointer;background: #1e5d77;color: #fff;">
									<li class="nav-item"><a data-toggle="collapse" data-target="#all_notification"><i class="fa fa-bell" aria-hidden="true"></i> &nbsp All</a>
									</li>
								    <li class="nav-item"><a data-toggle="collapse" data-target="#accept"><i class="fa fa-thumbs-up" aria-hidden="true"></i> &nbsp Accepted</a>
									</li>
									<li class="nav-item"><a data-toggle="collapse" data-target="#decline"><i class="fa fa-thumbs-down" aria-hidden="true"></i> &nbsp Declined</a>
									</li>
									<li class="nav-item"><a data-toggle="collapse" data-target="#interest"><i class="fa fa-thumbs-up" aria-hidden="true"></i> &nbsp Interest Sent</a>
									</li>
									<li class="nav-item"><a data-toggle="collapse" data-target="#select_other"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> &nbsp Shortlist by Other</a>
									</li>
									<li class="nav-item"><a data-toggle="collapse" data-target="#select_me"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> &nbsp Shortlist by Me</a>
									</li>
									
									</ul>
									</div>
							
								<div id="Offer">
								<br>
								
				           <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3>
                                   		<b>MY OFFERS</b>
                                	</h3>
                                </div>
                            </div>
							
                            <div class="row"  class="list-inline gallery">
							<div class="col-sm-9"></div>
							<div class="row">
							<div class="col-xs-12">
							<a href="add offer.php" class="btn btn-custom btn-block waves-effect waves-light" style="background-color:#5bd2d7;">ADD</a></td></div>
							<div class="col-xs-12">
						    <a href="remove offer.php" class="btn btn-custom btn-block waves-effect waves-light" style="background-color:#5bd2d7;">Remove</a></td>
								</div></div><br>
						
                    			<div class="col-md-12 col-xs-12">
						<div style="overflow-x:auto;">
						<table  id="member" class="display"  style="width:100%">
						
						  
							  <tr><th><input type="checkbox" id="select_all"> &nbsp Select </th>
								<th>Applied On</th>
								<th onclick="sortTable(0)">Banner</th>
								<th onclick="sortTable(1)">Details</th>
								<th onclick="sortTable(0)">Validity</th>
								<th>Promo Code</th>
								<th>View</th>																							
							  </tr>
							 
							  <tbody>
							  <tr>
							  <td><input type="checkbox" id="select_all"> </td>
							    <td>10-05-2019</td>
							    <td><img src="../uploads/photo_gallery/Bala.jpg" class="thumbnail zoom" width="100" height="100"></td>
							    <td>Rs.10000 off on Domestic </td>
								<td>10-05-2019</td>
								<td>NM 12547</td>
								<td><i class="fa fa-thumbs-up" aria-hidden="true" style="color:#05b674;"></i></td>
											 
								</tr>
								 
								<tr>
								<td><input type="checkbox" id="select_all"> </td>
							    <td>10-05-2019</td>
							    <td><img src="../uploads/photo_gallery/Bala.jpg" class="thumbnail zoom" width="100" height="100"></td>
							    <td>Rs.10000 off on Domestic </td>
								<td>10-05-2019</td>
								<td>NM 12547</td>
								<td><i class="fa fa-thumbs-up" aria-hidden="true" style="color:#05b674;"></i></td>
											 
								</tr>
								 <tr>
								 <td><input type="checkbox" id="select_all"> </td>
							    <td>10-05-2019</td>
							    <td><img src="../uploads/photo_gallery/Bala.jpg" class="thumbnail zoom" width="100" height="100"></td>
							    <td>Rs.10000 off on Domestic </td>
								<td>10-05-2019</td>
								<td>NM 12547</td>
								<td><i class="fa fa-thumbs-up" aria-hidden="true" style="color:#05b674;"></i></td>
											 
								</tr>
								</tbody>
								</table>																		  							  
								</div>
						</div>
						</div>
						</div>
						<div id="Invites">
								<br>
								
				           <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3>
                                   		<b>MY REFERS AND INVITES</b>
                                	</h3>
                                </div>
                            </div>
							<br>
                            <div class="row">
                    			<div class="col-md-12 col-xs-12">
						<div style="overflow-x:auto;">
						<table  id="member" class="display" style="width:100%">
						
						 
							  <tr>
								
								<th onclick="sortTable(0)">Number of people Referable</th>
								<th onclick="sortTable(1)">Successfully Referable</th>
								
																
							  </tr>
							  
							  <?php 
							 $getreffer= mysqli_fetch_array(mysqli_query($conn,"select count(*) as count from tbl_invite_earn where refferal_id='".$_GET['id']."' and status=0"));
							 $successreffer= mysqli_fetch_array(mysqli_query($conn,"select count(*) as count from tbl_invite_earn where refferal_id='".$_GET['id']."' and status=1"));
							 
							  ?>
							 
							  <tbody>
							  <tr>
							  <td><?php echo $getreffer['count']; ?></td>
							  <td><?php echo $successreffer['count'];?></td>
							
								</tr>
								
								</tbody>
								</table>
						
						
						  
							  
								</div>
						</div>
						</div>
						</div>
						<div id="account" class="collapse">
								<br>
								
				           <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3>
                                   		<b>Account Privacy</b>
                                	</h3>
                                </div>
                            </div>
							<br>
                            <div class="row">
							<div style="overflow-x:auto;">
							
							<div class="col-lg-12">
								<h2 style="text-align:right;"><a data-toggle="collapse" data-target="#edit" onclick="enableedit()" style="color:#de3c94;">(EDIT)</a></h2>
						</div>
                    			<div class="col-md-6 col-xs-16">
								<script>
								function enableedit()
								{
									      $("#contact_settings").prop("disabled", false);  
									      $("#contact_settings2").prop("disabled", false);  
									      $("#horoscope_settings").prop("disabled", false);  
									      $("#profile_active").prop("disabled", false);  
										  $('#save').show();;
										  
								}
								</script>
								
						<form method="post">
						<div class="form-group">
                                		<label>
                                    		<b>Contact Settings:</b>
                                   	 	</label>
                                    	<select class="form-control" data-validetta="required" name="contact_settings" id="contact_settings"  disabled>
                                       <option readonly value="Visible To Only Paid Members">Visible To Only Paid Members</option>
                                    	<option value="Paid Members from My Community">Paid Members from My Community</option>
                                        <option value="Hide to all">Hide to all</option>
                                      
                                        </select>
											
                                	</div>
									<div class="form-group">
                                		<label>
                                    		<b>Contact Settings:</b>
                                   	 	</label>
                                    	<select class="form-control" data-validetta="required" name="contact_settings2" id="contact_settings2" disabled>
                                       <option readonly value="Visible To Only Paid Members">Visible To Only Paid Members</option>
                                    	<option  value="Paid Members from My Community">Paid Members from My Community</option>
                                        </select>
											
                                	</div>
									</div>
									<div class="col-md-6 col-xs-16">
									<div class="form-group">
                                		<label>
                                    		Profile Active
                                   	 	</label>
                                    	<select class="form-control" data-validetta="required" name="profile_active" id="profile_active" disabled>
                                       <option readonly value="Active (Show your profile to other members)">Active (Show your profile to other members)</option>
                                    	<option value="Inactive (Hide your profile from showing)">Inactive (Hide your profile from showing)</option>
                                        
                                        </select>
											
                                	</div>
									<div class="form-group">
                                		<label>
                                    		Horoscope Settings
                                   	 	</label>
                                    	<select class="form-control" data-validetta="required" name="horoscope_settings" id="horoscope_settings" disabled>
                                       <option readonly value="Visible to all"> Visible to all</option>
                                    	<option value="Show only to accepted members">Show only to accepted members</option>
                                       
                                        </select>
										
										<?php $fetchprivacy= mysqli_fetch_array(mysqli_query($conn,"select * from tbl_account_privacy where user_id='".$_GET['id']."'")); ?>
										
										<Script>
										document.getElementById('contact_settings').value="<?php echo $fetchprivacy['contact_settings']; ?>";
										document.getElementById('contact_settings2').value="<?php echo $fetchprivacy['contact_settings2']; ?>";
										document.getElementById('profile_active').value="<?php echo $fetchprivacy['profile_active']; ?>";
										document.getElementById('horoscope_settings').value="<?php echo $fetchprivacy['horoscope_settings']; ?>";
										</Script>
											
                                	</div>
						<div class="form-group">
									<input type="submit" name="save" id="save" style="display:none" class="btn btn-danger btn-flat btn-lg" value="submit"><a id="account" class="collapse">Save</a>
									</div>
						</form>
						  
							  
								</div>
						</div>
						</div>
						</div>
						<div id="notification_alert" class="collapse">
								<br>
								
				           <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3>
                                   		<b>Notification Alert</b>
                                	</h3>
                                </div>
                            </div>
							<br>
                            <div class="row">
							<div class="col-md-6 col-xs-16" style="margin-left:10px">
								
						<form method="post">
						
						<?php 
						$getnotification=mysqli_fetch_array(mysqli_query($conn,"select * from tbl_notification_alert where user_id='".$_GET['id']."'"));
						
						if($getnotification['today']=='on')
							$today='checked';
						else
							$today='';
						if($getnotification['viewed_my_profile']=='on')
							$viewed_my_profile='checked';
						else
							$viewed_my_profile='';
						if($getnotification['new_match']=='on')
							$new_match='checked';
						else
							$new_match='';
						if($getnotification['photo_match']=='on')
							$photo_match='checked';
						else
							$photo_match='';
						if($getnotification['shortlist_me']=='on')
							$shortlist_me='checked';
						else
							$shortlist_me='';
						if($getnotification['all_notification']=='on')
							$all_notification='checked';
						else
							$all_notification='';
						if($getnotification['sms_alert']=='on')
							$sms_alert='checked';
						else
							$sms_alert='';
						
						if($getnotification['email_alert']=='on')
							$email_alert='checked';
						else
							$email_alert='';
						?>
						<div class="form-group col-md-12 col-xs-12">
                           	 		<div class="row">
									<div class="col-md-6">
                                	
                                   	 		Today Matches
                                	
										</div>
										<div class="col-md-6">
                               	 		<span><label class="switch">
                                        <input type="checkbox" id="today" name="today" <?php echo $today; ?>>
                                        <span class="slider round"></span>
                                       </label></span>
									   </div>
                            		</div>
                        		 </div>
								 <div class="form-group col-md-12 col-xs-12">
                           	 		<div class="row">
									<div class="col-md-6">
                                	
                                   	 		Who Viewed my Profile
                                	
										</div>
										<div class="col-md-6">
                               	 		<span><label class="switch">
                                        <input type="checkbox" id="viewed_my_profile" <?php echo $viewed_my_profile; ?> name="viewed_my_profile">
                                        <span class="slider round"></span>
                                       </label></span>
									   </div>
                            		</div>
                        		 </div>
								 <div class="form-group col-md-12 col-xs-12">
                           	 		<div class="row">
									<div class="col-md-6">
                                		<label>
                                   	 		New Matching Profile
                                		</label>
										</div>
										<div class="col-md-6">
                               	 		<span><label class="switch">
                                        <input type="checkbox" id="new_match" name="new_match" <?php echo $new_match; ?>>
                                        <span class="slider round"></span>
                                       </label></span>
									   </div>
                            		</div>
                        		 </div>
								 <div class="form-group col-md-12 col-xs-12">
                           	 		<div class="row">
									<div class="col-md-6">
                                	
                                   	 		Photo Match Watch
                                	
										</div>
										<div class="col-md-6">
                               	 		<span><label class="switch">
                                        <input type="checkbox" id="photo_match" name="photo_match" <?php echo $photo_match; ?>>
                                        <span class="slider round"></span>
                                       </label></span>
									   </div>
                            		</div>
                        		 </div>
								 <div class="form-group col-md-12 col-xs-12">
                           	 		<div class="row">
									<div class="col-md-6">
                                		
                                   	 		Who Shortlisted Me
                                	
										</div>
										<div class="col-md-6">
                               	 		<span><label class="switch">
                                        <input type="checkbox" id="shortlist_me" name="shortlist_me" <?php echo $shortlist_me; ?>>
                                        <span class="slider round"></span>
                                       </label></span>
									   </div>
                            		</div>
                        		 </div>
								 <div class="form-group col-md-12 col-xs-12">
                           	 		<div class="row">
									<div class="col-md-6">
                                		
                                   	 		All Notifications
                                		
										</div>
										<div class="col-md-6">
                               	 		<span><label class="switch">
                                        <input type="checkbox" id="all_notification" name="all_notification" <?php echo $all_notification; ?>>
                                        <span class="slider round"></span>
                                       </label></span>
									   </div>
                            		</div>
                        		 </div>
								 <div class="form-group col-md-12 col-xs-12">
                           	 		<div class="row">
									<div class="col-md-6">
                                		
                                   	 		SMS Alert
                                		
										</div>
										<div class="col-md-6">
                               	 		<span><label class="switch">
                                        <input type="checkbox" id="sms_alert" name="sms_alert" <?php echo $sms_alert; ?>>
                                        <span class="slider round"></span>
                                       </label></span>
									   </div>
                            		</div>
                        		 </div>
								 <div class="form-group col-md-12 col-xs-12">
                           	 		<div class="row">
									<div class="col-md-6">
                                		
                                   	 		E-Mail Alert
                                		
										</div>
										<div class="col-md-6">
                               	 		<span><label class="switch">
                                        <input type="checkbox" id="email_alert" name="email_alert" <?php echo $email_alert; ?>>
                                        <span class="slider round"></span>
                                       </label></span>
									   </div>
                            		</div>
                        		 </div>
								 <input type="submit" name="notification" id="notification" value="submit" class="btn btn-danger btn-flat btn-lg"><a id="account" class="collapse">Save</a>
									
								 </div>
								 </div>
								 </div>
								
										
										
						<div id="Statistics">
								<br>
								
				           <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3>
                                   		<b>STATISTICS VIEWED BY OTHERS</b>
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
							  <th>Viewed On</th>								
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
							  
							  <?php 
								$getviewbyyou=mysqli_query($conn,"select * from tbl_events where partner_id='".$_GET['id']."' and view=1");
								while($fetchgetviewbyyou=mysqli_fetch_array($getviewbyyou))
								{	
								$byyouuser=mysqli_fetch_array(mysqli_query($conn,"select * from tbl_user where user_id='".$fetchgetviewbyyou['partner_id']."'"));
								
								$fetchcaste=mysqli_fetch_array(mysqli_query($conn,"select caste from tbl_caste where id='".$byyouuser['caste']."'"));
								$fetchsubcaste=mysqli_fetch_array(mysqli_query($conn,"select subcaste from tbl_subcaste where id='".$byyouuser['sub_caste']."'"));
								?>
							  <tr>
							  
							  <td><i class="fa fa-star" aria-hidden="true"></i></td>
							 <td><?php echo $fetchgetviewbyyou['date']; ?>
							 
							  <td>
							  <?php if($byyouuser['profile_image']!='') { ?>
							  <img src="../uploads/profile_image/<?php echo $byyouuser['profile_image']; ?>" width="100" height="100">
							  <?php } else { ?>
							  <img src="../images/profile.png" width="100" height="100">
							  <?php } ?>
							  </td>
							  <td>NM<?php echo $byyouuser['user_id']; ?></td>
								<td><?php echo $byyouuser['name']; ?></td>
								<td><?php echo $byyouuser['email']; ?></td>
								<td><?php echo $byyouuser['gender']; ?></td>
								<td><?php echo $byyouuser['marital_status']; ?></td>
								<td><?php $fetchcity=mysqli_fetch_array(mysqli_query($conn,"select * from tbl_city where id='".$byyouuser['home_city']."'"));
									echo $fetchcity['city'];?></td>
								<td><?php echo  date("d-m-Y", strtotime($byyouuser['profile_created_by']));; ?></td>
                                <td>
								 <a href="viewmember.php" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">View Profile</a>
                                </td>									
								</tr>
								 <?php } ?>
								</tbody>
								</table>
						
						
						  
							  
								</div>
						</div>
						</div>
						</div>
						<div id="Statistics_1">
								<br>
								
				           <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3>
                                   		<b>STATISTICS VIEWED BY Me</b>
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
								<th>Viewed On</th>
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
							  
							  <?php 
								$getviewbyyou=mysqli_query($conn,"select * from tbl_events where user_id='".$_GET['id']."' and view=1");
								while($fetchgetviewbyyou=mysqli_fetch_array($getviewbyyou))
								{	
								$byyouuser=mysqli_fetch_array(mysqli_query($conn,"select * from tbl_user where user_id='".$fetchgetviewbyyou['partner_id']."'"));
								
								$fetchcaste=mysqli_fetch_array(mysqli_query($conn,"select caste from tbl_caste where id='".$byyouuser['caste']."'"));
								$fetchsubcaste=mysqli_fetch_array(mysqli_query($conn,"select subcaste from tbl_subcaste where id='".$byyouuser['sub_caste']."'"));
								?>
							  <tr>
							  
							  <td><i class="fa fa-star" aria-hidden="true"></i></td>
							 <td><?php echo $fetchgetviewbyyou['date']; ?>
							 
							  <td>
							  <?php if($byyouuser['profile_image']!='') { ?>
							  <img src="../uploads/profile_image/<?php echo $byyouuser['profile_image']; ?>" width="100" height="100">
							  <?php } else { ?>
							  <img src="../images/profile.png" width="100" height="100">
							  <?php } ?>
							  </td>
							  <td>NM<?php echo $byyouuser['user_id']; ?></td>
								<td><?php echo $byyouuser['name']; ?></td>
								<td><?php echo $byyouuser['email']; ?></td>
								<td><?php echo $byyouuser['gender']; ?></td>
								<td><?php echo $byyouuser['marital_status']; ?></td>
								<td><?php $fetchcity=mysqli_fetch_array(mysqli_query($conn,"select * from tbl_city where id='".$byyouuser['home_city']."'"));
									echo $fetchcity['city'];?></td>
								<td><?php echo  date("d-m-Y", strtotime($byyouuser['profile_created_by']));; ?></td>
                                <td>
								 <a href="viewmember.php" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">View Profile</a>
                                </td>									
								</tr>
								 <?php } ?>
								</tbody>
								</table>
						
						
						  
							  
								</div>
						</div>
						</div>
						</div>
						
						<div id="blocked_list"class="collapse">
								<br>
								
				           <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3>
                                   		<b>Blocked List</b>
                                	</h3>
                                </div>
                            </div>
						
                            <div class="row">
							<div class="col-lg-12">
								<h2 style="text-align:right;"><a data-toggle="collapse" data-target="#add_block" style="color:#de3c94;"> (<i class="fa fa-user-plus" aria-hidden="true"></i> &nbsp Add to block list)</a></h2>
								<div id="add_block"class="collapse">
								
				           <div class="row">
                            	<div class="col-lg-6 col-sm-6 col-md-5 col-xs-10"> <!--a href="https://themeforest.net/item/elite-admin-responsive-dashboard-web-app-kit-/16750820" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy Now</a-->
                        <ol>
                            <form role="search" class="app-search" method="post">
                            <input type="search" placeholder="Search by Name / ID / Cell Number" id="search_id" name="search_id" class="form-control"> <br>
							
							<input type="submit" name="block" value="submit" id="block" class="btn btn-danger btn-flat btn-lg"><a id="account" class="collapse">Submit</a>
                               
							</form>
                       
                        </ol>
                    </div>
					</div>
					</div>
						</div>
                    			<div class="col-md-12 col-xs-12">
								
						<div style="overflow-x:auto;">
						<table  id="member" class="display" style="width:100%">
						
						 
							  <tr>
								<th>Status</th>
								<th>Date & Time</th>
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
							  <?php $getlist=mysqli_query($conn,"select* from tbl_blocklist"); 
								while($fetchlist=mysqli_fetch_array($getlist))
								{
										
										$fetchuser=mysqli_fetch_array(mysqli_query($conn,"select * from tbl_user where user_id='".$fetchlist['user_id']."'"));
							  ?>
							  <tr>
							  <td>
							  <?php if($fetchuser['login_way']=='desktop') { ?>
								<i class="icon-star icon-large icon-d"></i>
								<?php } else if($fetchuser['login_way']=='mobile') { ?>
								<i class="icon-star icon-large icon-c"></i>
								<?php } else { ?>
								<i class="icon-star icon-large icon-a"></i>
								<?php } ?>
							  </td>
							  <td><?php echo $fetchuser['lastlogin']; ?>
							  <td>
								<?php 
								
								if($fetchuser['profile_image_approve']==0)
								{
									$watermark='opacity:0.2';
								}
								else
								{
									$watermark='opacity:1';
								}
								if($fetchuser['profile_image']!='') { 
								?>
								<div class="top-left">Nammamatrimony.in</div>
								<img src="../uploads/profile_image/<?php echo $fetchuser['profile_image']; ?>" width="150" height="150" style="<?php echo $watermark; ?>">
								
								<?php } else { ?>
								<img src="../images/noimage.jpg" width="100" height="100">
								<?php } ?>
								</td>
							  <td>NM<?php echo $fetchuser['user_id']; ?></td>
								<td><?php echo $fetchuser['name']; ?></td>
								<td><?php echo $fetchuser['email']; ?></td>
								<td><?php echo $fetchuser['gender']; ?></td>
								<td><?php echo $fetchuser['marital_status']; ?></td>
								<td><?php $fetchcity=mysqli_fetch_array(mysqli_query($conn,"select * from tbl_city where id='".$fetchuser['home_city']."'"));
									echo $fetchcity['city'];?></td>
								<td><?php echo $fetchuser['profile_created_by'] ?></td>
                                <td>
								<form method="post">
								<div class="form-group">
                                		
                                    	<select class="form-control" name="block_status" id="block_status" >
                                       
                                        <option value="block" >Block</option>
										<option value="unblock" >Unblock</option>										
                                         </select><br>
										 <script>
										 document.getElementById('block_status').value="<?php echo $fetchlist['block_status'] ?>";
										 </script>
										 <input type="submit" name="setstatus" id="setstatus" value="save" class="btn btn-danger btn-flat btn-lg"><a id="account" class="collapse">Save</a>
										
                                	</div>
									</form>
								</td>									
								</tr>
								<?php } ?>
								 
								</tbody>
								</table>
						
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
						<div id="delete"  class="collapse" style="margin-left:30px">
								<br>
								
				           <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3>
                                   		<b>Delete</b>
                                	</h3>
									<h4><b>Marriage Fixed</b></h4>
									<h5>Congratulations..!</h5>
									<p>We are happy that you found your life partner</p>
                                </div>
                            </div>
							<br>
                            <div class="row">
							<div style="overflow-x:auto;">
							
							<div class="col-md-12 col-xs-12">
								
						<form method="post">
						<div class="form-group">
						<?php 
						$getdelete=mysqli_fetch_array(mysqli_query($conn,"select * from tbl_delete_account where user_id='".$_GET['id']."'"));
						
						
						if($getdelete['reason']==1)
						{
							$reason1='checked';
							$reason2='';
							$reason3='';
							$reason4='';
							$reason5='';
							$reason6='';
							$reason7='';
						}
						else if($getdelete['reason']==2)
						{
							$reason1='';
							$reason2='checked';
							$reason3='';
							$reason4='';
							$reason5='';
							$reason6='';
							$reason7='';
						}
						else if($getdelete['reason']==3)
						{
							$reason1='';
							$reason2='';
							$reason3='checked';
							$reason4='';
							$reason5='';
							$reason6='';
							$reason7='';
						}
						else if($getdelete['reason']==4)
						{
							$reason1='';
							$reason2='';
							$reason3='';
							$reason4='checked';
							$reason5='';
							$reason6='';
							$reason7='';
						}
						else if($getdelete['reason']==5)
						{
							$reason1='';
							$reason2='';
							$reason3='';
							$reason4='';
							$reason5='checked';
							$reason6='';
							$reason7='';
						}
						else if($getdelete['reason']==6)
						{
							$reason1='';
							$reason2='';
							$reason3='';
							$reason4='';
							$reason5='';
							$reason6='checked';
							$reason7='';
						}
						
						else if($getdelete['reason']==7)
						{
							$reason1='';
							$reason2='';
							$reason3='';
							$reason4='';
							$reason5='';
							$reason6='';
							$reason7='checked';
						}
						
						
						?>
                                		<div>
									  <input type="radio" name="reason" id="reason" onclick="getcontent(1)" value="1" <?php echo $reason1; ?>> Marriage fixed date<br>
									  
									  <?php if($getdelete['reason']==3 || $getdelete['reason']==1){
											$enablestyle='display:block';
									  }
									  else
									  {
										  $enablestyle='display:none';
									  }
									  ?>
									  <div id="enablediv1" style='<?php echo $enablestyle; ?>'>
									<div class="form-group">
                                		<label>
                                    		Bride's Name
                                   	 	</label>
                                    	<input type="text" class="form-control" data-validetta="required" value="<?php echo $getdelete['bride_name'] ?>" name="bride_name" id="bride_name">
                                           
									
                                	</div>
									<script>
									
									function getcontent(id)
									{
										if(id==1 || id==3)
										{
										document.getElementById('enablediv1').style.display="block";
									document.getElementById('otherdiv').style.display="none";
										}
									if(id==2)
									{
										document.getElementById('otherdiv').style.display="block";
									document.getElementById('enablediv1').style.display="none";
									}
									}
									function opendate(id)
									{
										
										if(id==1)
										{
											
											document.getElementById('opendatediv').style.display="block";
										}
										else
										{
											document.getElementById('opendatediv').style.display="none";
										}
									}
									</script>
									
									<div class="form-group">
									  <input type="radio" name="marriage_option" id="marriage_option" onclick="opendate(1);" value="1"> Marriage fixed date<br>
									  
									  <?php if($getdelete['marriage_option']==1){
											$enablestyle1='display:block';
									  }
									  else
									  {
										  $enablestyle1='display:none';
									  }
									  ?>



									  <div id="opendatediv" class="form-group" style="<?php echo $enablestyle1; ?>">
                                      <input type="date" class="form-control" name="fixed_date" id="fixed_date" value="<?php echo $getdelete['fixed_date']?>">
									</div>
									
									<input type="radio" name="marriage_option" id="marriage_option" value="2"  onclick="opendate(2);"> Date not yet fixed<br>
									</div>
									<div class="form-group">
                                		<label>
                                    		Your Story
                                    	</label>
                                    	<textarea class="form-control" name="story" id="story"><?php echo $getdelete['story']; ?></textarea>
                                    </div>
									<div class="form-group">
                                		<input type="submit" name="delete1" id="delete1" value="submit" class="btn btn-danger btn-flat btn-lg"><a id="account" class="collapse">Submit</a>
										
                                    	
                               <a href="#viewmember.php" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">Cancel</a>
                               	</div>
									</div>
                                       <input type="radio" name="reason" id="reason" onclick="getcontent(2)" <?php echo $reason2; ?> value="2"> Through Other Marital Site
									   
									    <?php if($getdelete['reason']==2){
											$enablestyle2='display:block';
									  }
									  else
									  {
										  $enablestyle2='display:none';
									  }
									  ?>
									  
									  
									   <div id="otherdiv" style="<?php echo $enablestyle2; ?>">
									<div class="form-group">
                                		<label>
                                    		Marriage Date
                                   	 	</label>
                                    	<input type="date" id="fixed_date1" name="fixed_date1" class="form-control" data-validetta="required" value="<?php echo $getdelete['fixed_date1'] ?>" >
                                           
									
                                	</div>
									<div class="form-group">
                                		<label>
                                    		Matrimonial Site Name
                                   	 	</label>
                                    	<input type="text" id="site_name" name="site_name" class="form-control" data-validetta="required" value="<?php echo $getdelete['site_name'] ?>" >
                                           
									
                                	</div>
									<div class="form-group">
									<input type="submit" name="delete2" id="delete2" value="submit" class="btn btn-danger btn-flat btn-lg"><a id="account" class="collapse">Submit</a>
                               <a href="#viewmember.php" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">Cancel</a>
                               
                                	</div>
									
							
									</div>
									   
									</div>
                                    	<input type="radio" name="reason" id="reason" onclick="getcontent(3)" value="3" <?php echo $reason3; ?>> Through Other Sources<br>
									
									</div>
									
									<div class="form-group">
									<h4><b>Other Reasons</b></h4><br>
                                		<input type="radio" name="reason" id="reason" value="4" <?php echo $reason4; ?>>Many calls from telecalling executives<br>
                                         <input type="radio" name="reason" id="reason" value="5" <?php echo $reason5; ?>> Prefer to search later<br>
                                      <input type="radio" name="reason" id="reason" value="6" <?php echo $reason6; ?>> Not getting enough matches<br>
									  <input type="radio" name="reason" id="reason" value="7" <?php echo $reason7; ?>>Any other reason
                                    		</div>
											<input type="submit" name="delete3" id="delete3" value="submit" class="btn btn-danger btn-flat btn-lg"><a id="account" class="collapse">Submit</a>
									
						</div>
						</div>
						</div>
						</div>
				<div id="help"  class="collapse" style="margin-left:30px">
								<br>
								
				           <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3>
                                   		<b>Help and Support</b>
                                	
                                </div>
                            </div>
							<br>
                            <div class="row">
							<div class="col-md-12 col-xs-12">
							<div style="overflow-x:auto;">

						<table  id="member" class="display" style="width:100%">
						
						  
							  <tr>
								<th>Date</th>
								<th onclick="sortTable(0)">Topic</th>
								<th onclick="sortTable(1)">Message</th>
								<th onclick="sortTable(0)">Reply</th>
														
							  </tr>
							 
							  <tbody>
							  <tr>
							  <td>10/05/2019</td>
							  <td>Service</td>
								<td>Not satisfied</td>
								<td><textarea class="form-control" name="about_myself" id="about_myself" placeholder="replied"></textarea>
								<a href="#example#gmail.com" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()" disabled>Submit</a>					
								</td>								                                							 
								</tr>
								 <tr>
							  <td>10/05/2019</td>
							  <td>Service</td>
								<td>Not satisfied</td>
								<td><textarea class="form-control" name="about_myself" id="about_myself"></textarea>
								<a href="#example#gmail.com" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">Submit</a>					
								</td>								                                							 
								</tr>
								<tr>
							  <td>10/05/2019</td>
							  <td>Service</td>
								<td>Not satisfied</td>
								<td><textarea class="form-control" name="about_myself" id="about_myself"></textarea>
								<a href="#example#gmail.com" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">Submit</a>					
								</td>								                                							 
								</tr>
								 <tr>
							  <td>10/05/2019</td>
							  <td>Service</td>
								<td>Not satisfied</td>
								<td><textarea class="form-control" name="about_myself" id="about_myself"></textarea>
								<a href="#example#gmail.com" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()">Submit</a>					
								</td>								                                							 
								</tr>
								</tbody>
								</table>																		  							  
								</div>
					
									   
									</div>
                                    	
									</div>
									
						</div>
			
						<div id="Plan">
								<br>
								
				           <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3>
                                   		<b>Plan Details</b>
                                	</h3>
                                </div>
                            </div>
							<br>
                            <div class="row">
                    			<div class="col-md-12 col-xs-12">
						<div style="overflow-x:auto;">
						<table  id="member" class="display" style="width:100%">
						
							  <tr>
								<th>Plan Name</th>
								<th onclick="sortTable(0)">Duration</th>
								<th onclick="sortTable(1)">Expiry Date</th>
								<th onclick="sortTable(0)">Balance Days</th>
								<th>Balance Contact Details To View</th>
								<th>Profile Highlighter - Duration</th>								
								<th>Total Contact Details</th>
								<th>Other Benifits</th>
														
							  </tr>
							 
							  <tbody>
							  <?php    $getplan=mysqli_query($conn,"select * from tbl_membership_user where user_id='".$_GET['id']."' and status=0");
							  while($fetchplan=mysqli_fetch_array($getplan)) {
							      $plan_name=mysqli_fetch_array(mysqli_query($conn,"select plan_name from tbl_plan where id='".$fetchplan['plan_id']."'"));
							$planfeature=mysqli_fetch_array(mysqli_query($conn,"select * from tbl_plan_feature where id='".$fetchplan['plan_id']."'"));
							?>
							  <tr>
							  <td><?php echo $plan_name['plan_name'] ?></td>
								<td><?php echo $planfeature['default_duration'] ?></td>
								<td><?php if($fetchplan['plan_id']!='')
										{
										$duration=$planfeature['default_duration'];
										$activedate=$fetchplan['activedate'];
										$next_due_date = date('Y-m-d', strtotime($activedate. ' +'.$duration.' days'));
										echo $next_due_date;
										} ?> </td>
								<td><?php
										if($fetchplan['plan_id']!='')
										{
										$nowdate=date("Y-m-d");

									$earlier = new DateTime($nowdate);
									$later = new DateTime($next_due_date);

									$diff = $later->diff($earlier)->format("%a");
									echo $diff;
										}
										?></td>
								<td></td>
								<td><?php 
										$highlighterduration=$planfeature['highlighter_days'];
										$activedate=$fetchplanid['activedate'];
										$highlighterday = date('Y-m-d', strtotime($activedate. ' +'.$highlighterduration.' days'));
										echo $highlighterday
										?></td>
								<td><?php echo $planfeature['default_allaccess'] ?></td>	
								 <td>
								</td>	
								</tr>
								 <?php } ?>
								
								
								</tbody>
								</table>
						
						
						  
							  
								</div>
						</div>
						</div>
						</div>
								<div id="mandapam" class="collapse">
								<br>
								
				           <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3>
                                   		<b>Mandapam</b>
                                	</h3>
                                </div>
                            </div>
							<br>
                            <div class="row">
                    			<div class="col-md-12 col-xs-12">
						<div style="overflow-x:auto;">
						<div class="container">

        <div class="num_rows">
		
				<div class="form-group"> 	<!--		Show Numbers Of Rows 		-->
			 		<label for="start">From date:</label>

                 <input style="padding: 5px;"type="date" id="start" name="trip-start">
				 <label for="end">To date:</label>

                 <input style="padding: 5px;" type="date" id="start" name="trip-start">
                 <a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"><i class="fa fa-download" aria-hidden="true"></i> &nbsp Submit</a>
                                
			  	</div>
				
        </div>	
	
        <div class="tb_search">
		<div class="num_rows">
		
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
<table class="table table-striped table-class" id= "table-id">
  
	

<tr>
		<th><input type="checkbox" id="select_all"> &nbsp Select</th>
		<th>Date of Registration</th>
		<th>Location</th>
		<th>Mandabam Name</th>
		<th>From & To Date</th>
		<th>Mobile Number</th>
		<th>Mail_ID</th>
		<th>User ID</th>
		
	</tr>
 
<tbody>	
	<tr>
		<td><input type="checkbox" id="select_all"> </td>
		<td>10-12-2019</td>
		<td>Salem</td>
		<td>Name</td>
		<td>10-02-2019 to 12-02-2019</td>
		<td>+91 32158 72547</td>
		<td>example@gmail.com</td>
		<td>NM_123</td>
	</tr>
	<tr>
		<td><input type="checkbox" id="select_all"> </td>
		<td>10-12-2019</td>
		<td>Salem</td>
		<td>Name</td>
		<td>10-02-2019 to 12-02-2019</td>
		<td>+91 32158 72547</td>
		<td>example@gmail.com</td>
		<td>NM_123</td>
	</tr>
	
	<tr>
		<td><input type="checkbox" id="select_all"> </td>
		<td>10-12-2019</td>
		<td>Salem</td>
		<td>Name</td>
		<td>10-02-2019 to 12-02-2019</td>
		<td>+91 32158 72547</td>
		<td>example@gmail.com</td>
		<td>NM_123</td>
	</tr>
	
								 
	
    <tbody>
</table>

<!--		Start Pagination -->
			<div class='pagination-container'>
				<nav>
				  <ul class="pagination">
				   <!--	Here the JS Function Will Add the Rows -->
				  </ul>
				</nav>
			</div>
      <div class="rows_count">Showing 11 to 20 of 91 entries</div>

</div> <!-- 		End of Container -->



<!--  Developed By Yasser Mas -->
						</div>
						</div>
								
                                </div>
								
								<div id="bazar" class="collapse">
								<br>
								
				           <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3>
                                   		<b>Bazaar</b>
                                	</h3>
                                </div>
                            </div>
							<br>
                            <div class="row">
                    			<div class="col-md-12 col-xs-12">
						<div style="overflow-x:auto;">
						<div class="container">

        <div class="num_rows">
		
				<div class="form-group"> 	<!--		Show Numbers Of Rows 		-->
			 		<label for="start">From date:</label>

                 <input style="padding: 5px;"type="date" id="start" name="trip-start">
				 <label for="end">To date:</label>

                 <input style="padding: 5px;" type="date" id="start" name="trip-start">
                 <a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"><i class="fa fa-download" aria-hidden="true"></i> &nbsp Submit</a>
                                
			  	</div>
				
        </div>	
	
        <div class="tb_search">
		<div class="num_rows">
		
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
<table class="table table-striped table-class" id= "table-id">
  
	

<tr>
		<th><input type="checkbox" id="select_all"> &nbsp Select</th>
		<th>Date of Registration</th>
				<th>User ID</th>
		<th>Category</th>
		<th>Name</th>
		<th>Mobile Number</th>
		<th>From & To Date</th>		
		<th>Place</th>

		
	</tr>
 
<tbody>	
	<tr>
		<td><input type="checkbox" id="select_all"> </td>
		<td>10-12-2019</td>
		<td>NM_123</td>
		<td>Catering</td>
		<td>Name</td>
		<td>+91 32158 72547</td>
		<td>10-02-2019 to 12-02-2019</td>			
		<td>Salem</td>
	</tr>
	<tr>
		<td><input type="checkbox" id="select_all"> </td>
		<td>10-12-2019</td>
		<td>NM_123</td>
		<td>Catering</td>
		<td>Name</td>
		<td>+91 32158 72547</td>
		<td>10-02-2019 to 12-02-2019</td>			
		<td>Salem</td>
	</tr>
<tr>
		<td><input type="checkbox" id="select_all"> </td>
		<td>10-12-2019</td>
		<td>NM_123</td>
		<td>Catering</td>
		<td>Name</td>
		<td>+91 32158 72547</td>
		<td>10-02-2019 to 12-02-2019</td>			
		<td>Salem</td>
	</tr>
		
	
	
    <tbody>
</table>

<!--		Start Pagination -->
			<div class='pagination-container'>
				<nav>
				  <ul class="pagination">
				   <!--	Here the JS Function Will Add the Rows -->
				  </ul>
				</nav>
			</div>
      <div class="rows_count">Showing 11 to 20 of 91 entries</div>

</div> <!-- 		End of Container -->



<!--  Developed By Yasser Mas -->
						</div>
						</div>
								
                                </div>
								<div id="photography" class="collapse">
								<br>
								
				           <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3>
                                   		<b>Photography</b>
                                	</h3>
                                </div>
                            </div>
							<br>
                            <div class="row">
                    			<div class="col-md-12 col-xs-12">
						<div style="overflow-x:auto;">
						<div class="container">

        <div class="num_rows">
		
				<div class="form-group"> 	<!--		Show Numbers Of Rows 		-->
			 		<label for="start">From date:</label>

                 <input style="padding: 5px;"type="date" id="start" name="trip-start">
				 <label for="end">To date:</label>

                 <input style="padding: 5px;" type="date" id="start" name="trip-start">
                 <a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"><i class="fa fa-download" aria-hidden="true"></i> &nbsp Submit</a>
                                
			  	</div>
				
        </div>	
	
        <div class="tb_search">
		<div class="num_rows">
		
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
<table class="table table-striped table-class" id= "table-id">
  
	

<tr>
		<th><input type="checkbox" id="select_all"> &nbsp Select</th>
		<th>Date of Registration</th>
		<th>User ID</th>		
		<th>User Name</th>	
		<th>Mobile Number</th>
		<th>PLace</th>
		
		
	</tr>
 
<tbody>	
	<tr>
		<td><input type="checkbox" id="select_all"> </td>
		<td>10-12-2019</td>
		<td>NM_123</td>
		<td>Name</td>		
		<td>+91 32158 72547</td>
		<td>Salem</td>
	</tr>
		<tr>
		<td><input type="checkbox" id="select_all"> </td>
		<td>10-12-2019</td>
		<td>NM_123</td>
		<td>Name</td>		
		<td>+91 32158 72547</td>
		<td>Salem</td>
	</tr>
	<tr>
		<td><input type="checkbox" id="select_all"> </td>
		<td>10-12-2019</td>
		<td>NM_123</td>
		<td>Name</td>		
		<td>+91 32158 72547</td>
		<td>Salem</td>
	</tr>	
	
    <tbody>
</table>

<!--		Start Pagination -->
			<div class='pagination-container'>
				<nav>
				  <ul class="pagination">
				   <!--	Here the JS Function Will Add the Rows -->
				  </ul>
				</nav>
			</div>
      <div class="rows_count">Showing 11 to 20 of 91 entries</div>

</div> <!-- 		End of Container -->



<!--  Developed By Yasser Mas -->
						</div>
						</div>
								
                                </div>
								<!--<div id="admin">
								<br>
								
				           <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3>
                                   		<b>Admin Chart</b>
                                	</h3>
                                </div>
                            </div>
							<br>
                            <div class="row">
                    			<div class="col-md-12 col-xs-12">
						<div style="overflow-x:auto;">
						<table  id="member" class="display" style="width:100%">
						
							  <tr>
								<th rowspan="2">Date</th>
								<th rowspan="2">Subject</th>
								<th colspan="2">Message Details </th></tr>
								<tr>
								<th>User_ID</th>
								<th>Admin</th>
								
								</tr>						
							  
							 
							  <tbody>
							  <tr>
							  <td>02-05-2019</td>
							  <td>help</td>
								<td>queries</td>								
								<td>Answer</td>								
								</tr>
								</tbody>
								</table>																		  							  
								</div>
						</div>
						</div>
						</div>-->
						<!--<div id="live">
								<br>
								
				           <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3>
                                   		<b>Live Chart</b>
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
								<th>To User_ID No</th>
								<th>Message </th>	
								<th>Reply </th>									
							  </tr>
							 
							  <tbody>
							  <tr>
							  <td>02-05-2019</td>
							  <td>NM_123</td>
								<td>message</td>								
								<td>reply</td>								
								</tr>
								 
								
								
								</tbody>
								</table>
						
						
						  
							  
								</div>
						</div>
						</div>
						</div>-->
						<div id="all_notification" class="collapse">
								<br>
								
				           <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3>
                                   		<b>All</b>
                                	</h3>
                                </div>
                            </div>
							<br>
                            <div class="row">
                    			<div class="col-md-12 col-xs-12">
						<div style="overflow-x:auto;">
						<div class="container">

        <div class="num_rows">
		
				<div class="form-group"> 	<!--		Show Numbers Of Rows 		-->
			 		<label for="start">From date:</label>

                 <input style="padding: 5px;"type="date" id="start" name="trip-start">
				 <label for="end">To date:</label>

                 <input style="padding: 5px;" type="date" id="start" name="trip-start">
                 <a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"><i class="fa fa-download" aria-hidden="true"></i> &nbsp Submit</a>
                                
			  	</div>
				
        </div>	
	
        <div class="tb_search">
		<div class="num_rows">
		
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
<table class="table table-striped table-class" id= "table-id">
  
	

<tr>
		<th><input type="checkbox" id="select_all"> &nbsp Select</th>
		<th>Date </th>
		<th>Type</th>
		<th>To User_ID</th>
		<th>Gender</th>
		<th>Status</th>
		<th>To User Details</th>		

	</tr>
 
<tbody>	
	<tr>
		<td><input type="checkbox" id="select_all"> </td>
		<td>10-12-2019</td>
		<td>Accept / Decline</td>
		<td>id</td>
		<td>Male</td>
		<td><a href="#" class="btn btn-custom btn-block waves-effect waves-light"   style="width:130px;height:36px" onclick="active()"> Accept</a>
			<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> Decline</a>
			<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> Pending</a>
			<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> Date & Time</a>
														</td>
		<td>
			<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> View Profile</a>
			<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> Delete</a>
			<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> Inactive</a>
									</td>			
		
	</tr>
	
	
	
    <tbody>
</table>

<!--		Start Pagination -->
			<div class='pagination-container'>
				<nav>
				  <ul class="pagination">
				   <!--	Here the JS Function Will Add the Rows -->
				  </ul>
				</nav>
			</div>
      <div class="rows_count">Showing 11 to 20 of 91 entries</div>

</div> <!-- 		End of Container -->



<!--  Developed By Yasser Mas -->
						</div>
						</div>								
                                </div>
								<div id="accept" class="collapse">
								<br>
								
				           <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3>
                                   		<b>Accepted</b>
                                	</h3>
                                </div>
                            </div>
							<br>
                            <div class="row">
                    			<div class="col-md-12 col-xs-12">
						<div style="overflow-x:auto;">
						<div class="container">

        <div class="num_rows">
		
				<div class="form-group"> 	<!--		Show Numbers Of Rows 		-->
			 		<label for="start">From date:</label>

                 <input style="padding: 5px;"type="date" id="start" name="trip-start">
				 <label for="end">To date:</label>

                 <input style="padding: 5px;" type="date" id="start" name="trip-start">
                 <a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"><i class="fa fa-download" aria-hidden="true"></i> &nbsp Submit</a>
                                
			  	</div>
				
        </div>	
	
        <div class="tb_search">
		<div class="num_rows">
		
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
<table class="table table-striped table-class" id= "table-id">
  
	

<tr>
		<th><input type="checkbox" id="select_all"> &nbsp Select</th>
		<th>Date </th>
		<th>Type</th>
		<th>To User_ID</th>
		<th>Gender</th>		
		<th>To User Details</th>		

	</tr>
 
<tbody>	
	<tr>
		<td><input type="checkbox" id="select_all"> </td>
		<td>10-12-2019</td>
		<td>Accept</td>
		<td>id</td>
		<td>Male</td>
		<td>
			<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> View Profile</a>
			<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> Delete</a>
			<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> Inactive</a>
									</td>			
		
	</tr>
	
	
	
    <tbody>
</table>

<!--		Start Pagination -->
			<div class='pagination-container'>
				<nav>
				  <ul class="pagination">
				   <!--	Here the JS Function Will Add the Rows -->
				  </ul>
				</nav>
			</div>
      <div class="rows_count">Showing 11 to 20 of 91 entries</div>

</div> <!-- 		End of Container -->



<!--  Developed By Yasser Mas -->
						</div>
						</div>
								
                                </div>
							<div id="decline" class="collapse">
								<br>
								
				           <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3>
                                   		<b>Declined</b>
                                	</h3>
                                </div>
                            </div>
							<br>
                            <div class="row">
                    			<div class="col-md-12 col-xs-12">
						<div style="overflow-x:auto;">
						<div class="container">

        <div class="num_rows">
		
				<div class="form-group"> 	<!--		Show Numbers Of Rows 		-->
			 		<label for="start">From date:</label>

                 <input style="padding: 5px;"type="date" id="start" name="trip-start">
				 <label for="end">To date:</label>

                 <input style="padding: 5px;" type="date" id="start" name="trip-start">
                 <a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"><i class="fa fa-download" aria-hidden="true"></i> &nbsp Submit</a>
                                
			  	</div>
				
        </div>	
	
        <div class="tb_search">
		<div class="num_rows">
		
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
<table class="table table-striped table-class" id= "table-id">
  
	

<tr>
		<th><input type="checkbox" id="select_all"> &nbsp Select</th>
		<th>Date </th>
		<th>Type</th>
		<th>To User_ID</th>
		<th>Gender</th>
	
		<th>To User Details</th>		

	</tr>
 
<tbody>	
	<tr>
		<td><input type="checkbox" id="select_all"> </td>
		<td>10-12-2019</td>
		<td>Decline</td>
		<td>id</td>
		<td>Male</td>
		<td>
			<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> View Profile</a>
			<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> Delete</a>
			<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> Inactive</a>
									</td>			
		
	</tr>
	
	
	
    <tbody>
</table>

<!--		Start Pagination -->
			<div class='pagination-container'>
				<nav>
				  <ul class="pagination">
				   <!--	Here the JS Function Will Add the Rows -->
				  </ul>
				</nav>
			</div>
      <div class="rows_count">Showing 11 to 20 of 91 entries</div>

</div> <!-- 		End of Container -->



<!--  Developed By Yasser Mas -->
						</div>
						</div>
								
                                </div>
							<div id="interest" class="collapse">
								<br>
								
				           <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3>
                                   		<b>Interest Sent</b>
                                	</h3>
                                </div>
                            </div>
							<br>
                            <div class="row">
                    			<div class="col-md-12 col-xs-12">
						<div style="overflow-x:auto;">
						<div class="container">

        <div class="num_rows">
		
				<div class="form-group"> 	<!--		Show Numbers Of Rows 		-->
			 		<label for="start">From date:</label>

                 <input style="padding: 5px;"type="date" id="start" name="trip-start">
				 <label for="end">To date:</label>

                 <input style="padding: 5px;" type="date" id="start" name="trip-start">
                 <a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"><i class="fa fa-download" aria-hidden="true"></i> &nbsp Submit</a>
                                
			  	</div>
				
        </div>	
	
        <div class="tb_search">
		<div class="num_rows">
		
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
<table class="table table-striped table-class" id= "table-id">
  
	

<tr>
		<th><input type="checkbox" id="select_all"> &nbsp Select</th>
		<th>Date </th>
		<th>Type</th>
		<th>To User_ID</th>
		<th>Gender</th>	
		<th>To User Details</th>		

	</tr>
 
<tbody>	
	<tr>
		<td><input type="checkbox" id="select_all"> </td>
		<td>10-12-2019</td>
		<td>Interest Sent</td>
		<td>id</td>
		<td>Male</td>		
		<td>
			<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> View Profile</a>
			<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> Delete</a>
			<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> Inactive</a>
									</td>			
		
	</tr>
	
	
	
    <tbody>
</table>

<!--		Start Pagination -->
			<div class='pagination-container'>
				<nav>
				  <ul class="pagination">
				   <!--	Here the JS Function Will Add the Rows -->
				  </ul>
				</nav>
			</div>
      <div class="rows_count">Showing 11 to 20 of 91 entries</div>

</div> <!-- 		End of Container -->



<!--  Developed By Yasser Mas -->
						</div>
						</div>
								
                                </div>
							<div id="select_other" class="collapse">
								<br>
								
				           <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3>
                                   		<b>Shortlist by Others
										</b>
                                	</h3>
                                </div>
                            </div>
							<br>
                            <div class="row">
                    			<div class="col-md-12 col-xs-12">
						<div style="overflow-x:auto;">
						<div class="container">

        <div class="num_rows">
		
				<div class="form-group"> 	<!--		Show Numbers Of Rows 		-->
			 		<label for="start">From date:</label>

                 <input style="padding: 5px;"type="date" id="start" name="trip-start">
				 <label for="end">To date:</label>

                 <input style="padding: 5px;" type="date" id="start" name="trip-start">
                 <a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"><i class="fa fa-download" aria-hidden="true"></i> &nbsp Submit</a>
                                
			  	</div>
				
        </div>	
	
        <div class="tb_search">
		<div class="num_rows">
		
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
<table class="table table-striped table-class" id= "table-id">
  
	

<tr>
		<th><input type="checkbox" id="select_all"> &nbsp Select</th>
		<th>Date </th>
		<th>Shortlisted by other ID</th>		
		<th>Gender</th>		
		<th>To User Details</th>		

	</tr>
 
<tbody>	
	<tr>
		<td><input type="checkbox" id="select_all"> </td>
		<td>10-12-2019</td>
		<td>id</td>
		<td>Male</td>
			<td>
			<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> View Profile</a>
			<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> Delete</a>
			<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> Inactive</a>
									</td>			
		
	</tr>
	
	
	
    <tbody>
</table>

<!--		Start Pagination -->
			<div class='pagination-container'>
				<nav>
				  <ul class="pagination">
				   <!--	Here the JS Function Will Add the Rows -->
				  </ul>
				</nav>
			</div>
      <div class="rows_count">Showing 11 to 20 of 91 entries</div>

</div> <!-- 		End of Container -->



<!--  Developed By Yasser Mas -->
						</div>
						</div>
								
                                </div>
							<div id="select_me" class="collapse">
								<br>
								
				           <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3>
                                   		<b>Shortlisted by Me</b>
                                	</h3>
                                </div>
                            </div>
							<br>
                            <div class="row">
                    			<div class="col-md-12 col-xs-12">
						<div style="overflow-x:auto;">
						<div class="container">

        <div class="num_rows">
		
				<div class="form-group"> 	<!--		Show Numbers Of Rows 		-->
			 		<label for="start">From date:</label>

                 <input style="padding: 5px;"type="date" id="start" name="trip-start">
				 <label for="end">To date:</label>

                 <input style="padding: 5px;" type="date" id="start" name="trip-start">
                 <a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"><i class="fa fa-download" aria-hidden="true"></i> &nbsp Submit</a>
                                
			  	</div>
				
        </div>	
	
        <div class="tb_search">
		<div class="num_rows">
		
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
<table class="table table-striped table-class" id= "table-id">
  
	

<tr>
		<th><input type="checkbox" id="select_all"> &nbsp Select</th>
		<th>Date </th>
		<th>Shortlisted by me ID</th>		
		<th>Gender</th>		
		<th>To User Details</th>		

	</tr>
 
<tbody>	
	<tr>
		<td><input type="checkbox" id="select_all"> </td>
		<td>10-12-2019</td>
		<td>Accept / Decline</td>		
		<td>Male</td>
		
		<td>
			<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> View Profile</a>
			<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> Delete</a>
			<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> Inactive</a>
									</td>			
		
	</tr>
	
	
	
    <tbody>
</table>

<!--		Start Pagination -->
			<div class='pagination-container'>
				<nav>
				  <ul class="pagination">
				   <!--	Here the JS Function Will Add the Rows -->
				  </ul>
				</nav>
			</div>
      <div class="rows_count">Showing 11 to 20 of 91 entries</div>

</div> <!-- 		End of Container -->



<!--  Developed By Yasser Mas -->
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
<script>

		  	var totalRows = $(table+' tbody tr').length;		// numbers of rows 
			 $(table+' tr:gt(0)').each(function(){			// each TR in  table and not the header
			 	trnum++;									// Start Counter 
			 	if (trnum > maxRows ){						// if tr number gt maxRows
			 		
			 		$(this).hide();							// fade it out 
			 	}if (trnum <= maxRows ){$(this).show();}// else fade in Important in case if it ..
			 });											//  was fade out to fade it in 
			 if (totalRows > maxRows){						// if tr total rows gt max rows option
			 	var pagenum = Math.ceil(totalRows/maxRows);	// ceil total(rows/maxrows) to get ..  
			 												//	numbers of pages 
			 	for (var i = 1; i <= pagenum ;){			// for each page append pagination li 
			 	$('.pagination').append('<li data-page="'+i+'">\
								      <span>'+ i++ +'<span class="sr-only">(current)</span></span>\
								    </li>').show();
			 	}											// end for i 
     
         
			} 												// end if row count > max rows
			$('.pagination li:first-child').addClass('active'); // add active class to the first li 
        
        
        //SHOWING ROWS NUMBER OUT OF TOTAL DEFAULT
       showig_rows_count(maxRows, 1, totalRows);
        //SHOWING ROWS NUMBER OUT OF TOTAL DEFAULT

        $('.pagination li').on('click',function(e){		// on click each page
        e.preventDefault();
				var pageNum = $(this).attr('data-page');	// get it's number
				var trIndex = 0 ;							// reset tr counter
				$('.pagination li').removeClass('active');	// remove active class from all li 
				$(this).addClass('active');					// add active class to the clicked 
        
        
        //SHOWING ROWS NUMBER OUT OF TOTAL
       showig_rows_count(maxRows, pageNum, totalRows);
        //SHOWING ROWS NUMBER OUT OF TOTAL
        
        
        
				 $(table+' tr:gt(0)').each(function(){		// each tr in table not the header
				 	trIndex++;								// tr index counter 
				 	// if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
				 	if (trIndex > (maxRows*pageNum) || trIndex <= ((maxRows*pageNum)-maxRows)){
				 		$(this).hide();		
				 	}else {$(this).show();} 				//else fade in 
				 }); 										// end of for each tr in table
					});										// end of on click pagination list
		});
											// end of on select change 
		 
								// END OF PAGINATION 
    
	}	


			

// SI SETTING
$(function(){
	// Just to append id number for each row  
default_index();
					
});

//ROWS SHOWING FUNCTION
function showig_rows_count(maxRows, pageNum, totalRows) {
   //Default rows showing
        var end_index = maxRows*pageNum;
        var start_index = ((maxRows*pageNum)- maxRows) + parseFloat(1);
        var string = 'Showing '+ start_index + ' to ' + end_index +' of ' + totalRows + ' entries';               
        $('.rows_count').html(string);
}

// CREATING INDEX
function default_index() {
  $('table tr:eq(0)').prepend('<th> ID </th>')

					var id = 0;

					$('table tr:gt(0)').each(function(){	
						id++
						$(this).prepend('<td>'+id+'</td>');
					});
}

// All Table search script
function FilterkeyWord_all_table() {
  
// Count td if you want to search on all table instead of specific column

  var count = $('.table').children('tbody').children('tr:first-child').children('td').length; 

        // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("search_input_all");
  var input_value =     document.getElementById("search_input_all").value;
        filter = input.value.toLowerCase();
  if(input_value !=''){
        table = document.getElementById("table-id");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 1; i < tr.length; i++) {
          
          var flag = 0;
           
          for(j = 0; j < count; j++){
            td = tr[i].getElementsByTagName("td")[j];
            if (td) {
             
                var td_text = td.innerHTML;  
                if (td.innerHTML.toLowerCase().indexOf(filter) > -1) {
                //var td_text = td.innerHTML;  
                //td.innerHTML = 'shaban';
                  flag = 1;
                } else {
                  //DO NOTHING
                }
              }
            }
          if(flag==1){
                     tr[i].style.display = "";
          }else {
             tr[i].style.display = "none";
          }
        }
    }else {
      //RESET TABLE
      $('#maxRows').trigger('change');
    }
}
</script>

					
</body>

</html>
