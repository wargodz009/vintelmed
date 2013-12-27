<?php
$this->load->model('item_type/item_type_model');
?>
<div class="row">
	<div class="span8 offset2">
		<h1>View Item Info</h1>
		<div class="well">
			<?php
				echo "<div class='item_info'>Item: {$items->name} </div> <br />";
				echo "<div class='item_info'>Generic Name: {$items->generic_name} </div> <br />";
				echo "<div class='item_info'>Description: {$items->description} </div> <br />";
				echo "<div class='item_info'>Standard Selling Price: P {$items->price_standard} </div> <br />";
				echo "<div class='item_info'>Item Type: {$this->item_type_model->get_single($items->item_type_id,'name')} </div> <br />";
			?>
		</div>
	</div>
</div>