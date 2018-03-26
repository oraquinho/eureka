<?php
include('../core/functions.php');

IF(ISSET($_SESSION['style'])){
	IF($_SESSION['style'] == 'light'){
		$_SESSION['style'] = 'dark';
	}ELSE{
		$_SESSION['style'] = 'light';
	}
}ELSE{
	$_SESSION['style'] = 'dark';
}

$output = array('status' => TRUE, 'message' => '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button> <strong>Success!</strong> You have updated your style preferences.</div>');

echo json_encode($output);
?>