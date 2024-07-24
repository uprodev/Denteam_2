<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<section class="text-rating"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container-fluid">
			<div class="row align-items-center justify-content-between">
				<div class="col-md-6">
					<div class="text">

						<?php if ($title): ?>
							<h3><?= $title ?></h3>
						<?php endif ?>

						<?= $text ?>

						<?php if ($button): ?>
							<a href="<?= $button['url'] ?>" class="btn btn-primary"<?php if($button['target']) echo ' target="_blank"' ?>><span><?= $button['title'] ?></span><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-btn.svg" alt="" /></a>
						<?php endif ?>

					</div>
				</div>

				<?php if ($is_widget && $shortcode): ?>
					<div class="col-md-5"><?= $shortcode ?></div>
				<?php endif ?>
				
			</div>
		</div>
	</section>

	<?php endif; ?>