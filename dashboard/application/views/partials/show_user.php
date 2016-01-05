<div id="user_wall" class="container">
	<h1><?php// $user['first_name'] . $user['last_name'] ?></h1>
	<table id="user_details" class="table bg-info">
		<tbody>
			<tr>
				<td>Registerred at:</td>
				<td><?= 'created_at'// $user['created_at'] ?></td>
			</tr>
			<tr>
				<td>User ID:</td>
				<td><?= 'id'// $user['id'] ?></td>
			</tr>
			<tr>
				<td>Email address:</td>
				<td><?= 'email'// $user['email'] ?></td>
			</tr>
			<tr>
				<td>Description:</td>
				<td><?= 'description'// $user['description'] ?></td>
			</tr>
		</tbody>
	</table>
	<div>
		<form action="/users/message" method="post">
			<fieldset class="fieldset">
				<legend>Leave a message for <?= 'first name' // $user['first_name'] ?></legend>
				<input type="hidden" name="action" value="message">
				<textarea class="form-control" rows="5" cols="20"></textarea>
				<button type="submit" class="pull-right">Post</button>
			</fieldset>
		</form>
		<div>
			<a href="/dashboard"><?= 'User A wrote' // $user['first_name'] . $user['last_name'] ?></a>
			<span class="pull-right">7 hours ago</span>
			<p class="message_post">
				<?= 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at fermentum nunc. Praesent porta ex dolor, non cursus nisi facilisis eu. Proin ac posuere elit. In scelerisque malesuada odio, consectetur vestibulum mauris maximus aliquet. Praesent tellus velit, sagittis eu dolor ut, porttitor ultrices nisl. Ut lobortis volutpat magna vitae convallis. Curabitur pulvinar justo leo, eget faucibus orci pretium nec. Vestibulum ullamcorper est non urna pharetra pharetra. Donec at blandit purus. Cras at risus eget nunc malesuada semper. Pellentesque lacinia lectus diam, quis consequat mauris blandit feugiat. Vestibulum convallis suscipit neque ac eleifend.' //$message['message_content'] ?>
			</p>
		</div>
	</div>
	<div class="comment">
		<a href="/dashboard"><?= 'User E commented' // $user['first_name'] . $user['last_name'] ?></a>
		<span class="pull-right">Janaury 1 2016</span>
		<p class="comment_post">
			<?= 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at fermentum nunc. Praesent porta ex dolor, non cursus nisi facilisis eu. Proin ac posuere elit. In scelerisque malesuada odio, consectetur vestibulum mauris maximus aliquet. Praesent tellus velit, sagittis eu dolor ut, porttitor ultrices nisl.' //$comment['comment_content'] ?>
		</p>

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
</div>