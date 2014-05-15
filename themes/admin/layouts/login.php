<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   

    <title>Login</title>

    <!-- Bootstrap core CSS -->
     <?php echo Asset::css('bootstrap.min.css'); ?>
	<!-- Inline bootstrap login CSS -->
	<style>
		body {
			padding-top: 40px;
			padding-bottom: 40px;
			background-color: #eee;
		}
		h2{
			color: #A2A2A2;
			font-size: 20px;
		}
		.form-signin {
			max-width: 330px;
			padding: 15px;
			margin: 0 auto;
		}
		.form-signin .form-signin-heading,
		.form-signin .checkbox {
			margin-bottom: 10px;
		}
		.form-signin .checkbox {
			font-weight: normal;
		}
		.form-signin .form-control {
			position: relative;
			height: auto;
			-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
					box-sizing: border-box;
			padding: 10px;
			font-size: 16px;
		}
		.form-signin .form-control:focus {
			z-index: 2;
		}
		.form-signin input[type="email"] {
			margin-bottom: -1px;
			border-bottom-right-radius: 0;
			border-bottom-left-radius: 0;
		}
		.form-signin input[type="password"] {
			margin-bottom: 10px;
			border-top-left-radius: 0;
			border-top-right-radius: 0;
		}
	</style>

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <?php echo Form::open(array('role' => 'form', 'class' => 'form-signin')); ?>
        <h2 class="form-signin-heading">Please sign in</h2>
        
		<?php if(Session::get_flash('login_error')) { ?>
			<div class="alert alert-danger"><?php echo Session::get_flash('login_error'); ?></div>
		<?php } ?>
		
		<?php echo Form::input('username', Input::post('username', ''), array('class' => 'form-control', 'placeholder' => 'Username', 'required' => '', 'autofocus' => '')); ?>
		<?php echo Form::password('password', '', array('class' => 'form-control', 'placeholder' => 'Password', 'required' => '')); ?>
       
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <?php echo Form::close(); ?>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
