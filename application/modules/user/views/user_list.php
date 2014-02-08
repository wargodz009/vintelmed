<?php
$this->load->model('role/role_model');
?>
<div class="row">
	<div class="span12">
		<?php if($this->users->is_admin()) { ?>
		<a class="menu_button" href="<?php echo base_url(); ?>user/create">Add Emplyee</a>
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
					if(isset($user) && !empty($user)) {
						foreach($user as $c) {
					?>
					<tr>
						<td><?php 
						if(!empty($c->first_name) && !empty($c->last_name)) {
							echo '<a target="_new" href="'.base_url().'user/view/'.$c->user_id.'">'.$c->first_name.', '.$c->last_name.'</a>';
						} else {
							echo '<a target="_new" href="'.base_url().'user/view/'.$c->user_id.'">'.$c->username.'</a>';
						} 
						?></td>
						<td><?php
						$role = $this->role_model->get_single($c->role_id);
						echo $role->role_name;?></td>
						<td>
						<?php if($this->users->is_admin()) { ?>
							<a href="<?php echo base_url();?>user/manage/<?php echo $c->user_id;?>">Manage</a> | <a href="<?php echo base_url();?>user/edit/<?php echo $c->user_id;?>">Edit</a> | 
						<?php if($c->status == 'enabled') { ?>
							<a href="<?php echo base_url();?>user/delete/<?php echo $c->user_id;?>" class="confirm" rel="Are you sure you want to deactivate <?php echo $c->username;?>?">Deactivate</a>
						<?php } else { ?>
							<a href="<?php echo base_url();?>user/activate/<?php echo $c->user_id;?>" class="confirm" rel="Are you sure you want to enable <?php echo $c->username;?>?">Activate</a>
						<?php } ?>
						<?php } else { ?>
							<a href="<?php echo base_url();?>clients/display/<?php echo $c->user_id;?>">Show Clients</a>
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