<?php $this->load->view('temptop_open'); ?>
<?php $this->load->view('css'); ?>
<?php $this->load->view('temptop_close'); ?>
<?php $this->load->view('topmenu'); ?>
<div class="wrapper">
<!-- Sidebar Holder -->
<nav id="sidebar">
<div class="sidebar-header">
<h3>Users</h3>
</div>

<div class="scrollbar">
<div class="force-overflow">
<div class="main">

<div class="table table-responsive">									
<table id="contentTable" class="table table-striped table-bordered table-custom">
<thead>
<tr>
<th>Username</th>
<th>Company</th>
<th>Assigned</th>
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
<td><input name="dbContent" type="hidden" id="dbContent" value="<?php echo $users[$i]->username;?>"><span id="e_content"><?php echo($users[$i]->company); ?></span></td>
<td><?php echo($assigned[$i]); ?></td>
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


</div>
</div>
</div>
</nav>

<!-- Page Content Holder -->
<div id="content">
<div class="container">
<?php $this->load->view('user/addform'); ?>
</div>
</div>
</div>
<?php $this->load->view('jscore'); ?>
<?php $this->load->view('datatablesjs'); ?>
<?php $this->load->view('datepicker'); ?>
<?php $this->load->view('devicesearch'); ?>
<?php $this->load->view('sidebar'); ?>
<?php $this->load->view('defaultmap'); ?>
<?php $this->load->view('tempbottom'); ?>