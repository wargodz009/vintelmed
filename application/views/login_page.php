<?php
if($this->system->is_open()) {
?>
<br/>
<form action="<?php echo base_url().'user/login'; ?>" method="post">
<label for="">Username:</label><input type="text" name="username"/>
<br/>
<label for="">Password:</label><input type="password" name="password"/>
<input type="submit" value="Login"/>
</form>
<?php
} else {
?>
<br/>
System Closed <a href="<?=base_url().'site/emergency_access';?>">Turn on system</a>
<?php
}