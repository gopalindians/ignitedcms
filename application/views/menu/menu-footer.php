          
    <?php $this->load->view('footer-map'); ?>
    </section>        
  </section> 
  
  </section>
    </section>
    <!-- /.vbox -->
  </section>
  <!-- jquery -->
  <script src="<?php echo(base_url()."resources") ?>/js/jquery.min.js" type="text/javascript"></script>
  <!-- Bootstrap -->
  <script src="<?php echo(base_url()."resources") ?>/js/bootstrap.js" type="text/javascript"></script>
  <!-- app -->
  <script src="<?php echo(base_url()."resources") ?>/js/app.js" type="text/javascript"></script>
  <script src="<?php echo(base_url()."resources") ?>/js/app.plugin.js" type="text/javascript"></script>
  <script src="<?php echo(base_url()."resources") ?>/js/app.data.js" type="text/javascript"></script>
  <!-- fuelux -->
  <script src="<?php echo(base_url()."resources") ?>/js/fuelux/fuelux.js" type="text/javascript"></script>
 
  <!-- Sortable -->
  <script src="<?php echo(base_url()."resources") ?>/js/sortable/jquery.sortable.js"></script>
  <script src="<?php echo(base_url()."resources") ?>/js/nestable/jquery.nestable.js" cache="false"></script>
  <script src="<?php echo(base_url()."resources") ?>/js/nestable/demo.js" cache="false"></script>


  <script type="text/javascript">
 
  /*function for the paypal reveal*/
  $(document).ready(function(event) 
  {
   

    
    

      var holder = "";

        $('#save').click(function(event){
          var mystring = $('#menuname').val();
          var urlstring = $('#menuurl').val();
          if((mystring.indexOf('|') === -1)&&(urlstring.indexOf('|') === -1))
          {
              //alert("no pipe found.");
               $(holder).find('.dd3-content').eq(0).html($('#menuname').val());
              $(holder).find('.url').eq(0).html($('#menuurl').val());
          }
          else
          {
            alert('cannont contain a | symbol!');
          }
   
        });

        $('#savetodatabase').click(function(event){
       
          var data1 = $('#start').html();
 
          $.ajax({
              type: "POST",
              url: "<?php echo site_url('menu/save_to_database'); ?>",
              data: ({'data1':data1}),
              dataType: "html",
              
              success: function(result) {
                  //alert(result);
                  $('.my-results').html(result);
              }
            });

        });

        $('#displaylist').click(function(event){
       
         
 
          $.ajax({
              type: "POST",
              url: "<?php echo site_url('menu/display_list'); ?>",
              dataType: "html",
              
              success: function(result) {
                  //alert(result);
                  $('.my-results').html(result);
              }
            });

        });

        $('#remove').click(function(event){

            $(holder).remove();
        });
        
        $('#start').on('click', '.dd-item', function (event) {

            
            holder = "#" + $(this).attr('id');

            c_content = ($(this).find('.dd3-content').html());
            u_url = ($(this).find('.url').html());
            $('#menuname').val(c_content);
            $('#menuurl').val(u_url);
            event.stopPropagation();
        });
         
        /*use date getime to generate a unique id*/
        $('#add').click(function (event) {


            $('#start').append('<li class="dd-item dd3-item" id="id'+ (new Date()).getTime() +'"><div class="dd-handle dd3-handle"></div><div class="dd3-content">Another menu item</div><div class="url" style="display:none;">another/url</div><div class="dd-edit"><i class="fa fa-pencil"></i></div></li>');
        });
  
  });

  </script>

