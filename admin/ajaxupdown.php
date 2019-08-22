<?php 
require('../config.php');
$userid= $_REQUEST['id'];

$getdata=mysqli_query($conn,"select * from tbl_user where user_id='".$userid."'");
$fetchdata=mysqli_fetch_array($getdata);

$getplan=mysqli_query($conn,"select * from tbl_membership_user where user_id='".$userid."' and status=0");
$fetchplan=mysqli_fetch_array($getplan);

$plan_id=$fetchplan['plan_id'];

$getplanname=mysqli_query($conn,"select * from tbl_plan where id='".$plan_id."'");
$fetchplanname=mysqli_fetch_array($getplanname);

$getplanfeature=mysqli_query($conn,"select * from tbl_plan_feature where plan_id='".$plan_id."'");
$fetchplanfeature=mysqli_fetch_array($getplanfeature);

$duration=$fetchplanfeature['default_duration'];
$activedate=$fetchplan['activedate'];
$next_due_date = date('Y-m-d', strtotime($activedate. ' +'.$duration.' days'));




?>
<table style="border:0px;background-color:#FFFFFF;" align="center">
	<tr>
	<td>
	<img src="../uploads/profile_image/<?php echo $fetchdata['profile_image'] ?>" height="150" width="150">
	</td>
	<td>
	<table>
	<tr>
	<td><b><?php echo $fetchdata['name'] ?></b></td>
	</tr>
	<tr>
	<td style="border:0px;background-color:#FFFFFF;"><b>City:</b><?php echo $fetchdata['home_city'] ?></td>
	<td style="border:0px;background-color:#FFFFFF;"><b>State:</b><?php echo $fetchdata['state'] ?></td>
	<td style="border:0px;background-color:#FFFFFF;"><b>Country:</b><?php echo $fetchdata['country'] ?></td>
	<input type="hidden" name="user_id" id="user_id" value="<?php echo $fetchdata['user_id'] ?>">
	
	</tr>
	</table>
	</td>
	</tr>
	<tr>
	<td style="border:0px;background-color:#FFFFFF;">
	<b>Current Plan : </b>
	</td>
	<td style="border:0px;background-color:#FFFFFF;">
	
	<b><?php echo $fetchplanname['plan_name'] ?></b>
	</td>
	<td style="border:0px;background-color:#FFFFFF;"></td>
	<td style="border:0px;background-color:#FFFFFF;"></td>
	
	<td style="border:0px;background-color:#FFFFFF;" id="txtduration"><b>Duration : </b></td>
	<td style="border:0px;background-color:#FFFFFF;"><input readonly type="text" name="duration" id="duration" class="form-control" style="visibility:hidden"></td>
	</tr>
	
	<tr>
	<td style="border:0px;background-color:#FFFFFF;">
	<b>Plan Expiry Date :</b>
	</td>
	<td style="border:0px;background-color:#FFFFFF;">
	<input type="hidden" name="activedate" id="activedate" value="<?php echo $nowdate=date("Y-m-d"); ?>">
	<b><?php echo  $next_due_date; ?></b>
	</td>
	<td style="border:0px;background-color:#FFFFFF;"></td>
	<td style="border:0px;background-color:#FFFFFF;"></td>
	
	<td style="border:0px;background-color:#FFFFFF;" id="txtnoofcontacts" ><b>No of Contacts : </b></td>
	<td style="border:0px;background-color:#FFFFFF;"><input readonly type="text" name="noofcontacts" id="noofcontacts" class="form-control" style="visibility:hidden;"></td>
	</tr>
	
	<tr>
	<td style="border:0px;background-color:#FFFFFF;">
	<b>Update Plan :</b>
	</td>
	<td style="border:0px;background-color:#FFFFFF;">
	<select name="plan_id" id="plan_id" class="form-control" onchange="getplandetail(this.value)">
	<option value="">Select Plan Name</option>
   <?php $getplan=mysqli_query($conn,"select * from tbl_plan where delete_status=0");
	while($fetchplan=mysqli_fetch_array($getplan))
	{
   ?>
   <option value="<?php echo $fetchplan['id']; ?>"><?php echo $fetchplan['plan_name']; ?></option>
	<?php } ?>
   </select>
	</td>
	<td style="border:0px;background-color:#FFFFFF;"></td>
	<td style="border:0px;background-color:#FFFFFF;"></td>
	
	<td style="border:0px;background-color:#FFFFFF;" id="txtnoofmessage" ><b>No of Message : </b></td>
	<td style="border:0px;background-color:#FFFFFF;"><input readonly type="text" name="noofmessage" id="noofmessage" class="form-control" style="visibility:hidden;"></td>
	</tr>
	<tr>
	<td style="border:0px;background-color:#FFFFFF;">
	
	</td>
	<td style="border:0px;background-color:#FFFFFF;">
	
	</td>
	</tr>
	
	<tr>
	<td style="border:0px;background-color:#FFFFFF;">
	
	</td>
	<td style="border:0px;background-color:#FFFFFF;">
	
	</td>
	<td style="border:0px;background-color:#FFFFFF;"></td>
	<td style="border:0px;background-color:#FFFFFF;"></td>
	
	<td style="border:0px;background-color:#FFFFFF;"  id="txtnoofprofile" ><b>No of View Profile : </b></td>
	<td style="border:0px;background-color:#FFFFFF;"><input readonly type="text" name="noofprofile" id="noofprofile" class="form-control" style="visibility:hidden;"></td>
	</tr>
	
	<tr>
	<td style="border:0px;background-color:#FFFFFF;">
	
	</td>
	<td style="border:0px;background-color:#FFFFFF;">
	
	</td>
	
	<td style="border:0px;background-color:#FFFFFF;"></td>
	<td style="border:0px;background-color:#FFFFFF;"></td>
	
	<td style="border:0px;background-color:#FFFFFF;" id="txtamount" ><b>Plan Amount : </b></td>
	<td style="border:0px;background-color:#FFFFFF;"><input readonly type="text" name="amount" id="amount" class="form-control" style="visibility:hidden;"></td>
	</tr>
	</table>