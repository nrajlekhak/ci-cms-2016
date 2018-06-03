<footer id="footer" class="midnight-blue">
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                &copy; <?php echo date('Y'); ?> <a target="_blank" href="<?php echo base_url(); ?>" title="Free Twitter Bootstrap WordPress Themes and HTML templates"><?php echo config_item('site_name'); ?></a>. All Rights Reserved.
            </div>
            <div class="col-md-2 text-center">
              <a href="<?php echo base_url('dev'); ?>">Developer</a>
            </div>
            <div class="col-md-5">
                <?php echo  get_footer_menu($menu); ?>
            </div>
        </div>
    </div>
</footer><!--/#footer-->
