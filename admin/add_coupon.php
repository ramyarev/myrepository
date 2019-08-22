<?php

ob_start();
session_start();
require('../config.php');

if($_SESSION['adminid']=='')
{
header('location:../adminlogin.php');
}

if($_POST['save']=='Save')
{
	
	$coupon_name=$_POST['coupon_name'];
	$code=$_POST['code'];
	$type=$_POST['type'];
	$discount=$_POST['discount'];
	$total_amount=$_POST['total_amount'];
	$customer_login=$_POST['customer_login'];
	$product=$_POST['product'];
	$expproduct=implode(",",$product);
	
	$category=$_POST['category'];
	$start_date=$_POST['start_date'];
	$end_date=$_POST['end_date'];
	$uses_per_coupon=$_POST['uses_per_coupon'];
	$uses_per_customer=$_POST['uses_per_customer'];
	$status=$_POST['status'];
	
	
	if($_GET['id']=='')
	{
		
		mysqli_query($conn,"insert into tbl_coupons (coupon_name,code,type,discount,total_amount,customer_login,product,category,start_date,end_date,uses_per_coupon,uses_per_customer,status) values('".$coupon_name."','".$code."','".$type."','".$discount."','".$total_amount."','".$customer_login."','".$expproduct."','".$category."','".$start_date."','".$end_date."','".$uses_per_coupon."','".$uses_per_customer."','".$status."')");
	}
	else
	{
		
		mysqli_query($conn,"update tbl_coupons set coupon_name='".$coupon_name."',code='".$code."',type='".$type."',discount='".$discount."',total_amount='".$total_amount."',customer_login='".$customer_login."',product='".$expproduct."',category='".$category."',start_date='".$start_date."',end_date='".$end_date."',uses_per_coupon='".$uses_per_coupon."',uses_per_customer='".$uses_per_customer."',status='".$status."' where id='".$_GET['id']."'");
	}
	
	
	header("Location:coupons.php");
	
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
                        <h4 class="page-title"> <a href="index.php">Coupons</a></h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> <!--a href="https://themeforest.net/item/elite-admin-responsive-dashboard-web-app-kit-/16750820" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy Now</a-->
                        <ol class="breadcrumb">
                            <form role="search" class="app-search hidden-xs">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                       
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
				<form method="post">
                   <!--row -->
                <div class="row">
				 <div class="col-lg-2 col-md-3  col-sm-4 col-xs-12 inbox-panel">
				 <table  class='approvest'>
				 <tr>
				 <td>
				 <input type="submit" name="save" id="save" class="fa fa-floppy-o btn btn-custom btn-block waves-effect waves-light" style="height:38px;padding:1px 12px" aria-hidden="true" value="Save">
				  
				   </td>
				   <td>
				   <a href="coupons.php" class="btn btn-custom btn-block waves-effect waves-light"><i class="fa fa-reply" aria-hidden="true"></i> &nbsp Back</a></div>
				   </td>
				   </tr>
				   </table>
				   
				   <br>
				</div>
				<br><br>
                   <div class="col-sm-12">
				   
                        <div class="white-box" class="col-sm-12">
                            <!--div class="r-icon-stats"-->
							<div style="overflow-x:auto;">
							<?php
							$fetchdata=mysqli_fetch_array(mysqli_query($conn,"select * from tbl_coupons where id='".$_GET['id']."'"));
							?>
							<div class="form-group">
                                		<label>
                                    		Coupon Name
											</label>
                                    	<input type="text" required class="form-control" data-validetta="required" value="<?php echo $fetchdata['coupon_name'] ?>" name="coupon_name" id="coupon_name">
                                	</div>
                                    <div class="form-group">
                                		<label>
                                    		Code
											</label>
                                    	<input type="text" class="form-control" required data-validetta="required" value="<?php echo $fetchdata['code'] ?>" name="code" id="code">
                                	</div>
                                    
                                    <!-- mobile pic here -->
                                    <div class="form-group">
                                		<label>
                                    		Type
                                   	 	</label>
                                    	<select class="form-control" data-validetta="required" name="type" id="type">
                                        <option value="percentage">Percentage</option>
                                        	<option value="fixed">Fixed Amount</option>
										</select>
										<script>
										document.getElementById('').value="<?php echo $fetchdata['type'] ?>";
										</script>
											
                                	</div>
                                    <div class="form-group">
                                		<label>
                                    	Discount
                                   	 	</label>
                                    	<input type="text" class="form-control" data-validetta="required" name="discount" id="discount" value="<?php echo $fetchdata['discount'] ?>">
                                	</div>
									<div class="form-group">
                                		<label>
                                    	Total Amount
                                   	 	</label>
                                    	<input type="text" class="form-control" data-validetta="required" name="total_amount" id="total_amount" value="<?php echo $fetchdata['total_amount'] ?>">
                                	</div>
									<div class="form-group">
                                		<label>
                                    	Customer Login &nbsp <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Customer must be logged in to use the coupons" style="color:#01c0c8;"></i> &nbsp 

                                   	 	</label>
                                    	<?php 
										if($fetchdata['customer_login']==1)
										{
											$yes='checked';
											$no='';
										}
										else
										{
											$yes='';
											$no='checked';
										}
										?>
                                        <label class="radio-inline">
                                        <input type="radio" name="customer_login" id="customer_login" value="1" <?php echo $yes; ?>>
                                               Yes  </label>
                                            <label class="radio-inline">
                                        <input type="radio" name="customer_login" id="customer_login" value="0" <?php echo $no; ?>>
                                          No  </label>
                                	</div>
                                    <div class="form-group">
                                		<label>
                                    	Product
                                   	 	</label>
										<select class="form-control" data-validetta="required" name="product[]" id="product" multiple>
										<?php $query=mysqli_query($conn,"select * from tbl_plan where delete_status=0"); 
										while($fetchplan=mysqli_fetch_array($query))
										{
										?>
										<option value="<?php echo $fetchplan['id']; ?>"><?php echo $fetchplan['plan_name']; ?></option>
										<?php } ?>
										</select>
										<script>
										var values="<?php echo $fetchdata['product']; ?>";
											$.each(values.split(","), function(i,e){
												$("#product option[value='" + e + "']").prop("selected", true);
											});
										</script>
                                    	
                                	</div>
                                    <!--<div class="form-group">
                                		<label>
                                    	Category
                                   	 	</label>
                                    	<input type="text" class="form-control" data-validetta="required" value="<?php //echo $fetchdata['category'] ?>" name="category" id="category">
                                	</div>-->
                                    <div class="form-group">
                                		<label>
                                    	Date Start
                                   	 	</label>
                                    	<input type="date" class="form-control" data-validetta="required" value="<?php echo $fetchdata['start_date'] ?>" name="start_date" id="start_date">
                                	</div>
                                    <div class="form-group">
                                		<label>
                                    	Date End
                                   	 	</label>
                                    	<input type="date" class="form-control" data-validetta="required" value="<?php echo $fetchdata['end_date'] ?>" name="end_date" id="end_date">
                                	</div>
                                    <div class="form-group">
                                		<label>
                                    	Uses Per Coupon &nbsp <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="The maximum number of times the coupon can be used by any customer. Leave blank for unlimited" style="color:#01c0c8;"></i> &nbsp 
                                   	 	</label>
                                    	<input type="text" class="form-control" data-validetta="required" value="<?php echo $fetchdata['uses_per_coupon'] ?>" name="uses_per_coupon" id="uses_per_coupon">
                                	</div>
                                    <div class="form-group">
                                		<label>
                                    	Uses Per Customer &nbsp <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="The maximum number of times the coupon can be used by a single customer. Leave blank for unlimited" style="color:#01c0c8;"></i> &nbsp 
                                   	 	</label>
                                    	<input type="text" class="form-control" data-validetta="required" value="<?php echo $fetchdata['uses_per_customer'] ?>" name="uses_per_customer" id="uses_per_customer">
                                	</div>
                                    
                                    <div class="form-group">
                                		<label>
                                    	Status
                                   	 	</label>
                                    	<select class="form-control" data-validetta="required" name="status" id="status">
                                       <option value="enable">Enable</option>
                                    	<option value="disable" >Disable</option>
                                       
                                        </select>
										<script>
										document.getElementById('status').value="<?php echo $fetchdata['status'] ?>";</script>
											
                                	</div>
                                    
									</form>
							</div>
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

					td, th {
					  border: 1px solid #dddddd;
					  text-align: left;
					  padding: 8px;
					}
					thead {
						background: #01c0c8;
						color:#fff;
					}

					tr:nth-child(even) {
					  background-color: #dddddd;
					}
					
					.approvest {
					  font-family: arial, sans-serif;
					  border-collapse: collapse;
					  width: 100%;
					}

					td, th {
					  border: none;
					  text-align: left;
					  padding: 8px;
					}

					tr:nth-child(even) {
					  background-color: #dddddd;
					}
					table.dataTable thead .sorting {
						background-image:none;
						color: #fff;
					}
					table.dataTable thead .sorting_asc {
						background-image:none;
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
