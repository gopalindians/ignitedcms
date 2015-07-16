
<!-- .vbox -->
<section id="content">
  <section class="vbox">
   

  <div class="head-outer">
      
        <?php $logo = my_show_logo(); ?>
        <a href="#"><img src="<?php echo base_url("img/uploads/$logo"); ?>" class="img-responsive my-center visible-xs" style="position:relative; margin-top:0px;"></a>

        <div class="head" id="tidy">
        <div class="logo visible-lg visible-md">

          <a href="#"><img src="<?php echo base_url("img/uploads/$logo"); ?>" class="img-responsive my-center" style="position:relative; "></a>
        </div>

      

        
          <nav>
          <?php echo $menu; ?>

          <div class="clear-fix"></div>

          <div class="small-menu" style="float:right; position:relative;">
            <select onchange="location = this.options[this.selectedIndex].value;">
                <option selected="selected" value="">Go to...</option>
                <?php echo $small_menu; ?>
            </select>
          </div>
        </nav>

          </div>
      </div> <!-- end class head-->
  </div> <!-- end head-outer -->

    
  <!-- Actual content goes here took out wrapper -->
  <section class="scrollable " > 
    <section class="tab-content" 
      <section class="tab-pane active" id="basic">
              
  
 