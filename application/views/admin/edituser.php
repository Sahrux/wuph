<?php $this->load->view('admin/include/headlbar') ?>
<?php $this->load->view('admin/include/topbar') ?>
<div class="container">
        <div class="row centered-form">
        <div class="col-md-10">
        	<div class="panel panel-default">
        		<div class="panel-heading">

			    		<h3 class="panel-title">Redaktə</h3>
			 			</div>
			 			<div class="panel-body">
			    		<form role="form" method="post" action="<?php echo base_url('Users/edituser') ?>" enctype="multipart/form-data">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">

			    					<div class="form-group">
			    						<input type="hidden" name="uid" value=" <?php echo $id; ?> ">
			                <input type="text" name="fname" id="fname" class="form-control input-sm" placeholder="First Name" value="<?php echo $fname ?>">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="lname" id="lname" class="form-control input-sm" placeholder="Last Name" value="<?php echo $lname ?>">
			    					</div>
			    				</div>
			    			</div>
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    				<div class="form-group">
			    				<input type="text" name="uname" id="uname" class="form-control input-sm" placeholder="Username"
			    				value="<?php echo $uname ?>">
			    				</div></div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    				<div class="form-group">
			    				<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email..." value="<?php echo $email ?>">
			    				</div>
			    			</div>
			    			</div>
			    			
			    			
			    			

			    			<div class="row">
			    				<div class="col-md-12">
			    					<div class="form-group">
			    						<input type="file" name="pp" id="pp" class="form-control input-sm" placeholder="Paste image url here...." value="<?=base_url()."/images/".$pp?>">
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
			    			
			    			<input type="submit" value="Tamamla" class="btn btn-info btn-block">
			    		
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>
<?php $this->load->view('admin/include/footer') ?>
