<?php defined('BASEPATH') OR exit('No direct script access allowed'); // var_dump($user);

	$root = base_url();
	
	if ($root == base_url())
	{
		if ($user['admin'] == 1)
		{
			$admin = true;
			$normal = false;
		}
		else
		{
			$admin = false;
			$normal = true;
		}
?>
	<div class="container md_font">
		<p class="pull-left">Edit user #<?= $user['id'] ?></p>
		<a class="pull-right" href="<?= base_url() ?>admin">Return to User list</a>
	</div>
	<div id='edit_forms' class="container">
		<form action="<?= $root ?>users/save/<?= $user['id'] ?>" method="post" class="inline_display ml_150">
			<fieldset>
				<legend>Edit User</legend>
				<input type="hidden" name="user_id" value="<?= $user['id'] ?>">
				<div class="form-group">
					<label for="email">Email address</label>
					<input type="email" class="form-control" id="email" name="email" 
						value="<?= $user['email'] ?>">
				</div>
				<div class="form-group">
					<label for="first_name">First name</label>
					<input type="first_name" class="form-control" id="first_name" 
						name="first_name" value="<?= $user['first_name'] ?>">
				</div>
				<div class="form-group">
					<label for="last_name">Last name</label>
					<input type="last_name" class="form-control" id="last_name" 
						name="last_name" value="<?= $user['last_name'] ?>">
				</div>
				<div class="form-group">
					<label for="level">User level</label>
					<select id="level" class="form-control" name="level">
						<option value="0" selected="<?= $normal ?>">normal</option>
						<option value="1" selected="<?= $admin ?>">admin</option>
					</select>
				</div>
				<button type="submit" class="btn btn-default pull-right">Save</button>
			</fieldset>
		</form>
		<form action="edit" method="post" class="inline_display ml_150">
			<fieldset>
				<legend>Change Password</legend>
				<input type="hidden" name="edit_action" value="change_password">
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" id="password" class="form-control"
						name="password">
				</div>
				<div class="form-group">
					<label for="confirm_password">Confirm Password</label>
					<input type="password" id="confirm_password" 
						class="form-control" name="confirm_password">
				</div>
				<button type="submit" class="btn btn-default pull-right">Update</button>
			</fieldset>
		</form>
		<form action="edit" method="post" class="inline_display ml_150 width_75">
			<fieldset class="fieldset">
				<legend>Description</legend>
				<input type="hidden" name="edit_action" value="description">
				<textarea id="description" class="form-control" placeholder="Write a description"
					name="description"><?= $user['description'] ?></textarea>
				<button type="submit" class="pull-right">Save</button>
			</fieldset>
		</form>
	</div>
<?php
	}
	else
	{
		$this->session->set_flashdata('not_logged_in', 'You need to sign in');
		redirect('signin');
	}
?>
