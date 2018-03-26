<?php 
include('../core/functions.php'); 

$finalWeathers = array();
$nextWeather = getWeathers();

$nextGale = getNextGale();
$galeRemaining = minutesUntil($nextGale['Epoch']);

$counter = 0;
$firstWidth = 0;
foreach($nextWeather as $weather){
	$defaultWidth = 20;
	$epoch = $weather['Epoch'];
	$cleaned_weather = str_replace(' ', '', $weather['Weather']);
	$minsUntil = minutesUntil($epoch);
	if($counter == 0){
		$defaultWidth = 20*((23 + $minsUntil)/23); 
		if($defaultWidth > 20){
			$defaultWidth = 20;
		}else if($defaultWidth == 0){
			$defaultWidth = 0.5;
		}
		$firstWidth = $defaultWidth;
	}else if($counter >= 5){
		$defaultWidth = 20 - $firstWidth;
		if($defaultWidth < 0){$defaultWidth = 0;}
	}
	$tmpArray = array("minutesUntil" => $minsUntil, "weather" => $cleaned_weather, "width" => $defaultWidth);
	$finalWeathers[] =  $tmpArray;
	$counter++;
}

$finalOutput = array('nextWeather' => $finalWeathers, 'nextGale' => $galeRemaining);

echo json_encode($finalOutput);
?>
