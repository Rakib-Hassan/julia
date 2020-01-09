<!doctype html>
<html class="no-js" lang="la">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="shortcut icon" type="image/png" href="assets/img/logo/favicon.ico"> -->
    <?php wp_head(); ?>
</head>

<body>

<?php 
// ====>> Header  area loop <<<===== //
if( have_rows('social_media_setting','option') ): 
    while( have_rows('social_media_setting','option') ): the_row(); 
    $facebook_img= get_sub_field('facebook_img');
    $facebook_link = get_sub_field('facebook_link');
    $twitter_img = get_sub_field('twitter_img');
    $twitter_link = get_sub_field('twitter_link');
    $instagram_img = get_sub_field('instagram_img');
    $instagram_link = get_sub_field('instagram_link');
    $linkedin_img = get_sub_field('linkedin_img');
    $linkedin_link = get_sub_field('linkedin_link');
    endwhile;
    endif;

?>
    <!-- ============ Header area start ============-->
    <header class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav" role="navigation">
                        <!-- Mobile menu toggle button (hamburger/x icon) -->
                        <input id="main-menu-state" type="checkbox" />
                        <label class="main-menu-btn" for="main-menu-state">
                            <span class="main-menu-btn-icon"></span>
                        </label>
                        <div class="nav-brand"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/logo.png" alt=""></a></div>
                        <!-- Sample menu definition -->
                        <?php
                            wp_nav_menu(array(
                                'theme_location' => 'menu-1',
                                'menu' => '',
                                'container' => 'div',
                                'container_class' => 'menu-{menu-slug}-container',
                                'container_id' => '',
                                'menu_class' => 'menu sm sm-clean text-center',
                                'menu_id' => 'main-menu',
                               
                            ));
                        ?>
                             
                        <div class="social-menu">
                        <?php 
                        if (have_rows('social_media','option')) {
                                    while (have_rows('social_media','option' )) {
                                        the_row();
                                        
                                        if (get_sub_field('select_icon_image_icon','option')=='Social Image') {
                                            $social_image = get_sub_field('social_image','option');
                                            $icon_name = get_sub_field('icon_name','option');
                                            $icon_url = get_sub_field('icon_url','option');
                                            $show_in_top_header = get_sub_field('show_in_top_header','option');
                                            // $show_in_footer = get_sub_field('show_in_footer');
                                        ?>
                                        <?php if($show_in_top_header) { ?>
                            <a href="<?php echo $icon_url ? $icon_url : '#'; ?>" target="_blank"><img src="<?php echo $social_image['url'] ?>" alt="<?php $social_image['name']; ?>"> </a>
                                        <?php } } } }
                                            
                                        ?>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>