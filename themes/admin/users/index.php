<?php 
$groups = Config::get('simpleauth.groups', array());
$pagination = Pagination::instance('users_pagination');
$select_group = array(
	'' => 'Select Group',
);
foreach($groups as $group_val => $group){
	$select_group[$group_val] = $group['name'];
}
?>
<div class="panel panel-default admin-top-panel">
	<div class="panel-heading clearfix">
		<h3 class="panel-title pull-left" style="margin-top:5px;">Users</h3>
		<div class="pull-right">
			<?php echo Html::anchor('admin/users/create', 'Create User', array('class' => 'btn btn-sm btn-success')); ?>	
		</div>
	</div>
	<div class="panel-body table-filters">
		<?php echo Form::open(array('method' => 'get', 'class' => 'form-inline')); ?>
			<div class="form-group">
				<?php echo Form::input('username', Input::get('username', ''), array('class' => 'input-sm form-control', 'placeholder' => 'Username')); ?>
			</div>
			<div class="form-group">
				<?php echo Form::input('email', Input::get('email', ''), array('class' => 'input-sm form-control', 'placeholder' => 'Email')); ?>
			</div>
			<div class="form-group">
				<?php echo Form::select('group', Input::get('group',''), $select_group, array('class' => 'input-sm form-control')); ?>
			</div>
			<?php echo Form::submit('filter', 'Filter', array('class' => 'btn btn-default btn-sm')); ?>
		<?php echo Form::close(); ?>
		<?php if(empty($users)){ ?>
			<div class="alert alert-warning">No users found</div>
		<?php } ?>
	</div>
	<?php if(!empty($users)){ ?>
		<table class="table table-condensed table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Username</th>
					<th class="hidden-sm hidden-xs">Email</th>
					<th class="hidden-sm hidden-xs">Name</th>
					<th>Group</th>
					<th class="text-right">Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($users as $user){ ?>
				<tr>
					<td><?php echo $user->id; ?></td>
					<td><?php echo $user->username; ?></td>
					<td class="hidden-sm hidden-xs"><?php echo $user->email; ?></td>
					<td class="hidden-sm hidden-xs">
						<?php echo $user->get_full_name(); ?>
					</td>
					<td>
						<?php //chekc label class 
						$class = 'label-default';
						//Moderator and above
						if($user->group >= 50){
							$class = 'label-warning';
						//Users -> Moderator
						}elseif($user->group > 0){
							$class = 'label-success';
						//Banned users
						}elseif($user->group < 0){
							$class = 'label-danger';
						}
						?>
						<span class="label <?php echo $class; ?>">
							<?php echo isset($groups[$user->group]['name']) ? $groups[$user->group]['name']:$user->group; ?>
						</span>
					</td>
					<td class="text-right">
						<div class="btn-group">
							<?php echo Html::anchor('admin/users/view/'.$user->id, '<span class="glyphicon glyphicon-zoom-in">', array('class' => 'btn btn-default btn-xs', 'title' => 'View User')); ?>
							<?php echo Html::anchor('admin/users/edit/'.$user->id, '<span class="glyphicon glyphicon-pencil"></span>', array('class' => 'btn btn-default btn-xs', 'title' => 'Edit User')); ?>
							<?php echo Html::anchor('admin/users/delete/'.$user->id, '<span class="glyphicon glyphicon-trash"></span>', array('class' => 'btn btn-danger btn-xs btn-confirm', 'title' => 'Delete User', 'data-message' => 'Are you sure you want to completely remove user: <strong>'.$user->username.'</strong>')); ?>
						</div>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	<?php } ?>
	<div class="panel-footer">
		<?php echo $pagination->render(); ?>
	</div>
</div>