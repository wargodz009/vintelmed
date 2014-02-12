<?php
$this->load->model('role/role_model');
$this->load->model('user/client_model');
?>
<div class="row">
	<div class="span12">
		<?php if($this->users->is_admin() || $this->users->is_accountant() || $this->users->is_hrd()) { ?>
		<a class="menu_button" href="<?php echo base_url(); ?>user/create">Add Client</a>
		<?php } ?>
		<?php if($this->users->is_accountant()) { ?>
		<h1>Clients of: <?php echo get_name($this->uri->segment(3)); ?></h1>
		<?php } ?>
		<br/>
		<br/>
		<div class="well">
			<table class="gridtable">
				<thead>
					<tr>
						<th>Name</th>
						<th>Role</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if(isset($client) && !empty($client)) {
						foreach($client as $c) {
					?>
					<tr>
						<td><?php echo get_name($c->user_id); ?></td>
						<td><?php
						$role = $this->role_model->get_single($c->role_id);
						echo $role->role_name;?></td>
						<?php if($this->users->is_admin()) { ?>
							<td><a href="<?php echo base_url();?>user/manage/<?php echo $c->user_id;?>">Manage</a> | <a href="<?php echo base_url();?>user/edit/<?php echo $c->user_id;?>">Edit</a> |  <a class="confirm" rel="Are you sure you want to permanently delete <?php echo $c->username;?>?" href="<?php echo base_url();?>user/delete/<?php echo $c->user_id;?>">Delete</a> |
							<?php if($c->status == 'enabled') { ?>
							<a href="<?php echo base_url();?>user/deactivate/<?php echo $c->user_id;?>" class="confirm" rel="Are you sure you want to deactivate <?php echo $c->username;?>?">Deactivate</a>
							<?php } else { ?>
							<a href="<?php echo base_url();?>user/activate/<?php echo $c->user_id;?>" class="confirm" rel="Are you sure you want to enable <?php echo $c->username;?>?">Activate</a>
							<?php } ?>
						</td>
						<?php } else { ?>
							<td>
							<a href="<?php echo base_url();?>orders/create/<?php echo $this->uri->segment(3).'/'.$c->user_id;?>">Add Order</a>
							| <a href="<?php echo base_url();?>orders/user/<?php echo $this->client_model->get_msr_client_id($this->uri->segment(3),$c->user_id);?>">Orders</a>
							</td>
						<?php } ?>
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