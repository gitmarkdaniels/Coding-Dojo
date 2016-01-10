<?php defined('BASEPATH') OR exit('No direct script access allowed');

	if ($this->session->userdata('user')['logged_in'] == true)
	{
?>
		<div class="container">
			<?php
				$root = base_url();
				$logged_in = $this->session->userdata('user')['logged_in'];
				$isAdmin = $this->session->userdata('user')['admin'];

				if ($isAdmin == 1)
				{ 
			?>
					<h2 class="inline_display bg_font">Manage Users</h2>
					<form action="<?= $root ?>users/new_user" class="inline_display pull-right">
						<button type="submit" class="btn btn-default pull-right">Add new</button>
					</form>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Email</th>
								<th>Create date</th>
								<th>User level</th>
								<th>Actions</th>
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
										<td>
											<a href="<?= $root ?>users/edit/<?= $user['id'] ?>">edit</a> |
											<a href="<?= $root ?>users/remove/<?= $user['id'] ?>">remove</a>
										</td>
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