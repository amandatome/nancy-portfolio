
<div class='row   mt-3'>
<div class='col-12 d-flex justify-content-center categories'>
<div class="dropdown">
				<ul>
					<li id="categories">
						<form id="category-select" class="category-select" action="<?php echo esc_url(home_url('/')); ?>" method="get">
							<?php
							$args = array(
								'show_option_none' => __('Category'),
								'orderby'          => 'name',
								'echo'             => 0,
								'exclude'			=> 1
							);
							?>
							<?php $select  = wp_dropdown_categories($args); ?>
							<?php $replace = "<select$1 onchange='return this.form.submit()'>"; ?>
							<?php $select  = preg_replace('#<select([^>]*)>#', $replace, $select); ?>
							<div class="select-blog">
							<?php echo $select; ?>
							</div>
							<noscript>
								<input type="submit" value="View" />
							</noscript>
						</form>
					</li>
				</ul>
			</div>
			<?php // If there are no posts to display, such as an empty archive page 
			?>
			<!--Display Posts Error-->
			<?php if (!have_posts()) : ?>
				<article id="post-0" class="post error404 not-found">
					<h1 class="entry-title">Not Found</h1>
					<section class="entry-content">
						<p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
						<?php get_search_form(); ?>
					</section><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; // end if there are no posts 
			?>

</div>
</div><!-- .row-->
