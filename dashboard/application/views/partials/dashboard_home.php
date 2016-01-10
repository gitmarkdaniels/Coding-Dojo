<?php defined('BASEPATH') OR exit('No direct script access allowed');

	if ($this->session->userdata('user')['logged_in'] == true)
	{
?>
		<div class="container">
			<?php
				$root = base_url();
				$logged_in = $this->session->userdata('user')['logged_in'];
				$isAdmin = $this->session->userdata('user')['admin'];

				if ($isAdmin == 0)
				{ 
			?>
					<h2 class="inline_display bg_font">Listed Users</h2>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Email</th>
								<th>Create date</th>
								<th>User level</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach ($users as $user)
								{ 
							?>
									<tr>
										<td><?= $user['id'] ?></td>
										<td><a href="users/show/<?= $user['id'] ?>"><?= $user['first_name'] ?></a></td>
										<td><?= $user['email'] ?></td>
										<td><?= $user['created_at'] ?></td>
										<td><?= $user['admin'] ?></td>
									</tr>
							<?php
								}
							?>
						</tbody>
					</table>
			<?php
				}
				else
				{
					$this->session->set_flashdata('unathorized_access', 'Unathorized access');
					redirect('users');
				}
			?>
		</div>
<?php
	}
	else
	{
		$this->session->set_flashdata('not_logged_in', 'You need to sign in');
		redirect('signin');
	}
?>