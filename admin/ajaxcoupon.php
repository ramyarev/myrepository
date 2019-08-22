<?php 
require('../config.php');

$type=$_REQUEST['type'];
$start_date=$_REQUEST['start_date'];
$end_date=$_REQUEST['end_date'];

if($type=='all')								
$query=mysqli_query($conn,"select * from tbl_coupons where delete_status=0");
else if($type=='today')								
$query=mysqli_query($conn,"select * from tbl_coupons where delete_status=0 and DATE(date) = CURDATE()");	
else if($type=='yesterday')								
$query=mysqli_query($conn,"select * from tbl_coupons where delete_status=0 and date >= DATE_SUB(CURDATE(), INTERVAL 1 DAY)");		
else if($type=='lweek')								
$query=mysqli_query($conn,"select * from tbl_coupons where delete_status=0 and date >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)");								
else if($type=='lmonth')								
$query=mysqli_query($conn,"select * from tbl_coupons where delete_status=0 and date >= DATE_SUB(CURDATE(), INTERVAL 31 DAY)");			
else if($type=='lyear')								
$query=mysqli_query($conn,"select * from tbl_coupons where delete_status=0 and date >= DATE_SUB(CURDATE(), INTERVAL 365 DAY)");		
else if($type=='date')	
$query=mysqli_query($conn,"select * from tbl_coupons where delete_status=0 and start_date >= '".$start_date."' and end_date <='".$end_date."'");									

while($fetchdata=mysqli_fetch_array($query))
{
?>

<tr>
<td><input type="checkbox" class="checkbox" value="<?php echo $fetchdata['id'] ?>"></td>
<td><?php echo $fetchdata['coupon_name']; ?></td>
<td><?php echo $fetchdata['code']; ?></td>
<td><?php echo $fetchdata['discount']; ?></td>
<td><?php echo $fetchdata['start_date']; ?></td>
<td><?php echo $fetchdata['end_date']; ?></td>
<td><?php echo $fetchdata['status']; ?></td>
<td><a href="add_coupon.php?id=<?php echo $fetchdata['id']; ?>">Edit</a></td>
<td><a href="viewcoupon.php?code=<?php echo $fetchdata['code']; ?>">View</a></td>
</tr>

<?php } ?>