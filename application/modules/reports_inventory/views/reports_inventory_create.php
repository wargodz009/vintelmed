<div class="row">
	<div class="span8 offset2">
		<h1>Add</h1>
		<a href="<?php echo base_url();?>reports_inventory"><< Back</a>
		<div class="well">
			<form class="form-horizontal" method="post" action="">
				<div class="control-group">
					<label class="control-label" for="">Report type</label>
					<div class="controls">
						<select name="report_type" id="" class=":required">
							<option value="INVENTORY_OF_NEAR_EXPIRY_PRODUCTS">Inventory of Near Expiry Products</option>
							<option value="SUMMARY_OF_CRITICAL_STOCKS">Summary of Critical Stocks</option>
							<option value="SUMMARY_OF_RETURNED_GOODS_SLIP">Summary of Returned Goods Slip</option>
							<option value="WEEKLY_INVENTORY_REPORT_ORALS">Weekly Inventory Report-Orals</option>
							<option value="WEEKLY_INVENTORY_REPORT_VIALS">Weekly Inventory Report-Vials</option>
						</select>
						<input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>"/>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<button type="submit" class="btn">GENERATE</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>