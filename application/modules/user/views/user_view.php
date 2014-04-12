<?php
$this->load->model('role/role_model');
$this->load->model('district/district_model');
?>
<div class="row">
	<div class="span8 offset2">
		<span class='title'>View User</span> <?=($user->role_id == 2?'<a href="'.base_url().'user/client/medreps/'.$user->user_id.'" class="button">ADD ORDER</a>':'') ?>
		<div class="well">
			<br/>
			<?php
				echo "<div class='user_item'><span class='title'>User:</span> {$user->username}</div>";
				echo "<div class='user_item'><span class='title'>Name:</span> {$user->first_name}, {$user->last_name}</div>";
				echo "<div class='user_item'><span class='title'>Email:</span> {$user->email}</div>";
				echo "<div class='user_item'><span class='title'>Role:</span> {$this->role_model->get_single($user->role_id,false,'role_name')}</div>";
				echo "<div class='user_item'><span class='title'>District:</span> {$this->district_model->get_single($user->district_id,'name')}</div>";
				if($user->role_id == 2) {
					echo "<div class='user_item'><span class='title'>Hospital:</span> {$user->hospital}</div>";
					echo "<div class='user_item'><span class='title'>Hospital Address:</span> {$user->hospital_address}</div>";
					echo "<div class='user_item'><span class='title'>Outlet:</span> {$user->outlet}</div>";
					echo "<div class='user_item'><span class='title'>Outlet Address:</span> {$user->outlet_address}</div>";
					echo "<div class='user_item'><span class='title'>Owner:</span> {$user->owner}</div>";
					echo "<div class='user_item'><span class='title'>Landline #:</span> {$user->owner_landline}</div>";
					echo "<div class='user_item'><span class='title'>Mobile #:</span> {$user->owner_mobile}</div>";
					echo "<div class='user_item'><span class='title'>Recipient:</span> {$user->recipient_firstname} {$user->recipient_middlename} {$user->recipient_lastname}</div>";
					echo "<div class='user_item'><span class='title'>Position:</span> {$user->position}</div>";					
					echo "<div class='user_item'><span class='title'>Recipient Landline #:</span> {$user->recipient_landline}</div>";					
					echo "<div class='user_item'><span class='title'>Recipient Mobile #:</span> {$user->recipient_mobile}</div>";					
					echo "<div class='user_item'><span class='title'>Address:</span> {$user->address_number} {$user->address_street} {$user->address_municipality} </div>";			
					echo "<div class='user_item'><span class='title'>Civil Status:</span> {$user->civil_status}</div>";							
					echo "<div class='user_item'><span class='title'>Residence Type:</span> {$user->residence_type}</div>";							
					echo "<div class='user_item'><span class='title'>Residence Length:</span> {$user->residence_years}/years,{$user->residence_months}/months</div>";
					echo "<div class='user_item'><span class='title'>Home Phone #:</span> {$user->home_telephone}</div>";
					echo "<div class='user_item'><span class='title'>Home Mobile #:</span> {$user->mobile_number}</div>";
					echo "<div class='user_item'><span class='title'>Spouse Name:</span> {$user->spouse_firstname} {$user->spouse_middlename} {$user->spouse_lastname} </div>";
					echo "<div class='user_item'><span class='title'>Spouse Birthdate:</span> {$user->spouse_birthdate}</div>";
					echo "<div class='user_item'><span class='title'>Spouse Business:</span> {$user->spouse_business}</div>";
					echo "<div class='user_item'><span class='title'>Spouse Business Address:</span> {$user->spouse_business_address}</div>";
					echo "<div class='user_item'><span class='title'>Position:</span> {$user->spouse_position}</div>";
					echo "<div class='user_item'><span class='title'>Spouse Phone #:</span> {$user->spouse_telephone}</div>";
					echo "<div class='user_item'><span class='title'>Employment Length:</span> {$user->spouse_employment_tenure_years}/years {$user->spouse_employment_tenure_months}/months</div>";
				}
			?>
		</div>
	</div>
</div>