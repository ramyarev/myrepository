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

<!--<link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet"> -->
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script>

function openmodal() {
	
		$.ajax({
        url: 'ajaxfilter.php',
        type: 'GET',
        contentType: 'application/json; charset=utf-8',
        success: function (response) {
			
            document.getElementById("result").innerHTML = response;
        },
        error: function () {
            alert("error");
        }
    }); 
         $('#myModal').modal('show');
}
$(document).ready(function() {
	
	
	$.ajax({
        url: 'filteruser.php',
        type: 'GET',
       data: { type: 'ready'} ,
        contentType: 'application/json; charset=utf-8',
        success: function (response) {			
			
            document.getElementById("filterresult").innerHTML = response;
			$('#member').DataTable( {
		 "ordering": false
		
	} );
        },
        error: function () {
            alert("error");
        }
    }); 
	
	
	
//$("#myBtn").click(function(){
	
   // });
	
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

function filtermember()
{
	
	var gender =document.getElementById('gender').value;
	var min_age =document.getElementById('min_age').value;
	var max_age =document.getElementById('max_age').value;
	var from_date =document.getElementById('from_date').value;
	var to_date =document.getElementById('to_date').value;
	var caste =document.getElementById('caste').value;
	var sub_caste =document.getElementById('sub_caste').value;
	var country =document.getElementById('country').value;
	var home_city =document.getElementById('home_city').value;
	var user_id =document.getElementById('user_id').value;
	var mobile_number =document.getElementById('mobile_number').value;
	var education =document.getElementById('education').value;
	var occupation =document.getElementById('occupation').value;
	var raasi =document.getElementById('raasi').value;
	var star =document.getElementById('star').value;
	
	$.ajax({
        url: 'filteruser.php',
        type: 'GET',
        data: { gender: gender,min_age: min_age,max_age: max_age,from_date: from_date,to_date: to_date,caste: caste,sub_caste: sub_caste,country: country,home_city: home_city,user_id: user_id,mobile_number: mobile_number,education: education,occupation: occupation,raasi: raasi,star: star} ,
        contentType: 'application/json; charset=utf-8',
        success: function (response) {
           
			$('#myModal').modal('hide');
            document.getElementById("filterresult").innerHTML = response;
			$('#member').DataTable( {
		 "ordering": false,
		   "searching": false
		
			} );
        },
        error: function () {
            alert("error");
        }
    }); 
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
            </div>
        </div>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Matrimony Dashboard</h4>
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
				 <div class="col-lg-2 col-md-3  col-sm-4 col-xs-12 inbox-panel">
				 <table>
				 <tr>
				 <td>
				 <a href="members.php?type=all" class="btn btn-custom btn-block waves-effect waves-light" style="width:130px;height:36px">All Member</a>
				 </td>
				  <td>
				 <a href="addmember.php" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  >Add Member</a>
				 </td>
				 
				 <td>
				 <a href="#!" class="btn btn-custom btn-block waves-effect waves-light" id="myBtn" data-toggle="modal" data-target="#myModal" style="width:130px;height:36px"  onclick="openmodal()" >Filter Member</a>
				 </td>
				
				 </tr>
				 </table>
				   </div>
				   <br>
				</div>
				<br><br>
                   <div class="col-sm-12">
				   
                        <div class="white-box" class="col-sm-12">
                            <div class="r-icon-stats">
                           <div id="filterresult"></div>
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
					</style>
               
               
            </div>
			
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" align="center">
    <div class="modal-dialog" align="center">
        <div class="modal-content" style="width:800px;margin-left: -189px;" align="center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title" id="myModalLabel">Filter Member</h4>

            </div>
			<form method="post">
            <div class="modal-body">
			<div id="result"></div>
			</div>
			
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="button" onclick="filtermember()" name="paid" id="paid" class="btn btn-primary" value="Filter" style="width:100px;">
            </div>
			</form>
        </div>
    </div>
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
    <!--<script src="../plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>-->
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
