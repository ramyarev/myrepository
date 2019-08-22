<?php 

require('../config.php');

	$type=$_REQUEST['type'];
	$start_date=$_REQUEST['start_date'];
	$end_date=$_REQUEST['end_date'];
	
	$expheight=explode(" ",$_REQUEST['height']);
	
	$expfeet=explode("ft",$expheight[0]);
	$feet=$expfeet[0];
	
	$expinch=explode("in",$expheight[1]);
	$inch=$expinch[0];
	
	$feet_inch=$feet.".".$inch;
	
	$condition='';
	if($type=='bride')
		$query=mysqli_query($conn,"select * from tbl_user where delete_status=0 and gender='female'");
	else if($type=='groom')
		$query=mysqli_query($conn,"select * from tbl_user where delete_status=0 and gender='male'");
	else if($type=='date')
		$query=mysqli_query($conn,"select * from tbl_user where delete_status=0 and DATE(profile_created_by) >= '".$start_date."' and DATE(profile_created_by) <= '".$end_date."'");
	else if($type=='today')
		$query=mysqli_query($conn,"select * from tbl_user WHERE DATE(profile_created_by) = CURDATE()");
	else if($type=='yesterday')
		$query=mysqli_query($conn,"select * from tbl_user WHERE profile_created_by >= DATE_SUB(CURDATE(), INTERVAL 1 DAY)");
	else if($type=='lweek')
		$query=mysqli_query($conn,"select * from tbl_user WHERE profile_created_by >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) ");
	else if($type=='lmonth')
		$query=mysqli_query($conn,"select * from tbl_user WHERE profile_created_by >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)");
	else if($type=='all')
		$query=mysqli_query($conn,"select * from tbl_user where delete_status=0");
	else if($type=='filter')
	  {
		if($_REQUEST['age']!='')
			$condition.=" or age = '".$_REQUEST['age']."'";
		if($_REQUEST['marital_status']!='')
			$condition.=" or  marital_status = '".$_REQUEST['marital_status']."'";
		if($_REQUEST['height']!='')
			$condition.=" or feet_inch = '".$feet_inch."'";
		if($_REQUEST['physical_status']!='')
			$condition.=" or  physical_status = '".$_REQUEST['physical_status']."'";
		if($_REQUEST['weight']!='')
			$condition.=" or weight = '".$_REQUEST['weight']."'";
		if($_REQUEST['education']!='')
			$condition.=" or  education = '".$_REQUEST['education']."'";
		if($_REQUEST['min_income']!='' && $_REQUEST['max_income']!='')
			$condition.=" or (min_income >= '".$_REQUEST['min_income']."' and max_income <= '".$_REQUEST['max_income']."')";
		if($_REQUEST['occupation']!='')
			$condition.=" or  occupation = '".$_REQUEST['occupation']."'";
		if($_REQUEST['religion']!='')
			$condition.=" or  religion = '".$_REQUEST['religion']."'";
		if($_REQUEST['caste']!='')
			$condition.=" or  caste = '".$_REQUEST['caste']."'";
		if($_REQUEST['sub_caste']!='')
			$condition.=" or  sub_caste = '".$_REQUEST['sub_caste']."'";
		if($_REQUEST['star']!='')
			$condition.=" or  star = '".$_REQUEST['star']."'";
		
		if($_REQUEST['raasi']!='')
			$condition.=" or  raasi = '".$_REQUEST['raasi']."'";
		
		if($_REQUEST['dosham_details']!='')
			$condition.=" or  dosham_details = '".$_REQUEST['dosham_details']."'";
		if($_REQUEST['family_type']!='')
			$condition.=" or  family_type = '".$_REQUEST['family_type']."'";
		if($_REQUEST['no_of_siblings']!='')
			$condition.=" or  no_of_siblings = '".$_REQUEST['no_of_siblings']."'";
		
		$query=mysqli_query($conn,"select * from tbl_user where delete_status=0 ".$condition."");
		//echo "select * from tbl_user where delete_status=0 ".$condition."";
	  }
	
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
	<b>Regitered On:</b>
	</td>
	<td style="border:0px solid #dddddd;"><?php echo $fetchdata['profile_created_by'];?></td>
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
	if($fetchdata['paid_status']==1)
	{
		echo "PAID";
	}
	else if($fetchdata['active']==1)
	{
		echo "ACTIVE";
	}
	else { echo "IN ACTIVE"; }
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
	
	<td style="border:0px solid #dddddd;"><b>Last Login:</b></td>
	<td style="border:0px solid #dddddd;"><?php echo $fetchdata['lastlogin'];?></td>
	</tr>
	<tr>
	
	<td style="border:0px solid #1397C3;"><a href="view_and_add_comments.php?id=<?php echo $fetchdata['user_id']; ?>" class="btn btn-custom btn-block waves-effect waves-light" style="background-color:#5bd2d7;">View & Add Comments</a></td>
	
	
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
  
	<?php }  ?>