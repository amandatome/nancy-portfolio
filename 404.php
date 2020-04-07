<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="error-404-wrapper">

    <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

        <div class="content-area" id="primary">

            <main class="site-main" id="main">

                <section class="error-404 not-found">

                    <header class="page-header">

                        <h1 class="page-title letter-shadow text-right"><?php esc_html_e( '404' ); ?></h1>

                        <h2 class='text-center'>
                            <?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'understrap' ); ?></h2>

                    </header><!-- .page-header -->

                    <div class="page-content">
                        <div class='row border-bottom mt-5'>
                            <div class='col-md-8'>
                                <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'understrap' ); ?>
                                </p>
                            </div>
                            <div class='col-md-4'>
                                <?php get_search_form(); ?>
                            </div>
                            <!--.col-->
                        </div>
                        <!--.row-->

                        <div class='row text-center border-bottom mt-5'>
                            <div class='col-md-6'>
                                <?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
                            </div>
                            <div class='col-md-6'>
                                <?php if ( understrap_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>

                                <div class="widget widget_categories">

                                    <h2 class="widget-title">
                                        <?php esc_html_e( 'Most Used Categories', 'understrap' ); ?></h2>

                                    <ul>
                                        <?php
											wp_list_categories(
												array(
													'orderby'    => 'count',
													'order'      => 'DESC',
													'show_count' => 1,
													'title_li'   => '',
													'number'     => 10,
												)
											);
											?>
                                    </ul>

                                </div><!-- .widget -->

                                <?php endif; ?>
                            </div>
                            <!--.col-->
                        </div>
                        <!--.row-->

                        <div class='row text-center mt-5'>
                            <div class='col-12'>
                                <?php

									/* translators: %1$s: smiley */
									$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'understrap' ), convert_smilies( ':)' ) ) . '</p>';
									the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );

									the_widget( 'WP_Widget_Tag_Cloud' );
									?>
                            </div>
                            <!--.col-->
                        </div>
                        <!--.row-->

                    </div><!-- .page-content -->

                </section><!-- .error-404 -->

            </main><!-- #main -->

        </div><!-- #primary -->


    </div><!-- #content -->

</div><!-- #error-404-wrapper -->

<?php get_footer(); ?>