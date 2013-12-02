<?=$error;?>
<?php echo form_open_multipart('orders/upload/'.$id);?>
<label for="">Short Description: </label>
<input type="text" name="description" size="20" class=":required"/> <br/>
<input type="file" name="userfile" size="20"  class=":required"/>
<input type="hidden" name="order_id" size="20" value="<?=$id;?>" />
<br /><br />
<input type="submit" value="upload" />
</form>