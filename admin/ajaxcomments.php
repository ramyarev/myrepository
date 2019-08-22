<?php 
require('../config.php');
$id= $_REQUEST['id'];

 $comments=mysqli_fetch_array(mysqli_query($conn,"select * from tbl_comments where id='".$id."'"));


?>

<div class="form-group" align="left">
		<label>
			Date:
		</label>
		<input type="date" class="form-control" data-validetta="required" name="date" id="date" value="<?php echo $comments['date'] ?>">
	</div>
	<div class="form-group" align="left">
		<label>
			Topic:
		</label>
		<input type="text" class="form-control" data-validetta="required" name="topic" id="topic" value="<?php echo $comments['topic'] ?>">
	</div>
	<div class="form-group" align="left">
		<label>
			Message:
		</label>
		<textarea class="form-control" name="message" id="message"><?php echo $comments['message'] ?></textarea>
	</div>
	<div class="form-group" align="left">
		<label>
			Staff Name & ID:
		</label>
		<input type="text" class="form-control" data-validetta="required"  name="staff_name" id="staff_name" value="<?php echo $comments['staff_name'] ?>">
		<div id="email_status"></div>
	</div>
	<div class="form-group" align="left">
		<label>
			Status:
		</label>
		<input type="text" class="form-control" data-validetta="required"  name="status" id="status" value="<?php echo $comments['status'] ?>">
		<div id="email_status"></div>
	</div>
	