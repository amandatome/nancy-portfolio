
<div class='row mt-3'>
<div class='col-12 categories'>
<h2>Categories</h2>
<?php if ( have_posts() ) : ?>

<?php /* Start the Loop */ ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php echo get_the_category_list();
						?>

<?php endwhile; ?>

<?php endif; ?>
</div>
</div><!-- .row-->
