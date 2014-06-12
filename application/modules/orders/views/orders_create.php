<?php
$this->load->model('user/client_model');
?>
<form class="form-horizontal" method="post" action="">
	<div class="row">
		<a href="<?php echo base_url();?>orders"><< Back</a>
		<div class="clear">&nbsp;</div>
		<div class="span4 offset2 left half">
			<div class="well">
				<div class="control-group">
					<label class="control-label" for="">SO #:</label>
					<div class="controls">
						<input class=":required" type="text" id="" value="" name="form_number">
						<input class=":required" type="hidden" id="" value="<?=$msr_id;?>" name="msr_id">
						<?php if(isset($client_id)) { ?>
							<input class=":required" type="hidden" id="" value="<?php echo $this->client_model->get_msr_client_id($msr_id,$client_id);?>" name="msr_client_id">
						<?php } ?>
					</div>
				</div> <br/>
				<div class="control-group">
					<div class="controls">

					</div>
				</div> <br/>
				<div class="control-group">
					<label class="control-label" for="">item</label>
					<div class="controls">
						<input class=":required autocomplete_items" rel="item_name" type="text" id="items" value="" name="item_id">
					</div>
				</div>
				<div class="control-group" id="item_name"></div>
				<div class="control-group">
					<label class="control-label" for="">Quantity</label>
					<div class="controls">
						<input class=":required" type="text" id="quantity" value="1" name="quantity">
					</div>
				</div> <br/>
				<br/><br/>
				<div class="control-group">
					<label class="control-label" for="">free item</label>
					<div class="controls">
						<input class=":required autocomplete_free_items" rel="free_item" type="text" id="free_item_name" value="" name="free_item">
					</div>
				</div>
				<div class="control-group" id="free_item"></div>
				<div class="control-group">
					<label class="control-label" for="">Quantity</label>
					<div class="controls">
						<input class="" type="text" id="quantity_free" value="1" name="quantity">
					</div>
				</div> <br/>
				<br/><br/>
				<div class="control-group">
					<label class="control-label" for="">Unit Price</label>
					<div class="controls">
						<input class="" type="text" id="price" value="" name="price">
					</div>
				</div> <br/>
				<div class="control-group">
					<label class="control-label" for="">Discount:</label>
					<div class="controls">
						<input type="text" id="discount" value="0" class=":number" name="discount"> %
					</div>
				</div> <br/>
				Total Price: <span class="control-group" id="total_price"></span><br/><br/>
				<div class="control-group">
					<div class="controls">
						
					</div>
				</div>
			</div>
		</div>
		<div class="span4 left half h200px">
			Inventory Items <br/>
			<div id="item_list" class="list"></div>
		</div>
		<div class="span4 left half h20px">
			Free items Items <br/>
			<div id="free_item_list" class="list"></div>
		</div>
		<div class="clear">
			<button type="submit" class="btn save_btn">SAVE</button>
		</div>
	</div>
</form>
<script type="text/javascript">
jQuery(function(){
	$('.save_btn').attr('disabled',true);
	$(document.body).on('click', '.close', function() {
		$('#item_name').hide();
		$('.autocomplete_items').show();
		$('#item_list').text('');
		$('#items').val('');
		$('.save_btn').attr('disabled',true);
	});
	$(document.body).on('click', '.close_free', function() {
		$('#item_name_free').hide();
		$('.autocomplete_free_items').show();
		$('#free_item_list').text('');
		$('#free_item').text('');
		$('#free_item_name').val('');
	});
	$(document.body).on('change', '.check_empty', function() {
		if($(this).val() != '') {
			$(this).parent().find('input:checkbox:first').prop('checked', true);
		} else {
			$(this).parent().find('input:checkbox:first').prop('checked', false);
		}
	});
	$(".autocomplete_items").autocomplete({
		source: "<?=base_url();?>items/search/",
		minLength: 1,
		select: function ( event , ui ) {
			if(! ui.item){
				this.value = '';
			} else {
				save($(this).attr('rel'),ui.item.label);
				$(this).hide();
				$('#item_name').show().append(' &nbsp;<span class="close">-Remove</span>');
				$.getJSON('<?php echo base_url();?>batch/list_all/'+ui.item.value+'/true', function(data){
					if(data.length != 0 || data == '') {
						$('#item_list').html('Stock: <br />');
						$.each(data, function(k,v) {
							$('#item_list').append('<div><input type="checkbox" name="batch_id[]" value="'+v.item_batch_id+'" onclick="return false;" onkeydown="return false;" /> '+v.item_name+' ('+v.name+') <br/> <input type="text" name="batch-'+v.item_batch_id+'" value="" placeholder="Quantity" sold="'+v.sold_count+'" count="'+v.item_count+'" class="check_empty" />('+v.sold_count+'/'+v.item_count+')</div><br/>-------------------------------------------<br/>');
						});
						$('.save_btn').attr('disabled',false);
					}
				}).fail(function() {
					$('#item_list').text('Out of Stock');
					$('.save_btn').attr('disabled',true);
				});
			}
		}
	});
	$(".autocomplete_free_items").autocomplete({
		source: "<?=base_url();?>items/search/",
		minLength: 1,
		select: function ( event , ui ) {
			if(! ui.item){
				this.value = '';
			} else {
				save($(this).attr('rel'),ui.item.label);
				$(this).hide();
				$('#free_item').show().append(' &nbsp;<span class="close_free">-Remove</span>');
				$.getJSON('<?php echo base_url();?>batch/list_all/'+ui.item.value+'/true', function(data){
					if(data.length != 0 || data == '') {
						$('#free_item_list').html('Stock: <br />');
						$.each(data, function(k,v) {
							$('#free_item_list').append('<div><input type="checkbox" name="free_id[]" value="'+v.item_batch_id+'" onclick="return false;" onkeydown="return false;" /> '+v.item_name+' ('+v.name+') <br/> <input type="text" name="free-'+v.item_batch_id+'" value="" placeholder="Quantity" sold="'+v.sold_count+'" count="'+v.item_count+'" class="check_empty" />('+v.sold_count+'/'+v.item_count+')</div><br/>-------------------------------------------<br/>');
						});
						$('.save_btn').attr('disabled',false);
					}
				}).fail(function() {
					$('#free_item_list').text('Out of Stock');
					$('.save_btn').attr('disabled',true);
				});
			}
		}
	});
	function save( x , id ) {
		$('#'+x).text(id);
	}
	function compute(){
		var total = $('#quantity').val() * $('#price').val();
		if($('#discount').val() != 0) {
			$('#total_price').text(total - (total * $('#discount').val() / 100) );
		} else {
			$('#total_price').text(total);
		}
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
	$('#discount').change(function(){
		compute();
	});
});
</script>