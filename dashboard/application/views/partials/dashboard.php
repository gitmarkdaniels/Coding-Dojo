<div class="container">
	<h2 class="inline_display bg_font">Manage Users</h2>
	<form action="/users/new" class="inline_display pull-right">
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
			<tr>
				<td>John</td>
				<td>Doe</td>
				<td>john@example.com</td>
				<td>John</td>
				<td>John</td>
				<td>
					<a href="/users/edit/<?= 1 //$user['id'] ?>">edit</a> |
					<a href="/users/remove/<?= 1 //$user['id'] ?>">remove</a>
				</td>
			</tr>
			<tr>
				<td>Mary</td>
				<td>Moe</td>
				<td>mary@example.com</td>
				<td>Doe</td>
				<td>John</td>
				<td>
					<a href="/users/edit/<?= 1 //$user['id'] ?>">edit</a> |
					<a href="/users/remove/<?= 1 //$user['id'] ?>">remove</a>
				</td>
			</tr>
			<tr>
				<td>July</td>
				<td>Dooley</td>
				<td>july@example.com</td>
				<td>john@example.com</td>
				<td>John</td>
				<td>
					<a href="/users/edit/<?= 1 //$user['id'] ?>">edit</a> |
					<a href="/users/remove/<?= 1 //$user['id'] ?>">remove</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>