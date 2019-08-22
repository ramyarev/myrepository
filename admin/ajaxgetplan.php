<?php
require('../config.php');
$plan_id=$_REQUEST['plan_id'];

$getplandetail=mysqli_fetch_array(mysqli_query($conn,"select * from tbl_plan_feature where plan_id='".$plan_id."' and delete_status=0"));


echo $getplandetail['default_duration']."~".$getplandetail['default_mobileno']."~".$getplandetail['default_message']."~".$getplandetail['default_allaccess']."~".$getplandetail['default_amount']."~".$getplandetail['video_upload']."~".$getplandetail['online_chat'];

?>