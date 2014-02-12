<?php 
$this->load->model('district/district_model');
?>
<a href="<?=isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:base_url().'user/';?>"><< Back</a> <br/>
<div class="row">
	<div class="span12">
		<h1>Clients</h1>
		<div class="well">
			<table class="gridtable">
				<thead>
					<tr>
						<th>Username</th>
						<th>District</th>
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
						<td><?=$this->district_model->get_single($c->district_id,'name')?></td>
						<td>
						<?php 
							if($this->user_model->is_assigned($this->uri->segment(3),$c->user_id)) {
								echo '<a href="'.base_url().'user/del_client/'.$this->uri->segment(3).'/'.$c->user_id.'">Remove</a>';
							} else {
								echo '<a href="'.base_url().'user/add_client/'.$this->uri->segment(3).'/'.$c->user_id.'">Assign</a>';
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