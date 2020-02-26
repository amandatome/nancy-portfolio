<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<div class='col-md-4 d-flex align-items-stretch mb-5'>
<article <?php post_class();?> id="post-<?php the_ID();?>">
<div class='square-blog'></div>

	<div class='card'>
	<?php echo get_the_post_thumbnail($post->ID, 'large'); ?>
	<div class='card-body p-4'>
	<header class="entry-header card-title">
		<?php the_title(
    sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())),
    '</a></h2>'
);
?>

	<?php if ('post' == get_post_type()): ?>

	<div class="entry-meta">
		<h3><?php the_time('F j, Y');?></h3>
	</div><!-- .entry-meta -->

<?php endif;?>

</header><!-- .entry-header -->
	<div class="entry-content card-text">

		<?php the_excerpt();?>

		<?php
wp_link_pages(
    array(
        'before' => '<div class="page-links">' . __('Pages:', 'understrap'),
        'after' => '</div>',
    )
);
?>

	</div><!-- .entry-content -->
	</div><!-- .card-body -->
	<!-- <footer class="entry-footer">

		<?php understrap_entry_footer();?>

	</footer>.entry-footer -->

	</div><!--end card-->
		</article><!-- #post-## -->
	</div>
