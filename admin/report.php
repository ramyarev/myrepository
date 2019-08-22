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
            <?php include('header.php') ?>
            <!-- /.navbar-header -->
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
                <div class="row">
				 <div class="col-lg-2 col-md-3  col-sm-4 col-xs-12 inbox-panel">
				 <table  class='approvest' >
				 <tr>
				 <td style="border:none">
				   <a class="btn btn-custom btn-block waves-effect waves-light"> <input type="checkbox" data-toggle="collapse" data-target="#indujual"> &nbsp Individual</a>
				   </td>
				   <td style="border:none">
				   <a class="btn btn-custom btn-block waves-effect waves-light"><input type="checkbox" data-toggle="collapse" data-target="#all_1"> &nbsp All </a></div>
				   </td>
				   </tr>
				   </table>
				   
				   <br>
				</div>
				<br><br>
				
                   <div class="col-sm-12">				                                                      
				
				<div class="container">

              <div class="row">
			  <div class="col-ms-10">
				<div class="form-group"> 	<!--		Show Numbers Of Rows 		-->
			 		<label for="start">From date:</label>

                 <input style="padding: 5px;"type="date" id="start" name="trip-start">
				 <label for="end">To date:</label>

                 <input style="padding: 5px;" type="date" id="start" name="trip-start">
                 <a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> Submit</a>
				 </div>
				 </div>
				 <div class="col-md-2">
                     <h4><i class="fa fa-download" aria-hidden="true"></i> &nbsp  <i class="fa fa-arrow-right" aria-hidden="true"></i> &nbsp <a href="#"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a>&nbsp / &nbsp <a href="#"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></h4>           
			  	</div>
				</div>
				</div>
				

   <hr>
	  <div class="collapse" id="indujual">							
                        
						<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'all')">All</button>
  <button class="tablinks" onclick="openCity(event, 'matches')">Matches</button>
  <button class="tablinks" onclick="openCity(event, 'discovered')">Discovered</button>
  <button class="tablinks" onclick="openCity(event, 'you')">Viewed by You</button>
  <button class="tablinks" onclick="openCity(event, 'other')">Viewed by Other</button>
  <button class="tablinks" onclick="openCity(event, 'offer')">Offer</button>
  <button class="tablinks" onclick="openCity(event, 'referal')">Referal Successfully</button>
</div>
</div>

<div id="all" class="tabcontent">
  <div class="white-box">
  <div style="overflow-x:auto;">
  <h3 style="terx-align:center">Bala (NM_123)</h3>
                           <table  id="member" class="display" style="width:100%">
						   <thead>
							  <tr>
								<th rowspan="2"><input type="checkbox" id="select_all"></th>
								<th rowspan="2">Date</th>
								<th colspan="3">Matches(50)</th>
								<th colspan="4">Discovered(50)</th>
								<th rowspan="2">Viewed by You(50)</th>
								<th rowspan="2">Viewed by Other(50)</th>
								<th rowspan="2">Offer (5)</th>
								<th rowspan="2">Referal(20)</th>							
							  </tr>
							  <tr>
							  <th>Today (20)</th>
							  <th>Premium(20)</th>
							  <th>Recommended(20)</th>
							  <th>Location(20)</th>
							  <th>Education(20)</th>
							  <th>Prefession(20)</th>
							  <th>Star(20)</th>
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
								<td>
								12-02-2019
								</td>
								<td>NM_123</td>
								<td>NM_123</td>
								<td>NM_123</td>
								<td>NM_123</td>
								<td>NM_123</td>
								<td>NM_123</td>
								<td>NM_123</td>
								<td>NM_123</td>
								<td>NM_123</td>
								<td><a href="#">Click</a></td>																
								<td>23</td>
						
							  </tr>
							 
							 <?php } ?>
							  </tbody>
							</table>
							</div>
							</div>
</div>

<div id="matches" class="tabcontent">
<div class="white-box">
  <div style="overflow-x:auto;">
  <h3 style="terx-align:center">Bala (NM_123)</h3>
                           <table  id="member" class="display" style="width:100%">
						   <thead>
							  <tr>		
								<th rowspan="2"><input type="checkbox" id="select_all"></th>
								<th rowspan="2">Date</th>
								<th colspan="3">Matches(50)</th>
							  </tr>
							  <tr>
							  <th>Today (20)</th>
							  <th>Premium(20)</th>
							  <th>Recommended(20)</th>
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
								<td>
								12-02-2019
								</td>
								<td>NM_123</td>
								<td>NM_123</td>
								<td>NM_123</td>
							  </tr>
							 
							 <?php } ?>
							  </tbody>
							</table>
							</div>

</div>
</div>
<div id="discovered" class="tabcontent">
  <div class="white-box">
  <div style="overflow-x:auto;">
  <h3 style="terx-align:center">Bala (NM_123)</h3>
                           <table  id="member" class="display" style="width:100%">
						   <thead>
							  <tr>
								<th rowspan="2"><input type="checkbox" id="select_all"></th>
								<th rowspan="2">Date</th>							
								<th colspan="4">Discovered(50)</th>
							  </tr>
							  <tr>
							   <th>Location(20)</th>
							  <th>Education(20)</th>
							  <th>Prefession(20)</th>
							  <th>Star(20)</th>
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
								<td>
								12-02-2019
								</td>
								<td>NM_123</td>
								<td>NM_123</td>
								<td>NM_123</td>
								<td>NM_123</td>
							  </tr>
							 
							 <?php } ?>
							  </tbody>
							</table>
							</div>

</div></div>
<div id="you" class="tabcontent">
  <div class="white-box">
  <div style="overflow-x:auto;">
  <h3 style="terx-align:center">Bala (NM_123)</h3>
                           <table  id="member" class="display" style="width:100%">
						   <thead>
							  <tr>
								<th rowspan="2"><input type="checkbox" id="select_all"></th>
                                <th>Date</th>								
								<th rowspan="2">Viewed by You(50)</th>
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
								<td>
								12-02-2019
								</td>
								<td>NM_123</td>
								
							  </tr>
							 
							 
							 <?php } ?>
							  </tbody>
							</table>
							</div>

</div></div>
<div id="other" class="tabcontent">
<div class="white-box">
  <div style="overflow-x:auto;">
  <h3 style="terx-align:center">Bala (NM_123)</h3>
                           <table  id="member" class="display" style="width:100%">
						   <thead>
							  <tr>
								<th rowspan="2"><input type="checkbox" id="select_all"></th>
                                <th>Date</th>								
								<th rowspan="2">Viewed by Other(50)</th>
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
								<td>
								12-02-2019
								</td>
								<td>NM_123</td>
								
							  </tr>
							 
							 
							 <?php } ?>
							  </tbody>
							</table>
							</div>

</div></div>
<div id="offer" class="tabcontent">
 <div class="white-box">
  <div style="overflow-x:auto;">
  <h3 style="terx-align:center">Bala (NM_123)</h3>
                           <table  id="member" class="display" style="width:100%">
						   <thead>
							  <tr>
								<th rowspan="2"><input type="checkbox" id="select_all"></th>
                                <th>Date</th>								
								<th rowspan="2">Offer(5)</th>
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
								<td>
								12-02-2019
								</td>
								<td><a href="#">Click</a></td>
								
							  </tr>
							 
							 
							 <?php } ?>
							  </tbody>
							</table>
							</div>

</div></div>
<div id="referal" class="tabcontent">
<div class="white-box">
  <div style="overflow-x:auto;">
  <h3 style="terx-align:center">Bala (NM_123)</h3>
                           <table  id="member" class="display" style="width:100%">
						   <thead>
							  <tr>
								<th rowspan="2"><input type="checkbox" id="select_all"></th>
                                <th>Date</th>								
								<th rowspan="2">Referal (20)</th>
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
								<td>
								12-02-2019
								</td>
								<td>123</td>
								
							  </tr>
							 
							 
							 <?php } ?>
							  </tbody>
							</table>
							</div>

                      </div>
                    </div>
					<div class="collapse" id="all_1">	
					<div class="radio-inline" style="text-align:center">	
                         <label class="radio-inline">
                       <input type="radio" name="optradio" data-toggle="collapse" data-target="#tab_male">Male
                       </label>
                      <label class="radio-inline">
                       <input type="radio" name="optradio"data-toggle="collapse" data-target="#tab_female">Female
                         </label>
                    <label class="radio-inline">
                  <input type="radio" name="optradio"data-toggle="collapse" data-target="#all_tab">All
                     </label>														  
									</div>
									</div>
	<div class="collapse" id="tab_male">							
                        
						<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'active_male')">Active USer</button>
  <button class="tablinks" onclick="openCity(event, 'inactive_male')">Inactive User</button>
  <button class="tablinks" onclick="openCity(event, 'paid_male')">Paid User</button>
  <button class="tablinks" onclick="openCity(event, 'unpaid_male')">Un Paid USer</button>
  <button class="tablinks" onclick="openCity(event, 'premium_male')">Premium Members</button>
  <button class="tablinks" onclick="openCity(event, 'offer_male')">Offer</button>
  <button class="tablinks" onclick="openCity(event, 'referal_male')">Referal List</button>
  <button class="tablinks" onclick="openCity(event, 'deleted_male')">Deleted Profile</button>
</div>
</div>

<div id="active_male" class="tabcontent">
  <div class="white-box">
  <div style="overflow-x:auto;">

                           <table  id="member" class="display" style="width:100%">
						   <thead>
							  <tr>
								<th><input type="checkbox" id="select_all"></th>
								<th >Date of Registration</th>
								<th>Last Login</th>
								<th>USer_ID</th>
								<th>Gender</th>
								<th>Paid / Unpaid</th>
								
								<th>Amount</th>		
                                <th>Mobile Number</th>
								<th>Option</th>										
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
								<td>
								12-02-2019
								</td>
								<td>02-10-2019</td>
								<td>NM_123</td>
							  <td>Male</td>
							  <td>paid</td>
						
							  <td>2000</td>
							  <td>9632587410</td>
							  <td><input type="submit" class="btn btn-danger btn-flat btn-lg" name="addmember" id="addmember" value="View Profile"> </td>
							  </tr>
							 
							 <?php } ?>
							  </tbody>
							</table>
							</div>
							</div>
</div>

<div id="inactive_male" class="tabcontent">
<div class="white-box">
  <div style="overflow-x:auto;">

                                    <table  id="member" class="display" style="width:100%">
						   <thead>
							  <tr>
								<th><input type="checkbox" id="select_all"></th>
								<th >Date of Registration</th>
								<th>Last Login</th>
								<th>USer_ID</th>
								<th>Gender</th>
								<th>Paid / Unpaid</th>
								
								<th>Amount</th>		
                                <th>Mobile Number</th>
								<th>Option</th>										
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
								<td>
								12-02-2019
								</td>
								<td>02-10-2019</td>
								<td>NM_123</td>
							  <td>Male</td>
							  <td>paid</td>
						
							  <td>2000</td>
							  <td>9632587410</td>
							  <td><input type="submit" class="btn btn-danger btn-flat btn-lg" name="addmember" id="addmember" value="View Profile"> </td>
							  </tr>
							 
							 <?php } ?>
							  </tbody>
							</table>
							</div>

</div>
</div>
  <div id="paid_male" class="tabcontent">
  <div class="white-box">
  <div style="overflow-x:auto;">

                           <table  id="member" class="display" style="width:100%">
						   <thead>
							  <tr>
								<th>
								<input type="checkbox" id="select_all"></th>
								<th >Date of Registration</th>
							
								<th>USer_ID</th>
								<th>Gender</th>
								<th>Plan Name</th>
								<th>Expire Date</th>
							<th>Login history Date</th>		
								<th>Option</th>
                          						
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
								<td>
								12-02-2019
								</td>
						
								<td>NM_123</td>
							  <td>Male</td>
							  <td>Silver</td>
							  <td>02-10-2020</td>
				           <td>02-10-2020</td>
							  <td><input type="submit" class="btn btn-danger btn-flat btn-lg" name="addmember" id="addmember" value="View Profile"> </td>
							  </tr>
							 
							 <?php } ?>
							  </tbody>
							</table>
							</div>

</div></div>
<div id="unpaid_male" class="tabcontent">
  <div class="white-box">
  <div style="overflow-x:auto;">

                           <table  id="member" class="display" style="width:100%">
						   <thead>
							  <tr>
								<th><input type="checkbox" id="select_all"></th>
								<th >Date of Registration</th>
							<th>Last Login</th>
								<th>USer_ID</th>
								<th>Gender</th>
							
                                <th>Mobile Number</th>
								<th>Option</th>										
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
								<td>
								12-02-2019
								</td>
						<td>12-02-2019
								</td>
								<td>NM_123</td>
							  <td>Male</td>
							
							  <td>9632587410</td>
							  <td><input type="submit" class="btn btn-danger btn-flat btn-lg" name="addmember" id="addmember" value="View Profile"> </td>
							  </tr>
							 
							 <?php } ?>
							  </tbody>
							</table>
							</div>
							</div>
							</div>
<div id="premium_male" class="tabcontent">
<div class="white-box">
  <div style="overflow-x:auto;">

                           <table  id="member" class="display" style="width:100%">
						   <thead>
							  <tr>
								<th><input type="checkbox" id="select_all"></th>
								<th >Date of Registration</th>
								<th>Premium Active Date</th>
								<th>USer_ID</th>
								<th>Gender</th>
								<th>Name</th>
								<th>Expire Date</th>
								<th>Amount</th>		
                                <th>Mobile Number</th>
								<th>Option</th>										
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
								<td>
								12-02-2019
								</td>
								<td>02-10-2019</td>
								<td>NM_123</td>
							  <td>Male</td>
							  <td>Name</td>
							  <td>02-10-2020</td>
							  <td>2000</td>
							  <td>9632587410</td>
							  <td><input type="submit" class="btn btn-danger btn-flat btn-lg" name="addmember" id="addmember" value="View Profile"> </td>
							  </tr>
							 
							 <?php } ?>
							  </tbody>
							</table>
							</div>

</div></div>
<div id="offer_male" class="tabcontent">
 <div class="white-box">
  <div style="overflow-x:auto;">
 
                           <table  id="member" class="display" style="width:100%">
						   <thead>
							  <tr>
								<th><input type="checkbox" id="select_all"></th>
								<th >Date of Registration</th>
					
								<th>USer_ID</th>
								<th>Gender</th>
								<th>Name</th>
								<th>Offer Details</th>
                                <th>Mobile Number</th>
								<th>Option</th>										
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
								<td>
								12-02-2019
								</td>
					
								<td>NM_123</td>
							  <td>Male</td>
							  <td>Name</td>
							  <td>Yes / No</td>
			
							  <td>9632587410</td>
							  <td><input type="submit" class="btn btn-danger btn-flat btn-lg" name="addmember" id="addmember" value="View Profile"> </td>
							  </tr>
							 
							 <?php } ?>
							  </tbody>
							</table>
							</div>

</div></div>
<div id="referal_male" class="tabcontent">
<div class="white-box">
  <div style="overflow-x:auto;">

                           <table  id="member" class="display" style="width:100%">
						   <thead>
							  <tr>
								<th><input type="checkbox" id="select_all"></th>
								<th >Serial No</th>
					
								<th>USer_ID</th>
								<th>Gender</th>
								<th>Name</th>
								<th>Mobile Number</th>
								<th>Total Referal</th>
                                
								<th>Option</th>										
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
								<td>
								1
								</td>
					
								<td>NM_123</td>
							  <td>Male</td>
							  <td>Name</td>
							  <td>9632587410</td>
							  <td>Number</td>										 
							  <td><input type="submit" class="btn btn-danger btn-flat btn-lg" name="addmember" id="addmember" value="View Profile"> </td>
							  </tr>
							 
							 <?php } ?>
							  </tbody>
							</table>
							</div>

                      </div>
                    </div>
					<div id="deleted_male" class="tabcontent">
<div class="white-box">
  <div style="overflow-x:auto;">

                           <table  id="member" class="display" style="width:100%">
						   <thead>
							  <tr>
								<th><input type="checkbox" id="select_all"></th>
								<th >Date of Registration</th>
					<th>Date of Delete</th>
								<th>USer_ID</th>
								<th>Gender</th>
								<th>Name</th>
								<th>Mobile Number</th>
								<th>Paid / Unpaid</th>                               
								<th>Option</th>										
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
								<td>
								1-02-2019
								</td>
					<td>
								1-02-2019
								</td>
								<td>NM_123</td>
							  <td>Male</td>
							  <td>Name</td>
							  <td>9632587410</td>
							  <td>Paid</td>										 
							  <td><input type="submit" class="btn btn-danger btn-flat btn-lg" name="addmember" id="addmember" value="View Profile"> </td>
							  </tr>
							 
							 <?php } ?>
							  </tbody>
							</table>
							</div>

                      </div>
                    </div>
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
