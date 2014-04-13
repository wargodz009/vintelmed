<?php
$this->load->helper('form');
$this->load->helper('array');
$this->load->model('district/district_model');
$this->load->model('role/role_model');
?>
<div class="row">
	<div class="span8 offset2">
		<h1>Edit</h1>
		<a href="<?php echo base_url();?>user"><< Back</a>
		<div class="well">
			<form class="form-horizontal" method="post" action="<?php echo base_url().'user/edit/'.$user->user_id; ?>">
				<?php if($this->users->is_admin()) { ?>
				<div class="control-group">
					<label class="control-label" for="">Role</label>
					<div class="controls">
						<?php
							$others = 'class=":required" id="role_id"';
							$options = $this->role_model->get_all(0,0,true);
							$types = to_select($options,'role_name','role_id');	
							echo form_dropdown('role_id', $types,$user->role_id,$others);
						?>
					</div>
				</div> <br/>
				<?php } ?>
				<div class="control-group">
					<label class="control-label" for="">First name</label>
					<div class="controls">
						<input class=":required" type="text" id="" value="<?php echo $user->first_name;?>" name="first_name">
					</div>
				</div> <br/>
				<div class="control-group">
					<label class="control-label" for="">Last name</label>
					<div class="controls">
						<input class=":required" type="text" id="" value="<?php echo $user->last_name;?>" name="last_name">
					</div>
				</div> <br/>
				<div class="control-group">
					<label class="control-label" for="">E-mail</label>
					<div class="controls">
						<input class=":required :email" type="text" id="" value="<?php echo $user->email;?>" name="email">
					</div>
				</div> <br/>
				<?php
					if($this->users->is_client($user->role_id)) {
						$this->load->view('user/client_profile_edit');
					}
				?>
				<?php if(in_array($user->role_id,array(2,3,5))) {  ?>
				<div class="controls" id="div_district_id">
					<label class="control-label" for="">District</label>
					<div class="controls">
					<?php
						$others = 'class=":required" id="district_id"';
						$options = $this->district_model->get_all(0,0,true);
						$types = to_select($options,'name','district_id',false);	
						echo form_dropdown('district_id', $types,$user->district_id,$others);
					?>
					</div>
				</div><br/>
				<label class="control-label" for="">Area</label>
				<div class="controls">
					<input class="" type="text" id="" value="<?php echo $user->area;?>" name="area">
				</div> <br/>
				<?php } ?>
				<?php if($user->role_id == 3) { ?>
				<label class="control-label" for="">Quota</label>
				<div class="controls">
					<input class="" type="text" id="" value="<?php echo $user->quota;?>" name="quota">
				</div> <br/>
				<?php } ?>
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