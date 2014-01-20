<div class="row">
	<div class="span12">
		<div class="well">
			<table class="gridtable">
				<thead>
					<tr>
						<th>group</th>
						<th>setting</th>
						<th>Value</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if(isset($setting) && !empty($setting)) {
						foreach($setting as $c) {
					?>
					<tr>
						<td><?php echo $c->group;?></td>
						<td><?php echo $c->display_name;?></td>
						<td><?php echo $c->value;?></td>
						<td><a href="<?php echo base_url();?>setting/edit/<?php echo $c->setting_id;?>">Edit</a></td>
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
            <div class="pagination">
            <?php
                echo $this->pagination->create_links();
            ?>
			</div>
		</div>
	</div>
</div>