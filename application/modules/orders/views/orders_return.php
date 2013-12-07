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
			<form class="form-horizontal" method="post" action="<?php echo base_url().'orders/return_goods/'.$orders->order_id; ?>">
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
						<input type="hidden" name="order_id" value="<?php echo $orders->order_id; ?>" />
						<?php
						foreach($order_details as $oDetails){
							echo 'Batch: '.$this->batch_model->get_single($oDetails->item_batch_id,'batch_id').'<br/><input type="hidden" name="item_batch_id[]" value="'.$oDetails->item_batch_id.'"/>';
							echo 'Quantity: <input type="text" class="quantity :number" name="quantity[]" value="'.$oDetails->quantity.'" rel="'.$oDetails->quantity.'" /> <br/>';
						}
						?>
					</div>
					<label class="control-label" for="">Remarks</label>
					<div class="controls">
						<textarea name="remarks" id="" cols="30" rows="10"></textarea>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<button type="submit" class="btn">Return</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
jQuery(function(){
	$('.quantity').change(function(){
		if(parseInt($(this).attr('rel')) < parseInt($(this).val())) {
			$(this).val('0');
			alert('Return count cannot be bigger than actual order!');
		}
	});
});
</script>