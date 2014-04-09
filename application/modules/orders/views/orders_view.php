<?php
$this->load->model('user/client_model');
?>
<div class="row">
	<div class="span8 offset2">
		<h1>ORDER DETAILS</h1>
		<div class="well">
			<?php
			echo "
			SO#: {$orders->form_number} <br /> 
			MSR: ".get_name($orders->msr_id)." <br /> 
			Item: ".get_item($orders->item_id)." <br /> 
			Quantity: {$orders->quantity} <br /> 
			Price: {$orders->price} <br /> 
			Date Ordered: {$orders->datetime} <br /> 
			Client: ".get_name($this->client_model->get_user_id_by_client_msr_id($orders->msr_client_id))." <br /> 
			Status: {$orders->status} <br /> <hr/>Items <br/>";
			foreach($order_details as $items) {
				echo "Batch: ".get_batch($items->item_batch_id)." <br/>";
				echo "Quantity: {$items->quantity} <br/><br/>";
			}
			?>
		</div>
		<form action="<?=base_url().'orders/view/'.$orders->order_id;?>" method="post" onsubmit="window.open('<?=base_url().'orders/view/'.$orders->order_id.'/print';?>', '_blank', 'scrollbars=no,menubar=no,height=436,width=835,resizable=no,toolbar=no,status=no');return false;">
			<input type="hidden" value='print' name="print" />
			<input type="submit" class="button" value="PRINT"/>
		</form>
	</div>
</div>