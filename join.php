<?php 
include('./core/functions.php'); 
include('./core/header.php'); 


IF(ISSET($_POST['submit'])){
	$slug = $_POST['slug'] ;
	$_SESSION['currentSLUG'] = $slug;
	redirect('/track/'.$slug);
}
?>
	<div id="wrapper bg-grey-50">	
		<section class="hero height-200 hero-game" style="background-image: url(/assets/img/cover2.jpg);">
			<div class="hero-bg"></div>
			<div class="container">
				<div class="page-header">
					<div class="page-title">Join An Existing Instance</div>
				</div>
			</div>
		</section>
		<section class="bg-grey-50 padding-bottom-60">
			<div class="container">
				
				<div class="headline">
					<h4 class="no-padding-top">Existing Instance <small>Join A Tracker Which Has Been Set Up Previously</small></h4>
				</div>
				<form class="form-label" method="POST">
				<div class="panel panel-default margin-bottom-30">
					<div class="panel-body">
						<div class="form-group row">
							<label for="thread" class="col-md-2">Instance URL</label>
							<div class="col-md-10">
								<div class="input-group">
									<div class="input-group-btn">
										<button type="button" class="btn btn-primary btn-lg btn-icon-right dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">http://ffxiv.net/track/</button>
									</div>
									<input type="text" class="form-control" name="slug" placeholder="instance-id-here" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="thread" class="col-md-12">*Has someone linked an instance in chat that begins with http://ffxiv.net/ ? You can type the instance name, located at the end of the url here to join!</label>
						</div>
					</div>
				</div>
				
				
				<div class="text-center"><input type="submit" class="btn btn-primary btn-lg btn-rounded btn-shadow" name="submit" value="Join Existing Instance"></div>
				</form>
			</div>
		</section>
		<section class="bg-grey-50 padding-bottom-60">
			<div class="container">
				
				<div class="headline">
					<h4 class="no-padding-top">Quick Guide <small>Joining An Instance on Mobile</small></h4>
				</div>
				
				<div class="panel panel-default margin-bottom-30">
					<div class="panel-body">
						<img src="/assets/img/join_guide.png">
					</div>
				</div>
			</div>
		</section>
	</div>
<?php include('./core/footer.php'); ?>