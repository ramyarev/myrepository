<?php

ob_start();
session_start();
require('../config.php');

if($_SESSION['adminid']=='')
{
header('location:../adminlogin.php');
}

if($_GET['action']=='active')
{
	
	$getid=explode(",",$_GET['id']);

	for($i=0;$i<=count($getid);$i++)
	{
		mysqli_query($conn,"update tbl_user set active='1' where user_id ='".$getid[$i]."'");
	}
	header('Location:unpaidmember.php');

}

if($_GET['action']=='inactive')
{
	
	$getid=explode(",",$_GET['id']);

	for($i=0;$i<=count($getid);$i++)
	{
		mysqli_query($conn,"update tbl_user set active='0' where user_id ='".$getid[$i]."'");

	}

	header('Location:unpaidmember.php');

}

if($_GET['action']=='delete')
{
	
	$getid=explode(",",$_GET['id']);
	for($i=0;$i<=count($getid);$i++)
	{
		mysqli_query($conn,"update tbl_user set delete_status='1' where user_id ='".$getid[$i]."'");

	}

	header('Location:unpaidmember.php');

}


if($_GET['action']=='suspended')
{
	
	$getid=explode(",",$_GET['id']);
	for($i=0;$i<=count($getid);$i++)
	{
		mysqli_query($conn,"update tbl_user set suspended='1' where user_id ='".$getid[$i]."'");

	}

	header('Location:unpaidmember.php');

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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
<script>

function suspended()
{
	var sThisVal='';
	$('input[class=checkbox]').each(function () {
    sThisVal +=','+ (this.checked ? $(this).val() : "");
	
});
var checkval=sThisVal.replace(/^,|,$/g,'');

window.location.href = $(location).attr("href")+'?id='+checkval+'&action=suspended';

}


$(document).ready(function() {
	
	$('#member').DataTable( {
		 "ordering": false
		  // "searching": false
		
	} );
} );

function openmodal(id) {
	
		$.ajax({
        url: 'ajaxupdown.php',
        type: 'GET',
        data: { id: id} ,
        contentType: 'application/json; charset=utf-8',
        success: function (response) {
			

            document.getElementById("result").innerHTML = response;
			document.getElementById('txtduration').style.visibility = "hidden";
			document.getElementById('txtnoofcontacts').style.visibility = "hidden";
			document.getElementById('txtnoofmessage').style.visibility = "hidden";
			document.getElementById('txtnoofprofile').style.visibility = "hidden";
			document.getElementById('txtamount').style.visibility = "hidden";
        },
        error: function () {
            alert("error");
        }
    }); 
         $('#myModal').modal('show');
}


function getplandetail(id)
	{
		
		$.ajax({
        url: 'ajaxgetplan.php',
        type: 'GET',
        data: { plan_id: id} ,
        contentType: 'application/json; charset=utf-8',
        success: function (response) {

			var res=response.split("~");
			document.getElementById('txtduration').style.visibility = "visible";
			document.getElementById('txtnoofcontacts').style.visibility = "visible";
			document.getElementById('txtnoofmessage').style.visibility = "visible";
			document.getElementById('txtnoofprofile').style.visibility = "visible";
			document.getElementById('txtamount').style.visibility = "visible";
			
			document.getElementById('duration').style.visibility = "visible";
			document.getElementById('noofcontacts').style.visibility = "visible";
			document.getElementById('noofmessage').style.visibility = "visible";
			document.getElementById('noofprofile').style.visibility = "visible";
			document.getElementById('amount').style.visibility = "visible";
			
			document.getElementById("duration").value = res[0];
			document.getElementById("noofcontacts").value = res[1];
			document.getElementById("noofmessage").value = res[2];
			document.getElementById("noofprofile").value = res[3];
			document.getElementById("amount").value = res[4];
			
			if(res[5]=="on")
			{
				document.getElementById("allowvideo").innerHTML="Yes";
			}
			else
			{
				document.getElementById("allowvideo").innerHTML="No";
			}
			
			if(res[6]=="on")
			{
				document.getElementById("allowchat").innerHTML="Yes";
			}
			else
			{
				document.getElementById("allowchat").innerHTML="No";
			}
        },
        error: function () {
            alert("error");
        }
    }); 
		
	}
</script>
<script>

function select_alls()
{
	
        if($("input[name='main_select']:checked").length==1){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
			
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
}
    
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });


function active()
{
	var sThisVal='';
	$('input[class=checkbox]').each(function () {
    sThisVal +=','+ (this.checked ? $(this).val() : "");
	
});
var checkval=sThisVal.replace(/^,|,$/g,'');

window.location.href = $(location).attr("href")+'?id='+checkval+'&action=active';

}

function inactive()
{
	
	var sThisVal='';
	$('input[class=checkbox]').each(function () {
    sThisVal +=','+ (this.checked ? $(this).val() : "");
	
});
var checkval=sThisVal.replace(/^,|,$/g,'');

window.location.href = $(location).attr("href")+'?id='+checkval+'&action=inactive';

}

function deletedata()
{
	var sThisVal='';
	$('input[class=checkbox]').each(function () {
    sThisVal +=','+ (this.checked ? $(this).val() : "");
	
});
var checkval=sThisVal.replace(/^,|,$/g,'');

window.location.href = $(location).attr("href")+'?id='+checkval+'&action=delete';

}
/*var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}*/
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
                        <h4 class="page-title"> <a href="index.php">Unpaid Member</a></h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> <!--a href="https://themeforest.net/item/elite-admin-responsive-dashboard-web-app-kit-/16750820" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy Now</a-->
                        <ol class="breadcrumb">
                            <form role="search" class="app-search hidden-xs">
                            <input type="text" placeholder="Search by Name / ID" class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                       
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--row -->
				
                <div class="row">
				 
				 <div class="col-lg-8 col-md-3  col-sm-4 col-xs-8 inbox-panel">
				<div style="overflow-x:auto;">
				 <table>
				 <tr>
				  <td>
				 <a href="members.php?type=all" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px" ><i class="fa fa-users" aria-hidden="true"></i> &nbsp All Member</a>
				 </td>
				 <td>
				 <a href="addmember.php" class="btn btn-custom_1 btn-block waves-effect waves-light" style="width:130px;height:36px"><i class="fa fa-user-plus" aria-hidden="true"></i> &nbsp Add Member</a>
				 </td>
				 
				   <td>
				 <a href="#" class="btn btn-custom_1 btn-block waves-effect waves-light" style="width:130px;height:36px"> <i class="fa fa-filter" aria-hidden="true"></i> &nbsp Filter Profile</a>
				 </td>
				 
				 </tr>
				 </table>
				
				   </div>
				   <br>
				</div>
				</div>
				<div class="row">
				 <div style="overflow-x:auto;">
				 <div class="col-lg-8 col-md-3  col-sm-4 col-xs-12 inbox-panel">
				<?php $getactiverow=mysqli_query($conn,"select* from tbl_user where active=1");
					$activerowcount=mysqli_num_rows($getactiverow);
					
					$getpaidrow=mysqli_query($conn,"select* from tbl_user where paid_status=1");
					$paidrowcount=mysqli_num_rows($getpaidrow);
					
					 $getinactiverow=mysqli_query($conn,"select* from tbl_user where active=0");
					$inactiverowcount=mysqli_num_rows($getinactiverow);
					
					 $getrow=mysqli_query($conn,"select* from tbl_user where delete_status=0");
					$rowcount=mysqli_num_rows($getrow);
					
					$getsuspendedrow=mysqli_query($conn,"select* from tbl_user where suspended=1");
					$suspendedrowcount=mysqli_num_rows($getsuspendedrow);
					
					
					$getallrow=mysqli_query($conn,"select* from tbl_user where delete_status=0");
					$premiumcount='';
					$i=1;
					while($fetchallrow=mysqli_fetch_array($getallrow)) {

					$getplanid=mysqli_fetch_array(mysqli_query($conn,"select plan_id from tbl_membership_user where user_id='".$fetchallrow['user_id']."' and status=0"));
			
					$getplanname=mysqli_fetch_array(mysqli_query($conn,"select category from tbl_plan where id='".$getplanid['plan_id']."' and delete_status=0"));
					
					
					if($getplanname['category']=='premium')
					{
						$premiumcount=+$i;
						$i++;
					}
					
					}
					
					$query=mysqli_query($conn,"select * from tbl_user where delete_status=0 and active=1 ");								
					$k=1;	
					$highlightercount='';					
					while($fetchdata=mysqli_fetch_array($query))
					{
						
					$getplan=mysqli_fetch_array(mysqli_query($conn,"select * from tbl_membership_user where user_id='".$fetchdata['user_id']."' "));
					
					$getplanid=$getplan['plan_id'];
					
					$profile_highlighter=mysqli_fetch_array(mysqli_query($conn,"select * from tbl_plan_feature where plan_id='".$getplanid."' and delete_status=0"));
					
					
					if($profile_highlighter['profile_highlighter']=='on')
					{
						$highlightercount=$k;
						$k++;
					}
					
					}
					
					
				?>
				 <table>
				 <tr>
				  <td>
				 <a  href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px" data-toggle="collapse" data-target="#demo">Active (<?php echo $activerowcount; ?>)</a>
				 </td>
				 <td>
				 <a href="#"  class="btn btn-custom btn-block waves-effect waves-light" style="width:130px;height:36px" data-toggle="collapse" data-target="#demo_1" >Paid (<?php echo $paidrowcount; ?>)</a>
				 </td>
				 
				  <td>
				 <a href="#"  class="btn btn-custom btn-block waves-effect waves-light" style="width:150px;height:36px" data-toggle="collapse_2" data-target="#demo_2">Profile Highlighter (<?php echo $highlightercount; ?>)</a>
				 </td>
				 <td>
				 <a href="#"  class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"   data-toggle="collapse" data-target="#demo_3">In Active (<?php echo $inactiverowcount; ?>)</a>
				 </td>
				 <td>
				 <a href="#"  class="btn btn-custom btn-block waves-effect waves-light" style="width:130px;height:36px" data-toggle="collapse" data-target="#demo_4" >Suspended (<?php echo $suspendedrowcount; ?>)</a>
				 </td>
				 
				  <td>
				 <a  href="#"  class="btn btn-custom btn-block waves-effect waves-light" style="width:130px;height:36px" data-toggle="collapse" data-target="#demo_5" >All (<?php echo $rowcount; ?>)</a>
				 </td>
				  <td>
				 <a  href="#"  class="btn btn-custom btn-block waves-effect waves-light" style="width:130px;height:36px" data-toggle="collapse" data-target="#demo_5" >Premium (<?php echo $premiumcount; ?>)</a>
				 </td>
				 </tr>
				 </table>
				
				   </div>
				   <br>
				</div>
				</div>
                   <div class="col-sm-12">
				   <div style="overflow-x:auto;">
                        <div class="white-box" >
                            <div>
                           <table  style="width:100%;">
						   
							  <tr>
							
								<th><a href="javascript:void(0)" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"><input type="checkbox" id="select_all" onclick="select_alls()" name="main_select" > &nbsp Select all</a></th>
								<th><a href="#" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="deletedata()"><i class="fa fa-trash-o" aria-hidden="true"></i> &nbsp Delete</a></th>
								<th><a href="#" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"><i class="fa fa-thumbs-up" aria-hidden="true"></i> &nbsp Active</a></th>
								<th><a href="#" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="inactive()"> <i class="fa fa-thumbs-down" aria-hidden="true"></i> &nbsp Inactive</a></th>
								<th><a href="#" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="suspended()"> <i class="fa fa-user-times" aria-hidden="true"></i> &nbsp Suspended</a></th>
							  </tr>
							 </table>
							 <table id="member" class="display" >
							  <thead>
							 <th></th>
							 <th></th>
							 <th></th>
							 <th></th>
							 <th></th>
							 </thead>
							  <tbody style="border: 0px solid #dddddd;">
							  <?php 
								$query=mysqli_query($conn,"select * from tbl_user where delete_status=0 and active=1 and paid_status=0");
								
								while($fetchdata=mysqli_fetch_array($query))
								{
									
									
								?>
								
								
								<tr>
							  
								<td><input type="checkbox" class="checkbox" value="<?php echo $fetchdata['user_id'] ?>"></td>
								<td style="border:0px solid #dddddd;border-bottom:1px solid grey;"><i class="fa fa-star" aria-hidden="true"></i></td>
								
								<td style="border:0px solid #dddddd;border-bottom:1px solid grey;">
								
								<table>
								<tr >
							<td>
	<?php 
	
	if($fetchdata['profile_image_approve']==0)
	{
		$watermark='opacity:0.2';
	}
	else
	{
		$watermark='opacity:1';
	}
	if($fetchdata['profile_image']!='') { 
	?>
	<div class="top-left">Nammamatrimony.in</div>
	<img src="../uploads/profile_image/<?php echo $fetchdata['profile_image']; ?>" width="150" height="150" style="<?php echo $watermark; ?>">
	
	<?php } else { ?>
	<img src="../images/noimage.jpg" width="100" height="100">
	<?php } ?>
	</td>
	<style>
	.top-left {
	  position: relative;
	  top: 75px;
		right: 49px;
	  color:grey;
	  transform:rotate(-90deg);
	}

	</style>
								
															
								<td style=" background: #fafafa;">
								
								<a href="#" class="btn btn-block waves-effect waves-light" style="border-bottom: 1px solid #bcbbbb;  "><i class="fa fa-picture-o"  aria-hidden="true" data-toggle="modal" data-target="#myModal"></i>
								<!-- Modal -->

 
 
							  </a>
							  <a href="#" class="btn btn-block waves-effect waves-light" style="border-bottom: 1px solid #bcbbbb;  "><i class="fa fa-asterisk" aria-hidden="true" data-toggle="modal" data-target="#myModal_1"></i>
															
							  </a>
															
								
						  </a></td></tr>
						  <!--<tr>
						  <td>
						 <a href="javascript:void(0)"  onclick="openmodal('<?php// echo $fetchdata['user_id'] ?>')"  class="btn btn-block waves-effect waves-light"style="border:1px solid #337ab7;"  id="myBtn" data-toggle="modal" data-target="#myModal"><i class="fa fa-thumbs-o-up"  aria-hidden="true" data-toggle="modal" data-target="#myModal_5"> &nbsp Member Plan</i>
						 
								</td>
								
								</tr>-->
								</table>
								
								
								<td style="border:0px solid #dddddd;border-bottom:1px solid grey;">
								<table>
								<tr>
								
								<td style="color:#767676;font-size:21px;border:0px solid #dddddd;text-transform: uppercase;" colspan="2">
								<b><?php echo $fetchdata['name'];?>(NM_<?php echo $fetchdata['user_id'];?>)</b>
								</td>
								</tr>
								
								<tr>
								<td style="border:0px solid #dddddd;">
								<b>Email:</b>
								</td>
								<td style="border:0px solid #dddddd;">
								<?php echo $fetchdata['email'];?>
								</td>
								</tr>
								<tr>
								<td style="border:0px solid #dddddd;">
								<b>Age:</b>
								</td>
								<td style="border:0px solid #dddddd;">
								<?php echo $fetchdata['age'];?> <b>Years</b>
								</td>
								</tr>
								<tr>
								<td style="border:0px solid #dddddd;">
								<b>Location:</b>
								</td>
								<td style="border:0px solid #dddddd;">
								<?php $fetchcity=mysqli_fetch_array(mysqli_query($conn,"select * from tbl_city where id='".$fetchdata['home_city']."'"));
								echo $fetchcity['city'];?>, <?php $fetchstate=mysqli_fetch_array(mysqli_query($conn,"select * from tbl_state where id='".$fetchdata['state']."'"));
								echo $fetchstate['state'];?>, <?php echo $fetchdata['country'];?>
								</td>
								</tr>
								<tr>
								<td style="border:0px solid #dddddd;">
								<b>Education:</b>
								</td>
								<td style="border:0px solid #dddddd;">
								<?php echo $fetchdata['education'];?>
								</td>
								</tr>
								<tr>
								<td style="border:0px solid #dddddd;">
								<b>Gender:</b>
								</td>
								<td style="border:0px solid #dddddd;"><?php echo $fetchdata['gender'];?></td>
								</tr>
								
								<tr>
								<td style="border:0px solid #dddddd;">
								<b style="color:red">Regitered On:</b>
								</td>
								<td style="border:0px solid #dddddd;color:red"><?php echo $fetchdata['profile_created_by'];?></td>
								</tr>
								
								<tr>
								<td style="border:0px solid #F0C675;"><a href="analyze.php?id=<?php echo $fetchdata['user_id']; ?>" class="btn btn-custom btn-block waves-effect waves-light" style="background-color:#01c0c8;">Analyze</a></td>
								<td style="border:0px solid #3ECD7B;"><a href="viewdetail.php?id=<?php echo $fetchdata['user_id']; ?>" class="btn btn-custom btn-block waves-effect waves-light" style="background-color:#34c0c6;">Edit / View Profile</a></td>
								
								</tr>
								</td>
								</table>
								
								<td style="border:0px solid #dddddd;border-bottom:1px solid grey">
								<table style="border:0px solid #dddddd;">
								<tr>
								<td style="border:0px solid #dddddd;"></td>
								<td colspan="2" style="color:#767676;font-size:20px;border:0px solid #dddddd;text-transform:uppercase;">
								<i class="fa fa-thumbs-up" aria-hidden="true" style="color:#05b674;"></i> &nbsp <?php 
								 echo "UN PAID"; 
								?>
								</td>
								</tr>
								
								<tr>
								<td style="border:0px solid #dddddd;"><b>Mobile Number:</b></td>
								<td style="border:0px solid #dddddd;" ><?php echo $fetchdata['mobile_number'];?></td>
								</tr>
								<tr>
								<td style="border:0px solid #dddddd;"><b>Mother Tongue:</b></td>
								<td style="border:0px solid #dddddd;" ><?php echo $fetchdata['mother_tongue'];?></td>
								</tr>
								<tr>
								<td style="border:0px solid #dddddd;"><b>Religion:</b></td>
								<td style="border:0px solid #dddddd;"><?php echo $fetchdata['religion'];?></td>
								</tr>
								
								<tr>
								<td style="border:0px solid #dddddd;">
								<b>State:</b>
								</td>
								<td style="border:0px solid #dddddd;">
								<?php

								$getstate=mysqli_fetch_array(mysqli_query($conn,"select state  from tbl_state where id='".$fetchdata['state']."'"));	
								echo $getstate['state'];?>
								</td>
								</tr>
								<tr>
								<td style="border:0px solid #dddddd;"><b>Caste:</b></td>
								<td style="border:0px solid #dddddd;"><?php

								$getcaste=mysqli_fetch_array(mysqli_query($conn,"select caste  from tbl_caste where id='".$fetchdata['caste']."'"));	
								echo $getcaste['caste'];?> </td>
								</tr>
								<tr>
								
								<td style="border:0px solid #dddddd;"><b>Last Login: </b></td>
								<td style="border:0px solid #dddddd;"><?php echo $fetchdata['lastlogin'];?></td>
								</tr>
								<tr>
								
								<td style="border:0px solid #1397C3;"><a href="view and add comments.php?id=<?php echo $fetchdata['user_id']; ?>" class="btn btn-custom btn-block waves-effect waves-light" style="background-color:#5bd2d7;">View & Add Comments</a></td>
								
								
									<?php 
	
	$user_id=$fetchdata['user_id'];
	
		$fetchgender=mysqli_fetch_array(mysqli_query($conn,"select * from tbl_user where user_id='".$user_id."'"));

                                $gender=$fetchgender['gender'];
                                
                                
	$todaydata=mysqli_query($conn,"SELECT * FROM tbl_user WHERE (gender = (select gender from tbl_partners WHERE user_id='".$user_id."') or (age >= (select min_age from tbl_partners WHERE user_id='".$user_id."') and age <= (select max_age from tbl_partners WHERE user_id='".$user_id."')) or ( feet_inch >= (select min_feet_inch from tbl_partners WHERE user_id='".$user_id."') and feet_inch <= (select max_feet_inch from tbl_partners WHERE user_id='".$user_id."')) or ( weight >= (select min_weight from tbl_partners WHERE user_id='".$user_id."')  and weight <= (select max_weight from tbl_partners WHERE user_id='".$user_id."')) or caste = (select caste from tbl_partners WHERE user_id='".$user_id."') or sub_caste = (select sub_caste from tbl_partners WHERE user_id='".$user_id."') or marital_status = (select marital_status  from tbl_partners WHERE user_id='".$user_id."') or mother_tongue = (select mother_tongue  from tbl_partners WHERE user_id='".$user_id."') or raasi = (select raasi  from tbl_partners WHERE user_id='".$user_id."') or star = (select natchathiram  from tbl_partners WHERE user_id='".$user_id."') or having_dosham = (select having_dosham  from tbl_partners WHERE user_id='".$user_id."') or dosham_details = (select dosham  from tbl_partners WHERE user_id='".$user_id."') or occupation = (select profession  from tbl_partners WHERE user_id='".$user_id."') or physical_status = (select physical_status  from tbl_partners WHERE user_id='".$user_id."') or nationality = (select nationality  from tbl_partners WHERE user_id='".$user_id."') or  country = (select country  from tbl_partners WHERE user_id='".$user_id."') or home_city = (select preferred_cities  from tbl_partners WHERE user_id='".$user_id."') or paadham = (select paadham  from tbl_partners WHERE user_id='".$user_id."') or education = (select education  from tbl_partners WHERE user_id='".$user_id."') or  state = (select state from tbl_partners WHERE user_id='".$user_id."') ) and weight!='' and feet_inch!='' and age!=0 and user_id!='".$user_id."' and delete_status=0 and gender!='".$gender."' and DATE(profile_created_by) = CURDATE() order by profile_created_by desc");
	
	$todaycount=mysqli_num_rows($todaydata);
	
									
	$premiumdata1=mysqli_query($conn,"SELECT * FROM tbl_user WHERE (gender = (select gender from tbl_partners WHERE user_id='".$user_id."') or (age >= (select min_age from tbl_partners WHERE user_id='".$user_id."') and age <= (select max_age from tbl_partners WHERE user_id='".$user_id."')) or ( feet_inch >= (select min_feet_inch from tbl_partners WHERE user_id='".$user_id."') and feet_inch <= (select max_feet_inch from tbl_partners WHERE user_id='".$user_id."')) or ( weight >= (select min_weight from tbl_partners WHERE user_id='".$user_id."')  and weight <= (select max_weight from tbl_partners WHERE user_id='".$user_id."')) or caste = (select caste from tbl_partners WHERE user_id='".$user_id."') or sub_caste = (select sub_caste from tbl_partners WHERE user_id='".$user_id."') or marital_status = (select marital_status  from tbl_partners WHERE user_id='".$user_id."') or mother_tongue = (select mother_tongue  from tbl_partners WHERE user_id='".$user_id."') or raasi = (select raasi  from tbl_partners WHERE user_id='".$user_id."') or star = (select natchathiram  from tbl_partners WHERE user_id='".$user_id."') or having_dosham = (select having_dosham  from tbl_partners WHERE user_id='".$user_id."') or dosham_details = (select dosham  from tbl_partners WHERE user_id='".$user_id."') or occupation = (select profession  from tbl_partners WHERE user_id='".$user_id."') or physical_status = (select physical_status  from tbl_partners WHERE user_id='".$user_id."') or nationality = (select nationality  from tbl_partners WHERE user_id='".$user_id."') or  country = (select country  from tbl_partners WHERE user_id='".$user_id."') or home_city = (select preferred_cities  from tbl_partners WHERE user_id='".$user_id."') or paadham = (select paadham  from tbl_partners WHERE user_id='".$user_id."')  or education = (select education  from tbl_partners WHERE user_id='".$user_id."') or  state = (select state from tbl_partners WHERE user_id='".$user_id."') ) and weight!='' and feet_inch!='' and age!=0 and user_id!='".$user_id."' and delete_status=0 and gender!='".$gender."'  order by profile_created_by desc");
	
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
	
	$totalmatches=$todaycount+$premiumcount+$recommandcount+$locationcount+$educationcount+$professioncount+$starcount;
	?>
	
	<td style="border:0px solid #72C8D3;"><a href="matches.php?id=<?php echo $fetchdata['user_id']; ?>" class="btn btn-custom btn-block waves-effect waves-light" style="background-color:#54cace;">Matches(<?php echo $totalmatches; ?>)</a></td>
	<td style="border:0px solid #E27C6D;"><a href="details.php?id=<?php echo $fetchdata['user_id']; ?>" class="btn btn-custom btn-block waves-effect waves-light" style="background-color:#73c1c4;">Details</a></td>
	</tr>
								</table>
								</td>
								
								
							  </tr>
							  
								<?php  } ?>
							  </tbody>
							</table>
                        </div>
                    </div>
					
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" align="center">
    <div class="modal-dialog" align="center">
        <div class="modal-content" style="width:900px;margin-left: -189px;" align="center">
            <div class="modal-header" style="background-color:#01c0c8">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title" id="myModalLabel">Edit Plan</h4>

            </div>
			<form method="post">
            <div class="modal-body">
			<div id="result"></div>
			</div>
			
            <div class="modal-footer">
                <input type="button" name="paid" id="paid" class="btn btn-custom btn-block waves-effect waves-light" value="Close" data-dismiss="modal" style="width:100px;background-color:grey">
                <input type="submit" name="paid" id="paid" class="btn btn-custom btn-block waves-effect waves-light" value="Paid" style="width:100px;">
            </div>
			</form>
        </div>
    </div>
</div>
                </div>
				
				<!--Active-->
				<!--/Active-->
				
				
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
					  background-color: transparent;
					}
					.carousel-control.left {
						background-image: -webkit-linear-gradient(left,rgba(0,0,0,0) 0%,rgba(0,0,0,0.000));
    background-image: -o-linear-gradient(left,rgba(0,0,0,0) 0%,rgba(0,0,0,0.000) );
    background-image: linear-gradient(to right,rgba(0,0,0,0) 0%,rgba(0,0,0,0.000) );
    background-repeat: repeat-x;
					}
					.carousel-control.right {
						background-image: -webkit-linear-gradient(left,rgba(0,0,0,0) 0%,rgba(0,0,0,0.000));
    background-image: -o-linear-gradient(left,rgba(0,0,0,0) 0%,rgba(0,0,0,0.000) );
    background-image: linear-gradient(to right,rgba(0,0,0,0) 0%,rgba(0,0,0,0.000) );
    background-repeat: repeat-x;
					}
						table.dataTable.stripe tbody tr.odd, table.dataTable.display tbody tr.odd {
    background-color: #ffffff;
					}
    table.dataTable.hover tbody tr:hover, table.dataTable.display tbody tr:hover {
	background-color: #ffffff;
                    }
					</style>
               
            </div></div>
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
	<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
</body>

</html>
