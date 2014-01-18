<?php
$this->load->model('role/role_model');
$this->load->model('district/district_model');
?>
<div class="row">
	<div class="span8 offset2">
		<h1>View Profile</h1>
		<div class="well">
			<?php
				echo "<div class='user_item'>User: {$user->username}</div> <br />";
				echo "<div class='user_item'>Name: {$user->first_name}, {$user->last_name}</div> <br />";
				echo "<div class='user_item'>Email: {$user->email}</div> <br />";
				echo "<div class='user_item'>Role: {$this->role_model->get_single($user->role_id,false,'role_name')}</div> <br />";
				echo "<div class='user_item'>District: {$this->district_model->get_single($user->district_id,'name')}</div> <br />";
				if($user->role_id == 2) {
					echo "<div class='user_item'>Hospital: {$user->hospital}</div> <br />";
					echo "<div class='user_item'>Hospital Address: {$user->hospital_address}</div> <br />";
					echo "<div class='user_item'>Outlet: {$user->outlet}</div> <br />";
					echo "<div class='user_item'>Outlet Address: {$user->outlet_address}</div> <br />";
					echo "<div class='user_item'>Owner: {$user->owner}</div> <br />";
					echo "<div class='user_item'>Landline #: {$user->owner_landline}</div> <br />";
					echo "<div class='user_item'>Mobile #: {$user->owner_mobile}</div> <br />";
					echo "<div class='user_item'>Recipient: {$user->recipient_firstname} {$user->recipient_middlename} {$user->recipient_lastname}</div> <br />";
					echo "<div class='user_item'>Position: {$user->position}</div> <br />";					
					echo "<div class='user_item'>Recipient Landline #: {$user->recipient_landline}</div> <br />";					
					echo "<div class='user_item'>Recipient Mobile #: {$user->recipient_mobile}</div> <br />";					
					echo "<div class='user_item'>Address: {$user->address_number} {$user->address_street} {$user->address_municipality} </div> <br />";			
					echo "<div class='user_item'>Civil Status: {$user->civil_status}</div> <br />";							
					echo "<div class='user_item'>Residence Type: {$user->residence_type}</div> <br />";							
					echo "<div class='user_item'>Residence Length: {$user->residence_years}/years,{$user->residence_months}/months</div> <br />";
					echo "<div class='user_item'>Home Phone #: {$user->home_telephone}</div> <br />";
					echo "<div class='user_item'>Home Mobile #: {$user->mobile_number}</div> <br />";
					echo "<div class='user_item'>Spouse Name: {$user->spouse_firstname} {$user->spouse_middlename} {$user->spouse_lastname} </div> <br />";
					echo "<div class='user_item'>Spouse Birthdate: {$user->spouse_birthdate}</div> <br />";
					echo "<div class='user_item'>Spouse Business: {$user->spouse_business}</div> <br />";
					echo "<div class='user_item'>Spouse Business Address: {$user->spouse_business_address}</div> <br />";
					echo "<div class='user_item'>Position: {$user->spouse_position}</div> <br />";
					echo "<div class='user_item'>Spouse Phone #: {$user->spouse_telephone}</div> <br />";
					echo "<div class='user_item'>Employment Length: {$user->spouse_employment_tenure_years}/years {$user->spouse_employment_tenure_months}/months</div> <br />";
				}
			?>
		</div>
	</div>
</div>