<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<section class="text-with-headline text-with-headline--text-right"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container-fluid">
			<div class="row">

				<?php if ($title): ?>
					<div class="headline">
						<div class="inner">
							<h2><?= $title ?></h2>
						</div>
					</div>
				<?php endif ?>

				<div class="text">
					<div class="inner">

						<?php if ($text || $button): ?>

							<?= $text ?>

							<?php if ($button): ?>
								<a href="<?= $button['url'] ?>" class="btn btn-primary"<?php if($button['target']) echo ' target="_blank"' ?>><span><?= $button['title'] ?></span><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-btn.svg" alt="" /></a>
							<?php endif ?>

						</div>
					</div>
				<?php endif ?>

			</div>
		</div>
	</section>

	<?php if ($image): ?>
		<section class="image-wide-block">
			<div class="container-fluid">
				<figure>
					<?= wp_get_attachment_image($image['ID'], 'full') ?>
				</figure>
			</div>
		</section>
	<?php endif ?>

	<?php endif; ?>