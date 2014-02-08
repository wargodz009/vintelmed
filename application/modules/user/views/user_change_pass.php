<?php
$this->load->helper('form');
$this->load->helper('array');
$this->load->model('district/district_model');
?>
<div class="row">
	<div class="span8 offset2">
		<h1>Change Password</h1>
		<a href="<?php echo base_url();?>user"><< Back</a>
		<div class="well">
			<form class="form-horizontal" method="post" action="<?php echo base_url().'user/change_pass'; ?>">
				<div class="control-group">
					<label class="control-label" for="">New Password</label>
					<div class="controls">
						<input class=":required" type="password" id="new_password" value="" name="new_password">
					</div>
				</div> <br/>
				<div class="control-group">
					<label class="control-label" for="">Re-type New Password</label>
					<div class="controls">
						<input class=":required :same_as;new_password" type="password" id="" value="" name="re_new_password">
					</div>
				</div> <br/>
				<div class="control-group">
					<label class="control-label" for="">Old Password</label>
					<div class="controls">
						<input class=":required" type="password" id="" value="" name="old_password">
					</div>
				</div> <br/>
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
$(function(){
	$('#role_id').change(function(){
		if($(this).val()== "2" || $(this).val()== "3" || $(this).val()== "5"){
			$("div#div_district_id").show();
		} else {
			$("div#div_district_id").hide();
		}
	});
});
</script>