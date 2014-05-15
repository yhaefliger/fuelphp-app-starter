<?php $theme = Theme::instance(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Theme</title>

    <!-- Bootstrap -->
    <?php echo Asset::css('bootstrap.min.css'); ?>
	<!-- Admin css -->
	<?php echo $theme->asset->css('admin.css'); ?>
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<div class="container">
		<!-- Optional page title -->
		<?php if(isset($title) && $title != ''){ ?>
		  <h1><?php echo $title; ?></h1>
		<?php } ?>
		  
		<!-- Top Navbar -->
		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand <?php echo isset($selected_menu) && $selected_menu == 'dashboard' ? 'active':''; ?>" href="<?php echo Uri::create('admin'); ?>">Project name</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="<?php echo isset($selected_menu) && $selected_menu == 'users' ? 'active':''; ?>">
							<?php echo Html::anchor('admin/users', '<span class="glyphicon glyphicon-user"></span> Users'); ?>
						</li>
					</ul>
					<ul class="nav navbar-right navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<?php echo Auth::get_screen_name(); ?> <b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li>
									<?php echo Html::anchor(Router::get('logout'), 'Logout'); ?>
								</li>
							</ul>
						</li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
		
		<!-- Notifications -->
		<?php echo $theme->view('elements/notifications')->render(); ?>
		
		<!-- Main content (theme partial content) -->
		<?php if(isset($partials['content'])){
			echo $partials['content'];
		} ?>
	</div>
	<!-- jQuery + Bootstrap JS -->
	<?php echo Asset::js(array('jquery-1.11.1.min.js', 'bootstrap.min.js')); ?>
	<!--  Admin required JS -->
	<?php echo $theme->asset->js(array('bootbox.min.js')); ?>
	
	<script type="text/javascript">
		$(document).ready(function() {
			//bootbox.js confirm actions buttons
			//set a custom confirm message with data-message attribute on the link
			$('.btn-confirm').click(function(){
				//retrieve element url for redirect if confirmed
				var url = $(this).attr('href');
				
				//check attribute data-message is present
				if ($(this).is('[data-message]')){
					var message = $(this).attr('data-message');
				//default confirm message
				}else{
					var message = "Are you sure?";
				}
				
				//confirm link
				bootbox.confirm(message, function(result) {
					if(result){
						window.location = url;
					}
				}); 
				
				//default return false
				return false;
			});
		});
	</script>
  </body>
</html>