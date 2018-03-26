$(document).ready(function() {
	$('#shareStates').click(
		function(){
			var link = $('#shareStates').data('slug')
			var prefix = $('#shareStates').data('sharelink')
			var fullLink = "/shout Tracker  " + prefix + " http://ffxiv.net/track/" + link + " ";
			$('#hdn').val(fullLink);
			$('#hdn').select();
			document.execCommand("copy");
		}
	);
	$('#shareStatesU').click(
		function(){
			var link = $('#shareStates').data('slug')
			var prefix = $('#shareStatesU').data('sharelink')
			var fullLink = "/shout Tracker  Unconfirmed NMs  " + prefix + " http://ffxiv.net/track/" + link + " ";
			$('#hdn').val(fullLink);
			$('#hdn').select();
			document.execCommand("copy");
		}
	);
	$('#shareStatesLO').click(
		function(){
			var link = $('#shareStates').data('slug')
			var fullLink = "/shout Tracker   http://ffxiv.net/track/" + link + " ";
			$('#hdn').val(fullLink);
			$('#hdn').select();
			document.execCommand("copy");
		}
	);
});