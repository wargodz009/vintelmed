<div class="row">
	<div class="span12">
		<h1>List All Supplier</h1>
		<h5><a href="<?php echo base_url();?>supplier/create" class="button">Add new supplier</a></h5>
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
					if(isset($supplier) && !empty($supplier)) {
						foreach($supplier as $c) {
					?>
					<tr>
						<td><?php echo $c->supplier_id;?></td>
						<td><?php echo $c->name;?></td>
						<td><a href="<?php echo base_url();?>supplier/edit/<?php echo $c->supplier_id;?>">Edit</a> | <a href="<?php echo base_url();?>supplier/delete/<?php echo $c->supplier_id;?>" class="confirm" rel="Are you sure you want to delete <?php echo $c->name;?>?">Delete</a></td>
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