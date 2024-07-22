<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<section class="cta-help"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container-fluid">
			<div class="cta-help-inner">

				<?php if ($image): ?>
					<div class="image d-none d-lg-block">
						<?= wp_get_attachment_image($image['ID'], 'full') ?>
					</div>
				<?php endif ?>
				
				<div class="text">

					<?php if ($title): ?>
						<h3><?= $title ?></h3>
					<?php endif ?>
					
					<?php if ($description): ?>
						<p><?= $description ?></p>
					<?php endif ?>
					
					<?php if ($link): ?>
						<a href="<?= $link['url'] ?>" class="btn btn-primary"<?php if($link['target']) echo ' target="_blank"' ?>>
							<span><?= $link['title'] ?></span>
							<img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-btn.svg" alt="" />
						</a>
					<?php endif ?>

				</div>
			</div>
		</div>
	</section>

	<?php endif; ?>