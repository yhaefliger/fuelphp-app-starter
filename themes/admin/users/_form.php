<?php
$groups = array();
foreach(Config::get('simpleauth.groups') as $group => $group_val){
	$groups[$group] = $group_val['name'];
}
?>
<fieldset>
	<legend>User</legend>
	<div class="form-group">
		<?php echo Form::label('Username', 'username'); ?>
		<?php echo Form::input('username', Input::post('username', isset($user) ? $user->username:''), array('class' => 'form-control')); ?>
	</div>
	<?php if(!isset($user)){ ?>
		<div class="form-group">
			<?php echo Form::label('Password', 'password'); ?>
			<?php echo Form::password('password', '', array('class' => 'form-control')); ?>
		</div>
	<?php }else{ ?>
		<div class="form-group">
			<?php echo Form::label('Change Password', 'new_password'); ?>
			<?php echo Form::password('new_password', '', array('class' => 'form-control')); ?>
		</div>
	<?php } ?>
	<div class="form-group">
		<?php echo Form::label('Email', 'email'); ?>
		<?php echo Form::input('email', Input::post('email', isset($user) ? $user->email:''), array('class' => 'form-control')); ?>
	</div>
	<div class="form-group">
		<?php echo Form::label('Group', 'group'); ?>
		<?php echo Form::select('group', Input::post('group', isset($user) ? $user->group:''), $groups, array('class' => 'form-control')); ?>
	</div>
</fieldset>
<!-- User Profile -->
<fieldset>
	<legend>Profile</legend>
	<div class="row">
		<div class="form-group col-sm-6">
			<?php echo Form::label('Firstname', 'firstname'); ?>
			<?php echo Form::input('firstname', Input::post('firstname', (isset($user->profile) && $user->profile) ? $user->profile->firstname:''), array('class' => 'form-control')); ?>
		</div>
		<div class="form-group col-sm-6">
			<?php echo Form::label('Lastname', 'lastname'); ?>
			<?php echo Form::input('lastname', Input::post('lastname', (isset($user->profile) && $user->profile) ? $user->profile->lastname:''), array('class' => 'form-control')); ?>
		</div>
	</div>
	
</fieldset>