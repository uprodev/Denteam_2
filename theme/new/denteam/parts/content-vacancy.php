<a href="<?php the_permalink() ?>" class="card card-type-01">

	<?php if (has_post_thumbnail()): ?>
		<figure class="card-img-top">
			<?php the_post_thumbnail() ?>
		</figure>
	<?php endif ?>
	
	<div class="card-body">
		<div class="subtitle"><?php _e('VACANCY', 'Denteam') ?></div>
		<h4><?php the_title() ?></h4>

		<?php if (get_field('locations') || get_field('hours')): ?>
		<p>

			<?php if ($field = get_field('locations')): ?>
				<?= $field ?><span class="divider"></span>
			<?php endif ?>

			<?php if ($field = get_field('hours')): ?>
				<?= $field ?>
			<?php endif ?>

		</p>
	<?php endif ?>

</div>
<span class="card-link">
	<img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-right.svg" alt="" />
</span>
</a>