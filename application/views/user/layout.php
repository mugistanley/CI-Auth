<div class="wrapper">
	<!-- Sidebar Holder -->
	<nav id="sidebar">
		<div class="sidebar-header">
			<h3>Users</h3>
		</div>

		<div class="scrollbar">
			<div class="force-overflow">
										<div class="main">
											<h4>Search</h4>
																		<p></p>
							<!-- Actual search box -->
							<div class="form-group has-feedback has-search">
								<span class="glyphicon glyphicon-calendar form-control-feedback"></span>
								<input id="searchDate" type="text" class="form-control" placeholder="Find by date">
							</div>
							<!-- Actual search box -->
							<div class="form-group has-feedback has-search">
								<span class="glyphicon glyphicon-search form-control-feedback"></span>
								<input type="text" class="form-control" placeholder="Find by asset">
							</div>
						</div>
			</div>
		</div>
	</nav>
<!-- Page Content Holder -->
<div id="content">
<div class="container">
<div class="row">
<div class="col-md-8">
<h3>Users</h3>	
<div class="table table-responsive">									
<table id="example" class="table table-striped table-bordered table-custom">
<thead>
<tr>
<th>Type</th>
<th>Value</th>
<th>Activate</th>
<th>Delete</th>
</tr>
</thead>
<tbody>
<?php
if (count($users) > 0) 
{
 for($i=0; $i<count($users);$i++) 
 {
?>
	<tr class="pos<?php echo($users[$i]->id); ?>">
		<td><input name="dbHeading" type="hidden" id="dbHeading" value="<?php echo $users[$i]->username;?>"><span id="e_heading"><?php echo($users[$i]->username); ?></span></td>
		<td><input name="dbContent" type="hidden" id="dbContent" value="<?php echo $users[$i]->username;?>"><span id="e_content"><?php echo($users[$i]->username); ?></span></td>
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
