<?php 
$date_start = strtotime(date("d-m-Y",strtotime(date("d-m-Y").' -1 week')));
$date_end = strtotime(date("d-m-Y"));
//echo date("M",$date_start).' '.date("d",$date_start).' - '.date("M",$date_end).' '.date("d",$date_end).', '.date("Y",$date_end).'<br>'; 
?>
<div id="divscroll" class="tbl3 tblist skin 2soph scrollable">
<?php
$begin = new DateTime(date("d-m-Y",$date_start));
$end = new DateTime(date("d-m-Y",$date_end));
$period = array();
while($begin <= $end) {
	$period[] = $begin->format('d-M');
	$begin->modify('+1 day');
}
?>
<table border="0" cellspacing="0" cellpadding="0">
<thead>
	<tr>
		<td>Generic Name</td>
		<td>Product Name</td>
		<td>Description</td>
		<td>Supplier Name</td>
		<td>Begin Inventory</td>
		<td>Ave. Usage/month</td>
		<td>Ave. Usage/month (8 months)</td>
		<td>Batch ID</td>
		<td>IN</td>
		<td>Cancelled (DR/RGS) </td>
		<?php
		foreach ( $period as $dt )
		  echo '<td>'.$dt.'</td>';
		?>
		<td>Total Out</td>
		<td>End Inventory</td>
		<td>Actual Inventory</td>
		<td>Cavite WHSE Inventory</td>
		<td>Total Stocks</td>
		<td>Remarks</td>
		<td>Critical Buffer/Stocks</td>
	</tr>
</thead>
<tbody>
	<?php 
	if(isset($items) && !empty($items)) {
		$ctr = 1;
		$total_out = 0;
		foreach($items as $k) {
			$total_out = 0;
			?>
			<tr>
				<!-- generic name -->
				<td><?php echo $k->generic_name; ?></td>
				<!-- product name -->
				<td><?php echo $k->item_name; ?></td>
				<!-- description -->
				<td><?php echo $k->description; ?></td>
				<!-- supplier name -->
				<td><?php echo $k->supplier_name; ?></td>
				<!-- begin inventory -->
				<td><?php echo $k->item_count; ?></td>
				<!-- ave. usage/ month -->
				<td><?php 
				$fromDate = date("Y-m-d", strtotime($date_start." -1 months"));
				echo $this->report_model->get_item_average_usage($k->item_batch_id,$fromDate,date("Y-m-d",$date_end)); ?></td>
				<!-- ave. usage/ 8 months -->
				<td><?php 
				$fromDate = date("Y-m-d", strtotime($date_start." -8 months"));
				echo $this->report_model->get_item_average_usage($k->item_batch_id,$fromDate,date("Y-m-d",$date_end)); ?></td>
				<!-- batch id / expire date -->
				<td><?php echo $k->batch_id.'/ '.date('d-y',strtotime($k->expire)); ?></td>
				<!-- in -->
				<td><?php 
				$returned_goods = $this->report_model->get_item_sum_returned($k->item_batch_id,$fromDate,date("Y-m-d",$date_end));
				echo $returned_goods['sum_qty']; ?></td>
				<!-- cancelled rgs/dr-->
				<td><?php echo $returned_goods['return_id']; ?></td>
				<?php
				foreach ( $period as $dt ) {
					$out = $this->report_model->get_item_sum_usage($k->item_batch_id,date("Y-m-d",strtotime($dt)));
					echo '<td>'.$out.'</td>';
					$total_out = $total_out + $out;
				}
				?>
				<!-- total out -->
				<td><?php echo $total_out; ?></td>
				<!-- end inventory -->
				<td><?php echo $k->item_count - $total_out; ?></td>
				<!-- actual inventory -->
				<td>&nbsp;</td>
				<!-- cavite whse inventory -->
				<td>&nbsp;</td>
				<!-- total stocks -->
				<td><?php echo '-'; ?></td>
				<!-- remarks -->
				<td><?php echo '-'; ?></td>
				<!-- critical buffer -->
				<td><?php echo '-'; ?></td>
			</tr>
			<?php
			$ctr++;
		}
	} else {
		echo '<tr>
			<td colspan="24">No Items Yet!</td>
		</tr>';
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