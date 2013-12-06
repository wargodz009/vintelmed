<div class="row">
	<div class="span12">
		<h1>List All Order_files</h1>
		<h5><a href="<?php echo base_url();?>orders/upload/<?=$id;?>" class="button">Add new File</a></h5>
		<div class="well">
			<table class="datatable">
				<thead>
					<tr>
						<th>file_name</th>
						<th>description</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if(isset($order_files) && !empty($order_files)) {
						foreach($order_files as $c) {
					?>
					<tr>
						<td><?php echo $c->file_name;?></td>
						<td><?php echo $c->description;?></td>
						<td>
							<a href="<?php echo base_url();?>uploads/<?php echo $c->file_name;?>" target="_new">Download</a> | 
							<a href="<?php echo base_url();?>order_files/delete/<?php echo $c->order_files_id;?>" class="confirm" rel="Are you sure you want to delete <?php echo $c->file_name;?>?">Delete</a> 
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