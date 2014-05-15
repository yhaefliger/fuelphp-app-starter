<?php $theme = \Theme::instance(); ?>
<?php echo Form::open(); ?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Edit User - <strong><?php echo $user->username; ?></strong></h3>
	</div>
	<div class="panel-body">
		<?php echo $theme->view('users/_form')->set('user', $user)->render(); ?>
	</div>
	<div class="panel-footer">
		<?php echo Html::anchor('admin/users', 'Cancel', array('class' => 'btn btn-default')); ?>
		<?php echo Form::submit('action', 'Save', array('class' => 'btn btn-primary')); ?>
	</div>
</div>
<?php echo Form::close(); ?>