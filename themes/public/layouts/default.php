<?php $theme = Theme::instance(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Public Theme</title>

		<!-- Bootstrap -->
		<?php echo Asset::css('bootstrap.min.css'); ?>
		<!-- Site css -->
		<?php echo $theme->asset->css('site.css'); ?>

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<!-- Fixed navbar -->
		<div class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo Uri::create('/'); ?>">Project name</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<!-- TODO YOUR SITE NAVIGATION -->
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="navbar-sep">
							<span class="glyphicon glyphicon-user"></span>
						</li>
						<?php if(Auth::check()){ ?>
						<li>
							<?php echo Html::anchor('profile', 'Profile'); ?>
						</li>
						<li class="navbar-sep">|</li>
						<li>
							<?php echo Html::anchor(Router::get('logout'), 'Logout ('.Auth::get_screen_name().')'); ?>
						</li>
						<?php }else{ ?>
						<li>
							<?php echo Html::anchor(Router::get('login'), 'Login'); ?>
						</li>
						<li class="navbar-sep">|</li>
						<li>
							<?php echo Html::anchor(Router::get('register'), 'Register'); ?>
						</li>
						<?php } ?>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>

		<!-- Begin page content -->
		<div class="container">
			<?php if (isset($title) && $title != '') { ?> 
				<div class="page-header">
					<h1><?php echo $title; ?></h1>
				</div>
			<?php } ?>
			
			<?php echo $theme->view('elements/notifications')->render(); ?>
			
			<?php if (isset($partials['content'])) { ?>
				<?php echo $partials['content']; ?>
			<?php } ?>
		</div>

		<div id="footer">
			<div class="container">
				<p class="text-muted">Place sticky footer content here.</p>
			</div>
		</div>

		<!-- jQuery + Bootstrap JS -->
		<?php echo Asset::js(array('jquery-1.11.1.min.js', 'bootstrap.min.js')); ?>
	</body>
</html>