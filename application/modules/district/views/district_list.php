<div class="row">
	<div class="span12">
		<h1>List All District</h1>
		<h5><a href="<?php echo base_url();?>district/create" class="button">Add new district</a></h5>
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
					if(isset($district) && !empty($district)) {
						foreach($district as $c) {
					?>
					<tr>
						<td><?php echo $c->district_id;?></td>
						<td><?php echo $c->name;?></td>
						<td><a href="<?php echo base_url();?>district/edit/<?php echo $c->district_id;?>">Edit</a> | <a href="<?php echo base_url();?>district/delete/<?php echo $c->district_id;?>" class="confirm" rel="Are you sure you want to delete <?php echo $c->name;?>?">Delete</a></td>
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