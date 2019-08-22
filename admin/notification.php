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
                        <h4 class="page-title"> <a href="index.php">Notification</a></h4>
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
                <div class="row"><div class="col-sm-12"><h3>choose group or Individual to send notification</h3></div>
				 <div class="col-lg-3 col-md-3  col-sm-4 col-xs-12 inbox-panel">
				 
				 <table  class='approvest' >
				 <tr>
				 <td style="border:none">
				   <a class="btn btn-custom btn-block waves-effect waves-light"> <input type="checkbox" data-toggle="collapse" data-target="#group"> &nbsp Group</a>
				   </td>
				   <td style="border:none">
				   <a class="btn btn-custom btn-block waves-effect waves-light"><input type="checkbox" data-toggle="collapse" data-target="#indujual"> &nbsp Individual </a></div>
				   </td>
				   </tr>
				   </table>
				   
				   <br>
				</div>
				<br><br>
				<div class="col-md-12">		
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
                                    	Content
                                   	 	</label><br>
                                    <textarea name="message" value="" rows="4" cols="50"id="message"></textarea>
                                   <div>
                                       <div><span id="remaining"style="color:red">160</span>&nbsp;Character<span class="cplural">s</span> Remaining</div>
                             <div>Total&nbsp;<span id="messages"style="color:red">1</span>&nbsp;SMS<span class="mplural">s</span>&nbsp;<span id="total" style="color:red">0</span>&nbsp;Character<span class="tplural">s</span></div>
                              </div></div>
									<div class="form-group">
                                		<label>
                                    	Choose Image
                                   	 	</label>
                                    	<div class="file-upload">
                                 <div class="file-select">
                                    <input type="file" name="chooseFile" id="chooseFile">
                                             </div>
                                          </div>
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
                                    	Content
                                   	 	</label><br>
                                    <textarea name="message" value="" rows="4" cols="40"id="message"></textarea>
                                   <div>
                                       <div><span id="remaining"style="color:red">160</span>&nbsp;Character<span class="cplural">s</span> Remaining</div>
                             <div>Total&nbsp;<span id="messages"style="color:red">1</span>&nbsp;SMS<span class="mplural">s</span>&nbsp;<span id="total" style="color:red">0</span>&nbsp;Character<span class="tplural">s</span></div>
                              </div></div>
									<div class="form-group">
                                		<label>
                                    	Choose Image
                                   	 	</label>
                                    	<div class="file-upload">
                                 <div class="file-select">
                                    <input type="file" name="chooseFile" id="chooseFile">
                                             </div>
                                          </div>
                                 </div>

									<a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> Submit</a>
				 
                                	</div></form>        </div></div></div></div></div>

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
