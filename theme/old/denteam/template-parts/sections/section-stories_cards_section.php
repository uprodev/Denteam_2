<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<?php if ($stories): ?>
		<section class="cards-list cards-list-02">
			<div class="container-fluid">

				<?php if ($title): ?>
					<div class="text-center">
						<h3><?= $title ?></h3>
					</div>
				<?php endif ?>
				
				<div class="cards-slider">
					<div class="swiper-wrapper">

						<?php foreach($stories as $post): 

							setup_postdata($post); ?>

							<div class="swiper-slide">
								<?php get_template_part('parts/content', 'story') ?>
							</div>
							
						<?php endforeach; ?>

						<?php wp_reset_postdata(); ?>

					</div>
					<div class="swiper-pagination"></div>
				</div>
			</div>
		</section>
	<?php endif ?>

	<?php endif; ?>