<?php 
require('config.php');
?>
 <table  id="member" class="display" style="width:100%;">
						   
  <tr>

	<th><a href="javascript:void(0)" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"><input type="checkbox" id="select_all" onclick="select_alls()" name="main_select" > &nbsp Select all</a></th>
	<th><a href="#" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="deletedata()"><i class="fa fa-trash-o" aria-hidden="true"></i> &nbsp Delete</a></th>
	<th><a href="#" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="active()"><i class="fa fa-thumbs-up" aria-hidden="true"></i> &nbsp Active</a></th>
	<th><a href="#" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="inactive()"> <i class="fa fa-thumbs-down" aria-hidden="true"></i> &nbsp Inactive</a></th>
	<th><a href="#" class="btn btn-custom_1 btn-block waves-effect waves-light"  style="width:130px;height:36px"  onclick="suspended()"> <i class="fa fa-user-times" aria-hidden="true"></i> &nbsp Suspended</a></th>
  </tr>
 </table>
 <table id="member" class="display" >
  <tbody style="border: 0px solid #dddddd;">
  <?php 

	 $condition='';
	 if($_REQUEST['types']=='all')
		$condition=' and active=1 ';	
	 else if($_REQUEST['method']=='active')
		$condition='and active=1';	
	else if($_REQUEST['method']=='paid')
		$condition='and paid_status=1';	
	else if($_REQUEST['method']=='highlighter')
		$condition='and active=0';	
	else if($_REQUEST['method']=='inactive')
		$condition='and active=0';	
	
	else if($_REQUEST['method']=='suspended')
		$condition='and suspended=1';
	
	else if($_REQUEST['method']=='all')
		$condition='';	
	
	else if($_REQUEST['method']=='premium')
		$condition='';	
	
 
	
	
	$query=mysqli_query($conn,"select * from tbl_user where delete_status=0 ".$condition." ");
	// echo "select * from tbl_user where delete_status=0 ".$condition." ";
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
	if($fetchdata['profile_image']!='') { ?>
	<img src="../uploads/profile_image/<?php echo $fetchdata['profile_image']; ?>" width="150" height="150">
	<?php } else { ?>
	<img src="../images/noimage.jpg" width="100" height="100">
	<?php } ?>
	</td>
	
								
	<td style=" background: #fafafa;">
	<a href="#" class="btn btn-block waves-effect waves-light"style="border-bottom: 1px solid #bcbbbb;  "><i class="fa fa-file-image-o" aria-hidden="true" data-toggle="modal" data-target="#myModal_4"></i>
	<!-- Modal -->
	 
	</a>
	<a href="#" class="btn btn-block waves-effect waves-light" style="border-bottom: 1px solid #bcbbbb;  "><i class="fa fa-picture-o"  aria-hidden="true" data-toggle="modal" data-target="#myModal"></i>
	<!-- Modal -->
   
  </a>
  <a href="#" class="btn btn-block waves-effect waves-light" style="border-bottom: 1px solid #bcbbbb;  "><i class="fa fa-asterisk" aria-hidden="true" data-toggle="modal" data-target="#myModal_1"></i>
								
  </a>
								<a href="#" class="btn btn-block waves-effect waves-light"style="border-bottom: 1px solid #bcbbbb;  " ><i class="fa fa-envelope-o" aria-hidden="true" data-toggle="modal" data-target="#myModal_2"></i>
								
  </a>
	<a href="#" class="btn btn-block waves-effect waves-light"style="border-bottom: 1px solid #bcbbbb;  " ><i class="fa fa-file-image-o"  aria-hidden="true" data-toggle="modal" data-target="#myModal_3"></i>
	

</a>
</a></td></tr>
<tr>
<td>
<a href="javascript:void(0)" class="btn btn-block waves-effect waves-light"style="border:1px solid #337ab7;" ><i class="fa fa-thumbs-o-up"  aria-hidden="true" data-target="#myModal" onclick="openmodal('<?php echo $fetchdata['user_id'] ?>')"> &nbsp Active to Paid</i>
	</td>
	
	</tr>
	</table>
	
	
	<td style="border:0px solid #dddddd;border-bottom:1px solid grey;">
	<table>
	<tr>
	
	<td style="color:#767676;font-size:21px;border:0px solid #dddddd;text-transform: uppercase;">
	<?php echo $fetchdata['name'];?>(NM_123)
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
	if($fetchdata['paid_status']==1)
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
	
	<td style="border:0px solid #1397C3;"><a href="view and add comments.php?id=<?php echo $fetchdata['user_id']; ?>" class="btn btn-custom btn-block waves-effect waves-light" style="background-color:#5bd2d7;">View & Add Comments</a></td>
	
	
	<td style="border:0px solid #72C8D3;"><a href="matches.php?id=<?php echo $fetchdata['user_id']; ?>" class="btn btn-custom btn-block waves-effect waves-light" style="background-color:#54cace;">Matches(78)</a></td>
	<td style="border:0px solid #E27C6D;"><a href="details.php?id=<?php echo $fetchdata['user_id']; ?>" class="btn btn-custom btn-block waves-effect waves-light" style="background-color:#73c1c4;">Details</a></td>
	</tr>
	</table>
	</td>
	
	
  </tr>
  
 <?php } ?>
  </tbody>
</table>