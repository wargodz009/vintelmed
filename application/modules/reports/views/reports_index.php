<h2>Generate Report For: </h2> <br>
<form action="" method="post">
	<select name="report_for" id="">
		<?php if($this->users->is_admin() || $this->users->is_accountant()) { ?>
		<option value="SALES_AND_COLLECTION_UPDATES">SALES & COLLECTION UPDATES</option>
		<?php } ?>
		<?php if($this->users->is_admin() || $this->users->is_accountant()) { ?>
		<option value="ACCOUNTS_RECIEVABLE">ACCOUNTS RECIEVABLE</option>
		<?php } ?>
		<?php if($this->users->is_admin() || $this->users->is_accountant()) { ?>
		<option value="STATEMENT_OF_ACCOUNT">STATEMENT OF ACCOUNT</option>
		<?php } ?>
		<?php if($this->users->is_admin() || $this->users->is_accountant()) { ?>
		<option value="STATEMENT_OF_ACCOUNTS_OF_CLIENTS_WITH_CONTRACT">STATEMENT OF ACCOUNTS OF CLIENTS WITH CONTRACT</option>
		<?php } ?>
		<?php if($this->users->is_admin() || $this->users->is_accountant()) { ?>
		<option value="PESO_QUANTITY">PESO QUANTITY</option>
		<?php } ?>
		<?php if($this->users->is_admin() || $this->users->is_warehouseman()) { ?>
		<option value="INVENTORY">INVENTORY REPORT</option>
		<?php } ?>
		<?php if($this->users->is_admin() || $this->users->is_warehouseman()) { ?>
		<option value="MONTHLY_RETURN_GOODS_SLIP">MONTHLY RETURN GOODS SLIP REPORT</option>
		<?php } ?>
		<?php if($this->users->is_admin() || $this->users->is_warehouseman()) { ?>
		<option value="NEAR_EXPIRY">NEAR EXPIRY</option>
		<?php } ?>
		<?php if($this->users->is_admin() || $this->users->is_warehouseman()) { ?>
		<option value="SUMMARY_OF_CRITICAL_STOCKS">SUMMARY OF CRITICAL STOCKS</option>
		<?php } ?>
		<?php if($this->users->is_admin() || $this->users->is_warehouseman()) { ?>
		<option value="SUMMARY_OF_EXPIRED_PRODUCTS">SUMMARY OF EXPIRED PRODUCTS</option>
		<?php } ?>
	</select>
	<input type="submit" value="CREATE">
</form>