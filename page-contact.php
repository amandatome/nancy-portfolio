<?php /* Template Name: Contact */?>
<?php get_header();?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <div class='container pt-5'>
            <section id='contact'>
                <div class='row pt-5 no-gutters'>
                    <div class='col-md-4 contact-image'>
                    <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'large-rectangle'); ?>
                    </div>    
                    <div class='col-md-8 contact-text p-4'>
                        <h1 class='text-right display-2'><?php the_title();?></h1>
                        <?php the_field('contact_content');?>
                    </div>  
                </div>
                <div class='row no-gutters pt-4'>
                    <h2 class='display-3 mb-2'>Contact</h2>
                <div class='col-md-12 contact-form pt-5'>
                    <?php 
                     the_content();
                    ?>   
                </div>
            </div>    
                </section>



   
    <?php endwhile; // end the loop?>
<?php get_footer();?>