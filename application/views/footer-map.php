<div class="pm-footer" style="background-color:#222;">
    <div class="pm-bb" style="background-color:#111;">
        <div class="row" style="  background-color:#111; margin-left:auto; margin-right:auto; max-width:1170px;  ">
            <div class="col-sm-12" style="margin-top:10px; margin-bottom:20px;">
                <div class="footer-brand">Powered by IgnitedCMS
                    <?php echo date( 'Y'); ?>
                    <?php echo nbs(3); ?>
                    <?php echo('Memory usage:'); ?>
                    <?php echo $this->benchmark->memory_usage();?>
                </div>
            </div>
        </div>
    </div>
</div>