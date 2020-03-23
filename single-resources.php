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
		<div class='col-md-12'>
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<div class="entry-meta">
					<h2><?php the_time('F j, Y');?></h2>
				</div><!-- .entry-meta -->
			</header><!-- .entry-header -->
		</div> <!-- .col -->

	</div><!-- .row -->
	<div class='row'>
		<div class='col-md-12'>
			<div class="entry-content">

<?php
               

// Load value.
if ($iframe = get_field('resource_video_audio')) :

// Use preg_match to find iframe src.
preg_match('/src="(.+?)"/', $iframe, $matches);
$src = $matches[1];

// Add extra parameters to src and replcae HTML.
$params = array(
    'controls'  => 0,
    'hd'        => 1,
    'autohide'  => 1
);
$new_src = add_query_arg($params, $src);
$iframe = str_replace($src, $new_src, $iframe);

// Add extra attributes to iframe HTML.
$attributes = 'frameborder="0"';
$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

// Display customized HTML.
echo $iframe;
?>    
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
