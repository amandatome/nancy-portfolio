<?php /* Template Name: Home */?>
<?php get_header();?>
<?php // Start the loop ?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <!-- Overview Section -->
	    <section class='overview pt-5 pb-5'>
            <div class="container ">
	            <div class='row'>
	                <div class='square'></div>
	                <div class='col-md-7 text-right summary'>
	                    <h2 class='display-3'><?php the_field('summary_title');?></h2>
	                    <?php the_field('summary');?>
	                </div>
	                <div class='col-md-5'>
                         <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'large-rectangle', false, array('class' => 'featured-image')); ?> 
	             </div>
	            </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <section class='services'>
            <div class='container py-5'>
                <h2 class='display-3 d-flex justify-content-center'><?php the_field('services_title');?></h2>
                <div class='row justify-content-between py-3'>
                <?php
                        // check if the repeater field has rows of data
                        if( have_rows('services_info') ):

                            // loop through the rows of data
                            while ( have_rows('services_info') ) : the_row(); ?>
                            <div class='col-md-4 border p-5 services-summary '>
                                <?php the_sub_field('services_content');?>
                            </div>  
                           <?php endwhile;

                        else :

                            // no rows found

                        endif;

                        ?>
                      
                </div><!-- end row -->
            </div><!-- end container -->  
        </section>    
        <!-- Contact Section -->
        <section class='contact-section p-5'>
            <div class='container'>
                <div class='row'>
                <div class='square-contact'></div>
                    <div class='col-md-5'>
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
                                <p class="wp-caption-text text-center"><?php echo esc_html($caption); ?></p>
                                </div>
                            <?php endif;?>
                        <?php endif;?>
                    </div> <!--end col--> 
                    <div class='col-md-7'>
                        <h2 class='display-3'><?php the_field('contact_title');?></h2>
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
                    </div>  <!--end col--> 
                </div><!--end row--> 
            </div><!--end container-->    
        </section>

    <?php endwhile; // end the loop?>

<?php get_footer();?>