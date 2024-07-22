<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<?php if ($usps || $image_left || $image_right): ?>
		<section class="icons-list icons-list--slider"<?php if($id) echo ' id="' . $id . '"' ?>>

			<?php if($section_title): ?>
				<div class="container-fluid">
					<h3 class="text-center section-title mb-5"><?= $section_title; ?></h3>
				</div>
			<?php endif; ?>

			<?php if($usps): ?>
				<div class="container-fluid">
					<div class="icons-slider">
						<div class="swiper-wrapper">

							<?php foreach ($usps as $item): ?>
								<div class="swiper-slide">
									<div class="icons-list-item">

										<?php if ($item['icon']): ?>
											<span class="icon"><i class="<?= $item['icon'] ?>"></i></span>
										<?php endif ?>
										
										<?php if ($item['title']): ?>
											<h4><?= $item['title'] ?></h4>
										<?php endif ?>
										
										<?php if ($item['link']): ?>
											<a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>><?= $item['link']['title'] ?></a>
										<?php endif ?>
										
									</div>
								</div>
							<?php endforeach ?>
							
						</div>
						<div class="swiper-pagination"></div>
					</div>
				</div>
			<?php endif; ?>

			<?php if ($button): ?>
				<div class="text-center mt-3">
					<a href="<?= $button['url'] ?>" class="content-link"<?php if($button['target']) echo ' target="_blank"' ?>><?= $button['title'] ?><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/triangle.svg" alt="" /></a>
				</div>
			<?php endif ?>
			
		</section>
	<?php endif ?>
	

	<?php endif; ?>