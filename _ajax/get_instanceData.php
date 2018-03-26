<?php 
include('../core/functions.php'); 

$instanceID = ((ISSET($_POST['instanceID'])) ? $_POST['instanceID'] : $_GET['instanceID']);
$minLv = ((ISSET($_POST['minLv'])) ? $_POST['minLv'] : $_GET['minLv']);
$maxLv = ((ISSET($_POST['maxLv'])) ? $_POST['maxLv'] : $_GET['maxLv']);

$encounters = getEncounters($minLv, $maxLv);
$output = array();

$encounterShare = array();
$output_share = '';

foreach($encounters as $encounter){
	$reports = array();
	$encounterID = $encounter['encounterID'];
	$allReports = getLastReports($instanceID, $encounterID);
	$latestValidReport = -999; //epoch
	foreach($allReports as $report){
		if($report['absoluteTime'] > $latestValidReport && $report['isValid'] == '1'){ $latestValidReport = $report['absoluteTime']; }

		$thisReport = array(
			'reportID' => $report['reportID'], 
			'timeSince' => minutesSince($report['absoluteTime']), 
			'isValid' => $report['isValid']);
		$reports[] = $thisReport;
	}

	$minutes = $encounter['respawnMinutes'] - minutesSince($latestValidReport);
	$status = $minutes.' min(s)';
	$ratio = (100 * $minutes / $encounter['respawnMinutes'] ); //0%

	if($ratio < 0){ $ratio = 0; }
	if($minutes < 0){
		$status = 'Ready';
	}

	if($latestValidReport == -999){
		$status = 'Unconfirmed';
		$ratio = 100;
	}
	
	if($status != 'Ready' && $status != 'Unconfirmed'){
		$encounterShare[$encounter['bossName']] = $minutes;
	}

	$tmpArray = array(
		'lastReport' => $latestValidReport,
		'status' => $status,
		'percent' => $ratio,
		'reports' => $reports
	);
	$output[$encounterID] = $tmpArray;
}

/* hack; generate the share string through php. :thonking: */
array_multisort($encounterShare);
foreach($encounterShare as $key => $value){
	$output_share.=$key.' ('.$value.'m) → ';
}


$finalOutput = array('data' => $output, 'sharestring' => $output_share);

echo json_encode($finalOutput);
?>
