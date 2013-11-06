<div class="row">
	<div class="span12">
		<h1>List All Reports_inventory</h1>
		<h5><a href="<?php echo base_url();?>reports_inventory/create" class="button">Add new reports_inventory</a></h5>
		<div class="well">
			<table class="datatable">
				<thead>
					<tr>
						<th>Date</th>
						<th>Report Type</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if(isset($reports_inventory) && !empty($reports_inventory)) {
						foreach($reports_inventory as $c) {
					?>
					<tr>
						<td><?php echo $c->datetime;?></td>
						<td><?php echo '<a href="'.base_url().'reports/'.$c->reports_inventory_id.'">'.$c->report_type.'</a>';?></td>
						<td><a href="<?php echo base_url();?>reports_inventory/delete/<?php echo $c->reports_inventory_id;?>" class="confirm" rel="Are you sure you want to delete <?php echo $c->report_type;?>?">Delete</a></td>
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