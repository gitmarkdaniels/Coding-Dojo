<div class="container md_font">
	<p class="pull-left">Edit user #<?= '1' //user['id']" ?></p>
	<a class="pull-right" href="/dashboard/admin">Return to User list</a>
</div>
<div id='edit_forms' class="container">
	<form action="edit" method="post" class="inline_display ml_150">
		<fieldset>
			<legend>Edit User</legend>
		<div class="form-group">
			<label for="email">Email address</label>
			<input type="email" class="form-control" id="email" name="email" value="<?= 'email' //user['email']" ?>">
		</div>
		<div class="form-group">
			<label for="first_name">First name</label>
			<input type="first_name" class="form-control" id="first_name" name="first_name" value="<?= 'first_name' //user['first_name']" ?>">
		</div>
		<div class="form-group">
			<label for="last_name">Last name</label>
			<input type="last_name" class="form-control" id="last_name" name="last_name" value="<?= 'last_name' //user['last_name']" ?>">
		</div>
		<div class="form-group">
			<label for="level">User level</label>
			<select id="level" class="form-control" name="level">
				<option value="normal">normal</option>
				<option value="admin">admin</option>
			</select>
		</div>
		<button type="submit" class="btn btn-default pull-right">Save</button>
		</fieldset>
	</form>
	<form action="edit" method="post" class="inline_display ml_150">
		<fieldset>
			<legend>Change Password</legend>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" id="password" name="password" value="<?= 'password' //user['password']" ?>">
		</div>
		<div class="form-group">
			<label for="confirm_password">Confirm Password</label>
			<input type="password" class="form-control" id="confirm_password" name="confirm_password" value="<?= 'confirm_password' //user['confirm_password']" ?>">
		</div>
		<button type="submit" class="btn btn-default pull-right">Update</button>
		</fieldset>
	</form>
</div>

