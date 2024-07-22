<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<section class="page-banner"<?php if($id) echo ' id="' . $id . '"' ?>>
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
							'taxonomy' => 'vacancy_cat',
							// 'hide_empty' => false,
						] );
						?>

						<?php if ($terms): ?>
							<?php 
								$label = __('Make choice', 'Denteam');
								if(isset($_GET['vacancy_cat'])) {
									foreach($terms as $term) {
										if($term->slug == $_GET['vacancy_cat']) {
											$label = $term->name;
										}
									}
								}
							?>
							<form class="dropdown" action="<?php echo parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH); ?>" method="GET" id="filter_vacancies">
								<button class="btn btn-dropdown dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"><?= $label  ?></button>
								<div class="dropdown-menu">
									<ul data-lenis-prevent class="dropdown-scroller">

										<li>
											<label class="dropdown-item view-all">
												<input type="radio" <?php if(isset($_GET['vacancy_cat']) && $_GET['vacancy_cat'] == "all"):?>checked<?php endif;?> name="vacancy_cat" data-label="<?= __('View all vacancies', 'Denteam'); ?>" value="all" />
												<img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-right-drop.svg" alt="" /><?= __('View all vacancies', 'Denteam'); ?>
											</label>
										</li>

										<?php foreach ($terms as $term): ?>
											<li>
												<label class="dropdown-item">
													<input type="radio" <?php if(isset($_GET['vacancy_cat']) && $_GET['vacancy_cat'] == $term->slug):?>checked<?php endif;?> name="vacancy_cat" data-label="<?= $term->name ?>" value="<?= $term->slug ?>" />
													<img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-right-drop.svg" alt="" /><?= $term->name ?>
												</label>
											</li>
										<?php endforeach ?>

										
									</ul>
								</div>
								<input type="hidden" name="action" value="filter_vacancies">
							</form>
						<?php endif ?>
						
					</div>
				</div>
			</div>
		</div>
		<div class="banner-element-left d-none d-xl-block"><img src="<?= get_stylesheet_directory_uri() ?>/img/banner-element-left.svg" alt="" /></div>
		<div class="banner-element-right d-none d-xl-block"><img src="<?= get_stylesheet_directory_uri() ?>/img/banner-element-right-01.svg" alt="" /></div>
	</section>

	<section class="cards-list cards-list-01">
		<div class="container-fluid">
			<div class="row gy-4" id="response_vacancies">

				<?php 
				$tax_query = array();
				if(isset($_GET['vacancy_cat']) && $_GET['vacancy_cat'] !== "all" ) {
				$tax_query = array(
					array(
						'taxonomy' => 'vacancy_cat',
						'field' => 'slug',
						'terms' => $_GET['vacancy_cat'],
					),
				);
				$wp_query = new WP_Query(array('post_type' => 'vacancy', 'posts_per_page' => 9, 'paged' => get_query_var('paged'), 'orderby' => 'menu_order', 'order' => 'ASC', 'post_status' => 'publish', 'suppress_filters' => false, 'tax_query'=>$tax_query));
				} else {
					$wp_query = new WP_Query(array('post_type' => 'vacancy', 'posts_per_page' => 9, 'paged' => get_query_var('paged'), 'orderby' => 'menu_order', 'order' => 'ASC', 'post_status' => 'publish', 'suppress_filters' => false ));	
				}
				

				$i = 1;
				while ($wp_query->have_posts()): $wp_query->the_post(); 
					?>

					<div class="col-md-6 col-lg-4">
						<?php get_template_part('parts/content', 'vacancy') ?>
					</div>

					<?php if ($i == 6): ?>
						<div class="col-12 position-relative">
							<?php get_template_part('parts/matchtest_section'); ?>
						</div>
					<?php endif ?>

					<?php 
					$i++;
				endwhile;
				wp_reset_postdata(); 
				?>

			</div>

			<?php if ( $wp_query->max_num_pages > 1 ) { ?>
				<div class="text-center mt-6 btn_more_vacancies_wrap">

					<script> var this_page = 1; </script>

					<a class="content-link btn_more_vacancies" href="#"
					data-param-posts='<?php echo serialize($wp_query->query_vars); ?>'
					data-max-pages='<?php echo $wp_query->max_num_pages; ?>'
					data-tpl=<?= $post_type; ?>><?php _e('LOAD MORE ITEMS', 'Denteam') ?><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/triangle.svg" alt="" /></a>
				</div>
			<?php } ?>

		</div>
	</section>

	<?php endif; ?>