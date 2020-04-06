<?php
/**
 * Single custom post template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="index-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<main class="site-main" id="main">
<article class='pb-2'<?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div class='row pt-5'>
		<div class='col-md-5'>
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<div class="entry-meta">
					<h2><?php the_time('F j, Y');?></h2>
				</div><!-- .entry-meta -->
			</header><!-- .entry-header -->
		</div> <!-- .col -->
		<div class='col-md-6 post-image'>
			<?php echo get_the_post_thumbnail( $post->ID, 'medium-square' ); ?>
		</div> <!-- .col -->
	</div><!-- .row -->
	<div class='row'>
		<div class='col-md-12'>
			<div class="entry-content mt-n5">
				<?php the_field('workshop_content'); ?>
                <?php 
$button_link = get_field('workshop_reg_button');
if( $button_link ): 
    $button_link_url = $button_link['url'];
    $button_link_title = $button_link['title'];
    $button_link_target = $button_link['target'] ? $button_link['target'] : '_self';
    ?>
    <a class="btn btn-lg btn-secondary" href="<?php echo esc_url( $button_link_url ); ?>" target="<?php echo esc_attr( $button_link_target ); ?>"><?php echo esc_html( $button_link_title ); ?></a>
<?php endif; ?>
			</div><!-- .entry-content -->
		</div><!-- .col -->
		<footer class="entry-footer">
			<?php understrap_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div><!-- .row -->
</article><!-- #post-## -->

</main><!-- #main -->	
			<div class='row mt-4 d-flex justify-content-center'>		
			<!-- The pagination component -->
<!-- To Do Add pagination			 -->
</div>		

	</div><!-- #content -->

</div><!-- #index-wrapper -->
