<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<section class="main-banner">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-5 order-md-1">

					<?php if ($images): ?>
						<div class="main-banner-slider">
							<div class="swiper-wrapper">

								<?php foreach ($images as $item): ?>
									<div class="swiper-slide">
										<figure>
											<picture><source media="(min-width: 1024px)" srcset="<?= $item['image']['url'] ?: $item['mobile_image']['url'] ?>" />
												<img src="<?= $item['mobile_image']['url'] ?: $item['image']['url'] ?>" alt="" />
											</picture>
										</figure>
									</div>
								<?php endforeach ?>

							</div>
							<div class="swiper-pagination"></div>
						</div>
					<?php endif ?>

				</div>
				<div class="col-md-7">
					<div class="text">

						<?php if ($title): ?>
							<div class="h1"><?= $title ?></div>
						<?php endif ?>

						<?php if ($description): ?>
							<?= $description ?>
						<?php endif ?>

						<?php if ($button): ?>
							<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="<?= $button['url'] ?>"><span><?= $button['title'] ?></span><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-btn.svg" alt="" /></button>
						<?php endif ?>

						<?php if ($subtitle): ?>
							<h4><?= $subtitle ?></h4>
						<?php endif ?>

						<?php if ($dropdown): ?>
							<div class="dropdown">

								<?php if ($select_text): ?>
									<button class="btn btn-dropdown dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"><?= $select_text ?></button>
								<?php endif ?>
								
								<div class="dropdown-menu">
									<ul data-lenis-prevent class="dropdown-scroller">

										<?php foreach ($dropdown as $item): ?>

											<?php if ($item['link']): ?>
												<li>
													<a class="dropdown-item" href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-right-drop.svg" alt="" /><?= $item['link']['title'] ?></a>
												</li>
											<?php endif ?>

										<?php endforeach ?>
										
									</ul>
								</div>
							</div>
						<?php endif ?>
						
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php endif; ?>