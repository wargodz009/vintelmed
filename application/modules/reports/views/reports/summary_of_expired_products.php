<?php
$this->load->model('supplier/supplier_model');
$this->load->model('orders/orders_model');
?>
VINTEL MED ENTERPRISES <br>
EXPIRED PRODUCTS <br>
<?php 
$date_start = strtotime($report->date_start);
$date_end = strtotime($report->date_end);
echo 'For: '.date("M",$date_start).' '.date("d",$date_start).' - '.date("M",$date_end).' '.date("d",$date_end).'<br>'; 
?>
<div id="divscroll" class="tbl3 tblist skin 2soph scrollable">
<table border="0" cellspacing="0" cellpadding="0">
<thead>
	<tr>
		<td>No.</td>
		<td>Product Name</td>
		<td>Description</td>
		<td>Generic Name</td>
		<td>Supplier</td>
		<td>Beg. Invty</td>
		<td>Batch #/Expiry Date</td>
		<td>Cavite Whse Invty</td>
		<td>RGS</td>
		<td>Buffer Stocks Return</td>
		<td>Cancelled/Return (D.R./S.I.)</td>
		<td>Stock Donation</td>
		<td>Stock Transfer to Samples</td>
		<td>Returned to Supplier</td>
		<td>Ending INVTY</td>
		<td>Remarks</td>
	</tr>
</thead>
<tbody>
	<?php 
	if(isset($items)) {
		$ctr = 1;
		$total_out = 0;
		foreach($items as $k) {
			$total_out = 0;
			?>
			<tr>
				<!-- No. -->
				<td><?php echo $ctr; ?></td>
				<!-- product name -->
				<td><?php echo $k->items_name; ?></td>
				<!-- Description -->
				<td><?php echo $k->description; ?></td>
				<!-- generic name -->
				<td><?php echo $k->generic_name; ?></td>
				<!-- supplier id -->
				<td><?php echo $this->supplier_model->get_single($k->supplier_id,'name'); ?></td>
				<!-- beg invty -->
				<td><?php echo $k->item_count; $total_out = $k->item_count; ?></td>
				<!-- Batch ID / expire date -->
				<td><?php echo $k->batch_id.' - '; 
						 echo date('d-M, Y',strtotime($k->expire));?></td>
				<!-- cvte whse -->
				<td><?php echo ($k->cavite_warehouse == 1?$k->item_count:''); ?></td>
				<!-- rgs -->
				<td><?php $rgs = $this->report_model->get_item_sum_returned($k->batch_id,$report->date_start,$report->date_end); 
						echo $rgs['sum_qty']; $total_out = $total_out + $rgs['sum_qty'];
				?></td>
				<!-- buffer stocks -->
				<td>-</td>
				<!-- cancelled/returned -->
				<td>-</td>
				<!-- stock donation -->
				<td>-</td>
				<!-- stock transfer sample -->
				<td>-</td>
				<!-- returned to supplier -->
				<td>-</td>
				<!-- ending inventory -->
				<td><?php echo $total_out; ?></td>
				<!-- remarks -->
				<td>-</td>
			</tr>
			<?php
			$ctr++;
		}
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