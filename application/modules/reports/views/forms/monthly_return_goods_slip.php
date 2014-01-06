SUMMARY OF RETURNED GOODS SLIP <br>
<form action="reports/generate" method="post">
<input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id');?>">
<input type="hidden" name="report_type" value="<?php echo $report_type;?>">
From:
<input type="text" name="date_start" class=":required datepicker_from">
<br>
To:
<input type="text" name="date_end" class=":required datepicker_to">
<br>
<input type="submit" value="GENERATE">
</form>
<script type="text/javascript">
jQuery(function(){
	$('.datepicker_from').datepicker({
		changeMonth: true,
		changeYear: true,
		onClose: function( selectedDate ) {
			$( ".datepicker_to" ).datepicker( "option", "minDate", selectedDate );
		}
	});
	$( ".datepicker_to" ).datepicker({
		changeMonth: true,
		changeYear: true,
		onClose: function( selectedDate ) {
		$( ".datepicker_from" ).datepicker( "option", "maxDate", selectedDate );
		}
	});
});
</script>

