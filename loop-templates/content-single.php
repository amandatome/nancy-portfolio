<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

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
				<?php the_content(); ?>
				<?php
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
						'after'  => '</div>',
					)
				);
				?>
			</div><!-- .entry-content -->
		</div><!-- .col -->
		<footer class="entry-footer">
			<?php understrap_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div><!-- .row -->
</article><!-- #post-## -->
