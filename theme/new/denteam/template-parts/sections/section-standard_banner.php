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

						<?= $text ?>

						<?php if ($subtitle_before_button): ?>
							<h3 class="subtitle"><?= $subtitle_before_button ?></h3>
						<?php endif ?>

						<?php if ($button): ?>
							<a href="<?= $button['url'] ?>" class="btn btn-primary"<?php if($button['target']) echo ' target="_blank"' ?>><span><?= $button['title'] ?></span><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-btn.svg" alt="" /></a>
						<?php endif ?>

					</div>
				</div>

				<?php if ($image): ?>
					<div class="col-md-6">
						<div class="page-banner-image">
							<?= wp_get_attachment_image($image['ID'], 'full') ?>
						</div>
					</div>
				<?php endif ?>

			</div>
		</div>

		<?php if ($is_scroll_down && $anchor_link): ?>
			<button data-section="<?= $anchor_link['url'] ?>" class="scroll-bottom"><?= $text_before_link ?> <img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-down-gray.svg" alt="" /> <?= $text_after_link ?></button>
		<?php endif ?>

	</section>

	<?php endif; ?>