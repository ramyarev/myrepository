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
<link rel="stylesheet" href="https://unpkg.com/multiple-select@1.3.0/dist/multiple-select.min.css">
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://unpkg.com/multiple-select@1.3.0/dist/multiple-select.min.js"></script>
	<link href="css/fSelect.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/fSelect.js"></script>
<script src="js/message.js"></script>
<script>
(function($) {
    $(function() {
        $('.test').fSelect();
    });
})(jQuery);
</script>
<script>
<!--select dropdown-->
$(function() {
  $('#colorselector').change(function(){
    $('.colors').hide();
    $('#' + $(this).val()).show();
  });
});
</script>

<script>
$("#inputGroupFile01").change(function(event) {  
  RecurFadeIn();
  readURL(this);    
});
$("#inputGroupFile01").on('click',function(event){
  RecurFadeIn();
});
function readURL(input) {    
  if (input.files && input.files[0]) {   
    var reader = new FileReader();
    var filename = $("#inputGroupFile01").val();
    filename = filename.substring(filename.lastIndexOf('\\')+1);
    reader.onload = function(e) {
      debugger;      
      $('#blah').attr('src', e.target.result);
      $('#blah').hide();
      $('#blah').fadeIn(500);      
      $('.custom-file-label').text(filename);             
    }
    reader.readAsDataURL(input.files[0]);    
  } 
  $(".alert").removeClass("loading").hide();
}
function RecurFadeIn(){ 
  console.log('ran');
  FadeInAlert("Wait for it...");  
}
function FadeInAlert(text){
  $(".alert").show();
  $(".alert").text(text).addClass("loading");  
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
                        <h4 class="page-title"> <a href="index.php">Offer</a></h4>
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
				   <h3>Offer Details</h3>
				   <div class="col-sm-12">
				   <div class="row">
									<div class="col-md-6 col-xs-12">
                            		<div class="form-group">
                                		<label>
                                    		<b>Select Offer Name</b>
                                   	 	</label>
                                    	<select class  ="form-control" name="state"  id="maxRows">						 						 
						 <option value="10" selected="selected"></option>
						 <option value="15"></option>
						 <option value="20"></option>
						 <option value="50"></option>
						 <option value="70"></option>						
                         <option value="5000"></option>
						</select></div>
									
									<label>
                                    		<b>Select Offer Template</b>
                                   	 	</label>
									<div class="button dropdown"> 									
                                  <select id="colorselector">
                              <option>--Select Template--</option>
                              <option value="A">Type A</option>
                              <option value="B">Type B</option>
                              <option value="C">Type C</option>
							   <option value="D">Type D</option>
                              </select>
                             </div></div>
							 <div class="col-md-12 col-xs-12">
									<div class="output">
                            <div id="A" class="colors">   <div class="white-box">
				   <div class="row">				   				   				   
				   <div class="col-sm-12">
				   <h3>Type A</h3></div>
				   <div class="col-md-6">				   
					   <div class="row">
					   <div class="col-sm-6">
				   <div class="form-group">
                                		<label>
                                    	Offer Image
                                   	 	</label>
                                    	<div class="file-upload">
                                 <div class="file-select">
                                    <input type="file" name="chooseFile" id="chooseFile">
                                             </div>
                                          </div>
                                 </div></div>
								 <div class="col-sm-6">
								 <div class="form-group">
                                		<label>
                                    	Applicable
                                   	 	</label><br>
                                    	
                                       <select class="test" multiple="multiple"class="form-control" placeholder="--choose user details">
                                       <option value="1"></option>
                                       <option value="2"></option>
                                       <option value="3"></option>
                                       <option value="4"></option>
                                        <option value="5"></option>
                                       <option value="6"> </option>
                                                                      
                                          </select>

                                           </div></div>
										   </div>
										   <h4>Offer Validity</h4>
										   <div class="form-group"> 
                                         <label>
                                    	Date
                                   	 	</label><br>										   
                        <input type="date" class="form-control" />                    
                                 </div>
								<div class="form-group">
									<label>
                                    	Show In Time
                                   	 	</label><br>										   
                       <input type="time" class="form-control" />                    
                       </div>
					   <div class="form-group">
									<label>
                                    	Show Out Time
                                   	 	</label><br>										   
                       <input type="time" class="form-control" />                    
                       </div>
					   <h4>Promocode: &nbsp <a class="btn btn-custom btn-block waves-effect waves-light"  style="width:80px;" data-toggle="collapse" data-target="#yes">Yes</a> / <a class="btn btn-custom btn-block waves-effect waves-light"  style="width:80px;" data-toggle="collapse" data-target="#no">No </a></h4>
                 <div class="collapse" id="yes">
				 <div class="form-group">
                                		
										<input type="text" name="code"class="form-control"  >                                            
                                 </div>
								 <div class="form-group">
                                		                                
                                        <label class="radio-inline">
                                        <input type="radio" name="logged" value="0">
                                              Show Direct </label>
                                            <label class="radio-inline">
                                        <input type="radio" name="logged" value="1" >
                                          Show Indirect </label>
										  
                                	</div>
									<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> Submit</a>
									
								 </div><br>
								 <div class="form-group">
									<label>
                                    	Short Descriptive
                                   	 	</label><br>
                                    <textarea name="message" value="" rows="4" cols="50"id="message"></textarea>
                                   <div>
                                       <div><span id="remaining"style="color:red">400</span>&nbsp;Character<span class="cplural">s</span> Remaining</div>
                             <div>Total&nbsp;<span id="messages"style="color:red">1</span>&nbsp;SMS<span class="mplural">s</span>&nbsp;<span id="total" style="color:red">0</span>&nbsp;Character<span class="tplural">s</span></div>
                              </div></div>
									<div class="form-group">
									<label>
                                    	Long Descriptive
                                   	 	</label><br>
                                    <textarea name="message1" value="" rows="4" cols="50"id="message1"></textarea>
                                   </div>
									<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> Submit</a>
									
		   </div>
				  

				   </div>
				   </div>
                <div class="row">
				
				
				 <div class="col-lg-3 col-md-3  col-sm-4 col-xs-12 inbox-panel">
				 
				 <table  class='approvest' >
				 <tr>
				 <td style="border:none">
				   <a class="btn btn-custom btn-block waves-effect waves-light" data-toggle="collapse" data-target="#group"> &nbsp Bulk</a>
				   </td> &nbsp 
				   <td style="border:none">
				   <a class="btn btn-custom btn-block waves-effect waves-light" data-toggle="collapse" data-target="#indujual">&nbsp Custom </a></div>
				   </td>
				   </tr>
				   </table>
				   
				   <br>
				</div>
				<br><br>
				<div  class="col-md-12">		
	  <div class="collapse" id="group">	
<div class="col-md-6">		  
	  <div class="white-box">	
						<form>
							
                                    <div class="form-group">
                                		<label>
                                    	Type of Mode
                                   	 	</label>                                   
                                        <label class="radio-inline">
                                        <input type="radio" name="logged" value="0">
                                              Alert  </label>
                                            <label class="radio-inline">
                                        <input type="radio" name="logged" value="1"data-toggle="collapse" data-target="#sms" >
                                          SMS  </label>
										  <label class="radio-inline">
                                        <input type="radio" name="logged" value="2" checked="checked" data-toggle="collapse" data-target="#sms">
                                          Both  </label>
                                	</div>
											
                                      <div class="collapse" id="sms">
									<div class="form-group">
                                		<label>
                                    	SMS Type
                                   	 	</label>
                                    	<select class="form-control" data-validetta="required" name="marital_status" id="marital_status">
                                       <option value="">Transactional</option>
                                    	<option value="unmarried" >Promotional</option>                                      
                                        </select>
											
                                	</div></div>
									<div class="form-group">
                                		<label>
                                    	Gender &nbsp  &nbsp 

                                   	 	</label>
                                    	
                                        <label class="radio-inline">
                                        <input type="radio" name="logged" value="0">
                                              Male  </label>
                                            <label class="radio-inline">
                                        <input type="radio" name="logged" value="1">
                                          Female  </label>
										  <label class="radio-inline">
                                        <input type="radio" name="logged" value="2" checked="checked">
                                          Both  </label>
                                	</div>
									<div class="form-group">
                                		<label>
                                    	User Details
                                   	 	</label><br>
                                    	
                                       <select class="test" multiple="multiple" placeholder="--choose user details">
                                       <option value="1">Active</option>
                                       <option value="2">Inactive</option>
                                       <option value="3">Paid</option>
                                       <option value="4">Unpaid</option>
                                        <option value="5">Premium</option>
                                       <option value="6">Verified Profile</option>
                                       <option value="7">Deleted Profile</option>
                                     <option value="8">Approval </option>
                                      <option value="9">Unapproval</option>
                                         <option value="10">October</option>
                                        <option value="11">November</option>                                    
                                          </select>

                                           </div>
									<div class="form-group">
									<label>
                                    	Title
                                   	 	</label>
										<input type="title" class="form-control">
                                    </div>
									
									<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> Submit</a>
				 
                                	</div></form>
                                    </div></div>
<div class="collapse" id="indujual">
<div class="col-md-6">								
	  <div class="white-box">	
                                     
							<form>
							
                                    <div class="form-group">
                                		<label>
                                    	Type of Mode
                                   	 	</label>                                   
                                        <label class="radio-inline">
                                        <input type="radio" name="logged" value="0">
                                              Alert  </label>
                                            <label class="radio-inline">
                                        <input type="radio" name="logged" value="1"data-toggle="collapse" data-target="#sms" >
                                          SMS  </label>
										  <label class="radio-inline">
                                        <input type="radio" name="logged" value="2" checked="checked" data-toggle="collapse" data-target="#sms">
                                          Both  </label>
                                	</div>
											
                                      <div class="collapse" id="sms">
									<div class="form-group">
                                		<label>
                                    	SMS Type
                                   	 	</label>
                                    	<select class="form-control" data-validetta="required" name="marital_status" id="marital_status">
                                       <option value="">Transactional</option>
                                    	<option value="unmarried" >Promotional</option>                                      
                                        </select>
											
                                	</div></div>
								
									<div class="form-group">
                                		<label>
                                    	User Details
                                   	 	</label><br>
                                    	
                                       <select class="test" multiple="multiple">
                            <!--optgroup label="Group A"-->
                              <option value="1">NM_123</option>
                             <option value="2" >NM_123</option>
                             <option value="3">NM_123</option>
                         <option value="4" >NM_123</option>
                           <option value="5">NM_123</option>
                           <!--/optgroup-->
                         
                              </select>

                                           </div>
									<div class="form-group">
									<label>
                                    	Title
                                   	 	</label>
										<input type="text" class="form-control">
                                   </div>
									
									<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> Submit</a>
				 
                                	</div></form>        </div>
									</div>
									</div>
									</div>
									</div>
                           <div id="B" class="colors"> <div class="white-box">
				   <div class="row">				   
				   
				   
				   <div class="col-sm-12">
				   <h3>Type B</h3></div>
				   <div class="col-md-6">
				   
					   <div class="row">
					   <div class="col-sm-6">
				   <div class="form-group">
                                		<label>
                                    	Offer Image
                                   	 	</label>
                                    	<div class="file-upload">
                                 <div class="file-select">
                                    <input type="file" name="chooseFile" id="chooseFile">
                                             </div>
                                          </div>
                                 </div></div>
								 <div class="col-sm-6">
								 <div class="form-group">
                                		<label>
                                    	Applicable
                                   	 	</label><br>
                                    	
                                       <select class="test" multiple="multiple"class="form-control" placeholder="--choose user details">
                                       <option value="1"></option>
                                       <option value="2"></option>
                                       <option value="3"></option>
                                       <option value="4"></option>
                                        <option value="5"></option>
                                       <option value="6"> </option>
                                                                      
                                          </select>

                                           </div></div>
										   </div>
										   <h4>Offer Validity</h4>
										   <div class="form-group"> 
                                         <label>
                                    	Date
                                   	 	</label><br>										   
                        <input type="date" class="form-control" />                    
                                 </div>
								<div class="form-group">
									<label>
                                    	Show In Time
                                   	 	</label><br>										   
                       <input type="time" class="form-control" />                    
                       </div>
					   <div class="form-group">
									<label>
                                    	Show In Time
                                   	 	</label><br>										   
                       <input type="time" class="form-control" />                    
                       </div>
					   <h4>Promocode: &nbsp <a class="btn btn-custom btn-block waves-effect waves-light"  style="width:80px;"  data-toggle="collapse" data-target="#yes_1">Yes</a> / <a class="btn btn-custom btn-block waves-effect waves-light"  style="width:80px;" data-toggle="collapse" data-target="#yes">No </a></h4>
                 <div class="collapse" id="yes_1">
				 <div class="form-group">
                                		
										<input type="text" name="code"class="form-control"  >                                            
                                 </div>
								 <div class="form-group">
                                		                                
                                        <label class="radio-inline">
                                        <input type="radio" name="logged" value="0">
                                              Show Direct </label>
                                            <label class="radio-inline">
                                        <input type="radio" name="logged" value="1" >
                                         Show Indirect </label>
										  
                                	</div>
									<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> Submit</a>
									
								 </div><br>
								 <div class="form-group">
									<label>
                                    	Short Descriptive
                                   	 	</label><br>
                                    <textarea name="message2" value="" rows="4" cols="50"id="message2"></textarea>
                                   <div>
                                       <div><span id="remaining2"style="color:red">400</span>&nbsp;Character<span class="cplural">s</span> Remaining</div>
                             <div>Total&nbsp;<span id="messages2"style="color:red">1</span>&nbsp;SMS<span class="mplural">s</span>&nbsp;<span id="total2" style="color:red">0</span>&nbsp;Character<span class="tplural">s</span></div>
                              </div></div>
									<div class="form-group">
									<label>
                                    	Long Descriptive
                                   	 	</label><br>
                                    <textarea name="message3" value="" rows="4" cols="50"id="message3"></textarea>
                                   
							  </div>
									<table>
									<tr>
									<th></th>
								   <th></th>
								   <th></th>
								   </tr>
								   <tr>
								   <td></td>
								   <td></td>
								   <td></td>
								   </tr>
								    <tr>
								   <td></td>
								   <td></td>
								   <td></td>
								   </tr>
								   </table>
								   <br>
								   <div class="form-group col-md-12">
									<label>
                                    	Ads 
                                   	 	</label>
                                    <input type="file">
									
                                    <input type="file">
								
								
                                    <input type="file">
									</div>
									<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> Submit</a>
									
		   </div>
				  

				   </div>
				   </div>
                <div class="row">
				
				
				 <div class="col-lg-3 col-md-3  col-sm-4 col-xs-12 inbox-panel">
				 
				 <table  class='approvest' >
				 <tr>
				 <td style="border:none">
				   <a class="btn btn-custom btn-block waves-effect waves-light" data-toggle="collapse" data-target="#group_1"> &nbsp Bulk</a>
				   </td> 
				   <td style="border:none">
				   <a class="btn btn-custom btn-block waves-effect waves-light" data-toggle="collapse" data-target="#indujual_1"> &nbsp Custom </a></div>
				   </td>
				   </tr>
				   </table>
				   
				   <br>
				</div>
				<br><br>
				<div  class="col-md-12">		
	  <div class="collapse" id="group_1">	
<div class="col-md-6">		  
	  <div class="white-box">	
						<form>
							
                                    <div class="form-group">
                                		<label>
                                    	Type of Mode
                                   	 	</label>                                   
                                        <label class="radio-inline">
                                        <input type="radio" name="logged" value="0">
                                              Alert  </label>
                                            <label class="radio-inline">
                                        <input type="radio" name="logged" value="1"data-toggle="collapse" data-target="#sms" >
                                          SMS  </label>
										  <label class="radio-inline">
                                        <input type="radio" name="logged" value="2" checked="checked" data-toggle="collapse" data-target="#sms">
                                          Both  </label>
                                	</div>
											
                                      <div class="collapse" id="sms">
									<div class="form-group">
                                		<label>
                                    	SMS Type
                                   	 	</label>
                                    	<select class="form-control" data-validetta="required" name="marital_status" id="marital_status">
                                       <option value="">Transactional</option>
                                    	<option value="unmarried" >Promotional</option>                                      
                                        </select>
											
                                	</div></div>
									<div class="form-group">
                                		<label>
                                    	Gender &nbsp  &nbsp 

                                   	 	</label>
                                    	
                                        <label class="radio-inline">
                                        <input type="radio" name="logged" value="0">
                                              Male  </label>
                                            <label class="radio-inline">
                                        <input type="radio" name="logged" value="1">
                                          Female  </label>
										  <label class="radio-inline">
                                        <input type="radio" name="logged" value="2" checked="checked">
                                          Both  </label>
                                	</div>
									<div class="form-group">
                                		<label>
                                    	User Details
                                   	 	</label><br>
                                    	
                                       <select class="test" multiple="multiple" placeholder="--choose user details">
                                       <option value="1">Active</option>
                                       <option value="2">Inactive</option>
                                       <option value="3">Paid</option>
                                       <option value="4">Unpaid</option>
                                        <option value="5">Premium</option>
                                       <option value="6">Verified Profile</option>
                                       <option value="7">Deleted Profile</option>
                                     <option value="8">Approval </option>
                                      <option value="9">Unapproval</option>
                                         <option value="10">October</option>
                                        <option value="11">November</option>                                    
                                          </select>

                                           </div>
									<div class="form-group">
									<label>
                                    	Title
                                   	 	</label><br>
                                    <input type="text" class="form-control"> </div>
									
									<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> Submit</a>
				 
                                	</div></form>
                                    </div></div>
<div class="collapse" id="indujual_1">
<div class="col-md-6">								
	  <div class="white-box">	
                                     
							<form>
							
                                    <div class="form-group">
                                		<label>
                                    	Type of Mode
                                   	 	</label>                                   
                                        <label class="radio-inline">
                                        <input type="radio" name="logged" value="0">
                                              Alert  </label>
                                            <label class="radio-inline">
                                        <input type="radio" name="logged" value="1"data-toggle="collapse" data-target="#sms" >
                                          SMS  </label>
										  <label class="radio-inline">
                                        <input type="radio" name="logged" value="2" checked="checked" data-toggle="collapse" data-target="#sms">
                                          Both  </label>
                                	</div>
											
                                      <div class="collapse" id="sms">
									<div class="form-group">
                                		<label>
                                    	SMS Type
                                   	 	</label>
                                    	<select class="form-control" data-validetta="required" name="marital_status" id="marital_status">
                                       <option value="">Transactional</option>
                                    	<option value="unmarried" >Promotional</option>                                      
                                        </select>
											
                                	</div></div>
								
									<div class="form-group">
                                		<label>
                                    	User Details
                                   	 	</label><br>
                                    	
                                       <select class="test" multiple="multiple">
                            <!--optgroup label="Group A"-->
                              <option value="1">NM_123</option>
                             <option value="2" >NM_123</option>
                             <option value="3">NM_123</option>
                         <option value="4" >NM_123</option>
                           <option value="5">NM_123</option>
                           <!--/optgroup-->
                         
                              </select>

                                           </div>
									<div class="form-group">
									<label>
                                    	Title
                                   	 	</label><br>
                                    <input type="text" class="form-control">
									</div>
									
									<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> Submit</a>
				 
                                	</div></form>        </div>
									</div>
									</div>
									</div>
									</div>
                            <div id="C" class="colors">
							<div class="white-box">
				   <div class="row">				   				   				   
				   <div class="col-sm-12">
				   <h3>Type C</h3></div>
				   <div class="col-md-6">
				  
					   <div class="row">
					   <div class="col-sm-6">
					   <div class="form-group">
                                		<label>
                                    	Type of Mode
                                   	 	</label> <br>                                  
                                        <label class="checkbox-inline">
                                        <input type="checkbox" name="logged" value="0">
                                              Alert  </label>
                                            <label class="checkbox-inline">
                                        <input type="checkbox" name="logged" value="1">
                                          SMS  </label>
										  </div>
										  </div>
								 <div class="col-sm-6">
				   <div class="form-group">
                                		<label>
                                    	Offer Image
                                   	 	</label>
                                    	<div class="file-upload">
                                 <div class="file-select">
                                    <input type="file" name="chooseFile" id="chooseFile">
                                             </div>
                                          </div>
                                 </div></div></div>
								 <div class="form-group">
                                		<label>
                                    	Link
                                   	 	</label>                                                                        
                                        <input class="form-control"type="link" name="logged" value="">
                                      
                                	</div>
								
									<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> Submit</a>
									</div>
		   </div>
				  

				   </div>
				  
                <div class="row">
				
				
				 <div class="col-lg-3 col-md-3  col-sm-4 col-xs-12 inbox-panel">
				 
				 <table  class='approvest' >
				 <tr>
				 <td style="border:none">
				   <a class="btn btn-custom btn-block waves-effect waves-light" data-toggle="collapse" data-target="#group_2"> &nbsp Bulk Of</a>
				   </td>
				   <td style="border:none">
				   <a class="btn btn-custom btn-block waves-effect waves-light" data-toggle="collapse" data-target="#indujual_2"> &nbsp Custom </a></div>
				   </td>
				   </tr>
				   </table>
				   
				   <br>
				</div>
				<br><br>
				<div  class="col-md-12">		
	  <div class="collapse" id="group_2">	
<div class="col-md-6">		  
	  <div class="white-box">	
						<form>
							
                                    <div class="form-group">
                                		<label>
                                    	Type of Mode
                                   	 	</label>                                   
                                        <label class="radio-inline">
                                        <input type="radio" name="logged" value="0">
                                              Alert  </label>
                                            <label class="radio-inline">
                                        <input type="radio" name="logged" value="1"data-toggle="collapse" data-target="#sms" >
                                          SMS  </label>
										  <label class="radio-inline">
                                        <input type="radio" name="logged" value="2" checked="checked" data-toggle="collapse" data-target="#sms">
                                          Both  </label>
                                	</div>
											
                                      <div class="collapse" id="sms">
									<div class="form-group">
                                		<label>
                                    	SMS Type
                                   	 	</label>
                                    	<select class="form-control" data-validetta="required" name="marital_status" id="marital_status">
                                       <option value="">Transactional</option>
                                    	<option value="unmarried" >Promotional</option>                                      
                                        </select>
											
                                	</div></div>
									<div class="form-group">
                                		<label>
                                    	Gender &nbsp  &nbsp 

                                   	 	</label>
                                    	
                                        <label class="radio-inline">
                                        <input type="radio" name="logged" value="0">
                                              Male  </label>
                                            <label class="radio-inline">
                                        <input type="radio" name="logged" value="1">
                                          Female  </label>
										  <label class="radio-inline">
                                        <input type="radio" name="logged" value="2" checked="checked">
                                          Both  </label>
                                	</div>
									<div class="form-group">
                                		<label>
                                    	User Details
                                   	 	</label><br>
                                    	
                                       <select class="test" multiple="multiple" placeholder="--choose user details">
                                       <option value="1">Active</option>
                                       <option value="2">Inactive</option>
                                       <option value="3">Paid</option>
                                       <option value="4">Unpaid</option>
                                        <option value="5">Premium</option>
                                       <option value="6">Verified Profile</option>
                                       <option value="7">Deleted Profile</option>
                                     <option value="8">Approval </option>
                                      <option value="9">Unapproval</option>
                                         <option value="10">October</option>
                                        <option value="11">November</option>                                    
                                          </select>

                                           </div>
									<div class="form-group">
									<label>
                                    	Title
                                   	 	</label><input type="text" class="form-control">
										</div>
									
									<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> Submit</a>
				 
                                	</div></form>
                                    </div></div>
<div class="collapse" id="indujual_2">
<div class="col-md-6">								
	  <div class="white-box">	
                                     
							<form>
							
                                    <div class="form-group">
                                		<label>
                                    	Type of Mode
                                   	 	</label>                                   
                                        <label class="radio-inline">
                                        <input type="radio" name="logged" value="0">
                                              Alert  </label>
                                            <label class="radio-inline">
                                        <input type="radio" name="logged" value="1"data-toggle="collapse" data-target="#sms" >
                                          SMS  </label>
										  <label class="radio-inline">
                                        <input type="radio" name="logged" value="2" checked="checked" data-toggle="collapse" data-target="#sms">
                                          Both  </label>
                                	</div>
											
                                      <div class="collapse" id="sms">
									<div class="form-group">
                                		<label>
                                    	SMS Type
                                   	 	</label>
                                    	<select class="form-control" data-validetta="required" name="marital_status" id="marital_status">
                                       <option value="">Transactional</option>
                                    	<option value="unmarried" >Promotional</option>                                      
                                        </select>
											
                                	</div></div>
								
									<div class="form-group">
                                		<label>
                                    	User Details
                                   	 	</label><br>
                                    	
                                       <select class="test" multiple="multiple">
                            <!--optgroup label="Group A"-->
                              <option value="1">NM_123</option>
                             <option value="2" >NM_123</option>
                             <option value="3">NM_123</option>
                         <option value="4" >NM_123</option>
                           <option value="5">NM_123</option>
                           <!--/optgroup-->
                         
                              </select>

                                           </div>
									<div class="form-group">
									<label>
                                    	Title
                                   	 	</label>
										<input type="text" class="form-control">
										</div>
									
									<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> Submit</a>
				 
                                	</div></form>       
									</div>
									</div>
									</div>
									</div>
									</div>
							<div id="D" class="colors Green"> <div class="white-box">
				   <div class="row">				   				   				   
				   <div class="col-sm-12">
				   <h3>Type D</h3></div>
				   <div class="col-md-6">
				   
					
					   <div class="form-group"> 
                                         <label>
                                    	Date
                                   	 	</label>
																								
                        <input type="date" class="form-control" />                    
                                 </div>
								 
								<div class="form-group">
									<label>
                                    	Show In Time
                                   	 	</label><br>										   
                       <input type="time" class="form-control" />                    
                       </div>
					   <div class="form-group">
									<label>
                                    	Show Out Time
                                   	 	</label><br>										   
                       <input type="time" class="form-control" />                    
                       </div>
					   
				   <div class="form-group">
                                		<label>
                                    	Offer Image
                                   	 	</label>
                                    	<div class="file-upload">
                                 <div class="file-select">
                                    <input type="file" name="chooseFile" id="chooseFile">
                                             </div>
                                          </div>
                                 </div>
							
								 <div class="form-group">
                                		<label>
                                    	Applicable
                                   	 	</label><br>
                                    	
                                       <select class="test" multiple="multiple"class="form-control" placeholder="--choose user details">
                                       <option value="1"></option>
                                       <option value="2"></option>
                                       <option value="3"></option>
                                       <option value="4"></option>
                                        <option value="5"></option>
                                       <option value="6"> </option>
                                                                      
                                          </select>

                                           </div>
					  <br>
								 <div class="form-group">
									<label>
                                    	Short Descriptive
                                   	 	</label><br>
                                    <textarea name="message4" value="" rows="4" cols="50"id="message4"></textarea>
                                   <div>
                                       <div><span id="remaining4"style="color:red">400</span>&nbsp;Character<span class="cplural">s</span> Remaining</div>
                             <div>Total&nbsp;<span id="messages4"style="color:red">1</span>&nbsp;SMS<span class="mplural">s</span>&nbsp;<span id="total4" style="color:red">0</span>&nbsp;Character<span class="tplural">s</span></div>
                              </div></div>
									
								   <br>
								  
									<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> Submit</a>
									
		   </div>
				  

				   </div>
				   </div>
                <div class="row">
				
				
				 <div class="col-lg-3 col-md-3  col-sm-4 col-xs-12 inbox-panel">
				 
				 <table  class='approvest' >
				 <tr>
				 <td style="border:none">
				   <a class="btn btn-custom btn-block waves-effect waves-light"data-toggle="collapse" data-target="#group_3"> &nbsp Bulk Of</a>
				   </td>
				   <td style="border:none">
				   <a class="btn btn-custom btn-block waves-effect waves-light" data-toggle="collapse" data-target="#indujual_3"> &nbsp Custom </a></div>
				   </td>
				   </tr>
				   </table>
				   
				   <br>
				</div>
				<br><br>
				<div  class="col-md-12">		
	  <div class="collapse" id="group_3">	
<div class="col-md-6">		  
	  <div class="white-box">	
						<form>
							
                                    <div class="form-group">
                                		<label>
                                    	Type of Mode
                                   	 	</label>                                   
                                        <label class="radio-inline">
                                        <input type="radio" name="logged" value="0">
                                              Alert  </label>
                                            <label class="radio-inline">
                                        <input type="radio" name="logged" value="1"data-toggle="collapse" data-target="#sms" >
                                          SMS  </label>
										  <label class="radio-inline">
                                        <input type="radio" name="logged" value="2" checked="checked" data-toggle="collapse" data-target="#sms">
                                          Both  </label>
                                	</div>
											
                                      <div class="collapse" id="sms">
									<div class="form-group">
                                		<label>
                                    	SMS Type
                                   	 	</label>
                                    	<select class="form-control" data-validetta="required" name="marital_status" id="marital_status">
                                       <option value="">Transactional</option>
                                    	<option value="unmarried" >Promotional</option>                                      
                                        </select>
											
                                	</div></div>
									<div class="form-group">
                                		<label>
                                    	Gender &nbsp  &nbsp 

                                   	 	</label>
                                    	
                                        <label class="radio-inline">
                                        <input type="radio" name="logged" value="0">
                                              Male  </label>
                                            <label class="radio-inline">
                                        <input type="radio" name="logged" value="1">
                                          Female  </label>
										  <label class="radio-inline">
                                        <input type="radio" name="logged" value="2" checked="checked">
                                          Both  </label>
                                	</div>
									<div class="form-group">
                                		<label>
                                    	User Details
                                   	 	</label><br>
                                    	
                                       <select class="test" multiple="multiple" placeholder="--choose user details">
                                       <option value="1">Active</option>
                                       <option value="2">Inactive</option>
                                       <option value="3">Paid</option>
                                       <option value="4">Unpaid</option>
                                        <option value="5">Premium</option>
                                       <option value="6">Verified Profile</option>
                                       <option value="7">Deleted Profile</option>
                                     <option value="8">Approval </option>
                                      <option value="9">Unapproval</option>
                                         <option value="10">October</option>
                                        <option value="11">November</option>                                    
                                          </select>

                                           </div>
									<div class="form-group">
									<label>
                                    	Title
                                   	 	</label>
										<input type="text" class="form-control">
										</div>
									
									<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> Submit</a>
				 
                                	</div></form>
                                    </div></div>
<div class="collapse" id="indujual_3">
<div class="col-md-6">								
	  <div class="white-box">	
                                     
							<form>
							
                                    <div class="form-group">
                                		<label>
                                    	Type of Mode
                                   	 	</label>                                   
                                        <label class="radio-inline">
                                        <input type="radio" name="logged" value="0">
                                              Alert  </label>
                                            <label class="radio-inline">
                                        <input type="radio" name="logged" value="1"data-toggle="collapse" data-target="#sms" >
                                          SMS  </label>
										  <label class="radio-inline">
                                        <input type="radio" name="logged" value="2" checked="checked" data-toggle="collapse" data-target="#sms">
                                          Both  </label>
                                	</div>
											
                                      <div class="collapse" id="sms">
									<div class="form-group">
                                		<label>
                                    	SMS Type
                                   	 	</label>
                                    	<select class="form-control" data-validetta="required" name="marital_status" id="marital_status">
                                       <option value="">Transactional</option>
                                    	<option value="unmarried" >Promotional</option>                                      
                                        </select>
											
                                	</div></div>
								
									<div class="form-group">
                                		<label>
                                    	User Details
                                   	 	</label><br>
                                    	
                                       <select class="test" multiple="multiple">
                            <!--optgroup label="Group A"-->
                              <option value="1">NM_123</option>
                             <option value="2" >NM_123</option>
                             <option value="3">NM_123</option>
                         <option value="4" >NM_123</option>
                           <option value="5">NM_123</option>
                           <!--/optgroup-->
                         
                              </select>

                                           </div>
									<div class="form-group">
									<label>
                                    	Title
                                   	 	</label>
										<input type="text" class="form-control">
										</div>
									
									<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> Submit</a>
				 
                                	</div></form>        </div>
									</div>
									</div>
									</div>
									</div>
                            </div>
                                    </div> </div>                        
                            	</div>
                                
                                
				   </div>
				   <div class="col-sm-12">
				   <!--div id="preview-container">
    <label class="wrapper" for="states">This label is stacked above the select</label>
<div class="button dropdown"> 
  <select id="colorselector">
  <option>gren</option>
     <option value="red">Red</option>
     <option value="yellow">Yellow</option>
     <option value="blue">Blue</option>
  </select>
</div>

<div class="output">
  <div id="red" class="colors red">  “Good artists copy, great artists steal” Pablo Picasso</div>
  <div id="yellow" class="colors yellow"> “Art is the lie that enables us to realize the truth” Pablo Picasso</div>
  <div id="blue" class="colors blue"> “If I don't have red, I use blue” Pablo Picasso</div>
</div>

</div--><!-- container -->
				   </div>
				   </div>
              


				
               
				<style>
				<!--select dropdown-->
				
				label {
  display:block;
  margin: 2em 1em .25em .75em;
  font-size: 1.25em;
  color:#333;
}

/* Container used for styling the custom select, the buttom class adds the bg gradient, corners, etc. */
.dropdown {
  position: relative;
  display:block;
  margin-top:0.5em;
  padding:0;
}

/* This is the native select, we're making everything the text invisible so we can see the button styles in the wrapper */
.dropdown select {
  width:100%;
  margin:0;
  border: 1px solid transparent;
  outline: none;
  /* Prefixed box-sizing rules necessary for older browsers */
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  /* Remove select styling */
  appearance: none;
  -webkit-appearance: none;
  /* Magic font size number to prevent iOS text zoom */
  font-size:1.25em;
  /* General select styles: change as needed */
  /* font-weight: bold; */
  color: #444;
  padding: .6em 1.9em .5em .8em;
  line-height:1.3;
}
.dropdown select,
label {
  font-family: AvenirNextCondensed-DemiBold, Corbel, "Lucida Grande","Trebuchet Ms", sans-serif;
}

/* Custom arrow sits on top of the select - could be an image, SVG, icon font, etc. or the arrow could just baked into the bg image on the select */

.dropdown::after {
  content: "";
  position: absolute;
  width: 9px;
  height: 8px;
  top: 50%;
  right: 1em;
  margin-top:-4px;
  z-index: 2;
  background: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 12'%3E%3Cpolygon fill='rgb(102,102,102)' points='8,12 0,0 16,0'/%3E%3C/svg%3E") 0 0 no-repeat;  
  /* These hacks make the select behind the arrow clickable in some browsers */
  pointer-events:none;
}

/* This hides native dropdown button arrow in IE 10/11+ so it will have the custom appearance, IE 9 and earlier get a native select */
@media screen and (-ms-high-contrast: active), (-ms-high-contrast: none) {
  .dropdown select::-ms-expand {
    display: none;
  }
  /* Removes the odd blue bg color behind the text in IE 10/11 and sets the text to match the focus style text */
  select:focus::-ms-value {
    background: transparent;
    color: #222;
  }
}

/* Firefox >= 2 -- Older versions of FF (v2 - 6) won't let us hide the native select arrow, so we'll just hide the custom icon and go with native styling */
/* Show only the native arrow */
body:last-child .dropdown::after, x:-moz-any-link {
  display: none;
}
/* reduce padding */
body:last-child .dropdown select, x:-moz-any-link {
  padding-right: .8em;
}

/* Firefox 7+ -- Will let us hide the arrow, but inconsistently (see FF 30 comment below). We've found the simplest way to hide the native styling in FF is to make the select bigger than its container. */
/* The specific FF selector used below successfully overrides the previous rule that turns off the custom icon; other FF hacky selectors we tried, like `*>.dropdown::after`, did not undo the previous rule */

/* Set overflow:hidden on the wrapper to clip the native select's arrow, this clips hte outline too so focus styles are less than ideal in FF */
_::-moz-progress-bar, body:last-child .dropdown {
  overflow: hidden;
}
/* Show only the custom icon */
_::-moz-progress-bar, body:last-child .dropdown:after {
  display: block;
}
_::-moz-progress-bar, body:last-child .dropdown select {
  /* increase padding to make room for menu icon */
  padding-right: 1.9em;
  /* `window` appearance with these text-indent and text-overflow values will hide the arrow FF up to v30 */
  -moz-appearance: window;
  text-indent: 0.01px;
  text-overflow: "";
  /* for FF 30+ on Windows 8, we need to make the select a bit longer to hide the native arrow */
  width: 110%;
}

/* At first we tried the following rule to hide the native select arrow in Firefox 30+ in Windows 8, but we'd rather simplify the CSS and widen the select for all versions of FF since this is a recurring issue in that browser */
/* @supports (-moz-appearance:meterbar) and (background-blend-mode:difference,normal) {
.dropdown select { width:110%; }
}   */


/* Firefox 7+ focus style - This works around the issue that -moz-appearance: window kills the normal select focus. Using semi-opaque because outline doesn't handle rounded corners */
_::-moz-progress-bar, body:last-child .dropdown select:focus {
  outline: 2px solid rgba(180,222,250, .7);
}


/* Opera - Pre-Blink nix the custom arrow, go with a native select button */
x:-o-prefocus, .dropdown::after {
  display:none;
}


/* Hover style */
.dropdown:hover {
  border:1px solid #888;
}

/* Focus style */
select:focus {
  outline:none;
  box-shadow: 0 0 1px 3px rgba(180,222,250, 1);
  background-color:transparent;
  color: #222;
  border:1px solid #aaa;
}


/* Firefox focus has odd artifacts around the text, this kills that */
select:-moz-focusring {
  color: transparent;
  text-shadow: 0 0 0 #000;
}

option {
  font-weight:normal;
}


/* These are just demo button-y styles, style as you like */
.button {
  border: 1px solid #bbb;
  border-radius: .3em;
  box-shadow: 0 1px 0 1px rgba(0,0,0,.04);
  background: #f3f3f3; /* Old browsers */
  background: -moz-linear-gradient(top, #ffffff 0%, #e5e5e5 100%); /* FF3.6+ */
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(100%,#e5e5e5)); /* Chrome,Safari4+ */
  background: -webkit-linear-gradient(top, #ffffff 0%,#e5e5e5 100%); /* Chrome10+,Safari5.1+ */
  background: -o-linear-gradient(top, #ffffff 0%,#e5e5e5 100%); /* Opera 11.10+ */
  background: -ms-linear-gradient(top, #ffffff 0%,#e5e5e5 100%); /* IE10+ */
  background: linear-gradient(to bottom, #ffffff 0%,#e5e5e5 100%); /* W3C */
}

.output {
  margin: 0 auto;
  padding: 1em; 
}
.colors {
  padding: 2em;
  display: none;
}
.red {
  background: #c04;
} 
.yellow {
  color: #000;
  background: #f5e000;
} 
.blue {
  background: #079;
}

a {
  color: #c04;
  text-decoration: none;
}

a:hover {
  color: #903;
  text-decoration: underline;
}
<!--select dropdown end-->				

<!--image preview end-->
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

var _PREVIEW_URL;

/* Show Select File dialog */
document.querySelector("#upload-dialog").addEventListener('click', function() {
    document.querySelector("#image-file").click();
});

/* Selected File has changed */
document.querySelector("#image-file").addEventListener('change', function() {
    // user selected file
    var file = this.files[0];

    // allowed MIME types
    var mime_types = [ 'image/jpeg', 'image/png' ];
    
    // validate MIME
    if(mime_types.indexOf(file.type) == -1) {
        alert('Error : Incorrect file type');
        return;
    }

    // validate file size
    if(file.size > 2*1024*1024) {
        alert('Error : Exceeded size 2MB');
        return;
    }

    // validation is successful

    // hide upload dialog button
    document.querySelector("#upload-dialog").style.display = 'none';
    
    // set name of the file
    document.querySelector("#image-name").innerText = file.name;
    document.querySelector("#image-name").style.display = 'inline-block';

    // local url
    _PREVIEW_URL = URL.createObjectURL(file);

    // set src of image and show
    document.querySelector("#preview-image").setAttribute('src', _PREVIEW_URL);
    document.querySelector("#preview-image").style.display = 'inline-block';

    
    // show cancel and upload buttons now
    document.querySelector("#cancel-image").style.display = 'inline-block';
    document.querySelector("#upload-button").style.display = 'inline-block';
});

/* Reset file input */
document.querySelector("#cancel-image").addEventListener('click', function() {
    // destroy previous local url
    URL.revokeObjectURL(_PREVIEW_URL);

    // show upload dialog button
    document.querySelector("#upload-dialog").style.display = 'inline-block';

    // reset to no selection
    document.querySelector("#image-file").value = '';

    // hide elements that are not required
    document.querySelector("#image-name").style.display = 'none';
    document.querySelector("#preview-image").style.display = 'none';
    document.querySelector("#cancel-image").style.display = 'none';
    document.querySelector("#upload-button").style.display = 'none';
});

/* Upload file to server */
document.querySelector("#upload-button").addEventListener('click', function() {
    // AJAX request to server
    alert('This will upload file to server');
});

</script>
</body>

</html>
        