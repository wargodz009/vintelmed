<div class="row">
	<div class="span12">
		<h1>List All notify</h1>
		<h5><a href="<?php echo base_url();?>notify/create" class="button">Add new notify</a></h5>
		<div class="well">
			<table class="datatable">
				<thead>
					<tr>
						<th>Id</th>
						<th>Value</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if(isset($notify) && !empty($notify)) {
						foreach($notify as $c) {
					?>
					<tr>
						<td><?php echo $c->notify_id;?></td>
						<td><?php echo $c->notify_name;?></td>
						<td><a href="<?php echo base_url();?>notify/edit/<?php echo $c->notify_id;?>">Edit</a> | <a href="<?php echo base_url();?>notify/delete/<?php echo $c->notify_id;?>" class="confirm" rel="Are you sure you want to delete <?php echo $c->notify_name;?>?">Delete</a></td>
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