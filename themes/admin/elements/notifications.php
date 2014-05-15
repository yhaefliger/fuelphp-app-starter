<?php if(Session::get_flash('error')) { ?>
	<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<?php echo Session::get_flash('error'); ?>
	</div>
<?php } ?>
<?php if(Session::get_flash('success')) { ?>
	<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<?php echo Session::get_flash('success'); ?>
	</div>
<?php } ?>
<?php if(Session::get_flash('warning')) { ?>
	<div class="alert alert-warning alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<?php echo Session::get_flash('error'); ?>
	</div>
<?php } ?>
<?php if(Session::get_flash('info')) { ?>
	<div class="alert alert-info alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<?php echo Session::get_flash('info'); ?>
	</div>
<?php } ?>