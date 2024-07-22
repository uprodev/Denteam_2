<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<section class="cta-matchtest">
		<div class="container-fluid">
			<div class="cta-matchtest-inner">
				<div class="title">

					<?php if ($field = $default ? get_field('subtitle_matchtest', 'option') : $subtitle): ?>
						<div class="subtitle"><?= $field ?></div>
					<?php endif ?>
					
					<?php if ($field = $default ? get_field('title_matchtest', 'option') : $title): ?>
						<h3><?= $field ?></h3>
					<?php endif ?>
					
				</div>

				<?php if ($field = $default ? get_field('link_matchtest', 'option') : $link): ?>
					<div class="link">
						<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="<?= $field['url'] ?>">
							<span><?= $field['title'] ?></span>
							<img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-btn.svg" alt="" />
						</button>
					</div>
				<?php endif ?>

				<?php if ($field = $default ? get_field('image_matchtest', 'option') : $image): ?>
					<div class="image d-none d-lg-block">
						<?= wp_get_attachment_image($field['ID'], 'full', false, array('class' => 'logo-mob')) ?>
					</div>
				<?php endif ?>

			</div>
		</div>
	</section>

	<?php endif; ?>