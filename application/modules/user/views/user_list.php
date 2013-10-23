<div class="row">
	<div class="span12">
		<h1>List All User</h1>
		<h5><a href="<?php echo base_url();?>user/create" class="button">Add new user</a></h5>
		<div class="well">
			<table class="datatable">
				<thead>
					<tr>
						<th>Id</th>
						<th>Username</th>
						<th>Password</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if(isset($user) && !empty($user)) {
						foreach($user as $c) {
					?>
					<tr>
						<td><?php echo $c->user_id;?></td>
						<td><?php echo $c->username;?></td>
						<td><?php echo $c->password;?></td>
						<td><a href="<?php echo base_url();?>user/edit/<?php echo $c->user_id;?>">Edit</a> | <a href="<?php echo base_url();?>user/delete/<?php echo $c->user_id;?>" class="confirm" rel="Are you sure you want to delete <?php echo $c->username;?>?">Delete</a></td>
					</tr>
					<?php
						}
					} else {
					?>
					<tr>
						<td>No items yet!</td>
						<td></td>
						<td></td>
					</tr>
					<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>