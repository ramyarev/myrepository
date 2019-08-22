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
$(document).ready(function() {
	
	/* $('#member').DataTable( {
		 "ordering": false
		  // "searching": false
		
	} );
	 */
	$.ajax({
        url: 'ajaxfilter.php',
        type: 'GET',
        data: {type:'all'} ,
        contentType: 'application/json; charset=utf-8',
        success: function (response) {
			
            document.getElementById("result").innerHTML = response;
			$('#member').DataTable( {
		 "ordering": false
		  // "searching": false
		
	} );
        },
        error: function () {
            alert("error");
        }
    }); 
	
	
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

function getalldata(type)
{
	
	var start_date=document.getElementById('start_date').value;
	var end_date=document.getElementById('end_date').value;
	var age=document.getElementById('age').value;
	var marital_status=document.getElementById('marital_status').value;
	var height=document.getElementById('height').value;
	var physical_status=document.getElementById('physical_status').value;
	var weight=document.getElementById('weight').value;
	var education=document.getElementById('education').value;
	var min_income=document.getElementById('min_income').value;
	var max_income=document.getElementById('max_income').value;
	var occupation=document.getElementById('occupation').value;
	var religion=document.getElementById('religion').value;
	var caste=document.getElementById('caste').value;
	var sub_caste=document.getElementById('sub_caste').value;
	var star=document.getElementById('star').value;
	var raasi=document.getElementById('raasi').value;
	var dosham_details=document.getElementById('dosham_details').value;
	var family_type=document.getElementById('family_type').value;
	var no_of_siblings=document.getElementById('no_of_siblings').value;
	$.ajax({
        url: 'ajaxfilter.php',
        type: 'GET',
        data: {type:type,start_date:start_date,end_date:end_date,age:age,marital_status:marital_status,height:height,physical_status:physical_status,weight:weight,education:education,min_income:min_income,max_income:max_income,occupation:occupation,religion:religion,caste:caste,sub_caste:sub_caste,star:star,raasi:raasi,dosham_details:dosham_details,family_type:family_type,no_of_siblings:no_of_siblings} ,
        contentType: 'application/json; charset=utf-8',
        success: function (response) {
            document.getElementById("result").innerHTML = response;
        },
        error: function () {
            alert("error");
        }
    }); 
}

</script>
<script>
var slideIndex = 1;
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
                </ul>
            </div>
        </div>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"> <a href="index.php">All Member</a></h4>
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
				 
				 <div class="col-lg-4 col-md-3  col-sm-4 col-xs-8 inbox-panel">
				<div style="overflow-x:auto;">
				 <table>
				 <tr>
				  <td>
				 <a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="getalldata('bride')"><i class="fa fa-female" aria-hidden="true"></i> &nbsp Bride</a>
				 </td>
				 <td>
				 <a href="#" class="btn btn-custom btn-block waves-effect waves-light" style="width:130px;height:36px" onclick="getalldata('groom')"><i class="fa fa-male" aria-hidden="true"></i> &nbsp Groom</a>
				 </td>
				 
				   <!--td>
				 <a href="#" class="btn btn-custom_1 btn-block waves-effect waves-light" style="width:130px;height:36px"> <i class="fa fa-filter" aria-hidden="true"></i> &nbsp Filter Profile</a-->
				 </td-->
				 
				 </tr>
				 </table>
				
				   </div>
				   <br>
				</div>
				</div>
				<div class="row">
				<div class="col-lg-12 col-md-12">
				  <div style="overflow-x:auto;">
             <div class="white-box" >				  
				<div class="container">
            <div class="num_rows">
			
				<h4 style="color:#01c0c8;"><b>Registered On</b></h4>
				<div class="form-group"> 	<!--		Show Numbers Of Rows 		-->
			 		<label for="start">From date:</label>

                 <input style="padding: 5px;" type="date" id="start_date" name="start_date">
				 <label for="end">To date:</label>

                 <input style="padding: 5px;" type="date" id="end_date" name="end_date">
                 <a href="#" class="btn btn-custom btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="getalldata('date')"> &nbsp Submit</a>
                                
			  	</div>
				</div>
       <div class="tb_search">
		<div class="num_rows">
		
				<div class="form-group"> 
				<h4 style="color:#01c0c8;"><b>Activation Date</b></h4>
				<!--		Show Numbers Of Rows 		-->
			 		<select class  ="form-control" name="state"  id="maxRows" onchange="getalldata(this.value)">						 
						 <option value="" selected="selected"></option>
						 <option value="today" >Today</option>
						 <option value="yesterday">Yesterday</option>
						 <option value="lweek">7 days back</option>
						 <option value="lmonth">30 days back</option>
						 </select>
			 		
			  	</div>
        </div>
       </div>
	   </div>

 
                            	<div class="radio-inline" style="text-align:center">
								<h3 style="color:#01c0c8;"> <b>Basic Details </b></h3>
									  <input type="radio" id="basics" name="basics" onclick="basic('yes')">Yes &nbsp &nbsp &nbsp
									 
                                      <input type="radio" id="basics" name="basics" onclick="basic('no')">No
									
                            	
									</div>
									
									<script>
									function basic(method)
									{
										if(method=='yes')
										{
											document.getElementById('basic').style.display='block';
											document.getElementById('submitdata').style.display='block';
										}
										else
										{
											document.getElementById('basic').style.display='none';
										}
									}
									
									function education1(method)
									{
										if(method=='yes')
										{
											document.getElementById('edu').style.display='block';
											document.getElementById('submitdata').style.display='block';
										}
										else
										{
											document.getElementById('edu').style.display='none';
										}
									}
									
									function religion1(method)
									{
									
										if(method=='yes')
										{
											document.getElementById('religion').style.display='block';
											document.getElementById('submitdata').style.display='block';
										}
										else
										{
											document.getElementById('religion').style.display='none';
										}
									}
									function family(method)
									{
										if(method=='yes')
										{
											document.getElementById('family').style.display='block';
											document.getElementById('submitdata').style.display='block';
										}
										else
										{
											document.getElementById('family').style.display='none';
										}
									}
									</script>
									
									
		  
									<form method="post">
									<div id="basic" style="display:none">
									 <h3 style="color:#01c0c8;"><b>Basic Details</b></h3>
									 <div class="row">
									 <div class="col-md-6">
									 <div class="form-group">
                                		<label>
                                    		Age:
                                   	 	</label>
                                    	<input type="text" class="form-control" data-validetta="required" value="" name="age" id="age">
                                        <div id="email_status"></div>
                                	</div>
									<div class="form-group">
                                		<label>
                                    		Marital  Status:
                                   	 	</label>
                                    	<select class="form-control" data-validetta="required" name="marital_status" id="marital_status">
                                       <option value="">Select Your Marital Status</option>
                                    	<option value="unmarried" >Unmarried</option>
                                        <option value="married" >Married</option>
                                        <option value="divorced" >Divorced</option>
                                        <option value="widowed" >Widowed</option>
                                        <option value="others" >Others</option>
                                        </select>
											
                                	</div>

									<div class="form-group">
                                		<label>
                                    		Height:
                                   	 	</label>
                                    	<select class="form-control" data-validetta="required" name="height" id="height">
                                        <option value="">0ft 0in</option>
                                        	<option value="48">Below 4ft</option>

										<option value="4ft 06in">4ft 06in</option>
										<option value="4ft 07in">4ft 07in</option>
										<option value="4ft 08in">4ft 08in</option>
										<option value="4ft 09in">4ft 09in</option>
										<option value="4ft 10in">4ft 10in</option>
										<option value="4ft 11in">4ft 11in</option>
										<option value="5ft">5ft</option>
										<option value="5ft 01in">5ft 01in</option>
										<option value="5ft 02in">5ft 02in</option>
										<option value="5ft 03in">5ft 03in</option>
										<option value="5ft 04in">5ft 04in</option>
										<option value="5ft 05in">5ft 05in</option>
										<option value="5ft 06in">5ft 06in</option>
										<option value="5ft 07in">5ft 07in</option>
										<option value="5ft 08in">5ft 08in</option>
										<option value="5ft 09in">5ft 09in</option>
										<option value="5ft 10in">5ft 10in</option>
										<option value="5ft 11in">5ft 11in</option>
										<option value="6ft">6ft</option>
										<option value="6ft 01in">6ft 01in</option>
										<option value="6ft 02in">6ft 02in</option>
										<option value="6ft 03in">6ft 03in</option>
										<option value="6ft 04in">6ft 04in</option>
										<option value="6ft 05in">6ft 05in</option>
										<option value="6ft 06in">6ft 06in</option>
										<option value="6ft 07in">6ft 07in</option>
										<option value="6ft 08in">6ft 08in</option>
										<option value="6ft 09in">6ft 09in</option>
										<option value="6ft 10in">6ft 10in</option>
										<option value="6ft 11in">6ft 11in</option>
										<option value="7ft">7ft</option>
										<option value="Above 7ft">Above 7ft</option>
                                        </select>
											
                                	</div>
                                    </div>
                                    <!-- religion here -->
									<div class="col-md-6">
									<div class="form-group">
                                		<label>
                                    		Physical Status
                                   	 	</label>
                                    	<select class="form-control" id="physical_status" name="physical_status">
                                        <option value="normal" >Normal</option>
                                        <option value="physically challenged" >Physically Challenged</option>
                                        <option value="does not matter" >Does not Matter</option>
                                         </select>
                                	</div>
									<div class="form-group">
                                		<label>
                                    		Weight:
                                   	 	</label>
                                    	<select class="form-control" name="weight" id="weight" data-validetta="required">
                                         <option value="">  Kg</option>
                                         	<option value="40">40 Kg</option>
                                            <option value="41">41 Kg</option>
                                            <option value="42">42 Kg</option>
                                            <option value="43">43 Kg</option>
                                            <option value="44">44 Kg</option>
                                            <option value="45">45 Kg</option>
                                            <option value="46">46 Kg</option>
                                            <option value="47">47 Kg</option>
                                            <option value="48">48 Kg</option>
                                            <option value="49">49 Kg</option>
                                            <option value="50">50 Kg</option>
                                            <option value="51">51 Kg</option>
                                            <option value="52">52 Kg</option>
                                            <option value="53">53 Kg</option>
                                            <option value="54">54 Kg</option>
                                            <option value="55">55 Kg</option>
                                            <option value="56">56 Kg</option>
                                            <option value="57">57 Kg</option>
                                            <option value="58">58 Kg</option>
                                            <option value="59">59 Kg</option>
                                            <option value="60">60 Kg</option>
                                            <option value="61">61 Kg</option>
                                            <option value="62">62 Kg</option>
                                            <option value="63">63 Kg</option>
                                            <option value="64">64 Kg</option>
                                            <option value="65">65 Kg</option>
                                            <option value="66">66 Kg</option>
                                            <option value="67">67 Kg</option>
                                            <option value="68">68 Kg</option>
                                            <option value="69">69 Kg</option>
                                            <option value="70">70 Kg</option>
                                            <option value="71">71 Kg</option>
                                            <option value="72">72 Kg</option>
                                            <option value="73">73 Kg</option>
                                            <option value="74">74 Kg</option>
                                            <option value="75">75 Kg</option>
                                            <option value="76">76 Kg</option>
                                            <option value="77">77 Kg</option>
                                            <option value="78">78 Kg</option>
                                            <option value="79">79 Kg</option>
                                            <option value="80">80 Kg</option>
                                            <option value="81">81 Kg</option>
                                            <option value="82">82 Kg</option>
                                            <option value="83">83 Kg</option>
                                            <option value="84">84 Kg</option>
                                            <option value="85">85 Kg</option>
                                            <option value="86">86 Kg</option>
                                            <option value="87">87 Kg</option>
                                            <option value="88">88 Kg</option>
                                            <option value="89">89 Kg</option>
                                            <option value="90">90 Kg</option>
                                            <option value="91">91 Kg</option>
                                            <option value="92">92 Kg</option>
                                            <option value="93">93 Kg</option>
                                            <option value="94">94 Kg</option>
                                            <option value="95">95 Kg</option>
                                            <option value="96">96 Kg</option>
                                            <option value="97">97 Kg</option>
                                            <option value="98">98 Kg</option>
                                            <option value="99">99 Kg</option>
                                            <option value="100">100 Kg</option>
                                            <option value="101">101 Kg</option>
                                            <option value="102">102 Kg</option>
                                            <option value="103">103 Kg</option>
                                            <option value="104">104 Kg</option>
                                            <option value="105">105 Kg</option>
                                            <option value="106">106 Kg</option>
                                            <option value="107">107 Kg</option>
                                            <option value="108">108 Kg</option>
                                            <option value="109">109 Kg</option>
                                            <option value="110">110 Kg</option>
                                            <option value="111">111 Kg</option>
                                            <option value="112">112 Kg</option>
                                            <option value="113">113 Kg</option>
                                            <option value="114">114 Kg</option>
                                            <option value="115">115 Kg</option>
                                            <option value="116">116 Kg</option>
                                            <option value="117">117 Kg</option>
                                            <option value="118">118 Kg</option>
                                            <option value="119">119 Kg</option>
                                            <option value="120">120 Kg</option>
                                            <option value="121">121 Kg</option>
                                            <option value="122">122 Kg</option>
                                            <option value="123">123 Kg</option>
                                            <option value="124">124 Kg</option>
                                            <option value="125">125 Kg</option>
                                            <option value="126">126 Kg</option>
                                            <option value="127">127 Kg</option>
                                            <option value="128">128 Kg</option>
                                            <option value="129">129 Kg</option>
                                            <option value="130">130 Kg</option>
                                            <option value="131">131 Kg</option>
                                            <option value="132">132 Kg</option>
                                            <option value="133">133 Kg</option>
                                            <option value="134">134 Kg</option>
                                            <option value="135">135 Kg</option>
                                            <option value="136">136 Kg</option>
                                            <option value="137">137 Kg</option>
                                            <option value="138">138 Kg</option>
                                            <option value="139">139 Kg</option>
                                            <option value="140">140 Kg</option>
                                         
                                    </select>
                           </div>				 				 
				 </div>
				 <div  class="row col-md-12" id="addfamily">
                            	<div class="radio-inline" style="text-align:center">
								<h3 style="color:#01c0c8;"> <b>Education Details </b></h3>
									  <input type="radio" id="educat" name="educat" onclick="education1('yes')">Yes &nbsp &nbsp &nbsp
									 
                                      <input type="radio" id="educat" name="educat" onclick="education1('no')">No
									
                            	
									</div>
									
									
									</div> 
									
                            </div></div>
                  
				  
				   <div id="edu" style="display:none">
				  
				 <div class="row">
				 <div class="col-md-6">
				 <div class="form-group">
                                		<label>
                                    		Education:
                                   	 	</label>
                                    	<select class="chosen-select form-control" name="education" id="education" data-validetta="required"  data-placeholder="Select Education">
                                        
									  <option value="b.arch" >B.ARCH</option>
									  <option value="bca" >BCA</option>
									  <option value="be" >BE</option>
									  <option value="b.plan" >B.PLAN</option>
									  <option value="b.sc it/computer science" >B.sc IT/Computer science</option>
									  <option value="b.tech" >B.TECH</option>
									  <option value="m.arch" >M.ARCH</option>
									  <option value="mca" >MCA</option>
									  <option value="me" >ME</option>
									  <option value="m.sc it/ computer science" >M.sc IT/ Computer science</option>
									  <option value="m.s (engg)" >M.S (ENGG)</option>
									  <option value="m.tech" >M.TECH</option>
									  <option value="pgdca" >PGDCA</option>
									  <option value="b.a" >B.A</option>
									  <option value="b.com" >B.Com</option>
									  <option value="b.ed" >B.Ed</option>
									  <option value="bfa" >BFA</option>
									  <option value="bft" >BFT</option>
									  <option value="blis" >BLIS</option>
									  <option value="bmm" >BMM</option>
									  <option value="b.sc" >B.Sc</option>
									  <option value="b.s.w" >B.S.W</option>
									  <option value="b.phil" >B.PHIL</option>
									  <option value="m.a" >M.A</option>
									  <option value="m.com" >M.Com</option>
									  <option value="m.ed" >M.Ed</option>
									  <option value="mfa" >MFA</option>
									  <option value="mlis" >MLIS</option>
									  <option value="m.sc" >M.Sc</option>
									  <option value="msw" >MSW</option>
									  <option value="m.phil" >M.Phil</option>
									  <option value="bba" >BBA</option>
									  <option value="bfm" >BFM</option>
									  <option value="bhm" >BHM</option>
									  <option value="mba" >MBA</option>
									  <option value="mfm" >MFM</option>
									  <option value="mhm" >MHM</option>
									  <option value="mhrm" >MHRM</option>
									  <option value="bca" >BCA</option>
									  <option value="pgdm" >PGDM</option>
									  <option value="b.a.m.s" >B.A.M.S</option>
									  <option value="bds" >BDS</option>
									  <option value="bhms" >BHMS</option>
									  <option value="bsms" >BSMS</option>
									  <option value="b.pharm" >B.PHARM</option>
									  <option value="bpt" >BPT</option>
									  <option value="bhms" >BUMS</option>
									  <option value="bvsc" >BVSC</option>
									  <option value="mbbs" >MBBS</option>
									  <option value="b.sc (nursing)" >B.SC (Nursing)</option>
									  <option value="mds" >MDS</option>
									  <option value="md/ms (medical)" >MD/MS (MEDICAL)</option>
									  <option value="m.pharm" >M.Pharm</option>
									  <option value="mpt" >MPT</option>
									  <option value="mvsc" >MVSC</option>
									  <option value="bgl" >BGL</option>
									  <option value="b.l" >B.L</option>
									  <option value="llb" >LLB</option>
									  <option value="l.l.m" >L.L.M</option>
									  <option value="m.l" >M.L</option>
									  <option value="ca" >CA</option>
									  <option value="cfa" >CFA</option>
									  <option value="cs" >CS</option>
									  <option value="icwa" >ICWA</option>
									  <option value="ias" >IAS</option>
									  <option value="ies" >IES</option>
									  <option value="ifs" >IFS</option>
									  <option value="irs" >IRS</option>
									  <option value="ips" >IPS</option>
									  <option value="ph.d" >Ph.d</option>
									  <option value="diploma" >Diploma</option>
									  <option value="polytechnic" >Polytechnic</option>
									  <option value="trade school" >Trade school</option>
									  <option value="higher secondary school/high school" >Higher secondary school/High school</option>
									  <option value="others" >Others</option>
										   </select>
										
                                	</div>
									
									<div class="form-group">
									<label>Annual Income</label>
                                		 <div class="row">
										 
                                       	 	<div class="col-xs-4">
                                        		<select class="form-control" name="min_income" id="min_income">                                  
                                        <option value="49999" selected="select">Less than Rs 50,000</option>
                                        <option value="50000">Rs.50 Thousand</option>
                                        <option value="100000">Rs.1 Lakh</option>
                                        <option value="200000">Rs.2 Lakh</option>
                                        <option value="300000">Rs.3 Lakh</option>
                                        <option value="400000">Rs.4 Lakh</option>
                                        <option value="500000">Rs.5 Lakh</option>
                                        <option value="600000">Rs.6 Lakh</option>
                                        <option value="700000">Rs.7 Lakh</option>
                                        <option value="800000">Rs.8 Lakh</option>
                                        <option value="900000">Rs.9 Lakh</option>
                                        <option value="1000000">Rs.10 Lakh</option>
                                        <option value="1200000">Rs.12 Lakh</option>
                                        <option value="1400000">Rs.14 Lakh</option>
                                        <option value="1600000">Rs.16 Lakh</option>
                                        <option value="1800000">Rs.18 Lakh</option>
                                        <option value="2000000">Rs.20 Lakh</option>
                                        <option value="2500000">Rs.25 Lakh</option>
                                        <option value="3000000">Rs.30 Lakh</option>
                                        <option value="4000000">Rs.40 Lakh</option>
                                        <option value="5000000">Rs.50 Lakh</option>
                                        <option value="6000000">Rs.60 Lakh</option>
                                        <option value="7000000">Rs.70 Lakh</option>
                                        <option value="8000000">Rs.80 Lakh</option>
                                        <option value="9000000">Rs.90 Lakh</option>
                                        <option value="10000000">Rs.1 Crore</option>
                                        <option value="10000001">Rs.1 Crore & Above</option>
                      				</select>
										
                                       		</div>
                                        	<div class="col-xs-4">
                                        		<select class="form-control" name="max_income" id="max_income">                                  
                                        <option value="49999">Less than Rs 50,000</option>
                                        <option value="50000">Rs.50 Thousand</option>
                                        <option value="100000">Rs.1 Lakh</option>
                                        <option value="200000">Rs.2 Lakh</option>
                                        <option value="300000">Rs.3 Lakh</option>
                                        <option value="400000">Rs.4 Lakh</option>
                                        <option value="500000">Rs.5 Lakh</option>
                                        <option value="600000">Rs.6 Lakh</option>
                                        <option value="700000">Rs.7 Lakh</option>
                                        <option value="800000">Rs.8 Lakh</option>
                                        <option value="900000">Rs.9 Lakh</option>
                                        <option value="1000000">Rs.10 Lakh</option>
                                        <option value="1200000">Rs.12 Lakh</option>
                                        <option value="1400000">Rs.14 Lakh</option>
                                        <option value="1600000">Rs.16 Lakh</option>
                                        <option value="1800000">Rs.18 Lakh</option>
                                        <option value="2000000">Rs.20 Lakh</option>
                                        <option value="2500000">Rs.25 Lakh</option>
                                        <option value="3000000">Rs.30 Lakh</option>
                                        <option value="4000000">Rs.40 Lakh</option>
                                        <option value="5000000">Rs.50 Lakh</option>
                                        <option value="6000000">Rs.60 Lakh</option>
                                        <option value="7000000">Rs.70 Lakh</option>
                                        <option value="8000000">Rs.80 Lakh</option>
                                        <option value="9000000">Rs.90 Lakh</option>
                                        <option value="10000000">Rs.1 Crore</option>
                                        <option value="10000001">Rs.1 Crore & Above</option>
                      				</select>
                                       		</div>

                                       </div>
									
                                	</div>
                                    
									 </div>
									 <div class="col-md-6">
									 <div class="form-group">
                                		<label>
                                    		Occupation:
                                   	 	</label>
                                    	<select class="form-control" name="occupation" id="occupation" data-validetta="required">
                                        <option value=""> Select Occupation </option>
										 <option value="admin" >Admin</option>
										 <option value="supervisor" >Supervisor</option>
										 <option value="manager" >Manager</option>
										 <option value="officer" >Officer</option>
										 <option value="administrative professional" >Administrative Professional</option>
										 <option value="executive" >Executive</option>
										 <option value="clerk" >Clerk</option>
										 <option value="human resources professional" >Human Resources Professional</option>
										 <option value="agriculture" >Agriculture</option>
										 <option value="agriculture and farming professional" >Agriculture and farming professional</option>
										 <option value="airline" >Airline</option>
										 <option value="pilot" >Pilot</option>
										 <option value="air hostess" >Air Hostess</option>
										 <option value="airline professionals" >Airline Professionals</option>
										 <option value="architech and design" >Architech and Design</option>
										 <option value="architect" >Architect</option>
										 <option value="interior designer" >Interior Designer</option>
										 <option value="banking and finance" >Banking and finance</option>
										 <option value="chartered accountant" >Chartered accountant</option>
										 <option value="company secretary" >Company Secretary</option>
										 <option value="accounts/financial professional" >Accounts/financial professional</option>
										 <option value="auditor" >Auditor</option>
										 <option value="financial analyst /planning" >Financial analyst /planning</option>
										 <option value="beauty and fashion" >Beauty and Fashion</option>
										 <option value="fashion designer" >Fashion Designer</option>
										 <option value="beautician" >Beautician</option>
										 <option value="civil service(ias/ips/irs/ies/ifs)" >Civil service(IAS/IPS/IRS/IES/IFS)</option>
										 <option value="defense" >Defense</option>
										 <option value="army" >Army</option>
										 <option value="navy" >Navy</option>
										 <option value="air force" >Air Force</option>
										 <option value="education" >Education</option>
										 <option value="professor/lecturer" >Professor/Lecturer</option>
										 <option value="education professional" >Education professional</option>
										 <option value="hospitality" >Hospitality</option>
										 <option value="hotel/hospitality professional" >Hotel/Hospitality Professional</option>
										 <option value="it and engineering" >IT and Engineering</option>
										 <option value="software professional" >Software professional</option>
										 <option value="hardware professional" >Hardware professional</option>
										 <option value="engineer non it" >Engineer Non IT</option>
										 <option value="designer" >Designer</option>
										 <option value="legal" >Legal</option>
										 <option value="lawyer and legal professional" >Lawyer and Legal Professional</option>
										 <option value="medical" >Medical</option>
										 <option value="doctor" >Doctor</option>
										 <option value="health care professional" >Health care professional</option>
										 <option value="paramedical professional" >Paramedical professional</option>
										 <option value="nurse" >Nurse</option>
										 <option value="marketing professional" >Marketing professional</option>
										 <option value="sales professional" >Sales professional</option>
										 <option value="journalist" >Journalist</option>
										 <option value="media professional" >Media professional</option>
										 <option value="entertainment professional" >Entertainment professional</option>
										 <option value="event management professional" >Event management professional</option>
										 <option value="advertising/pr professional" >Advertising/PR professional</option>
										 <option value="mariner/merchant navy" >Mariner/merchant navy</option>
										 <option value="scientist" >Scientist</option>
										 <option value="scientist research" >Scientist Research</option>
										 <option value="cxo\\president,director,chairman" >CXO\\President,Director,Chairman</option>
										 <option value="business analyst" >Business Analyst</option>
										 <option value="consultant" >Consultant</option>
										 <option value="customer care professional" >Customer care professional</option>
										 <option value="social worker" >Social worker</option>
										 <option value="sportsman" >Sportsman</option>
										 <option value="technician" >Technician</option>
										 <option value="arts and craftsman" >Arts and Craftsman</option>
										 <option value="librarian" >Librarian</option>
										 <option value="business  owner/entrepreneur." >Business  Owner/Entrepreneur.</option>
										 <option value="others" >Others</option>
											 </select>

										
                                	</div>
																		
                                    
				 </div>
				 <div  class="row col-md-12" id="addfamily">
                            	<div class="radio-inline" style="text-align:center">
								<h3 style="color:#01c0c8;"> <b>Religion Details </b></h3>
									  <input type="radio" id="religions" name="religions" onclick="religion1('yes')">Yes &nbsp &nbsp &nbsp
									 
                                      <input type="radio" id="religions" name="religions" onclick="religion1('no')">No
									</div>
									
									
									</div> </div></div>
                           
				  
				   <div id="religion"  style="display:none">
				 <div class="row">
				 <div class="col-md-6">
				 <div class="form-group">
                                		<label>
                                    		Religion:
                                   	 	</label>
                                       
                                    	<select class="form-control" name="religion" id="religion" data-validetta="required">
                                        <option value="">Select Your Religion</option>
									   <option value="hindu" >Hindu</option>
									   <option value="christian" >Christian</option>
									   <option value="muslim-shia" >Muslim-Shia</option>
									   <option value="muslim-sunni" >Muslim-Sunni</option>
									   <option value="muslim-others" >Muslim-Others</option>
									   <option value="jain-digambar" >Jain-Digambar</option>
									   <option value="jain-shwetambar" >Jain-Shwetambar</option>
									   <option value="jain-others" >Jain-Others</option>
									   <option value="parsi" >Parsi</option>
									   <option value="buddhist" >Buddhist</option>
										</select>
										
                                	</div>	
									<div class="form-group">
                                		<label>
                                    		Caste:
                                   	 	</label>
										<select class="form-control" name="caste" id="caste" data-validetta="required" onchange="getsubcaste(this.value,'user')">
										<?php 
										$getcaste=mysqli_query($conn,"select * from tbl_caste");
												
										while($caste=mysqli_fetch_array($getcaste)) { 
										?>
                                         <option value="<?php echo $caste['id']; ?>"><?php echo $caste['caste']; ?></option>   
										<?php } ?>                                   
										</select>
										
										<script>	
									
										function getsubcaste(id,type)
										{
											
											$.ajax({
											url: 'ajaxsubcaste.php',
											type: 'GET',
											data: { caste_id: id,types:type} ,
											contentType: 'application/json; charset=utf-8',
											success: function (response) {
											
												if(type=='user')
												{
													document.getElementById("subcastediv").innerHTML='';
													document.getElementById("subcastediv").innerHTML=response;
												}
												else
												{
													document.getElementById("partnersubcastediv").innerHTML='';
													document.getElementById("partnersubcastediv").innerHTML=response;
												}
											},
											error: function () {
												alert("error");
											}
										}); 
										}
										document.getElementById('caste').value="<?php echo $getdata['caste']; ?>";
										</script>
                                    	
                                	</div>
									<div class="form-group">
                                		<label>
                                    		Sub caste:
                                   	 	</label>
										<div id="subcastediv">
										<select class="form-control" name="sub_caste" id="sub_caste" data-validetta="required" >
										</select>
										</div>
										
										
                                	</div>
									
									
				</div>
				 <div class="col-md-6">
				 <div class="form-group">
                                		<label>
                                    		Star:
                                   	 	</label>
                                    	<select class="form-control"  name="star" id="star">
                                       <option value="">Does not matter</option>
										<option value="anusham" >ANUSHAM</option>
										<option value="aswini" >ASWINI</option>
										<option value="avittam" >AVITTAM</option>
										<option value="ayilyam" >AYILYAM</option>
										<option value="bharani" >BHARANI</option>
										<option value="chithirai" >CHITHIRAI</option>
										<option value="hastham" >HASTHAM</option>
										<option value="kettai" >KETTAI</option>
										<option value="krithigai" >KRITHIGAI</option>
										<option value="maham" >MAHAM</option>
										<option value="moolam" >MOOLAM</option>
										<option value="mrigasirisham" >MRIGASIRISHAM</option>
										<option value="poosam" >POOSAM</option>
										<option value="punarpusam" >PUNARPUSAM</option>
										<option value="puradam" >PURADAM</option>
										<option value="puram" >PURAM</option>
										<option value="puratathi" >PURATATHI</option>
										<option value="revathi" >REVATHI</option>
										<option value="rohini" >ROHINI</option>
										<option value="sadayam" >SADAYAM</option>
										<option value="swathi" >SWATHI</option>
										<option value="thiruvadirai" >THIRUVADIRAI</option>
										<option value="thiruvonam" >THIRUVONAM</option>
										<option value="uthradam" >UTHRADAM</option>
										<option value="uthram" >UTHRAM</option>
										<option value="uthratadhi" >UTHRATADHI</option>
										<option value="visakam" >VISAKAM</option> 	
                                            
                                        </select>

										
                                	</div> 
                                    
                                    <div class="form-group">
                                		<label>
                                    		Raasi:
                                   	 	</label>
                                    	<select class="form-control" name="raasi" id="raasi">
										<option value="aries" >Aries</option>
										<option value="taurus" >Taurus</option>
										<option value="gemini" >Gemini</option>
										<option value="cancer" >Cancer</option>
										<option value="leo" >Leo</option>
										<option value="virgo" >Virgo</option>
										<option value="libra" >Libra</option>
										<option value="scorpio" >Scorpio</option>
										<option value="sagittarius" >Sagittarius</option>
										<option value="capricorn" >Capricorn</option>
										<option value="aquarius" >Aquarius</option>
										<option value="pisces" >Pisces</option>
										<option value="others" >Others</option>
                                            </select>
											
                                	</div>
									<div class="form-group">
                                		<label>
                                    		Dhosam Details:
                                   	 	</label>
                                    	<select class="form-control" name="dosham_details" id="dosham_details">
										<option value="chevvai dosham" >Chevvai Dosham</option>
										<option value="naga dosham" >Naga Dosham</option>
										<option value="kaalasarpa dosham" >Kaalasarpa Dosham</option>
										<option value="ketu dosham" >Ketu Dosham</option>
										<option value="rahu dosham" >Rahu Dosham</option>
										<option value="kalathra dosham" >Kalathra Dosham</option>
                                            </select>
                                	</div>	
								
									
				 </div>
				 <div  class="row col-md-12" id="addfamily">
                            	<div class="radio-inline" style="text-align:center">
								<h3 style="color:#01c0c8;"> <b>Family Details </b></h3>
									    <input type="radio" id="family1" name="family1" onclick="family('yes')">Yes &nbsp &nbsp &nbsp
									 
                                      <input type="radio" id="family1" name="family1" onclick="family('no')">No
									</div>
									
									
									</div> </div></div>
                 
				   <div id="family" style="display:none">
				 <div class="row">
				 <div class="col-md-6">
				 <div class="form-group">
                                		<label>
                                    		Family Type:
                                   	 	</label>
                                    	<select class="form-control" name="family_type" id="family_type" >
                                            	<option value="">Select Family Type</option>
                                            	<option value="joint" >Joint</option>
                                            	<option value="individual" >Individual</option>
                                            	<option value="seperated" >Seperated</option>
                                            	<option value="others" >Others</option>
                                            </select>
															
                                	</div>
									
                                   
                                    
                   </div>
				   <div class="col-md-6">
				   <div class="form-group">
                                		<label>
                                    		No Of Siblings:
                                   	 	</label>
                                        
                                    	<select class="form-control" name="no_of_siblings" id="no_of_siblings">
                                        	<option value="">Select</option>
                                                <option value="0" >0</option>
                                                <option value="1" >1</option>
                                                <option value="2" >2</option>
                                                <option value="3" >3</option>
                                                <option value="4" >4</option>
                                                <option value="4 +" >4 +</option>
                                        </select>
									
                                	</div>
                   </div>
				    
                  
				 </div>
				   <br>
				</div>
				 <div style="text-align:center;display:none;" id="submitdata">
                            		<input type="button" class="btn btn-danger btn-flat btn-lg" name="addmember" id="addmember" value="Submit" onclick="getalldata('filter')"> 
                          
                            </div>
							</form>
				</div>
				</div>
				</div>
				
			</div></div>
                   <div class="col-sm-12">
				   <div style="overflow-x:auto;">
                        <div class="white-box" >
                            <div>
                           <table  style="width:100%;">
						   
							  <tr>
							
								<th><a href="#" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px" ><input type="checkbox" id="select_all"> &nbsp Select all</a></th>
								<th><a href="#" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"><i class="fa fa-trash-o" aria-hidden="true"></i> &nbsp Delete</a></th>
								<th><a href="#" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"><i class="fa fa-thumbs-up" aria-hidden="true"></i> &nbsp Active</a></th>
								<th><a href="#" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> <i class="fa fa-thumbs-down" aria-hidden="true"></i> &nbsp Inactive</a></th>
								<th><a href="#" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"> <i class="fa fa-user-times" aria-hidden="true"></i> &nbsp Suspended</a></th>
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
							  <tbody style="border: 0px solid #dddddd;" id="result">
							  
							  </tbody>
							</table>
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
table.dataTable.stripe tbody tr.odd, table.dataTable.display tbody tr.odd {
background-color: #ffffff;}
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
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
</body>

</html>
