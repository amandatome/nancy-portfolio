<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>


<div class="wrapper mt-5" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">
	<footer class="site-footer" id="colophon">

		<div class="row pt-3">

			<div class="col-md-6">
		
	
        <?php wp_nav_menu(array(
            'theme_location' => 'footer',
            'container_class' => 'menu'
        )); ?>
    </div><!--.col-->
			<div class='col-6'>
        <?php wp_nav_menu(array(
            'theme_location' => 'social',
            'container_class' => 'menu'
        )); ?>
    
			</div> <!--.col -->
		</div><!--.row-->
		<div class='row'>
			<div class='col-12'>
					<div class="site-info">

						<?php $date = date_i18n( 'Y' );?>

						<?php $footer_text = get_field('footer_text', 'option'); ?>
						<p class='site-text'><?php echo $footer_text; ?> <?php echo $date; ?></p>
					</div><!-- .site-info -->


			</div><!--col end -->

		</div><!-- row end -->

		</footer><!-- #colophon -->


	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

