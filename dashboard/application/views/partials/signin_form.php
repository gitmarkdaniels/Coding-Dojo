<div id="login_form" class="container">
	<?php if ($this->session->flashdata('not_logged_in'))
	{ ?>
		<p class="bg-danger">
			<?= $this->session->flashdata('not_logged_in') ?>
		</p>
	<?php
	} ?>

	<?php if ($this->session->userdata('user')['logged_in'])
	{ ?>
		<p class="bg-success">
			<?= 'You are already logged in' ?>
		</p>
	<?php
	} ?>
	<form action="signin" method="post" class=" ml_350">
		<fieldset>
			<legend>Sign-in
				<span class="sm_font">
					<a href="register">Don't have an account? Register</a>
				</span>
			</legend>
			<div class="form-group">
				<label for="email">Email address</label>
				<input type="email" class="form-control" id="email" name="email">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" id="password" name="password">
			</div>
			<button type="submit" class="btn btn-default pull-right">Sign in</button>
		</fieldset>
	</form>
</div>
