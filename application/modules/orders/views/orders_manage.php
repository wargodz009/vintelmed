<?php
$this->load->model('items/items_model');
$this->load->model('user/user_model');
$this->load->model('user/client_model');
$this->load->model('batch/batch_model');
?>
<div class="row">
	<div class="span8 offset2">
		<h1>Edit</h1>
		<a href="<?php echo base_url();?>orders"><< Back</a>
		<div class="well">
			<form class="form-horizontal" method="post" action="<?php echo base_url().'orders/manage/'.$orders->order_id; ?>">
				<div class="control-group">
					Order details: <br/>
					Msr: <?php
						$client_id = $this->client_model->get_client_id($orders->msr_id,$orders->msr_client_id);
						echo '<a href="'.base_url().'user/view/'.$client_id.'">'.$this->user_model->get_single($client_id,false,'username').'</a>'; ?> <br/>
					Item: <?php echo '<a href="'.base_url().'items/view/'.$orders->item_id.'" target="_new">'.$this->items_model->get_single($orders->item_id,'name').' ('.$this->items_model->get_single($orders->item_id,'description').')</a>';?> <br/>
					Quantity: <?=$orders->quantity;?> <br/>
					Price: <?=$orders->price;?> <br/>
					Date: <?=$orders->datetime;?> <br/>
					<label class="control-label" for="">orders value</label>
					<div class="controls">
						<?php
							$batches = $this->batch_model->get_batches($orders->item_id);
							if(!empty($batches)) {
								foreach($batches as $b) {
									echo 'ITEM: '.$this->items_model->get_single($orders->item_id,'name').'- '.$this->items_model->get_single($orders->item_id,'description').' <input type="checkbox" name="items[]" value="'.$b->item_id.'" />';
									echo $b->item_batch_id.'<br/>';
									$sold_count = $this->batch_model->get_single($b->item_batch_id,'sold_count');
									$item_count = $this->batch_model->get_single($b->item_batch_id,'item_count');
									echo 'SOLD/STOCK: '.( $sold_count != 'Invalid Item'?$sold_count:0).'/'.$item_count;
									echo ' Pieces: <input type="text" name="piece[]" id="piece-'.$b->item_batch_id.'" rel="'.( $sold_count != 'Invalid Item'?$sold_count:0).'" class="'.$item_count.'" value="0" /> <br/><br/>';
								}
							} else {
								echo 'Out Of Stocks!';
							}
						?>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<button type="submit" class="btn">UPDATE</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
jQuery(function(){
	$('[id^=piece]').change(function(){
		var sum = 0;
		$('[id^=piece-]').each(function(){
			sum = parseInt(sum) + parseInt($(this).val());
		});
		var sold_count = parseInt($(this).attr('rel'));
		var item_count = parseInt($(this).attr('class'));
		var total = sold_count + sum;
		
		if(<?=$orders->quantity;?> < sum ) {
			$('[id^=piece-]').each(function(){
				$(this).val('0');
			});
			alert('TOTAL AMOUNT is greater than the ORDER!');
		}
		if($(this).val() > item_count) {
			$(this).val('0');
			alert('AMOUNT is greater than the ITEMS AVAILABLE!');
		}
	});
});
</script>