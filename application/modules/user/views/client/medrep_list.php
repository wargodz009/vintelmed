<?php
if(isset($medreps) && !empty($medreps)) {
	echo '<span>This user has '.count($medreps).' medrep(s) assigned.</span>';
	echo '<table class="gridtable">
		<thead>
			<th>User</th>
			<th>Action</th>
		</thead>
		<tbody>';
	foreach($medreps as $medrep) {
		echo '<tr>
			<td>'.get_name($medrep->msr_id).'</td>
			<td><a href="'.base_url().'orders/create/'.$medrep->msr_id.'/'.$client_id.'">ADD ORDER</a></td>
		</tr>';
	}
	echo '</tbody>
	</table>';
} else {
	echo 'No Medrep assigned to this client.';
}