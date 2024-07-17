<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<?php if ($rows): ?>
		<section class="text-with-image-wrapper">

			<?php foreach ($rows as $item): ?>
				<div class="text-with-image <?= $item['image_left'] ? 'text-with-image--img-left' : 'text-with-image--img-right' ?><?= $item['background_transparent'] ? '' : ' text-with-image--bg' ?>">
					<div class="container-fluid">
						<div class="row align-items-center">
							<div class="col-md-6">

								<?php if ($item['image']): ?>
									<figure class="image">
										<?= wp_get_attachment_image($item['image']['ID'], 'full') ?>

										<?php if ($item['logo_image'] && $item['logo_image_upload']): ?>
											<div class="label-overlay">
												<!-- <img src="<?php //echo get_stylesheet_directory_uri() ?>/img/label_denteam_dark.svg" alt="" /> -->
												<img class="logo-overlay" src="<?php echo $item['logo_image_upload']['url']; ?>" alt="logo" />
											</div>
										<?php endif ?>
										
									</figure>
								<?php endif ?>

							</div>
							<div class="col-md-6">
								<div class="text">

									<?php if ($item['title']): ?>
										<h3><?= $item['title'] ?></h3>
									<?php endif ?>

									<?php if ($item['text']): ?>
										<?= $item['text'] ?>
									<?php endif ?>

									<?php if ($item['link_cta']): ?>
										<a href="<?= $item['link_cta']['url'] ?>" class="btn btn-primary"<?php if($item['link_cta']['target']) echo ' target="_blank"' ?>>
											<span><?= $item['link_cta']['title'] ?></span>
											<img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-btn.svg" alt="" />
										</a>
									<?php endif ?>

								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach ?>
			
		</section>
	<?php endif ?>

	<?php endif; ?>