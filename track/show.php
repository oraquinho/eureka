<?php 
include('../core/functions.php'); 
include('../core/header.php'); 

$slug = $_GET['slug'];
$instanceData = getInstance($slug);
$reports = getReports($instanceData['instanceID']);
$encounters = getEncounters(1, 20);
$_SESSION['currentSLUG'] = $slug;
$_SESSION['currentNAME'] = $instanceData['instanceName'];
?>
	<div id="wrapper" class="bg-grey-50">	
		<section class="bg-grey-50 padding-top-20">
			<div class="container">
<?php IF(!ISSET($_SESSION['update03232023_sort'])): ?>
				<div class="alert alert-danger alert-lg fade in">
					<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
					<h4 class="alert-title">We've Changed!</h4>
					<p>We look the same, but have undergone a lot of serious back-end changes! If you notice anything not functioning properly, please contact us at <strong>admin@revelsbegin.com</strong>, or message /u/LiliumSpirit on reddit. E-mail is located at footer for future reference.</p>
					<p>A lot of the system has been cleaned up, and recoded. At the moment, no bugs have been identified, other than an occassional HTTP://503 ERROR from the server, which causes your application to potentially not send data. If this happens, perhaps refresh the page until a solution is achieved.</p>
					<p>Thank you for your support!</p>
				</div>
<?php $_SESSION['update03232023_sort'] = TRUE; ENDIF ?>
				<div class="row">
					<div class="col-md-12 padding-right-20">
						<div class="row">
							<div class="col-lg-12">
								<div class="headline">
									<h4><?= $instanceData['instanceName'] ?> 
									</h4>
									<div class="btn-group pull-right">
										<a href="#"	role="button" class="btn btn-default" id="toggleCSS" data-toggle="tooltip" data-placement="bottom" data-original-title="Toggle between Day and Night Mode">
											<i class="fa fa-lightbulb-o" aria-hidden="true"></i>
										</a>
										
										<a href="#" role="button" class="btn btn-default" id="shareStates" data-toggle="tooltip" data-placement="bottom" data-original-title="Share Encounters on Cooldown" data-slug="<?= $slug ?>">
											<i class="fa fa-quote-left no-margin"></i>
										</a>
										
										<a href="#" role="button" class="btn btn-default" id="shareStatesLO" data-toggle="tooltip" data-placement="bottom" data-original-title="Share only the link to this instance!" data-slug="<?= $slug ?>">
											<i class="fa fa-share no-margin" ></i>
										</a>
										
										<a href="#" role="button" class="btn btn-default" id="passwordStates" data-toggle="modal" data-target="#passwordModal" data-original-title="Enter or Retrieve Password">
											<i class="fa fa-cogs no-margin"></i>
										</a>
										
										<a href="#" role="button" class="btn btn-default" id="toggleView" data-toggle="tooltip" data-placement="bottom" data-original-title="Toggle between card and table view.">
											<i class="fa fa-eye no-margin"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="row" id="display_cards">
<?php foreach($encounters as $encounter): ?>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 margin-bottom-20">
								<div class="widget widget-game" style="background-image: url(/assets/img/nm/<?= $encounter['simpleName'] ?>/card.jpg);">
									<div id="nm_<?= $encounter['encounterID'] ?>_alpha" class="overlay">
										<div class="title" style="font-size: 20px;">
											<span class="rapidRecord" role="button" data-toggle="tooltip" data-placement="bottom" data-original-title="Click here to quickly record a kill that just happened!" data-encounterid="<?= $encounter['encounterID'] ?>"><img src="/assets/img/element/<?= $encounter['aspect'] ?>.png" style="width:24px;" alt=""> <?= $encounter['bossName'] ?></span>
										</div>
										<p class="progress-label">Lv.<?= $encounter['nm_level'] ?> <span><i class="fa fa-clock-o margin-right-10"></i> <span id="nm_<?= $encounter['encounterID'] ?>_status"><?= $status ?></span></span></p>
										<div class="progress progress-animation progress-xs">
											<div id="nm_<?= $encounter['encounterID'] ?>_progress" class="progress-bar progress-bar-success progress-bar-<?= $encounter['aspect'] ?>" aria-valuenow="<?= $ratio ?>" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
										</div>
										<div class="description">
											<div class="row">
												<div class="col-sm-4 col-xs-4">
													<a href="#" class="btn btn-block btn-outline margin-top-40 aspect-<?= $encounter['aspect'] ?>" data-toggle="modal" data-target="#mapModal" data-bossname="<?= $encounter['bossName'] ?>" data-encounterid="<?= $encounter['encounterID'] ?>">
														<i class="fa fa-map"></i>
													</a>
												</div>
												<div class="col-sm-4 col-xs-4">
													<a href="#" id="nm_<?= $encounter['encounterID'] ?>_btn" class="btn btn-block btn-outline margin-top-40 aspect-<?= $encounter['aspect'] ?>" data-toggle="modal" data-target="#reportModal" data-encounterid="<?= $encounter['encounterID'] ?>" data-bossname="<?= $encounter['bossName'] ?>" data-nmname="<?= $encounter['nm_name'] ?>" data-nmdesc="<?= $encounter['nm_desc'] ?>" data-nmloc="<?= $encounter['nm_location'] ?>" data-nmexp="<?= $encounter['nm_exp'] ?>" data-nmboxes="<?= $encounter['nm_boxes'] ?>" data-nmcrystals="<?= $encounter['nm_crystals'] ?>" data-aspect="<?= $encounter['aspect'] ?>" data-simplename="<?= $encounter['simpleName'] ?>" data-reports="">
														<i class="fa fa-bullhorn"></i>
													</a>
												</div>
												<div class="col-sm-4 col-xs-4">
													<a href="#" class="btn btn-block btn-outline margin-top-40 aspect-<?= $encounter['aspect'] ?>" data-toggle="modal" data-target="#infoModal" data-bossname="<?= $encounter['bossName'] ?>" data-nmname="<?= $encounter['nm_name'] ?>" data-nmdesc="<?= $encounter['nm_desc'] ?>" data-nmloc="<?= $encounter['nm_location'] ?>" data-nmexp="<?= $encounter['nm_exp'] ?>" data-nmboxes="<?= $encounter['nm_boxes'] ?>" data-nmcrystals="<?= $encounter['nm_crystals'] ?>" data-aspect="<?= $encounter['aspect'] ?>" data-simplename="<?= $encounter['simpleName'] ?>">
														<i class="fa fa fa-info-circle"></i>
													</a>
												</div>
											</div> 
										</div>
									</div>
								</div>
							</div>
<?php endforeach ?>
						</div>
						<div class="row" id="display_tabular">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="panel panel-default">
									<div class="panel-body">
										<table class="table table-hover tableSM" id="tableOutput">
											<thead>
												<tr>
													<th><i class="fa fa-sort no-margin"></i> Lv</th>
													<th><i class="fa fa-sort no-margin"></i> Respawn</th>
													<th></th>
													<th id="tblSortBoss"><i class="fa fa-sort no-margin"></i> Boss</th>
													<th class="hidden-xs"><i class="fa fa-sort no-margin"></i> Encounter</th>
													<th>Actions</th>
												</tr>
											</thead>
											<tbody>
<?php FOREACH($encounters AS $encounter): ?>
												<tr id="nmT_<?= $encounter['encounterID'] ?>_row">
													<td><?= $encounter['nm_level'] ?></td>
													<td>
														<span id="nmT_<?= $encounter['encounterID'] ?>_progressX" style="display:none;"></span>
														<div class="progress progress-animation progress-xs progress-bar-striped" style="margin-bottom: 0; background-color: rgba(204,204,204,0.6) !important; border: 1px solid rgba(0,0,0,0.2); height:8px !important; width: 80% !important;">
															<div id="nmT_<?= $encounter['encounterID'] ?>_progress" class="progress-bar progress-bar-success progress-bar-<?= $encounter['aspect'] ?> progress-bar-striped" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
														</div>
													</td>
													<td>
														<i class="fa fa-clock-o"></i> <span id="nmT_<?= $encounter['encounterID'] ?>_status">?</span>
													</td>
													<td>
														<span class="rapidRecord" role="button" data-toggle="tooltip" data-placement="bottom" data-original-title="Click here to quickly record a kill that just happened!" data-encounterid="<?= $encounter['encounterID'] ?>">
															<img src="/assets/img/element/<?= $encounter['aspect'] ?>.png" style="width:18px;" alt=""> <?= $encounter['bossName'] ?>
														</span>
													</td>
													<td class="hidden-xs">
														<?= $encounter['nm_name'] ?> <?= $encounter['location'] ?>
													</td>
													<td>
														<button class="btn btn-primary btn-outline btn-sm" data-toggle="modal" data-target="#mapModal" data-bossname="<?= $encounter['bossName'] ?>" data-encounterid="<?= $encounter['encounterID'] ?>"><i class="fa fa-map"></i></button>
														<button class="btn btn-danger btn-outline btn-sm" id="nmT_<?= $encounter['encounterID']?>_btn" data-toggle="modal" data-toggle="modal" data-target="#reportModal" data-encounterid="<?= $encounter['encounterID'] ?>" data-bossname="<?= $encounter['bossName'] ?>" data-nmname="<?= $encounter['nm_name'] ?>" data-nmdesc="<?= $encounter['nm_desc'] ?>" data-nmloc="<?= $encounter['nm_location'] ?>" data-nmexp="<?= $encounter['nm_exp'] ?>" data-nmboxes="<?= $encounter['nm_boxes'] ?>" data-nmcrystals="<?= $encounter['nm_crystals'] ?>" data-aspect="<?= $encounter['aspect'] ?>" data-simplename="<?= $encounter['simpleName'] ?>" data-reports=""><i class="fa fa-bullhorn"></i></button>
														<button class="btn btn-success btn-outline btn-sm" data-toggle="modal" data-toggle="modal" data-target="#infoModal" data-encounterid="<?= $encounter['encounterID'] ?>" data-bossname="<?= $encounter['bossName'] ?>" data-nmname="<?=  $encounter['nm_name'] ?>" data-nmdesc="<?=  $encounter['nm_desc'] ?>" data-nmloc="<?=  $encounter['nm_location'] ?>" data-nmexp="<?=  $encounter['nm_exp'] ?>" data-nmboxes="<?=  $encounter['nm_boxes'] ?>" data-nmcrystals="<?=  $encounter['nm_crystals'] ?>" data-aspect="<?=  $encounter['aspect'] ?>" data-simplename="<?=  $encounter['simpleName'] ?>" data-reports=""><i class="fa fa fa-info-circle"></i></button>
													</td>
												</tr>
<?php ENDFOREACH ?>
											</tbody>
										</table>	
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<input type="text" value="" id="hdn" readonly style="margin:0; border: 0; outline: 0;  width: 1px;">
		</section>
		<div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="reportModal">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="reportModalLabel"></h4>
			  </div>
			  <div class="modal-body padding-top-5">
				<div id="warningArea">
					
				</div>
				<input type="hidden" id="frm_encounterid" value="">
				<input type="hidden" id="frm_instanceid" value="">
				<table class="table">
					<thead>
						<tr>
							<th>Reported Time</th>
						</tr>
					</thead>
					<tbody id="reportLogs">
					</tbody>
				</table>
			  </div>
			  <div class="modal-footer">
				<div class="input-group">
					<input type="text" class="form-control" id="frm_minutesSince" placeholder="Appx. Minutes Since Kill">
					<div class="input-group-btn">
						<button type="button" id="reportKill" class="btn btn-danger btn-lg btn-icon-right dropdown-toggle">Report Kill</button>
					</div>
				</div>
			  </div>
			</div>
		  </div>
		</div>
		<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModal">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="infoModalLabel"></h4>
			  </div>
			  <div class="modal-body">
				<div id="warningArea">
					
				</div>
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tab1" data-toggle="tab" aria-expanded="true">General Info</a></li>
					<li class=""><a href="#tab2" data-toggle="tab" aria-expanded="false">Rewards</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade active in" id="tab1">
						<div class="media">
							<a class="media-left" href="#">
								<img src="#" alt="" id="infoaspect">
							</a>
							<div class="media-body">
								<div class="media-content">
									<a href="#" class="media-heading" id="infobossname"></a>
									<span class="date" id="infoencountername"></span>
									<p id="infoencounterdesc"></p>
								</div>
							</div>
						</div>
					</div>				
					<div class="tab-pane fade" id="tab2">
						<table class="table" id="rewardTable">
							<thead>
								<tr>
									<th>Reward</th>
									<th>Amount</th>
								</tr>
							</thead>
							<tbody>
								<tr id="row_box">
									<td><img src="/assets/img/nm/rewards/lockbox.png"></td>
									<td id="reward_lockbox"></td>                          
								</tr>
								<tr id="row_crystal1">
									<td><img src="/assets/img/nm/rewards/crystal1.png"></td>
									<td id="reward_crystal"></td>  
								</tr>
								<tr id="row_exp">
									<td><img src="/assets/img/nm/rewards/exp.png"></td>
									<td id="reward_exp"></td>  
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			  </div>
			</div>
		  </div>
		</div>
		<div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-labelledby="mapModal">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="mapModalLabel"></h4>
			  </div>
			  <div class="modal-body">
				<img src="" id="displayMap" style="width:100%">
			  </div>
			</div>
		  </div>
		</div>
		<div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModal">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="passwordModalLabel">Update Password</h4>
			  </div>
			  <div class="modal-body">
				<div id="PwarningArea">
				</div>
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tab1" data-toggle="tab" aria-expanded="true">Current Password</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade active in" id="tab1">
						<div class="input-group">
							<input type="text" class="form-control" id="frm_password" placeholder="Password" value="<?= $_SESSION['password'] ?>">
							<div class="input-group-btn">
								<button type="button" id="passwordUpdate" class="btn btn-success btn-lg btn-icon-right dropdown-toggle">Update Password</button>
							</div>
						</div>
						<div class="input-group">
							<br/>*Caution. The password to instances which have been created cannot be changed. When you create a new instance, your password is set to that instance's password. Share the password above to pass the password to other users to allow editing when not public. If you join another instance which is password locked, you will need to supply the password <i>for that instance</i> here in order to make changes.<br/>
						</div>
					</div>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	</div>
	<script>var thisInstanceID = "<?= $instanceData['instanceID'] ?>";	var thisSlug = "<?= $slug ?>";</script>
	<script src="/__TEST__OOP/assets/js/export.js"></script>
	<script src="/__TEST__OOP/assets/js/settings.js"></script>
	<script src="/__TEST__OOP/assets/js/modals.js"></script>
	<script src="/__TEST__OOP/assets/js/sync.js"></script>
<?php include('../core/footer.php'); ?>