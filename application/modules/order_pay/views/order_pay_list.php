<?php
$this->load->model('orders/orders_model');
?>
<div class="row">
	<div class="span12">
		<a href="<?php echo base_url();?>orders/pay/<?=$id;?>" class="menu_button">Add new Payment</a>
		<br/>
		<br/>
		<div class="well">
			<table class="gridtable">
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
			<div class="pagination">
            <?php
                echo $this->pagination->create_links();
            ?>
			</div>
		</div>
	</div>
</div>