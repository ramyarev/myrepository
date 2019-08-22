<?php 

require('../config.php');

$category=$_REQUEST['category'];
$featureid=$_REQUEST['featureid'];

$getcategory=mysqli_fetch_array(mysqli_query($conn,"select category from tbl_plan where id='".$category."'"));

$getfeature=mysqli_fetch_array(mysqli_query($conn,"select * from tbl_plan_feature where id='".$featureid."' and delete_status=0"));

?>

<?php if($getcategory['category']=='unlimited') {  ?>
<!-- UNLIMITED START -->
								
<div id="unlimited">

	<div class="form-group">
		<label>
			<h4><b>UNLIMITED:</b></h4>
		</label>
		
	</div>
<div class="row">

<div class="col-md-6 col-xs-12">
	<div class="form-group">
		<label>
			Allow Message:
		</label>
		<input type="text" class="form-control" data-validetta="required" value="<?php echo $getfeature['unlimited_message']; ?>" name="unlimited_message" id="unlimited_message">
	</div>
							 
</div>


<div class="col-md-6 col-xs-12">

<div class="form-group">
<label>
	Allow Horoscope:
</label>
		<input type="text" class="form-control" value="<?php echo $getfeature['unlimited_horoscope']; ?>" name="unlimited_horoscope" id="unlimited_horoscope" data-validetta="required">
</div>

</div>

<div class="col-md-6 col-xs-12">
	<div class="form-group">
		<label>
			Allow Mobile No Access:
		</label>
		<input type="text" class="form-control" data-validetta="required" value="<?php echo $getfeature['unlimited_mobileno']; ?>" name="unlimited_mobileno" id="unlimited_mobileno">
	</div>
							 
</div>


<div class="col-md-6 col-xs-12">

<div class="form-group">
<label>
	Allow All Access Details:
</label>
		<input type="text" class="form-control" value="<?php echo $getfeature['unlimited_allaccess']; ?>" name="unlimited_allaccess" id="unlimited_allaccess" data-validetta="required">
</div>

</div>
 <div class="col-md-6 col-xs-12">

<div class="form-group">
<?php 
if($getfeature['profile_highlighter']=='on')
{
	$highchecked= "checked";
}
else {
	$highchecked= "";
}
?>
<label>
	Profile Highlighter:
</label>
	 <label class="switch">
	  <input type="checkbox" name="profile_highlighter" id="profile_highlighter" onchange="enableday()" <?php echo $highchecked; ?>>
	  <span class="slider round"></span>
	</label>
</div>



</div>
 <div class="col-md-6 col-xs-12">

<div class="form-group" id="highlighterday_div" >
<label>
	Number Of Days:
</label>
		<input type="text" class="form-control"  value="<?php echo $getfeature['highlighter_days']; ?>" name="highlighter_days" id="highlighter_days" data-validetta="required">
</div>

</div>

 <div class="col-md-6 col-xs-12">
 
 <?php 
 
 $expdata=explode(",",$getfeature['unlimited_day']);
 for($i=0;$i<=count($expdata);$i++)
 {
	 if($expdata[$i]=='1')
	 {
		 $sunday='checked';
	 }
	 else if($expdata[$i]=='2')
	 {
		  $monday='checked';
	 }
	  else if($expdata[$i]=='3')
	 {
		 $tuesday='checked';
	 }
	 else if($expdata[$i]=='4')
	 {
		  $wednesday='checked';
	 }
	 else if($expdata[$i]=='5')
	 {
		  $thursday='checked';
	 }
	 else if($expdata[$i]=='6')
	 {
		  $friday='checked';
	 }
	 else if($expdata[$i]=='7')
	 {
		  $saturday='checked';
	 }
	 
 }
 ?>

<div class="form-group">
<input type="checkbox" name="unlimited_day[]" id="unlimited_day" value="1" <?php echo $sunday; ?>> <b>Sun</b>
<input type="checkbox" name="unlimited_day[]" id="unlimited_day" value="2" <?php echo $monday; ?>> <b>Mon</b>
<input type="checkbox" name="unlimited_day[]" id="unlimited_day" value="3" <?php echo $tuesday; ?>> <b>Tues</b>
<input type="checkbox" name="unlimited_day[]" id="unlimited_day" value="4" <?php echo $wednesday; ?>> <b>Wednes</b>
<input type="checkbox" name="unlimited_day[]" id="unlimited_day" value="5" <?php echo $thursday; ?>> <b>Thurs</b>
<input type="checkbox" name="unlimited_day[]" id="unlimited_day" value="6" <?php echo $friday; ?>> <b>Fri</b>
<input type="checkbox" name="unlimited_day[]" id="unlimited_day" value="7" <?php echo $saturday; ?>> <b>Satur</b>
</div>

</div>

 <div class="col-md-6 col-xs-12">

<div class="form-group">
<label>
	Number Of Days:
</label>
		<input type="text" class="form-control"  value="<?php echo $getfeature['unlimited_noofdays']; ?>" name="unlimited_noofdays" id="unlimited_noofdays" data-validetta="required">
</div>

</div>

<div class="col-md-6 col-xs-12">

<div class="form-group">
<label>
	In Time
</label>
		<input type="text" class="form-control" value="<?php echo $getfeature['unlimited_intime']; ?>" name="unlimited_intime" id="unlimited_intime" data-validetta="required">
</div>

</div>
 <div class="col-md-6 col-xs-12">

<div class="form-group">
<label>
	Out Time:
</label>
	<input type="text" class="form-control" value="<?php echo $getfeature['unlimited_outtime']; ?>" name="unlimited_outtime" id="unlimited_outtime" data-validetta="required">
</div>

</div>
</div>
<div class="row">

<input type="submit" name="addfeature" id="addfeature" value="Add Plan Feature" class="btn btn-custom btn-block" style="width:150px">
</div>

</div>
<?php } ?>

<!-- UNLIMITED END -->

<?php if($getcategory['category']=='premium') {  ?>
<!-- PREMIUM START -->

<div id="premium" >

	<div class="form-group">
		<label>
			<h4><b>PREMIUM:</b></h4>
		</label>
		
	</div>
	
	
<div class="row">

<div class="col-md-6 col-xs-12">
	<div class="form-group">
		<label>
			Unlimited Plan:
		</label>
		<select id="unlimitedplan" name="unlimitedplan" class="form-control">
		<option value="">Select Plan Name</option>
		 <?php $getunlimitedplan=mysqli_query($conn,"select * from tbl_plan where delete_status=0 and category='unlimited'");
			while($fetchunlimitedplan=mysqli_fetch_array($getunlimitedplan))
			{
		   ?>
		   <option value="<?php echo $fetchunlimitedplan['id']; ?>"><?php echo $fetchunlimitedplan['plan_name']; ?></option>
			<?php } ?>
		</select>
		 <script>
		document.getElementById('unlimitedplan').value="<?php echo $getfeature['unlimitedplan']; ?>";
	   </script>
		
	</div>
							 
</div>


<div class="col-md-6 col-xs-12">

<div class="form-group">
<label>
	Allow Premium Profile:
</label>
		<input type="text" class="form-control" value="<?php echo $getfeature['allow_premiumprofile']; ?>" name="allow_premiumprofile" id="allow_premiumprofile" data-validetta="required">
</div>

</div>

<div class="col-md-6 col-xs-12">
	<div class="form-group">
		<label>
			Allow Message:
		</label>
		<input type="text" class="form-control" data-validetta="required" value="<?php echo $getfeature['unlimited_message']; ?>" name="unlimited_message" id="unlimited_message">
	</div>
							 
</div>


<div class="col-md-6 col-xs-12">

<div class="form-group">
<label>
	Allow Horoscope:
</label>
		<input type="text" class="form-control" value="<?php echo $getfeature['unlimited_horoscope']; ?>" name="unlimited_horoscope" id="unlimited_horoscope" data-validetta="required">
</div>

</div>

<div class="col-md-6 col-xs-12">
	<div class="form-group">
		<label>
			Allow Mobile No Access:
		</label>
		<input type="text" class="form-control" data-validetta="required" value="<?php echo $getfeature['unlimited_mobileno']; ?>" name="unlimited_mobileno" id="unlimited_mobileno">
	</div>
							 
</div>


<div class="col-md-6 col-xs-12">

<div class="form-group">
<label>
	Allow All Access Details:
</label>
		<input type="text" class="form-control" value="<?php echo $getfeature['unlimited_allaccess']; ?>" name="unlimited_allaccess" id="unlimited_allaccess" data-validetta="required">
</div>

</div>
 <div class="col-md-6 col-xs-12">

<div class="form-group">
<?php 
if($getfeature['profile_highlighter']=='on')
{
	$highchecked= "checked";
}
else {
	$highchecked= "";
}
?>
<label>
	Profile Highlighter:
</label>
	 <label class="switch">
	  <input type="checkbox" name="profile_highlighter" id="profile_highlighter" onchange="enableday()" <?php echo $highchecked; ?>>
	  <span class="slider round"></span>
	</label>
</div>

</div>
 <div class="col-md-6 col-xs-12">

<div class="form-group" id="highlighterday_div" style='visibility:hidden;'>
<label>
	Number Of Days:
</label>
		<input type="text" class="form-control"  value="<?php echo $getfeature['highlighter_days']; ?>" name="highlighter_days" id="highlighter_days" data-validetta="required">
</div>

</div>

 <div class="col-md-6 col-xs-12">

<?php 
 
 $expdata=explode(",",$getfeature['unlimited_day']);
 for($i=0;$i<=count($expdata);$i++)
 {
	 if($expdata[$i]=='1')
	 {
		 $sunday='checked';
	 }
	 else if($expdata[$i]=='2')
	 {
		  $monday='checked';
	 }
	  else if($expdata[$i]=='3')
	 {
		 $tuesday='checked';
	 }
	 else if($expdata[$i]=='4')
	 {
		  $wednesday='checked';
	 }
	 else if($expdata[$i]=='5')
	 {
		  $thursday='checked';
	 }
	 else if($expdata[$i]=='6')
	 {
		  $friday='checked';
	 }
	 else if($expdata[$i]=='7')
	 {
		  $saturday='checked';
	 }
	 
 }
 ?>

<div class="form-group">
<input type="checkbox" name="unlimited_day[]" id="unlimited_day" value="1" <?php echo $sunday; ?>> <b>Sun</b>
<input type="checkbox" name="unlimited_day[]" id="unlimited_day" value="2" <?php echo $monday; ?>> <b>Mon</b>
<input type="checkbox" name="unlimited_day[]" id="unlimited_day" value="3" <?php echo $tuesday; ?>> <b>Tues</b>
<input type="checkbox" name="unlimited_day[]" id="unlimited_day" value="4" <?php echo $wednesday; ?>> <b>Wednes</b>
<input type="checkbox" name="unlimited_day[]" id="unlimited_day" value="5" <?php echo $thursday; ?>> <b>Thurs</b>
<input type="checkbox" name="unlimited_day[]" id="unlimited_day" value="6" <?php echo $friday; ?>> <b>Fri</b>
<input type="checkbox" name="unlimited_day[]" id="unlimited_day" value="7" <?php echo $saturday; ?>> <b>Satur</b>
</div>

</div>

 <div class="col-md-6 col-xs-12">

<div class="form-group">
<label>
	Number Of Days:
</label>
		<input type="text" class="form-control"  value="<?php echo $getfeature['unlimited_noofdays']; ?>" name="unlimited_noofdays" id="unlimited_noofdays" data-validetta="required">
</div>

</div>

<div class="col-md-6 col-xs-12">

<div class="form-group">
<label>
	In Time
</label>
		<input type="text" class="form-control" value="<?php echo $getfeature['unlimited_intime']; ?>" name="unlimited_intime" id="unlimited_intime" data-validetta="required">
</div>

</div>
 <div class="col-md-6 col-xs-12">

<div class="form-group">
<label>
	Out Time:
</label>
	<input type="text" class="form-control" value="<?php echo $getfeature['unlimited_outtime']; ?>" name="unlimited_outtime" id="unlimited_outtime" data-validetta="required">
</div>

</div>
</div>
<div class="row">

<input type="submit" name="addfeature" id="addfeature" value="Add Plan Feature" class="btn btn-custom btn-block" style="width:150px">
</div>

</div>

<?php } ?>
<!-- PREMIUM END -->


<?php if($getcategory['category']=='personalized') {  ?>
<!-- PREMIUM START -->

<div id="premium" >

	<div class="form-group">
		<label>
			<h4><b>PERSONALIZED:</b></h4>
		</label>
		
	</div>
	

	
<div class="row">

<div class="col-md-6 col-xs-12">
	<div class="form-group">
		<label>
			Unlimited Plan:
		</label>
		<select id="unlimitedplan" name="unlimitedplan" class="form-control">
		<option value="">Select Plan Name</option>
		 <?php $getunlimitedplan=mysqli_query($conn,"select * from tbl_plan where delete_status=0 and category='unlimited'");
			while($fetchunlimitedplan=mysqli_fetch_array($getunlimitedplan))
			{
		   ?>
		   <option value="<?php echo $fetchunlimitedplan['id']; ?>"><?php echo $fetchunlimitedplan['plan_name']; ?></option>
			<?php } ?>
		</select>
		
		 <script>
		 
		document.getElementById('unlimitedplan').value="<?php echo $getfeature['unlimitedplan']; ?>";
	   </script>
		
	</div>
	</div>
	
	<div class="col-md-6 col-xs-12">
	<div class="form-group">
		<label>
			Premium Plan:
		</label>
		<select id="premiumplan" name="premiumplan" class="form-control">
		<option value="">Select Plan Name</option>
		 <?php $getunlimitedplan=mysqli_query($conn,"select * from tbl_plan where delete_status=0 and category='premium'");
			while($fetchunlimitedplan=mysqli_fetch_array($getunlimitedplan))
			{
		   ?>
		   <option value="<?php echo $fetchunlimitedplan['id']; ?>"><?php echo $fetchunlimitedplan['plan_name']; ?></option>
			<?php } ?>
		</select>
		 <script>
		document.getElementById('premiumplan').value="<?php echo $getfeature['premiumplan']; ?>";
	   </script>
	</div>
							 
</div>

<div class="col-md-6 col-xs-12">
	<div class="form-group">
		<label>
			Allow Message:
		</label>
		<input type="text" class="form-control" data-validetta="required" value="<?php echo $getfeature['unlimited_message']; ?>" name="unlimited_message" id="unlimited_message">
	</div>
							 
</div>


<div class="col-md-6 col-xs-12">

<div class="form-group">
<label>
	Allow Horoscope:
</label>
		<input type="text" class="form-control" value="<?php echo $getfeature['unlimited_horoscope']; ?>" name="unlimited_horoscope" id="unlimited_horoscope" data-validetta="required">
</div>

</div>

<div class="col-md-6 col-xs-12">
	<div class="form-group">
		<label>
			Allow Mobile No Access:
		</label>
		<input type="text" class="form-control" data-validetta="required" value="<?php echo $getfeature['unlimited_mobileno']; ?>" name="unlimited_mobileno" id="unlimited_mobileno">
	</div>
							 
</div>


<div class="col-md-6 col-xs-12">

<div class="form-group">
<label>
	Allow All Access Details:
</label>
		<input type="text" class="form-control" value="<?php echo $getfeature['unlimited_allaccess']; ?>" name="unlimited_allaccess" id="unlimited_allaccess" data-validetta="required">
</div>

</div>
 <div class="col-md-6 col-xs-12">

<div class="form-group">

<?php 
if($getfeature['profile_highlighter']=='on')
{
	$highchecked= "checked";
}
else {
	$highchecked= "";
}
?>
<label>
	Profile Highlighter:
</label>
	 <label class="switch">
	  <input type="checkbox" name="profile_highlighter" id="profile_highlighter" onchange="enableday()" <?php echo $highchecked; ?>>
	  <span class="slider round"></span>
	</label>
</div>

</div>
 <div class="col-md-6 col-xs-12">

<div class="form-group" id="highlighterday_div" style='visibility:hidden;'>
<label>
	Number Of Days:
</label>
		<input type="text" class="form-control"  value="<?php echo $getfeature['highlighter_days']; ?>" name="highlighter_days" id="highlighter_days" data-validetta="required">
</div>

</div>

 <div class="col-md-6 col-xs-12">

<?php 
 
 $expdata=explode(",",$getfeature['unlimited_day']);
 for($i=0;$i<=count($expdata);$i++)
 {
	 if($expdata[$i]=='1')
	 {
		 $sunday='checked';
	 }
	 else if($expdata[$i]=='2')
	 {
		  $monday='checked';
	 }
	  else if($expdata[$i]=='3')
	 {
		 $tuesday='checked';
	 }
	 else if($expdata[$i]=='4')
	 {
		  $wednesday='checked';
	 }
	 else if($expdata[$i]=='5')
	 {
		  $thursday='checked';
	 }
	 else if($expdata[$i]=='6')
	 {
		  $friday='checked';
	 }
	 else if($expdata[$i]=='7')
	 {
		  $saturday='checked';
	 }
	 
 }
 ?>

<div class="form-group">
<input type="checkbox" name="unlimited_day[]" id="unlimited_day" value="1" <?php echo $sunday; ?>> <b>Sun</b>
<input type="checkbox" name="unlimited_day[]" id="unlimited_day" value="2" <?php echo $monday; ?>> <b>Mon</b>
<input type="checkbox" name="unlimited_day[]" id="unlimited_day" value="3" <?php echo $tuesday; ?>> <b>Tues</b>
<input type="checkbox" name="unlimited_day[]" id="unlimited_day" value="4" <?php echo $wednesday; ?>> <b>Wednes</b>
<input type="checkbox" name="unlimited_day[]" id="unlimited_day" value="5" <?php echo $thursday; ?>> <b>Thurs</b>
<input type="checkbox" name="unlimited_day[]" id="unlimited_day" value="6" <?php echo $friday; ?>> <b>Fri</b>
<input type="checkbox" name="unlimited_day[]" id="unlimited_day" value="7" <?php echo $saturday; ?>> <b>Satur</b>
</div>

</div>

 <div class="col-md-6 col-xs-12">

<div class="form-group">
<label>
	Number Of Days:
</label>
		<input type="text" class="form-control"  value="<?php echo $getfeature['unlimited_noofdays']; ?>" name="unlimited_noofdays" id="unlimited_noofdays" data-validetta="required">
</div>

</div>

<div class="col-md-6 col-xs-12">

<div class="form-group">
<label>
	In Time
</label>
		<input type="text" class="form-control" value="<?php echo $getfeature['unlimited_intime']; ?>" name="unlimited_intime" id="unlimited_intime" data-validetta="required">
</div>

</div>
 <div class="col-md-6 col-xs-12">

<div class="form-group">
<label>
	Out Time:
</label>
	<input type="text" class="form-control" value="<?php echo $getfeature['unlimited_outtime']; ?>" name="unlimited_outtime" id="unlimited_outtime" data-validetta="required">
</div>

</div>

<div class="col-md-6 col-xs-12">
<?php 
if($getfeature['personal_assistance']=='on')
{
	$personalchecked= "checked";
}
else {
	$personalchecked= "";
}

if($getfeature['door_step_assistance']=='on')
{
	$doorchecked= "checked";
}
else {
	$doorchecked= "";
}
?>
<div class="form-group">
<label>
	Personal Asstiance
</label>
		<label class="switch">
	  <input type="checkbox" name="personal_assistance" id="personal_assistance" <?php echo $personalchecked; ?> onchange="enableday()">
	  <span class="slider round"></span>
	</label>
</div>

</div>
 <div class="col-md-6 col-xs-12">

<div class="form-group">
<label>
	Door Step Asstiances:
</label>
	<label class="switch">
	  <input type="checkbox" name="door_step_assistance" id="door_step_assistance" onchange="enableday()" <?php echo $doorchecked; ?>>
	  <span class="slider round"></span>
	</label>
</div>

</div>
</div>
<div class="row">

<input type="submit" name="addfeature" id="addfeature" value="Add Plan Feature" class="btn btn-custom btn-block" style="width:150px">
</div>

</div>

<?php } ?>
<!-- PREMIUM END -->