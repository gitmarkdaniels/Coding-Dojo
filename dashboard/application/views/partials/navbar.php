<?php
	$root = base_url();
	$logged_in = $this->session->userdata('user')['logged_in'];
	$isAdmin = $this->session->userdata('user')['admin'];
	$user_id = $this->session->userdata('user')['user_id'];
?>
<div class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="users">Test App</a>
		</div>
		<div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="<?=$root?>users">Home</a></li>
			</ul>

			<?php if ($logged_in == true)
			{ ?>
				<ul class="nav navbar-nav">
					<?php
						if ($isAdmin == 1) 
						{
					?>
							<li><a href="<?=$root?>admin">Dashboard</a></li>
					<?php
						}
						else
						{
					?>
							<li><a href="<?=$root?>dashboard">Dashboard</a></li>
					<?php
						}
					?>
					<li><a href="<?=$root?>users/edit/<?= $user_id ?>">Profile</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?=$root?>users/logout">Logout</a></li>
				</ul>
			<?php
			} 
			else
			{ ?>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?=$root?>signin">Sign in</a></li>
				</ul>
			<?php
			} ?>
		</div>
	</div>
</div>