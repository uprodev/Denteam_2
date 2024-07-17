<div class="card card-type-01 full-bg-card">

	<?php if (has_post_thumbnail()): ?>
		<figure class="card-img-top">
			<a href="<?php the_permalink() ?>">
				<?php the_post_thumbnail() ?>
			</a>
		</figure>
	<?php endif ?>

	<?php 
		$post_id = get_the_ID();
		$card_subtitle = get_field('card_subtitle', $post_id);
	?>
	
	<a href="<?php the_permalink() ?>" class="card-body">
		<div class="subtitle"><?= ($card_subtitle) ?: '' ; ?></div>
		<h4 class="title"><?php the_title() ?></h4>
	</a>

	<a href="<?php the_permalink() ?>" class="card-link">
		<img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-right.svg" alt="" />
	</a>
</div>