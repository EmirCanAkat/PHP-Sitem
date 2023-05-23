<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?php echo strip_tags($dataSet->title_tag); ?></title>
	<meta name="description" content="<?php echo strip_tags($dataSet->meta_description); ?>">
	<meta name="keywords" content="<?php echo strip_tags($dataSet->meta_keywords); ?>">
	<meta name="author" content="<?php echo strip_tags($dataSet->meta_title); ?>">
	<?php if ($dataSet->enable_maintenance) { ?>
	<!-- Maintenance Mode Enabled -->
	<meta name="robots" content="noindex, nofollow" />
	<?php } ?>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php if ($dataSet->show_logo_favicon) { ?>
	<!-- Favicon -->
	<link rel="shortcut icon" href="admin/uploads/<?php echo strip_tags($dataSet->logo_favicon); ?>" type="image/x-icon">
	<link rel="icon" href="admin/uploads/<?php echo strip_tags($dataSet->logo_favicon); ?>" type="image/x-icon">
	<?php } ?>
	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- Ico Font CSS -->
	<link rel="stylesheet" href="assets/css/icofont.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<?php if ("video-style" == $dataSet->dt_backgrownd_style) { ?>
	<!-- YTPlayer CSS -->
	<link rel="stylesheet" href="assets/css/jquery.mb.YTPlayer.min.css">
	<?php } ?>
	<!-- Style CSS -->
	<link rel="stylesheet" href="assets/css/style.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="assets/css/responsive.css">

</head>

<?php if ("video-style" == $dataSet->dt_backgrownd_style) { ?>
<body id="home_bg" class="bg-img tubular" style="background-image: url('admin/uploads/<?php echo strip_tags($dataSet->dt_default_background_img); ?>');" data-property="{videoURL:'<?php echo strip_tags($dataSet->yt_link); ?>',containment:'#home_bg',autoPlay:<?php echo strip_tags($dataSet->yt_auto_play); ?>, mute:<?php echo strip_tags($dataSet->yt_mute); ?>, startAt:0, showControls:false, loop:<?php echo strip_tags($dataSet->yt_loop); ?>, opacity:1}">
<?php } elseif ("bg-img" == $dataSet->dt_default_background) { ?>
<body class="bg-img" style="background-image: url('admin/uploads/<?php echo strip_tags($dataSet->dt_default_background_img); ?>');">
<?php } else { ?>
<body class="bg-img" style="background-color: <?php echo strip_tags($dataSet->dt_default_background_color); ?>;">
<?php } ?>

	<?php if (("particles-style" == $dataSet->dt_backgrownd_style) || ("particles-style-2" == $dataSet->dt_backgrownd_style)) { ?>
	<!-- For particles styles -->
	<div class="canvas-area">
		<canvas class="constellation"></canvas>
	</div>
	<?php } ?>

	<?php if ("rain-style" == $dataSet->dt_backgrownd_style) { ?>
	<!-- For rainy styles -->
	<div class="rain-area" data-background-image="" id="rainy-parent">
		<img class="w-100" src="admin/uploads/<?php echo strip_tags($dataSet->dt_default_background_img); ?>" id="rainy-image" alt="">
	</div>
	<?php } ?>

	<?php if ("snow-style" == $dataSet->dt_backgrownd_style) { ?>
	<!-- For snow styles -->
	<div class="winter-is-coming">
		<div class="snow snow-near"></div>
		<div class="snow snow-near snow-alt"></div>
		<div class="snow snow-mid"></div>
		<div class="snow snow-mid snow-alt"></div>
		<div class="snow snow-far"></div>
		<div class="snow snow-far snow-alt"></div>
	</div>
	<?php } ?>

	<?php if ("waterpipe-style" == $dataSet->dt_backgrownd_style) { ?>
	<!-- For waterpipe styles -->
	<div id="wavybg-wrapper"> 
	<canvas>Bilgisayarın HTML5'i Desteklemiyor.</canvas>
	</div>
	<?php } ?>

	<!-- Preloader Starts -->
	<div class="preloader-wrap">
		<div class="preloader">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<!--/Preloader Ends -->

	<!-- MAIN CONTENT PART START -->
	<div class="bg-img color-white main-container">
		<input type="hidden" name="home_style" id="home_style" value="<?php echo $dataSet->dt_backgrownd_style; ?>">
		<!-- HEADER PART START-->
		<div id="header">
			<div class="container bg-header-dark">
				<nav class="navbar navbar-expand-lg">
					<a class="navbar-brand" href="#">
						<?php if ($dataSet->show_logo_image) { ?>
						<img src="admin/uploads/<?php echo strip_tags($dataSet->logo_image); ?>" alt="">
						<?php } ?>

						<?php if ($dataSet->enable_text_logo) { ?>
						<h3><?php echo strip_tags($dataSet->text_logo); ?></h3>
						<?php } ?>
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icofont icofont-navigation-menu"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">

						<ul class="nav nav-pills mx-auto" id="pills-tab" role="tablist">
							<li class="nav-item" role="presentation">
								<a class="nav-link nav-menu active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Anasayfa</a>
							</li>

							<?php if ($dataSet->show_aboutpage) { ?>
							<li class="nav-item" role="presentation">
								<a class="nav-link nav-menu" id="pills-about-tab" data-toggle="pill" href="#pills-about" role="tab" aria-controls="pills-about" aria-selected="false">Hakkımızda</a>
							</li>
							<?php } ?>

							<?php if ($dataSet->show_contactpage) { ?>
							<li class="nav-item" role="presentation">
								<a class="nav-link nav-menu" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">İletişim</a>
							</li>
							<li class="nav-item" role="presentation">
								<a class="nav-link nav-menu" href="admin/login.php">Giriş</a>
							</li>
							<?php } ?>
						</ul>

						<?php if ($dataSet->show_callus) { ?>
						<div class="head-contact_us">
							<span class="head-contact-title"><?php echo strip_tags($dataSet->display_text); ?></span>
							<span class="head-contact-no"><a href="tel:<?php echo strip_tags($dataSet->phone_number); ?>"><?php echo strip_tags($dataSet->phone_number); ?></a></span>
						</div>
						<?php } ?>
					</div>
				</nav>
			</div>
		</div>
		<!-- HEADER PART END-->
		
		<div class="tab-content" id="pills-tabContent">
			<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
				<!-- BODY CONTENT PART START -->
				<div id="main-content-home-style2" class="xs-no-positioning fixed fixed-middle">
					<!-- TITLE PART START -->
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
								<div class="title text-left">
									<span class="home2-small-title"><?php echo strip_tags($dataSet->home_subtitle); ?></span>
									<span class="home2-main-title"><?php echo strip_tags($dataSet->home_title); ?></span>
								</div>
							</div>

							<?php if ($dataSet->show_countdown) { ?>
							<!-- COUNTER PART START -->
							<div class="col-md-12">
								<input type="hidden" id="count-end-date" name="count-end-date" value="<?php echo date('d F, Y H:i:s', strtotime($dataSet->end_datetime)); ?>">
								<input type="hidden" id="count-start-date" name="count-start-date" value="<?php echo date('d F, Y H:i:s', strtotime($dataSet->start_datetime)); ?>">

								<h2 class="expired-text hidden"><?php echo strip_tags($dataSet->expired_text); ?></h2>

								<div class="countdown countdown-container">
									<div class="clock">
										<div class="clock-item clock-days countdown-time-value">
											<div class="wrap">
												<div class="inner">
													<div id="canvas-days" class="clock-canvas"></div>

													<div class="text">
														<p class="val">0</p>
														<p class="type-days type-time">GÜN</p>
													</div><!-- /.text -->
												</div><!-- /.inner -->
											</div><!-- /.wrap -->
										</div><!-- /.clock-item -->

										<div class="clock-item clock-hours countdown-time-value">
											<div class="wrap">
												<div class="inner">
													<div id="canvas-hours" class="clock-canvas"></div>

													<div class="text">
														<p class="val">0</p>
														<p class="type-hours type-time">SAAT</p>
													</div><!-- /.text -->
												</div><!-- /.inner -->
											</div><!-- /.wrap -->
										</div><!-- /.clock-item -->

										<div class="clock-item clock-minutes countdown-time-value">
											<div class="wrap">
												<div class="inner">
													<div id="canvas-minutes" class="clock-canvas"></div>

													<div class="text">
														<p class="val">0</p>
														<p class="type-minutes type-time">DAKİKA</p>
													</div><!-- /.text -->
												</div><!-- /.inner -->
											</div><!-- /.wrap -->
										</div><!-- /.clock-item -->

										<div class="clock-item clock-seconds countdown-time-value">
											<div class="wrap">
												<div class="inner">
													<div id="canvas-seconds" class="clock-canvas"></div>

													<div class="text">
														<p class="val">0</p>
														<p class="type-seconds type-time">SANİYE</p>
													</div><!-- /.text -->
												</div><!-- /.inner -->
											</div><!-- /.wrap -->
										</div><!-- /.clock-item -->
										<div class="clear"></div>
									</div><!-- /.clock -->
								</div>
							</div>
							<!-- COUNTER PART END -->
							<?php } ?>

							<?php if ($dataSet->show_subscriber) { ?>
							<div class="col-md-6 mt-5">
								<div class="subscribe-form pb-3">
									<form class="form-inline subs_form" method="post">
										<input type="email" name="email" class="form-control-style2 btn-rounded" placeholder="<?php echo strip_tags($dataSet->subs_placeholder_txt); ?>">
										<button type="submit" class="btn btn-orange btn-round btnSubscribe"><?php echo strip_tags($dataSet->subs_btn_txt); ?></button>
									</form>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
					<!-- TITLE PART END -->

					<?php if ($dataSet->show_socials) { ?>
					
					<?php } ?>
				</div>
				<!-- BODY CONTENT PART END -->
			</div>

			<?php if ($dataSet->show_aboutpage) { ?>
			<div class="tab-pane fade" id="pills-about" role="tabpanel" aria-labelledby="pills-about-tab">
				<!-- BODY CONTENT PART START -->
				<div id="main-content-about" class="xs-no-positioning fixed fixed-middle">
					<!-- TITLE PART START -->
					<div class="container">
						<div class="row">
							<div class="col-sm-12 col-md-12 <?php echo ($dataSet->show_about_images) ? 'col-lg-6 col-xl-6' : 'col-lg-12 col-xl-12'; ?>">
								<div class="title text-left">
									<span class="about-small-title"><?php echo strip_tags($dataSet->about_subtitle); ?></span>
									<span class="about-main-title"><?php echo strip_tags($dataSet->about_title); ?></span>
								</div>

								<div class="content-text">
									<p><?php echo stripslashes($dataSet->about_content); ?></p>

									<?php if ($dataSet->show_about_button_1) { ?>
									<a href="<?php echo strip_tags($dataSet->about_button_1_link); ?>" class="btn btn-orange btn-round mt-4"> <?php echo strip_tags($dataSet->about_button_1_txt); ?></a>
									<?php } ?>

									<?php if ($dataSet->show_about_button_2) { ?>
									<a href="<?php echo strip_tags($dataSet->about_button_2_link); ?>" class="btn btn-orange btn-round mt-4"> <?php echo strip_tags($dataSet->about_button_2_txt); ?></a>
									<?php } ?>
								</div>
							</div>

							<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 <?php echo (!$dataSet->show_about_images) ? 'display-none' : ''; ?>">
								<div class="team-images row justify-content-center">
									<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-right mt-5">
										<img class="images w-100 img-fluid" src="admin/uploads/<?php echo strip_tags($dataSet->about_img_1); ?>" alt="<?php echo strip_tags($dataSet->about_img_1_atl); ?>">
										<img class="images w-100 img-fluid m-0" src="admin/uploads/<?php echo strip_tags($dataSet->about_img_2); ?>" alt="<?php echo strip_tags($dataSet->about_img_2_atl); ?>">
									</div>

									<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-left">
										<img class="images w-100 img-fluid" src="admin/uploads/<?php echo strip_tags($dataSet->about_img_3); ?>" alt="<?php echo strip_tags($dataSet->about_img_3_atl); ?>">
										<img class="images w-100 img-fluid m-0" src="admin/uploads/<?php echo strip_tags($dataSet->about_img_4); ?>" alt="<?php echo strip_tags($dataSet->about_img_4_atl); ?>">
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- TITLE PART END -->

					<?php if ($dataSet->show_socials) { ?>
					
					<?php } ?>
				</div>
				<!-- BODY CONTENT PART END -->
			</div>
			<?php } ?>

			<?php if ($dataSet->show_contactpage) { ?>
			<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
				<!-- BODY CONTENT PART START -->
				<div id="main-content-contact" class="xs-no-positioning fixed fixed-middle">
					<!-- TITLE PART START -->
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="text-center contact-form">
									<div class="title text-left">
										<span class="contact-small-title"><?php echo strip_tags($dataSet->contact_subtitle); ?></span>
										<span class="contact-main-title"><?php echo strip_tags($dataSet->contact_title); ?></span>
									</div>
									<form id="contact-form" action="#" class="clearfix">
										<div class="row">

											<div class="col-md-12 col-lg-12 col-xl-12 form-field">
												<!-- IF MAIL SENT SUCCESSFULLY -->
												<div class="success"></div>
												<!-- IF MAIL SENDING UNSUCCESSFULL
												-->
												<div class="error"></div>
											</div>

											<div class="col-md-12 col-lg-6 col-xl-6 form-field">
												<input type="text" id="name" name="name" class="form-control" placeholder="<?php echo strip_tags($dataSet->fullname_field_txt); ?>">
												<i class="icofont icofont-user"></i>
											</div>

											<div class="col-md-12 col-lg-6 col-xl-6 form-field">
												<input type="text" id="phone" name="phone" class="form-control" placeholder="<?php echo strip_tags($dataSet->phone_field_txt); ?>">
												<i class="icofont icofont-phone"></i>
											</div>

											<div class="col-md-12 col-lg-12 col-xl-12 form-field">
												<input type="email" id="email_address" name="email" class="form-control" placeholder="<?php echo strip_tags($dataSet->email_field_txt); ?>">
												<i class="icofont icofont-envelope"></i>
											</div>

											<div class="col-md-12 col-lg-12 col-xl-12 form-field">
												<textarea id="message" name="message" class="form-control" placeholder="<?php echo strip_tags($dataSet->msg_field_txt); ?>"></textarea>
											</div>

										</div>
										<button type="button" name="loading" id="loading" class="btn btn-orange btn-round display-none">Yükleniyor ...</button>
										<button type="submit" name="submit" id="submit" class="btn btn-orange btn-round"><?php echo strip_tags($dataSet->send_btn_txt); ?></button>
									</form><!-- /end contact-form -->
								</div>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="location-map">
									<?php echo stripslashes($dataSet->map_iframe); ?>
								</div>
							</div>
						</div>
					</div>
					<!-- TITLE PART END -->

					<?php if ($dataSet->show_socials) { ?>
					
					<?php } ?>
				</div>
				<!-- BODY CONTENT PART END -->
			</div>
			<?php } ?>
		</div>
	</div>
	<!-- /MAIN CONTENT PART ENDS -->

	<!-- jQuery -->
	<script src="assets/js/jquery-3.2.1.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- Countdown Timer -->
	<script src="assets/js/kinetic.js"></script>
	<script src="assets/js/jquery.final-countdown.min.js"></script>
	<?php if (("particles-style" == $dataSet->dt_backgrownd_style) || ("particles-style-2" == $dataSet->dt_backgrownd_style)) { ?>
	<!-- stars JS -->
	<script src="assets/js/stars.js"></script>
	<?php } ?>
	<?php if ("rain-style" == $dataSet->dt_backgrownd_style) { ?>
	<!-- rainyday JS -->
	<script src="assets/js/rainyday.min.js"></script>
	<?php } ?>
	<?php if ("video-style" == $dataSet->dt_backgrownd_style) { ?>
	<!-- YTPlayer JS -->
	<script src="assets/js/jquery.mb.YTPlayer.min.js"></script>
	<?php } ?>
	<?php if ("waterpipe-style" == $dataSet->dt_backgrownd_style) { ?>
	<!-- waterpipe JS -->
	<script src="assets/js/waterpipe.js"></script>
	<?php } ?>
	<!-- scripts -->
	<script src="assets/js/scripts.js"></script>
	<!-- custom.js -->
	<script src="assets/js/custom.js"></script>

	<?php if ($dataSet->use_ga) { ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo strip_tags($dataSet->tracking_code); ?>"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', '<?php echo strip_tags($dataSet->tracking_code); ?>');
	</script>
	<?php } ?>
</body>
</html>
