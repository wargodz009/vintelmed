<div class="row">
	<div class="span8 offset2">
		<h1>Add Payment</h1>
		<div class="well">
			<form class="form-horizontal" method="post" action="">
				<a href="" class='add'>[+] Add Field</a> <br/>
				<div class="control-group" id='so_field'>
					<div class="fields">
						<label class="control-label" for="">so #:</label>
						<div class="controls">
							<input class=":required" type="text" id="" value="" name="so_number[]">
						</div> <br/>
						<label class="control-label" for="">Amount:</label>
						<div class="controls">
							<input class=":required" type="text" id="" value="" name="solo_amount[]">
						</div> <br/>
						<label class="control-label" for="">Invoice #:</label>
						<div class="controls">
							<input class=":required" type="text" id="" value="" name="invoice_id[]">
						</div>
					</div>
				</div>
				<div id="more_fields">
				</div> <br/>
				<div class="control-group">
					<label class="control-label" for="">Bank</label>
					<div class="controls">
						<input class="" type="text" id="" value="" name="bank">
					</div>
				</div> <br/>
				<div class="control-group">
					<label class="control-label" for="">Check Number</label>
					<div class="controls">
						<input class="" type="text" id="" value="" name="check_number">
					</div>
				</div> <br/>
				<div class="control-group">
					<label class="control-label" for="">Check Full Amount</label>
					<div class="controls">
						<input class="" type="text" id="" value="" name="check_full_amount">
					</div>
				</div> <br/>
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
	$(".add").on( "click", function(e) {
		e.preventDefault();
		$("#more_fields").append($('#so_field').clone().html() + ' <a href="" class="del">[-] Remove</a> <br/>');
	});
	$(document).on( "click",'.del', function(e) {
		e.preventDefault();
		$(this).prev('.fields').remove();
		$(this).remove();
	});
});
</script>