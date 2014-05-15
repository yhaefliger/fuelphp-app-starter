<div class="row">
	<div class="col-md-6">
		<?php echo Form::open(array('role' => 'form', 'class' => 'form-horizontal')); ?>
			<div class="form-group">
				<?php echo Form::label('Username', 'username', array('class' => 'control-label col-sm-2')); ?>
				<div class="col-sm-10">
					<?php echo Form::input('username', Input::post('username', ''), array('class' => 'form-control', 'placeholder' => 'Username')); ?>
				</div>
			</div>
			<div class="form-group">
				<?php echo Form::label('Password', 'password', array('class' => 'control-label col-sm-2')); ?>
				<div class="col-sm-10">
					<?php echo Form::password('password', '', array('class' => 'form-control', 'placeholder' => 'Password')); ?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<?php echo Form::submit('login', 'Login', array('class' => 'btn btn-primary btn-block')); ?>
				</div>
			</div>
		<?php echo Form::close(); ?>
	</div>
	<div class="col-md-6 text-right">
		<p>
			Don't have an account ? <br />
			Our site is awesome....
		</p>
		<div class="register-btn">
			<?php echo Html::anchor(Router::get('register'), 'Register for free!', array('class' => 'btn btn-default')); ?>
		</div>
	</div>
</div>