<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<section class="cards-list cards-list-01"<?php if($background) echo ' style="background-color: ' . $background . ';"' ?>>
		<div class="container-fluid">
			<div class="cards-slider">
				<div class="swiper-wrapper">

					<?php if ($show_posts == 'Custom'): ?>
						<?php
						if($vacancies): ?>

							<?php 
							foreach($vacancies as $post): 
								setup_postdata($post); 
								?>
								<div class="swiper-slide">
									<?php get_template_part('parts/content', 'vacancy'); ?>
								</div>
								<?php 
							endforeach; 
							wp_reset_postdata(); 
							?>
						<?php endif; 
						?>
					<?php else: ?>
						<?php 
						$wp_query = new WP_Query(array('post_type' => 'vacancy', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 3, 'suppress_filters'=>false, 'paged' => get_query_var('paged')));
						while ($wp_query->have_posts()): $wp_query->the_post(); ?>
							<div class="swiper-slide">
								<?php get_template_part('parts/content', 'vacancy'); ?>
							</div>
							<?php 
						endwhile; 
						wp_reset_query(); 
						?>
					<?php endif ?>

				</div>
				<div class="swiper-pagination"></div>
			</div>

			<?php if ($link): ?>
				<div class="text-center">
					<a href="<?= $link['url'] ?>" class="content-link"<?php if($link['target']) echo ' target="_blank"' ?>><?= $link['title'] ?><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/triangle.svg" alt="" /></a>
				</div>
			<?php endif ?>

		</div>
	</section>

	<?php endif; ?>