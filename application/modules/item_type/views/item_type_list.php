<div class="row">
	<div class="span12">
		<h1>List All Item_type</h1>
		<h5><a href="<?php echo base_url();?>item_type/create" class="button">Add new item_type</a></h5>
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
					if(isset($item_type) && !empty($item_type)) {
						foreach($item_type as $c) {
					?>
					<tr>
						<td><?php echo $c->item_type_id;?></td>
						<td><?php echo $c->name;?></td>
						<td><a href="<?php echo base_url();?>item_type/edit/<?php echo $c->item_type_id;?>">Edit</a> | <a href="<?php echo base_url();?>item_type/delete/<?php echo $c->item_type_id;?>" class="confirm" rel="Are you sure you want to delete <?php echo $c->name;?>?">Delete</a></td>
					</tr>
					<?php
						}
					} else {
					?>
					<tr>
						<td>No item_type yet!</td>
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