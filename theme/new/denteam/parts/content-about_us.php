<?php 
$is_custom = isset($args['is_custom']) && $args['is_custom'];
$title = $is_custom && $args['name'] ? $args['name'] : (get_the_title() ?: '');
$function = $is_custom && $args['function'] ? $args['function'] : (get_field('function') ?: '');
?>

<div class="card card-type-01">
	<figure class="card-img-top">
		<a href="<?= $is_custom && $args['url'] ? $args['url'] : get_the_permalink() ?>">

			<?php if ($is_custom && $args['image']): ?>
				<?= wp_get_attachment_image($args['image']['ID'], 'full') ?>
			<?php endif ?>

			<?php if (!$is_custom && has_post_thumbnail()): ?>
				<?php the_post_thumbnail('full') ?>
			<?php endif ?>

		</a>
	</figure>
	<div class="card-body">
		<div class="subtitle"><?= $args['subtitle'] ?: __('About us', 'Denteam') ?></div>
		<h4><?= $is_custom && $args['title'] ? $args['title'] : get_the_title() ?></h4>
		<?= $is_custom && $args['text'] ? $args['text'] : get_the_excerpt() ?>
	</div>
	<a href="<?= $is_custom && $args['url'] ? $args['url'] : get_the_permalink() ?>" class="card-link"<?php if($is_custom && $args['target']) echo ' target="_blank"' ?>>
		<img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-right.svg" alt="" />
	</a>
</div>