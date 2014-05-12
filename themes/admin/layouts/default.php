<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Theme</title>

    <!-- Bootstrap -->
    <?php echo Asset::css('bootstrap.min.css'); ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<?php if(isset($title) && $title != ''){ ?>
	  <h1><?php echo $title; ?></h1>
	<?php } ?>
    
	
	<?php if(isset($partials['content'])){
		echo $partials['content'];
	} ?>
	
	<!-- jQuery + Bootstrap JS -->
	<?php echo Asset::js(array('jquery-1.11.1.min.js', 'bootstrap.min.js')); ?>
  </body>
</html>