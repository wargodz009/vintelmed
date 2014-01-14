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
                <select name="" class="slct">
                	<option selected="selected">---</option>
                    <option>Vials Products</option>
                    <option>Orals Products</option>
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
                  <tr>
                    <td class="wd2-1">Amikacin</td>
                    <td class="wd2-2">Cinmik</td>
                    <td class="wd2-3">125MG / ML-2ML</td>
                    <td class="wd2-4">Ferj's Pharmacy</td>
                    <td class="wd2-5">-</td>
                    <td class="wd2-6">-</td>
                    <td class="wd2-7">-</td>
                    <td class="wd2-8">7800313 /<br/>04-16</td>
                    <td class="wd2-9">50</td>
                    <td class="wd2-10">-</td>
                    <td class="wd2-11">50 /<br/> 08-30</td>
                    <td class="wd2-12"><a href="#" class="lnkicn"><img src="images/view-icon.png" width="8" height="8" /></a></td>
                  </tr>
                  <tr>
                    <td class="wd2-1">Sample Prod</td>
                    <td class="wd2-2">Near Expiry Date</td>
                    <td class="wd2-3">00MG/ ML-0ML</td>
                    <td class="wd2-4">Sample Prod</td>
                    <td class="wd2-5">-</td>
                    <td class="wd2-6">-</td>
                    <td class="wd2-7">-</td>
                    <td class="wd2-8">-</td>
                    <td class="wd2-9">-</td>
                    <td class="wd2-10">-</td>
                    <td class="wd2-11">-</td>
                    <td class="wd2-12"><a href="#" class="lnkicn"><img src="images/warning-icon.png" width="8" height="8" /></a></td>
                  </tr>
                  <tr>
                    <td class="wd2-1">Ampicillin</td>
                    <td class="wd2-2">Liferzin</td>
                    <td class="wd2-3">1g-VIAL</td>
                    <td class="wd2-4">Marzan Pharma<br/>Corp.</td>
                    <td class="wd2-5">15</td>
                    <td class="wd2-6">-</td>
                    <td class="wd2-7">-</td>
                    <td class="wd2-8">674110905 /<br/>09-14</td>
                    <td class="wd2-9">-</td>
                    <td class="wd2-10">-</td>
                    <td class="wd2-11">-</td>
                    <td class="wd2-12"><a href="#" class="lnkicn"><img src="images/view-icon.png" width="8" height="8" /></a></td>
                  </tr>
                  <tr>
                    <td class="wd2-1">Sample Prod</td>
                    <td class="wd2-2">Near Expiry Date</td>
                    <td class="wd2-3">00MG/ ML-0ML</td>
                    <td class="wd2-4">Sample Prod</td>
                    <td class="wd2-5">-</td>
                    <td class="wd2-6">-</td>
                    <td class="wd2-7">-</td>
                    <td class="wd2-8">-</td>
                    <td class="wd2-9">-</td>
                    <td class="wd2-10">-</td>
                    <td class="wd2-11">-</td>
                    <td class="wd2-12"><a href="#" class="lnkicn"><img src="images/view-icon.png" width="8" height="8" /></a></td>
                  </tr>
                  <tr>
                    <td class="wd2-1">Sample Prod</td>
                    <td class="wd2-2">Near Expiry Date</td>
                    <td class="wd2-3">00MG/ ML-0ML</td>
                    <td class="wd2-4">Sample Prod</td>
                    <td class="wd2-5">-</td>
                    <td class="wd2-6">-</td>
                    <td class="wd2-7">-</td>
                    <td class="wd2-8">-</td>
                    <td class="wd2-9">-</td>
                    <td class="wd2-10">-</td>
                    <td class="wd2-11">-</td>
                    <td class="wd2-12"><a href="#" class="lnkicn"><img src="images/warning-icon.png" width="8" height="8" /></a></td>
                  </tr>
                  <tr>
                    <td class="wd2-1">Sample Prod</td>
                    <td class="wd2-2">Near Expiry Date</td>
                    <td class="wd2-3">00MG/ ML-0ML</td>
                    <td class="wd2-4">Sample Prod</td>
                    <td class="wd2-5">-</td>
                    <td class="wd2-6">-</td>
                    <td class="wd2-7">-</td>
                    <td class="wd2-8">-</td>
                    <td class="wd2-9">-</td>
                    <td class="wd2-10">-</td>
                    <td class="wd2-11">-</td>
                    <td class="wd2-12"><a href="#" class="lnkicn"><img src="images/view-icon.png" width="8" height="8" /></a></td>
                  </tr>
                  <tr>
                    <td class="wd2-1">Sample Prod</td>
                    <td class="wd2-2">Near Expiry Date</td>
                    <td class="wd2-3">00MG/ ML-0ML</td>
                    <td class="wd2-4">Sample Prod</td>
                    <td class="wd2-5">-</td>
                    <td class="wd2-6">-</td>
                    <td class="wd2-7">-</td>
                    <td class="wd2-8">-</td>
                    <td class="wd2-9">-</td>
                    <td class="wd2-10">-</td>
                    <td class="wd2-11">-</td>
                    <td class="wd2-12"><a href="#" class="lnkicn"><img src="images/warning-icon.png" width="8" height="8" /></a></td>
                  </tr>
                  <tr>
                    <td class="wd2-1">Sample Prod</td>
                    <td class="wd2-2">Near Expiry Date</td>
                    <td class="wd2-3">00MG/ ML-0ML</td>
                    <td class="wd2-4">Sample Prod</td>
                    <td class="wd2-5">-</td>
                    <td class="wd2-6">-</td>
                    <td class="wd2-7">-</td>
                    <td class="wd2-8">-</td>
                    <td class="wd2-9">-</td>
                    <td class="wd2-10">-</td>
                    <td class="wd2-11">-</td>
                    <td class="wd2-12"><a href="#" class="lnkicn"><img src="images/view-icon.png" width="8" height="8" /></a></td>
                  </tr>
                  <tr>
                    <td class="wd2-1">Sample Prod</td>
                    <td class="wd2-2">Near Expiry Date</td>
                    <td class="wd2-3">00MG/ ML-0ML</td>
                    <td class="wd2-4">Sample Prod</td>
                    <td class="wd2-5">-</td>
                    <td class="wd2-6">-</td>
                    <td class="wd2-7">-</td>
                    <td class="wd2-8">-</td>
                    <td class="wd2-9">-</td>
                    <td class="wd2-10">-</td>
                    <td class="wd2-11">-</td>
                    <td class="wd2-12"><a href="#" class="lnkicn"><img src="images/warning-icon.png" width="8" height="8" /></a></td>
                  </tr>
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