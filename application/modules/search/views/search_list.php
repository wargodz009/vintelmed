<?php
$this->load->model('role/role_model');
if(isset($all_users) && !empty($all_users) || isset($all_items) && !empty($all_items)) {
	echo 'Showing search result for: '.$term.'<hr />';
} else {
	echo 'no search result for: '.$term.'<hr />Please try another term';
}
echo '<div class="inline">';
if(isset($all_users) && !empty($all_users)) {
	echo '<div class="half left">
		<table class="gridtable">
			<thead>
				<th>User</th>
				<th>Type</th>
			</thead>
			<tbody>';
		foreach($all_users as $user) {
			echo '<tr>
				<td>'.get_name($user->user_id).'</td>
				<td>'.$this->role_model->get_single($user->role_id,false,'role_name').'</td>
			</tr>';
		}
		echo '</tbody>
		</table>
	</div>';
}

if(isset($all_items) && !empty($all_items)) {
	echo '<div class="half right">
	<table class="gridtable">
		<thead>
			<th>Items</th>
		</thead>
		<tbody>';
	foreach($all_items as $item) {
		echo '<tr>
			<td>'.get_item($item->item_id).'</td>
		</tr>';
	}
	echo '</tbody>
	</table>
	</div>';
}
echo '</div>';