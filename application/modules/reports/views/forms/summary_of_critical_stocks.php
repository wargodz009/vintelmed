SUMMARY OF CRITICAL STOCKS <br>
<form action="reports/generate" method="post">
<input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id');?>">
<input type="hidden" name="report_type" value="<?php echo $report_type;?>">
For: <input type="text" name="date_start" class=":required datepicker_from">
<br>
<input type="submit" value="GENERATE">
</form>
<script type="text/javascript">
jQuery(function(){
	$('.datepicker_from').datepicker({
		changeMonth: true,
		changeYear: true
	});
});
</script>