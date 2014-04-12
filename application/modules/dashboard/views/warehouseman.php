<?php 
/*if(isset($all_pending)) {
	if(count($all_pending)>0) {
		echo '<div class="ui-widget">
			<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
				<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
				<a href="'.base_url().'orders/">You have '.count($all_pending).' new orders that needs approval!</a></p>
			</div>
		</div>';
	}
}*/
?>
<div class="tbl tbl1">
	<div class="title">
		Product Inventory
		<input name="" type="button" class="settings" />
		<input name="" type="button" class="view" />
		<input name="" type="button" class="download" />
		<select id='inventory_item_type' name="" class="slct">
			<option selected="selected">---</option>
			<option value='2'>Vials Products</option>
			<option value='1'>Orals Products</option>
		</select>
		<div class="clear"></div>
	</div>

	<!-- sbtle -->
	<div class="sbtle">
		<table border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td class="wd1-1">Generic Name</td>
			<td class="wd1-2">Product Name</td>
			<td class="wd1-3">Description</td>
			<td class="wd1-4">Supplier</td>
			<td class="wd1-5">Beg.<br/>Invty</td>
			<td class="wd1-6">Ave. Usage<br/>/ Mo.</td>
			<td class="wd1-7">Ave. Usage<br/>/ 8 Mo.</td>
			<td class="wd1-8">Batch No. /<br/>Expiry Date</td>
			<td class="wd1-9">In</td>
			<td class="wd1-10">Cancel LED<br/>Dr-SI / RGS</td>
			<td class="wd1-11">Out</td>
			<td class="wd1-12">&nbsp;</td>
		  </tr>
		</table>
		<div class="shdw"></div>
	</div>
	<!-- / sbtle -->

	<div class="clear"></div>

	<!-- tblist -->
	<div id="tblisthldr1" class="tblist scrl-1">
		<table border="0" cellspacing="0" cellpadding="0">
		  <?php 
			if(isset($items) && !empty($items)) {
				$ctr = 1;
				$total_out = 0;
				foreach($items as $k) {
					$total_out = 0;
					?>
					<tr>
						<!-- generic name -->
						<td class="wd1-1"><?php echo $k->generic_name; ?></td>
						<!-- product name -->
						<td class="wd1-2"><?php echo $k->item_name; ?></td>
						<!-- description -->
						<td class="wd1-3"><?php echo $k->description; ?></td>
						<!-- supplier name -->
						<td class="wd1-4"><?php echo $k->supplier_name; ?></td>
						<!-- begin inventory -->
						<td class="wd1-5"><?php echo $k->item_count; ?></td>
						<!-- ave. usage/ month -->
						<td class="wd1-6"><?php 
						$fromDate = date("Y-m-d", strtotime(date("Y-m-d")." -1 months"));
						echo $this->report_model->get_item_average_usage($k->item_batch_id,$fromDate,date("Y-m-d")); ?></td>
						<!-- ave. usage/ 8 months -->
						<td class="wd1-7"><?php 
						$fromDate = date("Y-m-d", strtotime(date("Y-m-d")." -8 months"));
						echo $this->report_model->get_item_average_usage($k->item_batch_id,$fromDate,date("Y-m-d")); ?></td>
						<!-- batch id / expire date -->
						<td class="wd1-8"><?php echo $k->batch_id.'/ '.date('d-y',strtotime($k->expire)); ?></td>
						<!-- in -->
						<td class="wd1-9"><?php 
						//echo $this->report_model->get_item_sum_new($k->item_id,$fromDate,date("Y-m-d"));
						?>--</td>
						<!-- cancelled rgs/dr-->
						<td class="wd1-10"><?php $returned_goods = $this->report_model->get_item_sum_returned($k->item_batch_id,$fromDate,date("Y-m-d"));
						echo $returned_goods['sum_qty']; ?></td>
						<!-- total out -->
						<td class="wd1-11">--</td>
						<!-- remarks -->
						<td class="wd1-12"><?php 
						$item_count = $k->item_count;
						$sold_count = $k->sold_count;
						$remaining_count = $item_count - $sold_count;
						$limit = $this->settings->get('critical_percent');
						$max_limit = $item_count * ($limit/100);
						if($remaining_count >= $max_limit) { ?>
							<img src="<?=base_url();?>assets/images/warning-icon-green.png" alt="<?=$max_limit;?>"/>
						<?php } else { ?>
							<img src="<?=base_url();?>assets/images/warning-icon.png" alt="<?=$max_limit;?>"/>
						<?php } ?>
						</td>
					</tr>
					<?php
					$ctr++;
				}
			} else {
				echo '<tr>
					<td colspan="12">No items yet!</td>
				</tr>';
			}
			?>
		</table>
		<script type="text/javascript">
			$(function(){
			  $('#tblisthldr1').slimscroll({
				railVisible: true,
				railBorderRadius:0,
				railColor: '#0483e4'
			  });
			});
		</script>
	</div>
<!-- / tblist -->
</div>
<script type="text/javascript">
jQuery(function(){
	$('#inventory_item_type').change(function(){
		window.location = '<?php echo base_url(); ?>dashboard/index/item_type/'+$(this).val();
	});
});
</script>