<?php 
if(isset($all_pending)) {
	if(count($all_pending)>0) {
		echo '<div class="ui-widget">
			<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
				<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
				<a href="'.base_url().'orders/">You have '.count($all_pending).' new pending order(s)!</a></p>
			</div>
		</div>';
	}
}
?>
<!-- sales updates -->
<div class="tbl tbl2">
	<div class="title">
		Sales Update
		<input name="" type="button" class="view" />
		<input name="" type="button" class="download" />
		<select name="" class="slct">
			<option selected="selected">---</option>
			<option>North Pharma</option>
			<option>Central Pharma</option>
			<option>South Pharma</option>
		</select>
		<select name="" class="slct2">
			<option selected="selected">---</option>
			<option>2013</option>
			<option>2012</option>
			<option>2011</option>
		</select>
		<select name="" class="slct2">
			<option selected="selected">---</option>
			<option>Jan</option>
			<option>Feb</option>
			<option>Mar</option>
			<option>Apr</option>
			<option>May</option>
			<option>Jun</option>
			<option>Jul</option>
			<option>Aug</option>
			<option>Sep</option>
			<option>Oct</option>
			<option>Nov</option>
			<option>Dec</option>
		</select>
		<div class="clear"></div>
	</div>

	<!-- sbtle -->
	<div class="sbtle2">
		<table border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td class="wd3-1">Area</td>
			<td class="wd3-2">MSR Name</td>
			<td class="wd3-3">Sales</td>
			<td class="wd3-4">Quota</td>
			<td class="wd3-5">%</td>
			<td class="wd3-6">End Month</td>
			<td class="wd3-7">&nbsp;</td>
		  </tr>
		</table>
		<div class="shdw"></div>
	</div>
	<!-- / sbtle -->

	<div class="clear"></div>

	<!-- tblist -->
	<div id="tblisthldr2" class="tblist scrl-2">
		<?php 
		if(isset($sales_and_collection) && !empty($sales_and_collection)) {
			$total_sales = 0;
			$total_end = 0;
			$total_quota = 0;
			foreach($sales_and_collection as $info) {
			?>
			<table border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td class="wd3-8"><?=(isset($info['area'])?$info['area']:'');?></td>
					<td class="wd3-9"><?=(isset($info['user_id'])?get_name($info['user_id']):'');?></td>
					<td class="wd3-10"><?=(isset($info['total_sold_items'])?$info['total_sold_items']:'');?></td>
					<td class="wd3-11"><?=(isset($info['quota'])?$info['quota']:'');?></td>
					<td class="wd3-12"><?php
					$total = (isset($info['total_sold_items'])?$info['total_sold_items']:0);
					$quota = (isset($info['quota'])?$info['quota']:0);
					$count1 = $total / $quota;
					$count2 = $count1 * 100;
					echo $count2;
					$total_sales += $total;
					$total_end += $total;
					$total_quota += $quota;
					?>%</td>
					<td class="wd3-13"><?=(isset($info['total_sold_items'])?$info['total_sold_items']:'');?></td>
					<td class="wd3-14"><a href="#" class="lnkicn2"><img src="<?=base_url();?>assets/images/view-icon.png" width="8" height="8" /></a></td>
				</tr>
			</table>
			<?php
			}
		} else {
		?>
			<table border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td class="wd3-8">No items yet!</td>
					<td class="wd3-9"></td>
					<td class="wd3-10"></td>
					<td class="wd3-11"></td>
					<td class="wd3-12"></td>
					<td class="wd3-13"></td>
					<td class="wd3-14"><a href="#" class="lnkicn2"><img src="<?=base_url();?>assets/images/view-icon.png" width="8" height="8" /></a></td>
				</tr>
			</table>
		<?php
		}
		?>
		
		<script type="text/javascript">
			$(function(){
			  $('#tblisthldr2').slimscroll({
				railVisible: true,
				railBorderRadius:0,
				railColor: '#0483e4'
			  });
			});
		</script>
	</div>
	<!-- / tblist -->

	<div class="clear"></div>

	<!-- total -->
	<div class="total">
		<table width="0" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td class="wd4-1">TOTAL</td>
			<td class="wd4-2"><?=(isset($total_sales)?$this->calc->to_money($total_sales):'0');?></td>
			<td class="wd4-3"><?=(isset($total_sales)?$this->calc->to_money($total_quota):'0');?></td>
			<td class="wd4-4"></td>
			<td class="wd4-5"><?=(isset($total_sales)?$this->calc->to_money($total_end):'0');?></td>
			<td>&nbsp;</td>
		  </tr>
		</table>
	</div>
	<!-- / total -->
</div>
	<!-- / sales updates -->

<!-- collection updates -->
<div class="tbl tbl2">
	<div class="title">
		Collection Update
		<input name="" type="button" class="view" />
		<input name="" type="button" class="download" />
		<select name="" class="slct">
			<option selected="selected">---</option>
			<option>North Pharma</option>
			<option>Central Pharma</option>
			<option>South Pharma</option>
		</select>
		<select name="" class="slct2">
			<option selected="selected">---</option>
			<option>2013</option>
			<option>2012</option>
			<option>2011</option>
		</select>
		<select name="" class="slct2">
			<option selected="selected">---</option>
			<option>Jan</option>
			<option>Feb</option>
			<option>Mar</option>
			<option>Apr</option>
			<option>May</option>
			<option>Jun</option>
			<option>Jul</option>
			<option>Aug</option>
			<option>Sep</option>
			<option>Oct</option>
			<option>Nov</option>
			<option>Dec</option>
		</select>
		<div class="clear"></div>
	</div>
	
	<!-- sbtle -->
	<div class="sbtle2">
		<table border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td class="wd3-1">Area</td>
			<td class="wd3-2">Client Name</td>
			<td class="wd3-3">Pr/Or #</td>
			<td class="wd3-4">Check Date</td>
			<td class="wd3-5">Dated/Cash</td>
			<td class="wd3-6">Bank/Check #</td>
			<td class="wd3-7">&nbsp;</td>
		  </tr>
		</table>
		<div class="shdw"></div>
	</div>
	<!-- / sbtle -->
	
	<div class="clear"></div>
	
	<!-- tblist -->
	<div id="tblisthldr3" class="tblist scrl-2 custom-width">
		<?php 
		if(isset($collection_updates) && !empty($collection_updates)) {
			$total_col = 0;
			foreach($collection_updates as $col) {
		?>
		<table border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td class="wd3-8"><?=$col->area;?></td>
				<td class="wd3-9"><?=get_name($col->user_id);?></td>
				<td class="wd3-10"><?=$col->form_number;?></td>
				<td class="wd3-11"><?=date("d M, Y",strtotime($col->datetime));?></td>
				<td class="wd3-12"><? echo $col->amount; $total_col += $col->amount;?></td>
				<td class="wd3-13"><?=$col->check_number;?></td>
				<td class="wd3-14"><a href="#" class="lnkicn2"><img src="<?=base_url();?>assets/images/view-icon.png" width="8" height="8" /></a></td>
			</tr>
		</table>
		<?php
			}
		} else {
		?>
		<table border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td class="wd3-8">No updates yet!</td>
				<td class="wd3-9"></td>
				<td class="wd3-10"></td>
				<td class="wd3-11"></td>
				<td class="wd3-12"></td>
				<td class="wd3-13"></td>
				<td class="wd3-14"><a href="#" class="lnkicn2"><img src="<?=base_url();?>assets/images/view-icon.png" width="8" height="8" /></a></td>
			</tr>
		</table>
		<?php
		}
		?>
		
		<script type="text/javascript">
			$(function(){
			  $('#tblisthldr3').slimscroll({
				railVisible: true,
				railBorderRadius:0,
				railColor: '#0483e4'
			  });
			});
		</script>
	</div>
	<!-- / tblist -->
	
	<div class="clear"></div>
	
	<!-- total -->
	<div class="total">
		<table width="0" border="0" cellspacing="0" cellpadding="0" class='custom-width'>
		  <tr>
			<td class="wd4-1">TOTAL</td>
			<td class="wd4-2"></td>
			<td class="wd4-3"></td>
			<td class="wd4-4"></td>
			<td class="wd4-5"><?=(isset($total_col)?$this->calc->to_money($total_col):'0');?></td>
			<td>&nbsp;</td>
		  </tr>
		</table>
	</div>
	<!-- / total -->
</div>
<!-- / collection updates -->
<div class="clear"></div>