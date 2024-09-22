<a href="<?php the_permalink() ?>" class="card card-type-01 treatment-card">

	<?php if (has_post_thumbnail()): ?>
		<figure class="card-img-top">
			<?php the_post_thumbnail() ?>
		</figure>
	<?php endif ?>
	
	<div class="card-body">
		<div class="subtitle"><?= get_field('card_subtitle') ?: __('BEHANDELING', 'Denteam') ?></div>
		<h4 class="title"><?php the_title() ?></h4>
		<?php if (get_field('short_description')): ?>
			<?php $description = get_field('short_description'); ?>
			<p class="description"><?= $description; ?></p>
		<?php endif ?>
	</div>

	<div class="card-link">
		<img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-right.svg" alt="" />
	</div>
</a>