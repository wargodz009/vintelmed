<div class="control-group">
	<label class="control-label" for="">Hospital</label>
	<div class="controls">
		<input type="text" class="" name="hospital" value="<?=$user->hospital;?>"/>
	</div>
</div> <br/>
<div class="control-group">
	<label class="control-label" for="">hospital address</label>
	<div class="controls">
		<input type="text" class="" name="hospital_address" value="<?=$user->hospital_address;?>"/>
	</div>
</div> <br/>
<div class="control-group">
	<label class="control-label" for="">outlet</label>
	<div class="controls">
		<input type="text" class="" name="outlet" value="<?=$user->outlet;?>"/>
	</div>
</div> <br/>
<div class="control-group">
	<label class="control-label" for="">owner</label>
	<div class="controls">
		<input type="text" class="" name="owner" value="<?=$user->owner;?>"/>
	</div>
</div> <br/>
<div class="control-group">
	<label class="control-label" for="">owner_landline</label>
	<div class="controls">
		<input type="text" class="" name="owner_landline" value="<?=$user->owner_landline;?>"/>
	</div>
</div> <br/>
<div class="control-group">
	<label class="control-label" for="">owner mobile</label>
	<div class="controls">
		<input type="text" class="" name="owner_mobile" value="<?=$user->owner_mobile;?>"/>
	</div>
</div> <br/>
<div class="control-group">
	<label class="control-label" for="">recipient firstname</label>
	<div class="controls">
		<input type="text" class="" name="recipient_firstname" value="<?=$user->recipient_firstname;?>"/>
	</div>
</div> <br/>
<div class="control-group">
	<label class="control-label" for="">recipient middlename</label>
	<div class="controls">
		<input type="text" class="" name="recipient_middlename" value="<?=$user->recipient_middlename;?>"/>
	</div>
</div> <br/>
<div class="control-group">
	<label class="control-label" for="">recipient lastname</label>
	<div class="controls">
		<input type="text" class="" name="recipient_lastname" value="<?=$user->recipient_lastname;?>"/>
	</div>
</div> <br/>
<div class="control-group">
	<label class="control-label" for="">position</label>
	<div class="controls">
		<input type="text" class="" name="position" value="<?=$user->position;?>"/>
	</div>
</div> <br/>
<div class="control-group">
	<label class="control-label" for="">recipient landline</label>
	<div class="controls">
		<input type="text" class="" name="recipient_landline" value="<?=$user->recipient_landline;?>"/>
	</div>
</div> <br/>
<div class="control-group">
	<label class="control-label" for="">recipient mobile</label>
	<div class="controls">
		<input type="text" class="" name="recipient_mobile" value="<?=$user->recipient_mobile;?>"/>
	</div>
</div> <br/>
<div class="control-group">
	<label class="control-label" for="">address number</label>
	<div class="controls">
		<input type="text" class="" name="address_number" value="<?=$user->address_number;?>"/>
	</div>
</div> <br/>
<div class="control-group">
	<label class="control-label" for="">address street</label>
	<div class="controls">
		<input type="text" class="" name="address_street" value="<?=$user->address_street;?>"/>
	</div>
</div> <br/>
<div class="control-group">
	<label class="control-label" for="">address municipality</label>
	<div class="controls">
		<input type="text" class="" name="address_municipality" value="<?=$user->address_municipality;?>"/>
	</div>
</div> <br/>
<div class="control-group">
	<label class="control-label" for="">civil status</label>
	<div class="controls">
		<select name="civil_status" id="">
			<option value="single" <?=($user->civil_status == 'single'?'selected':'');?>>Single</option>
			<option value="married" <?=($user->civil_status == 'married'?'selected':'');?>>Married</option>
			<option value="widowed" <?=($user->civil_status == 'widowed'?'selected':'');?>>Widowed</option>
			<option value="separated" <?=($user->civil_status == 'separated'?'selected':'');?>>Separated</option>
		</select>
	</div>
</div> <br/>
<div class="control-group">
	<label class="control-label" for="">residence type</label>
	<div class="controls">
		<select name="residence_type" id="">
			<option value="owned" <?=($user->residence_type == 'owned'?'selected':'');?>>Owned</option>
			<option value="rented" <?=($user->residence_type == 'rented'?'selected':'');?>>Rented</option>
			<option value="living w/ relatives" <?=($user->residence_type == 'living w/ relatives'?'selected':'');?>>Living w/ Relatives</option>
			<option value="owned (mortgages)" <?=($user->residence_type == 'owned (mortgages)'?'selected':'');?>>Owned (mortgages)</option>
		</select>
	</div>
</div> <br/>
<div class="control-group">
	<label class="control-label" for="">residence years</label>
	<div class="controls">
		<input type="text" name="residence_years" value="<?=$user->residence_years;?>"/>
	</div>
</div> <br/>
<div class="control-group">
	<label class="control-label" for="">residence months</label>
	<div class="controls">
		<input type="text" name="residence_months" value="<?=$user->residence_months;?>"/>
	</div>
</div> <br/>
<div class="control-group">
	<label class="control-label" for="">home telephone</label>
	<div class="controls">
		<input type="text" name="home_telephone" value="<?=$user->home_telephone;?>"/>
	</div>
</div> <br/>
<div class="control-group">
	<label class="control-label" for="">mobile number</label>
	<div class="controls">
		<input type="text" name="mobile_number" value="<?=$user->mobile_number;?>"/>
	</div>
</div> <br/>
<div class="control-group">
	<label class="control-label" for="">spouse firstname</label>
	<div class="controls">
		<input type="text" name="spouse_firstname" value="<?=$user->spouse_firstname;?>"/>
	</div>
</div> <br/>
<div class="control-group">
	<label class="control-label" for="">spouse middlename</label>
	<div class="controls">
		<input type="text" name="spouse_middlename" value="<?=$user->spouse_middlename;?>"/>
	</div>
</div> <br/>
<div class="control-group">
	<label class="control-label" for="">spouse lastname</label>
	<div class="controls">
		<input type="text" name="spouse_lastname" value="<?=$user->spouse_lastname;?>"/>
	</div>
</div> <br/>
<div class="control-group">
	<label class="control-label" for="">spouse birthdate</label>
	<div class="controls">
		<input type="text" name="spouse_birthdate" value="<?=$user->spouse_birthdate;?>"/>
	</div>
</div> <br/>
<div class="control-group">
	<label class="control-label" for="">spouse business</label>
	<div class="controls">
		<input type="text" name="spouse_business" value="<?=$user->spouse_business;?>"/>
	</div>
</div> <br/>
<div class="control-group">
	<label class="control-label" for="">spouse business address</label>
	<div class="controls">
		<input type="text" name="spouse_business_address" value="<?=$user->spouse_business_address;?>"/>
	</div>
</div> <br/>
<div class="control-group">
	<label class="control-label" for="">spouse telephone</label>
	<div class="controls">
		<input type="text" name="spouse_telephone" value="<?=$user->spouse_telephone;?>"/>
	</div>
</div> <br/>
<div class="control-group">
	<label class="control-label" for="">spouse position</label>
	<div class="controls">
		<input type="text" name="spouse_position" value="<?=$user->spouse_position;?>"/>
	</div>
</div> <br/>
<div class="control-group">
	<label class="control-label" for="">spouse employment tenure years</label>
	<div class="controls">
		<input type="text" name="spouse_employment_tenure_years" value="<?=$user->spouse_employment_tenure_years;?>"/>
	</div>
</div> <br/>
<div class="control-group">
	<label class="control-label" for="">spouse employment tenure months</label>
	<div class="controls">
		<input type="text" name="spouse_employment_tenure_months" value="<?=$user->spouse_employment_tenure_months;?>"/>
	</div>
</div> <br/>