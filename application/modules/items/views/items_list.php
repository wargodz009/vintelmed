<div class="row">
	<div class="span12">
		<h1>List All Items</h1>
		<h5><a href="<?php echo base_url();?>items/create" class="button">Add new items</a></h5>
		<div class="well">
			<table class="datatable">
				<thead>
					<tr>
						<th>Item</th>
						<th>Description</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if(isset($items) && !empty($items)) {
						foreach($items as $c) {
					?>
					<tr>
						<td><?php echo '<a target="_new" href="'.base_url().'items/view/'.$c->item_id.'">'.$c->name.'</a>';?></td>
						<td><?php echo $c->description;?></td>
						<td>
							<a href="<?php echo base_url();?>items/edit/<?php echo $c->item_id;?>">Edit</a>
							<?php if($this->users->is_admin() || $this->users->is_warehouseman()) { ?>| 
							<a href="<?php echo base_url();?>items/delete/<?php echo $c->item_id;?>" class="confirm" rel="Are you sure you want to delete <?php echo $c->name;?>?">Delete</a>
							<?php } ?>
						</td>
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