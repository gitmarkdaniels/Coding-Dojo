<div id="user_wall" class="container">
	<?php
		// echo var_dump($user);
		// echo var_dump($wall);
		// echo var_dump($messages);
		// echo var_dump($comments)
	?>

	<?php if ($user)
	{ ?>
		<h1><?= $user['first_name'] . ' ' .$user['last_name'] ?></h1>
		<table id="user_details" class="table bg-info">
			<tbody>
				<tr>
					<td>Registerred at:</td>
					<td><?= $user['created_at'] ?></td>
				</tr>
				<tr>
					<td>User ID:</td>
					<td><?= $user['id'] ?></td>
				</tr>
				<tr>
					<td>Email address:</td>
					<td><?= $user['email'] ?></td>
				</tr>
				<tr>
					<td>Description:</td>
					<td><?= $user['description'] ?></td>
				</tr>
			</tbody>
		</table>
		<div>
			<form action="/users/message" method="post">
				<fieldset class="fieldset">
					<legend>Leave a message for <?= $user['first_name'] ?></legend>
					<input type="hidden" name="action" value="message">
					<textarea class="form-control" rows="5" cols="20"></textarea>
					<button type="submit" class="pull-right">Post</button>
				</fieldset>
			</form>

			<?php if ($messages)
			{ ?>
				<div>
					<a href="<?= base_url() ?>/users/show/<?= $messages['user_id'] ?>">
						<?= 'User ' . $user['first_name'] . $user['last_name'] . ' wrote' ?>
					</a>
					<span class="pull-right">7 hours ago</span>
					<p class="message_post">
						<?= 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at fermentum nunc. Praesent porta ex dolor, non cursus nisi facilisis eu. Proin ac posuere elit. In scelerisque malesuada odio, consectetur vestibulum mauris maximus aliquet. Praesent tellus velit, sagittis eu dolor ut, porttitor ultrices nisl. Ut lobortis volutpat magna vitae convallis. Curabitur pulvinar justo leo, eget faucibus orci pretium nec. Vestibulum ullamcorper est non urna pharetra pharetra. Donec at blandit purus. Cras at risus eget nunc malesuada semper. Pellentesque lacinia lectus diam, quis consequat mauris blandit feugiat. Vestibulum convallis suscipit neque ac eleifend.' //$message['message_content'] ?>
					</p>
				</div>
			<?php } ?>
		</div>

		<?php if ($messages)
		{ ?>
			<div class="comment">
				<?php if ($comments)
				{ ?>
					<a href="<?= base_url() ?>/users/show/28">
						<?= 'User ' . $user['first_name'] . $user['last_name'] . ' commented' ?>
					</a>
					<span class="pull-right">Janaury 1 2016</span>
					<p class="comment_post">
						<?= 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at fermentum nunc. Praesent porta ex dolor, non cursus nisi facilisis eu. Proin ac posuere elit. In scelerisque malesuada odio, consectetur vestibulum mauris maximus aliquet. Praesent tellus velit, sagittis eu dolor ut, porttitor ultrices nisl.' //$comment['comment_content'] ?>
					</p>
				<?php } ?>

				<form action="/users/comment" method="post">
					<fieldset class="fieldset">
						<input type="hidden" name="action" value="comments">
						<textarea id="comment" class="form-control" rows="5"
									cols="15" placeholder="Write a comment"
									name="comment"></textarea>
						<button type="submit" class="pull-right">Post</button>
					</fieldset>
				</form>
			</div>
		<?php } ?>

	<?php } ?>
</div>