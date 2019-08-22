<?php 

ob_start();
session_start();
require('../config.php');

if($_SESSION['adminid']=='')
{
header('location:../adminlogin.php');
}

$gender=$_REQUEST['gender'];
$min_age=$_REQUEST['min_age'];
$max_age=$_REQUEST['max_age'];
$from_date=$_REQUEST['from_date'];
$to_date=$_REQUEST['to_date'];
$caste=$_REQUEST['caste'];
$sub_caste=$_REQUEST['sub_caste'];
$country=$_REQUEST['country'];
$home_city=$_REQUEST['home_city'];
$user_id=$_REQUEST['user_id'];
$mobile_number=$_REQUEST['mobile_number'];
$education=$_REQUEST['education'];
$occupation=$_REQUEST['occupation'];
$raasi=$_REQUEST['raasi'];
$star=$_REQUEST['star'];

?>

<table  id="member" class="display" style="width:100%;background-color:grey">
<thead style="border: 0px solid #dddddd;">
  <tr>
	<th><input type="checkbox" id="select_all"></th>
	<th><!--<span class="fa fa-pencil-square-o" aria-hidden="true"></span>--></th>
	<th><!--<span class="fa fa-eye"></span>--></th>
	<th></th>
  </tr>
  </thead>
  <tbody style="border: 0px solid #dddddd;">
  <?php 
  
  if($min_age!='' && $max_age!='')
  {
	  $age="or age > '".$min_age."' and age < '".$max_age."'";
  }
  else
  {
	  $age="";
  }
  
  if($from_date!='' && $to_date!='')
  {
	  $date="or DATE(profile_created_by) > '".$from_date."' and DATE(profile_created_by) < '".$to_date."'";
  }
  else
  {
	  $date="";
  }
  
  
  if($_REQUEST['type']=='ready')
  {
	$query=mysqli_query($conn,"select * from tbl_user where delete_status=0 order by name asc");  
  }
  else
  {
	  $query=mysqli_query($conn,"select * from tbl_user where (gender='".$gender."' $age $date or caste='".$caste."' or sub_caste='".$sub_caste."' or country='".$country."' or home_city='".$home_city."' or user_id='".$user_id."' or mobile_number='".$mobile_number."' or education='".$education."' or occupation='".$occupation."' or raasi='".$raasi."' or star='".$star."') and delete_status=0 order by name asc" );
	 
  }
  
	while($fetchdata=mysqli_fetch_array($query))
	{
	?>
	
  <tr>
	<td style="border:0px solid #dddddd;border-bottom:1px solid grey;"><input type="checkbox" class="checkbox" value="<?php echo $fetchdata['user_id'] ?>"></td>
	
	<td style="border:0px solid #dddddd;border-bottom:1px solid grey;">
	<?php 
	if($fetchdata['profile_image']!='') { ?>
	<img src="../uploads/profile_image/<?php echo $fetchdata['profile_image']; ?>" width="100" height="100">
	<?php } else { ?>
	<img src="../images/noimage.jpg" width="100" height="100">
	<?php } ?>
	</td>
	<td style="border:0px solid #dddddd;border-bottom:1px solid grey;">
	<table>
	<tr>
	<td style="border:0px solid #dddddd;">
	Regitered On:
	</td>
	<td style="border:0px solid #dddddd;"><?php echo $fetchdata['profile_created_by'];?></td>
	</tr>
	<tr>
	<td style="border:0px solid #dddddd;">
	Name:
	</td>
	<td style="border:0px solid #dddddd;"><?php echo $fetchdata['name'];?></td>
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
	<td style="border:0px solid #dddddd;">Mobile Number</td>
	<td style="border:0px solid #dddddd;"><?php echo $fetchdata['mobile_number'];?></td>
	</tr>
	<tr><td style="border:0px solid #dddddd;"></td></tr>
	<tr><td style="border:0px solid #dddddd;"></td></tr>
	<tr><td style="border:0px solid #dddddd;"></td></tr>
	
	</table>
	</td>
	
	<td style="border:0px solid #dddddd;border-bottom:1px solid grey;">
	<table>
	
	
	<tr>
	<td style="border:0px solid #dddddd;">Age</td>
	<td style="border:0px solid #dddddd;"><?php echo $fetchdata['age'];?></td>
	</tr>
	<tr>
	<td style="border:0px solid #dddddd;">
	Country:
	</td>
	<td style="border:0px solid #dddddd;">
	<?php echo $fetchdata['country'];?>
	</td>
	</tr>
	<tr>
	<td style="border:0px solid #dddddd;">Caste</td>
	<td style="border:0px solid #dddddd;"><?php echo $fetchdata['caste'];?></td>
	</tr>
	<tr>
	<td style="border:0px solid #dddddd;">Religion</td>
	<td style="border:0px solid #dddddd;"><?php echo $fetchdata['religion'];?></td>
	</tr>
	<tr>
	
	<td style="border:0px solid #dddddd;"><a href="addmember.php?id=<?php echo $fetchdata['user_id']; ?>&type=paid" class="btn btn-custom btn-block waves-effect waves-light" style="background-color:red;">Edit Profile</a></td>
	<td style="border:0px solid #dddddd;"><a href="viewmember.php?id=<?php echo $fetchdata['user_id']; ?>" class="btn btn-custom btn-block waves-effect waves-light" style="background-color:green;">View Profile</a></td>
	</tr>
	</table>
	</td>
	
	
  </tr>

 <?php } ?>
   </tbody>
</table>

