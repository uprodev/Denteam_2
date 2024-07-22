<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<section class="page-banner"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container-fluid">
			<div class="row align-items-end justify-content-between">
				<div class="col-md-6 col-xl-7">
					<div class="page-banner-text">

						<?php if ($title): ?>
							<<?= $h1_h2 ?> class="h2"><?= $title ?></<?= $h1_h2 ?>>
						<?php endif ?>

						<?= $text ?>

					</div>
				</div>

				<?php if ($is_filter_options): ?>
					<div class="col-md-6 col-xl-5">
						<div class="page-banner-cta">

							<?php if ($filter_options['title']): ?>
								<div class="text-primary">
									<h4><?= $filter_options['title'] ?></h4>
								</div>
							<?php endif ?>


							<?php 
							$terms = get_terms( [
								'taxonomy' => $custom_post_type . '_cat',
								'hide_empty' => false,
							] ); 
							?>

							<?php if ($terms): ?>
								<form action="#" class="dropdown" id="filter_by_term">
									<button class="btn btn-dropdown dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"><?= $filter_options['dropdown_placeholder'] ?></button>
									<div class="dropdown-menu">
										<ul class="dropdown-scroller">

											<?php foreach ($terms as $term): ?>
												<li>
													<label class="dropdown-item">
														<input type="radio" name="term" value="<?= $term->term_id ?>" />
														<img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-right-drop.svg" alt="" />
														<?= $term->name ?>
													</label>
												</li>
											<?php endforeach ?>

										</ul>
									</div>
									<input type="hidden" name="post_type" value="<?= $custom_post_type ?>">
									<input type="hidden" name="taxonomy" value="<?= $custom_post_type . '_cat' ?>">
									<input type="hidden" name="action" value="filter_by_term">
								</form>
							<?php endif ?>
							
						</div>
					</div>
				<?php endif ?>

			</div>
		</div>
	</section>

	<?php 
	$args = array(
		'post_type' => $custom_post_type, 
		'posts_per_page' => 9,
		'paged' => get_query_var('paged')
	);
	$wp_query = new WP_Query($args);
	if($wp_query->have_posts()): 
		?>

		<section class="cards-list cards-list-01">
			<div class="container-fluid" id="response_filter_by_term">
				<div class="row gy-5" id="response_more_posts">

					<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>

						<div class="col-md-6 col-lg-4">
							<?php get_template_part('parts/content', 'about_us', ['subtitle' => $custom_post_type]) ?>
						</div>

						<?php if ($cards['is_cta_block'] && $wp_query->current_post == 1): ?>

							<?php if ($cards['cta_block'] == 'Custom CTA block with form'): ?>
								<section class="cta-contacts">
									<div class="container-fluid">
										<div class="cta-contacts-inner">

											<?php if ($cards['title_2']): ?>
												<div class="title">
													<h3><?= $cards['title_2'] ?></h3>
												</div>
											<?php endif ?>
											
											<?php if ($cards['form_2']): ?>
												<div class="form">
													<?= do_shortcode('[contact-form-7 id="' . $cards['form_2'] . '"]') ?>
												</div>
											<?php endif ?>
											
											<?php if ($cards['image_2']): ?>
												<div class="image d-none d-lg-block">
													<?= wp_get_attachment_image($cards['image_2']['ID'], 'full') ?>
												</div>
											<?php endif ?>
											
										</div>
									</div>
								</section>
							<?php else: ?>

								<?php 
								$fields = ['subtitle', 'title', 'button', 'image'];
								foreach ($fields as $field) {
									$$field = $cards['cta_block'] == 'Theme settings default' ? get_field($field . '_cta', 'option') : $cards[$field];
								}
								?>

								<div class="col-12">
									<section class="cta-matchtest">
										<div class="container-fluid">
											<div class="cta-matchtest-inner">
												<div class="title">

													<?php if ($subtitle): ?>
														<div class="subtitle"><?= $subtitle ?></div>
													<?php endif ?>
													
													<?php if ($title): ?>
														<h3><?= $title ?></h3>
													<?php endif ?>
													
												</div>

												<?php if ($button): ?>
													<div class="link">
														<a href="<?= $button['url'] ?>" class="btn btn-primary"<?php if($button['target']) echo ' target="_blank"' ?>><span><?= $button['title'] ?></span><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-btn.svg" alt="" /></a>
													</div>
												<?php endif ?>

												<?php if ($image): ?>
													<div class="image d-none d-lg-block">
														<?= wp_get_attachment_image($image['ID'], 'full') ?>
													</div>
												<?php endif ?>

											</div>
										</div>
									</section>
								</div>
							<?php endif ?>
							
						<?php endif ?>

					<?php endwhile; ?>
					
				</div>

				<?php if($wp_query->max_num_pages > 1):?>
					<script> var this_page = 1; </script>

					<div class="text-center mt-8">
						<a href="#" class="content-link content-link-sm more_posts" data-param-posts='<?php echo serialize($wp_query->query_vars); ?>' data-max-pages='<?php echo $wp_query->max_num_pages; ?>'><?= $cards['load_more_button_text'] ?><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/triangle.svg" alt="" /></a>
					</div>

				<?php endif;?>

			</div>
		</section>

		<?php 
	endif;
	wp_reset_query(); 
	?>

	<?php endif; ?>