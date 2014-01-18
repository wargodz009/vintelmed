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
					if(isset($items)) {
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
								$returned_goods = $this->report_model->get_item_sum_returned($k->item_batch_id,$fromDate,date("Y-m-d"));
								echo $returned_goods['sum_qty']; ?></td>
								<!-- cancelled rgs/dr-->
								<td class="wd1-10"><?php echo $returned_goods['return_id']; ?></td>
								<!-- total out -->
								<td class="wd1-11"><?php echo $total_out; ?></td>
								<!-- remarks -->
								<td class="wd1-12"><?php echo '-'; ?></td>
							</tr>
							<?php
							$ctr++;
						}
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
            	<table border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="wd3-8">S2</td>
                    <td class="wd3-9">Villablanca, Eric</td>
                    <td class="wd3-10">124,267.20</td>
                    <td class="wd3-11">500,000.00</td>
                    <td class="wd3-12">24.85%</td>
                    <td class="wd3-13">50,555.00</td>
                    <td class="wd3-14"><a href="#" class="lnkicn2"><img src="images/view-icon.png" width="8" height="8" /></a></td>
                  </tr>
                  <tr>
                    <td class="wd3-8">SV1</td>
                    <td class="wd3-9">Laguna - VACANT</td>
                    <td class="wd3-10">250,816.00</td>
                    <td class="wd3-11">700,000.00</td>
                    <td class="wd3-12">35.83%</td>
                    <td class="wd3-13">-</td>
                    <td class="wd3-14"><a href="#" class="lnkicn2"><img src="images/view-icon.png" width="8" height="8" /></a></td>
                  </tr>
                  <tr>
                    <td class="wd3-8">SV2</td>
                    <td class="wd3-9">Morillo, Jane</td>
                    <td class="wd3-10">396,635.00</td>
                    <td class="wd3-11">900,000.00</td>
                    <td class="wd3-12">44.07%</td>
                    <td class="wd3-13">704,231.00</td>
                    <td class="wd3-14"><a href="#" class="lnkicn2"><img src="images/view-icon.png" width="8" height="8" /></a></td>
                  </tr>
                  <tr>
                    <td class="wd3-8">SO1</td>
                    <td class="wd3-9">Adora, Omar</td>
                    <td class="wd3-10">157,580.00</td>
                    <td class="wd3-11">450,000.00</td>
                    <td class="wd3-12">35.02%</td>
                    <td class="wd3-13">482,231.40</td>
                    <td class="wd3-14"><a href="#" class="lnkicn2"><img src="images/view-icon.png" width="8" height="8" /></a></td>
                  </tr>
                  <tr>
                    <td class="wd3-8">SO2</td>
                    <td class="wd3-9">Abanco, Margie</td>
                    <td class="wd3-10">90,198.25</td>
                    <td class="wd3-11">450,000.00</td>
                    <td class="wd3-12">20.04%</td>
                    <td class="wd3-13">-</td>
                    <td class="wd3-14"><a href="#" class="lnkicn2"><img src="images/view-icon.png" width="8" height="8" /></a></td>
                  </tr>
                  <tr>
                    <td class="wd3-8">&nbsp;</td>
                    <td class="wd3-9">SUPERVISOR</td>
                    <td class="wd3-10">2,540.00</td>
                    <td class="wd3-11">-</td>
                    <td class="wd3-12">-</td>
                    <td class="wd3-13">12,317.00</td>
                    <td class="wd3-14"><a href="#" class="lnkicn2"><img src="images/view-icon.png" width="8" height="8" /></a></td>
                  </tr>
                  <tr>
                    <td class="wd3-8">SO2</td>
                    <td class="wd3-9">SUPERVISOR</td>
                    <td class="wd3-10">2,540.00</td>
                    <td class="wd3-11">-</td>
                    <td class="wd3-12">-</td>
                    <td class="wd3-13">12,317.00</td>
                    <td class="wd3-14"><a href="#" class="lnkicn2"><img src="images/view-icon.png" width="8" height="8" /></a></td>
                  </tr>
                  <tr>
                    <td class="wd3-8">SO2</td>
                    <td class="wd3-9">SUPERVISOR</td>
                    <td class="wd3-10">2,540.00</td>
                    <td class="wd3-11">-</td>
                    <td class="wd3-12">-</td>
                    <td class="wd3-13">12,317.00</td>
                    <td class="wd3-14"><a href="#" class="lnkicn2"><img src="images/view-icon.png" width="8" height="8" /></a></td>
                  </tr>
                  <tr>
                    <td class="wd3-8">SO2</td>
                    <td class="wd3-9">SUPERVISOR</td>
                    <td class="wd3-10">2,540.00</td>
                    <td class="wd3-11">-</td>
                    <td class="wd3-12">-</td>
                    <td class="wd3-13">12,317.00</td>
                    <td class="wd3-14"><a href="#" class="lnkicn2"><img src="images/view-icon.png" width="8" height="8" /></a></td>
                  </tr>
                  <tr>
                    <td class="wd3-8">SO2</td>
                    <td class="wd3-9">SUPERVISOR</td>
                    <td class="wd3-10">2,540.00</td>
                    <td class="wd3-11">-</td>
                    <td class="wd3-12">-</td>
                    <td class="wd3-13">12,317.00</td>
                    <td class="wd3-14"><a href="#" class="lnkicn2"><img src="images/view-icon.png" width="8" height="8" /></a></td>
                  </tr>
                  <tr>
                    <td class="wd3-8">SO2</td>
                    <td class="wd3-9">SUPERVISOR</td>
                    <td class="wd3-10">2,540.00</td>
                    <td class="wd3-11">-</td>
                    <td class="wd3-12">-</td>
                    <td class="wd3-13">12,317.00</td>
                    <td class="wd3-14"><a href="#" class="lnkicn2"><img src="images/view-icon.png" width="8" height="8" /></a></td>
                  </tr>
                </table>
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
                    <td class="wd4-1">TOTAL South Area</td>
                    <td class="wd4-2">1,161,635.05</td>
                    <td class="wd4-3">3,850,000.00</td>
                    <td class="wd4-4">30.17%</td>
                    <td class="wd4-5">1,443,703.52</td>
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
            <div id="tblisthldr3" class="tblist scrl-2">
            	<table border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="wd3-8">S2</td>
                    <td class="wd3-9">Villablanca, Eric</td>
                    <td class="wd3-10">124,267.20</td>
                    <td class="wd3-11">500,000.00</td>
                    <td class="wd3-12">24.85%</td>
                    <td class="wd3-13">50,555.00</td>
                    <td class="wd3-14"><a href="#" class="lnkicn2"><img src="images/view-icon.png" width="8" height="8" /></a></td>
                  </tr>
                  <tr>
                    <td class="wd3-8">SV1</td>
                    <td class="wd3-9">Laguna - VACANT</td>
                    <td class="wd3-10">250,816.00</td>
                    <td class="wd3-11">700,000.00</td>
                    <td class="wd3-12">35.83%</td>
                    <td class="wd3-13">-</td>
                    <td class="wd3-14"><a href="#" class="lnkicn2"><img src="images/view-icon.png" width="8" height="8" /></a></td>
                  </tr>
                  <tr>
                    <td class="wd3-8">SV2</td>
                    <td class="wd3-9">Morillo, Jane</td>
                    <td class="wd3-10">396,635.00</td>
                    <td class="wd3-11">900,000.00</td>
                    <td class="wd3-12">44.07%</td>
                    <td class="wd3-13">704,231.00</td>
                    <td class="wd3-14"><a href="#" class="lnkicn2"><img src="images/view-icon.png" width="8" height="8" /></a></td>
                  </tr>
                  <tr>
                    <td class="wd3-8">SO1</td>
                    <td class="wd3-9">Adora, Omar</td>
                    <td class="wd3-10">157,580.00</td>
                    <td class="wd3-11">450,000.00</td>
                    <td class="wd3-12">35.02%</td>
                    <td class="wd3-13">482,231.40</td>
                    <td class="wd3-14"><a href="#" class="lnkicn2"><img src="images/view-icon.png" width="8" height="8" /></a></td>
                  </tr>
                  <tr>
                    <td class="wd3-8">SO2</td>
                    <td class="wd3-9">Abanco, Margie</td>
                    <td class="wd3-10">90,198.25</td>
                    <td class="wd3-11">450,000.00</td>
                    <td class="wd3-12">20.04%</td>
                    <td class="wd3-13">-</td>
                    <td class="wd3-14"><a href="#" class="lnkicn2"><img src="images/view-icon.png" width="8" height="8" /></a></td>
                  </tr>
                  <tr>
                    <td class="wd3-8">&nbsp;</td>
                    <td class="wd3-9">SUPERVISOR</td>
                    <td class="wd3-10">2,540.00</td>
                    <td class="wd3-11">-</td>
                    <td class="wd3-12">-</td>
                    <td class="wd3-13">12,317.00</td>
                    <td class="wd3-14"><a href="#" class="lnkicn2"><img src="images/view-icon.png" width="8" height="8" /></a></td>
                  </tr>
                  <tr>
                    <td class="wd3-8">SO2</td>
                    <td class="wd3-9">SUPERVISOR</td>
                    <td class="wd3-10">2,540.00</td>
                    <td class="wd3-11">-</td>
                    <td class="wd3-12">-</td>
                    <td class="wd3-13">12,317.00</td>
                    <td class="wd3-14"><a href="#" class="lnkicn2"><img src="images/view-icon.png" width="8" height="8" /></a></td>
                  </tr>
                  <tr>
                    <td class="wd3-8">SO2</td>
                    <td class="wd3-9">SUPERVISOR</td>
                    <td class="wd3-10">2,540.00</td>
                    <td class="wd3-11">-</td>
                    <td class="wd3-12">-</td>
                    <td class="wd3-13">12,317.00</td>
                    <td class="wd3-14"><a href="#" class="lnkicn2"><img src="images/view-icon.png" width="8" height="8" /></a></td>
                  </tr>
                  <tr>
                    <td class="wd3-8">SO2</td>
                    <td class="wd3-9">SUPERVISOR</td>
                    <td class="wd3-10">2,540.00</td>
                    <td class="wd3-11">-</td>
                    <td class="wd3-12">-</td>
                    <td class="wd3-13">12,317.00</td>
                    <td class="wd3-14"><a href="#" class="lnkicn2"><img src="images/view-icon.png" width="8" height="8" /></a></td>
                  </tr>
                  <tr>
                    <td class="wd3-8">SO2</td>
                    <td class="wd3-9">SUPERVISOR</td>
                    <td class="wd3-10">2,540.00</td>
                    <td class="wd3-11">-</td>
                    <td class="wd3-12">-</td>
                    <td class="wd3-13">12,317.00</td>
                    <td class="wd3-14"><a href="#" class="lnkicn2"><img src="images/view-icon.png" width="8" height="8" /></a></td>
                  </tr>
                  <tr>
                    <td class="wd3-8">SO2</td>
                    <td class="wd3-9">SUPERVISOR</td>
                    <td class="wd3-10">2,540.00</td>
                    <td class="wd3-11">-</td>
                    <td class="wd3-12">-</td>
                    <td class="wd3-13">12,317.00</td>
                    <td class="wd3-14"><a href="#" class="lnkicn2"><img src="images/view-icon.png" width="8" height="8" /></a></td>
                  </tr>
                </table>
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
            	<table width="0" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="wd4-1">TOTAL South Area</td>
                    <td class="wd4-2">1,161,635.05</td>
                    <td class="wd4-3">3,850,000.00</td>
                    <td class="wd4-4">30.17%</td>
                    <td class="wd4-5">1,443,703.52</td>
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