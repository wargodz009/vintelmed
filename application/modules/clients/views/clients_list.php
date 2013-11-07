<?php
$this->load->model('user/user_model');
?>
<div class="row">
	<div class="span12">
		<h1>List All Client</h1>
		<!--h5><a href="<?php echo base_url();?>user/manage/<?php echo $this->session->userdata('user_id');?>" class="button">Add new client</a></h5-->
		<div class="well">
			<table class="datatable">
				<thead>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if(isset($client) && !empty($client)) {
						foreach($client as $c) {
					?>
					<tr>
						<td><?php echo $c->client_id;?></td>
						<td><?php echo '<a target="_new" href="'.base_url().'user/view/'.$c->client_id.'">'.$this->user_model->get_single($c->client_id,false,'username').'</a>';?></td>
						<td><a href="<?php echo base_url();?>orders/create/<?php echo $c->client_id;?>">Add Order</a></td>
					</tr>
					<?php
						}
					} else {
					?>
					<tr>
						<td>No items yet!</td>
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