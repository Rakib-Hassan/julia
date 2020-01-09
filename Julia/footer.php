<footer class="footer-area" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-flex">
                        <div class="footer-logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/footer-logo.png" alt="footer-logo.png">
                        </div>
                        <div class="footer-menu">
                            <?php dynamic_sidebar('footer-1'); ?>
                        </div>

                        <div class="footer-menu-2">
                            <h5>J.Ivy</h5>
                            <?php dynamic_sidebar('footer-2'); ?>
                        </div>
                        <div class="footer-menu-2">
                            <h5>BE-EDGE</h5>
                            <?php dynamic_sidebar('footer-3'); ?>
                        </div>

                        <div class="footer-menu-2">
                            <h5>Services</h5>
                            <?php dynamic_sidebar('footer-4'); ?>
                        </div>

                        <div class="footer-menu-2">
                            <h5>Contact </h5>
                            <ul class="footer-socail">
                            <?php 
                        if (have_rows('social_media','option')) {
                                    while (have_rows('social_media','option' )) {
                                        the_row();
                                      
                                        if (get_sub_field('select_icon_image_icon','option')=='Social Image') {
                                            $social_image = get_sub_field('social_image','option');
                                            $icon_name = get_sub_field('icon_name','option');
                                            $icon_url = get_sub_field('icon_url','option');
                                            $show_in_top_footer = get_sub_field('show_in_top_footer');
                                        ?>
                                        <?php if($show_in_top_footer) { ?>
                                <li>  <a href="<?php echo $icon_url ? $icon_url : '#'; ?>" target="_blank"><img src="<?php echo $social_image['url'] ?>" alt="<?php $social_image['name']; ?>"> </a></li>
                                <?php } } } }?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php 
                //====>> Footer area loop <<<===== //
                    $copy_right_text= get_field('copy_right_text','option');
                     ?>
                <div class="col-12">
                    <div class="copy-right">
                        <div class="copy-content">
                            <p><?php  echo $copy_right_text; ?></p>
                        </div>
                       
                        <div class="copy-card">
                        <?php 
                        if( have_rows('product_available_link_logo','option') ): 
                        while( have_rows('product_available_link_logo','option') ): the_row(); 
                        $product_available_link_image = get_sub_field('product_available_link_image');
                        $product_available_link= get_sub_field('product_available_link');
                        ?>
                        <a href="<?php echo $product_available_link ? $product_available_link : '#'; ?>"><img src="<?php echo $product_available_link_image['url']; ?>" alt="amazon"></a>
                        <?php 
                           endwhile;endif;?> 
                        </div>
                 </div> 
            </div>  
        </div>
    </footer>
    <!-- ========== Footer Area End ============-->
   
    <!--    <script src="assets/js/main.js"></script>-->
    <script>
        // SmartMenus init
        jQuery(function($) {
            $('#main-menu').smartmenus({
                mainMenuSubOffsetX: -1,
                mainMenuSubOffsetY: 4,
                subMenusSubOffsetX: 6,
                subMenusSubOffsetY: -6
            });
        });

        // SmartMenus mobile menu toggle button
        jQuery(function($) {
            var $mainMenuState = $('#main-menu-state');
            if ($mainMenuState.length) {
                // animate mobile menu
                $mainMenuState.change(function(e) {
                    var $menu = $('#main-menu');
                    if (this.checked) {
                        $menu.hide().slideDown(250, function() {
                            $menu.css('display', '');
                        });
                    } else {
                        $menu.show().slideUp(250, function() {
                            $menu.css('display', '');
                        });
                    }
                });
                // hide mobile menu beforeunload
                $(window).bind('beforeunload unload', function() {
                    if ($mainMenuState[0].checked) {
                        $mainMenuState[0].click();
                    }
                });
            }
        });

    </script>
    <?php wp_footer(); ?>
</body>

</html>
