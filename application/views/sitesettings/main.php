<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; max-width:1170px;  min-height:700px;">
	<div class="row" style="margin-left:40px; margin-right:40px;">
		<?php if($this->session->flashdata('msg')) {?>
		            
		    <?php if($this->session->flashdata('type') =='0') { ?>
		
		    <div class="alert alert-danger">
		
		    <?php } else {?>
		    <div class="animated fadeOut alert alert-success">
		        <?php } ?>
		        <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i>
		        </button> <i class="fa fa-ban-circle"></i>
		        <?php echo $this->session->flashdata('msg');?>
		    </div>
		<?php } ?>
	</div>
	<div class="row" style="margin-left:30px; margin-right:30px;">
	<div class="col-sm-12">
	    <header class="panel-heading font-bold">Site Settings</header>
	    <section class="panel">
	        
	        <div class="panel-body">
	        	<?php $atts= array( 'data-validate'=>'parsley'); echo form_open_multipart('dashboard/save_site_settings',$atts); ?>
	        	
	        	<div class="form-group">
	        	    <label>Site name</label>
	        	    <input name="site" type="text" data-required="true" data-maxlength="50" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="Site name" value="">
	        	</div>
	        	<div class="form-group">
                              
                    <label class="control-label">Upload Site Logo:</label>
                   
                  
                    <input type="file" name="userfile" size="20" data-toggle="tooltip" data-placement="bottom" title="Please make sure your Site logo is 200px wide" />
                  </div>
                
                <button type="submit" class="btn btn-purplet btn-s-xs " id="">Save</button>
                <?php echo form_close(); ?>
	        </div>
	    </section>
	</div>
	</div>
</div>