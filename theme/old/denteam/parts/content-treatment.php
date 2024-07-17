<div class="card card-type-01 treatment-card">

	<?php if (has_post_thumbnail()): ?>
		<figure class="card-img-top">
			<a href="<?php the_permalink() ?>">
				<?php the_post_thumbnail() ?>
			</a>
		</figure>
	<?php endif ?>
	
	<a href="<?php the_permalink() ?>" class="card-body">
		<div class="subtitle"><?php _e('BEHANDELING', 'Denteam') ?></div>
		<h4 class="title"><?php the_title() ?></h4>
		<?php if (get_field('short_description')): ?>
			<?php $description = get_field('short_description'); ?>
			<p class="description"><?= $description; ?></p>
		<?php endif ?>
	</a>

	<a href="<?php the_permalink() ?>" class="card-link">
		<img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-right.svg" alt="" />
	</a>
</div>