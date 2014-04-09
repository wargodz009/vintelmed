<?php  if(isset($template) && $template != 'default') { ?>
<link rel="stylesheet" media="" href="<?=base_url().'assets/css/print.css';?>"/>
<?php } ?>
<?php
$this->load->model('supplier/supplier_model');
$this->load->model('orders/orders_model');
?>
VINTEL MED ENTERPRISES <br>
SUMMARY OF CRITICAL STOCKS <br>
<?php 
$date_start = strtotime($report->date_start);
echo 'For: '.date("M",$date_start).' '.date("d",$date_start).' '.date("Y",$date_start).'<br>'; 
?>
<div id="divscroll" class="tbl3 tblist skin 2soph scrollable">
<table border="0" cellspacing="0" cellpadding="0">
<thead>
	<tr>
		<td>Product Name</td>
		<td>Generic Name</td>
		<td>Supplier</td>
		<td>Batch No./ Expiry Date</td>
		<td>Previous requisition date</td>
		<td>Previous requisition Qty</td>
		<td>Average usage/month</td>
		<td>Pending Bookings</td>
		<td>Current Inventory</td>
		<td>status</td>
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
				<!-- product name -->
				<td><?php echo $k->items_name; ?></td>
				<!-- generic name -->
				<td><?php echo $k->generic_name; ?></td>
				<!-- supplier id -->
				<td><?php echo $this->supplier_model->get_single($k->supplier_id,'name'); ?></td>
				<!-- Batch ID / expire date -->
				<td><?php echo $k->batch_id.' - '; 
						 echo date('d-M, Y',strtotime($k->expire));?></td>
				<!-- Previous requisition -->
				<td><?php echo daTE("d-M, Y",strtotime($k->datetime)); ?></td>
				<!-- qty -->
				<td><?php echo $k->item_count; ?></td>
				<!-- ave usage / month -->
				<td><?php 
				$fromDate = date("Y-m-d", strtotime($report->date_start." -1 months"));
				echo $this->report_model->get_item_average_usage($k->item_batch_id,$fromDate,date("Y-m-d",strtotime($report->date_start))); ?></td>
				<!-- pending bookings -->
				<td><?php 
				$fromDate = date("Y-m-d", strtotime($report->date_start));
				echo $this->orders_model->get_item_pending_orders($k->item_id,$fromDate,date("Y-m-d",strtotime($report->date_start))); ?></td>
				<!-- current inv -->
				<td><?php echo $k->item_count - $k->sold_count; ?></td>
				<!-- status -->
				<td> -- </td>
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