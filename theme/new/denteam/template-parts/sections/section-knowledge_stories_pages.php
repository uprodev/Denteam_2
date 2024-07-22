<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<section class="cards-list cards-list-02"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container-fluid">

			<?php if ($title): ?>
				<div class="text-center">
					<h3><?= $title ?></h3>
				</div>
			<?php endif ?>

			<?php
			if($pages): ?>

				<div class="cards-slider">
					<div class="swiper-wrapper">

						<?php foreach($pages as $post): 

							setup_postdata($post); ?>
							<div class="swiper-slide">
								<div class="card card-type-02">

									<?php if (has_post_thumbnail()): ?>
										<?php the_post_thumbnail('full', 'class=card-img') ?>
									<?php endif ?>

									<?php 
									$subtitle = '';
									if(is_singular('story')) $subtitle = wp_get_object_terms($post->ID, 'story_cat')[0]->name;
									if(is_singular('news')) $subtitle = wp_get_object_terms($post->ID, 'news_cat')[0]->name;
									?>

									<div class="card-img-overlay">

										<?php if ($subtitle): ?>
											<h5 class="card-subtitle"><?= $subtitle ?></h5>
										<?php endif ?>
										
										<h3 class="card-title"><?php the_title() ?></h3>
									</div>
									<a href="<?php the_permalink() ?>" class="card-link"><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-right.svg" alt="" /></a>
								</div>
							</div>
						<?php endforeach; ?>

						<?php wp_reset_postdata(); ?>

					</div>
					<div class="swiper-pagination"></div>
				</div>

			<?php endif; ?>

			<?php if ($link): ?>
				<div class="text-center">
					<a href="<?= $link['url'] ?>" class="content-link"<?php if($link['target']) echo ' target="_blank"' ?>><?= $link['title'] ?><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/triangle.svg" alt="" /></a>
				</div>
			<?php endif ?>

		</div>
	</section>

	<?php endif; ?>