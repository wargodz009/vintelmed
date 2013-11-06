<?php
$this->load->model('items/items_model');
$this->load->model('supplier/supplier_model');
?>
<div class="row">
	<div class="span12">
		<h1>List All Batch</h1>
		<h5><a href="<?php echo base_url();?>batch/create" class="button">Add new batch</a></h5>
		<div class="well">
			<table class="datatable">
				<thead>
					<tr>
						<th>Item</th>
						<th>Batch ID</th>
						<th>Supplier</th>
						<th>Expiry</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if(isset($batch) && !empty($batch)) {
						foreach($batch as $c) {
					?>
					<tr>
						<td><?php echo '<a target="new" href="'.base_url().'items/view/'.$c->item_id.'">'.$this->items_model->get_single($c->item_id,'name').' - '.$this->items_model->get_single($c->item_id,'description').'</a>';?></td>
						<td><?php echo '<a target="new" href="'.base_url().'batch/view/'.$c->item_batch_id .'">'.$c->batch_id.'</a>';?></td>
						<td><?php echo '<a target="new" href="'.base_url().'supplier/view/'.$c->supplier_id.'">'.$this->supplier_model->get_single($c->supplier_id,'name').'</a>';?></td>
						<td><?php echo $c->expire;?></td>
						<td><a href="<?php echo base_url();?>batch/edit/<?php echo $c->item_batch_id;?>">Edit</a> | <a href="<?php echo base_url();?>batch/delete/<?php echo $c->item_batch_id;?>" class="confirm" rel="Are you sure you want to delete <?php echo $c->batch_id;?>?">Delete</a></td>
					</tr>
					<?php
						}
					} else {
					?>
					<tr>
						<td>No items yet!</td>
						<td></td>
						<td></td>
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