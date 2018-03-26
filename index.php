<?php include('./core/functions.php');
include('./core/header.php'); ?>
	<div id="wrapper">	
		<section class="hero height-350 hero-game" style="background-image: url(/assets/img/cover.jpg);">
			<div class="hero-bg"></div>
			<div class="container">
				<div class="page-header">
					<div class="page-title">Eureka Tracker</div>
					<a href="/join.php" class="btn btn-success text-initial" data-toggle="lightbox" data-width="1280">Join Existing Instance</a>
					<a href="/new.php" class="btn btn-primary text-initial" data-toggle="lightbox" data-width="1280">Create New Instance</a>
				</div>
			</div>
		</section>
		<section class="border-bottom-1 border-grey-300 padding-top-10 padding-bottom-10">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<ol class="breadcrumb">
							<li><a href="/">Home</a></li>
							<li class="active">Change Log</li>
						</ol>	
					</div>
				</div>
			</div>
		</section>
		<section class="bg-grey-50 border-bottom-1 border-grey-200 relative">
			<div class="container">
				
				<div class="row">
					<div class="col-lg-9">
						<div class="comments no-margin">
							<div class="media">
								<div class="media-body">
									<div class="media-content">
										<a href="#" class="media-heading">Weather Tracking!</a>
										<span class="date">March 23, 2018 at 03:18</span>
										<p>Added Weather!</p>
										<ol>
											<li>You can now see the current weather, and the upcoming 6 weathers!</li>
											<li>The weather bar will gradually update and move itself over, indicating the current and upcoming weather cycle!</li>
											<li>Various UI changes! Fading out on tabular view for instances which are on cooldown!</li>
											<li>Split Share Button in two!</li>
											<li>Added Gale Tracker! Will specify time until next gale in REAL WORLD MINUTES.</li>
										</ol>
										<p>TODO</p>
										<ol>
											<li>Filtering</li>
										</ol>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-9">
						<div class="comments no-margin">
							<div class="media">
								<div class="media-body">
									<div class="media-content">
										<a href="#" class="media-heading">Secondary UI/UX Changes</a>
										<span class="date">March 21, 2018 at 22:34</span>
										<p>Added Tabular View!</p>
										<ol>
											<li>Default view on loading page is now tabular, for easier tracking!</li>
											<li>Toggle between views by pressing the [<i class="fa fa-eye no-margin"></i>] button. If you prefer card view, it still exists!</li>
										</ol>
										<p>TODO</p>
										<ol>
											<li>Filtering</li>
										</ol>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-9">
						<div class="comments no-margin">
							<div class="media">
								<div class="media-body">
									<div class="media-content">
										<a href="#" class="media-heading">Preliminary UI/UX Changes</a>
										<span class="date">March 21, 2018 at 16:19</span>
										<p>Various Graphical Improvements</p>
										<ol>
											<li>Separated Report, and General Info/Rewards. <small>Thanks /u/supamiu</small></li>
											<li>Added Graphical Maps</li>
											<li>Added Last Joined Instance to the Join dropdown menu.</li>
											<li>20:29 : Modified share button! You can now generate a list of all NMs on cooldown, unconfirmed NMs, or just the link!</li>
										</ol>
										<p>TODO</p>
										<ol>
											<li>Collapsible View</small></li>
											<li>Filtering</li>
										</ol>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-9">
						<div class="comments no-margin">
							<div class="media">
								<div class="media-body">
									<div class="media-content">
										<a href="#" class="media-heading">Preliminary Release</a>
										<span class="date">March 20, 2018 at 17:00</span>
										<p>A beta version has been released. It includes the following features...</p>
										<ol>
											<li>Creating New Instances</li>
											<li>Naming URL of Instance</li>
											<li>Shareable Report, organized by time.</li>
											<li>Report Deaths of NMs</li>
											<li>Viewing (Past 5) Reports on Any NM</li>
											<li>Enabling/Disabling Any Report (in situations of error/malice)</li>
											<li>Fate Name, Location, and Description of Most NMs</li>
											<li>Standard Rewards for Most NMs</li>
											<li>*Added ability to specify a time shift for when a mob died. IE; DIED 30 MINS AGO</li>
											<li>*Added passwords to instances which are not public.</li>
										</ol>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
<?php include('./core/footer.php'); ?>