<div class="container md_font">
	<p class="pull-left">Add a new User</p>
	<a class="pull-right" href="/dashboard/admin">Return to dashboard admin</a>
</div>
<div id="add_new_form" class="container">
	<form action="new" method="post" class=" ml_350">
		<fieldset>
			<div class="form-group">
				<label for="email">Email address</label>
				<input type="email" class="form-control" id="email" name="email">
			</div>
			<div class="form-group">
				<label for="first_name">First name</label>
				<input type="first_name" class="form-control" id="first_name" name="first_name">
			</div>
			<div class="form-group">
				<label for="last_name">Last name</label>
				<input type="last_name" class="form-control" id="last_name" name="last_name">
			</div>
			<div class="form-group">
				<label for="pwd">Password</label>
				<input type="password" class="form-control" id="pwd" name="password">
			</div>
			<div class="form-group">
				<label for="confirm_password">Confirm Password</label>
				<input type="confirm_password" class="form-control" id="confirm_password" name="confirm_password">
			</div>
			<button type="submit" class="btn btn-default pull-right">Create</button>
		</fieldset>
	</form>
</div>

