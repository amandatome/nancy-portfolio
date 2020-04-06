<?php

/* Template Name: Home */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">

	<div class="container-fluid" id="content" tabindex="-1">

        <main class="site-main" id="main">
        
        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        
        <!-- Overview Section -->
        <section class='overview pt-5 pb-5'>

            <div class='row'>
                <!--Summary Text -->
                <div class='col-xl-8 col-lg-7 col-md-12 p-5 text-right summary'>
                        <h1><?php the_field('summary_title'); ?></h1>
                    <?php if (the_field('summary')) : ?>
                        <?php the_field('summary');?>
                    <?php endif; ?>    
                </div> <!-- .col -->
                <!--Summary Image -->
                <div class=' col-xl-4 col-lg-4 col-sm-12'>
                        <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'large-rectangle', false, array('class' => 'featured-image')); ?> 
                </div><!-- .col -->
            </div><!-- .row -->
        </section>

        <!-- Services -->                
        <section class='services p-5 mx-5'>
            <div class='row'>
                <h2><?php the_field('services_title');?></h2>
            </div> <!-- .row -->   

            <div class='row py-3'>
                <?php
                    // check if the repeater field has rows of data
                    if( have_rows('services_info') ):

                    // loop through the rows of data
                    while ( have_rows('services_info') ) : the_row(); ?>

                        <div class='col-lg-4 col-md-12 border p-5 services-summary'>
                            <?php the_sub_field('services_content');?>
                        </div><!-- .col -->

                    <?php endwhile;

                    else :

                    // no rows found

                    endif;
                ?>
            </div><!-- .row -->
        </section>   
         <!-- Contact Section -->
        <section class='contact-section p-5'>
            <div class='row p-5'>
                <div class='col-xl-5 col-sm-12'>
                    <?php $image = get_field('contact_image');
                        if ($image):
                            // Image variables.
                            $url = $image['url'];
                            $alt = $image['alt'];
                            $caption = $image['caption'];

                            // Thumbnail size attributes.
                            $size = 'medium-square';
                            $thumb = $image['sizes'][$size];
                            $width = $image['sizes'][$size . '-width'];
                            $height = $image['sizes'][$size . '-height'];

                            // Begin caption wrap.
                            if ($caption): ?>
                                    <div class="wp-caption">
                                <?php endif;?>

                    <a href="<?php echo esc_url($url); ?>" title="<?php echo esc_attr($title); ?>">
                        <img class='img-fluid' src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />
                    </a>

                    <?php
                    // End caption wrap.
                    if ($caption): ?>
                            <p class="wp-caption-text"><?php echo esc_html($caption); ?></p>
                            </div>
                    <?php endif;?>
                    <?php endif;?>
                </div><!-- .col --> 
                <div class='col-xl-7 col-lg-12'>
                    <h2><?php the_field('contact_title');?></h2>
                    <?php the_field('contact_content');?>
                    <?php 
                        $link = get_field('contact_button');
                        if( $link ): 
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a class="btn btn-warning btn-lg" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>
                </div><!-- .col --> 
            </div><!-- .row --> 
        </section>
                
        <?php endwhile; // end of the loop. ?>

        </main><!-- #main -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>