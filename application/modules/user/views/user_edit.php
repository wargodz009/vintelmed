<div class="row">
	<div class="span8 offset2">
		<h1>Edit</h1>
		<a href="<?php echo base_url();?>user"><< Back</a>
		<div class="well">
			<form class="form-horizontal" method="post" action="<?php echo base_url().'user/edit/'.$user->user_id; ?>">
				<div class="control-group">
					<label class="control-label" for="">user value</label>
					<div class="controls">
						<input class=":required" type="password" id="" value="<?php echo $user->username;?>" name="username">
					</div>
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