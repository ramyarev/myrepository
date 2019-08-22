<?php
require('../config.php');
$state_id=$_REQUEST['state_id'];
$type=$_REQUEST['types'];
?>

<?php if($type=='partner') { ?>
<select class="form-control" name="partnerpreferred_cities" id="partnerpreferred_cities" data-validetta="required">
<?php } else if($type=='birth') { ?>
<select class="form-control" name="birth_city" id="birth_city" data-validetta="required">
<?php } else { ?>
<select class="form-control" name="home_city" id="home_city" data-validetta="required">
<?php } ?>
<?php 
$getcity=mysqli_query($conn,"select * from tbl_city where state_id='".$state_id."'");
		
while($city=mysqli_fetch_array($getcity)) { 
?>
 <option value="<?php echo $city['id']; ?>"><?php echo $city['city']; ?></option>   
<?php } ?>                                   
</select>

