<?php

/* Template Name: Contact*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">

    <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

        <main class="site-main mt-5" id="main">

        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        
            <!-- Contact Info -->
            <section id='contact'>
                <div class='row pt-5 no-gutters'>
                    <div class='col-md-4 contact-image'>
                        <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'large-rectangle'); ?>
                    </div><!-- .col -->  
                    <div class='col-md-8 contact-text p-4'>
                        <h1 class='text-right display-2'><?php the_title();?></h1>
                        <?php the_field('contact_content');?>
                    </div><!-- .col -->
                </div><!-- .row -->

                <!-- Contact Form-->
                <div class='row no-gutters pt-4'>
                    <h2 class='display-3 mb-2'><?php the_field('contact_heading');?></h2>
                    <div class='col-md-12 contact-form pt-5'>
                        <?php  the_content(); ?>   
                    </div><!-- .col -->
                </div><!-- .row -->  
            </section>
                
        <?php endwhile; // end of the loop. ?>

        </main><!-- #main -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>
