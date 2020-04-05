<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<div class='col-lg-4 col-md-6 col-sm-12 d-flex align-items-stretch mb-5'>
	<article <?php post_class();?> id="post-<?php the_ID();?>">
		<div class='card card-blog'>
			<a class='card-img-top' href="<?php the_permalink(); ?>">
				<?php echo get_the_post_thumbnail($post->ID, "medium-rectangle"); ?>
			</a>
			<div class='card-body p-4'>
				<header class="entry-header card-title">
					<?php the_title(
					sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())),
					'</a></h2>'); ?>

				<?php if ('post' == get_post_type()): ?>

					<div class="entry-meta">
						<p><?php the_time('F j, Y');?></p>
					</div><!-- .entry-meta -->

				<?php endif;?>

				</header><!-- .entry-header -->

				<div class="entry-content card-text">
					<?php the_excerpt();?>

					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . __('Pages:', 'understrap'),
							'after' => '</div>',
					));?>
				</div><!-- .entry-content -->
			</div><!-- .card-body -->
		</div><!--.card-->
	</article><!-- #post-## -->
</div>
