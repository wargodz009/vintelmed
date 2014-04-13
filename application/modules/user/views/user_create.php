<?php
$this->load->helper('form');
$this->load->helper('array');
$this->load->model('role/role_model');
$this->load->model('district/district_model');
?>
<div class="row">
	<div class="span8 offset2">
		<h1>Add</h1>
		<a href="<?php echo base_url();?>user"><< Back</a>
		<div class="well">
			<form class="form-horizontal" method="post" action="">
				<div class="control-group">
					<label class="control-label" for="">Role</label>
					<div class="controls">
						<?php
							if($this->users->is_admin() || $this->users->is_hrd()) {
								$others = 'class=":required" id="role_id"';
								$options = $this->role_model->get_all(0,0,true);
								$types = to_select($options,'role_name','role_id');	
								echo form_dropdown('role_id', $types,'',$others);
							} else if($this->users->is_accountant()) {
								?>
									<select name="role_id" id="role_id" class=":required" >
										<option value="">--</option>
										<option value="2">Client</option>
										<option value="3">Medical Representative</option>
									</select>
								<?php
							}
						?>
					</div> <br/>
					<div class="controls" id="div_district_id" style="display:none;">
						<label class="control-label" for="">District</label>
						<div class="controls">
						<?php
							$others = 'id="district_id"';
							$options = $this->district_model->get_all(0,0,true);
							$types = to_select($options,'name','district_id',false);	
							echo form_dropdown('district_id', $types,'',$others);
						?>
						</div><br/>
					<label class="control-label" for="">Area</label>
					<div class="controls">
						<input class="" type="text" id="" value="" name="area">
					</div> <br/>
					</div><br/>
					<label class="control-label" for="">First name/Hospital Name</label>
					<div class="controls">
						<input class=":required" type="text" id="" value="" name="first_name">
					</div> <br/>
					<label class="control-label" for="">Last name</label>
					<div class="controls">
						<input class="" type="text" id="" value="" name="last_name">
					</div> <br/>
					<div id="quota">
					</div> <br/>					
					<div id="logins">
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<button type="submit" class="btn">SAVE</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
$(function(){
	$('#role_id').change(function(){
		if($(this).val()== "2" || $(this).val()== "3") {
			$("div#quota").html('<label class="control-label" for="">Quota</label><div class="controls"><input class="" type="text" id="" value="" name="quota"></div><br/>');
			$("div#div_district_id").show();
			$("div#logins").html('');
		} else if($(this).val()== "3") {
			$("div#div_district_id").show();
			$("div#logins").html('');
			$("div#quota").html('');
		} else {
			$("div#div_district_id").hide();
			$("div#quota").html('');
			$("div#logins").html('<label class="control-label" for="">username</label><div class="controls"><input class=":required" type="text" id="" value="" name="username">	</div> <br/><label class="control-label" for="">Password</label><div class="controls"><input class=":required" type="text" id="" value="" name="password"></div>');
		}
	});
});
</script>