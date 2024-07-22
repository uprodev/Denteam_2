<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<?php 
	$is_default = $custom_default == 'Default';
	$is_custom = $custom_default == 'Custom' && $custom;
	?>

	<?php if ($is_default || $is_custom): ?>

		<?php 
		$args = array(
			'post_type' => 'news', 
			'posts_per_page' => -1,
			'post_status' => 'publish',
			'paged' => get_query_var('paged')
		);
		if($is_custom) {
			$args['post__in'] = wp_list_pluck($custom, 'ID');
			$args['orderby'] = 'post__in';
		} else {
			$args['posts_per_page'] = 8;
			$args['orderby'] = 'date';
			$args['order'] = 'DESC';
		}
		$wp_query = new WP_Query($args); 
		?>

		<section class="cards-list-with-text<?php if($background_color == 'Grey') echo ' bg-light' ?>">
			<div class="container-fluid">
				<div class="row justify-content-between">
					<div class="col-lg-4 col-xl-3 pe-xl-0">
						<div class="text">

							<?php if ($title): ?>
								<h2><?= $title ?></h2>
							<?php endif ?>

							<?= $text ?>

							<?php if ($field = get_field('button')): ?>
								<a href="<?= $field['url'] ?>" class="btn btn-primary"<?php if($field['target']) echo ' target="_blank"' ?>><span><?= $field['title'] ?></span><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-btn.svg" alt="" /></a>
							<?php endif ?>

						</div>
					</div>
					<div class="col-lg-8">
						<div class="cards-slider cards-slider-lg">
							<div class="swiper-wrapper">

								<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>

									<div class="swiper-slide">
										<?php get_template_part('parts/content', 'news') ?>
									</div>

									<?php 
								endwhile;
								wp_reset_postdata(); 
								?>

							</div>
							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>
			</div>
		</section>

	<?php endif ?>

	<?php endif; ?>