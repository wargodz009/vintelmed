<?php
$this->load->model('role/role_model');
$this->load->model('user/client_model');
?>
<div class="row">
	<div class="span12">
		<h1>List All Clients</h1>
		<?php if($this->users->is_admin()) { ?>
		<a class="button" href="<?php echo base_url(); ?>clients/create">Add Client</a>
		<?php } ?>
		<div class="well">
			<table class="datatable">
				<thead>
					<tr>
						<th>Username</th>
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
						<td><?php echo '<a target="_new" href="'.base_url().'user/view/'.$c->user_id.'">'.$c->username.'</a>';?></td>
						<td><?php
						$role = $this->role_model->get_single($c->role_id);
						echo $role->role_name;?></td>
						<?php if($this->users->is_admin()) { ?>
							<td><a href="<?php echo base_url();?>user/manage/<?php echo $c->user_id;?>">Manage</a> | <a href="<?php echo base_url();?>user/edit/<?php echo $c->user_id;?>">Edit</a> | 
							<?php if($c->status == 'enabled') { ?>
							<a href="<?php echo base_url();?>user/delete/<?php echo $c->user_id;?>" class="confirm" rel="Are you sure you want to deactivate <?php echo $c->username;?>?">Deactivate</a>
							<?php } else { ?>
							<a href="<?php echo base_url();?>user/activate/<?php echo $c->user_id;?>" class="confirm" rel="Are you sure you want to enable <?php echo $c->username;?>?">Activate</a>
							<?php } ?>
						</td>
						<?php } else { ?>
							<td>
							<a href="<?php echo base_url();?>orders/create/<?php echo $c->user_id;?>">Add Order</a>
							| <a href="<?php echo base_url();?>orders/user/<?php echo $this->client_model->get_msr_client_id($this->session->userdata('user_id'),$c->user_id);?>">Orders</a>
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
						<th></th>
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