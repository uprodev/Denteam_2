<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>
	
	<section class="main-banner-single"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container-fluid">
			<div class="row justify-content-between">
				<div class="col-md-6 col-xxl-5 order-md-1">

					<?php if ($image_hotspot): ?>
						<?= do_shortcode($image_hotspot) ?>
					<?php endif ?>
					
				</div>
				<div class="col-md-6">
					<div class="text">

						<?php if ($subtitle): ?>
							<div class="subtitle"><?= $subtitle ?></div>
						<?php endif ?>
						
						<?php if ($title): ?>
							<h1><?= $title ?></h1>
						<?php endif ?>
						
						<div class="vacancy-info">

							<?php if ($field = get_field('locations')): ?>
								<span><?= $field ?></span>
							<?php endif ?>

							<?php if ($field = get_field('hours')): ?>
								<span><?= $field ?></span>
							<?php endif ?>

						</div>

						<?php if ($description): ?>
							<?= $description ?>
						<?php endif ?>

						<?php if ($cta_button): ?>
							<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="<?= $cta_button['url'] ?>">
								<span><?= $cta_button['title'] ?></span>
								<img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-btn.svg" alt="" />
							</button>
						<?php endif ?>

					</div>
				</div>
			</div>
		</div>

		<?php if ($scroll_down_button && $scroll_down_link): ?>
			<button data-section="<?= $scroll_down_link['url'] ?>" class="scroll-bottom"><?= $text_before_link ?> <img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-down-gray.svg" alt="" /> <?= $text_after_link ?></button>
		<?php endif ?>
		
	</section>

	<?php if ($usps_list): ?>
		<section class="icons-list icons-list--slider icons-list--border-none">
			<div class="container-fluid">
				<div class="icons-slider">
					<div class="swiper-wrapper">

						<?php foreach ($usps_list as $item): ?>
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
		</section>
	<?php endif ?>

	<?php endif; ?>