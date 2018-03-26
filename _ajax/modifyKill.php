<?php
include('../core/functions.php');
$reportid = $_POST['reportid'];
$currval = $_POST['currval'];
$success = toggleReport($reportid, $currval);
$output = array('status' => 'failures', 'message' => '');
if($success['status'] !== FALSE){
	$output['status'] = 'success';
	$output['message'] = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span>
	<span class="sr-only">Close</span></button> <strong>ASD!</strong>'.$success['message'].'</div>';
}ELSE{
	$output['message'] = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span>
	<span class="sr-only">Close</span></button> <strong>Failure!</strong>'.$success['message'].'</div>';
}
echo json_encode($output);
?>
