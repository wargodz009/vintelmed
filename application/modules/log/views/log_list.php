<div class="row">
	<div class="span12">
		<h1>List All Log</h1>
		<div class="well">
			<table class="datatable">
				<thead>
					<tr>
						<th>Id</th>
						<th>Date</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if(isset($log) && !empty($log)) {
						foreach($log as $c) {
					?>
					<tr>
						<td><?php echo $c->user_id;?></td>
						<td><?php echo $c->date;?></td>
						<td><a href="<?php echo base_url();?>log/edit/<?php echo $c->log_id;?>">Edit</a> | <a href="<?php echo base_url();?>log/delete/<?php echo $c->log_id;?>" class="confirm" rel="Are you sure you want to delete <?php echo $c->log_id;?>?">Delete</a></td>
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