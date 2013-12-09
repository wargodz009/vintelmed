<?php
$this->load->model('orders/orders_model');
?>
<div class="row">
	<div class="span12">
		<h1>List All Order_pay</h1>
		<h5><a href="<?php echo base_url();?>orders/upload/<?=$id;?>" class="button">Add new File</a></h5>
		<div class="well">
			<table class="datatable">
				<thead>
					<tr>
						<th>order</th>
						<th>Amount</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if(isset($order_pay) && !empty($order_pay)) {
						foreach($order_pay as $c) {
					?>
					<tr>
						<td><a target="_new" href="<?php echo base_url();?>orders/view/<?=$c->order_id;?>"><?php echo $this->orders_model->get_single($c->order_id,'form_number');?></a></td>
						<td><?php echo $c->amount;?></td>
						<td><?php echo $c->datetime;?></td>
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
		</div>
	</div>
</div>