<div class="card card-type-01">

	<?php if (has_post_thumbnail()): ?>
		<figure class="card-img-top">
			<a href="<?php the_permalink() ?>">
				<?php the_post_thumbnail('full') ?>
			</a>
		</figure>
	<?php endif ?>
	
	<div class="card-body">
		<div class="subtitle"><?php _e('About us', 'Denteam') ?></div>
		<h4><?php the_title() ?></h4>
	</div>
	<a href="<?php the_permalink() ?>" class="card-link">
		<img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-right.svg" alt="" />
	</a>
</div>