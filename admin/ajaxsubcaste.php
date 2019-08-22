<?php
require('../config.php');
$caste_id=$_REQUEST['caste_id'];
$type=$_REQUEST['types'];

?>
<?php if($type=='partner') { ?>
<select class="form-control" name="partnersub_caste" id="partnersub_caste" data-validetta="required">
<?php } else { ?>
<select class="form-control" name="sub_caste" id="sub_caste" data-validetta="required">
<?php } 

$getsubcaste=mysqli_query($conn,"select * from tbl_subcaste where caste_id='".$caste_id."'");
		
while($subcaste=mysqli_fetch_array($getsubcaste)) { 
?>
 <option value="<?php echo $subcaste['id']; ?>"><?php echo $subcaste['subcaste']; ?></option>   
<?php } ?>                                   
</select>

