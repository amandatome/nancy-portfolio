<?php

/* Template Name: Workshops */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">

    <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

        <main class="site-main mt-5" id="main">
            <h1 class='workshop-title text-right'><?php the_title(); ?></h1>

        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        
        <?php

            // The Query
            $the_query = new WP_Query(
                array(
                    'post_type' => 'workshops',
                    'posts_per_page' => -1,
                )
            );
            // The Loop?>
            <div class='row'>

            <?php if ( $the_query->have_posts() ) {
                
                while ( $the_query->have_posts() ) { 
                    $the_query->the_post(); ?>
                    <div class='col-md-4'>
                              <div class='card border-0'>

                    <!-- Display your post data -->
                    <a href="<?php the_permalink(); ?>">
                                    <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'large', false, array('class' => 'workshop-image')); ?>
                                </a>
                    <div class='card-body'>
                    <header class="entry-header card-title">          
                    <a href="<?php the_permalink(); ?>">
                        <h3><?php the_title(); ?></h3>
                    </a>
                    </header>
                    </div><!-- .card-body --> 

                    </div><!-- .card --> 
                </div> <!-- .col -->
                <?php }
                /* Restore original Post Data */
                wp_reset_postdata();
            } else { ?>
                <!-- no posts found -->
                <p>There are no posts</p>
            <?php } ?>
        <?php endwhile; // end of the loop. ?>
        </div> <!-- .row -->

        </main><!-- #main -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->


<?php get_footer(); ?>