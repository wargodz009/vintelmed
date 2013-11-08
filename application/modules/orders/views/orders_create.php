<?php
$this->load->model('user/client_model');
?>
<div class="row">
	<div class="span8 offset2">
		<h1>Add</h1>
		<a href="<?php echo base_url();?>orders"><< Back</a>
		<div class="well">
			<form class="form-horizontal" method="post" action="">
				<div class="control-group">
					<label class="control-label" for="">SO #:</label>
					<div class="controls">
						<input class=":required" type="text" id="" value="" name="form_number">
					</div>
				</div> <br/>
				<div class="control-group">
					<label class="control-label" for="">Msr id</label>
					<div class="controls">
						<input class=":required" type="text" id="" value="<?=$this->session->userdata('user_id');?>" name="msr_id">
					</div>
				</div> <br/>
				<?php if(isset($user_id)) { ?>
				<div class="control-group">
					<label class="control-label" for="">msr client id</label>
					<div class="controls">
						<input class=":required" type="text" id="" value="<?php echo $this->client_model->get_msr_client_id($this->session->userdata('user_id'),$user_id);?>" name="msr_client_id">
					</div>
				</div> <br/>
				<?php } ?>
				<div class="control-group">
					<label class="control-label" for="">item id</label>
					<div class="controls">
						<input class=":required autocomplete_items" rel="item_name" type="text" id="items" value="" name="item_id">
					</div>
				</div>
				<div class="control-group" id="item_name"></div><br/><br/>
				<div class="control-group">
					<label class="control-label" for="">Quantity</label>
					<div class="controls">
						<input class=":required" type="text" id="quantity" value="1" name="quantity">
					</div>
				</div> <br/>
				<div class="control-group">
					<label class="control-label" for="">Unit Price</label>
					<div class="controls">
						<input class="" type="text" id="price" value="" name="price">
					</div>
				</div> <br/>
				Total Price: <div class="control-group" id="total_price"></div><br/><br/>
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
jQuery(function(){
	$(".autocomplete_items").autocomplete({
		source: "<?=base_url();?>items/search/",
		minLength: 2,
		change: function( event, ui ) {
			if(! ui.item){
				this.value = '';
			}
		},
		select: function ( event , ui ) {
			save($(this).attr('rel'),ui.item.label);
		}
	});
	function save( x , id ) {
		$('#'+x).text(id);
	}
	function compute(){
		$('#total_price').text($('#quantity').val() * $('#price').val())
	}
	$('#items').change(function() {
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>items/get_price/"+$(this).val()
		}).done(function( msg ) {
			$('#price').val(msg);
		});
	});
	$('#quantity').change(function(){
		compute();
	});
	$('#price').change(function(){
		compute();
	});
});
</script>