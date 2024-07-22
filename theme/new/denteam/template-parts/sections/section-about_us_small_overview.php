<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<?php 
	$is_default = $custom_default == 'Default' && $default;
	$is_custom = $custom_default == 'Custom' && is_array($custom) && checkArrayForValues($custom);
	?>

	<?php if ($is_default || $is_custom): ?>
		<section class="cards-list cards-list-01<?php if($background_color == 'Grey') echo ' bg-light' ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
			<div class="container-fluid">

				<?php if ($title || $text): ?>
					<div class="text-center">

						<?php if ($title): ?>
							<h2><?= $title ?></h2>
						<?php endif ?>

						<?= $text ?>

					</div>
				<?php endif ?>

				<div class="row gy-6" id="response_about_us">

					<?php if ($is_default): ?>

						<?php 
						$args = array(
							'post_type' => 'about-us', 
							'posts_per_page' => 6,
							'post_status' => 'publish',
							'post__in' => wp_list_pluck($default, 'ID'),
							'orderby' => 'post__in',
							'paged' => get_query_var('paged')
						);
						$wp_query = new WP_Query($args); 
						?>

						<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>

							<div class="col-md-6 col-lg-4">
								<?php get_template_part('parts/content', 'about_us') ?>
							</div>

							<?php 
						endwhile;
						wp_reset_postdata(); 
						?>

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

							<div class="col-md-6 col-lg-4">
								<?php get_template_part('parts/content', 'about_us', ['is_custom' => true, 'image' => $image, 'subtitle' => $subtitle, 'title' => $title, 'url' => $link_url, 'target' => $link_target]) ?>
							</div>
						<?php endforeach ?>
					<?php endif ?>

				</div>

				<?php if ($is_default && $wp_query->max_num_pages > 1): ?>
					<script> var this_page = 1; </script>

					<div class="text-center mt-7">
						<a href="#" class="btn btn-primary load_about_us" data-param-posts='<?php echo serialize($wp_query->query_vars); ?>' data-max-pages='<?php echo $wp_query->max_num_pages; ?>'><span><?= $load_more_button ?></span><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-btn.svg" alt="" /></a>
					</div>
				<?php endif ?>
				
			</div>
		</section>
	<?php endif ?>

	<?php endif; ?>