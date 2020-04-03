<?php

/* Template Name: Resources */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">

    <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

        <main class="site-main mt-5" id="main">
            <h1 class='resource-title text-right'><?php the_title(); ?></h1>

        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <?php
	    $article_query = new WP_Query(
		array(
			'post_type' => 'resources',
			'posts_per_page' => -1,
			'order' => 'ASC',
			'tax_query' => array(
				array(
					'taxonomy' => 'resource_type', // what taxonomy are we querying by?
					'field' => 'slug', // what field is the query? (other options are the term_id or name)
					'terms'    => 'article', // what specific term are we querying by?
				)
			)
		)
	);

	if ($article_query->have_posts()) { ?>
		<?php while ($article_query->have_posts()) {
					$article_query->the_post(); ?>
		<?php
            $articles = get_the_terms($post, 'resource_type');
            foreach ($articles as $cat) {
            $cat->name;
            };?>
			<div class='col-lg-12 shadow p-4 mb-2'>
			<h2><?php echo $cat->name ?></h2>
			<ul>
				<li><a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
				</a></li>
		</ul>
			</div>
		<?php }
				/* Restore original Post Data */
				wp_reset_postdata();
			} else { ?>
		no posts found
		<p>There are no cats 😿</p>
<?php }; ?>

<?php

	    $audio_query = new WP_Query(
		array(
			'post_type' => 'resources',
			'posts_per_page' => -1,
			'order' => 'ASC',
			'tax_query' => array(
				array(
					'taxonomy' => 'resource_type', // what taxonomy are we querying by?
					'field' => 'slug', // what field is the query? (other options are the term_id or name)
					'terms'    => 'audio', // what specific term are we querying by?
				)
			)
		)
	);

	if ($audio_query->have_posts()) { ?>
		<?php while ($audio_query->have_posts()) {
					$audio_query->the_post(); ?>
		<?php
            $audio = get_the_terms($post, 'resource_type');
            foreach ($audio as $cat) {
            $cat->name;
            };?>
			<div class='col-lg-12 shadow p-4 mb-2'>
			<h2><?php echo $cat->name ?></h2>
			<ul>
				<li><a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
				</a></li>
		</ul>
			</div>
		<?php }
				/* Restore original Post Data */
				wp_reset_postdata();
			} else { ?>
		no posts found
		<p>There are no audio files 😿</p>
	<?php }; ?>

	<?php
	    $video_query = new WP_Query(
		array(
			'post_type' => 'resources',
			'posts_per_page' => -1,
			'order' => 'ASC',
			'tax_query' => array(
				array(
					'taxonomy' => 'resource_type', // what taxonomy are we querying by?
					'field' => 'slug', // what field is the query? (other options are the term_id or name)
					'terms'    => 'video', // what specific term are we querying by?
				)
			)
		)
	);

	if ($video_query->have_posts()) { ?>
		<?php while ($video_query->have_posts()) {
					$video_query->the_post(); ?>
		<?php
            $videos = get_the_terms($post, 'resource_type');
            foreach ($videos as $cat) {
            $cat->name;
            };?>
			<div class='col-lg-12 shadow p-4'>
			<h2><?php echo $cat->name ?></h2>
			<ul>
            <li><a href="<?php the_permalink(); ?>">

				<?php the_title(); ?>
				</a></li>
		</ul>
			</div>
		<?php }
				/* Restore original Post Data */
				wp_reset_postdata();
			} else { ?>
		no posts found
		<p>There are no cats 😿</p>
	<?php }; ?>

        <?php endwhile; // end of the loop. ?>
        </div> <!-- .row -->

        </main><!-- #main -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->


<?php get_footer(); ?>