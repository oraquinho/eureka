$(document).ready(function() {
	updateWeather();
	setInterval(function(){updateWeather()}, 15000)
	
	var weatherString = '';
	
	function updateWeather(){
		weatherString = '';
		var userData = $.ajax({url: '/_ajax/get_weather.php', type: 'POST'});
		userData.done(function(responseData) {
			var fullobj = JSON.parse(responseData);
			var weatherGale = fullobj.nextGale;
			var obj = fullobj.data;
			var weatherobj = fullobj.nextWeather;
			
			if(weatherGale < 1){
				$('#galeCounter').html('<img src="/assets/img/weather/Gales_M.png"> ends in ' + (23 + weatherGale) + ' min(s).')
			}else{
				$('#galeCounter').html('<img src="/assets/img/weather/Gales_M.png"> ' + weatherGale + ' min(s).')
			}
			
			var counter = 1;
			for(var key in weatherobj){
				var attrs = weatherobj[key];
				var minutesUntil = attrs['minutesUntil'];
				var weather = attrs['weather'];
				var width = attrs['width'];
				$('#weather' + counter).css("background", "url(/assets/img/weather/" + weather + ".png)")
				$('#weather' + counter).css("width", width + "%")
				if(counter == 1){
					$('#weather' + counter).attr("data-original-title", "The weather is currently " + weather + ". This weather ends in " + (23 + minutesUntil) + " min(s)!")
				}else{
					$('#weather' + counter).attr("data-original-title", "The weather will be " + weather + " in " + (minutesUntil) + " min(s)!")
					weatherString = weatherString + "  " + weather + " in " + minutesUntil + "m";
				}
				counter++;
			}
			$('#shareWeather').data("weather", weatherString);
		});
	}
});