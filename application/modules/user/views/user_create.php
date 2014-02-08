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
							$others = 'class=":required" id="role_id"';
							$options = $this->role_model->get_all(0,0,true);
							$types = to_select($options,'role_name','role_id');	
							echo form_dropdown('role_id', $types,'',$others);
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
						</div>  
					</div><br/>
					<label class="control-label" for="">First name</label>
					<div class="controls">
						<input class=":required" type="text" id="" value="" name="first_name">
					</div> <br/>
					<label class="control-label" for="">Last name</label>
					<div class="controls">
						<input class=":required" type="text" id="" value="" name="last_name">
					</div> <br/>
					<label class="control-label" for="">username</label>
					<div class="controls">
						<input class=":required" type="text" id="" value="" name="username">
					</div> <br/>
					<label class="control-label" for="">Password</label>
					<div class="controls">
						<input class=":required" type="text" id="" value="" name="password">
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
		if($(this).val()== "2" || $(this).val()== "3" || $(this).val()== "5"){
			$("div#div_district_id").show();
		} else {
			$("div#div_district_id").hide();
		}
	});
});
</script>