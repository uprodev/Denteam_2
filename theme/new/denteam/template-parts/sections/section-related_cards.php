<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<?php 
	$is_default = $custom_default == 'Default' && $default;
	$is_custom = $custom_default == 'Custom' && is_array($custom) && checkArrayForValues($custom);
	$template_part = $card_style == 'Style 2' ? 'news' : 'about_us';
	?>


	<section class="cards-list cards-list-01<?php if($background_color == 'Grey') echo ' bg-light' ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container-fluid">

			<?php if ($title): ?>
				<div class="text-center">
					<h2 class="h4"><?= $title ?></h2>
				</div>
			<?php endif ?>
			
			<div class="cards-slider">
				<div class="swiper-wrapper">

					<?php if($is_default): ?>

						<?php foreach($default as $post): 

							global $post;
							setup_postdata($post); ?>
							<div class="swiper-slide">
								<?php get_template_part('parts/content', $template_part, ['subtitle' => get_post_type()]) ?>
							</div>
						<?php endforeach; ?>
						<?php wp_reset_postdata(); ?>

					<?php else: ?>

						<?php foreach ($custom as $item): ?>
							
							<?php 
							$image = $item['image'] ?: '';
							$subtitle = $item['subtitle'] ?: '';
							$title = $item['title'] ?: '';
							$text = $item['text'] ?: '';
							$link_url = $item['link'] ? $item['link']['url'] : '';
							$link_target = $item['link'] && $item['link']['target'] ? true : false;
							?>

							<div class="swiper-slide">
								<?php get_template_part('parts/content', $template_part, ['is_custom' => true, 'image' => $image, 'subtitle' => $subtitle, 'title' => $title, 'url' => $link_url, 'target' => $link_target]) ?>
							</div>
						<?php endforeach ?>

					<?php endif; ?>

				</div>
				<div class="swiper-pagination"></div>
			</div>

			<?php if ($link): ?>
				<div class="text-center d-none d-lg-block">
					<a href="<?= $link['url'] ?>" class="content-link"<?php if($link['target']) echo ' target="_blank"' ?>><?= $link['title'] ?><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/triangle.svg" alt="" /></a>
				</div>
			<?php endif ?>
			
		</div>
	</section>

	<?php endif; ?>