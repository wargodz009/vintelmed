<?php 
$date_start = strtotime($report->date_start);
$date_end = strtotime($report->date_end);
echo date("M",$date_start).' '.date("d",$date_start).' - '.date("d",$date_end).', '.date("Y",$date_end).'<br>'; 
?>
<div id="divscroll" class="tbl3 tblist skin 2soph scrollable">
<?php
$begin = new DateTime($report->date_start);
$end = new DateTime($report->date_end);

$interval = DateInterval::createFromDateString('1 day');
$period = new DatePeriod($begin, $interval, $end);
?>
<table border="0" cellspacing="0" cellpadding="0">
<div class="title">
Product Inventory
<input name="" type="button" class="settings" />
<input name="" type="button" class="view" />
<input name="" type="button" class="download" />
<select name="" class="slct">
<option selected="selected">---</option>
<option>Vials Products</option>
<option>Orals Products</option>
</select>
<div class="clear"></div>
</div>
<thead>
	<tr>
		<td>No.</td>
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
		  echo '<td>'.$dt->format( "d-M" ).'</td>';
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
	if(isset($items)) {
		$ctr = 1;
		$total_out = 0;
		foreach($items as $k) {
			$total_out = 0;
			?>
			<tr>
				<!-- no -->
				<td><?php //echo $ctr;
				echo $ctr; ?></td>
				<!-- generic name -->
				<td><?php echo $k->generic_name; ?></td>
				<!-- product name -->
				<td><?php echo $k->name; ?></td>
				<!-- description -->
				<td><?php echo $k->description; ?></td>
				<!-- supplier name -->
				<td><?php echo $k->supplier_name; ?></td>
				<!-- begin inventory -->
				<td><?php echo $k->item_count; ?></td>
				<!-- ave. usage/ month -->
				<td><?php 
				$fromDate = date("Y-m-d", strtotime($report->date_start." -1 months"));
				echo $this->report_model->get_item_average_usage($k->item_batch_id,$fromDate,date("Y-m-d",$date_end)); ?></td>
				<!-- ave. usage/ 8 months -->
				<td><?php 
				$fromDate = date("Y-m-d", strtotime($report->date_start." -8 months"));
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
					$out = $this->report_model->get_item_sum_usage($k->item_batch_id,$dt->format('Y-m-d'));
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