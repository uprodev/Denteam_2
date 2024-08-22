<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<section class="page-banner page-banner--img"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container-fluid">
			<div class="row align-items-center justify-content-between">
				<div class="col-lg-6">
					<div class="page-banner-text">

						<?php if ($subtitle): ?>
							<div class="subtitle"><?= $subtitle ?></div>
						<?php endif ?>

						<?php if ($title): ?>
							<h1 class="h2"><?= $title ?></h1>
						<?php endif ?>

						<?= $text ?>

						<?php if ($button): ?>
							<a href="<?= $button['url'] ?>" class="btn btn-primary"<?php if($button['target']) echo ' target="_blank"' ?>><span><?= $button['title'] ?></span><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-btn.svg" alt="" /></a>
						<?php endif ?>

					</div>
				</div>

				<?php if ($image): ?>
					<div class="col-lg-6">
						<div class="page-banner-image">
							<figure>
								<?= wp_get_attachment_image($image['ID'], 'full') ?>
							</figure>
						</div>
					</div>
				<?php endif ?>

			</div>
		</div>

		<?php if ($scroll_down_button && $scroll_down_link): ?>
			<button data-section="<?= $scroll_down_link['url'] ?>" class="scroll-bottom"><?= $text_before_link ?> <img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-down-gray.svg" alt="" /> <?= $text_after_link ?></button>
		<?php endif ?>

	</section>

	<?php endif; ?>