<div class="row">
	<div class="span8 offset2">
		<h1>Edit</h1>
		<a href="<?php echo base_url();?>setting"><< Back</a>
		<div class="well">
			<form class="form-horizontal" method="post" action="<?php echo base_url().'setting/edit/'.$setting->setting_id; ?>">
				<div class="control-group">
					<label class="control-label" for="">setting value</label>
					<?php 
					if($setting->type == 'time') {
						echo '<input class=":required time-picker" type="text" value="'.$setting->value.'" name="value" readonly>';
					} else if($setting->type == 'select') {
						echo '<select class=":required" name="value">';
						$option = explode(',',$setting->option);
						foreach($option as $k) {
							echo '<option value="'.$k.'">'.$k.'</option>';
						}
						echo '</select>';
					} else {
						echo '<input type="text" name="value" value="'.$setting->value.'" class=":required"/>';
					}
					?>
				</div>
				<div class="control-group">
					<div class="controls">
						<button type="submit" class="btn">UPDATE</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
jQuery(function(){
	$('.time-picker').timepicker({
		timeFormat: "hh:mm tt"
	});
});
</script>