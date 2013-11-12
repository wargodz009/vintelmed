<?php
$this->load->model('role/role_model');
?>
<div class="row">
	<div class="span12">
		<h1>List All User</h1>
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
					if(isset($user) && !empty($user)) {
						foreach($user as $c) {
					?>
					<tr>
						<td><?php echo '<a target="_new" href="'.base_url().'user/view/'.$c->user_id.'">'.$c->username.'</a>';?></td>
						<td><?php
						$role = $this->role_model->get_single($c->role_id);
						echo $role->role_name;?></td>
						<td><a href="<?php echo base_url();?>user/manage/<?php echo $c->user_id;?>">Manage</a> | <a href="<?php echo base_url();?>user/edit/<?php echo $c->user_id;?>">Edit</a> | 
						<?php if($c->status == 'enabled') { ?>
						<a href="<?php echo base_url();?>user/delete/<?php echo $c->user_id;?>" class="confirm" rel="Are you sure you want to deactivate <?php echo $c->username;?>?">Deactivate</a>
						<?php } else { ?>
						<a href="<?php echo base_url();?>user/activate/<?php echo $c->user_id;?>" class="confirm" rel="Are you sure you want to enable <?php echo $c->username;?>?">Activate</a>
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