<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<?php
	if($about_us_posts): ?>

		<section class="cards-list cards-list-01">
			<div class="container-fluid">
				<div class="cards-slider">
					<div class="swiper-wrapper">

						<?php foreach($about_us_posts as $post): 

							setup_postdata($post); ?>
							<div class="swiper-slide">
								<?php get_template_part('parts/content', 'about_us') ?>
							</div>
						<?php endforeach; ?>
						
						<?php wp_reset_postdata(); ?>

					</div>
					<div class="swiper-pagination"></div>
				</div>
			</div>
		</section>

	<?php endif; ?>

	<?php endif; ?>