<?php 
if(isset($pre_approval)) {
	if(count($pre_approval)>0) {
		echo '<div class="ui-widget">
			<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
				<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
				<a href="'.base_url().'orders/pre">You have <strong>'.count($pre_approval).' new</strong> orders that needs approval!</a></p>
			</div>
		</div>';
	}
}
if(isset($post_approval)) {
	if(count($post_approval)>0) {
		echo '<div class="ui-widget">
			<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
				<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
				<a href="'.base_url().'orders/post">You have <strong>'.count($post_approval).' completed</strong> orders that needs approval!</a></p>
			</div>
		</div>';
	}
}
?>
<!-- product inventory -->
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
        <!-- / product inventory -->
        
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
		
<script type="text/javascript">
jQuery(function(){
	$('#inventory_item_type').change(function(){
		window.location = '<?php echo base_url(); ?>dashboard/index/item_type/'+$(this).val();
	});
});
</script>
<?php 
//var_dump($sales_update);
?>