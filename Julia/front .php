<?php 
/*
* Template Name:front page
*/
get_header();?>


<?php 
// ====>> Banner Banner area loop <<<===== //
if( have_rows('banner_section_group','option') ): 
    while( have_rows('banner_section_group','option') ): the_row(); 
    $banner_image= get_sub_field('banner_image');
    $banner_title = get_sub_field('banner_title');
    $banner_sub_title = get_sub_field('banner_sub_title');
    if( have_rows('button_group','option') ): 
        while( have_rows('button_group','option') ): the_row(); 
        $link = get_sub_field('button_url');
        $text = get_sub_field('button_text');
        endwhile;
        endif;
    endwhile;
    endif;
?>
<!-- ==========Banner area start ========== -->

<section class="banner-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                <?php if($banner_image || $banner_title || $banner_sub_title || $link || $text ) : ?>
                    <div class="banner-items">
                        <div class="banner-img">
                        <img src="<?php echo $banner_image['url']; ?>" alt="<?php echo $banner_image['alt']; ?>">
                        </div>
                        <div class="banner-content">
                            <h2><?php  echo $banner_title; ?></h2>
                            <h5><?php  echo $banner_sub_title ; ?></h5>
                            <div class="theme-btn"><a href="<?php echo $link ? $link : '#'; ?>"><?php echo $text ? $text :'Button' ?></a></div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

<?php 
// ====>> Image-gallery Area loop <<<===== //
if (have_rows('gallery_management', 'option')):
	while (have_rows('gallery_management', 'option')): the_row();
		if (have_rows('gallery_show_more_button', 'option')):
			while (have_rows('gallery_show_more_button', 'option')): the_row();
				$gallery_button_text = get_sub_field('gallery_button_text');
				$gallery_button_url = get_sub_field('gallery_button_url');

			endwhile;
		endif;

		$title = get_sub_field('title');
		if (have_rows('content', 'option')):
			while (have_rows('content', 'option')): the_row();
				$gallery_content_texts[] = get_sub_field('gallery_content_text');
			endwhile;
		endif;
	endwhile;
endif;
?>

      
    <!-- ========= Image-gallery Area  start =========== -->
    <section class="gallary-area">
        <div class="image-gallary">
        <?php if($title || $gallery_content_texts): ?>
            <div class="image-gallary-content">
                <h2><?php  echo $title ? $title : ''; ?></h2>
                <?php foreach($gallery_content_texts as $gallery_content_text) : ?>
                <div class="card-text"><span><i class="fas fa-check-circle"></i></span>
                    <p><?php  echo $gallery_content_text; ?></p>
                </div>
                <?php endforeach?>
            </div>
            <?php endif; ?>
            <div class="image-gallary-items">
                <div class="g-i img-block">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about/bg-img1.jpg" alt="">
                </div>
                <div class="g-i">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about/gallery-1.jpg" alt="">
                </div>
                <div class="g-i">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about/gallery-2.jpg" alt="">
                </div>
                <div class="g-i">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about/gallery-3.jpg" alt="">
                </div>
            </div>

            <div class="image-gallary-items flex-start">
                <div class="g-i">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about/gallery-4.jpg" alt="">
                </div>
                <div class="g-i">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about/gallery-5.jpg" alt="">
                </div>
                <div class="g-i img-block">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about/gallery-6.jpg" alt="">
                </div>
                <div class="g-i">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about/gallery-7.jpg" alt="">
                </div>
                <div class="g-i img-block">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about/gallery-8.jpg" alt="">
                </div>
            </div>

            <div class="image-gallary-items flex-start">
                <div class="g-i img-block">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about/bg-img2.jpg" alt="">
                </div>
                <div class="g-i">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about/gallery-9.jpg" alt="">
                </div>
                <div class="g-i">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about/gallery-10.jpg" alt="">
                </div>
                <div class="g-i more-photos">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about/bg-img3.jpg" alt="">
                   
                    <a href="<?php echo $gallery_button_url ? $gallery_button_url : '#'; ?>" class="showMore-btn"><?php echo $gallery_button_text ? $gallery_button_text :'Button' ?></a>
                   
                </div>
            </div>

        </div>
    </section>
    
    <!-- ========= Image-gallery Area  End =========== -->

<?php
    // ====>> Service Area loop <<<===== //
if (have_rows('service_category', 'option')):
	while (have_rows('service_category', 'option')): the_row();
		$service_one_title = get_sub_field('service_one_title');
		$service_two_title = get_sub_field('service_two_title');
		$service_three_title = get_sub_field('service_three_title');

		$service_four_title = get_sub_field('service_four_title');
		$background_color = get_sub_field('background_color');
		if (have_rows('service_one_button', 'option')):
			while (have_rows('service_one_button', 'option')): the_row();
				$button_text = get_sub_field('button_text');
				$button_url = get_sub_field('button_url');
				$background = get_sub_field('background');
				$text_color = get_sub_field('text_color');
			endwhile;
		endif;
		if (have_rows('service_two_content', 'option')):
			while (have_rows('service_two_content', 'option')): the_row();
				$content_texts[] = get_sub_field('content_text');

			endwhile;
		endif;
		if (have_rows('service_three_content', 'option')):
			while (have_rows('service_three_content', 'option')): the_row();
				$service_content_texts[] = get_sub_field('service_content_text');

			endwhile;
		endif;
		if (have_rows('service_four_content', 'option')):
			while (have_rows('service_four_content', 'option')): the_row();
				$service_content_four_texts[] = get_sub_field('service_content_four_text');

			endwhile;
		endif;
//
	endwhile;
endif;
?>
    <!-- ========= Card Area  start =========== -->
    <section class="card-area" id="Evants">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card-items">
                        <div class="card-item card-item-1">
                            <div class="card-block">
                                <h3><?php echo $service_one_title;?></h3>
                                <div class="theme-btn"><a href="<?php echo $button_url ? $button_url : '#'; ?>"><?php echo $button_text ? $button_text :'Button' ?></a></div>
                            </div>
                        </div>
                        <a href="" class="card-item card-item-2">
                            <div class="card-block">
                                <h3><?php echo $service_two_title;?></h3>
                                <?php foreach($content_texts as $content_text) : ?>
                                <div class="card-content">
                                    <div class="card-text">
                                        <span><i class="fas fa-check-circle"></i></span>
                                        <p><?php echo $content_text ; ?></p>
                                    </div>
                                </div>
                                <?php endforeach ?>
                            </div>
                        </a>
                        <a href="" class="card-item card-item-3">
                            <div class="card-block">
                                <h3><?php echo $service_three_title;?></h3>
                                <?php foreach($service_content_texts as $service_content_text) : ?>
                                <div class="card-content">
                                    <div class="card-text"><span><i class="fas fa-check-circle"></i></span>
                                        <p><?php echo $service_content_text ; ?></p>
                                    </div>
                                </div>
                                <?php endforeach ?>
                            </div>
                        </a>
                        <a href="" class="card-item card-item-2">
                            <div class="card-block">
                                <h3><?php echo $service_four_title;?></h3>
                                <?php foreach($service_content_four_texts as $service_content_four_text) : ?>
                                <div class="card-content">
                                    <div class="card-text"><span><i class="fas fa-check-circle"></i></span>
                                        <p><?php echo $service_content_four_text ; ?></p>
                                    </div>
                                </div>
                                <?php endforeach ?>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========= metus Area  start =========== -->

    <?php 
   $blog_title = get_field('blog_title','option');
   $blog_sub_title = get_field('blog_sub_title','option');
   $blog_relationships = get_field('blog_relationship', 'option');
   //print_r ( $blog_relationships );
  
   if( $blog_relationships ):
    ?>
    <section class="metus-area" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                <h2><?php  echo $blog_title ; ?></h2>
                    <p><?php  echo $blog_sub_title ; ?></p>
                </div>
            </div>
            <div class="row">
            
                            <?php 
                                    //  if( $blog_relationships ):
                            foreach ($blog_relationships as $post) : ;
                
                             ?>
                                <div class="col-md-4">
                                    <a href="" class="metus-item">
                                        <div class="metus-img">
                                            <div class="zoom">
                                                <img src=" <?php the_post_thumbnail_url();?>" alt="">
                                            </div>
                                            <div class="metus-logo">
                                                <img src="<?php the_field('company_logos'); ?>" alt="">
                                            </div>
                                        </div>
                                        <div class="metus-content">
                                            <p><?php the_field('post_header'); ?></p>
                                        </div>
                                        <div class="client-item">
                                            <div class="zoom">
                                                <img src="<?php the_field('author_image'); ?>" alt="">
                                            </div>
                                            <div class="client-content">
                                                <p><?php the_field('author_review'); ?></p>
                                                <h5><?php the_field('author_name'); ?></h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                        <?php endforeach;?>
                        <?php endif;?>
                    </div>
                </div>
                </section>
    <!-- ========= metus Area  start =========== -->
    <?php get_footer();?>

