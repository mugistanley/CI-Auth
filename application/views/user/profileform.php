<div class="formBase">
<?php 
if(!empty($_POST['submit']))
{
	if(isset($errors) && count($errors)>0)
	{
		foreach($errors as $error)
		{
		  $messageStart = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Error!</strong> ';
		$messageEnd= '</div>';
		echo($messageStart.$error.$messageEnd);	
		}
	} 
}
?>
<div class="formPos col-md-8">
<div id="messageNotify" class="notify">
<div id="currentMessage">
<div id="fdBack"></div>
<?php 
if (!empty($_POST['submit']))
{
	if(validation_errors()!=NULL)
	{
		echo('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Error!</strong>');
		echo validation_errors();
		echo("</div>");
	} 	
}
?>	
</div>
</div>
</div>
<div class="formPos col-md-8">
<h3 class="formy">Edit profile</h3>
<form method="post" data-toggle="validator" action="<?php echo base_url(); ?>index.php/main/updateProfile">
<input type="hidden" name="id" value="<?php echo($profileDetails[0]->id); ?>" />
<div class="row">
<div class="col-md-6 form-group">
<label>
firstname
</label>
<input id='firstname' name='firstname' type='text' maxlength='20' class="form-control" value="<?php echo($profileDetails[0]->firstname); ?>" placeholder="firstname" required />
</div>
</div>
<div class="row">
<div class="col-md-6 form-group">
<label>
lastname
</label>
<input id='lastname' name='lastname' type='text' value="<?php echo($profileDetails[0]->lastname); ?>" maxlength='20' class="form-control" placeholder="lastname" required />
</div>
</div>
<div class="row">
<div class="col-md-6 form-group">
<label>
Date of birth:
</label>
<input id='dob' name='dob' type='text' value="<?php echo($profileDetails[0]->dob); ?>" maxlength='20' class="form-control dater" placeholder="dob" required />
</div>
<div class="col-md-6 form-group">
<label>
gender
</label><br>
<select name='gender' class="form-control">
<option value="m" <?php if($profileDetails[0]->gender=='m'){echo('selected');}?>>male</option>
<option value="f" <?php if($profileDetails[0]->gender=='f'){echo('selected');}?>>female</option>
</select>
</div>
</div>
<div class="row">
<div class="col-md-6 form-group">
<label>
1st phone number
</label>
<input id='phonenumber' name='phonenumber' type='text' value='<?php echo($profileDetails[0]->phonenumber); ?>' maxlength='20' class="form-control" placeholder="phonenumber" required />
</div>
<div class="col-md-6 form-group">
<label>
2nd phone number
</label>
<input id='phonenumberB' name='phonenumberB' type='text' value='<?php echo($profileDetails[0]->phonenumberB); ?>' maxlength='20' class="form-control" placeholder="phonenumberB" required />
</div>
</div>
<div class="row">
<div class="col-md-6 form-group">
<label>
company
</label>
<input id='company' name='company' type='text' value='<?php echo($profileDetails[0]->company); ?>' maxlength='20' class="form-control" placeholder="company" required />
</div>
</div>
<div class="row">
<div class="col-md-6 form-group">
<label>
email
</label>
<input id='email' name='email' type='text' value="<?php echo($profileDetails[0]->email); ?>" maxlength='20' class="form-control" placeholder="email" />
</div>
</div>
<div class="row">
<div class="col-md-3 form-group">
<label>
country
</label>
<input id='country' name='country' type='text' value='<?php echo($profileDetails[0]->country); ?>' maxlength='20' class="form-control" placeholder="country" required />
</div>
<div class="col-md-3 form-group">
<label>
city
</label>
<input id='city' name='city' type='text' value='<?php echo($profileDetails[0]->city); ?>' maxlength='20' class="form-control" placeholder="city" required />
</div>
<div class="col-md-3 form-group">
<label>
road
</label>
<input id='road' name='road' type='text' value='<?php echo($profileDetails[0]->road); ?>' maxlength='20' class="form-control" placeholder="road" required />
</div>
<div class="col-md-3 form-group">
<label>
plot number
</label>
<input id='plotNumber' name='plotNumber' type='text' value='<?php echo($profileDetails[0]->plotNumber); ?>' maxlength='20' class="form-control" placeholder="plot number" required />
</div>
</div>
<input type="submit" name="submit" id='submit' class='btn btn-custom' value="Update profile" >
</form>
</div>
</div>