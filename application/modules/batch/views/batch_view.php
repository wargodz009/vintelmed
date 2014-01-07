<?php
$this->load->model('items/items_model');
$this->load->model('user/user_model');
?>
<div class="row">
	<div class="span8 offset2">
		<h1>View Single</h1>
		<div class="well">
			<?php
				echo "<div class='batch_item'>Batch ID: {$batch->batch_id} </div><br />";
				echo "<div class='batch_item'>Item: {$this->items_model->get_single($batch->item_id,'name')} </div><br />";
				echo "<div class='batch_item'>User: {$this->user_model->get_single($batch->user_id,false,'username')} </div><br />";
				echo "<div class='batch_item'>Qty: {$batch->item_count} </div><br />";
				echo "<div class='batch_item'>Sold: {$batch->sold_count} </div><br />";
				echo "<div class='batch_item'>Lot #: {$batch->lot_number} </div><br />";
				echo "<div class='batch_item'>on cavite warehouse: ".($batch->cavite_warehouse == 1?"Yes":"No")." </div><br />";
				echo "<div class='batch_item'>Date Recieved: {$batch->recieve_date} </div><br />";
				echo "<div class='batch_item'>Expiration Date: {$batch->expire} </div><br />";
				echo "<div class='batch_item'>Buy Price: {$batch->buy_price} </div><br />";
				echo "<div class='batch_item'>Sell Price: {$batch->sell_price} </div><br />";
			?>
		</div>
	</div>
</div>