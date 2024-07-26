<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<section class="page-banner page-banner--image-right"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<div class="page-banner-text">

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
					<div class="col-md-6">
						<div class="page-banner-image">
							<?= wp_get_attachment_image($image['ID'], 'full') ?>
						</div>
					</div>
				<?php endif ?>
				
			</div>
		</div>
	</section>

	<?php endif; ?>