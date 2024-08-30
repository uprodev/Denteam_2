<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<section class="page-banner page-banner--image-right"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6<?php if(!get_field('wrap_class') == 'short') echo ' align-self-center' ?>">
					<div class="page-banner-text">
						<h1><?= $title ?: get_the_title() ?></h1>
						

						<?php if ($description): ?>
							<?= $description ?>
						<?php endif ?>

						<?php if ($link): ?>
							<a href="<?= $link['url'] ?>" class="btn btn-primary"<?php if($link['target']) echo ' target="_blank"' ?>>
								<span><?= $link['title'] ?></span>
								<img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-btn.svg" alt="" />
							</a>
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

		<?php if ($scroll_down_button && $scroll_down_link): ?>
			<button data-section="<?= $scroll_down_link['url'] ?>" class="scroll-bottom"><?= $text_before_link ?> <img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-down-gray.svg" alt="" /> <?= $text_after_link ?></button>
		<?php endif ?>
		
	</section>

	<?php endif; ?>