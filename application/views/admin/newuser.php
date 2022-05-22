<?php $this->load->view('admin/include/headlbar') ?>
<?php $this->load->view('admin/include/topbar') ?>
<div class="container">
        <div class="row centered-form">
        <div class="col-md-10">
        <div class="panel panel-default">
        <div class="panel-heading">
	<h3 class="panel-title">Please sign up for Bootsnipp <small>It's free!</small></h3>
	</div>
	<div class="panel-body">
	<form role="form" method="post" action="<?php echo base_url('Admin/addnewuser') ?>" enctype="multipart/form-data">
		<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6">
		<div class="form-group">
			<input type="text" name="fname" id="fname" class="form-control input-sm" placeholder="First Name">
		</div>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6">
	    	<div class="form-group">
	 	<input type="text" name="lname" id="lname" class="form-control input-sm" placeholder="Last Name">
		</div>
		</div>
		</div>
		<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6">
		<div class="form-group">
		<input type="text" name="uname" id="uname" class="form-control input-sm" placeholder="Username">
		</div></div>
		<div class="col-xs-6 col-sm-6 col-md-6">
		<div class="form-group">
		<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email...">
		</div>
		</div>
		</div>
			    			
			    			
			    			

		<div class="row">
		<div class="col-md-12">
		<div class="form-group">
		<input type="file" name="pp" id="pp" class="form-control input-sm" placeholder="Paste image url here....">
		</div>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6">		
		<div class="form-group">
		<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
		</div>
		</div><div class="col-xs-6 col-sm-6 col-md-6">		
		<div class="form-group">
		<input type="password" name="password2" id="password2" class="form-control input-sm" placeholder="Confirm Password">
		</div>
		</div>
		</div>
			    			
		<input type="submit" value="Register" class="btn btn-info btn-block">
			    		
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>
<?php $this->load->view('admin/include/footer') ?>
