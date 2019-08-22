<?php
require('../config.php');

 $no = $_POST['getresult'];
 $type = $_POST['type'];
 //$select = mysqli_query($conn,"select * from tbl_user limit $no,2");
 ?>
 <table  class="display" style="border: 0px solid #dddddd;background-color:#FFFFFF">
 <thead>
 <th></th>
 <th></th>
 <th></th>
 <th></th>
 <th></th>
 </thead>
  <tbody style="border: 0px solid #dddddd;background-color:#FFFFFF">
  <?php 
  
if($type=='all')
	$query=mysqli_query($conn,"select * from tbl_user where delete_status=0  limit $no,10");								
	else if($type=='paid')
	$query=mysqli_query($conn,"select * from tbl_user where paid_status=1 and delete_status=0  limit $no,10");
	else if($type=='male')
	$query=mysqli_query($conn,"select * from tbl_user where gender='male' and delete_status=0  limit $no,10");
	else if($type=='female')
	$query=mysqli_query($conn,"select * from tbl_user where gender='female' and delete_status=0  limit $no,10");	
	else if($type=='today')
	$query=mysqli_query($conn,"SELECT * FROM tbl_user WHERE DATE(profile_created_by) = CURDATE() and delete_status=0  limit $no,10");
	else if($type=='lweek')
	$query=mysqli_query($conn,"select * from tbl_user where  profile_created_by >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) and delete_status=0  limit $no,10");					
	else if($type=='lmonth')
	$query=mysqli_query($conn,"select * from tbl_user where  profile_created_by >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)  and delete_status=0  limit $no,10");
	
	$rowcount=mysqli_num_rows($query);
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
	<img src="../uploads/profile_image/<?php echo $fetchdata['profile_image']; ?>" width="150" height="150" style="<?php echo $watermark; ?>">
	<?php } else { ?>
	<img src="../images/noimage.jpg" width="100" height="100">
	<?php } ?>
	</td>
	
								
	<td style=" background: #fafafa;">
	<a href="#" class="btn btn-block waves-effect waves-light"style="border-bottom: 1px solid #bcbbbb;  "><i class="fa fa-file-image-o" aria-hidden="true" data-toggle="modal" data-target="#myModal_4"></i>
	<!-- Modal -->
	  <div class="modal fade" id="myModal_4" role="dialog">
		<div class="modal-dialog">
		
		  <!-- Modal content-->
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h4 class="modal-title">Images</h4>
			</div>
			<div class="modal-body">
			  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
		<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		<li data-target="#carousel-example-generic" data-slide-to="1"></li>
		<li data-target="#carousel-example-generic" data-slide-to="2"></li>
	  </ol>

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner" role="listbox">
		<div class="item active">
		 <img src="../uploads/profile_image/images.jpg" >
		  <div class="carousel-caption">
			...
		  </div>
		</div>
		<div class="item">
		 <img src="../uploads/profile_image/images.jpg" >
		  <div class="carousel-caption">
			...
		  </div>
		</div>
		<div class="item">
		 <img src="../uploads/profile_image/images.jpg">
		  <div class="carousel-caption">
			...
		  </div>
		</div>
		...
	  </div>

	  <!-- Controls -->
	  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	  </a>
	</div><div class="col-sm-12" style="text-align:center"><br>
	<a href="#"><i class="fa fa-check" aria-hidden="true" style="color:#37b057;"></i></a> &nbsp / &nbsp
	<a href="#"><i class="fa fa-times" aria-hidden="true"style="color:#e1544e;"></i></a>
	</div>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		  </div>
		  
		</div>
	  </div>



	</a>
	<a href="#" class="btn btn-block waves-effect waves-light" style="border-bottom: 1px solid #bcbbbb;  "><i class="fa fa-picture-o"  aria-hidden="true" data-toggle="modal" data-target="#myModal"></i>
	<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">
	
	  <!-- Modal content-->
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
		  <h4 class="modal-title">Images</h4>
		</div>
		<div class="modal-body">
		  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
	<li data-target="#carousel-example-generic" data-slide-to="1"></li>
	<li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
	<div class="item active">
	 <img src="../uploads/profile_image/images.jpg" >
	  <div class="carousel-caption">
		...
	  </div>
	</div>
	<div class="item">
	 <img src="../uploads/profile_image/images.jpg" >
	  <div class="carousel-caption">
		...
	  </div>
	</div>
	<div class="item">
	 <img src="../uploads/profile_image/images.jpg">
	  <div class="carousel-caption">
		...
	  </div>
	</div>
	...
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	<span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	<span class="sr-only">Next</span>
  </a>
</div><div class="col-sm-12" style="text-align:center"><br>
<a href="#"><i class="fa fa-check" aria-hidden="true" style="color:#37b057;"></i></a> &nbsp / &nbsp
<a href="#"><i class="fa fa-times" aria-hidden="true"style="color:#e1544e;"></i></a>
</div>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	  </div>
	  
	</div>
  </div>



  </a>
  <a href="#" class="btn btn-block waves-effect waves-light" style="border-bottom: 1px solid #bcbbbb;  "><i class="fa fa-asterisk" aria-hidden="true" data-toggle="modal" data-target="#myModal_1"></i>
								<div class="modal fade" id="myModal_1" role="dialog">
	<div class="modal-dialog">
	
	  <!-- Modal content-->
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
		  <h4 class="modal-title">Horoscope</h4>
		</div>
		<div class="modal-body">
		  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
	<li data-target="#carousel-example-generic" data-slide-to="1"></li>
	<li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
	<div class="item active">
	 <img src="../uploads/profile_image/images.jpg" >
	  <div class="carousel-caption">
		...
	  </div>
	</div>
	<div class="item">
	 <img src="../uploads/profile_image/images.jpg" >
	  <div class="carousel-caption">
		...
	  </div>
	</div>
	<div class="item">
	 <img src="../uploads/profile_image/images.jpg">
	  <div class="carousel-caption">
		...
	  </div>
	</div>
	...
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	<span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	<span class="sr-only">Next</span>
  </a>
</div><div class="col-sm-12" style="text-align:center"><br>
<a href="#"><i class="fa fa-check" aria-hidden="true" style="color:#37b057;"></i></a> &nbsp / &nbsp
<a href="#"><i class="fa fa-times" aria-hidden="true"style="color:#e1544e;"></i></a>
</div>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	  </div>
	  
	</div>
  </div>

  </a>
								<a href="#" class="btn btn-block waves-effect waves-light"style="border-bottom: 1px solid #bcbbbb;  " ><i class="fa fa-envelope-o" aria-hidden="true" data-toggle="modal" data-target="#myModal_2"></i>
								<div class="modal fade" id="myModal_2" role="dialog">
	<div class="modal-dialog">
	
	  <!-- Modal content-->
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
		  <h4 class="modal-title">E-Mail</h4>
		</div>
		<div class="modal-body">
		  <a href="#" class="btn btn-custom btn-block waves-effect waves-light" style="background-color:#01c0c8;">Resend Mail</a>
		  <a data-toggle="collapse" data-target="#demo" class="btn btn-custom btn-block waves-effect waves-light tabs" style="background-color:#01c0c8;">Edit Email</a>
		  <div  id="demo" class="collapse"><form>
		  <div class="form-group">
										<label>
											Email Id:
										</label>
										<input type="text" class="form-control" data-validetta="required" value="" name="email" id="email">
									</div>
									<a href="#" class="btn btn-custom btn-block waves-effect waves-light" style="background-color:#01c0c8;">Submit</a>
		  </form>
		  </div>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-default" data-dismiss="modal">Submit</button>
		</div>
	  </div>
	  
	</div>
  </div>
  </a>
	<a href="#" class="btn btn-block waves-effect waves-light"style="border-bottom: 1px solid #bcbbbb;  " ><i class="fa fa-file-image-o"  aria-hidden="true" data-toggle="modal" data-target="#myModal_3"></i>
	<div class="modal fade" id="myModal_3" role="dialog">
	<div class="modal-dialog">
	
	  <!-- Modal content-->
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
		  <h4 class="modal-title">Cover Image</h4>
		</div>
		<div class="modal-body">
		  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
	<li data-target="#carousel-example-generic" data-slide-to="1"></li>
	<li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
	<div class="item active">
	 <img src="../uploads/profile_image/images.jpg" >
	  <div class="carousel-caption">
		...
	  </div>
	</div>
	<div class="item">
	 <img src="../uploads/profile_image/images.jpg" >
	  <div class="carousel-caption">
		...
	  </div>
	</div>
	<div class="item">
	 <img src="../uploads/profile_image/images.jpg">
	  <div class="carousel-caption">
		...
	  </div>
	</div>
	...
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	<span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	<span class="sr-only">Next</span>
  </a>
</div><div class="col-sm-12" style="text-align:center"><br>
<a href="#"><i class="fa fa-check" aria-hidden="true" style="color:#37b057;"></i></a> &nbsp / &nbsp
<a href="#"><i class="fa fa-times" aria-hidden="true"style="color:#e1544e;"></i></a>
</div>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	  </div>
	  
	</div>
  </div>

</a>
</a></td></tr>
<tr>
<td>
<a href="#" class="btn btn-custom  btn-block waves-effect waves-light">Renew Membership</a>
	</td>
	
	</tr>
	</table>
	</td>
	
	<td style="border:0px solid #dddddd;border-bottom:1px solid grey;">
	<table>
	<tr>
	
	<td style="color:#767676;font-size:21px;border:0px solid #dddddd;text-transform: uppercase;" colspan="2">
	<?php echo $fetchdata['name'];?>(NM_<?php echo $fetchdata['user_id'];?>)
	</td>
	</tr>
	
	<tr>
	<td style="border:0px solid #dddddd;">
	Email:
	</td>
	<td style="border:0px solid #dddddd;">
	<?php echo $fetchdata['email'];?>
	</td>
	</tr>
	<tr>
	<td style="border:0px solid #dddddd;">
	Age:
	</td>
	<td style="border:0px solid #dddddd;">
	<?php echo $fetchdata['age'];?> Years
	</td>
	</tr>
	<tr>
	<td style="border:0px solid #dddddd;">
	Location
	</td>
	<td style="border:0px solid #dddddd;">
	<?php $fetchcity=mysqli_fetch_array(mysqli_query($conn,"select * from tbl_city where id='".$fetchdata['home_city']."'"));
	echo $fetchcity['city'];?>, <?php $fetchstate=mysqli_fetch_array(mysqli_query($conn,"select * from tbl_state where id='".$fetchdata['state']."'"));
	echo $fetchstate['state'];?>, <?php echo $fetchdata['country'];?>
	</td>
	</tr>
	<tr>
	<td style="border:0px solid #dddddd;">
	Email:
	</td>
	<td style="border:0px solid #dddddd;">
	<?php echo $fetchdata['email'];?>
	</td>
	</tr>
	<tr>
	<td style="border:0px solid #dddddd;">
	Gender:
	</td>
	<td style="border:0px solid #dddddd;"><?php echo $fetchdata['gender'];?></td>
	</tr>
	
	<tr>
	<td style="border:0px solid #dddddd;">
	Regitered On:
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
	if($fetchdata['paid_status']==1  && $fetchdata['suspended']!=1)
	{
		echo "PAID";
	}
	else if($fetchdata['active']==1 && $fetchdata['suspended']!=1)
	{
		echo "ACTIVE";
	}
	
	else if($fetchdata['suspended']==1)
	{
		echo "Suspended";
	}
	else { echo "IN ACTIVE"; }
	?>
	</td>
	</tr>
	
	<tr>
	<td style="border:0px solid #dddddd;">Mobile Number</td>
	<td style="border:0px solid #dddddd;" ><?php echo $fetchdata['mobile_number'];?></td>
	</tr>
	<tr>
	<td style="border:0px solid #dddddd;">Mother Tongue</td>
	<td style="border:0px solid #dddddd;" ><?php echo $fetchdata['mother_tongue'];?></td>
	</tr>
	<tr>
	<td style="border:0px solid #dddddd;">Religion</td>
	<td style="border:0px solid #dddddd;"><?php echo $fetchdata['religion'];?></td>
	</tr>
	
	<tr>
	<td style="border:0px solid #dddddd;">
	State:
	</td>
	<td style="border:0px solid #dddddd;">
	<?php

	$getstate=mysqli_fetch_array(mysqli_query($conn,"select state  from tbl_state where id='".$fetchdata['state']."'"));	
	echo $getstate['state'];?>
	</td>
	</tr>
	<tr>
	<td style="border:0px solid #dddddd;">Caste</td>
	<td style="border:0px solid #dddddd;"><?php

	$getcaste=mysqli_fetch_array(mysqli_query($conn,"select caste  from tbl_caste where id='".$fetchdata['caste']."'"));	
	echo $getcaste['caste'];?> </td>
	</tr>
	<tr>
	
	<td style="border:0px solid #dddddd;">Last Login</td>
	<td style="border:0px solid #dddddd;">09:00 PM</td>
	</tr>
	<tr>
	
	<td style="border:0px solid #1397C3;"><a href="view_and_add_comments.php?id=<?php echo $fetchdata['user_id']; ?>" class="btn btn-custom btn-block waves-effect waves-light" style="background-color:#5bd2d7;">View & Add Comments</a></td>
	
	<?php 
	
	$user_id=$fetchdata['user_id'];
	$todaydata=mysqli_query($conn,"SELECT * FROM tbl_user WHERE (gender = (select gender from tbl_partners WHERE user_id='".$user_id."') or (age >= (select min_age from tbl_partners WHERE user_id='".$user_id."') and age <= (select max_age from tbl_partners WHERE user_id='".$user_id."')) or ( feet_inch >= (select min_feet_inch from tbl_partners WHERE user_id='".$user_id."') and feet_inch <= (select max_feet_inch from tbl_partners WHERE user_id='".$user_id."')) or ( weight >= (select min_weight from tbl_partners WHERE user_id='".$user_id."')  and weight <= (select max_weight from tbl_partners WHERE user_id='".$user_id."')) or caste = (select caste from tbl_partners WHERE user_id='".$user_id."') or sub_caste = (select sub_caste from tbl_partners WHERE user_id='".$user_id."') or marital_status = (select marital_status  from tbl_partners WHERE user_id='".$user_id."') or mother_tongue = (select mother_tongue  from tbl_partners WHERE user_id='".$user_id."') or raasi = (select raasi  from tbl_partners WHERE user_id='".$user_id."') or star = (select natchathiram  from tbl_partners WHERE user_id='".$user_id."') or having_dosham = (select having_dosham  from tbl_partners WHERE user_id='".$user_id."') or dosham_details = (select dosham  from tbl_partners WHERE user_id='".$user_id."') or occupation = (select profession  from tbl_partners WHERE user_id='".$user_id."') or physical_status = (select physical_status  from tbl_partners WHERE user_id='".$user_id."') or nationality = (select nationality  from tbl_partners WHERE user_id='".$user_id."') or  country = (select country  from tbl_partners WHERE user_id='".$user_id."') or home_city = (select preferred_cities  from tbl_partners WHERE user_id='".$user_id."') or paadham = (select paadham  from tbl_partners WHERE user_id='".$user_id."') or education = (select education  from tbl_partners WHERE user_id='".$user_id."') or  state = (select state from tbl_partners WHERE user_id='".$user_id."') ) and weight!='' and feet_inch!='' and age!=0 and user_id!='".$user_id."' and delete_status=0 and gender!='".$gender."' and DATE(profile_created_by) = CURDATE() order by profile_created_by desc");
	
	$todaycount=mysqli_num_rows($todaydata);
	
									
	$premiumdata1=mysqli_query($conn,"SELECT * FROM tbl_user WHERE (gender = (select gender from tbl_partners WHERE user_id='".$user_id."') or (age >= (select min_age from tbl_partners WHERE user_id='".$user_id."') and age <= (select max_age from tbl_partners WHERE user_id='".$user_id."')) or ( feet_inch >= (select min_feet_inch from tbl_partners WHERE user_id='".$user_id."') and feet_inch <= (select max_feet_inch from tbl_partners WHERE user_id='".$user_id."')) or ( weight >= (select min_weight from tbl_partners WHERE user_id='".$user_id."')  and weight <= (select max_weight from tbl_partners WHERE user_id='".$user_id."')) or caste = (select caste from tbl_partners WHERE user_id='".$user_id."') or sub_caste = (select sub_caste from tbl_partners WHERE user_id='".$user_id."') or marital_status = (select marital_status  from tbl_partners WHERE user_id='".$user_id."') or mother_tongue = (select mother_tongue  from tbl_partners WHERE user_id='".$user_id."') or raasi = (select raasi  from tbl_partners WHERE user_id='".$user_id."') or star = (select natchathiram  from tbl_partners WHERE user_id='".$user_id."') or having_dosham = (select having_dosham  from tbl_partners WHERE user_id='".$user_id."') or dosham_details = (select dosham  from tbl_partners WHERE user_id='".$user_id."') or occupation = (select profession  from tbl_partners WHERE user_id='".$user_id."') or physical_status = (select physical_status  from tbl_partners WHERE user_id='".$user_id."') or nationality = (select nationality  from tbl_partners WHERE user_id='".$user_id."') or  country = (select country  from tbl_partners WHERE user_id='".$user_id."') or home_city = (select preferred_cities  from tbl_partners WHERE user_id='".$user_id."') or paadham = (select paadham  from tbl_partners WHERE user_id='".$user_id."') or education = (select education  from tbl_partners WHERE user_id='".$user_id."') or  state = (select state from tbl_partners WHERE user_id='".$user_id."') ) and weight!='' and feet_inch!='' and age!=0 and user_id!='".$user_id."' and delete_status=0 and gender!='".$gender."' and DATE(profile_created_by) = CURDATE() order by profile_created_by desc");
	
	$i=1;
	$premiumcount='';
	while($fetchpremiumdata1=mysqli_fetch_array($premiumdata1)) {

	$getplanid=mysqli_fetch_array(mysqli_query($conn,"select plan_id from tbl_membership_user where user_id='".$fetchpremiumdata1['user_id']."' and status=0"));

	$getplanname=mysqli_fetch_array(mysqli_query($conn,"select category from tbl_plan where id='".$getplanid['plan_id']."' and delete_status=0"));
	
	
	if($getplanname['category']=='premium')
	{
		$premiumcount=+$i;
	}
	$i++;
	}
	
	
	$recommenddata=mysqli_query($conn,"SELECT * FROM tbl_user WHERE (gender = (select gender from tbl_partners WHERE user_id='".$user_id."') or (age >= (select min_age from tbl_partners WHERE user_id='".$user_id."') and age <= (select max_age from tbl_partners WHERE user_id='".$user_id."')) or ( feet_inch >= (select min_feet_inch from tbl_partners WHERE user_id='".$user_id."') and feet_inch <= (select max_feet_inch from tbl_partners WHERE user_id='".$user_id."')) or ( weight >= (select min_weight from tbl_partners WHERE user_id='".$user_id."')  and weight <= (select max_weight from tbl_partners WHERE user_id='".$user_id."')) or caste = (select caste from tbl_partners WHERE user_id='".$user_id."') or sub_caste = (select sub_caste from tbl_partners WHERE user_id='".$user_id."') or marital_status = (select marital_status  from tbl_partners WHERE user_id='".$user_id."') or mother_tongue = (select mother_tongue  from tbl_partners WHERE user_id='".$user_id."') or raasi = (select raasi  from tbl_partners WHERE user_id='".$user_id."') or star = (select natchathiram  from tbl_partners WHERE user_id='".$user_id."') or having_dosham = (select having_dosham  from tbl_partners WHERE user_id='".$user_id."') or dosham_details = (select dosham  from tbl_partners WHERE user_id='".$user_id."') or occupation = (select profession  from tbl_partners WHERE user_id='".$user_id."') or physical_status = (select physical_status  from tbl_partners WHERE user_id='".$user_id."') or nationality = (select nationality  from tbl_partners WHERE user_id='".$user_id."') or  country = (select country  from tbl_partners WHERE user_id='".$user_id."') or home_city = (select preferred_cities  from tbl_partners WHERE user_id='".$user_id."') or paadham = (select paadham  from tbl_partners WHERE user_id='".$user_id."') or education = (select education  from tbl_partners WHERE user_id='".$user_id."') or  state = (select state from tbl_partners WHERE user_id='".$user_id."') ) and weight!='' and feet_inch!='' and age!=0 and user_id!='".$user_id."' and delete_status=0 and gender!='".$gender."' and active=1 order by profile_created_by desc");
	
	
	$recommandcount=mysqli_num_rows($recommenddata);
	
	
	$locationdata=mysqli_query($conn,"SELECT * FROM tbl_user WHERE (gender = (select gender from tbl_partners WHERE user_id='".$user_id."') and (age >= (select min_age from tbl_partners WHERE user_id='".$user_id."') and age <= (select max_age from tbl_partners WHERE user_id='".$user_id."')) and ( feet_inch >= (select min_feet_inch from tbl_partners WHERE user_id='".$user_id."') and feet_inch <= (select max_feet_inch from tbl_partners WHERE user_id='".$user_id."')) and ( weight >= (select min_weight from tbl_partners WHERE user_id='".$user_id."')  and weight <= (select max_weight from tbl_partners WHERE user_id='".$user_id."')) and caste = (select caste from tbl_partners WHERE user_id='".$user_id."') and marital_status = (select marital_status  from tbl_partners WHERE user_id='".$user_id."') and mother_tongue = (select mother_tongue  from tbl_partners WHERE user_id='".$user_id."') and raasi = (select raasi  from tbl_partners WHERE user_id='".$user_id."') and home_city = (select preferred_cities  from tbl_partners WHERE user_id='".$user_id."') and having_dosham = (select having_dosham  from tbl_partners WHERE user_id='".$user_id."') and dosham_details = (select dosham  from tbl_partners WHERE user_id='".$user_id."')  and physical_status = (select physical_status  from tbl_partners WHERE user_id='".$user_id."') and paadham = (select paadham  from tbl_partners WHERE user_id='".$user_id."') ) and weight!='' and feet_inch!='' and age!=0 and user_id!='".$user_id."' and delete_status=0 and gender!='".$gender."' order by profile_created_by desc");
	
	
	$locationcount=mysqli_num_rows($locationdata);
	
	
	$educationdata=mysqli_query($conn,"SELECT * FROM tbl_user WHERE (gender = (select gender from tbl_partners WHERE user_id='".$user_id."') and (age >= (select min_age from tbl_partners WHERE user_id='".$user_id."') and age <= (select max_age from tbl_partners WHERE user_id='".$user_id."')) and ( feet_inch >= (select min_feet_inch from tbl_partners WHERE user_id='".$user_id."') and feet_inch <= (select max_feet_inch from tbl_partners WHERE user_id='".$user_id."')) and ( weight >= (select min_weight from tbl_partners WHERE user_id='".$user_id."')  and weight <= (select max_weight from tbl_partners WHERE user_id='".$user_id."')) and caste = (select caste from tbl_partners WHERE user_id='".$user_id."')  and marital_status = (select marital_status  from tbl_partners WHERE user_id='".$user_id."') and mother_tongue = (select mother_tongue  from tbl_partners WHERE user_id='".$user_id."') and raasi = (select raasi  from tbl_partners WHERE user_id='".$user_id."') and education = (select education  from tbl_partners WHERE user_id='".$user_id."') and having_dosham = (select having_dosham  from tbl_partners WHERE user_id='".$user_id."') and dosham_details = (select dosham  from tbl_partners WHERE user_id='".$user_id."')  and physical_status = (select physical_status  from tbl_partners WHERE user_id='".$user_id."') and paadham = (select paadham  from tbl_partners WHERE user_id='".$user_id."') ) and weight!='' and feet_inch!='' and age!=0 and user_id!='".$user_id."' and delete_status=0 and gender!='".$gender."' order by profile_created_by desc");
	
	
	$educationcount=mysqli_num_rows($educationdata);
	
	
	$professiondata=mysqli_query($conn,"SELECT * FROM tbl_user WHERE (gender = (select gender from tbl_partners WHERE user_id='".$user_id."') and (age >= (select min_age from tbl_partners WHERE user_id='".$user_id."') and age <= (select max_age from tbl_partners WHERE user_id='".$user_id."')) and ( feet_inch >= (select min_feet_inch from tbl_partners WHERE user_id='".$user_id."') and feet_inch <= (select max_feet_inch from tbl_partners WHERE user_id='".$user_id."')) and ( weight >= (select min_weight from tbl_partners WHERE user_id='".$user_id."')  and weight <= (select max_weight from tbl_partners WHERE user_id='".$user_id."')) and caste = (select caste from tbl_partners WHERE user_id='".$user_id."') and marital_status = (select marital_status  from tbl_partners WHERE user_id='".$user_id."') and mother_tongue = (select mother_tongue  from tbl_partners WHERE user_id='".$user_id."') and raasi = (select raasi  from tbl_partners WHERE user_id='".$user_id."') and occupation = (select profession  from tbl_partners WHERE user_id='".$user_id."') and having_dosham = (select having_dosham  from tbl_partners WHERE user_id='".$user_id."') and dosham_details = (select dosham  from tbl_partners WHERE user_id='".$user_id."')  and physical_status = (select physical_status  from tbl_partners WHERE user_id='".$user_id."') and paadham = (select paadham  from tbl_partners WHERE user_id='".$user_id."') ) and weight!='' and feet_inch!='' and age!=0 and user_id!='".$user_id."' and delete_status=0 and gender!='".$gender."' order by profile_created_by desc");
	
	
	$professioncount=mysqli_num_rows($professiondata);
	
	
	$stardata=mysqli_query($conn,"SELECT * FROM tbl_user WHERE (gender = (select gender from tbl_partners WHERE user_id='".$user_id."') and (age >= (select min_age from tbl_partners WHERE user_id='".$user_id."') and age <= (select max_age from tbl_partners WHERE user_id='".$user_id."')) and ( feet_inch >= (select min_feet_inch from tbl_partners WHERE user_id='".$user_id."') and feet_inch <= (select max_feet_inch from tbl_partners WHERE user_id='".$user_id."')) and ( weight >= (select min_weight from tbl_partners WHERE user_id='".$user_id."')  and weight <= (select max_weight from tbl_partners WHERE user_id='".$user_id."')) and caste = (select caste from tbl_partners WHERE user_id='".$user_id."') and marital_status = (select marital_status  from tbl_partners WHERE user_id='".$user_id."') and mother_tongue = (select mother_tongue  from tbl_partners WHERE user_id='".$user_id."') and raasi = (select raasi  from tbl_partners WHERE user_id='".$user_id."') and star = (select natchathiram  from tbl_partners WHERE user_id='".$user_id."') and having_dosham = (select having_dosham  from tbl_partners WHERE user_id='".$user_id."') and dosham_details = (select dosham  from tbl_partners WHERE user_id='".$user_id."')  and physical_status = (select physical_status  from tbl_partners WHERE user_id='".$user_id."') and paadham = (select paadham  from tbl_partners WHERE user_id='".$user_id."') ) and weight!='' and feet_inch!='' and age!=0 and user_id!='".$user_id."' and delete_status=0 and gender!='".$gender."' order by profile_created_by desc");
	
	
	$starcount=mysqli_num_rows($stardata);
	
	$totalmatches=$todaycount+$premiumcount+$recommandcount+$locationcount+$educationcount+$professioncount+$starcount;
	?>
	
	<td style="border:0px solid #72C8D3;"><a href="matches.php?id=<?php echo $fetchdata['user_id']; ?>" class="btn btn-custom btn-block waves-effect waves-light" style="background-color:#54cace;">Matches(<?php echo $totalmatches; ?>)</a></td>
	<td style="border:0px solid #E27C6D;"><a href="details.php?id=<?php echo $fetchdata['user_id']; ?>" class="btn btn-custom btn-block waves-effect waves-light" style="background-color:#73c1c4;">Details</a></td>
	</tr>
	</table>
	</td>
	
	
  </tr>
  
 <?php } ?>
 <?php if($rowcount==0) {  ?>
 <tr><td align="center"><div align="center"><b style="color:red">No Rocord Found</b></div></td></tr>
 <?php } ?>
  </tbody>
</table>