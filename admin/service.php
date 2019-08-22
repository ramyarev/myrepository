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
									<li><a href="#all">All Services</a>
									</li>
									<li><a href="#mandapam">Mandapam</a>
									</li>
									
									<li><a href="#bazar">Bazaar</a>
									</li>
									<li><a href="#photography">Photography</a>
									</li>
									</ul>
									
								
								<div id="all" class="collapse">
								<br>
								
				           <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3>
                                   		<b>All Services</b>
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
								
								</div>
								
								

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

	getPagination('#table-id');
	$('#maxRows').trigger('change');
	function getPagination (table){

		  $('#maxRows').on('change',function(){
		  	$('.pagination').html('');						// reset pagination div
		  	var trnum = 0 ;									// reset tr counter 
		  	var maxRows = parseInt($(this).val());			// get Max Rows from select option
        
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
