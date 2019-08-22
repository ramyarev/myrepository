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
	<td style="border:0px;background-color:#FFFFFF;"><b>City:<?php echo $fetchdata['home_city'] ?></b></td>
	<td style="border:0px;background-color:#FFFFFF;"><b>State:<?php echo $fetchdata['state'] ?></b></td>
	<td style="border:0px;background-color:#FFFFFF;"><b>Country:<?php echo $fetchdata['country'] ?></b></td>
	
	<input type="hidden" name="user_id" id="user_id" value="<?php echo $fetchdata['user_id'] ?>">
	
	</tr>
	</table>
	</td>
	</tr>
	<tr>
	<td style="border:0px;background-color:#FFFFFF;">
	<b>Expiry Date :</b>
	</td>
	<td style="border:0px;background-color:#FFFFFF;">
	<?php echo $next_due_date; ?>
	</td>
	</tr>
	<tr>
	
	<td style="border:0px;background-color:#FFFFFF;">
	<b>Payment Mode :</b>
	</td>
	<td style="border:0px;background-color:#FFFFFF;">
	<select class="form-control" id="paymentmode" name="paymentmode">
	<option value="">Select Payment Mode</option>
	<!--<option value="cash">Cash</option>-->
	<option value="online payment">Online Payment</option>
	</select>
	</td>
	<td style="border:0px;background-color:#FFFFFF;"></td>
	<td style="border:0px;background-color:#FFFFFF;"></td>
	
	<td style="border:0px;background-color:#FFFFFF;" id="txtduration"><b>Duration :</b> </td>
	<td style="border:0px;background-color:#FFFFFF;"><input readonly type="text" name="duration" id="duration" class="form-control" style="visibility:hidden"></td>
	</tr>
	
	<tr>
	<td style="border:0px;background-color:#FFFFFF;">
	<b>Activation Date : </b>
	</td>
	<td style="border:0px;background-color:#FFFFFF;">
	<input type="text" name="activedate" id="activedate" class="form-control" value="<?php echo date("Y-m-d") ?>">
	</td>
	<td style="border:0px;background-color:#FFFFFF;"></td>
	<td style="border:0px;background-color:#FFFFFF;"></td>
	
	<td style="border:0px;background-color:#FFFFFF;" id="txtnoofcontacts"><b>No of Contacts :</b> </td>
	<td style="border:0px;background-color:#FFFFFF;"><input readonly type="text" name="noofcontacts" id="noofcontacts" class="form-control" style="visibility:hidden;"></td>
	</tr>
	
	<tr>
	<td style="border:0px;background-color:#FFFFFF;">
	<b>Plan :</b>
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
	
	<td style="border:0px;background-color:#FFFFFF;" id="txtnoofmessage"><b>No of Message : </b></td>
	<td style="border:0px;background-color:#FFFFFF;"><input readonly type="text" name="noofmessage" id="noofmessage" class="form-control" style="visibility:hidden;"></td>
	</tr>
	<tr>
	<td style="border:0px;background-color:#FFFFFF;">
	<b>Allow Video :</b>
	</td>
	<td style="border:0px;background-color:#FFFFFF;">
	<span id="allowvideo"></span>
	</td>
	</tr>
	
	<tr>
	<td style="border:0px;background-color:#FFFFFF;">
	<b>Allow Chat :</b>
	</td>
	<td style="border:0px;background-color:#FFFFFF;">
	<span id="allowchat"></span>
	</td>
	<td style="border:0px;background-color:#FFFFFF;"></td>
	<td style="border:0px;background-color:#FFFFFF;"></td>
	
	<td style="border:0px;background-color:#FFFFFF;" id="txtnoofprofile"><b>No of View Profile : </b></td>
	<td style="border:0px;background-color:#FFFFFF;"><input readonly type="text" name="noofprofile" id="noofprofile" class="form-control" style="visibility:hidden;"></td>
	</tr>
	
	<tr>
	<td style="border:0px;background-color:#FFFFFF;">
	<b>Transtion ID No :</b>
	</td>
	<td style="border:0px;background-color:#FFFFFF;">
	<input type="text" name="transaction_id" id="transaction_id" class="form-control" required>
	</td>
	
	<td style="border:0px;background-color:#FFFFFF;"></td>
	<td style="border:0px;background-color:#FFFFFF;"></td>
	
	<td style="border:0px;background-color:#FFFFFF;" id="txtamount"><b>Plan Amount : </b></td>
	<td style="border:0px;background-color:#FFFFFF;"><input readonly type="text" name="amount" id="amount" class="form-control" style="visibility:hidden;"></td>
	</tr>
	</table>