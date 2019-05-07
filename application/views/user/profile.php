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
											<h4>Search</h4>
																		<p></p>
							<!-- Actual search box -->
							<div class="form-group has-feedback has-search">
								<span class="glyphicon glyphicon-calendar form-control-feedback"></span>
								<input id="searchDate" type="text" class="form-control dater" placeholder="Find by date">
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
<?php $this->load->view('user/profileform'); ?>
       </div>
	</div>
</div>
<?php $this->load->view('jscore'); ?>
<?php $this->load->view('datepicker'); ?>
<?php $this->load->view('sidebar'); ?>
<?php $this->load->view('defaultmap'); ?>
<?php $this->load->view('tempbottom'); ?>