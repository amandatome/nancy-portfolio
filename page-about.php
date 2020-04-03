<?php

/* Template Name: About */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">

    <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

        <main class="site-main mt-5" id="main">

        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
            <!-- About -->
            <section id='about p-5'>
                <div class='row no-gutters pt-5'>
                    <div class='col-md-4 col-sm-12 about-image d-flex align-items-stretch'>
                        <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'large-rectangle'); ?>
                    </div>    
                    <div class='col-md-8 col-sm-12 about-text p-4'>
                        <h1 class='text-right'><?php the_title();?></h1>
                        <?php the_field('about_content');?>
                    </div>  
                </div>    
            </section>

            <section class='about-consulting py-5'>
                <div class='row pt-5 no-gutters'>
                    <div class='col-md-12 p-5 mission'>
                        <h2><?php the_field('mission_heading');?></h2>
                        <?php the_field('mission_statement');?>
                        <h3 class='text-right' id='learn-more'><?php the_field('learn_more');?></h3>
                        <!-- Buttons -->
                        <div class='workshops-blog pb-3 d-flex justify-content-end'>
                            <?php
                                $workshop_link = get_field('workshop_button');
                                if( $workshop_link): 
                                    $workshop_link_url = $workshop_link['url'];
                                    $workshop_link_title = $workshop_link['title'];
                                    $workshop_link_target = $workshop_link['target'] ? $workshop_link['target'] : '_self';
                                    ?>
                                    <a class="btn btn-outline-secondary btn-lg mr-2" href="<?php echo esc_url( $workshop_link_url ); ?>" target="<?php echo esc_attr( $workshop_link_target ); ?>"><?php echo esc_html( $workshop_link_title ); ?></a>
                            <?php endif; ?>
                            <?php
                                $blog_link = get_field('blog_button');
                                if( $blog_link): 
                                    $blog_link_url = $blog_link['url'];
                                    $blog_link_title = $blog_link['title'];
                                    $blog_link_target = $blog_link['target'] ? $blog_link['target'] : '_self';
                                    ?>
                                    <a class="btn btn-outline-secondary btn-lg" href="<?php echo esc_url( $blog_link_url ); ?>" target="<?php echo esc_attr( $blog_link_target ); ?>"><?php echo esc_html( $blog_link_title ); ?></a>
                                <?php endif; ?>
                            </div>
                            <!--.button area -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </section> 
                
        <?php endwhile; // end of the loop. ?>

        </main><!-- #main -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>
