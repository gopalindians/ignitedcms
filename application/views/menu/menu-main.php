<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; max-width:1170px; min-height:900px;  ">
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
                
                            <?php echo anchor('menu/pull_all_pages', 'pull all pages', 'attributs'); ?>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger btn-s-xs " id="remove"> <i class="fa fa-minus"></i> Remove</button>
                            </div>
                             <div class="form-group">
                                <button type="submit" class="btn btn-purplet btn-s-xs "  id="savetodatabase"> Save to database</button>
                            </div>
                            <button type="submit" class="btn btn-purplet btn-s-xs " id="displaylist">Display list</button>
                            

                       <div class="my-results"></div>
                </div>
            </section>

      </div>




    </div>
    <div class="gap"></div>
   </div> <!--end pm container -->