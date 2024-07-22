<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<section class="stories"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container">
			<div class="stories-slider">
				<div class="swiper-wrapper">

					<?php if ($show_posts == 'Custom'): ?>
						<?php
						if($stories): ?>

							<?php 
							foreach($stories as $post): 
								setup_postdata($post); 
								?>
								<div class="swiper-slide">
									<?php get_template_part('parts/content', 'story_section'); ?>
								</div>
								<?php 
							endforeach; 
							wp_reset_postdata(); 
							?>
						<?php endif; 
						?>
					<?php else: ?>
						<?php 
						$wp_query = new WP_Query(array('post_type' => 'story', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 4, 'post__not_in'=>array(get_the_ID()), 'suppress_filters'=>false, 'paged' => get_query_var('paged')));
						while ($wp_query->have_posts()): $wp_query->the_post(); ?>
							<div class="swiper-slide">
								<?php get_template_part('parts/content', 'story_section'); ?>
							</div>
							<?php 
						endwhile; 
						wp_reset_query(); 
						?>
					<?php endif ?>

				</div>
				<div class="swiper-pagination"></div>
				<div class="swiper-pagination-stories d-none d-md-block">
					<ul>

						<?php if ($show_posts == 'Custom'): ?>
							<?php
							if($stories): ?>

								<?php 
								foreach($stories as $index => $post): 
									setup_postdata($post); 
									?>
									<li<?php if($index == 0) echo ' class="active"' ?> data-slide="<?= $index ?>"><span><?php the_field('title_tab_name') ?></span></li>
									<?php 
								endforeach; 
								wp_reset_postdata(); 
								?>
							<?php endif; 
							?>
						<?php else: ?>
							<?php 
							$wp_query = new WP_Query(array('post_type' => 'story', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 4, 'post__not_in'=>array(get_the_ID()), 'suppress_filters'=>false, 'paged' => get_query_var('paged')));
							while ($wp_query->have_posts()): $wp_query->the_post(); ?>
								<li<?php if($wp_query->current_post == 0) echo ' class="active"' ?> data-slide="<?= $wp_query->current_post ?>"><span><?php the_field('title_tab_name') ?></span></li>
								<?php 
							endwhile; 
							wp_reset_query(); 
							?>
						<?php endif ?>

						<?php if ($link): ?>
							<li>
								<a href="<?= $link['url'] ?>"<?php if($link['target']) echo ' target="_blank"' ?>><?= $link['title'] ?></a>
							</li>
						<?php endif ?>

					</ul>
				</div>
			</div>
		</div>
	</section>

	<?php endif; ?>