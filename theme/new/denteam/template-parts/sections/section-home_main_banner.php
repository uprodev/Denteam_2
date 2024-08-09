<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<section class="main-banner-section"<?php if($id) echo ' id="' . $id . '"' ?>>

		<?php if($background_image || $background_image_mobile): ?>
			<div class="background-image">
				<picture>
					<source srcset="<?= $background_image ? $background_image['url'] : $background_image_mobile['url'] ?>" media="(min-width:992px)" />
						<?= wp_get_attachment_image($background_image_mobile ? $background_image_mobile['ID'] : $background_image['ID'], 'full') ?>
					</picture>
				</div>
			<?php endif; ?>

			<div class="container-fluid">
				<div class="row">

					<!-- Main content -->
					<div class="col-md-6 order-md-1">
						<div class="text">

							<?php if ($title): ?>
								<div class="h1"><?= $title ?></div>
							<?php endif ?>

							<?php if ($description): ?>
								<div class="description">
									<?= $description ?>
								</div>
							<?php endif ?>

							<?php if ($button): ?>
								<a href="<?= $button['url']; ?>" target="<?= $button['target']; ?>" class="btn btn-primary"><span><?= $button['title'] ?></span><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-btn.svg" alt="" /></a>
							<?php endif ?>

						</div>
					</div>
					<!-- /Main content -->

				</div>
			</div>
		</section>
		<section class="main-banner-bottom-section">
			<!-- Dropdown element -->
			<div class="container-fluid">

				<?php if ($dropdown || $dropdown_two): ?>
					<div class="wrapper">
						<div class="row">

							<?php if ($dropdown): ?>
								<div class="col-md-6">

									<?php if($dropdown_title): ?>
										<h3><?= $dropdown_title; ?></h3>
									<?php endif; ?>

									<div class="dropdown dropdown-w">

										<?php if ($select_text): ?>
											<button class="btn btn-dropdown dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"><?= $select_text ?></button>
										<?php endif ?>

										<div class="dropdown-menu">
											<ul class="dropdown-scroller">

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
								</div>
							<?php endif ?>

							<?php if ($dropdown_two): ?>
								<div class="col-md-6">

									<?php if($dropdown_title_two): ?>
										<h3><?= $dropdown_title_two; ?></h3>
									<?php endif; ?>

									<div class="dropdown dropdown-w">

										<?php if ($select_text_two): ?>
											<button class="btn btn-dropdown dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"><?= $select_text ?></button>
										<?php endif ?>

										<div class="dropdown-menu">
											<ul class="dropdown-scroller">
												<?php foreach ($dropdown_two as $item): ?>
													<?php if ($item['link']): ?>
														<li>
															<a class="dropdown-item" href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-right-drop.svg" alt="" /><?= $item['link']['title'] ?></a>
														</li>
													<?php endif ?>
												<?php endforeach ?>
											</ul>
										</div>
									</div>
								</div>
							<?php endif ?>
						</div>
					</div>
				<?php endif ?>

				<div class="text d-md-none">

					<?php if ($description): ?>
						<div class="description">
							<?= $description ?>
						</div>
					<?php endif ?>

					<?php if ($button): ?>
						<a href="<?= $button['url']; ?>" target="<?= $button['target']; ?>" class="btn btn-primary"><span><?= $button['title'] ?></span><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-btn.svg" alt="" /></a>
					<?php endif ?>

				</div>
			</div>
			<!-- /Dropdown element -->

		</section>

		<?php endif; ?>