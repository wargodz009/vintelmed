<?php
$this->load->model('item_type/item_type_model');
?>
<div class="row">
	<div class="span12">
		<a href="<?php echo base_url();?>items/create" class="menu_button">Add</a>
		<br/>
		<br/>
		<div class="well">
			<table class="gridtable">
				<thead>
					<tr valign="middle">
						<th>Item</th>
						<th>Description</th>
						<th>Type</th>
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
						<td><?php echo $this->item_type_model->get_single($c->item_type_id,'name');?></td>
						<td>
							<a href="<?php echo base_url();?>items/edit/<?php echo $c->item_id;?>">Edit</a>
							<?php if($this->users->is_admin()) { ?>| 
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
			<div class="pagination">
            <?php
                echo $this->pagination->create_links();
            ?>
			</div>
		</div>
	</div>
</div>