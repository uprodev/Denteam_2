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

					<!-- #applyModal for popup -->
					<?php if ($link): ?>
						<?php if ($popup_btn): ?>
							<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#applyModal">
								<span><?= $link['title'] ?></span>
								<img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-btn.svg" alt="" />
							</button>
						<?php else: ?>
						<a href="<?= $link['url'] ?>" class="btn btn-primary"<?php if($link['target']) echo ' target="_blank"' ?>>
							<span><?= $link['title'] ?></span>
							<img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-btn.svg" alt="" />
						</a>
						<?php endif; ?>
					<?php endif ?>

				</div>
			</div>
		</div>
	</section>

	<?php endif; ?>