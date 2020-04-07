<?php

/* Template Name: HTML Sitemap */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');

?>

<div class="wrapper" id="page-wrapper">

    <div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">

        <main class="site-main mt-5" id="main">

            <div class="html-sitemap">
                <h1 class='text-right'><?php the_title();?></h1>
                <div class='row pb-5 border-bottom'>

                    <div class='col-md-6 p-3 border-right sitemap' id="pages">
                        <h2>Pages</h2>
                        <ul class="sitemap-pages">
                            <?php wp_list_pages(array('exclude' => '119, 158', 'title_li' => '')); // Exclude pages by ID ?>
                        </ul>
                    </div>
                    <div class='col-md-6 p-3 sitemap'>

                        <h2>Posts</h2>
                        <ul>
                            <?php $categories = get_categories('exclude='); // Exclude categories by ID
                                foreach ($categories as $cat) { ?>
   
                            <li class="category">
                                <h3><span class="grey">Category - </span><?php echo $cat->cat_name; ?></h3>
                                <ul class="cat-posts">
                                    <?php query_posts('posts_per_page=-1&cat=' . $cat->cat_ID); //-1 shows all posts per category. 1 to show most recent post.
                                    while (have_posts()):
                                        the_post();
                                        $category = get_the_category();
                                        if ($category[0]->cat_ID == $cat->cat_ID) {?>
                                    <li>
                                        <?php the_time('M d, Y')?> &raquo; <a href="<?php the_permalink()?>"
                                            title="<?php the_title();?>"><?php the_title();?></a>
                                    </li>
                                    <?php
                                        }
                                        endwhile;
                                        ?>
                        </ul>
                            </li>
                            <?php }?>
                        </ul>
                        <?php wp_reset_query();?>
                    </div>
                </div> <!-- .row -->
                <div class='row pt-5'>
                    <div class='col-md-6 p-3 border-right sitemap'>
                        <h2 id="my-post-type">Resources</h2>
                        <ul>
                            <?php
                            $terms = get_terms('resource_type', 'orderby=name');
                            foreach ($terms as $term) {
                                echo '<h3>' . $term->name . '</h3>';
                                echo '<ul>';
                                $args = array(
                                    'post_type' => 'resources',
                                    'posts_per_page' => -1,
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'resource_type',
                                            'field' => 'slug',
                                            'terms' => $term->slug,
                                        ),
                                    ),
                                );
                                $new = new WP_Query($args);
                                while ($new->have_posts()) {
                                    $new->the_post();
                                    echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                                }
                                echo '</ul>';
                                echo '</li>';
                            }?>
                        </ul>
                    </div>
                    <div class='col-md-6 p-3 sitemap' id='archives'>
                        <h2>Archives</h2>
                        <ul class="sitemap-archives">
                            <?php wp_get_archives('type=monthly&show_post_count=true');?>
                        </ul>
                    </div>
                </div>

            </div>

        </main>
    </div>

    </main><!-- #main -->

</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer();?>