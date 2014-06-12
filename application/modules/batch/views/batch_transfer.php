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
						<input class=":required" type="text" id="" value="" name="batch_id"> Original batch name: <?=$batch->batch_id; ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="">Status</label>
					<div class="controls">
						<input type="text" name='status' value="transfer"/>
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
				</div><br/>
				<div class="control-group" id="lot_number"></div><br/><br/>
				<div class="control-group">
					<label class="control-label" for="">Lot Number</label>
					<div class="controls">
						<input class="" type="text" id="" value="<?=$batch->lot_number; ?>" name="lot_number">
					</div>
				</div>
				<div class="control-group" id=""></div><br/><br/>
				<div class="control-group">
					<label class="control-label" for="">on Cavite Warehouse</label>
					<div class="controls">
						<input class="" type="checkbox" id="" value="1" name="cavite_warehouse" <?=($batch->cavite_warehouse == 1?"checked":""); ?>>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="">expiry date</label>
					<div class="controls">
						<input class="datepicker_to" type="text" id="" value="<?=system_date($batch->expire); ?>" name="expire" placeholder="mm-dd-yyyy" readonly>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="">Sell Price</label>
					<div class="controls">
						<input class="" type="text" id="" value="<?=$batch->sell_price; ?>" name="sell_price">
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