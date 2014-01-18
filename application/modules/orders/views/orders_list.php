<?php
$this->load->model('items/items_model');
$this->load->model('user/user_model');
$this->load->model('user/client_model');
?>
<div class="row">
	<div class="span12">
		<h1>List All Orders</h1>
		<!--h5><a href="<?php echo base_url();?>orders/create" class="button">Add new orders</a></h5-->
		<div class="well">
			<table class="datatable">
				<thead>
					<tr>
						<th>SO #</th>
						<th>Item</th>
						<th>Client</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Total</th>
						<th>Status</th>
						<th>Options</th>
						<?php if($this->users->is_admin()) { ?>
						<th>Approve</th>
						<?php } ?>
					</tr>
				</thead>
				<tbody>
					<?php
					if(isset($orders) && !empty($orders)) {
						foreach($orders as $c) {
					?>
					<tr>
						<td><?php echo $c->form_number;?></td>
						<td><?php echo '<a href="'.base_url().'items/view/'.$c->item_id.'" target="_new">'.$this->items_model->get_single($c->item_id,'name').' ('.$this->items_model->get_single($c->item_id,'description').')</a>';?></td>
						<td><?php
						$client_id = $this->client_model->get_client_id($c->msr_id,$c->msr_client_id);
						echo '<a href="'.base_url().'user/view/'.$client_id.'">'.$this->user_model->get_single($client_id,false,'username').'</a>'; ?></td>
						<td><?php echo $c->quantity;?></td>
						<td><?php echo $c->price;?></td>
						<td><?php echo $c->price * $c->quantity;?></td>
						<td><?php echo $c->status;?></td>
						<?php if($this->users->is_admin() || $this->users->is_accountant()) { ?>
						<td>
							<?php if($c->status == 'pending') { ?>
							<a href="<?php echo base_url();?>orders/manage/<?php echo $c->order_id;?>">Manage</a> | 
							<?php } ?>
							<?php if($c->status == 'approved' && $c->gm_approve_pre != 0 ) { ?>
							<a href="<?php echo base_url();?>orders/complete/<?php echo $c->order_id;?>">Complete</a> | 
							<?php } ?>
							<?php if($c->status == 'completed') { ?>
								<a href="<?php echo base_url();?>orders/upload/<?php echo $c->order_id;?>">Upload Files</a> |
								<a href="<?php echo base_url();?>orders/pay/<?php echo $c->order_id;?>">Payment</a>	
								<?php if($this->orders_model->is_exist_order_return($c->order_id) == false) { ?>
									| <a href="<?php echo base_url();?>orders/return_goods/<?php echo $c->order_id;?>">Return</a>							
								<?php } ?>
							<?php } ?>
							<?php if($c->status != 'completed') { ?>
							<a href="<?php echo base_url();?>orders/delete/<?php echo $c->order_id;?>" class="confirm" rel="Are you sure you want to delete <?php echo $c->form_number;?>?">Delete</a>
							<?php } ?>
						</td>
						<?php 
							if($this->users->is_admin()) {
								if($c->status == 'approved' && $c->gm_approve_pre == 0 || $c->status == 'completed' && $c->gm_approve_post == 0 ) {
								?>
								<td><a href="<?php echo base_url();?>orders/sign/<?php echo ($c->status== "approved"?"pre":"post"); ?>/<?php echo $c->order_id;?>">Sign</a></td>
								<?php
								} else {
									if($c->gm_approve_post != 0 && $c->gm_approve_pre != 0) {
										echo '<td>Finished</td>';
									} else {
										echo '<td>--</td>';
									}
								}
							}
						} else {
						?>
						<td>
						<?php if($c->status != 'completed' && $c->status != 'cancelled' && $c->status != 'returned') { ?>
						<a href="<?php echo base_url();?>orders/cancel/<?php echo $c->order_id;?>" class="confirm" rel="Are you sure you want to Cancel <?php echo $c->form_number;?>?">Cancel</a>
						<?php } ?>
						</td>
						<?php
						} ?>
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
						<?php if($this->users->is_admin()) { ?>
						<td></td>
						<?php } ?>
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