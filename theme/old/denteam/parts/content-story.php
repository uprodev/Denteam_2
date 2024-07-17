<div class="card card-type-02">

	<?php if (has_post_thumbnail()): ?>
		<?php the_post_thumbnail('full', 'class=card-img') ?>
	<?php endif ?>
	
	<a href="<?php the_permalink() ?>" class="card-img-overlay">
		<?php if ($field = get_field('subtitle')): ?>
			<h5 class="card-subtitle"><?= $field ?></h5>
		<?php endif ?>
		
		<h3 class="card-title"><?php the_title() ?></h3>
	</a>
	<a href="<?php the_permalink() ?>" class="card-link">
		<img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-right.svg" alt="" />
	</a>
</div>