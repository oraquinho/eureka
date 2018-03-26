$(document).ready(function() {
	$('#reportModal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget)
		var reportArray = JSON.parse(decodeURIComponent(button.data('reports')))
		var modal = $(this)
		$('#frm_minutesSince').val("")
		modal.find('#warningArea').empty()
		modal.find('#reportModalLabel').empty()
		modal.find('#reportModalLabel').append('Record Kill for <img src="/assets/img/nm/nm.png" height="14"> <strong>' + button.data('bossname') + '</strong>')
		$('#frm_encounterid').val(button.data('encounterid'))
		$('#frm_instanceid').val(thisInstanceID)
		modal.find('#reportLogs').empty()
		
		for(var key in reportArray){
			var prefix = '';	var suffix = '';
			var attrs = reportArray[key];
			var reportID = attrs['reportID'];
			var timeSince = attrs['timeSince'];
			var isValid = attrs['isValid'];
			if(isValid == "0"){prefix='<s>'; suffix='</s>';}
			modal.find('#reportLogs').append('<tr><td><button class="btn btn-inverse btn-circle btn-sm toggleLog margin-right-15" data-reportid="' + reportID + '" data-currval="' + isValid + '"><i class="fa fa-pencil"></i></button> ' + prefix + timeSince + ' min(s) ago' + suffix + '</s></td></tr>')
		}
	});
	$('#infoModal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget)
		var modal = $(this)
		modal.find('#infobossname').empty()
		modal.find('#infoModalLabel').empty()
		modal.find('#infoencountername').empty()
		modal.find('#infoencounterdesc').empty()
		modal.find('#infoModalLabel').append('General Info for <img src="/assets/img/nm/nm.png" height="14"> <strong>' + button.data('bossname') + '</strong>')
		modal.find('#infobossname').append('<strong>' + button.data('bossname') + '</strong>')
		modal.find('#infoencountername').append(button.data('nmname') + " " + button.data('nmloc'))
		modal.find('#infoencounterdesc').append(button.data('nmdesc'))
		$('#reward_lockbox').html(button.data('nmboxes'))
		$('#reward_crystal').html(button.data('nmcrystals'))
		$('#reward_exp').html(button.data('nmexp'))
		$('#infoaspect').attr("src", '/assets/img/element/' + button.data('aspect') + '.png')
	});
	$('#mapModal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget)
		var modal = $(this)
		modal.find('#mapModalLabel').empty()
		modal.find('#mapModalLabel').append('<strong>' + button.data('bossname') + '</strong>')
		modal.find('#displayMap').attr("src", "/assets/img/maps/" + button.data('encounterid') + ".jpg?v1.0")
	});
});