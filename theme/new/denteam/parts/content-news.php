<?php 
$is_custom = isset($args['is_custom']) && $args['is_custom'];
$title = $is_custom && $args['title'] ? $args['title'] : get_the_title();
$url = $is_custom && $args['url'] ? $args['url'] : get_the_permalink();
?>

<div class="card card-type-02">

	<?php if ($is_custom && $args['image']): ?>
		<?= wp_get_attachment_image($args['image']['ID'], 'full', false, array('class' => 'card-img')) ?>
	<?php endif ?>

	<?php if (!$is_custom && has_post_thumbnail()): ?>
		<?php the_post_thumbnail('full', 'class=card-img') ?>
	<?php endif ?>
	
	<div class="card-img-overlay">

		<h5 class="card-subtitle">

			<?php if ($is_custom && $args['subtitle']): ?>
				<?= $args['subtitle'] ?>
			<?php else: ?>

				<?php $terms = wp_get_object_terms(get_the_ID(), 'news_cat') ?>

				<?php if ($terms): ?>
					<?= $terms[0]->name ?>
				<?php endif ?>

			<?php endif ?>

		</h5>

		<h3 class="card-title"><?= $title ?></h3>
	</div>
	<a href="<?= $url ?>" class="card-link"<?php if($is_custom && $args['target']) echo ' target="_blank"' ?>>
		<img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-right.svg" alt="" />
	</a>
</div>