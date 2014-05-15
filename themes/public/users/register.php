<?php echo Form::open(); ?>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group <?php echo $val->error_message('username') ? 'has-error':''; ?>">
				<?php echo Form::label('Username *', 'username', array('class' => 'control-label')); ?>
				<?php echo Form::input('username', Input::post('username', isset($user_hash['nickname']) ? $user_hash['nickname']:''), array('class' => 'form-control', 'placeholder' => 'Username')); ?>

				<?php echo $val->error_message('username') ? '<span class="help-block">'.$val->error_message('username').'</span>':''; ?>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group <?php echo $val->error_message('email') ? 'has-error':''; ?>">
				<?php echo Form::label('Email *', 'email', array('class' => 'control-label')); ?>
				<?php echo Form::input('email', Input::post('email', isset($user_hash['email']) ? $user_hash['email']:''), array('class' => 'form-control', 'placeholder' => 'Email')); ?>
				<?php echo $val->error_message('email') ? '<span class="help-block">'.$val->error_message('email').'</span>':''; ?>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="form-group <?php echo $val->error_message('password') ? 'has-error':''; ?>">
				<?php echo Form::label('Password *', 'password', array('class' => 'control-label')); ?>
				<?php echo Form::password('password', '', array('class' => 'form-control', 'placeholder' => 'Password')); ?>
				<?php echo $val->error_message('password') ? '<span class="help-block">'.$val->error_message('password').'</span>':''; ?>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group <?php echo $val->error_message('repeat_password') ? 'has-error':''; ?>">
				<?php echo Form::label('Repeat Password *', 'repeat_password', array('class' => 'control-label')); ?>
				<?php echo Form::password('repeat_password', '', array('class' => 'form-control', 'placeholder' => 'Repeat Password')); ?>
				<?php echo $val->error_message('repeat_password') ? '<span class="help-block">'.$val->error_message('repeat_password').'</span>':''; ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<?php echo Form::label('Firstname', 'firstname', array('class' => 'control-label')); ?>
				<?php echo Form::input('firstname', Input::post('firstname', ''), array('class' => 'form-control', 'placeholder' => 'Firstname')); ?>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<?php echo Form::label('Lastname', 'lastname', array('class' => 'control-label')); ?>
				<?php echo Form::input('lastname', Input::post('lastname', ''), array('class' => 'form-control', 'placeholder' => 'Lasname')); ?>
			</div>
		</div>
	</div>

	<div class="form-group">
		<?php echo Form::submit('action', 'Register', array('class' => 'btn btn-block btn-primary')); ?>
	</div>

	<div class="help-block">
		* required fields
	</div>
<?php echo Form::close(); ?>