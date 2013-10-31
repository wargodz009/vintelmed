<?php 
$this->load->model('district/district_model');
?>
<a href="<?=isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:base_url().'user/';?>"><< Back</a> <br/>
<div class="row">
	<div class="span12">
		<?php 
			echo 'username: '.$user->username.'<br/>';
			$this->load->model('role/role_model');
			$role = $this->role_model->get_single($user->role_id);
			echo 'role: '.$role->role_name.'<br/>';
		?>
	</div>
	<div class="span12">
		<h1>Medreps</h1>
		<div class="well">
			<table class="datatable">
				<thead>
					<tr>
						<th>Username</th>
						<th>District</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if(isset($medrep) && !empty($medrep)) {
						foreach($medrep as $c) {
					?>
					<tr>
						<td><?php echo $c->username;?></td>
						<td><?=$this->district_model->get_single($c->district_id,'name')?></td>
						<td>
						<?php 
							if($this->user_model->is_assigned($c->user_id,$this->uri->segment(3))) {
								echo '<a href="'.base_url().'user/del_client/'.$c->user_id.'/'.$this->uri->segment(3).'">Unassign</a>';
							} else {
								echo '<a href="'.base_url().'user/add_client/'.$c->user_id.'/'.$this->uri->segment(3).'">Assign</a>';
							}
						?>
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
		</div>
	</div>
</div>