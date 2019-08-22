<?php
//ini_set('display_errors','on');

ob_start();
session_start();
require('../config.php');

if($_SESSION['adminid']=='')
{
header('location:../adminlogin.php');
}

if($_POST['addpreference']=='Add Partner Preference')
{
	
	$gender=$_POST['gender'];
	$min_age=$_POST['min_age'];
	$max_age=$_POST['max_age'];
	$min_height=$_POST['min_height'];
	$max_height=$_POST['max_height'];
	$min_weight=$_POST['min_weight'];
	$max_weight=$_POST['max_weight'];
	$caste=$_POST['caste'];
	$sub_caste=$_POST['sub_caste'];
	$marital_status	=$_POST['marital_status']; 
	$geteducation=$_POST['education'];
	if($_POST['education']!=='')
	{
		$education=implode(",",$geteducation);
	}
	else
	{
		$education='';
	}
	$profession=$_POST['profession'];
	/* if($_POST['profession']!=='')
	{
		$profession=implode(",",$getprofession);
	}
	else
	{
		$profession='';
	} */
	
	$mother_tongue=$_POST['mother_tongue'];
	
	$raasi=$_POST['raasi'];
	
	$natchathiram=$_POST['natchathiram'];
	$paadham=$_POST['paadham'];
	$dosham=$_POST['dosham'];
	$physical_status=$_POST['physical_status'];
	$nationality=$_POST['nationality'];
	$country=$_POST['country'];
	$preferred_cities=$_POST['preferred_cities'];
	$having_dosham=$_POST['having_dosham'];
	
	$getrow=mysqli_query($conn,"select * from tbl_partners where user_id='".$_GET['id']."'");
	$rowcount=mysqli_num_rows($getrow);
	//echo "select * from tbl_partners where user_id='".$user_id."'";exit;
	if($rowcount==0)
	{
		$sql = mysqli_query($conn,"INSERT INTO tbl_partners (gender,min_age,max_age,min_height,max_height,min_weight,max_weight,caste,sub_caste,marital_status,mother_tongue,raasi,natchathiram,paadham,dosham,education,profession,physical_status,nationality,country,preferred_cities,having_dosham,user_id) VALUES ('".$gender."','".$min_age."','".$max_age."','".$min_height."','".$max_height."','".$min_weight."','".$max_weight."','".$caste."','".$sub_caste."','".$marital_status."','".$mother_tongue."','".$raasi."','".$natchathiram."','".$paadham."','".$dosham."','".$education."','".$profession."','".$physical_status."','".$nationality."','".$country."','".$preferred_cities."','".$having_dosham."','".$_GET['id']."')");
	}
	else
	{
		$sql = mysqli_query($conn,"Update tbl_partners set gender='".$gender."',min_age='".$min_age."',max_age='".$max_age."',min_height='".$min_height."',max_height='".$max_height."',min_weight='".$min_weight."',max_weight='".$max_weight."',caste='".$caste."',sub_caste='".$sub_caste."',marital_status='".$marital_status."',mother_tongue='".$mother_tongue."',raasi='".$raasi."',natchathiram='".$natchathiram."',paadham='".$paadham."',dosham='".$dosham."',education='".$education."',profession='".$profession."',physical_status='".$physical_status."',nationality='".$nationality."',country='".$country."',preferred_cities='".$preferred_cities."',having_dosham='".$having_dosham."' where user_id='".$_GET['id']."'");
	}

header('Location:members.php?type='.$_GET["type"]);
	
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
<script>
$(document).ready(function() {
	$('#member').DataTable( {
		
	} );
} );
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
                        <h4 class="page-title">Add Partner Preference</h4>
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
                
				<br><br>
                   <div class="col-sm-12">
				   
                        <div class="white-box" class="col-sm-12">
                            <div class="r-icon-stats">
                          <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                              <form method="post" name="other_detail" id="other_detail"> 
								<?php 
								$getdata=mysqli_query($conn,"select * from tbl_partners where user_id='".$_GET['id']."'");
								$fetchdata=mysqli_fetch_array($getdata);
								?>
                            <div class="row">
                    			<div class="col-md-6 col-xs-12">
								<div class="form-group">
                                		<label>
                                    		Partner Gender :
                                   	 	</label>
                                       
                                    	<select class="chosen-select form-control" name="gender" id="gender" data-validetta="required" >
										<option value="male" >Male</option>
										<option value="female" >Female</option>
                                     </select>
									 <script>	
											document.getElementById('gender').value="<?php echo $fetchdata['gender']; ?>";
									</script>
                                	</div>
                            		
                                    <div class="form-group">
                                		<label>
                                    		Partner's Age:
                                   	 	</label>
                                       <div class="row">
                                        	<div class="col-xs-6">
                                        		<select class="form-control" name="min_age" id="min_age">
                                                <option value="18">18 Years</option>
                                        		<option value="18">18 Years</option>
                                                <option value="19">19 Years</option>
                                                <option value="20">20 Years</option>
                                                <option value="21">21 Years</option>
                                                <option value="22">22 Years</option>
                                                <option value="23">23 Years</option>
                                                <option value="24">24 Years</option>
                                                <option value="25">25 Years</option>
                                                <option value="26">26 Years</option>
                                                <option value="27">27 Years</option>
                                                <option value="28">28 Years</option>
                                                <option value="29">29 Years</option>
                                                <option value="30">30 Years</option>
                                                <option value="31">31 Years</option>
                                                <option value="32">32 Years</option>
                                                <option value="33">33 Years</option>
                                                <option value="34">34 Years</option>
                                                <option value="35">35 Years</option>
                                                <option value="36">36 Years</option>
                                                <option value="37">37 Years</option>
                                                <option value="38">38 Years</option>
                                                <option value="39">39 Years</option>
                                                <option value="40">40 Years</option>
                                                <option value="41">41 Years</option>
                                                <option value="42">42 Years</option>
                                                <option value="43">43 Years</option>
                                                <option value="44">44 Years</option>
                                                <option value="45">45 Years</option>
                                                <option value="46">46 Years</option>
                                                <option value="47">47 Years</option>
                                                <option value="48">48 Years</option>
                                                <option value="49">49 Years</option>
                                                <option value="50">50 Years</option>
                                                <option value="51">51 Years</option>
                                                <option value="52">52 Years</option>
                                                <option value="53">53 Years</option>
                                                <option value="54">54 Years</option>
                                                <option value="55">55 Years</option>
                                                <option value="56">56 Years</option>
                                                <option value="57">57 Years</option>
                                                <option value="58">58 Years</option>
                                                <option value="59">59 Years</option>
                                                <option value="60">60 Years</option> 
												</select>
												 <script>	
													document.getElementById('min_age').value="<?php echo $fetchdata['min_age']; ?>";
												</script>
                                        	</div>
                                       	 	<div class="col-xs-6">
                                        		<select class="form-control" name="max_age" id="max_age">	
                                                <option value="30">30 Years</option>
                                        		<option value="18">18 Years</option>
                                                <option value="19">19 Years</option>
                                                <option value="20">20 Years</option>
                                                <option value="21">21 Years</option>
                                                <option value="22">22 Years</option>
                                                <option value="23">23 Years</option>
                                                <option value="24">24 Years</option>
                                                <option value="25">25 Years</option>
                                                <option value="26">26 Years</option>
                                                <option value="27">27 Years</option>
                                                <option value="28">28 Years</option>
                                                <option value="29">29 Years</option>
                                                <option value="30">30 Years</option>
                                                <option value="31">31 Years</option>
                                                <option value="32">32 Years</option>
                                                <option value="33">33 Years</option>
                                                <option value="34">34 Years</option>
                                                <option value="35">35 Years</option>
                                                <option value="36">36 Years</option>
                                                <option value="37">37 Years</option>
                                                <option value="38">38 Years</option>
                                                <option value="39">39 Years</option>
                                                <option value="40">40 Years</option>
                                                <option value="41">41 Years</option>
                                                <option value="42">42 Years</option>
                                                <option value="43">43 Years</option>
                                                <option value="44">44 Years</option>
                                                <option value="45">45 Years</option>
                                                <option value="46">46 Years</option>
                                                <option value="47">47 Years</option>
                                                <option value="48">48 Years</option>
                                                <option value="49">49 Years</option>
                                                <option value="50">50 Years</option>
                                                <option value="51">51 Years</option>
                                                <option value="52">52 Years</option>
                                                <option value="53">53 Years</option>
                                                <option value="54">54 Years</option>
                                                <option value="55">55 Years</option>
                                                <option value="56">56 Years</option>
                                                <option value="57">57 Years</option>
                                                <option value="58">58 Years</option>
                                                <option value="59">59 Years</option>
                                                <option value="60">60 Years</option>
                                    		</select>
											 <script>	
													document.getElementById('max_age').value="<?php echo $fetchdata['max_age']; ?>";
											</script>
                                       		</div>
                                       </div>
                                    </div>
                                    
                                    <div class="form-group">
                                		<label>
                                    		Partner Height :
                                   	 	</label>
                                    	 <div class="row">
                                        	<div class="col-xs-6">
                                        		<select class="form-control" data-validetta="required" name="min_height" id="min_height">
                                                	<option value="48" >4ft 0in</option>
                                        	<option value="48">Below 4ft</option>

												<option value="54">4ft 06in</option>
												<option value="55">4ft 07in</option>
												<option value="56">4ft 08in</option>
												<option value="57">4ft 09in</option>
												<option value="58">4ft 10in</option>
												<option value="59">4ft 11in</option>
												<option value="60">5ft</option>
												<option value="61">5ft 01in</option>
												<option value="62">5ft 02in</option>
												<option value="63">5ft 03in</option>
												<option value="64">5ft 04in</option>
												<option value="65">5ft 05in</option>
												<option value="66">5ft 06in</option>
												<option value="67">5ft 07in</option>
												<option value="68">5ft 08in</option>
												<option value="69">5ft 09in</option>
												<option value="70">5ft 10in</option>
												<option value="71">5ft 11in</option>
												<option value="72">6ft</option>
												<option value="73">6ft 01in</option>
												<option value="74">6ft 02in</option>
												<option value="75">6ft 03in</option>
												<option value="76">6ft 04in</option>
												<option value="77">6ft 05in</option>
												<option value="78">6ft 06in</option>
												<option value="79">6ft 07in</option>
												<option value="80">6ft 08in</option>
												<option value="81">6ft 09in</option>
												<option value="82">6ft 10in</option>
												<option value="83">6ft 11in</option>
												<option value="84">7ft</option>
												<option value="85">Above 7ft</option>
												</select>
												<script>	
													document.getElementById('min_height').value="<?php echo $fetchdata['min_height']; ?>";
											</script>
											</div>
											<div class="col-xs-6">
												<select class="form-control" data-validetta="required" name="max_height" id="max_height">
													<option value="60">5ft 0in</option>
											<option value="48">Below 4ft</option>

												<option value="54">4ft 06in</option>
												<option value="55">4ft 07in</option>
												<option value="56">4ft 08in</option>
												<option value="57">4ft 09in</option>
												<option value="58">4ft 10in</option>
												<option value="59">4ft 11in</option>
												<option value="60">5ft</option>
												<option value="61">5ft 01in</option>
												<option value="62">5ft 02in</option>
												<option value="63">5ft 03in</option>
												<option value="64">5ft 04in</option>
												<option value="65">5ft 05in</option>
												<option value="66">5ft 06in</option>
												<option value="67">5ft 07in</option>
												<option value="68">5ft 08in</option>
												<option value="69">5ft 09in</option>
												<option value="70">5ft 10in</option>
												<option value="71">5ft 11in</option>
												<option value="72">6ft</option>
												<option value="73">6ft 01in</option>
												<option value="74">6ft 02in</option>
												<option value="75">6ft 03in</option>
												<option value="76">6ft 04in</option>
												<option value="77">6ft 05in</option>
												<option value="78">6ft 06in</option>
												<option value="79">6ft 07in</option>
												<option value="80">6ft 08in</option>
												<option value="81">6ft 09in</option>
												<option value="82">6ft 10in</option>
												<option value="83">6ft 11in</option>
												<option value="84">7ft</option>
												<option value="85">Above 7ft</option>
                                        		</select>
												<script>	
													document.getElementById('max_height').value="<?php echo $fetchdata['max_height']; ?>";
											</script>
                                       		</div>
                                       </div>
                                	</div>
									
									<div class="form-group">
                                		<label>
                                    		Partner's Weight:
                                   	 	</label>
                                       <div class="row">
                                        	<div class="col-xs-6">
                                        		<select class="form-control" name="min_weight" id="min_weight" data-validetta="required">
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
											<script>	
													document.getElementById('min_weight').value="<?php echo $fetchdata['min_weight']; ?>";
											</script>
                                        	</div>
                                       	 	<div class="col-xs-6">
                                        		<select class="form-control" name="max_weight" id="max_weight" data-validetta="required">
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
											<script>	
													document.getElementById('max_weight').value="<?php echo $fetchdata['max_weight']; ?>";
											</script>
                                       		</div>
                                       </div>
                                    </div>
									
									 <div class="form-group">
                                		<label>
                                    		Having Dhosam:
                                   	 	</label>
										<select class="form-control"  name="having_dosham" id="having_dosham">
                                       <option value="yes">Yes</option>
										<option value="no" >No</option>
                                        </select>

										<script>	
											document.getElementById('having_dosham').value="<?php echo $fetchdata['having_dosham']; ?>";
										</script>
                                	</div>
									
									<div class="form-group">
                                		<label>
                                    		Dhosam Details:
                                   	 	</label>
                                    	<input type="text" class="form-control" data-validetta="required" value="<?php echo $fetchdata['dosham']; ?>" name="dosham" id="dosham">
                                	</div>	
									
									<div class="form-group">
                                		<label>
                                    		Education:
                                   	 	</label>
                                    	<select class="chosen-select form-control" name="education[]" id="education" data-validetta="required" multiple data-placeholder="Select Education">
                                        
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
										<script>	
											var data="<?php echo $fetchdata['education']; ?>";
											var dataarray=data.split(",");

											// Set the value

											$("#education").val(dataarray);

											// Then refresh

											$("#education").multiselect("refresh");
											
										</script>
                                	</div>
									
									<div class="form-group">
                                		<label>
                                    		Profession:
                                   	 	</label>
                                    	<select class="form-control" name="profession" id="profession" data-validetta="required">
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

										<script>	
											document.getElementById('profession').value="<?php echo $fetchdata['profession']; ?>";
										</script>
                                	</div>
									
                                   
                                   
                                </div>
                                <div class="col-md-6 col-xs-12">
								
									 <div class="form-group">
                                		<label>
                                    		Caste:
                                   	 	</label>
                                    	<select class="form-control" data-validetta="required" name="caste" id="caste">
                                        	
                                            <option value="24 manai telugu chettiar">24 Manai Telugu Chettiar</option>             
                                            <option value="aaru nattu vellala">Aaru Nattu Vellala</option>             
                                            <option value="achirapakkam chettiar">Achirapakkam Chettiar</option>             
                                            <option value="adi dravidar">Adi Dravidar</option>             
                                            <option value="agamudayar/arcot/thuluva vellala">Agamudayar/Arcot/Thuluva Vellala</option>             
                                            <option value="agaran vellan chettiar">Agaran Vellan Chettiar</option>             
                                            <option value="ahirwar">Ahirwar</option>             
                                            <option value="arunthathiyar">Arunthathiyar</option>             
                                            <option value="ayira vysya">Ayira Vysya</option>             
                                            <option value="badaga">Badaga</option>             
                                            <option value="bairwa">Bairwa</option>             
                                            <option value="balai">Balai</option>             
                                            <option value="beri chettiar">Beri Chettiar</option>             
                                            <option value="boyar">Boyar</option>             
                                            <option value="brahmin - anaviln desai">Brahmin - Anaviln Desai</option>             
                                            <option value="brahmin - baidhiki/vaidhiki">Brahmin - Baidhiki/Vaidhiki</option>             
                                            <option value="brahmin - bardai">Brahmin - Bardai</option>             
                                            <option value="brahmin - bhargav">Brahmin - Bhargav</option>             
                                            <option value="brahmin - gurukkal">Brahmin - Gurukkal</option>             
                                            <option value="brahmin - iyengar">Brahmin - Iyengar</option>             
                                            <option value="brahmin - iyer">Brahmin - Iyer</option>             
                                            <option value="brahmin - khadayata">Brahmin - Khadayata</option>             
                                            <option value="brahmin - khedaval">Brahmin - Khedaval</option>             
                                            <option value="brahmin - mevada">Brahmin - Mevada</option>             
                                            <option value="brahmin - rajgor">Brahmin - Rajgor</option>             
                                            <option value="brahmin - rarhi/radhi">Brahmin - Rarhi/Radhi</option>             
                                            <option value="brahmin - sarua">Brahmin - Sarua</option>             
                                            <option value="brahmin - shri gaud">Brahmin - Shri Gaud</option>             
                                            <option value="brahmin - tapodhan">Brahmin - Tapodhan</option>             
                                            <option value="brahmin - valam">Brahmin - Valam</option>             
                                            <option value="brahmin - zalora">Brahmin - Zalora</option>             
                                            <option value="brahmin - sri vaishnava">Brahmin - Sri Vaishnava</option>             
                                            <option value="brahmin - cherakula vellalar">Brahmin - Cherakula Vellalar</option>             
                                            <option value="brahmin - chettiar">Brahmin - Chettiar</option>             
                                            <option value="brahmin - desikar">Brahmin - Desikar</option>             
                                            <option value="brahmin - desikar tanjavur">Brahmin - Desikar Tanjavur</option>             
                                            <option value="brahmin - devandra kula vellalar">Brahmin - Devandra Kula Vellalar</option>             
                                            <option value="brahmin - devanga chettiar">Brahmin - Devanga Chettiar</option>             
                                            <option value="brahmin - devar/thevar/mukkulathor">Brahmin - Devar/Thevar/Mukkulathor</option>             
                                            <option value="brahmin - dhanak">Brahmin - Dhanak</option>             
                                            <option value="elur chetty">Elur Chetty</option>             
                                            <option value="gandla/ganiga">Gandla/Ganiga</option>             
                                            <option value="gounder">Gounder</option>             
                                            <option value="gounder - kongu - vellala gounder">Gounder - Kongu - Vellala Gounder</option>             
                                            <option value="gounder - nattu gounder">Gounder - Nattu Gounder</option>             
                                            <option value="gounder - others">Gounder - Others</option>             
                                            <option value="gounder - uralii gounder">Gounder - Uralii Gounder</option>             
                                            <option value="gounder - vanniya kula kshatriyar">Gounder - Vanniya Kula Kshatriyar</option>             
                                            <option value="gounder - vettuva gounder">Gounder - Vettuva Gounder</option>             
                                            <option value="gramani">Gramani</option>             
                                            <option value="gurukkal brahmin">Gurukkal Brahmin</option>             
                                            <option value="illaththu pillai">Illaththu Pillai</option>             
                                            <option value="intercaste">Intercaste</option>             
                                            <option value="isai vellalar">Isai Vellalar</option>             
                                            <option value="iyenga brahmin">Iyenga Brahmin</option>             
                                            <option value="iyer brahmin">Iyer Brahmin</option>             
                                            <option value="julaha">Julaha</option>             
                                            <option value="kamma naidu">Kamma Naidu</option>             
                                            <option value="kanaka padanna">Kanaka Padanna</option>             
                                            <option value="kandara">Kandara</option>             
                                            <option value="karkathar">Karkathar</option>             
                                            <option value="karuneegar">Karuneegar</option>             
                                            <option value="kasukara">Kasukara</option>             
                                            <option value="kerala mudali">Kerala Mudali</option>             
                                            <option value="khatik">Khatik</option>             
                                            <option value="kodikal pillai">Kodikal Pillai</option>             
                                            <option value="kongu chettiar">Kongu Chettiar</option>             
                                            <option value="kongu nadar">Kongu Nadar</option>             
                                            <option value="kongu vellala gounder">Kongu Vellala Gounder</option>             
                                            <option value="kori/koli">Kori/Koli</option>             
                                            <option value="krishnavaka">Krishnavaka</option>             
                                            <option value="kshatriya raju">Kshatriya Raju</option>             
                                            <option value="kulalar">Kulalar</option>             
                                            <option value="kuravan">Kuravan</option>             
                                            <option value="kuruhini chetty">Kuruhini Chetty</option>             
                                            <option value="kurumbar">Kurumbar</option>             
                                            <option value="kuruva">Kuruva</option>             
                                            <option value="manja pudhu chettiar">Manja Pudhu Chettiar</option>             
                                            <option value="mannan/velan/vannan">Mannan/Velan/Vannan</option>             
                                            <option value="maruthuvar">Maruthuvar</option>             
                                            <option value="meenavar">Meenavar</option>             
                                            <option value="meghwal">Meghwal</option>             
                                            <option value="mudaliyar">Mudaliyar</option>             
                                            <option value="mukkulathor">Mukkulathor</option>             
                                            <option value="muthuraja">Muthuraja</option>             
                                            <option value="nadar">Nadar</option>             
                                            <option value="naicker">Naicker</option>             
                                            <option value="naicker - others">Naicker - Others</option>             
                                            <option value="naicker - vanniya kula">Naicker - Vanniya Kula</option>             
                                            <option value="naicker - kshatriyar">Naicker - Kshatriyar</option>             
                                            <option value="naidu">Naidu</option>             
                                            <option value="nanjil mudali">Nanjil Mudali</option>             
                                            <option value="nanjil nattu vellalar">Nanjil Nattu Vellalar</option>             
                                            <option value="nanjil vellalar">Nanjil Vellalar</option>             
                                            <option value="nanjil pillai">Nanjil Pillai</option>             
                                            <option value="nankudi vellalar">Nankudi Vellalar</option>             
                                            <option value="nattu gounder">Nattu Gounder</option>             
                                            <option value="nattukudi chettiar">Nattukudi Chettiar</option>             
                                            <option value="othuvaar">Othuvaar</option>             
                                            <option value="padanashali">Padanashali</option>             
                                            <option value="pallan/devandrakula vellalar">Pallan/Devandrakula Vellalar</option>             
                                            <option value="panan">Panan</option>             
                                            <option value="pandaram">Pandaram</option>             
                                            <option value="pandiya vellalar">Pandiya Vellalar</option>             
                                            <option value="pannirandam chettiar">Pannirandam Chettiar</option>             
                                            <option value="paravan/bharatar">Paravan/Bharatar</option>             
                                            <option value="parkavakulam/udayar">Parkavakulam/Udayar</option>             
                                            <option value="pattinavar">Pattinavar</option>             
                                            <option value="pattusali">Pattusali</option>             
                                            <option value="pillai">Pillai</option>             
                                            <option value="poundra">Poundra</option>             
                                            <option value="pulaya/cheruman">Pulaya/Cheruman</option>             
                                            <option value="reddy">Reddy</option>             
                                            <option value="rohit/chamar">Rohit/Chamar</option>             
                                            <option value="sc">SC</option>             
                                            <option value="st">ST</option>             
                                            <option value="sadhu chetty">Sadhu Chetty</option>             
                                            <option value="saiva pillai thanjavar">Saiva Pillai Thanjavar</option>             
                                            <option value="saiva pillai tirunelveli">Saiva Pillai Tirunelveli</option>             
                                            <option value="saiva velllan chettiar">Saiva Velllan Chettiar</option>             
                                            <option value="samagar">Samagar</option>             
                                            <option value="sambava">Sambava</option>             
                                            <option value="satnami">Satnami</option>             
                                            <option value="senai thalaivar">Senai Thalaivar</option>             
                                            <option value="senguntha mudaliyar">Senguntha Mudaliyar</option>             
                                            <option value="sengunthar/kaikolar">Sengunthar/Kaikolar</option>             
                                            <option value="shilpkar">Shilpkar</option>             
                                            <option value="sonkar">Sonkar</option>             
                                            <option value="sourashtra">Sourashtra</option>             
                                            <option value="sozhia chetty">Sozhia Chetty</option>             
                                            <option value="sozhia vellalar">Sozhia Vellalar</option>             
                                            <option value="telugupatti">Telugupatti</option>             
                                            <option value="thandan">Thandan</option>             
                                            <option value="thondai mandala vellalar">Thondai Mandala Vellalar</option>             
                                            <option value="urali gounder">Urali Gounder</option>             
                                            <option value="vadambar">Vadambar</option>             
                                            <option value="vadugan">Vadugan</option>             
                                            <option value="vaniya chettiar">Vaniya Chettiar</option>             
                                            <option value="vannar">Vannar</option>             
                                            <option value="vannia kula kshatriyar">Vannia Kula Kshatriyar</option>             
                                            <option value="veera saivm">Veera Saivm</option>             
                                            <option value="veerakodi vellalar">Veerakodi Vellalar</option>             
                                            <option value="vellalar">Vellalar</option>             
                                            <option value="vellan chettiars">Vellan Chettiars</option>             
                                            <option value="vettuva gounder">Vettuva Gounder</option>             
                                            <option value="vishwakarma">Vishwakarma</option>             
                                            <option value="vokkaliga">Vokkaliga</option>             
                                            <option value="yadav">Yadav</option>             
                                            <option value="yadava naidu">Yadava Naidu</option>             
                                            <option value="christan -anglo - indian">Christan -Anglo - Indian</option>             
                                            <option value="christan -born again">Christan -Born Again</option>             
                                            <option value="christan -born again">Christan -Born Again</option>             
                                            <option value="christan -church of south india">Christan -Church Of South India</option>             
                                            <option value="christan -evangelist">Christan -Evangelist</option>             
                                            <option value="christan -jacobite">Christan -Jacobite</option>             
                                            <option value="christan -latin catholic">Christan -Latin Catholic</option>             
                                            <option value="christan -malankara catholic">Christan -Malankara Catholic</option>             
                                            <option value="christan -pentecost">Christan -Pentecost</option>             
                                            <option value="christan -roman - catholic">Christan -Roman - Catholic</option>             
                                            <option value="christan -seventh - day - adventist">Christan -Seventh - day - Adventist</option>             
                                            <option value="christan -syiran catholic">Christan -Syiran Catholic</option>             
                                            <option value="christan -syiran jacobite">Christan -Syiran Jacobite</option>             
                                            <option value="christan -syro malabar">Christan -Syro Malabar</option>             
                                            <option value="christan -christan - others">Christan -Christan - Others</option>             
                                            <option value="muslim - ansari">Muslim - Ansari</option>             
                                            <option value="muslim - arain">Muslim - Arain</option>             
                                            <option value="muslim - awan">Muslim - Awan</option>             
                                            <option value="muslim - bohra">Muslim - Bohra</option>             
                                            <option value="muslim - dekkani">Muslim - Dekkani</option>             
                                            <option value="muslim - dudekula">Muslim - Dudekula</option>             
                                            <option value="muslim - hanafi">Muslim - Hanafi</option>             
                                            <option value="muslim - jat">Muslim - Jat</option>             
                                            <option value="muslim - khoja">Muslim - Khoja</option>             
                                            <option value="muslim - lebbai">Muslim - Lebbai</option>             
                                            <option value="muslim - malik">Muslim - Malik</option>             
                                            <option value="muslim - mapila">Muslim - Mapila</option>             
                                            <option value="muslim - maraicar">Muslim - Maraicar</option>             
                                            <option value="muslim - memon">Muslim - Memon</option>             
                                            <option value="muslim - mughal">Muslim - Mughal</option>             
                                            <option value="muslim - pathan">Muslim - Pathan</option>             
                                            <option value="muslim - qureshi">Muslim - Qureshi</option>             
                                            <option value="muslim - mapila">Muslim - Mapila</option>             
                                            <option value="don\'t wish to specify">Don\'t Wish to Specify</option>             
                                            <option value="others">Others</option>             
                                            
                                        </select>
										<script>	
											document.getElementById('caste').value="<?php echo $fetchdata['caste']; ?>";
										</script>
                                	</div>
                                    <div class="form-group">
                                		<label>
                                    		Sub caste:
                                   	 	</label>
                                    	<input type="text" class="form-control" name="sub_caste" id="sub_caste" value="<?php echo $fetchdata['sub_caste']; ?>" />
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
										<script>	
											document.getElementById('raasi').value="<?php echo $fetchdata['raasi']; ?>";
										</script>	
                                	</div>
									
									<div class="form-group">
                                		<label>
                                    		Natchathiram:
                                   	 	</label>
                                    	<select class="form-control"  name="natchathiram" id="natchathiram">
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

										<script>	
											document.getElementById('natchathiram').value="<?php echo $fetchdata['natchathiram']; ?>";
										</script>
                                	</div> 
									
									 <div class="form-group">
                                		<label>
                                    		Paadham:
                                   	 	</label>
                                    	<input type="text" class="form-control" data-validetta="required" value="<?php echo $fetchdata['paadham']; ?>" name="paadham" id="paadham">
                                            </select>
									
                                	</div>
									
									<div class="form-group">
									<label>
										Looking For :
									</label>

									<select class="form-control" data-validetta="required" name="marital_status" id="marital_status">
                                       <option value="">Select Your Marital Status</option>
                                    	<option value="unmarried" >Unmarried</option>
                                        <option value="married" >Married</option>
                                        <option value="divorced" >Divorced</option>
                                        <option value="widowed" >Widowed</option>
                                        <option value="others" >Others</option>
                                        </select>
									<script>	
											document.getElementById('marital_status').value="<?php echo $fetchdata['marital_status']; ?>";
										</script>
									</div>
                                   
                                    
                                    <div class="form-group">
                                		<label>
                                    		Partner Mothertongue :
                                   	 	</label>
                                    	<select id="mother_tongue" class="form-control" data-validetta="required" name="mother_tongue">
                                    	 <option value="">Select Your Mother Tongue</option>
										  <option value="tamil"  >Tamil</option>
										  <option value="english"  >English</option>
										  <option value="hindi"  >Hindi</option>
										  <option value="telugu"  >Telugu</option>
										  <option value="marathi"  >Marathi</option>
										  <option value="kannada"  >Kannada</option>
										  <option value="gujarati"  >Gujarati</option>
										  <option value="urdu"  >Urdu</option>
											   </select>
										
										<script>	
											document.getElementById('mother_tongue').value="<?php echo $fetchdata['mother_tongue']; ?>";
											//var data="<?php echo $fetchdata['mother_tongue']; ?>";
											/* var dataarray=data.split(",");

											// Set the value

											$("#mother_tongue").val(dataarray);

											// Then refresh

											$("#mother_tongue").multiselect("refresh"); */
											
										</script>
                                	</div>
									
									 <div class="form-group">
                                		<label>
                                    		Physical Status
                                   	 	</label>
                                    	<select class="form-control" name="physical_status" name="physical_status">
                                        <option value="Good" >Good</option>
                                        <option value="Week" >Week</option>
                                         </select>
                                	</div>
									<script>	
											document.getElementById('physical_status').value="<?php echo $fetchdata['physical_status']; ?>";
									</script>
                                    
                                </div>
                                
                            
                            <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3 style="color:green;">
                                   		&nbsp;&nbsp;&nbsp;Location Preferences 
                                	</h3>
									
                                </div>
								<br>
                            </div>
                           
                           <div class="col-md-6 col-xs-12">
						   </div>
                           <div class="col-md-6 col-xs-12">
                                 <div class="form-group">
                                		<label>
                                    		Nationality:
                                   	 	</label>
                                       <input type="text" class="form-control" data-validetta="required" value="<?php echo $fetchdata['nationality']; ?>" name="nationality" id="nationality">
                                	</div>
                                 <div class="form-group">
                                		<label>
                                    		Country:
                                   	 	</label>
                                    <select class="form-control" name="country" id="country" data-validetta="required">
                                    <option value="">Select Your Country</option>
								   <option value="indian" >Indian</option>
								   <option value="sri lankan" >Sri Lankan</option>
								   <option value="russian" >Russian</option>
								   <option value="american" >American</option>
								   <option value="pakistanian" >Pakistanian</option>
								   <option value="british" >British</option>
								   <option value="irish" >Irish</option>
								   <option value="brazilian" >Brazilian</option>
								   <option value="italian" >Italian</option>
								   <option value="chinese" >Chinese</option>
								   <option value="polish" >Polish</option>
								   <option value="austrian" >Austrian</option>
								   <option value="canadian" >Canadian</option>
								   <option value="malaysian" >Malaysian</option>
								   <option value="south Korean" >South Korean</option>
								   <option value="north korean" >North Korean</option>
								   <option value="german" >German</option>
								   <option value="swedish" >Swedish</option>
								   <option value="french" >French</option>
								   <option value="swiss" >Swiss</option>
								   <option value="others" >Others</option>
									</select>
									<script>	
											document.getElementById('country').value="<?php echo $fetchdata['country']; ?>";
										</script>
								<div id="status123"></div>
								</div>
								 <div class="form-group">
									<label>
										Home City
									</label>
									<input type="text" class="form-control" data-validetta="required" value="<?php echo $fetchdata['preferred_cities']; ?>" name="preferred_cities" id="preferred_cities">
								</div>
                            </div>
                            
                            </div>
                            <div  class="row">
                            	<div class="col-xs-12 col-md-12 text-center">
                                <input type="submit" name="addpreference" value="Add Partner Preference" class="btn btn-danger btn-flat btn-lg">
                            		
                            	</div>
                            </div>
                            </form>
							
							
                        </div>
                        </div>
                        </div>
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
