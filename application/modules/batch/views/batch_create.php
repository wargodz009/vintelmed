<div class="row">
	<div class="span8 offset2">
		<h1>Add</h1>
		<a href="<?php echo base_url();?>batch"><< Back</a>
		<div class="well">
			<form class="form-horizontal" method="post" action="">
				<div class="control-group">
					<label class="control-label" for="">batch name</label>
					<div class="controls">
						<input class=":required" type="text" id="" value="" name="batch_id">
						<input class=":required" type="hidden" id="" value="<?php echo $this->session->userdata('user_id'); ?>" name="user_id">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="">Status</label>
					<div class="controls">
						<select name="status" id="">
							<option value="ordered">Ordered</option>
							<option value="recieved">Recieved</option>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="">item count</label>
					<div class="controls">
						<input class=":required :number" type="text" id="" value="" name="item_count">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="">item id</label>
					<div class="controls">
						<input class=":required autocomplete_items" rel="item_name" type="text" id="items" value="<?php echo (isset($item_id)?$item_id:''); ?>" name="item_id" <?php echo (isset($item_id)?'readonly':''); ?>>
					</div>
				</div>
				<div class="control-group" id="item_name"><?php if(isset($item_id)) {
					$this->load->model('items/items_model');
					echo $this->items_model->get_single($item_id,'name').' '.$this->items_model->get_single($item_id,'description');
				} ?></div><br/><br/>
				<div class="control-group">
					<label class="control-label" for="">Supplier id</label>
					<div class="controls">
						<input class=":required autocomplete_suppliers" rel="supplier_name" type="text" id="supplier" value="" name="supplier_id">
					</div>
				</div>
				<div class="control-group" id="lot_number"></div><br/><br/>
				<div class="control-group">
					<label class="control-label" for="">Lot Number</label>
					<div class="controls">
						<input class="" type="text" id="" value="" name="lot_number">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="">on Cavite Warehouse</label>
					<div class="controls">
						<input class="" type="checkbox" id="" value="1" name="cavite_warehouse">
					</div>
				</div>
				<div class="control-group" id="supplier_name"></div><br/><br/>
				<div class="control-group">
					<label class="control-label" for="">recieve date</label>
					<div class="controls">
						<input class="datepicker_from" type="text" id="" value="" name="recieve_date" readonly>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="">expiry date</label>
					<div class="controls">
						<input class="datepicker_to" type="text" id="" value="" name="expire" readonly>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<button type="submit" class="btn">SAVE</button>
					</div>
				</div>
				<div id="log"></div>
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
			if(! ui.item) {
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