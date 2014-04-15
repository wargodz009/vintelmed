<?php
$this->load->model('user/user_model');
$this->load->model('items/items_model');
$this->load->model('orders/orders_model');
$this->load->model('user/client_model');
$this->load->model('batch/batch_model');
?>
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
			<div class="datetime center"><?=date("F d, Y",strtotime($orders->datetime));?></div>
			<div class="name strong"><?=get_name($this->client_model->get_user_id_by_client_msr_id($orders->msr_client_id));?></div>
		</div>
		<div id="location-si_num">
			<div class="si_num strong center"><?=$orders->form_number;?></div>
			<div class="location"><?=$this->user_model->get_single($this->client_model->get_user_id_by_client_msr_id($orders->msr_client_id),false,'address_number').' '.$this->user_model->get_single($this->client_model->get_user_id_by_client_msr_id($orders->msr_client_id),false,'address_street').' '.$this->user_model->get_single($this->client_model->get_user_id_by_client_msr_id($orders->msr_client_id),false,'address_municipality');?></div>
		</div>
		<div id="medrep">
			<div class="medrep_name center"><?=get_name($orders->msr_id);?></div>
		</div>
		<div id="mid-space">&nbsp;</div>
		<?php 
		$all = 0;
		foreach($order_details as $items) {
		?>
		<div id="items_p1">
			<div class="description strong center"><?=get_item($orders->item_id,false);?></div>
			<div class="spacer_1">&nbsp;</div>
			<div class="lot_num"><?=$this->batch_model->get_single($items->item_batch_id,'lot_number');?></div>
			<div class="expiry"><?=date("m/y",strtotime($this->batch_model->get_single($items->item_batch_id,'expire')));?></div>
			<div class="qty"><?=$orders->quantity;?></div>
			<div class="price"><?=$orders->price;?></div>
			<div class="total"><?php $total = $orders->quantity * $orders->price; echo $total; $all = $all + $total; ?></div>
		</div>
		<div id="items_p2">
			<div class="description center"><?=$this->items_model->get_single($orders->item_id,'description');?></div>
			<div class="spacer_1">&nbsp;</div>
			<div class="lot_num">&nbsp;</div>
			<div class="expiry">&nbsp;</div>
			<div class="qty">&nbsp;</div>
			<div class="price">&nbsp;</div>
			<div class="total">&nbsp;</div>
		</div>
		<?php } ?>
		<div id="items_end">
			<div class="description">&nbsp;</div>
			<div class="spacer_1">&nbsp;</div>
			<div class="end_text strong center">*****nothing follows*****</div>
			<div class="total">&nbsp;</div>
		</div>
		<div id="mid-space">&nbsp;</div>
		<div id="discount">
			<div class="discount_result">(<?=$all;?>)</div>
			<div class="discount_val">(<?=$orders->discount;?>%)</div>
			<div class="discount_text strong">Less Dsicount</div>
		</div>
		<div class="small-space">&nbsp;</div>
		<div id="total">
			<div class="total_text strong"><?=($all - ($all * $orders->discount / 100));?></div>
		</div>
	</div>
	<div class="clear"></div>
	<div class="noPrint">
		<input class="block" type="button" id='printThis' value="PRINT" onClick="window.print();"/>
		<span class="center red block">**please set margin as none on printing options</span>
	</div>
</body>
</html>