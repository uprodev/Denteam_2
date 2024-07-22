<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<?php 
	$is_default = $custom_default == 'Default' && $default;
	$is_custom = $custom_default == 'Custom' && is_array($custom) && checkArrayForValues($custom);
	?>

	<?php if ($is_default || $is_custom): ?>
		<section class="team-wrapper<?php if($background_color == 'Grey') echo ' bg-light' ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
			<div class="container-fluid">

				<?php if ($title || $text): ?>
					<div class="text-center">

						<?php if ($title): ?>
							<h3><?= $title ?></h3>
						<?php endif ?>

						<?= $text ?>

					</div>
				<?php endif ?>

				<div class="row gy-7" id="response_team">

					<?php if ($is_default): ?>

						<?php 
						$args = array(
							'post_type' => 'behandeling', 
							'posts_per_page' => 8,
							'post_status' => 'publish',
							'post__in' => wp_list_pluck($default, 'ID'),
							'orderby' => 'post__in',
							'paged' => get_query_var('paged')
						);
						$wp_query = new WP_Query($args); 
						?>

						<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>

							<div class="col-sm-6 col-md-4 col-lg-3">
								<?php get_template_part('parts/content', 'team') ?>
							</div>

							<?php 
						endwhile;
						wp_reset_postdata(); 
						?>

					<?php else: ?>
						<?php foreach ($custom as $item): ?>

							<?php 
							$link_url = $item['link'] ? $item['link']['url'] : '';
							$link_title = $item['link'] ? $item['link']['title'] : '';
							$link_target = $item['link'] && $item['link']['target'] ? true : false;
							$image = $item['image'] ?: '';
							?>

							<div class="col-sm-6 col-md-4 col-lg-3">
								<?php get_template_part('parts/content', 'team', ['is_custom' => true, 'url' => $link_url, 'title' => $link_title,'target' => $link_target, 'image' => $image, 'name' => $item['name'], 'function' => $item['function']]) ?>
							</div>
						<?php endforeach ?>
					<?php endif ?>

				</div>

				<?php if ($is_default && $wp_query->max_num_pages > 1): ?>
					<script> var this_page = 1; </script>

					<div class="text-center mt-7">
						<a href="#" class="btn btn-primary load_team" data-param-posts='<?php echo serialize($wp_query->query_vars); ?>' data-max-pages='<?php echo $wp_query->max_num_pages; ?>'><span><?= $load_more_button ?></span><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-btn.svg" alt="" /></a>
					</div>
				<?php endif ?>
				
			</div>
		</section>
	<?php endif ?>

	<?php endif; ?>