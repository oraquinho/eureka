<?php
	ini_set('session.gc_maxlifetime', 2000000);
	ini_set('session.cookie_lifetime', 2000000);
	session_start();
	date_default_timezone_set("America/New_York");
	CONST assoc = PDO::FETCH_ASSOC;
	$thisPage = basename($_SERVER['SCRIPT_FILENAME']);
	$ipaddress = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
	if(basename($_SERVER["PHP_SELF"]) == "functions.php"){die("403 - Access Forbidden");}
	$salt = "rERHAV7hBX96k9ze1X0e1dJbaUAI7cEPGX5vzyT1484-";
	
	$dsn = 'mysql:host=YOURHOSTHERE;dbname=YOURDATABASENAMEHERE';
	$username = 'YOURUSERNAMEHERE';
	$password = 'YOURPASSWORDHERE';

	try {
		$db = new PDO($dsn, $username, $password);
	} catch (PDOException $e) {
		$error_message = $e->getMessage();
		die($error_message);
		exit();
	}

	function checkAuthority($instanceid){
		$stmt = "SELECT * from `instances` WHERE instanceID = ?;";
		$params = array($instanceid);
		$result = querySingle($stmt, $params);
		$passwordVal = $result['createTime'];
		IF($result['isPublic'] == '1'){
			RETURN TRUE;
		}ELSE IF($_SESSION['password'] == $passwordVal){RETURN TRUE;}
		
		RETURN FALSE;
	}
	
	function getWeathers(){
		$floor = strtotime('now') - 1400;
		$query = "SELECT * FROM weather_queue WHERE Epoch > ".$floor." ORDER BY Epoch ASC LIMIT 6";
		return query($query, NULL);
	}
	
	function getNextGale(){
		$floor = strtotime('now') - 1400;
		$query = "SELECT * FROM weather_queue WHERE Epoch > ".$floor." AND weather = 'Gales' ORDER BY Epoch ASC LIMIT 1";
		return querySingle($query, NULL);
	}
	
	function recordKill($instanceid, $encounterid, $minutesSince){
		$isAuthorized = checkAuthority($instanceid);
		IF(!$isAuthorized){
			return array('status' => FALSE, 'message' => ' The creator of this instance has flagged it to not be public. In order to contribute, you must supply the password at the cog button.');
		}
		$minuteShift = 0;
		if($minutesSince > 0){$minuteShift = $minutesSince;}
		if($minutesSince >= 120){$minuteShift = 120;}
		$hour = 3600;
		$lastTime = "SELECT * from `reports` WHERE instanceID = ? AND encounterID = ? AND isValid = 1 ORDER BY absoluteTime DESC LIMIT 1;";
		$parames = array($instanceid, $encounterid);
		$result = querySingle($lastTime, $parames);
		$theTime = $result['absoluteTime'];
		$lastReported = ceil(strtotime('now') - $theTime);
		IF($lastReported >= $hour){
			$stmt = "INSERT INTO `reports` (instanceID, encounterID, absoluteTime, weatherID, isValid) VALUES(?, ?, ?, ?, ?)";
			$params = array($instanceid, $encounterid, (strtotime('now')-($minuteShift * 60)), -1, 1);
			return querySingle($stmt, $params);
		}ELSE{
			return array('status' => FALSE, 'message' => 'There was an active report in the past '.ceil($lastReported/60).' min(s). Someone has either just reported this, or an hour has not passed from the last reporting. In the case that the past report was invalid, please toggle it off before trying again.');
		}
	}
	
	function contains($needle, $haystack){
		return strpos($haystack, $needle) !== false;
	}
	
	function getReports($instanceID){
		$stmt = "SELECT * FROM `reports` r, `encounters` e WHERE e.encounterID = r.encounterID AND r.instanceID = ? ORDER BY r.absoluteTime DESC;";
		$params = array($instanceID);
		return query($stmt, $params);
	}
	
	function getRecentReports($instanceID){
		$stmt = "SELECT * FROM `reports` r, `encounters` e WHERE e.encounterID = r.encounterID AND r.instanceID = ? ORDER BY r.absoluteTime DESC;";
		$params = array($instanceID);
		return query($stmt, $params);
	}
	
	function getInstance($slug){
		$stmt = "SELECT * FROM `instances` WHERE slug = ?;";
		$params = array($slug);
		return querySingle($stmt, $params);
	}
	
	function createInstance($name, $slug, $isPublic, $password){
		$stmt = "INSERT INTO `instances` (instanceName, slug, isPublic, createTime) VALUES (?, ?, ?, ?);";
		$params = array($name, $slug, $isPublic, $password);
		return querySingle($stmt, $params);
	}
	
	function getEncounters($min, $max){
		$stmt = 'SELECT * FROM `encounters` WHERE nm_level >= ? AND nm_level <= ? ORDER BY nm_level ASC';
		$params = array($min, $max);
		return query($stmt, $params);
	}
	
	function test_list(){
		$stmt = "SELECT * FROM `instances`;";
		return query($stmt, null);
	}
	
	function getLast($instanceID, $encounterID){
		$stmt = "SELECT * FROM `reports` WHERE instanceID = ? AND encounterID = ? AND isValid = 1 ORDER BY absoluteTime DESC LIMIT 1";
		$params = array($instanceID, $encounterID);
		return query($stmt, $params);
	}
	
	function getLastReports($instanceID, $encounterID){
		$stmt = "SELECT * FROM `reports` WHERE instanceID = ? AND encounterID = ? ORDER BY reportID DESC LIMIT 5";
		$params = array($instanceID, $encounterID);
		return query($stmt, $params);
	}
	
	function toggleReport($reportid, $currval){
		$stmt1 = "SELECT * FROM `reports` WHERE reportID = ?;";
		$params1 = array($reportid);
		$results = querySingle($stmt1, $params1);
		$instanceid = $results['instanceID'];
		
		$isAuthorized = checkAuthority($instanceid);
		IF(!$isAuthorized){
			return array('status' => FALSE, 'message' => ' The creator of this instance has flagged it to not be public. In order to contribute, you must supply the password at the cog button.');
		}
		
		
		$newVal = 0;
		IF($currval == '0'){$newVal = 1;}
		$stmt = "UPDATE `reports` SET isValid = ? WHERE reportID = ?;";
		$params = array($newVal, $reportid);
		query($stmt, $params);
		return array('status' => TRUE, 'message' => 'currval='.$currval.'|newval='.$newVal.'|reportid='.$reportid.'|');
	}
	
	function query($statement, $binds = array()){
		global $db;
		$stmt = $db->prepare($statement);
		$counter = 1;
		foreach($binds as &$value){
			$stmt->bindValue($counter, $value, PDO::PARAM_STR);
			$counter++;
		}
		$result = $stmt->execute();
		$output = $stmt->fetchAll();
		$stmt->closeCursor();
		return $output;
	}
	
	function querySingle($statement, $binds = array()){
		global $db;
		$stmt = $db->prepare($statement);
		$counter = 1;
		foreach($binds as &$value){
			$stmt->bindValue($counter, $value, PDO::PARAM_STR);
			$counter++;
		}
		$result = $stmt->execute();
		$output = $stmt->fetchAll();
		$stmt->closeCursor();
		return $output[0];
	}
	
	function randomSlug(){
		return hash('md5', strtotime('now'));
	}
	
	function randomSuffix(){
		return substr(randomSlug(), 0, 4);
	}
	
	function redirect($slug){
		header('Location: http://ffxiv.net'.$slug);
		echo '<meta http-equiv="refresh" content="0;url=http://ffxiv.net'.$slug.'">';
		die();
	}
	
	function intToBool($val){
		IF($val == '1'){
			return 'true';
		}else{
			return 'false';
		}
	}

	function minutesSince($epoch){
		return CEIL((strtotime('now') - $epoch) / 60);
	}
	function minutesUntil($epoch){
		return CEIL(($epoch - strtotime('now')) / 60);
	}
?>