<html>
<head>
<style type="text/css">
.strong { font-weight:bold;}
.center { text-align:center;}
.clear { clear:both; }
.red { color: #ff0000; } 
.block { display: block; } 
#si { width:825px;}
#top-space { height:36px; width:100% }
#name-date { height:45px; width:100% }
.name { float:right;width:540px;text-align:left;margin-top:22px; }
.datetime { float:right; width:130px;margin-top:18px; }
#location-si_num { height:35px; width:100%; }
.location { float:right;width:540px;text-align:left;margin-top:2px; }
.si_num { float:right; width:130px; }
#medrep{ height:35px; width:100%; }
.medrep_name { margin-left:330px;width:235px; }
#mid-space { height:40px; width:100% }
.small-space { height:17px; width:100% }
#items_p1 { width:100%;height:27px;}
#items_p1 { width:100%;height:18px;}
#items_end { width:100%;height:22px;}
.description { width:270px;display:inline-block;margin-left:60px; }
.spacer_1 { width:74px;display:inline-block;}
.lot_num { width:89px;display:inline-block;}
.expiry { width:69px;display:inline-block;}
.qty { width:64px;display:inline-block;}
.price { width:64px;display:inline-block;}
.total { width:110px;display:inline-block;}
.end_text { width:225px;display:inline-block;}
#discount { width:100%;height:22px;}
.discount_text { width:135px;float:right; }
.discount_val { width:65px;float:right; }
.discount_result { width:110px;float:right; }
#total { width:100%;}
.total_text { width:110px;margin:right:20px;float:right;}
.noPrint { width:825px; }
#printThis { width:100px;margin:0 auto; }
@media print { .noPrint { display:none; } }
</style>
</head>
<body>
	<div id="si">
		<div id="top-space">&nbsp;</div>
		<div id="name-date">
			<div class="datetime center">January 30, 2014</div>
			<div class="name strong">DR. EDMUND ARALAR</div>
		</div>
		<div id="location-si_num">
			<div class="si_num strong center">16802</div>
			<div class="location">KMIA Medical & Dental Supplies, #219 Malvar St., PTO. Princesa Palawan</div>
		</div>
		<div id="medrep">
			<div class="medrep_name center">C1/RYAN</div>
		</div>
		<div id="mid-space">&nbsp;</div>
		<div id="items_p1">
			<div class="description strong center">CLOTRIKAM-V</div>
			<div class="spacer_1">&nbsp;</div>
			<div class="lot_num">B205</div>
			<div class="expiry">9/14</div>
			<div class="qty">360</div>
			<div class="price">52</div>
			<div class="total">18,720.00</div>
		</div>
		<div id="items_p2">
			<div class="description center">Clotrimazole 100mg Pessary</div>
			<div class="spacer_1">&nbsp;</div>
			<div class="lot_num">&nbsp;</div>
			<div class="expiry">&nbsp;</div>
			<div class="qty">&nbsp;</div>
			<div class="price">&nbsp;</div>
			<div class="total">&nbsp;</div>
		</div>
		<div id="items_end">
			<div class="description">&nbsp;</div>
			<div class="spacer_1">&nbsp;</div>
			<div class="end_text strong center">*****nothing follows*****</div>
			<div class="total">&nbsp;</div>
		</div>
		<div id="mid-space">&nbsp;</div>
		<div id="discount">
			<div class="discount_result">(5,616.00)</div>
			<div class="discount_val">30%</div>
			<div class="discount_text strong">Less Dsicount</div>
		</div>
		<div class="small-space">&nbsp;</div>
		<div id="total">
			<div class="total_text strong">13,104.00</div>
		</div>
	</div>
	<div class="clear"></div>
	<div class="noPrint">
		<input class="block" type="button" id='printThis' value="PRINT" onClick="window.print();"/>
		<span class="center red block">**please set margin as none on printing options</span>
	</div>
</body>
</html>