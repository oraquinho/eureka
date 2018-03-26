<?php
include('../core/functions.php');

$password = $_POST['password'];
$_SESSION['password'] = $password;

$output = array('status' => TRUE, 'message' => '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button> <strong>Success!</strong> You have changed your password to '.$password.'. You may edit instances which use this password.</div>');

echo json_encode($output);
?>
