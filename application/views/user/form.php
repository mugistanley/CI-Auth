<div class="container" style="margin-top:12%">
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4 login">
<form method="post" class="form-signin" action="<?php echo base_url(); ?>index.php/user/init">	
<h3 class="form-signin-heading">Please login</h3>
<input type="text" name="username" class="form-control" value='<?php if (!empty($_POST['submit'])) echo set_value('username'); ?>' placeholder="username" required="" autofocus="" />
<input type="password" name="password" class="form-control" value="<?php if (!empty($_POST['submit'])) echo set_value('password'); ?>" placeholder="password" required=""/>     		  

<input type="submit" class="btn btn-lg btn-warning btn-block btn-custom" name="submit" value="Login"> 			
<div class="feedback">
<?php 
if($this->session->userdata('errors')!==null)
{
if($this->session->flashdata('errors')=='')
{
echo("<div class='alert alert-success'>"."<p align='center'>Please Login:::</p>"."<div>");
}
else
{
echo('<div class="alert alert-danger">'.$this->session->flashdata('errors').'<div>');
}
}
?>
</div>
</form>	
</div>
<div class="col-md-4"></div>
</div>
</div>