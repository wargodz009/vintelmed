<div class="row">
	<div class="span12">
		<h1>List All Site</h1>
		<h5><a href="<?php echo base_url();?>site/create" class="button">Add new site</a></h5>
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
					if(isset($site) && !empty($site)) {
						foreach($site as $c) {
					?>
					<tr>
						<td><?php echo $c->site_id;?></td>
						<td><?php echo $c->name;?></td>
						<td><a href="<?php echo base_url();?>site/edit/<?php echo $c->site_id;?>">Edit</a> | <a href="<?php echo base_url();?>site/delete/<?php echo $c->site_id;?>" class="confirm" rel="Are you sure you want to delete <?php echo $c->name;?>?">Delete</a></td>
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