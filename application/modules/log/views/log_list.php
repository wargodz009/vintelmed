<?php
$this->load->model('user/user_model');
$this->load->model('items/items_model');
$this->load->model('supplier/supplier_model');
$this->load->model('batch/batch_model');
$this->load->model('setting/setting_model');
?>
<div class="row">
	<div class="span12">
		<h1>List All Log</h1>
		<div class="well">
			<table class="datatable">
				<thead>
					<tr>
						<th>User</th>
						<th>Notification</th>
						<th>type</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if(isset($log) && !empty($log)) {
						foreach($log as $c) {
							if($c->type == 'login') {
							?>
							<tr>
								<td><?php 
								$user_id = $this->user_model->get_single($c->username,true,'user_id');
								echo '<a href="'.base_url().'user/view/'.$user_id.'">'.$c->username.'</a>';?></td>
								<td><?php echo $c->response;?></td>
								<td><?php echo $c->type;?></td>
								<td><?php echo $c->date;?></td>
							</tr>
							<?php
							} else if($c->type == 'user') {
							?>
							<tr>
								<td><?php echo '<a href="'.base_url().'user/view/'.$c->user_id.'">'.$this->user_model->get_single($c->user_id,false,'username').'</a>';?></td>
								<td><?php echo $c->action.' user: <a href="'.base_url().'user/view/'.$c->response.'">'.$this->user_model->get_single($c->response,false,'username').'</a>'; ?></td>
								<td><?php echo $c->type;?></td>
								<td><?php echo $c->date;?></td>
							</tr>
							<?php
							} else if($c->type == 'inventory') {
							?>
							<tr>
								<td><?php echo '<a href="'.base_url().'user/view/'.$c->user_id.'">'.$this->user_model->get_single($c->user_id,false,'username').'</a>';?></td>
								<td><?php echo $c->action.' item: <a href="'.base_url().'items/view/'.$c->response.'">'.$this->items_model->get_single($c->response,'name').'</a>'; ?></td>
								<td><?php echo $c->type;?></td>
								<td><?php echo $c->date;?></td>
							</tr>
							<?php
							} else if($c->type == 'supplier') {
							?>
							<tr>
								<td><?php echo '<a href="'.base_url().'user/view/'.$c->user_id.'">'.$this->user_model->get_single($c->user_id,false,'username').'</a>';?></td>
								<td><?php echo $c->action.' supplier: <a href="'.base_url().'supplier/view/'.$c->response.'">'.$this->supplier_model->get_single($c->response,'name').'</a>'; ?></td>
								<td><?php echo $c->type;?></td>
								<td><?php echo $c->date;?></td>
							</tr>
							<!-- copy from here -->
							<?php
							} else if($c->type == 'inventory item') {
							?>
							<tr>
								<td><?php echo '<a href="'.base_url().'user/view/'.$c->user_id.'">'.$this->user_model->get_single($c->user_id,false,'username').'</a>';?></td>
								<td><?php echo $c->action.' inventory item: <a href="'.base_url().'batch/view/'.$c->response.'">'.$this->batch_model->get_single($c->response,'batch_id').'</a>'; ?></td>
								<td><?php echo $c->type;?></td>
								<td><?php echo $c->date;?></td>
							</tr>
							<!-- to here -->
							<?php
							} else if($c->type == 'setting') {
							?>
							<tr>
								<td><?php echo '<a href="'.base_url().'user/view/'.$c->user_id.'">'.$this->user_model->get_single($c->user_id,false,'username').'</a>';?></td>
								<td><?php echo $c->action.' update: <a href="'.base_url().'setting/view/'.$c->response.'">'.$this->setting_model->get_single($c->response,'display_name').'</a>'; ?></td>
								<td><?php echo $c->type;?></td>
								<td><?php echo $c->date;?></td>
							</tr>
							<?php
							} else {
							?>
							<tr>
								<td><?php echo $c->user_id;?></td>
								<td><?php echo $c->response;?></td>
								<td><?php echo $c->type;?></td>
								<td><?php echo $c->date;?></td>
							</tr>
							<?php
							}
						}
					} else {
					?>
				<tr>
					<td>No items yet!</td>
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