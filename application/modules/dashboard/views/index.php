<?php 
if(isset($pre_approval)) {
	if(count($pre_approval)>0) {
		echo '<div class="ui-widget">
			<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
				<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
				<a href="'.base_url().'orders/pre">You have <strong>'.count($pre_approval).' new</strong> orders that needs approval!</a></p>
			</div>
		</div>';
	}
}
if(isset($post_approval)) {
	if(count($post_approval)>0) {
		echo '<div class="ui-widget">
			<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
				<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
				<a href="'.base_url().'orders/post">You have <strong>'.count($post_approval).' completed</strong> orders that needs approval!</a></p>
			</div>
		</div>';
	}
}
?>