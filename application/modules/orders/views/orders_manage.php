<?php
$this->load->model('items/items_model');
$this->load->model('user/user_model');
$this->load->model('user/client_model');
$this->load->model('batch/batch_model');
?>
<div class="row">
	<div class="span8 offset2">
		<a href="<?php echo base_url();?>orders"><< Back</a>
		<div class="well">
			<form class="form-horizontal" method="post" action="<?php echo base_url().'orders/manage/'.$orders->order_id; ?>">
				<div class="control-group">
					<br>
					Order details: <br/>
					Msr: <?php
						$client_id = $this->client_model->get_client_id($orders->msr_id,$orders->msr_client_id);
						echo '<a href="'.base_url().'user/view/'.$client_id.'">'.$this->user_model->get_single($client_id,false,'username').'</a>'; ?> <br/>
					Item: <?php echo '<a href="'.base_url().'items/view/'.$orders->item_id.'" target="_new">'.$this->items_model->get_single($orders->item_id,'name').' ('.$this->items_model->get_single($orders->item_id,'description').')</a>';?> <br/>
					Quantity: <?=$orders->quantity;?> <br/>
					Price: <?=$orders->price;?> <br/>
					Date: <?=$orders->datetime;?> <br/>
					<hr>
					<div class="control-group">
					<div class="controls">
							<label for="">Action: </label>
							<select name="status" id="">
								<option value="approved">Approved</option>
								<option value="declined">Declined</option>
							</select>
						</div>
					</div>
					<br>
					<label class="control-label" for="">orders value</label>
					<div class="controls">
						<?php
							$batches = $this->batch_model->get_batches($orders->item_id);
							$qty = $orders->quantity;
							$tmp = 0;
							$remaining_items = 0;
							$output = '';
							if(!empty($batches)) {
								foreach($batches as $b) {
									$output .= 'ITEM: '.$this->items_model->get_single($orders->item_id,'name').'- '.$this->items_model->get_single($orders->item_id,'description').' <input type="checkbox" id="item-'.$b->item_batch_id.'" name="items[]" value="'.$b->item_id.'" style="display:none;" />';
									$output .= $b->item_batch_id.'<br/>';
									$sold_count = $this->batch_model->get_single($b->item_batch_id,'sold_count');
									$item_count = $this->batch_model->get_single($b->item_batch_id,'item_count');
									$output .= 'SOLD/STOCK: '.( $sold_count != 'Invalid Item'?$sold_count:0).'/'.$item_count;
									$remaining_items =  $item_count - $sold_count;
									$output .= ' Pieces: <input type="text" name="piece[]" id="piece-'.$b->item_batch_id.'" rel="'.( $sold_count != 'Invalid Item'?$sold_count:0).'" class="'.$item_count.'" value="0" /> <br/><br/>';
									$output .= '<input type="hidden" name="item_batch_id[]" value="'.$b->item_batch_id.'" />';
								}
								if($remaining_items < $orders->quantity) {
									echo '<br/><br/>Items Remaining not enough for this transaction! <br/>';
									echo '<a href="'.base_url().'batch/create/'.$orders->item_id.'">Order Items now</a> <br/>';
								} else {
									echo $output;
								}
							} else {
								echo 'Out Of Stocks! <br/>';
								echo '<a href="'.base_url().'batch/create/'.$orders->item_id.'">Order Items</a> <br/>';
							}
						?>
					</div>
				</div>
				<div class="control-group">
					<div class="controls"> <br/>
						Remaining&nbsp;
						<div id="remaining"> <?php echo $orders->quantity; ?></div>
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
		var thenum = $(this).attr('id').match(/\d+$/)[0];
		if(parseInt($(this).val()) > 0) {
			$('#item-'+thenum).prop('checked', true);
		} else {
			$('#item-'+thenum).prop('checked', false);
		}
		var sum = 0;
		$('[id^=piece-]').each(function() {
			sum = parseInt(sum) + parseInt($(this).val());
		});
		var sold_count = parseInt($(this).attr('rel'));
		var item_count = parseInt($(this).attr('class'));
		var total = sold_count + sum;
		var remain_count = parseInt($(this).attr('class')) - parseInt($(this).attr('rel'));
		if(<?=$orders->quantity;?> < sum ) {
			$('[id^=piece-]').each(function(){
				$(this).val('0');
				$(":checkbox").prop('checked',false);
			});
			alert('TOTAL AMOUNT is greater than the ORDER!');
		}
		if($(this).val() > remain_count) {
			$(this).val('0');
			$(":checkbox").prop('checked',false);
			alert('AMOUNT is greater than the ITEMS AVAILABLE!' + remain_count);
		}
		$('#remaining').text(<?=$orders->quantity;?> - sum);
		
	});
});
</script>