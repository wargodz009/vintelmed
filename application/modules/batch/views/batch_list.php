<?php
$this->load->model('items/items_model');
$this->load->model('supplier/supplier_model');
$this->load->model('user/user_model');
?>
<div class="row">
	<div class="span12">
		<a href="<?php echo base_url();?>batch/create" class="menu_button">Add New Inventory Item</a>
		<br/>
		<br/>
		<div class="well">
			<table class="gridtable">
				<thead>
					<tr>
						<th>Item</th>
						<th>Batch ID</th>
						<th>Sold/Remaining</th>
						<th>Supplier</th>
						<th>Expiry</th>
						<th>Added By</th>
						<th>Status</th>
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
						<td><?php 
						echo $c->sold_count.'/'.$c->item_count;
						?>
						</td>
						<td><?php echo '<a target="new" href="'.base_url().'supplier/view/'.$c->supplier_id.'">'.$this->supplier_model->get_single($c->supplier_id,'name').'</a>';?></td>
						<td><?php echo $c->expire;?></td>
						<td><?php echo '<a target="_new" href="'.base_url().'user/view/'.$c->user_id.'">'.$this->user_model->get_single($c->user_id,false,'username').'</a>';?></td>
						<td><?php echo $c->status;?></td>
						<td>
						<?php if($this->users->is_warehouseman()) { ?>
						<a href="<?php echo base_url();?>batch/edit/<?php echo $c->item_batch_id;?>">Edit</a>
						<?php } else if($this->users->is_admin()) { ?>
						| <a href="<?php echo base_url();?>batch/delete/<?php echo $c->item_batch_id;?>" class="confirm" rel="Are you sure you want to delete <?php echo $c->batch_id;?>?">Delete</a>
						<?php } else {
							//echo '<td></td>';
						} ?>
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
						<td></td>
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
            <div class="pagination">
				<?php
					echo $this->pagination->create_links();
				?>
			</div>
		</div>
	</div>
</div>