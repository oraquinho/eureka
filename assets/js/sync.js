$(document).ready(function() {
	repopulate();
	$('#display_cards').toggle();
	$("#tableOutput").tablesorter();
	
	
	setInterval(function(){repopulate()}, 15000)
	
	function repopulate(){
		var data = {instanceID: thisInstanceID, minLv: 1, maxLv: 20};
		var userData = $.ajax({data: data, url: '/_ajax/get_instanceData.php', type: 'POST'});
		userData.done(function(responseData) {
			var fullobj = JSON.parse(responseData);
			var obj = fullobj.data;
			var sharestring = fullobj.sharestring;

			for(var key in obj){
				var attrs = obj[key];
				var alpha = attrs['alpha'];
				var status = attrs['status'];
				var percent = attrs['percent'];
				var reports = attrs['reports'];
				
				if(status != "Unconfirmed" && status != "Ready" && percent > 5){
					$('#nmT_' + key + '_row').removeClass("countingDown").addClass("countingDown")
				}else{
					$('#nmT_' + key + '_row').removeClass("countingDown")
				}
				
				var updateShift = 0;
				if(status == "Ready"){percent = 100; updateShift = 2;}else if(status == "Unconfirmed"){updateShift = 1;}
				$("#nm_" + key + "_alpha").css("background", "rgba(0,0,0," + alpha + ")")
				$("#nm_" + key + "_status").html(status)
				$("#nmT_" + key + "_status").html(status)
				$("#nm_" + key + "_progress").css("width", percent + "%")
				$("#nmT_" + key + "_progress").css("width", percent + "%") 
				
				var encodedReports = encodeURIComponent(JSON.stringify(reports));
				$("#nm_" + key + "_btn").data("reports", encodedReports)
				$("#nmT_" + key + "_btn").data("reports", encodedReports)
				$("#nm_last_updated").empty()
				$("#shareStates").data("sharelink", sharestring)
				$("#nmT_" + key + "_progressX").html(percent + updateShift)
				$("table").trigger("update");
			}
		});
	}

	$('#reportKill').click(function(event){
		$("#reportKill").attr("disabled", true);
		var data = {encounterid: $('#frm_encounterid').val(),instanceid: thisInstanceID,minutesSince: $('#frm_minutesSince').val()};
		var userData = $.ajax({data: data, url: '/_ajax/reportKill.php', type: 'POST'});
		userData.done(function(responseData) {
			var responseJSON = JSON.parse(responseData);
			if(responseJSON.status == false){
				$('#warningArea').empty();
				$('#warningArea').append(responseJSON.message);
				$("#reportKill").attr("disabled", false);
			}else{
				$("#reportKill").attr("disabled", false);
				$('#reportModal').modal('hide');
				repopulate();
			}
		});
	});
	
	 $('.rapidRecord').on('click', function (event){
		var button = $(this)
		var xencounterid = button.data('encounterid')
		var xinstanceid = thisInstanceID
		var xminutesSince = 0
		var data = {encounterid: xencounterid,instanceid: thisInstanceID, minutesSince: xminutesSince};
		var userData = $.ajax({data: data, url: '/_ajax/reportKill.php', type: 'POST'});
		userData.done(function(responseData) {
			repopulate();
		});
	 });
	 
	$("#reportLogs").on("click", ".toggleLog", function(event){
		$('#warningArea').empty();
		var button = $(this)
		var data = {reportid: button.data('reportid'),currval: button.data('currval')};
		var userData = $.ajax({data: data, url: '/_ajax/modifyKill.php', type: 'POST'});
		userData.done(function(responseData) {
			var responseJSON = JSON.parse(responseData);
			if(responseJSON.status === false){
				$('#warningArea').empty();
				$('#warningArea').append(responseJSON.message);
			}else{
				$('#warningArea').empty();
				$('#reportModal').modal('hide');
				repopulate();
			}
		});
	});
});