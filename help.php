<?php include('./core/functions.php');
include('./core/header.php'); ?>
	<!-- wrapper --> 
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
		<section class="border-bottom-1 border-grey-300 padding-top-30 padding-bottom-10">
			<div class="container">
				<div class="row sidebar">
					<div class="col-md-12">
						<div class="post post-single">
							<div class="post-header">
								<div class="post-title">
									<h2>Help &amp; FAQ</h2>
									<ul class="post-meta">
										<li><i class="fa fa-calendar-o"></i> Last Updated March 23, 2018</li>
									</ul>
								</div>
							</div>

							<p>This page will go over various aspects of this website, the purpose of various functions, as well as proper usage.</p>
							
							<div class="panel-group" id="accordion">
								<div class="panel panel-default">
									<div class="panel-heading" id="headingOne">
										<h4 class="panel-title">
											<a href="#collapseOne" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" class="collapsed">
												1. Creating A New Instance
											</a>
										</h4>
									</div>
									<div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
										<div class="panel-body">
											<p>You probably want to create a new instance when the following conditions are met: 
												<ol>
													<li>When you join a new instance, and</li>
													<li>A tracker has not yet been set up for that instance.</li>
												</ol>
											</p>
											<p>To create a new instance,
												<ul>
													<li>Browse to the new instance creation page<p><img src="https://puu.sh/zOaWY/ba0e26892a.png"></p></li>
													<li>Either let the auto-fill specify a name and url slug for you, or pick one yourself</li>
													<li>Uncheck the checkbox if you wish to share the tracker, but require a password in order to edit.<p><img src="https://puu.sh/zOb5p/17b4349fbe.png"></p></li>
													<li>Press Create New Instance<p><img src="https://puu.sh/zOb73/cdd571f9cf.png"></p></li>
												</ul>
												And you're done! You should be redirected, and your new instance has been created!
											</p>
										</div>
									</div>
								</div>
							  <div class="panel panel-default">
								<div class="panel-heading" id="headingTwo">
								  <h4 class="panel-title">
									<a href="#collapseTwo" class="collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false">
										2. Sharing Your Instance
									</a>
								  </h4>
								</div>
								<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-expanded="false" style="height: 0px;">
									<div class="panel-body">
										<p>
											Eventually, you will want to share your instance with your group!</br>Luckily, sharing your instance is very simple!</br>
											<ul>
												<li>To share only the URL, press the URL share button.</br><img src="https://puu.sh/zObeF/a57836827e.png"><img src="https://puu.sh/zObBL/a6cf09e8ba.png"></li>
												<li>To share the URL and data, press the quote share button.</br><img src="https://puu.sh/zObfI/a4d199371a.png"><img src="https://puu.sh/zObDJ/571996a014.png"></li>
											</ul>
											With this link, your friends and fellow NM train passengers will be able to flag things as complete.
										</p>
									</div>
								</div>
							  </div>
							  <div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingThree">
								  <h4 class="panel-title">
									<a href="#collapseThree" class="collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false">
										3. Private Instances
									</a>
								  </h4>
								</div>
								<div id="collapseThree" class="panel-collapse collapse" aria-expanded="false">
									<div class="panel-body">
										<ul>
											<li>If you have decided that you don&apos;t want just anyone modifying your instance, you can choose to password protect it upon creating it.<p><img src="https://puu.sh/zObI9/124f5c79cb.png"></p></li>
											<li>Making your instance private will make it so that only players you supply a password with can modify the instance. It is otherwise read-only to all other users.</li>
										</ul>
										But where is the password to my instance?
										<ul>
											<li>Upon <strong>creating</strong> your instance, your session password is set to the password of the instance. This password cannot change, and is used to gain access to modification.</li>
											<li><img src="https://puu.sh/zObMA/6915d57075.png"></li>
											<li><img src="https://puu.sh/zObNr/f1a7fb9a31.png"></li>
										</ul>
										You can share this password with other users, and they can enter it at the settings page. Upon doing so, they will gain access to edit the instance.</br>*The password to an instance cannot be changed. If you create an instance, and change the "current password," it is assumed that you are trying to access <i>another</i> instance.
									</div>
								</div>
							  </div>
							  <div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingFour">
								  <h4 class="panel-title">
									<a href="#collapseFour" class="collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false">
										4. Toggling Between Views
									</a>
								  </h4>
								</div>
								<div id="collapseFour" class="panel-collapse collapse" aria-expanded="false">
									<div class="panel-body">
										<ul>
											<li>Our site currently supports two data-views. Card view, and Tabular view. By default you will always see tabular view. Card view is recommended for mobile devices.<br/>In order to change your view, press the eye-ball icon.<p><img src="https://puu.sh/zObUe/279c70e8d2.png"></p></li>
										</ul>
										You can change views at any time. Both have the same functions and capabilities.
									</div>
								</div>
							  </div>
							  <div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingFive">
								  <h4 class="panel-title">
									<a href="#collapseFive" class="collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false">
										5. Functions
									</a>
								  </h4>
								</div>
								<div id="collapseFive" class="panel-collapse collapse" aria-expanded="false">
									<div class="panel-body">
										<img src="https://puu.sh/zObXL/0c558496fd.png">
										<ul>
											<li>Opens up a map with the approximate location of the NM.</li>
										</ul>
										<img src="https://puu.sh/zObZf/549aae00ec.png">
										<ul>
											<li>Opens the report page where you can report a kill, with or without custom time.</li>
											<li>*SHORTCUT : Or, you can click the bosses name/aspect icon to report as "just killed".</li>
											<li><img src="https://puu.sh/zOc2a/6542b8e46c.png"></li>
										</ul>
										<img src="https://puu.sh/zOc5E/a5ca57b378.png">
										<ul>
											<li>Opens the details page, where you can view things such as encounter name, description, experience, and basic rewards.</li>
										</ul>
										<img src="https://puu.sh/zOchm/9b24611f69.png">
										<ul>
											<li>Pressing the pencil icon will toggle an entry on/off. Use this when you make a mistake, and wish to disable an entry. Or vice versa. When you accidentally disable an entry, use this to re-enable it!</li>
											<li>An entry which has been disabled will be excluded in the calculation for the time remaining until the window opens.</li>
										</ul>
										
									</div>
								</div>
							  </div>
							  <div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingSix">
								  <h4 class="panel-title">
									<a href="#collapseSix" class="collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false">
										6. Visual Elements
									</a>
								  </h4>
								</div>
								<div id="collapseSix" class="panel-collapse collapse" aria-expanded="false">
									<div class="panel-body">
										<img src="https://puu.sh/zOc96/814fe158f7.png">
										<ul>
											<li>Indicates time until next Gales weather.</li>
										</ul>
										<img src="https://puu.sh/zOcax/ddf2f51e92.png">
										<ul>
											<li>Visual representation of time until NM window is open. NM window is ready when the bar becomes empty.</li>
										</ul>
										<img src="https://puu.sh/zOcbs/edf9f84071.png">
										<ul>
											<li>Numeric representation of time until NM window is open. Unconfirmed means the instance has not reported a kill yet.</li>
										</ul>
										<img src="https://puu.sh/zOcmW/4045436b3d.png">
										<ul>
											<li>Visually represents the weather forecast in Eureka. This is the same across all instances. The current weather is on the left-most panel, and the other weathers will gradually slide over the left as they become closer. Hovering over a weather block shows either time left, or time until that weather begins.</li>
										</ul>
										
									</div>
								</div>
							  </div>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</section>
	</div>
	<!-- /#wrapper -->
<?php include('./core/footer.php'); ?>