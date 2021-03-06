<div class="row">
	<div class="span12">
		<h1>List All Role</h1>
		<div class="well">
			<table class="datatable">
				<thead>
					<tr>
						<th>Id</th>
						<th>Rolename</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if(isset($role) && !empty($role)) {
						foreach($role as $c) {
					?>
					<tr>
						<td><?php echo $c->role_id;?></td>
						<td><?php echo $c->role_name;?></td>
						<td><a href="<?php echo base_url();?>role/edit/<?php echo $c->role_id;?>">Edit</a> | <a href="<?php echo base_url();?>role/delete/<?php echo $c->role_id;?>" class="confirm" rel="Are you sure you want to delete <?php echo $c->role_name;?>?">Delete</a></td>
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
			<?php
                echo $this->pagination->create_links();
            ?>
		</div>
	</div>
</div>