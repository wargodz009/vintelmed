<?php
$this->load->model('items/items_model');
$this->load->model('user/user_model');
$this->load->model('user/client_model');
$this->load->model('batch/batch_model');
$this->load->model('orders/orders_model');
?>
<div class="row">
	<div class="span8 offset2">
		<a class='button' href="<?php echo base_url();?>order_pay/list_all/<?php echo $orders->order_id;?>">View All Payment Record</a> <a class='button' href="<?php echo base_url();?>order_pay/multipay/<?php echo $orders->order_id;?>">Add Payment For Multiple Invoice</a>
		<br/>
		<br/>
		<a href="<?php echo base_url();?>orders"><< Back</a>
		<div class="well">
			<form class="form-horizontal" method="post" action="<?php echo base_url().'orders/pay/'.$orders->order_id; ?>">
				<div class="control-group">
					<h2>Order details:</h2> <br/>
					<span class="title">Msr:</span> <?php
						$client_id = $this->client_model->get_client_id($orders->msr_id,$orders->msr_client_id);
						echo '<a href="'.base_url().'user/view/'.$client_id.'">'.$this->user_model->get_single($client_id,false,'username').'</a>'; ?> <br/>
					<span class="title">Item:</span> <?php echo '<a href="'.base_url().'items/view/'.$orders->item_id.'" target="_new">'.$this->items_model->get_single($orders->item_id,'name').' ('.$this->items_model->get_single($orders->item_id,'description').')</a>';?> <br/>
					<span class="title">Quantity:</span> <?
					$orders->quantity = $this->orders_model->get_order_details($orders->order_id,'quantity');
					echo $orders->quantity;?> <br/>
					<span class="title">Price:</span> <?=$orders->price;?> <br/>
					<span class="title">Discount:</span> <?=$orders->discount.'%';?> <br/>
					<span class="title">Date:</span> <?=date("d M, Y",strtotime($orders->datetime));?> <br/>
					<span class="title">Mode of Payment:</span> <?=$orders->payment_type;?> <br/>
					<span class="title">Payable Amount:</span> <?php 
					$total = $this->calc->total($orders->price,$orders->quantity,$orders->discount);
					echo $this->calc->to_money($total);?> <br/>
					<span class="title">Paid Amount:</span> <?php echo $this->calc->to_money($orders_paid);?> <br/>
					<?php if($orders_paid < $total) { ?>
					<br/>
					<label class="control-label" for="">New Payment Amount*</label>
					<div class="controls">
						<input type="hidden" name="order_id" value="<?php echo $orders->order_id;?>" class=":required :number"/>
						<input type="text" name="amount" class=":required :number"/>
						<input type="hidden" name="total_amount" value="<?=$total;?>" class=""/>
					</div>
					<br/>
					<fieldset>
						<legend>If Payment made via Check</legend>
						<label class="control-label" for="">Bank</label>
						<div class="controls">
							<input type="text" name="bank" class=""/>
						</div>
						<br/>
						<label class="control-label" for="">Check #</label>
						<div class="controls">
							<input type="text" name="check_number" class=""/>
						</div>
						<br/>
						<label class="control-label" for="">Check Full Amount</label>
						<div class="controls">
							<input type="text" name="check_full_amount" class=""/>
						</div>
					</fieldset>
				</div>
				<div class="control-group">
					<div class="controls">
						<button type="submit" class="btn">Add Payment</button>
					</div>
				</div>
				<?php } else {
					?> Fully paid!
					</div>
					<?php
				} ?>
			</form>
		</div>
	</div>
</div>