<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<section class="page-banner page-banner--image-right"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container-fluid">
			<div class="row justify-content-between">
				<div class="col-md-6 col-xl-5 align-self-center">
					<div class="page-banner-text">

						<?php if ($title): ?>
							<h1 class="h2"><?= $title ?></h1>
						<?php endif ?>
						
						<?= $description ?>

						<?php if ($is_quick_links): ?>
							<div class="page-banner-cta">

								<?php if ($dropdown_title): ?>
									<div class="text-primary">
										<h3><?= $dropdown_title ?></h3>
									</div>
								<?php endif ?>

								<div class="dropdown">
									<button class="btn btn-dropdown dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"><?= $dropdown_placeholder ?></button>

									<?php if (is_array($quicklinks) && checkArrayForValues($quicklinks)): ?>
									<div class="dropdown-menu">
										<ul class="dropdown-scroller">

											<?php foreach ($quicklinks as $item): ?>
												<?php if ($item['link']): ?>
													<li>
														<a href="<?= $item['link']['url'] ?>" class="dropdown-item"<?php if($item['link']['target']) echo ' target="_blank"' ?>><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-right-drop.svg" alt=""> <?= $item['link']['title'] ?></a>
													</li>
												<?php endif ?>
											<?php endforeach ?>
											
										</ul>
									</div>
								<?php endif ?>
								
							</div>
						</div>
					<?php endif ?>

				</div>
			</div>
			<div class="col-md-6">

				<?php if ($image): ?>
					<div class="page-banner-image">
						<?= wp_get_attachment_image($image['ID'], 'full') ?>
					</div>
				<?php endif ?>

			</div>
		</div>
	</div>

	<?php if ($scroll_down_link && $scroll_down_anchor_link): ?>
		<button data-section="<?= $scroll_down_anchor_link['url'] ?>" class="scroll-bottom"><?= $text_before_icon ?><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-down-gray.svg" alt="" /> <?= $text_after_icon ?></button>
	<?php endif ?>
	
</section>

<?php endif; ?>