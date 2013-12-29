VINTELMED ENTERPRISES <br>
WEEKLY INVENTORY REPORT - <?php echo strtoupper($this->item_type_model->get_single($report->report_for,'name')); ?><br>
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
<tdead>
	<tr>
		<td>No.</td>
		<td>Generic Name</td>
		<td>Product Name</td>
		<td>Description</td>
		<td>Supplier Name</td>
		<td>Begin Inventory</td>
		<td>Ave. Usage/montd</td>
		<td>Ave. Usage/montd (8 montds)</td>
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
</tdead>
<tbody>
	<?php 
	if(isset($items)) {
		$ctr = 1;
		foreach($items as $k) {
			?>
			<tr>
				<td><?php echo $ctr; ?></td>
				<td><?php echo $k->generic_name; ?></td>
				<td><?php echo $k->name; ?></td>
				<td><?php echo $k->description; ?></td>
				<td><?php echo $k->supplier_name; ?></td>
				<td><?php echo $k->item_count; ?></td>
				<td><?php echo '-'; ?></td>
				<td><?php echo '-'; ?></td>
				<td><?php echo $k->batch_id.'/ '.date('d-y',strtotime($k->expire)); ?></td>
				<td><?php echo '-'; ?></td>
				<td><?php echo '-'; ?></td>
				<?php
				foreach ( $period as $dt )
				  echo '<td>--</td>';
				?>
				<td><?php echo '-'; ?></td>
				<td><?php echo '-'; ?></td>
				<td><?php echo '-'; ?></td>
				<td><?php echo '-'; ?></td>
				<td><?php echo '-'; ?></td>
				<td><?php echo '-'; ?></td>
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