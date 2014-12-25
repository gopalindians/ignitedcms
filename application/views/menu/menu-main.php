<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; max-width:1170px; min-height:900px;  ">
    
    <div class="row" style="margin-left:40px; margin-right:40px;">
     
          <div id="err-msg" class="alert alert-success pm-hidden" >
              
              <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i>
              </button> <i class="fa fa-ban-circle"></i>
              <?php echo('Saved...');?>
          </div>
      
    </div>

    <div class="row" style="margin-left:30px; margin-right:30px;">

      <div class="col-sm-6">
        <div class="dd" id="nestable3">
          <ol class="dd-list" id="start">
            <?php echo $html; ?>
            
          </ol>

        </div>
      </div>

      <div class="col-sm-6">
        <header class="panel-heading font-bold">Menu Options</header>
            <section class="panel">
                
                <div class="panel-body">
                            
                            <div class="btn-group">
                              
                                <button type="submit" class="btn btn-white btn-s-xs " id="pullfromdatabase"><i class="fa fa-refresh"></i> Remove and add all pages?</button>
                             
                              <button type="submit" class="btn btn-white btn-s-xs " id="savetodatabase">Save</button>
                            </div>

                       <div class="my-results"></div>
                </div>
            </section>

      </div>




    </div>
    <div class="gap"></div>
   </div> <!--end pm container -->