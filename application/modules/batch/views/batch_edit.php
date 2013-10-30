<div class="row">
	<div class="span8 offset2">
		<h1>Edit</h1>
		<a href="<?php echo base_url();?>batch"><< Back</a>
		<div class="well">
			<form class="form-horizontal" method="post" action="<?php echo base_url().'batch/edit/'.$batch->item_batch_id; ?>">
				<div class="control-group">
					<label class="control-label" for="">batch name</label>
					<div class="controls">
						<input class=":required" type="text" id="" value="<?php echo $batch->batch_id;?>" name="batch_id">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="">item count</label>
					<div class="controls">
						<input class=":required" type="text" id="" value="<?php echo $batch->item_count;?>" name="item_count">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="">expiry date</label>
					<div class="controls">
						<input class=":required" type="text" id="" value="<?php echo $batch->expire;?>" name="expire">
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