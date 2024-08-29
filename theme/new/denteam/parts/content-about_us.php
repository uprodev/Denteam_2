<?php 
$is_custom = isset($args['is_custom']) && $args['is_custom'];
$title = $is_custom && $args['title'] ? $args['title'] : get_the_title();
$subtitle = $args['subtitle'] ?: (get_field('function') ?: '');
$text = $is_custom && $args['text'] ? $args['text'] : get_the_excerpt();
$url = $is_custom && $args['url'] ? $args['url'] : get_the_permalink();
?>

<a href="<?= $url ?>"<?php if($is_custom && $args['target']) echo ' target="_blank"' ?> class="card card-type-01">
	<figure class="card-img-top">

		<?php if ($is_custom && $args['image']): ?>
			<?= wp_get_attachment_image($args['image']['ID'], 'full') ?>
		<?php endif ?>

		<?php if (!$is_custom && has_post_thumbnail()): ?>
			<?php the_post_thumbnail('full') ?>
		<?php endif ?>

	</figure>
	<div class="card-body">
		<div class="subtitle"><?= $subtitle ?: __('About us', 'Denteam') ?></div>
		<h4><?= $title ?></h4>
		<?= $text ?>
	</div>
	<span class="card-link">
		<img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-right.svg" alt="" />
	</span>
</a>