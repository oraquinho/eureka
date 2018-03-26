<?php
include('../core/functions.php');
$encounterid = $_POST['encounterid'];
$instanceid = $_POST['instanceid'];
$minutesSince = 0;
IF(ISSET($_POST['minutesSince']) && !EMPTY($_POST['minutesSince'])){$minutesSince = $_POST['minutesSince'];}
$success = recordKill($instanceid, $encounterid, $minutesSince);

$output = array('status' => false, 'message' => 'There was an error updating your instance.');
if($success['status'] !== FALSE){
	$output['status'] = 'success';
}ELSE{
	$output['message'] = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button> <strong>Failure!</strong> '.$success['message'].'</div>';
}

echo json_encode($output);
?>
