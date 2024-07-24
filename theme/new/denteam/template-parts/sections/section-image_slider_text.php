<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<section class="text-with-slider"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container-fluid">
			<div class="row justify-content-between gy-4">

				<?php if($images): ?>

					<div class="col-md-6">
						<div class="text">
							<div class="image-slider swiper">
								<div class="swiper-wrapper">

									<?php foreach($images as $image): ?>

										<div class="swiper-slide">
											<figure>
												<?= wp_get_attachment_image($image['ID'], 'full') ?>
											</figure>
										</div>

									<?php endforeach; ?>

								</div>

								<?php if (count($images) > 1): ?>
									<div class="swiper-pagination"></div>
								<?php endif ?>
								
							</div>
						</div>
					</div>

				<?php endif; ?>

				<div class="col-md-6 col-xl-5">
					<div class="text">

						<?php if ($title): ?>
							<h3><?= $title ?></h3>
						<?php endif ?>
						
						<?= $text ?>

						<?php if ($button): ?>
							<a href="<?= $button['url'] ?>" class="btn btn-primary"<?php if($button['target']) echo ' target="_blank"' ?>><span><?= $button['title'] ?></span><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-btn.svg" alt=""></a>
						<?php endif ?>

					</div>
				</div>
			</div>
		</div>
	</section>

	<?php endif; ?>