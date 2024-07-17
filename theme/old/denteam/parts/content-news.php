<div class="card card-type-02">

	<?php if (has_post_thumbnail()): ?>
		<?php the_post_thumbnail('full', 'class=card-img') ?>
	<?php endif ?>
	
	<div class="card-img-overlay">

		<?php $terms = wp_get_object_terms(get_the_ID(), 'news_cat') ?>

		<?php if ($terms): ?>
			<h5 class="card-subtitle"><?= $terms[0]->name ?></h5>
		<?php endif ?>
		
		<h3 class="card-title"><?php the_title() ?></h3>
	</div>
	<a href="<?php the_permalink() ?>" class="card-link">
		<img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-right.svg" alt="" />
	</a>
</div>