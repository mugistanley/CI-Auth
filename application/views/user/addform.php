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
<h3 class="formy">New User</h3>
<form method="post" data-toggle="validator" action="<?php echo base_url(); ?>index.php/user/add">
<div class="bioSection">
<div class="row">
<div class="col-md-6 form-group">
<label>
firstname
</label>
<input id='firstname' name='firstname' type='text' value='<?php if (!empty($_POST['submit'])) echo set_value('firstname'); ?>' maxlength='20' class="form-control" placeholder="firstname" required />
</div>
</div>
<div class="row">
<div class="col-md-6 form-group">
<label>
lastname
</label>
<input id='lastname' name='lastname' type='text' value='<?php if (!empty($_POST['submit'])) echo set_value('lastname'); ?>' maxlength='20' class="form-control" placeholder="lastname" required />
</div>
</div>
<div class="row">
<div class="col-md-6 form-group">
<label>
Date of birth:
</label>
<input id='dob' name='dob' type='text' value='<?php if (!empty($_POST['submit'])) echo set_value('dob'); ?>' maxlength='20' class="form-control dater" placeholder="dob" required />
</div>
<div class="col-md-6 form-group">
<label>
gender
</label><br>
<select name='gender' class="form-control">
<option value="m">male</option>
<option value="f">female</option>
</select>
</div>
</div>
<div class="row">
<div class="col-md-6 form-group">
<label>
1st phone number
</label>
<input id='phonenumber' name='phonenumber' type='text' value='<?php if (!empty($_POST['submit'])) echo set_value('phonenumber'); ?>' maxlength='20' class="form-control" placeholder="phonenumber" required />
</div>
<div class="col-md-6 form-group">
<label>
2nd phone number
</label>
<input id='phonenumberB' name='phonenumberB' type='text' value='<?php if (!empty($_POST['submit'])) echo set_value('phonenumberB'); ?>' maxlength='20' class="form-control" placeholder="phonenumberB" required />
</div>
</div>
<div class="row">
<div class="col-md-6 form-group">
<label>
company
</label>
<input id='company' name='company' type='text' value='<?php if (!empty($_POST['submit'])) echo set_value('company'); ?>' maxlength='20' class="form-control" placeholder="company" required />
</div>
</div>
<div class="row">
<div class="col-md-6 form-group">
<label>
email
</label>
<input id='email' name='email' type='text' value='<?php if (!empty($_POST['submit'])) echo set_value('email'); ?>' maxlength='20' class="form-control" placeholder="email" />
</div>
</div>
<div class="row">
<div class="col-md-3 form-group">
<label>
country
</label>
<input id='country' name='country' type='text' value='<?php if (!empty($_POST['submit'])) echo set_value('country'); ?>' maxlength='20' class="form-control" placeholder="country" required />
</div>
<div class="col-md-3 form-group">
<label>
city
</label>
<input id='city' name='city' type='text' value='<?php if (!empty($_POST['submit'])) echo set_value('city'); ?>' maxlength='20' class="form-control" placeholder="city" required />
</div>
<div class="col-md-3 form-group">
<label>
road
</label>
<input id='road' name='road' type='text' value='<?php if (!empty($_POST['submit'])) echo set_value('road'); ?>' maxlength='20' class="form-control" placeholder="road" required />
</div>
<div class="col-md-3 form-group">
<label>
plot number
</label>
<input id='plotNumber' name='plotNumber' type='text' value='<?php if (!empty($_POST['submit'])) echo set_value('plotNumber'); ?>' maxlength='20' class="form-control" placeholder="plot number" required />
</div>
</div>
</div>
<hr>
<div class="userSection">
<div class="row">
<div class="col-md-6 form-group">
<div id='usernameCont'>
<label>
username
</label>
<input id='username' name='username' type='text' value='<?php if (!empty($_POST['submit'])) echo set_value('username'); ?>' maxlength='20' class="form-control" placeholder="username" required />
</div>
</div>
<div class="col-md-6 form-group">
<div id='passwordCont'>
<label>
password
</label>
<input id='password' name='password' type='password' value='<?php if (!empty($_POST['submit'])) echo set_value('password'); ?>' maxlength='20' class="form-control" placeholder="password" required />
</div>
</div>
</div>
<div class="row">
<div class="col-md-6 form-group">
<div id="roleCont">
<label>
role:
</label>
<select name='role' class="form-control" required>
<option value="">-- select --</option>
<option value="2">technical</option>
<option value="3">officer</option>
<option value="4">client</option>
</select>
</div>
</div>
<div class="col-md-6 form-group">
<div id='passwordCont'>
<label>
Repeat password
</label>
<input id='confirmPassword' name='confirmPassword' type='password' value='<?php if (!empty($_POST['submit'])) echo set_value('confirmPassword'); ?>' maxlength='20' class="form-control" placeholder="password" required />
</div>
</div>
</div>
</div>
<div class="assignSection">
<div class="row">
<div class="col-md-6 form-group">
<label>
assign device
</label>
<input id="deviceId" name="deviceId" class="form-control typeahead" />
</div>
</div>
</div>
<br>
<input name="targetDevice" type="hidden" id="targetDevice" />
<input type="submit" name="submit" id='submit' class='btn btn-custom' value="Create User" >
</form>
</div>
</div>