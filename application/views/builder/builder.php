
<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; max-width:1170px; min-height:900px;  ">

    <div class="row" style="margin-left:30px; margin-right:30px; display:none;" id="assets" >
        <div class="col-sm-12">
            <header class="panel-heading ">
                <div class="inline font-bold">Asset Managment</div>
                <div class="close btn" id="asset-close">&times;</div>
            </header>
            <section class="panel">
                <div class="panel-body"> 
                    <div class="gallery" style="position:relative;">

                        

                        <div class="table-responsive">
                          <table class="table b-t text-sm">
                            <thead>
                              <tr>
                                
                              </tr>
                            </thead>
                            <tbody>
                              
                                <?php 
                                     $count = -1; 
                                     foreach ($query2->result() as $row): 
                                     $count = $count + 1; 
                                     if($count % 6 == 0) {
                                 ?>
                                 </tr>
                                 <tr>
                                <?php } ?>

                              
                                    <td style="vertical-align:middle; position:relative; background-color:#f3f3f3;"> <img class="img-responsive" src="<?php echo base_url("img/uploads/$row->name"); ?>" alt="image" />

                                    <div class="box" >
                                      <div class="ig-click" id="<?php echo $row->id; ?>" style="cursor:pointer;">
                                        add
                                      </div>
                                        <!-- <label >
                                            <input type="checkbox" name="" value="<?php echo $row->id; ?>" style="position:absolute; bottom:0px;"/>
                                        </label> -->
                                    </div>
                                    </td>

                                    
                                  <?php endforeach; ?>

                            </tbody>
                          </table>
                        </div>
                        <!-- end table div -->
    
                    </div>
                    <div class="clearfix"></div>

                    <div class="form-group">
 
                      
                    </div>
                    <button type="submit" class="btn btn-purplet btn-s-xs " id="insert">insert</button>
                   
                </div>
            </section>
        </div>
    </div>

<div class="row" style="margin-left:30px; margin-right:30px;" >

    <div class="col-sm-12">
         <div class="btn-group">
            <button type="submit" class="btn btn-white btn-s-xs " id="add-block">Add Block</button>
       
            <button type="submit" class="btn btn-white btn-s-xs " id="add-image">Add Image</button>

            
        </div>
        
        <div class="panel-body">
          <a target="_blank" href=" <?php echo site_url("shortcodes/preview_page/$id"); ?>">Preview Page</a>
           
        </div>
    </div>


    <div id="sortable">

    	<?php echo $content; ?>
 
        
    </div>

<div class="clearfix"></div>
</div>
<div class="row" style="margin-left:30px; margin-right:30px;">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-purplet btn-s-xs " id="save-db">Save to database!</button>
    </div>
</div>
<div class="gap"></div>



</div>

