<?php

ob_start();
session_start();
require('../config.php');

if($_SESSION['adminid']=='')
{
header('location:../adminlogin.php');
}

if($_POST['submit']=='Submit')
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$designation=$_POST['designation'];
	if($_GET['id']=='')
	{
		mysqli_query($conn,"insert into tbl_adminlogin (username,password,designation) values ('".$username."','".$password."','".$designation."')");
	}
	else
	{
		mysqli_query($conn,"update tbl_adminlogin set username='".$username."',password='".$password."',designation='".$designation."' where id='".$_GET['id']."'");
	}
	header('location:admin_login.php');
}

if($_GET['did']!='')
{
	mysqli_query($conn,"delete from tbl_adminlogin where id='".$_GET['did']."'");
	header('location:admin_login.php');
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
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/icon.png">
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
<script>
(function($) {
    $(function() {
        $('.test').fSelect();
    });
})(jQuery);
</script>
<script>
$(document).ready(function(){
 
    part1Count = 160;
    part2Count = 145;
    part3Count = 152;
 
    $('#message').keyup(function(){
        var chars = $(this).val().length;
            messages = 0;
            remaining = 0;
            total = 0;
        if (chars <= part1Count) {
            messages = 1;
            remaining = part1Count - chars;
        } else if (chars <= (part1Count + part2Count)) { 
            messages = 2;
            remaining = part1Count + part2Count - chars;
        } else if (chars > (part1Count + part2Count)) { 
            moreM = Math.ceil((chars - part1Count - part2Count) / part3Count) ;
            remaining = part1Count + part2Count + (moreM * part3Count) - chars;
            messages = 2 + moreM;
        }
        $('#remaining').text(remaining);
        $('#messages').text(messages);
        $('#total').text(chars);
        if (remaining > 1) $('.cplural').show();
            else $('.cplural').hide();
        if (messages > 1) $('.mplural').show();
            else $('.mplural').hide();
        if (chars > 1) $('.tplural').show();
            else $('.tplural').hide();
    });
    $('#message').keyup();
});
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
                        <h4 class="page-title"> <a href="index.php">Admin Login</a></h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> <!--a href="https://themeforest.net/item/elite-admin-responsive-dashboard-web-app-kit-/16750820" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy Now</a-->
                        <ol class="breadcrumb">
                            <form role="search" class="app-search hidden-xs">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                       
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
               
				<br><br>
				<div class="col-md-12">		
   
	  <div class="white-box">	
                <form method="post">	
					<?php 
					$fetch= mysqli_fetch_array(mysqli_query($conn,"select * from tbl_adminlogin where id='".$_GET['id']."'"));
					?>				
						<div class="from-group">
						<label> User Name</label>
						<input class="form-control" type="text" name="username" id="username"  value="<?php echo $fetch['username']; ?>" >
						
						</div>
						
						<div class="from-group">
						<label> Password</label>
						<input class="form-control" type="text" name="password" id="password" value="<?php echo $fetch['password'] ?>">
						
						</div>
						<br>
						
						
							<div class="form-group">
                                		<label>
                                    	Staff Destination
                                   	 	</label>
                                    	<select class="form-control" data-validetta="required" name="designation" id="designation">
										<option>-select-</option>
                                       <option value="hr">Hr</option>
                                    	<option value="accounts" >Accounts</option>
                                         <option value="tele caller">Tele caller</option>
                                    	<option value="admin" >Admin</option>
										<option value="promotion">Promotion</option>
                                        </select>
										<script>
										document.getElementById('designation').value="<?php echo $fetch['designation']; ?>";
										</script>
											
                                	</div>
                                   <br>   <div class="from-group">    
								   <input type="submit" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:50px" name="submit" id="submit" value="Submit"> 
								   <input type="button" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:50px" name="cancel" id="cancel" value="Cancel" onclick="window.location.href='admin_login.php'"> 
				 </div> 
                                	</div></form>
									
									
                                    </div>
									
									<table  id="member" class="display" style="width:100%">
						
						  
							  <tr>
								<th>User Name</th>
								<th>Password</th>
								<th>Designation</th>								
								<th>Edit</th>
								<th>Delete</th>							
							  </tr>
							 
							  <tbody>
							  <?php 
								
								$query=mysqli_query($conn,"select * from tbl_adminlogin where delete_status=0");								
								
								while($fetchdata=mysqli_fetch_array($query))
								{
								?>
								<tr>
							  <tr>
							  
								<td><?php echo $fetchdata['username']; ?></td>								
								<td><?php echo $fetchdata['password']; ?></td>								
								<td><?php echo $fetchdata['designation']; ?></td>								
								<td><a href="admin_login.php?id=<?php echo $fetchdata['id']; ?>">Edit</a></td>								
								<td><a href="admin_login.php?did=<?php echo $fetchdata['id']; ?>">Delete</a></td>								
								</tr>
								
								<?php } ?>
								</tbody>
								</table>
									</div>
									

				 
                                	</div>       
									
</div>
				</div>
					</div>
                </div>
			
				<style>
				input[type="file"] {
					display: inline-block;
    border: 1px solid #bebebe;
}
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
	
</body>

</html>
