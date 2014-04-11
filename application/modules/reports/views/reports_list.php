<div class="row">
	<div class="span12">
		<div class="well">
			<table class="gridtable">
				<thead>
					<tr>
						<th>Report type</th>
						<th>User</th>
						<th>Date</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$this->load->model('user/user_model');
				if(isset($all_reports) && !empty($all_reports)) {
					foreach($all_reports as $k) {
						echo '<tr>
							<td><a target="_new" href="'.base_url().'reports/view/'.$k->report_id.'">'.$k->report_type.'</a></td>
							<td>'.$this->user_model->get_single($k->user_id,false,'username').'</td>
							<td><span class="date">'.date("M d, Y",strtotime($k->datetime)).'</span></td>
							<td>VIEW | PRINT</td>
						</tr>';
					}
				} else {
					echo '<tr>
						<td>No Reports!</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>';
				}
				?>
				</tbody>
			</table>
			<div class="pagination">
            <?php
                echo $this->pagination->create_links();
            ?>
			</div>
		</div>			
	</div>			
</div>