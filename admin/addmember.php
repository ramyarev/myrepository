<?php
//ini_set('display_errors','on');

ob_start();
session_start();
require('../config.php');

if($_SESSION['adminid']=='')
{
header('location:../adminlogin.php');
}


if($_POST['addmember']=='Add Member')
{
	$name=$_POST['firstname']." ".$_POST['lastname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$gender=$_POST['gender'];
	$dob=$_POST['dob'];

	$age=$_POST['age'];
	$religion=$_POST['religion'];
	$mother_tongue=$_POST['mother_tongue'];
	$mobile_number=$_POST['mobile_number'];
	$nationality=$_POST['nationality'];
	$country=$_POST['country'];
	$state=$_POST['state'];
	$home_city=$_POST['home_city'];
	//echo $home_city;exit;
	$education=$_POST['education'];
	$college=$_POST['college'];
	$willing_other_community=$_POST['willing_other_community'];
	/* if($_POST['education']!=='')
	{
		$education=implode(",",$geteducation);
	}
	else
	{
		$education='';
	} */
	$occupation=$_POST['occupation'];
	$office_details=$_POST['office_details'];
	$profile_image=$_FILES["profile_image"]["name"];
	$id_proof=$_FILES["id_proof"]["name"];
	$cover_image=$_FILES["cover_image"]["name"];
	$horoscope=$_FILES["horoscope"]["name"];
	$min_income=$_POST['min_income'];
	$max_income=$_POST['max_income'];
	$caste=$_POST['caste'];
	$sub_caste=$_POST['sub_caste'];
	$father_name=$_POST['father_name'];
	$mother_name=$_POST['mother_name'];
	$father_occupation=$_POST['father_occupation'];
	$mother_occupation=$_POST['mother_occupation'];
	$no_of_brothers=$_POST['no_of_brothers'];
	$no_of_sisters=$_POST['no_of_sisters'];
	$brother_status=$_POST['brother_status'];
	$sister_status=$_POST['sister_status'];
	$family_location=$_POST['family_location'];
	$family_status=$_POST['family_status'];
	$family_type=$_POST['family_type'];
	$raasi=$_POST['raasi'];
	$paadham=$_POST['paadham'];
	$star=$_POST['star'];
	$having_dosham=$_POST['having_dosham'];
	$dosham_details=implode(",",$_POST['dosham_details']);

	$height=$_POST['height'];
	$weight=$_POST['weight'];
	$body_type=$_POST['body_type'];
	$complexion=$_POST['complexion'];
	$physical_status=$_POST['physical_status'];
	$smoking_habits=$_POST['smoking_habits'];
	$drinking_habits=$_POST['drinking_habits'];
	$eating_habits=$_POST['eating_habits'];
	$about_myself=$_POST['about_myself'];
	$marital_status=$_POST['marital_status'];
	
	$no_of_children=$_POST['no_of_children'];
	$living_with_me=$_POST['living_with_me'];
	$profile_created_for=$_POST['profile_created_for'];
	$disability=$_POST['disability'];
	$food_habits=$_POST['food_habits'];
	$residency_address=$_POST['residency_address'];
	$working_sector=$_POST['working_sector'];
	$hiddenprofile=$_POST['hiddenprofile'];
	$hiddenidproof=$_POST['hiddenidproof'];
	$hiddencoverimg=$_POST['hiddencoverimg'];
	$hiddenhoroscope=$_POST['hiddenhoroscope'];
	$birth_time=$_POST['birth_time'];
	$birth_country=$_POST['birth_country'];
	$birth_state=$_POST['birth_state'];
	$birth_city=$_POST['birth_city'];
	$photo_gallery=count($_FILES["photo_gallery"]["name"]);
	
	$expheight=explode(" ",$height);
	
	$expfeet=explode("ft",$expheight[0]);
	$feet=$expfeet[0];
	
	$expinch=explode("in",$expheight[1]);
	$inch=$expinch[0];
	
	$feet_inch=$feet.".".$inch;
		
	if($profile_image!='')
	{
		$target_dir = "../uploads/profile_image/";
		$target_file = $target_dir . basename($_FILES["profile_image"]["name"]);
		$uploadOk = 1;	
		move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file);
		
		mysqli_query($conn,"update tbl_user set profile_image='".$profile_image."' where user_id='".$_GET['id']."'");
		
	}	
	
	if($profile_image=='' && $hiddenprofile==1)
	{
		$target_dir = "../uploads/profile_image/";
		$target_file = $target_dir . basename($_FILES["profile_image"]["name"]);
		$uploadOk = 1;	
		move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file);
		
		mysqli_query($conn,"update tbl_user set profile_image='' where user_id='".$_GET['id']."'");
		
	}	

	if($id_proof!='')
	{
		
		$target_dir = "../uploads/id_proof/";
		$target_file = $target_dir . basename($_FILES["id_proof"]["name"]);
		$uploadOk = 1;
		
		move_uploaded_file($_FILES["id_proof"]["tmp_name"], $target_file);
		
		mysqli_query($conn,"update tbl_user set id_proof='".$id_proof."' where user_id='".$_GET['id']."'");
		
	}
	
	if($id_proof=='' && $hiddenidproof==1)
	{
		
		$target_dir = "../uploads/id_proof/";
		$target_file = $target_dir . basename($_FILES["id_proof"]["name"]);
		$uploadOk = 1;
		
		move_uploaded_file($_FILES["id_proof"]["tmp_name"], $target_file);
		
		mysqli_query($conn,"update tbl_user set id_proof='' where user_id='".$_GET['id']."'");
		
	}
	/*if($cover_image!='')
	{
		$target_dir = "../uploads/cover_image/";
		$target_file = $target_dir . basename($_FILES["cover_image"]["name"]);
		$uploadOk = 1;
		
		move_uploaded_file($_FILES["cover_image"]["tmp_name"], $target_file);	
		
		mysqli_query($conn,"update tbl_user set cover_image='".$cover_image."' where user_id='".$_GET['id']."'");
		
	}
	
	if($cover_image=='' && $hiddencoverimg==1)
	{
		$target_dir = "../uploads/cover_image/";
		$target_file = $target_dir . basename($_FILES["cover_image"]["name"]);
		$uploadOk = 1;
		
		move_uploaded_file($_FILES["cover_image"]["tmp_name"], $target_file);	
		
		mysqli_query($conn,"update tbl_user set cover_image='' where user_id='".$_GET['id']."'");
		
	}*/

	if($horoscope!='')
	{
		$target_dir = "../uploads/horoscope/";
		$target_file = $target_dir . basename($_FILES["horoscope"]["name"]);
		$uploadOk = 1;
		
		move_uploaded_file($_FILES["horoscope"]["tmp_name"], $target_file);	
		
		mysqli_query($conn,"update tbl_user set horoscope='".$horoscope."' where user_id='".$_GET['id']."'");
		
	}
	
	if($horoscope=='' && $hiddenhoroscope==1)
	{
		$target_dir = "../uploads/horoscope/";
		$target_file = $target_dir . basename($_FILES["horoscope"]["name"]);
		$uploadOk = 1;
		
		move_uploaded_file($_FILES["horoscope"]["tmp_name"], $target_file);	
		
		mysqli_query($conn,"update tbl_user set horoscope='' where user_id='".$_GET['id']."'");
		
	}

	if($photo_gallery!='')
	{
		
		$target_dir = "../uploads/photo_gallery/";
		
		$expgallery=count($_FILES["photo_gallery"]["name"]);
		
		
		
		for($i=0;$i<$expgallery;$i++)
		{
		
				$photo_gallery=$_FILES["photo_gallery"]["name"][$i];
				$target_file = $target_dir . basename($_FILES["photo_gallery"]["name"][$i]);
				$uploadOk = 1;
				
				move_uploaded_file($_FILES["photo_gallery"]["tmp_name"][$i], $target_file);	
				if($_FILES["photo_gallery"]["name"][$i]!='')
				{
					mysqli_query($conn,"insert into tbl_gallery (gallery,user_id) values ('".$photo_gallery."','".$_GET['id']."')");
				}

		}

	}
	
	if($_GET['id']=='')
	{
	    
		$sql = mysqli_query($conn,"INSERT INTO tbl_user (name,email,password,gender,dob,age,religion,mother_tongue,mobile_number,nationality,country,state,home_city,education,college,occupation,office_details,max_income,min_income,caste,sub_caste,father_name,mother_name,father_occupation,mother_occupation,no_of_brothers,family_status,family_type,raasi,star,having_dosham,willing_other_community,dosham_details,height,weight,body_type,complexion,physical_status,smoking_habits,drinking_habits,eating_habits,about_myself,marital_status,no_of_children,living_with_me,profile_created_for,disability,residency_address,working_sector,paadham,feet_inch,birth_time,birth_country,birth_state,birth_city,no_of_sisters,brother_status,sister_status,family_location) VALUES ('".$name."','".$email."','".$password."','".$gender."','".$dob."','".$age."','".$religion."','".$mother_tongue."','".$mobile_number."','".$nationality."','".$country."','".$state."','".$home_city."','".$education."','".$college."','".$occupation."','".$office_details."','".$max_income."','".$min_income."','".$caste."','".$sub_caste."','".$father_name."','".$mother_name."','".$father_occupation."','".$mother_occupation."','".$no_of_brothers."','".$family_status."','".$family_type."','".$raasi."','".$star."','".$having_dosham."','".$willing_other_community."','".$dosham_details."','".$height."','".$weight."','".$body_type."','".$complexion."','".$physical_status."','".$smoking_habits."','".$drinking_habits."','".$eating_habits."','".$about_myself."','".$marital_status."','".$no_of_children."','".$living_with_me."','".$profile_created_for."','".$disability."','".$residency_address."','".$working_sector."','".$paadham."','".$feet_inch."','".$birth_time."','".$birth_country."','".$birth_state."','".$birth_city."','".$no_of_sisters."','".$brother_status."','".$sister_status."','".$family_location."')");
		
		
		$insert_id=mysqli_insert_id($conn);
		 
		header('Location:addmember.php?id='.$insert_id."&status=0");
	}
	else
	{
		
		$getplanid=mysqli_fetch_array(mysqli_query($conn,"select plan_id from tbl_membership_user where user_id='".$_GET['id']."' and status=0"));
		
		$plan_id=$getplanid['plan_id'];
		
		$getcategory=mysqli_fetch_array(mysqli_query($conn,"select category from tbl_plan where id='".$plan_id."'"));
		
		if($getcategory['category']=='premium')
		{
			$getrow=mysqli_query($conn,"select * from tbl_user_temp where user_id='".$_GET['id']."'");
			$getcount=mysqli_num_rows($getrow);
			if($getcount==0)
			{
				$sql = mysqli_query($conn,"INSERT INTO tbl_user_temp (name,email,password,gender,dob,age,religion,mother_tongue,mobile_number,nationality,country,state,home_city,education,college,occupation,office_details,max_income,min_income,caste,sub_caste,father_name,mother_name,father_occupation,mother_occupation,no_of_brothers,family_status,family_type,raasi,star,having_dosham,willing_other_community,dosham_details,height,weight,body_type,complexion,physical_status,smoking_habits,drinking_habits,eating_habits,about_myself,marital_status,no_of_children,living_with_me,profile_created_for,disability,residency_address,working_sector,user_id,paadham,feet_inch,birth_time,birth_country,birth_state,birth_city,no_of_sisters,brother_status,sister_status,family_location) VALUES ('".$name."','".$email."','".$password."','".$gender."','".$dob."','".$age."','".$religion."','".$mother_tongue."','".$mobile_number."','".$nationality."','".$country."','".$state."','".$home_city."','".$education."','".$college."','".$occupation."','".$office_details."','".$max_income."','".$min_income."','".$caste."','".$sub_caste."','".$father_name."','".$mother_name."','".$father_occupation."','".$mother_occupation."','".$no_of_brothers."','".$family_status."','".$family_type."','".$raasi."','".$star."','".$having_dosham."','".$willing_other_community."','".$dosham_details."','".$height."','".$weight."','".$body_type."','".$complexion."','".$physical_status."','".$smoking_habits."','".$drinking_habits."','".$eating_habits."','".$about_myself."','".$marital_status."','".$no_of_children."','".$living_with_me."','".$profile_created_for."','".$disability."','".$residency_address."','".$working_sector."','".$_GET['id']."','".$paadham."','".$feet_inch."','".$birth_time."','".$birth_country."','".$birth_state."','".$birth_city."','".$no_of_sisters."','".$brother_status."','".$sister_status."','".$family_location."')");
			}
			else
			{
				$sql = mysqli_query($conn,"Update tbl_user_temp set name='".$name."',email='".$email."',password='".$password."',gender='".$gender."',dob='".$dob."',age='".$age."',religion='".$religion."',mother_tongue='".$mother_tongue."',mobile_number='".$mobile_number."',nationality='".$nationality."',country='".$country."',state='".$state."',home_city='".$home_city."',education='".$education."',college='".$college."',occupation='".$occupation."',office_details='".$office_details."',max_income='".$max_income."',min_income='".$min_income."',caste='".$caste."',sub_caste='".$sub_caste."',father_name='".$father_name."',mother_name='".$mother_name."',father_occupation='".$father_occupation."',mother_occupation='".$mother_occupation."',no_of_brothers='".$no_of_brothers."',family_status='".$family_status."',family_type='".$family_type."',raasi='".$raasi."',star='".$star."',having_dosham='".$having_dosham."',willing_other_community='".$willing_other_community."',dosham_details='".$dosham_details."',height='".$height."',weight='".$weight."',body_type='".$body_type."',complexion='".$complexion."',physical_status='".$physical_status."',smoking_habits='".$smoking_habits."',drinking_habits='".$drinking_habits."',eating_habits='".$eating_habits."',about_myself='".$about_myself."',marital_status='".$marital_status."',no_of_children='".$no_of_children."',living_with_me='".$living_with_me."',profile_created_for='".$profile_created_for."',disability='".$disability."',residency_address='".$residency_address."',working_sector='".$working_sector."',paadham='".$paadham."',feet_inch='".$feet_inch."',birth_time='".$birth_time."',birth_country='".$birth_country."',birth_state='".$birth_state."',birth_city='".$birth_city."',no_of_sisters='".$no_of_sisters."',brother_status='".$brother_status."',sister_status='".$sister_status."',family_location='".$family_location."' where user_id='".$_GET['id']."'");
				
				
			}
			
			header('Location:addmember.php?id='.$_GET["id"]."&status=0");
		}
		else
		{
			
			$sql = mysqli_query($conn,"Update tbl_user set name='".$name."',email='".$email."',password='".$password."',gender='".$gender."',dob='".$dob."',age='".$age."',religion='".$religion."',mother_tongue='".$mother_tongue."',mobile_number='".$mobile_number."',nationality='".$nationality."',country='".$country."',state='".$state."',home_city='".$home_city."',education='".$education."',college='".$college."',occupation='".$occupation."',office_details='".$office_details."',max_income='".$max_income."',min_income='".$min_income."',caste='".$caste."',sub_caste='".$sub_caste."',father_name='".$father_name."',mother_name='".$mother_name."',father_occupation='".$father_occupation."',mother_occupation='".$mother_occupation."',no_of_brothers='".$no_of_brothers."',family_status='".$family_status."',family_type='".$family_type."',raasi='".$raasi."',star='".$star."',having_dosham='".$having_dosham."',willing_other_community='".$willing_other_community."',dosham_details='".$dosham_details."',height='".$height."',weight='".$weight."',body_type='".$body_type."',complexion='".$complexion."',physical_status='".$physical_status."',smoking_habits='".$smoking_habits."',drinking_habits='".$drinking_habits."',eating_habits='".$eating_habits."',about_myself='".$about_myself."',marital_status='".$marital_status."',no_of_children='".$no_of_children."',living_with_me='".$living_with_me."',profile_created_for='".$profile_created_for."',disability='".$disability."',residency_address='".$residency_address."',working_sector='".$working_sector."',paadham='".$paadham."',feet_inch='".$feet_inch."',birth_time='".$birth_time."',birth_country='".$birth_country."',birth_state='".$birth_state."',birth_city='".$birth_city."',no_of_sisters='".$no_of_sisters."',brother_status='".$brother_status."',sister_status='".$sister_status."',family_location='".$family_location."' where user_id='".$_GET['id']."'");
			
			
						
			header('Location:addmember.php?id='.$_GET["id"]."&status=0");
		
		}
		
		
	}
	

/* if($_GET['type']=='paid')
{
	header('Location:activetopaid.php');
}
else if($_GET['type']=='highlight')
{
	header('Location:highlighter.php');
}
else{
	header('Location:members.php?type='.$_GET["type"]);
} */

								
}


if($_POST['addpreference']=='Add Partner Preference')
{
	
	$gender=$_POST['partnergender'];
	$min_age=$_POST['min_age'];
	$max_age=$_POST['max_age'];
	$min_height=$_POST['min_height'];
	$max_height=$_POST['max_height'];
	$min_weight=$_POST['min_weight'];
	$max_weight=$_POST['max_weight'];
	$caste=$_POST['partnercaste'];
	$sub_caste=$_POST['partnersub_caste'];
	$marital_status	=$_POST['partnermarital_status']; 
	$education=$_POST['partnereducation'];
	$min_income=$_POST['partnermin_income'];
	$max_income=$_POST['partnermax_income'];
	
	
	$expminheight=explode(" ",$min_height);
	
	$expminfeet=explode("ft",$expminheight[0]);
	$min_feet=$expminfeet[0];
	
	$expmininch=explode("in",$expminheight[1]);
	$min_inch=$expmininch[0];
	
	
	$min_feet_inch=$min_feet.".".$min_inch;
	
	$expmaxheight=explode(" ",$max_height);
	
	$expmaxfeet=explode("ft",$expmaxheight[0]);
	$max_feet=$expmaxfeet[0];
	
	$expmaxinch=explode("in",$expmaxheight[1]);
	$max_inch=$expmaxinch[0];
	
	$max_feet_inch=$max_feet.".".$max_inch;
	
	/* if($_POST['partnereducation']!=='')
	{
		$education=implode(",",$geteducation);
	}
	else
	{
		$education='';
	} */
	$profession=$_POST['partnerprofession'];
	/* if($_POST['profession']!=='')
	{
		$profession=implode(",",$getprofession);
	}
	else
	{
		$profession='';
	} */
	
	$mother_tongue=$_POST['partnermother_tongue'];
	
	$raasi=$_POST['partnerraasi'];
	
	$natchathiram=$_POST['partnernatchathiram'];
	$paadham=$_POST['partnerpaadham'];
	$dosham=$_POST['partnerdosham'];
	$physical_status=$_POST['partnerphysical_status'];
	$nationality=$_POST['partnernationality'];
	$state=$_POST['partnerstate'];
	$country=$_POST['partnercountry'];
	$preferred_cities=$_POST['partnerpreferred_cities'];
	$having_dosham=$_POST['partnerhaving_dosham'];
	
	$getrow=mysqli_query($conn,"select * from tbl_partners where user_id='".$_GET['id']."'");
	$rowcount=mysqli_num_rows($getrow);
	//echo "select * from tbl_partners where user_id='".$user_id."'";exit;
	if($rowcount==0)
	{
		$sql = mysqli_query($conn,"INSERT INTO tbl_partners (gender,min_age,max_age,min_height,max_height,min_weight,max_weight,caste,sub_caste,marital_status,mother_tongue,raasi,natchathiram,paadham,dosham,education,profession,physical_status,nationality,country,preferred_cities,having_dosham,user_id,state,min_feet_inch,max_feet_inch,min_income,max_income) VALUES ('".$gender."','".$min_age."','".$max_age."','".$min_height."','".$max_height."','".$min_weight."','".$max_weight."','".$caste."','".$sub_caste."','".$marital_status."','".$mother_tongue."','".$raasi."','".$natchathiram."','".$paadham."','".$dosham."','".$education."','".$profession."','".$physical_status."','".$nationality."','".$country."','".$preferred_cities."','".$having_dosham."','".$_GET['id']."','".$state."','".$min_feet_inch."','".$max_feet_inch."','".$min_income."','".$max_income."')");
	}
	else
	{
		$sql = mysqli_query($conn,"Update tbl_partners set gender='".$gender."',min_age='".$min_age."',max_age='".$max_age."',min_height='".$min_height."',max_height='".$max_height."',min_weight='".$min_weight."',max_weight='".$max_weight."',caste='".$caste."',sub_caste='".$sub_caste."',marital_status='".$marital_status."',mother_tongue='".$mother_tongue."',raasi='".$raasi."',natchathiram='".$natchathiram."',paadham='".$paadham."',dosham='".$dosham."',education='".$education."',profession='".$profession."',physical_status='".$physical_status."',nationality='".$nationality."',country='".$country."',preferred_cities='".$preferred_cities."',having_dosham='".$having_dosham."',state='".$state."',min_feet_inch='".$min_feet_inch."',max_feet_inch='".$max_feet_inch."',min_income='".$min_income."',max_income='".$max_income."' where user_id='".$_GET['id']."'");

	}

header('Location:addmember.php?id='.$_GET["id"]."&status=0");
	
}

$query=mysqli_query($conn,"select * from tbl_user where user_id='".$_GET['id']."'");
$getdata=mysqli_fetch_array($query);

$getpartnerdata=mysqli_query($conn,"select * from tbl_partners where user_id='".$_GET['id']."'");
$fetchpartnerdata=mysqli_fetch_array($getpartnerdata);

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

 <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/base/jquery-ui.css" rel="stylesheet">
 
 <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
 
 
<script>
$(document).ready(function() {
	$('#member').DataTable( {
		
	} );
	var mstatus='<?php echo $getdata['marital_status']; ?>';
	if(mstatus !='unmarried')
	{
		document.getElementById('noofdiv').style.display='block';
		document.getElementById('livingwithdiv').style.display='block';
	}
	else{
		document.getElementById('noofdiv').style.display='none';
		document.getElementById('livingwithdiv').style.display='none';
	}
	<?php if($_GET['id']=='') {  ?>
	document.getElementById('addbasic').style.visibility='visible';
	<?php } ?>
	var type3="user";
	var type4="partner";
	var type5="birth";
	
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


var id2 ="<?php echo $getdata['birth_state']; ?>";
	
	$.ajax({
	url: 'ajaxgetcity.php',
	type: 'GET',
	data: { state_id: id2,types:type5} ,
	contentType: 'application/json; charset=utf-8',
	success: function (response) {

		document.getElementById("birthcitydiv").innerHTML='';
		document.getElementById("birthcitydiv").innerHTML=response;
		document.getElementById('birth_city').value="<?php echo $getdata['birth_city']; ?>";
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
                        <h4 class="page-title"> <a href="index.php">Edit Member</a></h4>
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
                            <div class="r-icon-stats">
                          <div class="row" >
						  
                    <div class="col-sm-12">
					<div align="right"><a href="javascript:void(0)" align="right" onclick="enableedit()"><b>(Edit Member)</b></a>
						  </div>
					<!--div align="right"><a href="members.php?type=all.php" align="right"><b><i class="fa fa-backward" aria-hidden="true"></i>Back</b></a>
						  </div-->
                        <div class="white-box">
						
                             <form method="post" name="user_detail" id="user_detail" enctype="multipart/form-data">
                        	
							
								<div id="tabs">
								<ul>
									<li><a href="#basic">Basic Details</a>
									</li>
									<li><a href="#educationdiv">Education / Profession</a>
									</li>
									<li><a href="#family">Family Details</a>
									</li>
									<li><a href="#religious">Religious</a>
									</li>
									<li><a href="#location">Location</a>
									</li>
									<li><a href="#uploads">Upload Photos</a>
									</li>
									
									<li><a href="#partner">Partner Preference</a>
									</li>
								</ul>
								<div id="basic">
								<br>
								<br>
									<div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3 style="color:green;">
                                   		<b>Basic Details</b>
                                	</h3>
                                </div>
                            </div>
							<br><br>
							<?php 

								$expdata=explode(" ",$getdata['name']);

								$firstname=$expdata[0];
								$lastname=$expdata[1];
							?>
                            <div class="row">
                    			<div class="col-md-6 col-xs-12">
                            		<div class="form-group">
                                		<label>
                                    		First Name:
                                   	 	</label>
                                    	<input type="text" class="form-control" required data-validetta="required" value="<?php echo $firstname; ?>" name="firstname" id="firstname">
                                	</div>
                                    <div class="form-group">
                                		<label>
                                    		Email Id:
                                   	 	</label>
                                    	<input type="text" class="form-control" required data-validetta="required" value="<?php echo $getdata['email']; ?>" name="email" id="email">
                                	</div>
                                    <div class="form-group">
                                		<label>
                                    		Age:
                                   	 	</label>
                                    	<input type="text" class="form-control" data-validetta="required" value="<?php echo $getdata['age']; ?>" name="age" id="age">
                                        <div id="email_status"></div>
                                	</div>
                                    <!-- mobile pic here -->
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
										<script>	
											document.getElementById('height').value="<?php echo $getdata['height']; ?>";
										</script>	
                                	</div>
                                    
                                    <!-- religion here -->
                                    
                                    <div class="form-group">
                                		<label>
                                    		Eating Habits:
                                   	 	</label>
                                    	<select class="form-control" name="eating_habits" id="eating_habits">
                                            	<option value="Occasionally Non-Veg" >Occasionally Non-Veg</option>
                                                <option value="Veg" >Veg</option>
                                                <option value="Eggetarian" >Eggetarian</option>
                                                <option value="Occasionally Non-Veg" >Occasionally Non-Veg</option>
                                                <option value="Non-Veg" >Non-Veg</option>
                                            </select>
                                	</div>
									<script>	
											document.getElementById('eating_habits').value="<?php echo $getdata['eating_habits']; ?>";
									</script>	
                                    <div class="form-group">
                                		<label>
                                    		Smoke Habits:
                                   	 	</label>
                                    	<select class="form-control" name="smoking_habits" id="smoking_habits">
                                            	<option value="no" >No</option>
                                                 <option value="yes" >Yes</option>
                                                 <option value="occasionally" >Occasionally</option>
                                            </select>
                                	</div>
									
									<!--<div class="form-group">
                                		<label>
                                    		food_habits
                                   	 	</label>
                                    	<select class="form-control" name="food_habits" id="food_habits">
											<option value="Occasionally Non-Veg" >Occasionally Non-Veg</option>
											<option value="Veg" >Veg</option>
											<option value="Eggetarian" >Eggetarian</option>
											<option value="Occasionally Non-Veg" >Occasionally Non-Veg</option>
											<option value="Non-Veg" >Non-Veg</option>
										</select>
										<script>	
											document.getElementById('food_habits').value="<?php echo $getdata['food_habits']; ?>";
										</script>	
                                	</div>-->
                                    
									
									
									<div class="form-group">
                                		<label>
                                    		Mobile No
                                   	 	</label>
                                    	<input type="text" class="form-control" required data-validetta="required" value="<?php echo $getdata['mobile_number']; ?>" name="mobile_number" id="mobile_number">
                                	</div>
									
									<div class="form-group">
                                		<label>
                                    		Physical Status
                                   	 	</label>
                                    	<select class="form-control" name="physical_status" id="physical_status">
                                        <option value="normal" >Normal</option>
                                        <option value="physically challenged" >Physically Challenged</option>
                                        <option value="does not matter" >Does not Matter</option>
                                         </select>
                                	</div>
									<script>	
											document.getElementById('physical_status').value="<?php echo $getdata['physical_status']; ?>";
									</script>
									
									 <div class="form-group">
                                		<label>
                                    		Disability
                                   	 	</label>
                                    	<select class="form-control" name="disability" id="disability">
                                        <option value="yes" >Yes</option>
                                        <option value="no" >No</option>
                                        <option value="dont't wish to specify" >Dont't wish to specify</option>
                                            </select>

											<script>	
											document.getElementById('disability').value="<?php echo $getdata['disability']; ?>";
										</script>
                                	</div>
									
									<div class="form-group">
                                		<label>
                                    		Marital  Status:
                                   	 	</label>
                                    	<select class="form-control" data-validetta="required" name="marital_status" id="marital_status" onchange="getdetails(this.value)">
                                       <option value="">Select Your Marital Status</option>
                                    	<option value="unmarried" >Unmarried</option>
                                        <option value="married" >Married</option>
                                        <option value="divorced" >Divorced</option>
                                        <option value="widowed" >Widowed</option>
                                        <option value="others" >Others</option>
                                        </select>
										<script>	
											document.getElementById('marital_status').value="<?php echo $getdata['marital_status']; ?>";
										</script>	
                                	</div>
									
									<script>
									function getdetails(type)
									{
										if(type!='unmarried')
										{
											document.getElementById('noofdiv').style.display='block';
											document.getElementById('livingwithdiv').style.display='block';
										}
										else{
											document.getElementById('noofdiv').style.display='none';
											document.getElementById('livingwithdiv').style.display='none';
										}
									}
									</script>
									
									<div class="form-group" style="display:none" id="noofdiv">
                                		<label>
                                    		No of Children:
                                   	 	</label>
											<select class="form-control" name="no_of_children" id="no_of_children">
											<option value="0" >0</option>
											<option value="1" >1</option>
											<option value="2" >2</option>
											<option value="3" >3</option>
											<option value="4" >4</option>
											<option value="5" >5</option>
											<option value="6" >6</option>
											
										</select>
										<script>	
											document.getElementById('no_of_children').value="<?php echo $getdata['no_of_children']; ?>";
										</script>	
                                	</div>
									                                    
                            	</div>
                                
                                
                                <div class="col-md-6 col-xs-12">
                            		
                                    <div class="form-group">
                                		<label>
                                    		Last Name:
                                   	 	</label>
												<input type="text" class="form-control" value="<?php echo $lastname; ?>" name="lastname" id="lastname" data-validetta="required">
										</div>
										  <div class="form-group">
                                		<label>
                                    		Password: <span toggle="#password" required class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                   	 	</label>
												<input type="password" class="form-control" value="<?php echo $getdata['password']; ?>" name="password" id="password" data-validetta="required">
										</div>
										<script>
										$(".toggle-password").click(function() {

										  $(this).toggleClass("fa-eye fa-eye-slash");
										  var input = $($(this).attr("toggle"));
										  
										  if (input.attr("type") == "password") {
											input.attr("type", "text");
										  } else {
											input.attr("type", "password");
										  }
										});
										</script>
                                    <div class="form-group">
                                		<label>
                                    		Date of Birth:
                                   	 	</label>
                                       <input type="date" name="dob" id="dob"  class="form-control" value="<?php echo $getdata['dob']; ?>">
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

											<script>	
											document.getElementById('weight').value="<?php echo $getdata['weight']; ?>";
										</script>
                                	</div>
									<div class="form-group">
                                		<label>
                                    		Gender:
                                   	 	</label>
                                    	<select class="form-control" required data-validetta="required" name="gender" id="gender">
                                        	<option value="">
                                            	Select Gender
                                            </option>
                                        	<option value="female" >
                                            	Female
                                            </option>
                                            <option value="male" > 
                                            	Male
                                            </option>
                                        </select>
											<script>	
											document.getElementById('gender').value="<?php echo $getdata['gender']; ?>";
										</script>
                                	</div>
                                    
                                    <div class="form-group">
                                		<label>
                                    		Mother Tongue:
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
											document.getElementById('mother_tongue').value="<?php echo $getdata['mother_tongue']; ?>";
										</script>
                                	</div>
                                                                      
                                    <div class="form-group">
                                		<label>
                                    		Drink Habits:
                                   	 	</label>
                                    	<select  class="form-control" name="drinking_habits" id="drinking_habits">
												<option value="no" >No</option>
                                                 <option value="yes" >Yes</option>
                                                 <option value="occasionally"  >Occasionally</option>
            							    </select>
											<script>	
											document.getElementById('drinking_habits').value="<?php echo $getdata['drinking_habits']; ?>";
										</script>
                                	</div>
                                    <div class="form-group">
                                		<label>
                                    		Body Type:
                                   	 	</label>
                                    	<select class="form-control" name="body_type" id="body_type">
                                        	<option value="slim" >Slim</option>
                                                 <option value="fat" >Fat</option>
                                                 <option value="normal" >Normal</option>
                                                 <option value="don't wish to specify" >Don't wish to specify</option>
                                        </select>
										<script>	
											document.getElementById('body_type').value="<?php echo $getdata['body_type']; ?>";
										</script>
                                	</div>
                                    <div class="form-group">
                                		<label>
                                    		Complexion:
                                   	 	</label>
                                    	<select class="form-control" name="complexion" id="complexion">
                                        	<option value="fair" >Fair</option>
                                                <option value="very fair" >Very Fair</option>
                                                <option value="wheatish" >Wheatish</option>                                                
                                                <option value="dusky" >Dusky</option>
                                                <option value="others" >Others</option>
                                                <option value="don't wish to specify" >Don't wish to specify</option>
                                        </select>
										<script>	
											document.getElementById('complexion').value="<?php echo $getdata['complexion']; ?>";
										</script>
                                	</div>
                                    <div class="form-group">
                                		<label>
                                    		Profile created for
                                   	 	</label>
                                    	<select class="form-control" required name="profile_created_for" id="profile_created_for">
                                        <option value="myself" >Myself</option>
                                        <option value="son" >Son</option>
                                        <option value="daughter" >Daughter</option>
                                        <option value="brother" >Brother</option>
                                        <option value="sister" >Sister</option>
                                        <option value="relative" >Relative</option>
                                        <option value="friend" >Friend</option>
                                        <option value="others" >Others</option>
                                            </select>
										<script>	
											document.getElementById('profile_created_for').value="<?php echo $getdata['profile_created_for']; ?>";
										</script>
                                	</div>
									
									 <div class="form-group" id="livingwithdiv" style="display:none">
                                		<label>
                                    		Children living with me:
                                   	 	</label>
                                    	<select  class="form-control" name="living_with_me" id="living_with_me">
												<option value="no" >No</option>
                                                 <option value="yes" >Yes</option>
            							    </select>
											<script>	
											document.getElementById('living_with_me').value="<?php echo $getdata['living_with_me']; ?>";
										</script>
                                	</div>
									
									
									
                                
                            	</div>
                                
                                <div class="col-xs-12 col-md-12">
                                	<div class="form-group">
                                		<label>
                                    		About Me
                                    	</label>
                                    	<textarea class="form-control" name="about_myself" id="about_myself"><?php echo $getdata['about_myself']; ?></textarea>
                                    </div>
                                    
                                    
                                </div>
                            </div>
							<?php 
							if($_GET['id']=='')
							{
								$visible='visibility:visible';
							}
							else
							{
								$visible='visibility:hidden';
							}
							?>
							<div  class="row" id="addbasic" style="<?php echo $visible;  ?>">
                            	<div class="col-xs-12 col-md-12 text-center">
                            		<input type="submit" class="btn btn-danger btn-flat btn-lg" name="addmember" id="addmember" value="Add Member"> 
                            		<input type="button" onclick="window.location.href='members.php?type=all'" class="btn btn-danger btn-flat btn-lg" name="addmember" id="addmember" value="Cancel"> 
                             	</div>
                            </div>
								</div>
								<?php if($_GET['id']!='' || $_GET['status']==1) { ?>
								<div id="educationdiv">
								<br>
								<br>
									 <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3 style="color:green;">
                                   		<b>Education / Profession Information</b>
                                	</h3>
                                </div>
                            </div>
							<br><br>
                            <div class="row">
                    			<div class="col-md-6 col-xs-12">
                                
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
										<script>
									
											document.getElementById('education').value="<?php echo $getdata['education']; ?>";
											
										</script>
                                	</div>
									
									<div class="form-group">
                                		<label>
                                    		Annual Income:
                                   	 	</label>
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
										<script>	
											document.getElementById('min_income').value="<?php echo $getdata['min_income']; ?>";
										</script>
                                       		</div>
                                       		<div class="col-xs-4">To</div>
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

											<script>	
											document.getElementById('max_income').value="<?php echo $getdata['max_income']; ?>";
										</script>
                                       </div>
									   <br>
									   <div class="form-group">
                                		<label>
                                    		College Name:
                                   	 	</label>
                                    	<input type="text" class="form-control" data-validetta="required" value="<?php echo $getdata['college']; ?>" name="college" id="college">
                                	</div>
                                    </div>
									
                                    
                                    
                                    </div>
                                    <div class="col-md-6 col-xs-12">
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

										<script>	
											document.getElementById('occupation').value="<?php echo $getdata['occupation']; ?>";
										</script>
                                	</div>
																		<div class="form-group">
                                		<label>
                                    		Working Sector:
                                   	 	</label>
											<select class="form-control" name="working_sector" id="working_sector" >
                                            	<option value="public">Public</option>
                                            	<option value="private" >Private</option>
                                            	<option value="own" >Own</option>
                                            </select>
										<script>	
											document.getElementById('working_sector').value="<?php echo $getdata['working_sector']; ?>";
										</script>		
                                	</div>
                                    <div class="form-group">
                                		 <div class="form-group">
                                		<label>
                                    		Office Details:
                                   	 	</label>
                                    	<textarea class="form-control" cols="3" rows="3" name="office_details" id="office_details" ><?php echo $getdata['office_details']; ?></textarea>
                                	</div>
                                	</div>
                                   
                                </div>
                                </div>
								<div  class="row" id="addeducation" style="visibility:hidden">
                            	<div class="col-xs-12 col-md-12 text-center">
                            		<input type="submit" class="btn btn-danger btn-flat btn-lg" name="addmember" id="addmember" value="Add Member"> 
                            		<input type="button" onclick="window.location.href='members.php?type=all'" class="btn btn-danger btn-flat btn-lg" name="addmember" id="addmember" value="Cancel"> 
                             	</div>
                            </div>
								</div>
								<?php } else { ?>
								<div id="educationdiv">
								<p>Please First Fill Basic Details</p>
								</div>
								<?php } ?>
								
								<?php if($_GET['id']!='' || $_GET['status']==1) { ?>
								<div id="family">
								
								<br>
								<br>
									 <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3 style="color:green;">
                                   		<b>Family Details</b>
                                	</h3>
                                </div>
                            </div>
							<br><br>
                           <div class="row">
                    		<div class="col-md-6 col-xs-12">
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
										<script>	
											document.getElementById('family_type').value="<?php echo $getdata['family_type']; ?>";
										</script>							
                                	</div>
                                    <div class="form-group">
                                		<label>
                                    		Father Name:
                                   	 	</label>
                                    	<input type="text" name="father_name" id="father_name" value="<?php echo $getdata['father_name']; ?>" class="form-control" placeholder="Enter Father Name" >
                                	</div>
									
                                    <div class="form-group">
                                		<label>
                                    		Father's Occupation:
                                   	 	</label>
                                    	
										<select class="form-control" name="father_occupation" id="father_occupation" data-validetta="required">
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
										 <option value="home maker" >Home Maker</option>
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
											document.getElementById('father_occupation').value="<?php echo $getdata['father_occupation']; ?>";
										</script>
                                	</div>
									
									<div class="form-group">
                                		<label>
                                    		No of brothers:
                                   	 	</label>
                                        
                                    	<select class="form-control" name="no_of_brothers" id="no_of_brothers">
                                        	<option value="">Select</option>
                                                <option value="0" >0</option>
                                                <option value="1" >1</option>
                                                <option value="2" >2</option>
                                                <option value="3" >3</option>
                                                <option value="4" >4</option>
                                                <option value="4 +" >4 +</option>
                                        </select>
									<script>	
											document.getElementById('no_of_brothers').value="<?php echo $getdata['no_of_brothers']; ?>";
										</script>
                                	</div>
									
									 <div class="form-group">
                                		<label>
                                    		Brothers status:
                                   	 	</label>
                                        
                                    	<input type="text" name="brother_status" id="brother_status" value="<?php echo $getdata['brother_status']; ?>" class="form-control">
									
                                	</div>
									
									<div class="form-group">
                                		<label>
                                    		Family Location:
                                   	 	</label>
                                        
                                    	<input type="text" name="family_location" id="family_location" value="<?php echo $getdata['family_location']; ?>" class="form-control">
									
                                	</div>
                                    
                                    
                                    <!--<div class="form-group">
                                		<label>
                                    	Family Origin:
                                   	 	</label>
                                    	<input type="text" name="family_origin" class="form-control" placeholder="Define Family Origin" value="">
                                	</div>-->
                                 
                             </div>
									<div class="col-md-6 col-xs-12">
									<div class="form-group">
                                		<label>
                                    	Family status:
                                   	 	</label>
                                    	<select class="form-control" name="family_status" id="family_status">
                                            	<option value="">Select Family Status</option>
                                            	<option value="poor" >Poor</option>
                                                <option value="middle class" >Middle Class</option>
                                                <option value="upper middle class" >Upper Middle Class</option>
                                                <option value="rich" >Rich</option>
                                                <option value="very rich" >Very Rich</option>
                                            </select>
											<script>	
											document.getElementById('family_status').value="<?php echo $getdata['family_status']; ?>";
										</script>
                                	</div>
                                    
									<div class="form-group">
                                		<label>
                                    		Mother's Name:
                                   	 	</label>
                                        <input type="text" name="mother_name" id="mother_name" value="<?php echo $getdata['mother_name']; ?>" class="form-control" placeholder="Enter Mother Name" >
                                    	
                                	</div>
                                    <div class="form-group">
                                		<label>
                                    		Mother's Occupation:
                                   	 	</label>
                                    	
										<select class="form-control" name="mother_occupation" id="mother_occupation" data-validetta="required">
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
										 <option value="home maker" >Home Maker</option>
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
											document.getElementById('mother_occupation').value="<?php echo $getdata['mother_occupation']; ?>";
										</script>
										
										
                                	</div>
									
									<div class="form-group">
                                		<label>
                                    		No of sisters:
                                   	 	</label>
                                        
                                    	<select class="form-control" name="no_of_sisters" id="no_of_sisters">
                                        	<option value="">Select</option>
                                                <option value="0" >0</option>
                                                <option value="1" >1</option>
                                                <option value="2" >2</option>
                                                <option value="3" >3</option>
                                                <option value="4" >4</option>
                                                <option value="4 +" >4 +</option>
                                        </select>
									<script>	
											document.getElementById('no_of_sisters').value="<?php echo $getdata['no_of_sisters']; ?>";
										</script>
                                	</div>
                                   
								   <div class="form-group">
                                		<label>
                                    		Sisters status:
                                   	 	</label>
                                        
                                    	<input type="text" name="sister_status" id="sister_status" value="<?php echo $getdata['sister_status']; ?>" class="form-control">
									
                                	</div>
                                   
                                  
                                </div>
                                </div>
								<div  class="row" id="addfamily" style="visibility:hidden">
                            	<div class="col-xs-12 col-md-12 text-center">
                            		<input type="submit" class="btn btn-danger btn-flat btn-lg" name="addmember" id="addmember" value="Add Member"> 
                            		<input type="button" onclick="window.location.href='members.php?type=all'" class="btn btn-danger btn-flat btn-lg" name="addmember" id="addmember" value="Cancel"> 
                             	</div>
                            </div>
								</div>
								
								<?php } else { ?>
								<div id="family">
								<p>Please First Fill Basic Details</p>
								</div>
								<?php } ?>
								
								
								<?php if($_GET['id']!='' || $_GET['status']==1) { ?>
								<div id="religious">
								<br>
								<br>
									 <div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3 style="color:green;">
                                   	<b>	Religious Information </b>
                                	</h3>
                                </div>
                            </div>
							<br><br>
                            <div class="row">
                    			<div class="col-md-6 col-xs-12">
                           
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
										<script>	
											document.getElementById('religion').value="<?php echo $getdata['religion']; ?>";
										</script>
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
                                    	
                                	</div>
									
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
                                    <div class="form-group">
                                		<label>
                                    		Sub caste:
                                   	 	</label>
										<div id="subcastediv">
										<select class="form-control" name="sub_caste" id="sub_caste" data-validetta="required" >
										</select>
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
											document.getElementById('having_dosham').value="<?php echo $getdata['having_dosham']; ?>";
										</script>
                                	</div>

									<div class="form-group">
                                		<label>
                                    		Willing to marry other community:
                                   	 	</label>
										<select class="form-control"  name="willing_other_community" id="willing_other_community">
                                       <option value="yes">Yes</option>
										<option value="no" >No</option>
                                        </select>

										<script>	
											document.getElementById('willing_other_community').value="<?php echo $getdata['willing_other_community']; ?>";
										</script>
                                	</div>
									
									<div class="form-group">
                                		<label>
                                    		Birth State:
                                   	 	</label>
                                    	<select class="form-control" name="birth_state" id="birth_state" data-validetta="required" onchange="getcity(this.value,'birth')">
										<?php 
										$getstate=mysqli_query($conn,"select * from tbl_state");
												
										while($state=mysqli_fetch_array($getstate)) { 
										?>
                                         <option value="<?php echo $state['id']; ?>"><?php echo $state['state']; ?></option>   
										<?php } ?>                                   
                                    </select>
									
									<script>	
									
											document.getElementById('birth_state').value="<?php echo $getdata['birth_state']; ?>";
										</script>	
									
                                	</div>
									
									<div class="form-group">
                                		<label>
                                    		Birth Time:
                                   	 	</label>
										<input id="birth_time" name="birth_time" data-default="20:48" class="form-control" value="<?php echo $getdata['birth_time']; ?>">
                                	</div>
                                  
                                    </div>
									<link href="https://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
									<script src="https://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.js"></script>
									<script>
									var input = $('#birth_time');
									input.clockpicker({
									   autoclose: true,
									  twelvehour: true
									});
									
									</script>
									
                                    <div class="col-md-6 col-xs-12">
                                    
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

										<script>	
											document.getElementById('star').value="<?php echo $getdata['star']; ?>";
										</script>
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
											document.getElementById('raasi').value="<?php echo $getdata['raasi']; ?>";
										</script>	
                                	</div>
									
									 <div class="form-group">
                                		<label>
                                    		Paadham:
                                   	 	</label>
										
										<select class="form-control" name="paadham" id="paadham">
										<option value="1st padham" >1st Padham</option>
										<option value="2nd padham" >2nd Padham</option>
										<option value="3rd padham" >3rd Padham</option>
										<option value="4th padham" >4th Padham</option>
                                            </select>
											<script>	
											document.getElementById('paadham').value="<?php echo $getdata['paadham']; ?>";
										</script>	
										
										
                                	</div>
                                    
								<div class="form-group">
                                		<label>
                                    		Dhosam Details:
                                   	 	</label>
										
										<select class="form-control" name="dosham_details[]" id="dosham_details" multiple>
										<option value="">Select dhosam</option>
										<option value="chevvai dosham" >Chevvai Dosham</option>
										<option value="naga dosham" >Naga Dosham</option>
										<option value="kaalasarpa dosham" >Kaalasarpa Dosham</option>
										<option value="ketu dosham" >Ketu Dosham</option>
										<option value="rahu dosham" >Rahu Dosham</option>
										<option value="kalathra dosham" >Kalathra Dosham</option>
                                            </select>
										<script>
										var values="<?php echo $getdata['dosham_details']; ?>";
										
											$.each(values.split(","), function(i,e){
												$("#dosham_details option[value='" + e + "']").prop("selected", true);
											});
										</script>
                                	</div>	
									
									<div class="form-group">
                                		<label>
                                    		Birth Country:
                                   	 	</label>
                                    	<select class="form-control" name="birth_country" id="birth_country" data-validetta="required">
                                        <option value="">Select Your Country</option>
								   <option value="india" >India</option>
								   
									</select>
									<script>	
											document.getElementById('birth_country').value="<?php echo $getdata['birth_country']; ?>";
										</script>	
								<div id="status123"></div>
									</div>
									
									
									 <div class="form-group">
									<label>
										Birth City
									</label>
									<div id="birthcitydiv">
										<select class="form-control" name="birth_city" id="birth_city" data-validetta="required" >
										</select>
										
										</div>
								</div>
                                </div>
                                </div>
								<div  class="row" id="addreligious" style="visibility:hidden">
                            	<div class="col-xs-12 col-md-12 text-center">
                            		<input type="submit" class="btn btn-danger btn-flat btn-lg" name="addmember" id="addmember" value="Add Member"> 
                            		<input type="button" onclick="window.location.href='members.php?type=all'" class="btn btn-danger btn-flat btn-lg" name="addmember" id="addmember" value="Cancel"> 
                             	</div>
                            </div>
								</div>
								
								<?php } else { ?>
								<div id="religious">
								<p>Please First Fill Basic Details</p>
								</div>
								<?php } ?>
								
								<?php if($_GET['id']!='' || $_GET['status']==1) { ?>
								<div id="location">
								<br>
								<br>
									<div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3 style="color:green;">
                                   		<b>Location Information </b>
                                	</h3>
                                </div>
                            </div>
							<br><br>
                            <div class="row">
                    			<div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                		<label>
                                    		Country:
                                   	 	</label>
                                    	<select class="form-control" name="country" id="country" data-validetta="required">
                                        <option value="">Select Your Country</option>
								   <option value="india" >India</option>
								   
									</select>
									<script>	
											document.getElementById('country').value="<?php echo $getdata['country']; ?>";
										</script>	
								<div id="status123"></div>
									</div>
                                    <div class="form-group">
                                		<label>
                                    		State:
                                   	 	</label>
                                    	<select class="form-control" name="state" id="state" data-validetta="required" onchange="getcity(this.value,'user')">
										<?php 
										$getstate=mysqli_query($conn,"select * from tbl_state");
												
										while($state=mysqli_fetch_array($getstate)) { 
										?>
                                         <option value="<?php echo $state['id']; ?>"><?php echo $state['state']; ?></option>   
										<?php } ?>                                   
                                    </select>
									
									<script>	
									
										function getcity(id,type)
										{
											$.ajax({
											url: 'ajaxgetcity.php',
											type: 'GET',
											data: { state_id: id,types:type} ,
											contentType: 'application/json; charset=utf-8',
											success: function (response) {

												if(type=='user')
												{
													document.getElementById("citydiv").innerHTML='';
													document.getElementById("citydiv").innerHTML=response;
												}
												else if(type=='birth')
												{
													
													document.getElementById("birthcitydiv").innerHTML='';
													document.getElementById("birthcitydiv").innerHTML=response;
												}
												else
												{
													document.getElementById("partnercitydiv").innerHTML='';
													document.getElementById("partnercitydiv").innerHTML=response;
												}
												
											},
											error: function () {
												alert("error");
											}
										}); 
										}
										
											document.getElementById('state').value="<?php echo $getdata['state']; ?>";
										</script>	
									
                                	</div>
                                   
                                    <div class="form-group">
                                		<label>
                                    		Residency Address:
                                   	 	</label>
                                    	<textarea class="form-control" cols="3" rows="3" name="residency_address" id="residency_address" ><?php echo $getdata['residency_address']; ?></textarea>
                                	</div>
                                    
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                    
                                    <div class="form-group">
                                		<label>
                                    		Nationality:
                                   	 	</label>
										
										<select class="form-control" name="nationality" id="nationality" data-validetta="required">
                                        <option value="">Select Your Nationality</option>
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
											document.getElementById('nationality').value="<?php echo $getdata['nationality']; ?>";
										</script>
										
                                	</div>
									
                                    <div class="form-group">
                                		<label>
                                    		Home City
                                   	 	</label>
                                        <div id="citydiv">
										<select class="form-control" name="home_city" id="home_city" data-validetta="required" >
										</select>
										
										</div>
                                	</div>
                                    
                                </div>
                                </div>
								<div  class="row" id="addlocation" style="visibility:hidden">
                            	<div class="col-xs-12 col-md-12 text-center">
                            		<input type="submit" class="btn btn-danger btn-flat btn-lg" name="addmember" id="addmember" value="Add Member"> 
                            		<input type="button" onclick="window.location.href='members.php?type=all'" class="btn btn-danger btn-flat btn-lg" name="addmember" id="addmember" value="Cancel"> 
                             	</div>
                            </div>
								</div>
								
								<?php } else { ?>
								<div id="location">
								<p>Please First Fill Basic Details</p>
								</div>
								<?php } ?>
								
								
								<?php if($_GET['id']!='' || $_GET['status']==1) { ?>
								<div id="uploads">
								<br>
								<br>
								<div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3 style="color:green;">
                                   		<b>Upload Photos</b>
                                	</h3>
                                </div>
								</div>
								<br><br>
                                <div class="row">
                    				<div class="col-md-6 col-xs-12">
                                    <div class="form-group">
									<label>
                                        
                                    		<b>Profile Image:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="background-color:#01c0c8;cursor:pointer;border-radius:12px;font-size:20px" onclick="hideprofile()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;X&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br><br><br>
                                   	 	</label>
										<input type="hidden" name="hiddenprofile" id="hiddenprofile">
										<div id="profileimgdiv">
										
										<?php 
										if($_GET['id']!='' && $getdata['profile_image']!='') { ?>
										 <img src="../uploads/profile_image/<?php echo $getdata['profile_image'] ?>" width="150" height="150"/>
										 
										<?php }
										else { ?>
										<img src="../images/profile.png" width="150" height="150"/>
										<?php } ?>
										</div>
																				
											<script>
											function hideprofile()
											{
												document.getElementById('profileimgdiv').style.display='none';
												document.getElementById('hiddenprofile').value=1;
											}
											
											function hidehoroscope()
											{
												document.getElementById('horoscopediv').style.display='none';
												document.getElementById('hiddenhoroscope').value=1;
											}
											
											function hidecoveimg()
											{
												document.getElementById('coverimgdiv').style.display='none';
												document.getElementById('hiddencoverimg').value=1;
											}
											
											function hideidproof()
											{
												document.getElementById('idproofdiv').style.display='none';
												document.getElementById('hiddenidproof').value=1;
											}
											</script>
										<br>
										<!--<div style="background-color:red;width:50px;height:50px">  X </div>-->
                                    	<input type="file" name="profile_image" id="profile_image" class="form-control" >
                                    	
                                	</div>
									<br><br>
                                    <div class="form-group">
									<label>
                                    		<b>Horoscope:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="background-color:#01c0c8;cursor:pointer;border-radius:12px;font-size:20px" onclick="hidehoroscope()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;X&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br><br><br>
                                   	 	</label>
										<input type="hidden" name="hiddenhoroscope" id="hiddenhoroscope">
									<div id="horoscopediv">
										<?php 
										if($_GET['id']!='' && $getdata['horoscope']!='') { ?>
										 <img src="../uploads/horoscope/<?php echo $getdata['horoscope'] ?>" width="150" height="150"/>
										 
										<?php }
										else { ?>
										<img src="../images/profile.png" width="150" height="150"/>
										<?php } ?>
								          </div>                          
                                		
										<br>
                                    	<input type="file" name="horoscope" id="horoscope" class="form-control" >
                                	</div>
                                    
                                    
                                    </div>
                                    
                                    <div class="col-md-6 col-xs-12">
									
                            		  <!--<div class="form-group">
									  <label>
                                    		<b>Cover Image:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="background-color:#01c0c8;cursor:pointer;border-radius:12px;font-size:20px" onclick="hidecoveimg()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;X&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                   	 	</label>
										<input type="hidden" name="hiddencoverimg" id="hiddencoverimg">
									  <div id="coverimgdiv">
									<br>	
                                      <?php 
										//if($_GET['id']!='' && $getdata['cover_image']!='') { ?>
										 <img src="../uploads/cover_image/<?php //echo $getdata['cover_image'] ?>" width="150" height="150"/>
										 
										<?php //}
									//	else { ?>
										<img src="../images/profile.png" width="150" height="150"/>
										<?php //} ?>
								            </div>                        
                                		
										<br><br>
                                    	<input type="file" name="cover_image" id="cover_image" class="form-control" >
                                	</div>
									<br><br>-->
									<div class="form-group">
									
									<label>
                                    		<b>Id Proof:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="background-color:#01c0c8;cursor:pointer;border-radius:12px;font-size:20px" onclick="hideidproof()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;X&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br><br><br>
                                   	 	</label>
										<input type="hidden" name="hiddenidproof" id="hiddenidproof">
                                     <div id="idproofdiv">
                                      <?php 
										if($_GET['id']!='' && $getdata['id_proof']!='') { ?>
										 <img src="../uploads/id_proof/<?php echo $getdata['id_proof'] ?>" width="150" height="150"/>
										 
										<?php }
										else { ?>
										<img src="../images/profile.png" width="150" height="150"/>
										<?php } ?>
										</div>
                                		
										<br>
                                    	<input type="file" name="id_proof" id="id_proof" class="form-control" >
                                	</div>
                                   
                                    
                            	</div>
								 
                                
								
								<div class="col-md-6 col-xs-12">
								<br><br>
								<label align="center">
                                    		<b>Photo Gallery:</b>
                                  </label>	
								 <div class="form-group">
								 <br><br>
								 <table style="border:0px;">
								 <tr>
								 
									<?php 
										
										$getpic=mysqli_query($conn,"select * from tbl_gallery where user_id='".$_GET['id']."'");
										$i=1;
										while($fetchpic=mysqli_fetch_array($getpic))
										{
											?>
												<td>
												<img src="../uploads/photo_gallery/<?php echo $fetchpic['gallery'] ?>" width="150" height="150"/>
												</td>
												<td></td>
											<?php if($i==5)
											{  $i=0 ?>
												</tr>
												
											<?php }
											
											$i++;
										}
										?></table>
										
                                		<br>
                                        <input type="file" name="photo_gallery[]" id="photo_gallery" class="form-control" multiple>
											
                                	</div>
                                	</div>
                                	
                            </div>
							<?php ?>
							<div  class="row" id="adduploads" style="visibility:hidden">
                            	<div class="col-xs-12 col-md-12 text-center">
                            		<input type="submit" class="btn btn-danger btn-flat btn-lg" name="addmember" id="addmember" value="Add Member"> 
                            		<input type="button" onclick="window.location.href='members.php?type=all'" class="btn btn-danger btn-flat btn-lg" name="addmember" id="addmember" value="Cancel"> 
                             	</div>
                            </div>
								
								</div>
								
								<?php } else { ?>
								<div id="uploads">
								<p>Please First Fill Basic Details</p>
								</div>
								<?php } ?>
								
								<?php if($_GET['id']!='' || $_GET['status']==1) { ?>
								<div id="partner">
								<br><br>
									
								<div class="row">
                            	<div class="col-md-12 col-xs-12">
                            		<h3 style="color:green;">
                                   		<b>Partner Preference </b>
                                	</h3>
                                </div>
                            </div>
							<br><br>
                            <div class="row">
                    			<div class="col-md-6 col-xs-12">
								<div class="form-group">
                                		<label>
                                    		Partner Gender :
                                   	 	</label>
                                       
                                    	<select class="chosen-select form-control" name="partnergender" id="partnergender" data-validetta="required" >
										<option value="male" >Male</option>
										<option value="female" >Female</option>
                                     </select>
									 <script>	
											document.getElementById('partnergender').value="<?php echo $fetchpartnerdata['gender']; ?>";
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
													document.getElementById('min_age').value="<?php echo $fetchpartnerdata['min_age']; ?>";
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
													document.getElementById('max_age').value="<?php echo $fetchpartnerdata['max_age']; ?>";
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
                                                	 <option value="">0ft 0in</option>
													<option value="4ft">Below 4ft</option>

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
												<script>	
													document.getElementById('min_height').value="<?php echo $fetchpartnerdata['min_height']; ?>";
											</script>
											</div>
											<div class="col-xs-6">
												<select class="form-control" data-validetta="required" name="max_height" id="max_height">
													 <option value="">0ft 0in</option>
                                        	<option value="4ft">Below 4ft</option>

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
												<script>	
													document.getElementById('max_height').value="<?php echo $fetchpartnerdata['max_height']; ?>";
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
													document.getElementById('min_weight').value="<?php echo $fetchpartnerdata['min_weight']; ?>";
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
													document.getElementById('max_weight').value="<?php echo $fetchpartnerdata['max_weight']; ?>";
											</script>
                                       		</div>
                                       </div>
                                    </div>
									
									 <div class="form-group">
                                		<label>
                                    		Having Dhosam:
                                   	 	</label>
										<select class="form-control"  name="partnerhaving_dosham" id="partnerhaving_dosham">
                                       <option value="yes">Yes</option>
										<option value="no" >No</option>
                                        </select>

										<script>	
											document.getElementById('partnerhaving_dosham').value="<?php echo $fetchpartnerdata['having_dosham']; ?>";
										</script>
                                	</div>
									
									<div class="form-group">
                                		<label>
                                    		Dhosam Details:
                                   	 	</label>
										
										<select class="form-control" name="partnerdosham" id="partnerdosham">
										<option value="chevvai dosham" >Chevvai Dosham</option>
										<option value="naga dosham" >Naga Dosham</option>
										<option value="kaalasarpa dosham" >Kaalasarpa Dosham</option>
										<option value="ketu dosham" >Ketu Dosham</option>
										<option value="rahu dosham" >Rahu Dosham</option>
										<option value="kalathra dosham" >Kalathra Dosham</option>
                                            </select>
											<script>	
											document.getElementById('partnerdosham').value="<?php echo $fetchpartnerdata['dosham']; ?>";
										</script>	
										
                                	</div>	
									
									<div class="form-group">
                                		<label>
                                    		Education:
                                   	 	</label>
                                    	<select class="chosen-select form-control" name="partnereducation" id="partnereducation" data-validetta="required" data-placeholder="Select Education">
                                        
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
										document.getElementById('partnereducation').value="<?php echo $fetchpartnerdata['education']; ?>";
											/*var data="<?php echo $fetchpartnerdata['education']; ?>";
											var dataarray=data.split(",");

											// Set the value

											$("#partnereducation").val(dataarray);

											// Then refresh

											$("#partnereducation").multiselect("refresh");*/
											
										</script>
                                	</div>
									
									<div class="form-group">
                                		<label>
                                    		Profession:
                                   	 	</label>
                                    	<select class="form-control" name="partnerprofession" id="partnerprofession" data-validetta="required">
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
											document.getElementById('partnerprofession').value="<?php echo $fetchpartnerdata['profession']; ?>";
										</script>
                                	</div>
									
									<div class="form-group">
                                		<label>
                                    		Annual Income:
                                   	 	</label>
                                       <div class="row">
                                       	 	<div class="col-xs-4">
                                        		<select class="form-control" name="partnermin_income" id="partnermin_income">                                  
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
										<script>	
											document.getElementById('partnermin_income').value="<?php echo $fetchpartnerdata['min_income']; ?>";
										</script>
                                       		</div>
                                        	<div class="col-xs-4">
                                        		<select class="form-control" name="partnermax_income" id="partnermax_income">                                  
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

											<script>	
											document.getElementById('partnermax_income').value="<?php echo $fetchpartnerdata['max_income']; ?>";
										</script>
                                       </div>
                                    </div>
                                   
                                   
                                </div>
                                <div class="col-md-6 col-xs-12">
								
									 <div class="form-group">
                                		<label>
                                    		Caste:
                                   	 	</label>
										
                                        <select class="form-control" name="partnercaste" id="partnercaste" data-validetta="required" onchange="getsubcaste(this.value,'partner')">
										<?php 
										$getcaste=mysqli_query($conn,"select * from tbl_caste");
												
										while($caste=mysqli_fetch_array($getcaste)) { 
										?>
                                         <option value="<?php echo $caste['id']; ?>"><?php echo $caste['caste']; ?></option>   
										<?php } ?>                                   
										</select>
										<script>	
											document.getElementById('partnercaste').value="<?php echo $fetchpartnerdata['caste']; ?>";
										</script>
                                	</div>
                                    <div class="form-group">
                                		<label>
                                    		Sub caste:
                                   	 	</label>
                                    	<div id="partnersubcastediv">
										<select class="form-control" name="partnersub_caste" id="partnersub_caste" data-validetta="required" >
										</select>
										</div>
                                	</div>
                            		
									
                                    
                                     
                                    
                                    <div class="form-group">
                                		<label>
                                    		Raasi:
                                   	 	</label>
                                    	<select class="form-control" name="partnerraasi" id="partnerraasi">
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
											document.getElementById('partnerraasi').value="<?php echo $fetchpartnerdata['raasi']; ?>";
										</script>	
                                	</div>
									
									<div class="form-group">
                                		<label>
                                    		Natchathiram:
                                   	 	</label>
                                    	<select class="form-control"  name="partnernatchathiram" id="partnernatchathiram">
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
											document.getElementById('partnernatchathiram').value="<?php echo $fetchpartnerdata['natchathiram']; ?>";
										</script>
                                	</div> 
									
									 <div class="form-group">
                                		<label>
                                    		Paadham:
                                   	 	</label>
										
										<select class="form-control" name="partnerpaadham" id="partnerpaadham">
										<option value="1st padham" >1st Padham</option>
										<option value="2nd padham" >2nd Padham</option>
										<option value="3rd padham" >3rd Padham</option>
										<option value="4th padham" >4th Padham</option>
                                            </select>
											<script>	
											document.getElementById('partnerpaadham').value="<?php echo $fetchpartnerdata['paadham']; ?>";
										</script>	
										
									
                                	</div>
									
									<div class="form-group">
									<label>
										Looking For :
									</label>

									<select class="form-control" data-validetta="required" name="partnermarital_status" id="partnermarital_status" >
                                       <option value="">Select Your Marital Status</option>
                                    	<option value="unmarried" >Unmarried</option>
                                        <option value="married" >Married</option>
                                        <option value="divorced" >Divorced</option>
                                        <option value="widowed" >Widowed</option>
                                        <option value="others" >Others</option>
                                        </select>
									<script>	
											document.getElementById('partnermarital_status').value="<?php echo $fetchpartnerdata['marital_status']; ?>";
										</script>
									</div>
                                   
                                    
                                    <div class="form-group">
                                		<label>
                                    		Partner Mothertongue :
                                   	 	</label>
                                    	<select id="partnermother_tongue" class="form-control" data-validetta="required" name="partnermother_tongue">
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
											document.getElementById('partnermother_tongue').value="<?php echo $fetchpartnerdata['mother_tongue']; ?>";
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
                                    	<select class="form-control" name="partnerphysical_status" id="partnerphysical_status">
                                        <option value="normal" >Normal</option>
                                        <option value="physically challenged" >Physically Challenged</option>
                                        <option value="does not matter" >Does not Matter</option>
                                         </select>
                                	</div>
									<script>	
											document.getElementById('partnerphysical_status').value="<?php echo $fetchpartnerdata['physical_status']; ?>";
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
										
										 <select class="form-control" name="partnernationality" id="partnernationality" data-validetta="required">
											<option value="">Select Your Nationality</option>
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
											document.getElementById('partnernationality').value="<?php echo $fetchpartnerdata['nationality']; ?>";
										</script>
									
                                	</div>
									<div class="form-group">
                                		<label>
                                    		State:
                                   	 	</label>
                                    	<select class="form-control" name="partnerstate" id="partnerstate" data-validetta="required" onchange="getcity(this.value,'partner')">
										<?php 
										$getstate=mysqli_query($conn,"select * from tbl_state");
												
										while($state=mysqli_fetch_array($getstate)) { 
										?>
                                         <option value="<?php echo $state['id']; ?>"><?php echo $state['state']; ?></option>   
										<?php } ?>                                   
                                    </select>
                                    <script>
									document.getElementById('partnerstate').value="<?php echo $fetchpartnerdata['state']; ?>";
                                    </script>
									
									
                                	</div>
                                
								</div>
								<div class="col-md-6 col-xs-12">
								
								 <div class="form-group">
                                		<label>
                                    		Country:
                                   	 	</label>
                                    <select class="form-control" name="partnercountry" id="partnercountry" data-validetta="required">
                                    <option value="">Select Your Country</option>
								   <option value="india" >India</option>
								  
									</select>
									<script>	
											document.getElementById('partnercountry').value="<?php echo $fetchpartnerdata['country']; ?>";
										</script>
								<div id="status123"></div>
								</div>
								 
								 <div class="form-group">
									<label>
										Home City
									</label>
									<div id="partnercitydiv">
										<select class="form-control" name="partnerpreferred_cities" id="partnerpreferred_cities" data-validetta="required" >
										</select>
										
										</div>
								</div>
                            </div>
                            
                            </div>
                            <div  class="row" id="addpartner" style="visibility:hidden">
                            	<div class="col-xs-12 col-md-12 text-center">
                                <input type="submit" name="addpreference" value="Add Partner Preference" class="btn btn-danger btn-flat btn-lg">
                            		
                            	</div>
                            </div>
								</div>
								
								<?php } else { ?>
								<div id="partner">
								<p>Please First Fill Basic Details</p>
								</div>
								<?php } ?>
								
								
							<br>
							<br>
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
                             
                           
							
                            
                            </form>
							
							
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
					  border: 0px solid #dddddd;
					  text-align: left;
					  padding: 8px;
					}

					tr:nth-child(even) {
					  background-color: #dddddd;
					}
					</style>
               
                <!--div class="right-sidebar">
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
                </div-->
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
