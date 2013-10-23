<div class="row">
	<div class="span12">
		<h1>List All Crud</h1>
		<h5><a href="<?php echo base_url();?>crud/create" class="button">Add new crud</a></h5>
		<div class="well">
			<table class="datatable">
				<thead>
					<tr>
						<th>Id</th>
						<th>Value</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if(isset($crud) && !empty($crud)) {
						foreach($crud as $c) {
					?>
					<tr>
						<td><?php echo $c->crud_id;?></td>
						<td><?php echo $c->crud_value;?></td>
						<td><a href="<?php echo base_url();?>crud/edit/<?php echo $c->crud_id;?>">Edit</a> | <a href="<?php echo base_url();?>crud/delete/<?php echo $c->crud_id;?>" class="confirm" rel="Are you sure you want to delete <?php echo $c->crud_value;?>?">Delete</a></td>
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