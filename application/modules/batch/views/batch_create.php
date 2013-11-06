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
						<input class=":required autocomplete_items" rel="item_name" type="text" id="items" value="" name="item_id">
					</div>
				</div>
				<div class="control-group" id="item_name"></div><br/><br/>
				<div class="control-group">
					<label class="control-label" for="">Supplier id</label>
					<div class="controls">
						<input class=":required autocomplete_suppliers" rel="supplier_name" type="text" id="supplier" value="" name="supplier_id">
					</div>
				</div>
				<div class="control-group" id="supplier_name"></div><br/><br/>
				<div class="control-group">
					<label class="control-label" for="">recieve date</label>
					<div class="controls">
						<input class=":required datepicker_from" type="text" id="" value="" name="recieve_date" readonly>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="">expiry date</label>
					<div class="controls">
						<input class=":required datepicker_to" type="text" id="" value="" name="expire" readonly>
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
	$(".autocomplete_suppliers").autocomplete({
		source: "<?=base_url();?>supplier/search/",
		minLength: 2,
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