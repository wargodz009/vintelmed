<?php
$this->load->helper('form');
$this->load->helper('array');
$this->load->model('item_type/item_type_model');
?>
<div class="row">
	<div class="span8 offset2">
		<h1>Edit</h1>
		<a href="<?php echo base_url();?>items"><< Back</a>
		<div class="well">
			<form class="form-horizontal" method="post" action="<?php echo base_url().'items/edit/'.$items->item_id; ?>">
				<div class="control-group">
					<label class="control-label" for="">Product Name</label>
					<div class="controls">
						<input class=":required" type="text" id="" value="<?php echo $items->name;?>" name="name">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="">Item type</label>
					<div class="controls">
						<?php 
							$others = 'class=":required"';
							$options = $this->item_type_model->get_all(0,0,true);
							$types = to_select($options,'name','item_type_id',false);	
							echo form_dropdown('item_type_id', $types,$items->item_type_id,$others);
						?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="">Generic name</label>
					<div class="controls">
						<input class=":required" type="text" id="" value="<?php echo $items->generic_name;?>" name="generic_name">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="">Description</label>
					<div class="controls">
						<input class=":required" type="text" id="" value="<?php echo $items->description;?>" name="description">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="">Standard Price</label>
					<div class="controls">
						<input class="" type="text" id="" value="<?php echo $items->price_standard;?>" name="price_standard">
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