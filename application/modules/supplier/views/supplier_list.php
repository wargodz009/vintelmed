<div class="row">
	<div class="span12">
		<a href="<?php echo base_url();?>supplier/create" class="menu_button">Add new supplier</a>
		<br/>
		<br/>
		<div class="well">
			<table class="gridtable">
				<thead>
					<tr>
						<th>Supplier</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if(isset($supplier) && !empty($supplier)) {
						foreach($supplier as $c) {
					?>
					<tr>
						<td><?php echo '<a href="'.base_url().'supplier/view/'.$c->supplier_id.'"></a>'.$c->name.'</a>';?></td>
						<td><a href="<?php echo base_url();?>supplier/edit/<?php echo $c->supplier_id;?>">Edit</a> 
						<?php if($this->users->is_admin()) { ?>
						| <a href="<?php echo base_url();?>supplier/delete/<?php echo $c->supplier_id;?>" class="confirm" rel="Are you sure you want to delete <?php echo $c->name;?>?">Delete</a>
						<?php } ?>
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
			<div class="pagination">
            <?php
                echo $this->pagination->create_links();
            ?>
			</div>
		</div>
	</div>
</div>