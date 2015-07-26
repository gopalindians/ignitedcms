<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; min-height:800px; ">
	
		<div class="row" style="margin-left:30px; margin-right:30px;">
		      <div class="col-sm-12">
				<?php if($this->session->flashdata('msg')) {?>
				            
				    <?php if($this->session->flashdata('type') =='0') { ?>
				
				    <div class="alert alert-danger">
				
				    <?php } else {?>
				    <div class="alert alert-success">
				        <?php } ?>
				        <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i>
				        </button> <i class="fa fa-ban-circle"></i>
				        <?php echo $this->session->flashdata('msg');?>
				    </div>
				<?php } ?>
			</div>
		</div>



		<!-- breadcrumb -->
		   <div class="row" style="margin-left:30px; margin-right:30px;">
		      <div class="col-sm-12">
		        <!-- .breadcrumb -->
		        <ul class="breadcrumb">
		          <li><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-home"></i> <?php echo "Dashboard"; ?></a></li>
		          <li class='active'><a href="#"><i class="fa fa-list-ul"></i> <?php echo('My Profile');?></a></li>
		          
		        </ul>
		              
		        </div>
		    </div> 
		    <!-- end breadcrumb -->

		    <div class="row" style="margin-left:30px; margin-right:30px;">
		    	<div class="col-sm-12">
		    		<?php $atts= array( 'data-validate'=>'parsley'); echo form_open_multipart('profile/save_profile',$atts); ?>
		    		
				    <header class="panel-heading"> <div class="inline font-bold">Profile</div>
				    	<div class="pull-right btn btn-sm  btn-info btn-rounded" data-toggle="popover" data-html="true" data-placement="bottom" data-content="Fill in your profile details here." title="" data-original-title='<button type="button" class="close pull-right" data-dismiss="popover">&times;</button>Info'> <i class="fa fa-question"></i> <strong></strong> 
				    	                </div>

				    </header>
				    <section class="panel">
				        
				        <?php foreach ($query->result() as $row) { ?>
				        	
				       
				        <div class="panel-body">
				        	<div class="form-group">
				        	    <label>Full Name</label>
				        	    <input name="fullname" type="text"  data-maxlength="50" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="Full Name" value="<?php echo $row->fullname; ?>">
				        	</div>
				        	<div class="form-group">
				        	    <label>Email</label>
				        	    <input name="email" type="text" data-type="email"  data-maxlength="100" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="Email" value="<?php echo $row->email; ?>">
				        	</div>

				        	<div class="form-group">
				        	    <label>Change Password?</label>
				        	    <input name="password" type="text"  data-maxlength="200" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="Change your Password" value="">
				        	</div>
				        	<button type="submit" class="btn btn-purplet btn-s-xs " ><strong>ok</strong></button>

				        	<?php } ?>
				        	
				        	<?php echo form_close(); ?>

				        </div>
				    </section>
				</div>
		    </div>
		
		
	
</div>