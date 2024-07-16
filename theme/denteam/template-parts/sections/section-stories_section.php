<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<section class="page-banner">
		<div class="container-fluid">
			<div class="row align-items-end justify-content-between">
				<div class="col-md-6 col-xl-7">
					<div class="page-banner-text">

						<?php if ($title): ?>
							<h1><?= $title ?></h1>
						<?php endif ?>
						
						<?php if ($description): ?>
							<?= $description ?>
						<?php endif ?>

					</div>
				</div>
				<div class="col-md-6 col-xl-5">
					<div class="page-banner-cta">

						<?php if ($subtitle): ?>
							<div class="text-primary">
								<h4><?= $subtitle ?></h4>
							</div>
						<?php endif ?>
						
						<?php 
						$terms = get_terms( [
							'taxonomy' => 'story_cat',
							// 'hide_empty' => false,
						] );
						?>

						<?php if ($terms): ?>
							<?php 
								$label = __('Make choice', 'Denteam');
								if(isset($_GET['story_cat'])) {
									foreach($terms as $term) {
										if($term->slug == $_GET['story_cat']) {
											$label = $term->name;
										}
									}
								}
							?>
							<form class="dropdown" action="<?php echo parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH); ?>" method="GET" id="filter_stories">
								<button class="btn btn-dropdown dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"><?= $label ?></button>
								<div class="dropdown-menu">
									<ul data-lenis-prevent class="dropdown-scroller">

										<?php foreach ($terms as $term): ?>
											<li>
												<label class="dropdown-item">
													<input <?php if(isset($_GET['story_cat']) && $_GET['story_cat'] == $term->slug):?>checked<?php endif;?> type="radio" name="story_cat" data-label="<?= $term->name ?>" value="<?= $term->slug ?>" />
													<img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-right-drop.svg" alt="" /><?= $term->name ?>
												</label>
											</li>
										<?php endforeach ?>
										
									</ul>
								</div>
								<input type="hidden" name="action" value="filter_stories">
							</form>
						<?php endif ?>

					</div>
				</div>
			</div>
		</div>
		<div class="banner-element-left d-none d-xl-block"><img src="<?= get_stylesheet_directory_uri() ?>/img/banner-element-left.svg" alt="" /></div>
		<div class="banner-element-right d-none d-xl-block"><img src="<?= get_stylesheet_directory_uri() ?>/img/banner-element-right-01.svg" alt="" /></div>
	</section>

	<section class="cards-list cards-list-02">
		<div class="container-fluid">
			<div class="row gy-4" id="response_stories">

				<?php 
				$tax_query = array();
				if(isset($_GET['story_cat']))
				$tax_query = array(
					array(
						'taxonomy' => 'story_cat',
						'field' => 'slug',
						'terms' => $_GET['story_cat'],
					),
				);
				$wp_query = new WP_Query(array('post_type' => 'story', 'posts_per_page' => 9, 'paged' => get_query_var('paged'), 'post_status'=> 'publish', 'suppress_filters'=>false, 'orderby'=> 'menu_order', 'order'=>'ASC', 'tax_query'=>$tax_query));

				$i = 1;
				while ($wp_query->have_posts()): $wp_query->the_post(); 
					?>

					<div class="col-md-6 col-lg-4">
						<?php get_template_part('parts/content', 'story') ?>
					</div>

					<?php if ($i == 6): ?>
						<div class="col-12 position-relative">
							<?php get_template_part('parts/cta_contacts'); ?>
						</div>
					<?php endif ?>

					<?php 
					$i++;
				endwhile;
				wp_reset_postdata(); 
				?>

			</div>

			<?php if ( $wp_query->max_num_pages > 1 ) { ?>
				<div class="text-center mt-8 btn_more_stories_wrap">

					<script> var this_page = 1; </script>

					<a class="content-link btn_more_stories" href="#"
					data-param-posts='<?php echo serialize($wp_query->query_vars); ?>'
					data-max-pages='<?php echo $wp_query->max_num_pages; ?>'
					data-tpl=<?= $post_type; ?>><?php _e('LOAD MORE ITEMS', 'Denteam') ?><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/triangle.svg" alt="" /></a>
				</div>
			<?php } ?>

		</div>
	</section>

	<?php endif; ?>