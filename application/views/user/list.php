<?php $this->load->view('temptop_open'); ?>
<?php $this->load->view('css'); ?>
<link rel="stylesheet" href="<?php echo(CSS.'dataTables.bootstrap.min.css'); ?>" type="text/css" />
<?php $this->load->view('temptop_close'); ?>
<?php $this->load->view('topmenu'); ?>
<div class="wrapper">
	<!-- Sidebar Holder -->

<!-- Page Content Holder -->
<div id="content">
<div class="container">
<div class="row">
<div class="col-md-12">
<h3>Users</h3>
<p><a id="buttonEdit"  href="<?php echo site_url('user/add')?>" class="btn btn-info">Add User</a></p>	
<input type="hidden" id="targetDevice" />
<div class="table table-responsive">									
<table id="example" class="table table-striped table-bordered table-custom">
<thead>
<tr>
<th>Username</th>
<th>Role</th>
<th>Assign</th>
<th>Change password</th>
<th>Activate</th>
<th>Delete</th>
</tr>
</thead>
<tbody>
<?php
if ($users!=0) 
{
 $role = '';
 for($i=0; $i<count($users);$i++) 
 {
   if($users[$i]->role=='2')
   {
     $role = 'technical';
   }
   if($users[$i]->role=='3')
   {
     $role = 'officer';
   }
   if($users[$i]->role=='4')
   {
     $role = 'client';
   }
?>
	<tr class="pos<?php echo($users[$i]->id); ?>">
		<td><input name="dbHeading" type="hidden" id="dbHeading" value="<?php echo $users[$i]->username;?>"><span id="e_heading"><?php echo($users[$i]->username); ?></span></td>
		<td><input name="dbContent" type="hidden" id="dbContent" value="<?php echo $users[$i]->username;?>"><span id="e_content"><?php echo($role); ?></span></td>
        <td class="deviceModify">
        <input name="id" type="hidden" id="userId" class='submit' value="<?php echo $users[$i]->id;?>">
        <input id="deviceId" name="deviceId" class="form-control typeahead" />
        <a href="<?php echo $users[$i]->status;?>" class="btn btn-success deviceChange">Go</a>
        </td>
        <td class="passwordModify">
        <input name="id" type="hidden" id="userId" class='submit' value="<?php echo $users[$i]->id;?>">
        <input type="password" name="newPassword" class="form-control newPassword" />
        <a href="#" style="margin-top:-20px" class="btn btn-success changePassword">Go</a>
        </td>
		   <td class="statusModify"><input name="id" type="hidden" id="captionId" class='submit' value="<?php echo $users[$i]->id;?>"><a id="buttonEdit" href="<?php echo $users[$i]->status;?>" class="btn <?php if($users[$i]->status=='0'){?> btn-warning <?php }else{ ?> btn-info <?php } ?>"><?php if($users[$i]->status=='0'){?> inactivate <?php }else{ ?> active <?php } ?></a>
			</td>
            <td class="userModify" style="width:20px !important"><input name="id" type="hidden" id="userId" class='submit' value="<?php echo $users[$i]->id;?>"><a id="buttonEdit"  href="#" class="btn btn-danger">Delete</a>
			</td>
	</tr>
<?php 
 }
} 
else 
{
	echo("<h2>No Users at the moment!</h2>");
}
?>
</tbody>
</table>
	</div>
<!-- The Modal -->
<div id="modalEdit" class="modal fade modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 id="myModalLabel">Update Contact</h3>
      </div>
      <div class="modal-body">
        <form class="form-horizontal col-sm-12">
          <div class="form-group">
						<label>Heading</label>
						<input class="form-control required" id="heading" placeholder="Heading" readonly="readonly">
					</div>
					<div class="form-group">
						<label>Content</label>
					<input id="content" name="content" type="text" class="form-control required" placeholder="Value">
					</div>      
          <div class="form-group">
						<button type="button" class="btn btn-success pull-right modifyComplete">Modify</button>
					</div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php $this->load->view('jscore'); ?>
<?php $this->load->view('datatablesjs'); ?>
<script type="text/javascript" src="<?php echo(JS.'bootstrap3-typeahead.min.js'); ?>"></script>
<?php $this->load->view('jspagefunctions'); ?>
<?php $this->load->view('datepicker'); ?>
<?php $this->load->view('sidebar'); ?>
<?php $this->load->view('userjsfunctions'); ?>
<?php $this->load->view('tempbottom'); ?>

