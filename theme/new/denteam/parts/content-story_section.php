<div class="story-item">
	<div class="row">
		<div class="col-md-6">

			<?php if ($field = get_field('image_card_home')): ?>
				<figure>
					<?= wp_get_attachment_image($field['ID'], 'full') ?>
				</figure>
			<?php endif ?>
			
		</div>
		<div class="col-md-6 ps-md-0">
			<div class="text">

				<h2>
					<?php if ($field = get_field('slider_quote')): ?>
						<?= $field ?>
					<?php else: ?>
						<?php the_title() ?>
					<?php endif ?>
				</h2>

				<?php if ($excerpt = get_field('slider_excerpt')): ?>
					<div class="slider-excerpt">
						<?= $excerpt; ?>
					</div>
				<?php endif; ?>

				<?php if ($field = get_field('name')): ?>
					<div class="name"><?= $field ?></div>
				<?php endif ?>
				
				<?php if ($field = get_field('place')): ?>
					<div class="place"><?= $field ?></div>
				<?php endif ?>
				
				<a href="<?php the_permalink() ?>" class="content-link"><?php _e('READ STORY', 'Denteam') ?><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/triangle.svg" alt="" /></a>
			</div>
		</div>
	</div>
</div>