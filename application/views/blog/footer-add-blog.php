     
   <?php $this->load->view('footer-map');?>
    </section>        
  </section> 
  
  </section>
    </section>
    <!-- /.vbox -->
  </section>
  <script src="<?php echo(base_url()."resources") ?>/js/jquery.min.js" type="text/javascript"></script>
  <!-- Bootstrap -->
  <script src="<?php echo(base_url()."resources") ?>/js/bootstrap.js" type="text/javascript"></script>
  <!-- app -->
  <script src="<?php echo(base_url()."resources") ?>/js/app.js" type="text/javascript"></script>
  <script src="<?php echo(base_url()."resources") ?>/js/app.plugin.js" type="text/javascript"></script>
  <script src="<?php echo(base_url()."resources") ?>/js/app.data.js" type="text/javascript"></script>
  <!-- fuelux -->
  <script src="<?php echo(base_url()."resources") ?>/js/fuelux/fuelux.js" type="text/javascript"></script>
  
  <!-- parsley -->
  <script src="<?php echo(base_url()."resources") ?>/js/parsley/parsley.min.js" type="text/javascript"></script>
  <script src="<?php echo(base_url()."resources") ?>/js/parsley/parsley.extend.js" type="text/javascript"></script>
 
  <!-- wysiwyg -->
  <script src="<?php echo(base_url()."resources") ?>/js/wysiwyg/jquery.hotkeys.js" type="text/javascript"></script>
  <script src="<?php echo(base_url()."resources") ?>/js/wysiwyg/bootstrap-wysiwyg.js" type="text/javascript" ></script>
  <script src="<?php echo(base_url()."resources") ?>/js/wysiwyg/demo.js" type="text/javascript"></script>
  <!-- markdown -->
 



  <script type="text/javascript">

    


    $("#blog_form").submit(function(event) 
    {
      
        if ($('#blog_form').parsley( 'validate' ) == true)
        {
            
           

            var content   = $("#editor").html();
            $('#dummy').val(content);


            var form = new FormData(document.getElementById('upload_file'));
             //append files
             var file = document.getElementById('userfile').files[0];
              if (file) {   
                  form.append('userfile', file);
              }

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('blog/actual_insert_blog_post'); ?>",
                data: file,
                
                
                contentType: false, //must, tell jQuery not to process the data
                processData: false, //must, tell jQuery not to set contentType
                success: function(msg) 
                {
                    
                   
                }

            });
            
            event.preventDefault();
        }
     });
    </script>

