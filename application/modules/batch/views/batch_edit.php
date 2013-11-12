<?php
$this->load->model('supplier/supplier_model');
$this->load->model('items/items_model');
?>
<div class="row">
	<div class="span8 offset2">
		<h1>Edit</h1>
		<a href="<?php echo base_url();?>batch"><< Back</a>
		<div class="well">
			<form class="form-horizontal" method="post" action="<?php echo base_url().'batch/edit/'.$batch->item_batch_id; ?>">
				<div class="control-group">
					<label class="control-label" for="">batch name</label>
					<div class="controls">
						<input class=":required" type="text" id="" value="<?=$batch->batch_id; ?>" name="batch_id">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="">Status</label>
					<div class="controls">
						<select name="status" id="">
							<option value="ordered" <?=($batch->status == 'ordered'?'selected':''); ?>>Ordered</option>
							<option value="recieved" <?=($batch->status == 'recieved'?'selected':''); ?> >Recieved</option>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="">item count</label>
					<div class="controls">
						<input class=":required" type="text" id="" value="<?=$batch->item_count; ?>" name="item_count">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="">item id</label>
					<div class="controls">
						<input class=":required autocomplete_items" rel="item_name" type="text" id="items" value="<?=$batch->item_id; ?>" name="item_id">
					</div>
				</div>
				<div class="control-group" id="item_name">
				<?php 
				$item = $this->items_model->get_single($batch->item_id);
				echo $item->name;
				?>
				</div><br/><br/>
				<div class="control-group">
					<label class="control-label" for="">Supplier id</label>
					<div class="controls">
						<input class=":required autocomplete_suppliers" rel="supplier_name" type="text" id="supplier" value="<?=$batch->supplier_id; ?>" name="supplier_id">
					</div>
				</div>
				<div class="control-group" id="supplier_name">
				<?php 
				$item = $this->supplier_model->get_single($batch->supplier_id);
				echo $item->name;
				?>
				</div><br/><br/>
				<div class="control-group">
					<label class="control-label" for="">recieve date</label>
					<div class="controls">
						<input class="datepicker_from" type="text" id="" value="<?=$batch->recieve_date; ?>" name="recieve_date" readonly>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="">expiry date</label>
					<div class="controls">
						<input class="datepicker_to" type="text" id="" value="<?=$batch->expire; ?>" name="expire" readonly>
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
<script type="text/javascript">
jQuery(function(){
	 function log( message ) {
		$( "<div>" ).text( message ).prependTo( "#log" );
		$( "#log" ).scrollTop( 0 );
		}
	$('.datepicker_from').datepicker({
		changeMonth: true,
		changeYear: true,
		onClose: function( selectedDate ) {
			$( ".datepicker_to" ).datepicker( "option", "minDate", selectedDate );
		}
	});
	$( ".datepicker_to" ).datepicker({
		changeMonth: true,
		changeYear: true,
		onClose: function( selectedDate ) {
		$( ".datepicker_from" ).datepicker( "option", "maxDate", selectedDate );
		}
	});
	$(".autocomplete_items").autocomplete({
		source: "<?=base_url();?>items/search/",
		minLength: 1,
		change: function( event, ui ) {
			if(! ui.item){
				this.value = '';
			}
		},
		select: function ( event , ui ) {
			save($(this).attr('rel'),ui.item.label);
		}
	});
	$(".autocomplete_suppliers").autocomplete({
		source: "<?=base_url();?>supplier/search/",
		minLength: 1,
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
});
</script>