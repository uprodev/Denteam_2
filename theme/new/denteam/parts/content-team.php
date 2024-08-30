<?php 
$is_custom = isset($args['is_custom']) && $args['is_custom'];
$title = $is_custom && $args['name'] ? $args['name'] : (get_the_title() ?: '');
$function = $is_custom && $args['function'] ? $args['function'] : (get_field('function') ?: '');
$link_text = isset($args['link_text']) ? $args['link_text'] : '';
?>

<div class="team-item">
	<div class="team-item-image">
		<?php if ($is_custom && $args['image']): ?>
			<?= wp_get_attachment_image($args['image']['ID'], 'full') ?>
		<?php endif ?>

		<?php if (!$is_custom && has_post_thumbnail()): ?>
			<?php the_post_thumbnail('full') ?>
		<?php endif ?>

	</div>
	<div class="team-item-text">

		<?php if ($title): ?>
			<h4><?= $title ?></h4>
		<?php endif ?>
		
		<?php if ($function): ?>
			<p><?= $function ?></p>
		<?php endif ?>
		
		<a href="<?= $is_custom && $args['url'] ? $args['url'] : get_the_permalink() ?>" class="content-link content-link-sm"<?php if($is_custom && $args['target']) echo ' target="_blank"' ?>><?= $link_text ?: __('Meer lezen', 'Denteam') ?><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/triangle.svg" alt="" /></a>
	</div>
</div>