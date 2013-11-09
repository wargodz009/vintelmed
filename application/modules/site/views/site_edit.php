<div class="row">
	<div class="span8 offset2">
		<h1>Edit</h1>
		<a href="<?php echo base_url();?>site"><< Back</a>
		<div class="well">
			<form class="form-horizontal" method="post" action="<?php echo base_url().'site/edit/'.$site->site_id; ?>">
				<div class="control-group">
					<label class="control-label" for="">site value</label>
					<div class="controls">
						<input class=":required" type="text" id="" value="<?php echo $site->name;?>" name="name">
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