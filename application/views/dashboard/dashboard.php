<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; max-width:1170px; min-height:800px; ">
  <div class="row" style="margin-left:30px; margin-right:30px;">
        <div class="col-sm-12">
            <header class="panel-heading font-bold">Pages</header>
            <section class="panel">
                
                <div class="panel-body">
                    <div class="row">

                    <?php //foreach ($query->result() as $row ):?>
                    <div class="line"></div>
                    <div class="col-sm-2">
                        <img src="<?php echo base_url('img/Folder.png'); ?>" alt="" />
                        
                    </div>
                    <div class="col-sm-6" style="margin-top:30px;">
                        <strong><?php echo('Page 1'); ?></strong>
                    </div>
                    <div class="col-sm-4" style="margin-top:30px;">
                        <div class="pull-right"> <?php echo anchor("#", 'View/Edit', 'attributs'); ?></div>
                    </div>
                    <div class="clearfix"></div>
                   
                   <?php //endforeach; ?>
               </div>
                </div>
            </section>
        </div>
        

        
    
  </div>
</div>