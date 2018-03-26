$(document).ready(function() {
	$('#toggleCSS').click(
		function(){
			var userData = $.ajax({url: '/_ajax/update_style.php', type: 'POST'});
			userData.done(function(responseData) {
				location.reload(true);
			});
		}
	);
	$('#passwordUpdate').click(function(event){
		$("#passwordUpdate").attr("disabled", true);
		var data = {password: $('#frm_password').val()};
		var userData = $.ajax({data: data, url: '/_ajax/update_password.php', type: 'POST'});
		userData.done(function(responseData) {
			var responseJSON = JSON.parse(responseData);
			$('#PwarningArea').empty();
			$('#PwarningArea').append(responseJSON.message);
			$("#passwordUpdate").attr("disabled", false);
		});
	});
	$("#toggleView").click(function(){
		$('#display_cards').toggle();
		$("#display_tabular").toggle();
	});
});