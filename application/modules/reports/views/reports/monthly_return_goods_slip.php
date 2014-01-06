<?php 
$this->load->model('user/client_model');
$this->load->model('clients/clients_model');
$this->load->model('user/user_model');
$this->load->model('orders/orders_model');
$this->load->model('batch/batch_model');
?>
MONTHLY RETURNED GOODS SLIP <br>
<?php 
$date_start = strtotime($report->date_start);
//echo 'For: '.date("M",$date_start).' '.date("d",$date_start).' '.date("Y",$date_start).'<br>'; 
?>
for the month of <?php echo date("M",$date_start); ?> <br>
<div id="divscroll" class="tbl3 tblist skin 2soph scrollable">
	<table border="0" cellspacing="0" cellpadding="0">
	<thead>
		<tr>
			<td>RGS #</td>
			<td>RGS DATE</td>
			<td>CLIENT NAME</td>
			<td>MSR</td>
			<td>PRODUCT</td>
			<td>LOT #/EXPIRY DATE</td>
			<td>DR #./SI #.</td>
			<td>DATE</td>
			<td>QTY</td>
			<td>FREE GOODS</td>
			<td>PRICE</td>
			<td>LESS DISC.</td>
			<td>AMOUNT</td>
			<td>REMARKS</td>
		</tr>
	</thead>
	<tbody>
		<?php 
		if(isset($items)) {
			foreach($items as $k) {
				?>
				<tr>
					<!-- RGS # -->
					<td><?php echo $k->return_id; ?></td>
					<!-- RGS DATE -->
					<td><?php echo $k->date_cancelled; ?></td>
					<!-- CLIENT NAME -->
					<td><?php 
					$client_id = $this->client_model->get_user_id_by_client_msr_id($k->msr_client_id);
					echo $this->user_model->get_single($client_id,false,'first_name').', '.$this->user_model->get_single($client_id,false,'last_name'); ?></td>
					<!-- MSR -->
					<td><?php 
					echo $this->user_model->get_single($k->msr_id,false,'first_name').', '.$this->user_model->get_single($k->msr_id,false,'last_name'); ?></td>
					<!-- PRODUCT -->
					<td><?php echo $this->items_model->get_single($k->item_id,'name').' - '.$this->items_model->get_single($k->item_id,'description'); ?></td>
					<!-- LOT #/EXPIRY DATE -->
					<td><?php echo $this->batch_model->get_single($this->orders_model->get_order_all_details($k->order_id,$k->item_id,'item_batch_id'),'lot_number').'/'.$this->batch_model->get_single($this->orders_model->get_order_all_details($k->order_id,$k->item_id,'item_batch_id'),'expire'); ?></td>
					<!-- DR #./SI #. -->
					<td><?php echo $k->form_number; ?></td>
					<!-- DATE -->
					<td><?php echo $k->datetime; ?></td>
					<!-- QTY -->
					<td><?php echo $k->return_quantity; ?></td>
					<!-- FREE GOODS -->
					<td>FREE GOODS</td>
					<!-- PRICE -->
					<td><?php echo $k->price; ?></td>
					<!-- LESS DISC. -->
					<td>LESS DISC.</td>
					<!-- AMOUNT -->
					<td><?php echo $k->return_quantity * $this->items_model->get_single($k->item_id,'price_standard'); ?></td>
					<!-- REMARKS -->
					<td><?php echo $k->remarks; ?></td>
				</tr>
				<?php
			}
		} else {
			echo '<tr>
				<td>EMPTY RESULTS!</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			';
		}
		?>
	</tbody>
	</table>
</div>
<script type="text/javascript">
$(window).load(function () {
	$(".2soph").customScrollbar({preventDefaultScroll: true});
	$("#divscroll").customScrollbar({fixedThumbHeight: 50, fixedThumbWidtd: 400});
});
</script>